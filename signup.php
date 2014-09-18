<?php include('templates/header.php'); ?>

    <div class='row'>
        <div class='col-md-12'>
            <div class='row' id='login_container'>
               <div class='row' id='login_logo'>
                    <div class='col-md-2 col-md-offset-5'>
                        <a href='index.php' class='logo'><img src='images/logo.png' alt='Yoteyote'/>
                    </div>
                </div>
                <div class='col-md-4 col-md-offset-2'>
                    <h4>Signup using Social Media</h4>
                    
                    <div class='login_social_btn'>
                        <a href='#'><img src='images/facebook_btn.gif' alt='Signup with Facebook' /></a>
                        <a href='#'><img src='images/twitter_btn.gif' alt='Signup with Twitter' /></a>
                        <a href='#'><img src='images/googleplus_btn.gif' alt='Signup with Google+' /></a>
                        <a href='#'><img src='images/linkedin_btn.gif' alt='Signup with Linked In' /></a>
                    </div>
                                  
                </div>
                <div class='col-md-4 boxed'>
		    
		    
		    <?php if(isset($_SESSION['alert_type'])){ ?>
			<div class="alert alert-<?php echo $_SESSION['alert_type']; ?> alert-dismissible" role="alert">
			    <button type="button" class="close" data-dismiss="alert">
				<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
			    </button>
			    <?php echo $_SESSION['alert_msg']; ?>
			</div>
		    <?php } ?>
		    
                    
		    <h4>Sign Up</h4>
		    <form name='signup' action='processes/add_user_process.php' method='post'>
			<p>Personal</p>
			<div class="field_text">
			    <input type="text" name="first_name" id="first_name" placeholder="First Name">
			</div>
			<div class="field_text">
			    <input type="text" name="last_name" id="last_name" placeholder="Last Name">
			</div>
			
			<p>Password</p>
			<div class="field_text">
			    <input type="text" name="password" id="password" placeholder="Enter Password">
			</div>
			<div class="field_text">
			    <input type="text" name="password2" id="password2" placeholder="Re-Enter Password">
			</div>
			
			<p>Contact</p>
			<div class="field_text">
			    <input type="text" name="email" id="email" placeholder="Enter Email">
			</div>
			<div class="field_text">
			    <input type="text" name="email2" id="email2" placeholder="Re-Enter Email">
			</div>
			
			<span class="btn btn-green"><input type="submit" value="Sign Up" /></span><span class='text-11'>By Signing Up, You Agree with Our Terms &amp; Conditions</span>
		    </form>
                </div>
            </div>
			   
        </div><!-- col-md-12 -->	
    </div><!--row -->

<?php include('templates/footer.php'); ?>