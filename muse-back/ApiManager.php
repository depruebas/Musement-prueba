<?php

	Class ApiManager extends BaseClass
	{

		function __construct()
	  {
	    parent::__construct();
	  }


	  public function Init()
	  {

	  	$ApiMuse = ConfigClass::get("Config.api_muse");


	  	$cities = json_decode( Curl::Init( $ApiMuse));

	  	foreach ( $cities as $city)
	  	{


	  		$texto = "Processed city " . $city->name . " | ";

	  		$ApiWeather = ConfigClass::get("Config.api_weather") .
	  									"q=" . $city->name .
	  									"&days=" . ConfigClass::get("Config.dias_pronostico");


	  		$forecast = json_decode( Curl::Init( $ApiWeather));
	  		$foreday = $forecast->forecast->forecastday;

	  		if ( !empty( $foreday))
	  		{

	  			for ( $i = 0; $i < count( $foreday); $i++)
		  		{

		  			$texto .= $foreday[$i]->day->condition->text . " - ";
		  		}

		  		$texto = substr( $texto, 0, strlen( $texto) - 2);
		  		print_r( EOF . $texto);

	  		}


	  	}

	  	//return ( $cities);

	  }

	}