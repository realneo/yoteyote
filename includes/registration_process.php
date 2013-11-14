<?php
    include ("../lib/Main.php");

    $main = new Main;
    $user = $main->load_model('User');

<<<<<<< HEAD
    if (isset($_POST['email']) && isset($_POST['password'])){
        if ($user->addUser($_POST)){
            //redirect('/');
            echo'success';
        }else{
=======
    if (isset($_POST['email']) && isset($_POST['password']))
	{
        if ($user->addUser($_POST))
		{
			//redirect('/');
            echo'success';
        }
		else
		{
>>>>>>> new commit
            echo'failed';
        }
    }
?>
