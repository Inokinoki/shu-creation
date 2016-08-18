<?php
	$database = mysql_connect("localhost","root","creation");
	if($database){
		mysql_query("Set names utf8", $database);
		$db = mysql_select_db("creation", $database);
		if(!$db)
				die(mysql_error());
	} else {
		die(mysql_error());
	}
?>