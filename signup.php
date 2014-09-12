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
                    <h4>Sign Up</h4>
                    
                    <p>Personal</p>
                    <div class="field_text">
                        <input type="text" name="first_name" id="first_name" placeholder="First Name">
                    </div>
                    <div class="field_text">
                        <input type="text" name="last_name" id="last_name" placeholder="Last Name">
                    </div>
                    
                    <p>Contact</p>
                    <div class="field_text">
                        <input type="text" name="email" id="email" placeholder="Enter Email">
                    </div>
                    <div class="field_text">
                        <input type="text" name="email2" id="email2" placeholder="Re-Enter Email">
                    </div>
                    
                    <a href="#" class="btn btn-green"><span>Sign Up</span></a> <span class='text-11'>By Signing Up, You Agree with Our Terms &amp; Conditions</span>
 
                </div>
            </div>
			   
        </div><!-- col-md-12 -->	
    </div><!--row -->

<?php include('templates/footer.php'); ?>