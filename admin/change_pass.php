<?php 
include("header.php");
include("sidebar.php");
?>

<style>

#login 
{

 background: url("../images/bg_login.gif") repeat-x scroll left top #F6F5F5;
    border: 1px solid #666666;
    margin: 20px 3% 0;
    padding: 20px;

}



.inputText {
    background: none repeat scroll 0 0 #FFFFF8;
    border: 1px solid #999999;
    color: #333333;
    font-family: "Trebuchet MS",Arial,Helvetica,sans-serif;
    font-size: 16px;
    margin: 5px;
    padding: 7px;
    width: 270px;
}
</style>	
	
	
	<section id="main" class="column">
	<h4 class="alert_info">Change Your Password</h4>
        
    <?php  

	if (isset($_POST['confirm_pass']) && $_POST['btn_save']=='Save Password')
	{

                 

		$admin =   $main->load_model("admin");
		$admin->changePass($_POST);
		
		
	}
	
	 ?>
		  <div id="login">
    	               
    	  <form id="frm_change_pass" name="frm_change_pass" method="post" action="">
          
         
    	    <p>
    	      <label><strong>New Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </strong>
<input type="password" name="new_pass" value="" class="inputText" id="new_pass" />	
    	      </label>
  	      </p>
    	    <p>
    	      <label><strong>Confirm Password</strong>
  <input type="password" name="confirm_pass" class="inputText" id="confirm_pass" />
  	        </label>
    	    </p>
          <input type="submit" name="btn_save" class="alt_btn" value="Save Password">
    		
             <!--<label>
             <input type="checkbox" name="checkbox" id="checkbox" />
              Remember me</label> -->           
    	  </form>
		  <br clear="all" />
    	</div>
    <div style="height:700px"></div>
	</section>
    
<?php  include("footer.php");?>