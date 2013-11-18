<?php

/**
 * DB_Table
 *
 * Modelo base para la implementacion basica del CRUD en una tabla de la base de datos
 * (En construccion)
 * 
 * 
  */

class DB_Table  extends CI_Model{
	
	var $strTable = NULL;
	var $strPk = NULL;
	
/*	function __construct(){
		parent::Model();
	}*/

	function addRow ( $arrData ){
	
		$this->load->database();
		
		$bolAction = $this->db->insert( $this->strTable, $arrData );		
		
		if( $bolAction !== true ){
			throw new Exception( DB_ERR_MSG . $this->db->_error_message() );
		}
		
		$ID = $this->db->insert_id();
		
		return $ID;
					
	}
			
function getRow($objParams=NULL){
	
		$this->load->database();
		
		$strSelect="*";
		$arrWhere=NULL;
		$strJoin=NULL;
		

		if( isset($objParams->strSelect) ){
			$strSelect = $objParams->strSelect;
		}
		
		if( isset($objParams->arrWhere) ){
			$arrWhere = $objParams->arrWhere;
		}
		
		if( isset($objParams->strOrderBy) ){
			$strOrderBy = $objParams->$strOrderBy;
		}
		
		if( isset($objParams->strJoin) ){
			$strJoin = $objParams->strJoin;
		}
		
		// Construir el SQL.
		
		$strSQL = "SELECT $strSelect FROM $this->strTable ";
		
		if ($strJoin !== NULL ) {
			$strSQL .= $strJoin;
		}
		
		if ($arrWhere !== NULL ) {
			$strSQL .= " WHERE " . implode(" AND ",$arrWhere);
		}
		
		$strSQL .= " LIMIT 1";
		
		$objQuery = $this->db->query($strSQL);
		
		if( $objQuery===false ){
			throw new Exception(DB_ERR_MSG . $this->db->_error_message() );
		}
		
		$objResult = $objQuery->row();
		
		return $objResult;
		
	}
	
	function getRow_ById($ID, $strSelect="*" ){
		
		if( empty($ID) ){
			throw new Exception( "Identificador de Registro no válido" );
		}
		
		@$objParams->strSelect = $strSelect;
		$objParams->arrWhere[] = "$this->strPk={$ID}";
		
		$objResult = $this->getRow($objParams);
			
		return $objResult;

		
	}

function getAll( $objParams=NULL ) {
	
		$this->load->database();
		
		$strSelect="*";
		$arrWhere=NULL;
		$intLimit=NULL;
		$intOffset=NULL;
		$strOrderBy=NULL;
		$strJoin=NULL;
		
		if( isset($objParams->strSelect) ){
			$strSelect = $objParams->strSelect;
		}
		
		if( isset($objParams->arrWhere) ){
			$arrWhere = $objParams->arrWhere;
		}
		
		if ( isset($objParams->intLimit) ){
			$intLimit = $objParams->intLimit;
		}

		if( isset($objParams->intOffset) ){
			$intOffset = $objParams->intOffset;
		}
		
		if( isset($objParams->strOrderBy) ){
			$strOrderBy = $objParams->strOrderBy;
		}
		
		if( isset($objParams->strJoin) ){
			$strJoin = $objParams->strJoin;
		}
		
		// Decidir paginacion
		
		$bolPaginacion = FALSE;
		
		if ($intLimit !== NULL && $intOffset !== NULL) {
			$bolPaginacion = TRUE;
		}
		
		// Construir el SQL.
		
		$strSQL = "SELECT ";
		
		if ( $bolPaginacion == TRUE ) {
			$strSQL .= " SQL_CALC_FOUND_ROWS ";
		}
		
		$strSQL .= " $strSelect FROM $this->strTable ";
		
		if ($strJoin !== NULL ) {
			$strSQL .= $strJoin;
		}
		
		if ($arrWhere !== NULL ) {
			$strSQL .= " WHERE " . implode(" AND " , $arrWhere);
		}
		
		if ($strOrderBy !== NULL ) {
			$strSQL .= " ORDER BY $strOrderBy ";
		}
		
		if ($intLimit !== NULL && $intOffset !== NULL) {	
			$strSQL .= " LIMIT $intLimit OFFSET $intOffset ";
		}
		
	
		$objQuery = $this->db->query($strSQL);
		
		if( $objQuery===false ){
			throw new Exception ( DB_ERR_MSG . $this->db->_error_message() );
		}
		
		@$objResp->Datos = $objQuery->result();
		if ( $bolPaginacion == TRUE ) {
		
			$objQuery = $this->db->query("SELECT found_rows() as TOTAL");
			
			if( $objQuery===false ){
				throw new Exception ( DB_ERR_MSG . $this->db->_error_message() );
			}
			
			$objResult = $objQuery->row();
			
			$objResp->NDatos = $objResult->TOTAL;
			
		} else {
			$objResp->NDatos = count($objResp->Datos);
		}
		
		return $objResp;

	}
	
	function updRow ($ID, $arrData ){
	
		$this->load->database();
		
		$arrWhere[$this->strPk] = $ID;
		$bolResult = $this->db->update( $this->strTable, $arrData, $arrWhere );
		
		if ( $bolResult != true ){
			throw new Exception( DB_ERR_MSG . $this->db->_error_message() );
		}
	
	}
	
	function delRow($strWhere)
	{
	
		if( empty($strWhere) ){
			throw new Exception ("Parametro no valido para eliminar el registro");
		}
		
		$this->load->database();
	
		$strSQL = "DELETE FROM $this->strTable WHERE $this->strPk =$strWhere";
		$bolResult = $this->db->simple_query($strSQL);
		
		if( $bolResult != true ){
			throw new Exception( DB_ERR_MSG . $this->db->_error_message() );
		}
		
	}
	
	function truncate()
	{
	
		$this->load->database();
	
		$strSQL = "TRUNCATE $this->strTable";
		
		$bolResult = $this->db->simple_query($strSQL);
		
		if( $bolResult != true ){
			throw new Exception( DB_ERR_MSG . $this->db->_error_message() );
		}
		
	}
		
}