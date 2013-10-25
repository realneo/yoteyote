<?php
	$db_conn = mysql_connect("localhost","root","","");
	if(!$db_conn) {
		die("Failed to Connect to the Database");
	}
	$db_select = mysql_select_db("yoteyote_db", $db_conn);
	if(!$db_select){
		die("Failed to Select the Database");
	}
?>