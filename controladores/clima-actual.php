<?php

//Clase autoload
require __DIR__.'/../vendor/autoload.php';

//llamamos a la dependencia ApiWeather
use \App\webservice\ApiWeather;

//Instanciamos nuetra API
$objApiWeather = new ApiWeather("dd04e12c6d2d32de6aece3c97328c905"); 

//Verificación de Argumentos
if(!isset($argv[2])){
	die('Ciudad y Código de Region son Obligatorios');
}

//Definición de la variables para la ciudad
$ciudad = $argv[1];
$estado = $argv[2];

//Ejecuta la consulta del API
$datosClima = $objApiWeather-> consultarClimaActual($ciudad,$estado);

//DEBUG
echo 'ciudad:'.$ciudad.'/'.$estado."\n";
echo 'Temperatura:' .($datosClima['main']['temp'] ?? 'Desconocido')."\n";
echo 'Humedad:' .($datosClima['main']['humidity'] ?? 'Desconocido')."\n";

echo 'Clima:' .($datosClima['weather'][0]['description'] ?? 'Desconocido')."\n";

echo 'Longitud:' .($datosClima['coord']['lon'] ?? 'Desconocido')."\n";
echo 'Latitud:' .($datosClima['coord']['lat'] ?? 'Desconocido')."\n";


