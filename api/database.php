<?php
		$database = mysql_connect("localhost","root","creation");
		if($database){
				$db = mysql_select_db("creation", $database);
				if(!$db)
						die(mysql_error());
		} else {
				die(mysql_error());
		}
?>