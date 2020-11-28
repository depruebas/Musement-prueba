<?php

	return array(


		'api_muse' => 'https://api.musement.com/api/v3/cities',
		'api_weather' => 'http://api.weatherapi.com/v1/forecast.json?key=3c5baf8e935b477d927134745202711&',

		'dias_pronostico' => 2,

		# ruta de logs  de la aplicacion
    'ruta_logs' => array(
      'error_log' =>  dirname( dirname(__FILE__)). '/logs/',
    ),

    'debug' => 0,

    # development or production
    'environment' => 'development',

    'salt' => 'xQdjhf2)2¡ad22$w12Ra!',

	);
