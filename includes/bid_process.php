<?php
include ("../lib/Main.php");
$main= new Main;
$user  = $main->load_model('User');
$main->initSession();






 if (isset($_GET['list_id']) && $_GET['list_id']!='' )
 {
	 


	 
					$list_id  =  $_GET['list_id'];
					$logged_user  =$_SESSION['user_id'];
					
					
					$res = 	$user->AddOngoing($list_id,$logged_user);

					if ($res =='empty') 
					{
										
					echo 'empty';
											
					}
					else if ($res =='ok') echo 'success';
					else  echo 'fail';
					
		
	 
	
	
 }


?>