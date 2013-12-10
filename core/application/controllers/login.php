<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }
	

	function doLogin() {	
		
		$strUserName = $this->input->post('username', TRUE);
		$strPassword = $this->input->post('password', TRUE);

		
		if ( empty($strUserName) || empty($strPassword) ) {
			$this->tools->ToJSONMsg("ERR", "Debe especificar usuario y contraseña");
			return;
		}
			
		try {
			$log=$this->auth->loginRoutine($strUserName, $strPassword);		
		} catch ( Exception $e ) {
			$this->tools->ToJSONMsg("ERR", $e->getMessage());
			return;
		}
		$this->tools->ToJSONMsg("OK","");
		
	}
	
	function logout() {
		
		try {
			$this->auth->logout();	
		} catch (Exception $e) {
			$arrData['Mensaje'] = $e->getMessage();
			$this->load->view("mensaje",$arrData);
			return;
		}
		
		redirect("/");
		
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
