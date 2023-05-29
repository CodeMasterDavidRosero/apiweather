<?php

namespace App\webservice;

class ApiWeather{

	//Constante para definir la base de conexión
	const BASE_URL = 'https://api.openweathermap.org';

	//Definición de la Key de acceso
	private $apiKey;

	//Instanciamos la clase-Metodo responsable de ingresar la Key del Api
	public function __construct($apiKey){
		$this->apiKey =$apiKey;
	}

	//metodo para obter el clima actual de la cuidad

	public function consultarClimaActual($ciudad, $estado){
		//paramatro de clima 
		return $this->get('/data/2.5/weather', [
			'q' => $ciudad.',NY-'.$estado.',USA'
		]);
	}

	//Metodo que ejecuta el GET en el API
	private function get($recurso, $parametros = []){
		//parametros adicionales estado del clima
		$parametros['units'] = 'metric';
		$parametros['lang'] = 'es';
		$parametros['appid'] = $this->apiKey;

		//Constuimos el Endpoint completo
		$endpoint = self::BASE_URL.$recurso.'?'.http_build_query($parametros);
		
	//Definimos un CURL para el manejo de datos.
		$curl = curl_init();

	//Ajustes del Curl
	curl_setopt_array($curl, [
		CURLOPT_URL => $endpoint,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_CUSTOMREQUEST => 'GET'
		]);

	//Respuesta
	$respuesta = curl_exec($curl);

	//Fecha de conexión
	curl_close($curl);

	//Recibimos la respuesta en un arreglo 
	return json_decode($respuesta, true);

	}

}




