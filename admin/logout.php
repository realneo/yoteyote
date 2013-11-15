<?php 
include("lib/Main.php"); 
$main = new Main();
$main->Logout();
header("Location: ".$main->config['web_path_admin']."login.php");
?>