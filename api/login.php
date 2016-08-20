<?php
		$username = $_POST["username"];
		$password = $_POST["password"];	
		// Login ok-0; wrong password-1; Not activaite-2.
		
		// Require for database object
		require_once("./database.php");
		// Query username and set return code.
		if (!$database->exist("username", $username, "accounts")) {
			echo 2;
			exit();
		} else {
			$result = $database->query("SELECT * FROM accounts WHERE username = '$username'");
			$result = mysql_fetch_array($result);
			if ( $result["password"]== $password ){
				// Right password, generate uuid and set it to cookies
				$_id = $result['_id'];
				$uuid = uniqid();
				$database->query("UPDATE accounts SET uuid = '$uuid' WHERE _id = $_id");
				echo "0|".$uuid;
				// I'm sorry but we can't set cookies in ajax.
				// setcookie("creation_uuid", $uuid);
				exit();
			} else {
				// Wrong password, return 1.
				echo 1;
				exit();
			}
		}
?>