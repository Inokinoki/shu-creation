<?php
		$link2sql = mysql_connect("localhost","root","creation");
		if($link2sql){
				$database = mysql_select_db($link2sql, "creation");
				if(!$database)
						die(mysql_error());
		} else {
				die(mysql_error());
		}
?>