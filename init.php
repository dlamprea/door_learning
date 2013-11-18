<?php

    date_default_timezone_set('America/Bogota');
	setlocale(LC_TIME, 'Spanish');
	
	function fatal_error_handler(){
		
		$arrError = error_get_last();
		
		if( empty($arrError) ){
			return;
		}
	
		$strMsg = substr($arrError['message'], 0,18);
		
		switch($strMsg){
			case "Allowed memory siz":
				echo "Memoria insuficiente en el servidor para procesar esta gran cantidad de Informacion.<br />Por favor pruebe con menos datos.";
			break;
			
			case "Maximum execution ":
				echo "Se ha cancelado la solicitud debido a que se supero el tiempo maximo de espera permitido.";
			break;
			
			case "require() [<a href":
				echo "No se puede encontrar un archivo requerido por el sistema.";
			break;
			
		}
		
		die;
		
	}
     
	register_shutdown_function('fatal_error_handler');
	
	function put($var) {
		echo "<pre>";
		print_r($var);
		echo "</pre>";
	}
	
?>