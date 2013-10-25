<?php
   
    include('../lib/Main.php');
	$main = new Main;
	$main->initSession();
    if (!$_SESSION['user_id']){
        echo "failed";
    }else{
        echo "success";
    }
?>