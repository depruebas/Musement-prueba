<?php

		# Iniciamos el timer para ver el tiempo que tarda la api en procesar una peticíon
  $start_time = microtime(true);

  # Guardamos la fecha con la que se inicia la API en cada petición, despues la utilizaremos en los
  # logs para saber cuando fue la petición
  global $init_time;
  $init_time = date( "Y-m-d H:i:s");


  # Incluimos los headers para que
  # el content-type y el cache ( no queremos que se cacheen los resultados )
  header('Content-Type: text/plain; charset=utf-8');


  # Añadimos las librerias .php que vamos a necesitar en la API
  require_once dirname(__FILE__)."/libs/ConfigClass.php";
  require_once dirname(__FILE__)."/libs/CustomErrorLog.php";
  require_once dirname(__FILE__)."/libs/Curl.php";
  require_once dirname(__FILE__)."/BaseClass.php";
  require_once dirname(__FILE__)."/ApiManager.php";

  # Inicializamos CustomErrorLog, para procesar automaticamente los errores
  # El directorio ./logs tiene que tener permisos de escritura
  $e = new CustomErrorLog();

  # Defimos las costantes del programa
  define( 'DEBUG', ConfigClass::get("Config.debug"));
  define( 'ENVIRONMENT', ConfigClass::get("Config.environment"));
  define( "EOF", "\n");


  $APIM = new APIManager();
  $return = $APIM->Init();

  print_r ( $return);

  # Si tenemos la depuración activada se registra el tiempo que tarda en procesar las peticiones
  if ( DEBUG)
  {
    $time = microtime(true) - $start_time;

    echo EOF.( $time ) . EOF;
  }

