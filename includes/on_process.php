<?php
include ("../lib/Main.php");
$main= new Main;
$user  = $main->load_model('User');
$main->initSession();






 if (isset($_GET['on_id']) && $_GET['on_id']!='' )
 {
	 


	 
					$on_id  =  $_GET['on_id'];
					$logged_user  =$_SESSION['user_id'];
					
					
					$res = 	$user->iniPayment($on_id,$logged_user);

					if ($res =='funds') 
					{
										
					echo 'funds';
											
					}
					else if ($res =='ok') echo 'success';
					else  echo 'fail';
					
		
	 
	
	
 }


?>