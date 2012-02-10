<?php

class X_Base {
	
	public $db;
	public $file;
	private $last_error;
	public $query;
	private $last_query;
	private $last_insert_id;
	private $table;
	private $conn = 'default';
	private $connected = FALSE;
	
	private static $instance = NULL;
	private function __construct() {
	}
	
	public static function getInstance() {
		
		if (NULL === self::$instance) {
			self::$instance = new self ();
		}
		return self::$instance;
	}
	private function __clone() {
	}
	
	public function set_config_file($file) {
		$this->file = $file;
		include_once $this->file;
		$this->db = $db;
	}
	
	public function set_connection($conn) {
		$this->conn = $conn;
	}
	
	public function connectToDatabase() {
		if ($this->file == NULL) {
			return new Exception ( 'You must provide a confige file! Use either <b>set_config_file</b> function or the the first constructor parameter!' );
		}
		$db = $this->db [$this->conn];
		
		mysql_connect ( $db ['host'], $db ['username'], $db ['password'] );
		mysql_select_db ( $db ['database'] );
		
		$this->connected = TRUE;
	}
	
	public function print_last_error() {
		echo $this->last_error;
	}
	
	public function last_error() {
		return $this->last_error;
	}
	
	public function last_query() {
		return $this->last_query;
	}
	
	public function get($table) {
		
		$this->query = '';
		
		$table = mysql_real_escape_string ( $table );
		
		$this->query .= "SELECT * FROM $table";
		
		return $this;
	}
	
	public function select($columns = '*') {
		
		$this->query = '';
		
		$cols = "";
		if ($columns === '*') {
			$cols = '*';
		} else {
			if (is_string ( $columns )) {
				
				if (count ( $columns = explode ( ",", $columns ) ) == 1) {
					$cols = "`$columns[0]`";
					$columns = '';
				}
			}
			
			if (is_array ( $columns )) {
				foreach ( $columns as $c ) {
					$c = str_replace ( " ", "", $c );
					$cols .= "`$c`, ";
				}
				$cols = substr ( $cols, 0, - 2 );
			}
		
		}
		
		$this->query .= "SELECT " . $cols;
		return $this;
	}
	
	public function from($table) {
		$string = " FROM " . $table;
		
		$this->query .= $string;
		
		return $this;
	}
	
	public function where($params, $param2 = NULL) {
		$wheres = "";
		// (array("id" => "5",...))
		if (is_array ( $params )) {
			foreach ( $params as $key => $value ) {
				$wheres .= "`$key` = '$value' AND ";
			}
			$wheres = substr ( $wheres, 0, - 4 );
		}
		// ("id", "5")
		if (is_string ( $params ) && ($param2 != NULL)) {
			$wheres = "$params = '$param2'";
		}
		// "id=5"
		if (is_string ( $params ) && ($param2 == NULL)) {
			$wheres = "$params";
		}
		
		$this->query .= " WHERE $wheres";
		return $this;
	}
	
	public function xxx($params) {
	
	}
	
	public function sql($query) {
		$this->query .= " " . $query;
		return $this;
	}
	
	public function insert_into($table, $data) {
		$this->table = $table;
		$table = "`$table`";
		
		$fields = "";
		$values = "";
		foreach ( $data as $key => $value ) {
			$fields .= "`$key`,";
			$values .= "'$value',";
		}
		
		$fields = substr ( $fields, 0, - 1 );
		$values = substr ( $values, 0, - 1 );
		
		$this->query = "INSERT INTO $table ($fields) VALUES ($values)";
		
		return $this;
	}
	
	public function insert_ignore_into($table, $data) {
		$this->table = $table;
		$table = "`$table`";
	
		$fields = "";
		$values = "";
		foreach ( $data as $key => $value ) {
			$fields .= "`$key`,";
			$values .= "'$value',";
		}
	
		$fields = substr ( $fields, 0, - 1 );
		$values = substr ( $values, 0, - 1 );
	
		$this->query = "INSERT IGNORE INTO $table ($fields) VALUES ($values)";
	
		return $this;
	}
	
	public function replace_into($table, $data) {
		$this->table = $table;
		$table = "`$table`";
	
		$fields = "";
		$values = "";
		foreach ( $data as $key => $value ) {
			$fields .= "`$key`,";
			$values .= "'$value',";
		}
	
		$fields = substr ( $fields, 0, - 1 );
		$values = substr ( $values, 0, - 1 );
	
		$this->query = "REPLACE INTO $table ($fields) VALUES ($values)";
	
		return $this;
	}
	
	public function update($table, $data) {
		$this->table = $table;
		$table = "`$table`";
		
		$set = "";
		foreach ( $data as $key => $value ) {
			$set .= "`$key` = '$value',";
		}
		
		$set = substr ( $set, 0, - 1 );
		
		$this->query = "UPDATE $table SET $set";
		
		return $this;
	}
	
	public function last_insert_id() {
		return $this->last_insert_id;
	}
	
	public function delete_from($table) {
		
		$this->query = "DELETE FROM `$table`";
		$this->table = $table;
		return $this;
	}
	
	public function execute() {
		if (mysql_query ( $this->query )) {
			$this->last_insert_id = mysql_insert_id ();
			$this->last_query = $this->query;
			$this->query = "";
			mysql_query ( "ALTER TABLE $this->table AUTO_INCREMENT = 1;" );
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function fetch_object() {
		$query = mysql_query ( $this->query );
		
		$return = array ();
		
		while ( $result = @mysql_fetch_object ( $query ) ) {
			$return [] = $result;
		}
		
		$this->last_query = $this->query;
		$this->query = "";
		
		return $return;
	}
	
	public function stripslashes_deep(&$array) { // @todo:
		$return = array ();
		foreach ( $array as $k => $v ) {
			if (is_array ( $v )) {
				$this->stripslashes_deep ( $v );
			} else {
				stripslashes ( $v );
			}
		}
	}
	
	public function reset_auto_increment($table) {
		$this->sql ( "ALTER TABLE $table AUTO_INCREMENT=1" )->execute ();
	}
}