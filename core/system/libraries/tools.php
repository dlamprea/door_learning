<?php

	function getIPCliente() {
		return Getenv("REMOTE_ADDR");
	}

	function getFecha() {
		return date("Y-m-d", time() );
	}
	
	function getHora() {
		return date("H:i:s", time() );
	}
	
	function getFechaHora() {
		return date("Y-m-d H:i:s", time() );
	}
	
	function ToSQLAnd($arrData) {
		$strRet = " ( " . implode(" AND ", $arrData) ." ) " ;
		return $strRet;
	}
	
	function ToSQLOr($arrData) {
		$strRet = " ( " . implode(" OR ", $arrData) ." ) " ;
		return $strRet;
	}
	
	function ToNULL($strDato){
		if ( $strDato==="" || $strDato===NULL || $strDato===FALSE || $strDato==="null" ){
			return NULL;
		}else{
			return $strDato;
		}
	}
	
	function ToJSONMsg($Tipo,$Msg){
		$arrResp['Res'] = $Tipo;
		$arrResp['Msg'] = $Msg;
		echo json_encode($arrResp);
	}
	
	function ToVacio($strDato){
		
		if ( $strDato==="" || $strDato===NULL || $strDato===FALSE ){
			return "";
		}else{
			return $strDato;
		}
		
	}
	
	function EliminarAcentos($str){
		
		$Patron = array (
 
			// Vocales
			'/á/' => 'a',	'/Á/' => 'A',
			'/é/' => 'e',	'/É/' => 'E',
			'/í/' => 'i',	'/Í/' => 'I',
			'/ó/' => 'o',	'/Ó/' => 'O',
			'/ú/' => 'u',	'/Ú/' => 'U',
 
			'/à/' => 'a',	'/À/' => 'A',
			'/è/' => 'e',	'/È/' => 'E',
			'/ì/' => 'i',	'/Ì/' => 'I',
			'/ò/' => 'o',	'/Ò/' => 'O',
			'/ù/' => 'u',	'/Ù/' => 'U',
 
			'/â/' => 'a',	'/Â/' => 'A',
			'/ê/' => 'e',	'/Ê/' => 'E',
			'/î/' => 'i',	'/Î/' => 'I',
			'/ô/' => 'o',	'/Ô/' => 'O',
			'/û/' => 'u',	'/Û/' => 'U',
  
			'/ä/' => 'a',	'/Ä/' => 'A',
			'/ë/' => 'e',	'/Ë/' => 'E',
			'/ï/' => 'i',	'/Ï/' => 'I',
			'/ö/' => 'o',	'/Ö/' => 'O',
			'/ü/' => 'u',	'/Ü/' => 'U',
			
			// Otras letras y caracteres especiales
			'/ñ/' => 'n',
			'/Ñ/' => 'N'
 
			// Agregar aqui mas caracteres si es necesario
 
		);
 
		$text = preg_replace(array_keys($Patron),array_values($Patron),$str);
		
		return $text;
	
	}

