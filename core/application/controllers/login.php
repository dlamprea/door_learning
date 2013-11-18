<?php

class Login extends Controller {
	
	function __construct() {
		parent::Controller();
	}

	function doLogin() {
	
		$this->load->plugin('tools');
		
		$strUserName = $this->input->post('username', TRUE);
		$strPassword = $this->input->post('password', TRUE);
		
		if ( empty($strUserName) || empty($strPassword) ) {
			ToJSONMsg("ERR", "Debe especificar usuario y contraseña");
			return;
		}
			
		try {
			$this->auth->loginRoutine($strUserName, $strPassword);
		} catch ( Exception $e ) {
			ToJSONMsg("ERR", $e->getMessage());
			return;
		}
			
		ToJSONMsg("OK", "");
		
	}
	
	function logout() {
		
		try {
			$this->auth->logout();	
		} catch (Exception $e) {
			$arrData['Mensaje'] = $e->getMessage();
			$this->load->view("mensaje",$arrData);
			return;
		}
		
		redirect("main");
		
	}
	
	function cerrar() {
		$this->auth->logout();
		echo '
		<script type="text/javascript" >
			self.close();
		</script>';
		exit;
	}

}
?>
