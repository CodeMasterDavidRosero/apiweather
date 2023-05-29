<!DOCTYPE html>
<html>
<head>
    <title>Clima de las ciudades</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('vistas/assets/fondo.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-10">
                <h1 class="text-center text-light">Clima de las ciudades</h1>
                <div class="text-right mt-3">
                    <p><a href="vistas/historico.php">
                    <font color="#49b063"><b>Ver históricos</b>
                </a></font></p>
                    
                </div>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="ciudad" class="text-light">Seleccione una Ciudad:</label>
                        <select class="form-select" name="ciudad" id="ciudad">
                            <option value="Orlando">Orlando, FL</option>
                            <option value="New York">New York, NY</option>
                            <option value="Miami">Miami, FL</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <input type="submit" class="btn btn-primary" value="Consultar">
                    </div><br>

                </form>                

                <?php
                // Incluir el archivo con la lógica de la consulta
                require 'controladores/consulta-clima.php';
                ?>

                <?php
                $datosgeo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=181.62.52.167"));
                ?>
                
                <div class="border border-info" id="map" class="bordered"></div>

                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5PQCYswNgqMxwFguq2xhCu_x93XK8Wns&callback=initMap" async defer></script>

                <!--Funcion para ingresar las coordenadas-->
                <script>
                    function initMap() {
                        var latitud = <?php echo $_GET['latitud'] ?? $latitud; ?>;
                        var longitud = <?php echo $_GET['longitud'] ?? $longitud; ?>;

                        var coordenadas = { lat: latitud, lng: longitud };
                        var mapa = new google.maps.Map(document.getElementById('map'), {
                            zoom: 12,
                            center: coordenadas
                        });

                        var marker = new google.maps.Marker({
                            position: coordenadas,
                            map: mapa
                        });
                    }
                </script>

                <pre>
                    <?php
                    $latitud = $datosgeo["geoplugin_latitude"];
                    $longitud = $datosgeo["geoplugin_longitude"];
                    ?>
                </pre>
            </div>
        </div>
    </div> 

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
    <?php
    // Incluir el footer
    require 'footer.php';
    ?>
</html>