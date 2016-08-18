<?php
		$username = $_POST["username"];
		$password = $_POST["password"];
		$return_code = -1;		
		// Login ok-0; wrong password-1; Not activaite-2.
		
		// Require for database object
		require_once("./database.php");
		// Query username and set return code.
		
		if($return_code==1){
				// Login OK, Set Cookies.

		}
		echo $return_code;
?>