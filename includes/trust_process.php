<?php
include ("../lib/Main.php");
$main= new Main;
$user  = $main->load_model('User');







 if (isset($_POST['by']) && isset($_POST['post_id']) )
 {
	 


	 
	$trusted_to  =  $_POST['post_id'];
	$trusted_by  =$_POST['by'];
	
	if ($trusted_to == $trusted_by)
	
	  {
		 echo 'cannot';
	
	  }else 
	
	
				{	
					if ($user->addTrust($trusted_by,$trusted_to)) 
					{
					echo 'success';
						
					}
					else  echo 'fail';
				}
	
	 
	
	
 }


?>