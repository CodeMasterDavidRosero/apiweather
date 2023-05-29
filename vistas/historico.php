<!DOCTYPE html>
<html>
<head>
    <br>
    <title>Historico de clima por ciudad</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('../vistas/assets/fondo.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        

        table {
            width: 100%;
            max-width: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center text-light">Historico de climas de las ciudades</h1>
        <div class="text-right mb-3">

            <p><a href="../index.php">
                    <font color="#49b063"><b>Volver al inicio</b>
                </a></font></p>         
        </div>

<?php
        // Incluir el archivo de conexión a la base de datos
        require '../modelos/conexion.php';

        try {
            // Consulta a la base de datos para obtener los registros de clima
            $query = "SELECT * FROM historico";
            $resultado = $conn->query($query);

            // Verificar si hay registros devueltos
            if ($resultado->rowCount() > 0) {
                // Mostrar tabla de registros
                echo '<div class="table-responsive">';
                echo '<table class="table table-striped text-white bg-dar table-bordered">';
                echo '<thead>
                    <tr>
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Ciudad</th>
                        <th>Estado</th>
                        <th style="color:yellow;">Humedad</th>
                        <th>Temperatura</th>
                        <th>Clima</th>
                        <th>Latitud</th>
                        <th>Longitud</th>
                    </tr>
                </thead>';
                echo '<tbody>';

                while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['fecha'] . '</td>';
                    echo '<td>' . $row['ciudad'] . '</td>';
                    echo '<td>' . $row['estado'] . '</td>';
                    echo '<td style="color:yellow;"><b>' . $row['humedad'] . '%</b></td>';
                    echo '<td>' . $row['temperatura'] . 'C°</td>';
                    echo '<td>' . $row['clima'] . '</td>';
                    echo '<td>' . $row['latitud'] . '</td>';
                    echo '<td>' . $row['longitud'] . '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
                echo '</div>';
            } else {
                echo '<p class="text-center">No se encontraron registros.</p>';
            }
        } catch (PDOException $exception) {
            echo '<p class="text-center">Error al obtener los registros: ' . $exception->getMessage() . '</p>';
        }

        // Cerrar la conexión a la base de datos
        $conn = null;
        ?>
 </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<footer style="background-color: #FFF; height: 70%; background-size: cover; background-position: center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                <!-- foto y nombre -->
                <div class="text-center">
                    <h3>David Fernando Rosero G.</h3>
                    <img class="img-fluid" src="../vistas/assets/mi_foto.jpg" alt="Mi Foto">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <!-- Información de la empresa -->
                <div class="text-center">
                    <img class="img-fluid" src="../vistas/assets/logo_empresa.png" alt="Logo Empresa">
                    <p class="text-dark">Copyright &copy; 2023 <a href="https://browsertravelsolutions.com" target="_blank">Browser Travel Solutions</a></p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <!-- Datos personales y redes sociales -->
                <div class="text-center">
                    <h2 class="text-dark">Datos personales</h2>
                    <ul class="list-unstyled text-dark">
                        <li>Correo: <a href="mailto:loquemiradavid@hotmail.com">loquemiradavid@hotmail.com</a></li>
                        <li>WhatsApp: <a href="tel:+573178444099"><i class="fab fa-whatsapp"></i> 3178444099</a></li>
                    </ul>
                    <h2 class="text-dark">Redes Sociales</h2>
                    <ul class="list-unstyled text-light text-center">
                        <li><a href="https://www.linkedin.com/in/david-fernando-rosero-guerrero-29488726/" target="_blank"><i class="fab fa-linkedin"></i> LinkedIn</a></li>
                        <li><a href="https://github.com/CodeMasterDavidRosero/" target="_blank"><i class="fab fa-github"></i> GitHub</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
</html>