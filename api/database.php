<?php
class Database{
	private $db_user	= 	"creation";
	private $db_pwd		= 	"creation";
	private $db_host 	=	"localhost";
	private $db_port 	=	"3306";
	private $db 		= 	null;

	function connect(){
		if($this->db == null){
			$this->db = mysql_connect($this->db_host, $this->db_user, $this->db_pwd);
			if(!$this->db){
				die(mysql_error());
			}
			mysql_query("SET names utf8", $db);
			// Limit in creation database.
			mysql_select_db("creation", $db);
		}
	}

	function query($db_query_expression){
		return mysql_query($db_query_expression, $db);
	}

	function count($key, $value, $table){
			$result = mysql_query("SELECT * IN $table WHERE $key = '$value'", $db);
			return mysql_num_rows($result);
	}

	function exist($key, $value, $table){
			return count($key, $value, $table)==0 ? false : true;
	}

	function __destruct() {
		if(!$db){
			mysql_close($db);
		}
	}
}
?>