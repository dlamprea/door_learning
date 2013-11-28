<?php
include_once ('db_table.php');

class Usuarios_mdl extends DB_Table {	
	
	function __construct() {
		parent::__construct();
		$this->strTable = "tbl_usuarios";
		$this->strPk = "usua_id";
    }

	function addRegistro ( $arrData, $arrRoles=NULL ){
		
		$this->load->database();
		
		$strSQL = "SELECT usua_usuario FROM $this->strTable WHERE usua_usuario=?";
		
		$arrParams = array ($arrData['usua_usuario']);
		
		$objQuery = $this->db->query($strSQL,$arrParams);
		
		if( $objQuery===false ){
			throw new Exception( DB_ERR_MSG . mysql_error() );
		}
		
		if( $objQuery->num_rows() != 0 ){
			throw new Exception("Nombre de Usuario Duplicado, por favor especifique otro");
		}
			
		$this->db->trans_begin();

		$bolAction = $this->db->insert( $this->strTable, $arrData );
		
		if( $bolAction !== true ){
			$strError = mysql_error();
			$this->db->trans_rollback();
			throw new Exception( DB_ERR_MSG . $strError  );
		}
					
		$usua_id = $this->db->insert_id();
		
		if ( !empty($arrRoles) ){
			
			foreach( $arrRoles as $Row ){
				try{
					$this->addRol($usua_id, $Row);
				}catch(exception $e){
					$this->db->trans_rollback();
					throw $e;
				}
			}
		} 
		
		$this->db->trans_commit();
				
	}
			
	function updRegistro ($usua_id, $arrData ){
	
		$this->load->database('default',FALSE,TRUE);
		
		$this->db->where( 'usua_id', $usua_id );
		$blnResult = $this->db->update( $this->strTable, $arrData );
		
		if ($blnResult != true){
			throw new Exception( DB_ERR_MSG . mysql_error() );
		}
	
	}
	
	function updUsuario($usua_id, $arrData, $arrRoles=NULL){
	
		$this->load->database('default',FALSE,TRUE);
		
		$this->db->trans_begin();
			
		$this->db->where( 'usua_id', $usua_id );
		$blnResult = $this->db->update( $this->strTable, $arrData );
		
		if ( $blnResult===false ){
			$strError = mysql_error();
			$this->db->trans_rollback();
			throw new Exception( DB_ERR_MSG . $strError );
		}
		
		$this->delRoles($usua_id);
		
		if( !empty($arrRoles) ){
			
			foreach( $arrRoles as $Row ){
				try{
					$this->addRol($usua_id, $Row);
				}catch(exception $e){
					$this->db->trans_rollback();
					throw $e;
				}
			}
			
		}
		
		$this->db->trans_commit();
		
	}
	
	function addLog( $objData ) {
		
		$bolAction = $this->db->insert('tbl_usuarioslog',$objData);
		
		if ( $bolAction == FALSE ) {
			throw new Exception ("Error interno de la aplicacion, al registrar el log de Conexion.");
		}
		
	}

	function getRow($strSelect="*", $arrWhere=NULL){
	
		$this->load->database();
		$this->load->plugin('tools');
		
		$strSQL = "SELECT $strSelect,
			(SELECT GROUP_CONCAT(usrl_rol ORDER BY usrl_rol) FROM tbl_usuariosroles WHERE usrl_usua_id=usua_id) as usua_roles
			FROM $this->strTable";
		
		if ($arrWhere !== NULL ) {
			$strSQL .= " WHERE " . ToSQLAnd($arrWhere);
		}
		
		$objQuery = $this->db->query($strSQL);
		
		if( $objQuery===false ){
			throw new Exception(DB_ERR_MSG . mysql_error() );
		}
		
		$objResult = $objQuery->row();
		
		return $objResult;
		
	}
	
	function getRow_ById( $ID ){
		
		if( empty($ID) ){
			throw new Exception( "Identificador de usuario no válido" );
		}
		
		$strSelect = "*";
		$arrWhere[] = "usua_id={$ID}";
		
		$Result = $this->getRow($strSelect,$arrWhere);
		
		return $Result;

		
	}

	function getLista($strSelect="*", $arrWhere=NULL, $Limit=NULL, $Offset=NULL) {
	
		$this->load->plugin('tools');
		$this->load->database();
		
		$SQL = "SELECT SQL_CALC_FOUND_ROWS $strSelect,
				(SELECT GROUP_CONCAT(usrl_rol ORDER BY usrl_rol) FROM tbl_usuariosroles WHERE usrl_usua_id=usua_id) as usua_roles 
				FROM $this->strTable";
		
		if ($arrWhere !== NULL ) {
			$SQL .= " WHERE " .ToSQLAnd($arrWhere);
		}
		
		if ($Limit !== NULL && $Offset !== NULL) {	
			$SQL .= " LIMIT $Limit OFFSET $Offset";
		}
	
		$objQuery = $this->db->query($SQL);
		
		if( $objQuery===false ){
			throw new Exception ( DB_ERR_MSG . mysql_error() );
		}
		
		$objResp->Datos = $objQuery->result();
		
		$objQuery = $this->db->query("SELECT found_rows() as TOTAL");
		
		if( $objQuery===false ){
			throw new Exception ( DB_ERR_MSG . mysql_error() );
		}
		
		$objResult = $objQuery->row();
		
		$objResp->NDatos = $objResult->TOTAL;

		return $objResp;

	}

	function addRol($usua_id,$strRol){
		
		$arrData['usrl_usua_id'] = $usua_id;
		$arrData['usrl_rol'] = $strRol;
		
		$bolAction = $this->db->insert("tbl_usuariosroles",$arrData);
		
		if($bolAction!=true){
			throw new Exception ("Error al agregar el usuario el rol: $strRol"); 
		}
		
	}
	
	function delRoles($usua_id){
		
		$arrWhere['usrl_usua_id'] = $usua_id;
		$bolAction = $this->db->delete("tbl_usuariosroles",$arrWhere);
		
		if($bolAction!=true){
			throw new Exception ("Error al borrar del usuario el rol: $strRol"); 
		}
		
	}
}
