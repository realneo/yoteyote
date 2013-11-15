<?php
include ("../lib/Main.php");

$main = new Main;

if (isset($_POST['email']) && isset($_POST['password']) )
{
	if ($main->checkLogin($_POST))
	{
		echo 'success';
	}

}

?>