<?php
		$username = $_POST["username"];
		$password = $_POST["password"];	
		// Login ok-0; wrong password-1; Not activaite-2.
		
		// Require for database object
		require_once("./database.php");
		// Query username and set return code.
		if ($database->exist("SELECT * FROM accounts WHERE username = '$username'")) {
			echo 2;
			exit();
		} else {
			$result = $database->query("SELECT * FROM accounts WHERE username = '$username'");
			mysql_fetch_array($result);
			if (!strcmp($result["password"], $password) ){
				$_id = $result['_id'];
				$uuid = uniqid();
				$database->query("UPDATE accounts SET uuid = '$uuid' WHERE _id = $_id");
				echo 0;
				echo uniqid();
				exit();
			} else {
				echo 1;
				exit();
			}
		}
?>