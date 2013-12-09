<?php
include_once ('db_table.php');

class user_mdl extends DB_Table {
	function __construct() {
		parent::__construct();
		$this->strTable = "users";
		$this->strPk = "user_id";
    }

}

