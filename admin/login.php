<?php 
include_once("../lib/Main.php");
$error='';
$main  = new Main();

$admin =   $main->load_model("Admin");
if(isset($_POST['user_name']) && isset($_POST['user_pass']))
{
	
   if (!$admin->adminLogin($_POST))
   {
$error = " <p class='error'>Invalid Username or Password</p>";	   
   }
	
	
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login | Admin</title>
<link href="css/960.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/reset.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/text.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/login.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<div class="container_16">
  <div class="grid_6 prefix_5 suffix_5">
   	  <h1>Admin - Login</h1>
    	<div id="login">
    	               
    	  <form id="frm_login" name="frm_login" method="post" action="">
          
           <?=$error?>
    	    <p>
    	      <label><strong>Username</strong>
<input type="text" name="user_name" class="inputText" id="user_name" />
    	      </label>
  	      </p>
    	    <p>
    	      <label><strong>Password</strong>
  <input type="password" name="user_pass" class="inputText" id="user_pass" />
  	        </label>
    	    </p>
            
    		<a class="black_button" onClick="frm_login.submit();" href="#"><span>Authentification</span></a>
             <!--<label>
             <input type="checkbox" name="checkbox" id="checkbox" />
              Remember me</label> -->           
    	  </form>
		  <br clear="all" />
    	</div>
       <!-- <div id="forgot">
        <a href="#" class="forgotlink"><span>Forgot your username or password?</span></a></div>-->
  </div>
</div>
<br clear="all" />
</body>
</html>
