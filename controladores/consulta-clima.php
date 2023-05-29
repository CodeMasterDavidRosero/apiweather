<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ciudad'])) {
        $ciudad = $_POST['ciudad'];
        $estado = obtenerEstado($ciudad);
        $datosClima = obtenerDatosClima($ciudad, $estado);

        if ($datosClima) {
            echo '<h2>Datos del clima:</h2>';
            echo '<table class="table table-bordered text-white bg-dar table-bordered table-striped dt-responsive" widht="100%">';
            echo '<tr>
                  <th>Fecha</th>
                  <th>Ciudad</th>
                  <th>Estado</th>
                  <th>Temperatura</th>
                  <th>Humedad</th>
                  <th>Clima</th>
                  <th>Coordenadas</th>
                  </tr>';
            echo '<tr>';
            echo '<td>'.date('Y-m-d').'</td>';
            echo '<td>'.$ciudad.'</td>';
            echo '<td>'.$estado.'</td>';
            echo '<td>'.$datosClima['main']['temp'].' °C</td>';
            echo '<td><b><font color="yellow">'.$datosClima['main']['humidity'].'%</font></b></td>';
            echo '<td>'.$datosClima['weather'][0]['description'].'</td>';
            echo '<td>'.$datosClima['coord']['lat'].';'.$datosClima['coord']['lon'].'</td>';
            echo '</tr>';
            echo '</table>';

            // Guardado de datos en la base de datos
            require 'modelos/conexion.php';

            $fecha = date('Y-m-d');
            $temperatura = $datosClima['main']['temp'];
            $humedad = $datosClima['main']['humidity'];
            $clima = $datosClima['weather'][0]['description'];
            $latitud = $datosClima['coord']['lat'];
            $longitud = $datosClima['coord']['lon'];

            // Insertar los datos en la base de datos
            try {
                $stmt = $conn->prepare("INSERT INTO historico (fecha, ciudad, estado, temperatura, humedad, clima, latitud, longitud) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$fecha, $ciudad, $estado, $temperatura, $humedad, $clima, $latitud, $longitud]);

                // Confirmar que los datos se han insertado correctamente
                echo "<p>Los datos del clima se han guardado en la base de datos.</p>";
            } catch (PDOException $exception) {
                // Mostrar mensaje de error si ocurre algún problema durante la inserción de datos
                echo "<p>Error al guardar los datos del clima en la base de datos: " . $exception->getMessage() . "</p>";
            }
        } else {
            echo '<p>No se pudieron obtener los datos del clima.</p>';
        }
    }

    function obtenerEstado($ciudad) {
        switch ($ciudad) {
            case 'Orlando':
                return 'FL';
            case 'New York':
                return 'NY';
            case 'Miami':
                return 'FL';
            default:
                return '';
        }
    }

    function obtenerDatosClima($ciudad, $estado) {
        $apiKey = 'dd04e12c6d2d32de6aece3c97328c905';
        $ciudadCodificada = urlencode($ciudad);
        $estadoCodificado = urlencode($estado);
        $url = 'https://api.openweathermap.org/data/2.5/weather?q='.$ciudadCodificada.','.$estadoCodificado.'-NY,USA&units=metric&lang=es&appid='.$apiKey;

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($response, true);

        return $data;
    }

    
?>
</html>