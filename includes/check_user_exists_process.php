<?php
include ("../lib/Main.php");
$main= new Main;
$user = $main->load_model('User');    			
	
    if(isset($_POST['email']) && isset($_POST['mobile']) ){			
        if ($user->checkUserExists($_POST)){
            echo'success';
        }else{
            echo'failed';
        }	 		
    }
?>
