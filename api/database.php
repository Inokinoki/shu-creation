<?php
class Database{
	private $db_user	= 	"creation";
	private $db_pwd		= 	"creation";
	private $db_host 	=	"localhost";
	private $db_port 	=	"3306";
	private $db 		= 	null;

	function connect(){
		if($this->db == null){
			$this->db = mysqli_connect($this->db_host, $this->db_user, $this->db_pwd);
			if(!$this->db){
				die(mysqli_error());
			}
			mysqli_query($this->db, "SET names utf8");
			// Limit in creation database.
			mysqli_select_db($this->db, "creation");
		}
	}

	function query($db_query_expression){
		return mysqli_query($this->db, $db_query_expression);
	}

	function count($key, $value, $table){
			$result = mysqli_query($this->db, "SELECT * FROM $table WHERE $key = '$value'");
			// echo "row number:".mysqli_num_rows($result)."\n";
			return mysqli_num_rows($result);
	}

	function exist($key, $value, $table){
		$count_num = $this->count($key, $value, $table);
		// echo "count:".$count_num."\n";
		if ($count_num>0){
			return true;
		}
		return false;
	}

	function error(){
		return mysqli_errno($this->db).":".mysqli_error($this->db);
	}

	function __destruct() {
		if(!$this->db){
			mysqli_close($this->db);
		}
	}
}
?>