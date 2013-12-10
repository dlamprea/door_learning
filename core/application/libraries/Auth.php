<?php

class Auth {
	
	function __construct() {
		$this->CI = &get_instance();
	}
	
	function isLoggedIn($arrPerfiles)
	{
		
		$arrAuth = $this->CI->session->userdata('Auth');		
		if( $arrAuth['logged_in'] != TRUE ){
			throw new Exception("Sesion no valida o caducada, por favor identifiquese");
		}

		$bolAcceso = FALSE;
		$arrRoles = $arrAuth['arrRoles'];		
		

		foreach ( $arrRoles as $Row ){
			if ( in_array($Row,$arrPerfiles) ) {
				$bolAcceso = TRUE;
			}
		}
		
		if( $bolAcceso == FALSE ){
			throw new Exception("Perfil no valido para ejecutar esta operacion");
		}

	}
	
	function loginRoutine($strUserName, $strPassword)
	{
			
		$strAuthMode = $this->CI->config->item('auth_mode');
		$bolDevMode = $this->CI->config->item('dev_mode');
		
		switch ($strAuthMode) {
			
			case "LDAP":
			
				if ( $bolDevMode == FALSE ){
					$this->autenticar_ldap($strUserName,$strPassword);
				}
			
			break;
			
			case "DATABASE":
			
				if ( $bolDevMode == FALSE ){
					$this->autenticar_db($strUserName,$strPassword);
				}
			
			break;
			
			default:
				throw new Exception ("Configuracion incorrecta de Autenticacion");
			break;
		
		}
		
		$objDB = $this->CI->load->database('default',TRUE);
		
		$strSQL = "SELECT * FROM users WHERE email = ?";
		$arrBinds = array($strUserName);
		
		$objQuery = $objDB->query($strSQL, $arrBinds);
		
		if ( $objQuery == FALSE ) {
			throw new Exception ( DB_ERR_MSG . $objDB->_error_message() );
		}
		
		$objUsuario = $objQuery->row();
		
		if ( empty($objUsuario) ) {
			throw new Exception ("El usuario no se encuentra registrado en el aplicativo");
		}
	
		if ( $objUsuario->status_id != "1" ) {
			throw new Exception ("El usuario no se encuentra activo");
		}

		$strSQL = "SELECT rol_id FROM roles_users WHERE user_id = ?";
		$arrBinds = array($objUsuario->user_id);
		
		$objQuery = $objDB->query($strSQL, $arrBinds);

		if ( $objQuery == FALSE ) {
			throw new Exception ( DB_ERR_MSG . $objDB->_error_message() );
		}

		$arrRolesDB = $objQuery->result();

		if ( empty($arrRolesDB) ){
			throw new Exception ("El usuario no se encuentra asociado a ningun Rol");
		}
		
		
		$arrRoles = array();

		foreach ( $arrRolesDB as $Row ) {
			$arrRoles[] = $Row->rol_id;
		}

		$arrAuth['Auth']['objUsuario'] = $objUsuario;
		$arrAuth['Auth']['arrRoles'] = $arrRoles;
		$arrAuth['Auth']['logged_in'] = TRUE;
		
		$this->CI->session->set_userdata($arrAuth);
		
		# Registrar el log de Conexion				
		
		$objDataLog->user_id = $objUsuario->user_id;
		$objDataLog->message = 'logeo';
		$objDataLog->date_creation = $this->CI->tools->getFechaHora();
		//$objDataLog->uslg_ip = getIPCliente();
		$this->CI->load->model("usuarios_mdl");
		
		$bolAction = $this->CI->usuarios_mdl->addLog($objDataLog);
	
	}
	
	function logout()
	{
	
		$usua_id = $this->getUserID();

		$objDataLog->user_id = $usua_id;
		$objDataLog->message = 'deslogeo';
		$objDataLog->date_creation = $this->CI->tools->getFechaHora();
		//$objDataLog->uslg_ip = getIPCliente();
		$this->CI->load->model("usuarios_mdl");
		
		$bolAction = $this->CI->usuarios_mdl->addLog($objDataLog);
		# Cambiar el estado del usuario a Desconectado
		
		$this->CI->session->sess_destroy();
		
	}
	
	function getUserID()
	{
		$arrAuth = $this->CI->session->userdata('Auth');
		return $arrAuth['objUsuario']->user_id; 
	}
	
	function getUserData($strIndex)
	{
		$arrAuth = $this->CI->session->userdata('Auth');
		return $arrAuth['objUsuario']->$strIndex;
	}
	
	function getUserObject()
	{
		$arrAuth = $this->CI->session->userdata('Auth');
		return $arrAuth->objUsuario;
		
	}
	
	function getRoles()
	{
		$arrAuth = $this->CI->session->userdata('Auth');
		return $arrAuth['arrRoles'];
	}
	
	private function autenticar_db($username, $password)
	{
		
		$objDB = $this->CI->db;
		
		$SQL = "SELECT usua_id FROM tbl_usuarios WHERE usua_usuario=? AND usua_clave=?";
		
		$DataSQL = array($username, md5($password) );
		
		$Query = $objDB->query($SQL, $DataSQL);
		
		if( $Query==false ){
			throw new exception("Error al consultar la Base de Datos. <br/>" .mysql_error() );
		}
		
		$Result = $Query->result();
	
		if( empty($Result) ) {
			throw new exception("Nombre de usuario o contraseña incorrecta");
		}
	
	}
	
	private function autenticar_ldap($username, $password)
	{
		
		$LDAP_accsufix= '@multienlace.com.co';
		
		if ( !function_exists("ldap_connect") ){
			throw new Exception("No se encuentra la extension LDAP");
		}
		
		$ldapconn = ldap_connect(LDAP_SERVER1);
		
	    $ldapbind = @ldap_bind($ldapconn, $username.$LDAP_accsufix, $password);
	    
	    if (!$ldapbind) {
	    	
	    	$ErrNUM = ldap_errno($ldapconn);
	    	
	    	switch ($ErrNUM){
	    		
	    		case 81:
	    			throw new Exception( "No se puede conectar al servidor LDAP");
	    		break;
	    		
	    		case 49:
	    			throw new Exception( "Usuario o contraseña no valida");
	    		break;
	    		
	    		default:
	    			throw new Exception( ldap_error($ldapconn) );
	    		break;
	    		
	    	}
	    	
	    }
	
	}



}
