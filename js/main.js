function is_int(value){ 

  if((parseFloat(value) == parseInt(value)) && !isNaN(value)){

      return true;

  } else { 

      return false;

  } 

}




function preload_start()
{
		$("#status").show();                      // will first fade out the loading animation
		$("#loader").show();
}


function preload_stop()
{

		$("#status").fadeOut();                      // will first fade out the loading animation
		$("#loader").delay(350).fadeOut("slow"); //  will fade out the white DIV that covers the website.

}



function load_page(param,page)
{
	preload_start();

	$('#'+param).load(page).ajaxComplete(function(event, XMLHttpRequest, ajaxOptions) {
  	preload_stop();
    });; 
	
}



$(document).ready(function(){


	$("a").unbind('click');
	$("button").unbind('click');
        
    //Overflow 
    $('#overlay').click(function(){
        $('#popup_window').fadeOut();
        $(this).delay(500).fadeOut();
    });
    
    //Login Process
    $('#sign-in').click(function(){
        $('.preloader').fadeIn();
        if($('#email').val() == "" || $('#password').val() == ""){
            $('.alert').fadeIn(400).html("Enter BOTH Email & Password");
            $('.preloader').fadeOut(400);
        }else{
            var form_action = $('#sign_in_form').attr('action');
            var form_data = {
                email : $('#email').val(),
                password : $('#password').val()
                };
            $.ajax({
                type:'post',
                url: form_action,
                data: form_data,
                success: function(response){
                    if(response == "success"){
                        $('.preloader').fadeOut();
                        $('.dropdown-menu').slideUp();
                        $('#sign_in_dropdown').fadeOut();
                        $('#user').load('includes/logged_user.php?mode=al');
                        
                    }else{
                        $('.alert').fadeIn().html("<p class='error'>Either your Username or Password is incorrect</p>");
                        $('.preloader').fadeOut();
                    }
                }
            });
        }
        return false;
    });
    
    // Registration window
    $('#signup_btn').click(function(){
        $('content').hide();
        $('.preloader').fadeIn();
        $('#posts').hide(400);
        $('#content').load('includes/new_user_form.php');
        $('.preloader').fadeOut();
    });
    //Registration Process
    $('#reg_btn').click(function(){
        $('.preloader').fadeIn();
        // Email Check up
        if($('#email').val() == '' || $('#email2').val() == ''){
            $('.feedback').fadeIn().html("<p class='error'>Please fill in your email address</p>");
            $('.preloader').fadeOut();
            return false;
        }else if($('#email').val() == $('#email2').val()){
            var email = $('#email').val();
            $('.preloader').fadeOut();
        }else{
            $('.feedback').fadeIn().html("<p class='error'>Emails do not match</p>");
            $('.preloader').fadeOut();
            return false;
        }
        // Password Checkup
        if($('#password').val() == '' || $('#password1').val() == ''){
            $('.feedback').fadeIn().html("<p class='error'>Please fill in your password</p>");
            $('.preloader').fadeOut();
            return false;
        }else if($('#password').val() == $('#password2').val()){
            var password = $('#password').val();
            $('.preloader').fadeOut();
        }else{
            $('.feedback').fadeIn().html("<p class='error'>Passwords do not match</p>");
            $('.preloader').fadeOut();
            return false;
        }
        // First / Last Name  Checkup
        if($('#first_name').val()== ''){
            $('.feedback').fadeIn().html("<p class='error'>Enter your First Name</p>");
            $('.preloader').fadeOut();
            return false;
        }else{
            var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();
        }
        // Mobile
        if($('#mobile').val()== '' ){
            $('.feedback').fadeIn().html("<p class='error'>Please enter your Mobile phone</p>");
            $('.preloader').fadeOut();
            return false;
        }else{
            var mobile = $('#mobile').val();
            $('.preloader').fadeOut();
        }
        var form_action = $('#reg_form').attr('action');
        var form_data = {
                email : email,
                password : password,
                first_name : first_name,
                last_name : last_name,
                mobile : mobile
                };
            $.ajax({
                type:'post',
                url: form_action,
                data: form_data,
                success: function(response){
                    if(response == "success"){
                        $('.feedback').fadeIn().html("<p class='success'>Registered Successful</p>");
                        $('.preloader').fadeOut();
                        $('.feedback').delay(500).fadeOut(400);
                        $('#popup_window_title').fadeIn().html('Login');
                        $('#popup_window_content').fadeIn().load('includes/login.php');
                        $('#popup_window').css({'width':'220px'});
                        
                    }else{
                        $('.feedback').fadeIn().html("<p class='error'>There was an error!</p>");
                        $('.preloader').fadeOut();
                    }
                }
            });
        return false;
    });
     // I will post
    $('#will_btn').click(function(){
        // Getting the data from a form
        will_post = $('#will_input').val();
        // check if the user is logged in or not
        $.ajax({
            url:'includes/session_check.php',
            success:function(response){
                if(response == 'success'){
                    $('#overlay').fadeIn(500);
                    $('#popup_window').delay(500).fadeIn(500);
                    $('#popup_window_title').fadeIn().html('I will');
                    $('#popup_window_content').fadeIn().load('includes/new_will.php', function(responseTxt,statusTxt,xhr){
                        if(statusTxt=="success"){
                            $('#will_post').val(will_post);
                        }else{
                            console.log('Failed to load the new_will.php')
                        }
                    });
                    $('#popup_window').css({'width':'400px'}); 
                }else{
                    $('#overlay').fadeIn(500);
                    $('#popup_window').delay(500).fadeIn(500);
                    $('#popup_window_title').fadeIn().html('Login First');
                    $('#popup_window_content').fadeIn().load('includes/login.php');
                    $('#popup_window').css({'width':'220px'});
                }
            }
        });
        return false;
    });
    
    /*************************************************************************/
    /***********************  I WILL - CREATE PROCESS ************************/
    /*************************************************************************/
    $('#will_create_btn').click(function(){
                
        // Loading Icon Fade In
        $('.loader').fadeIn();
        
        // Assigning Variables to the form and its elements
        var form_name = "form[name='new_will_form']";
        var terms = $(form_name + " input[name = 'terms']").is(":checked");
        var will_post = $(form_name + " input[name = 'will_post']").val();
        var description = $(form_name + " textarea[name = 'description']").val();
        var currency = $(form_name + " input[name = 'currency']").val();
        
        console.log(form_name);
        /*
        alert(currency);
        // Preloader Icon
        
        // Checking the will_post input
        if($('#will_post').val() == '' ){
            $('.feedback').fadeIn().html("<p class='error'>Please fill in the 'WILL' Statement</p>");
            $('.preloader').fadeOut();
            return false;
        }
        // Checking the description text field
        if($('#description').val() == '' ){
            $('.feedback').fadeIn().html("<p class='error'>Please give a detailed description of your 'WILL'</p>");
            $('.preloader').fadeOut();
            return false;
        }
        // Checking the amount input
        if($('#amount').val() == '' ){
            $('.feedback').fadeIn().html("<p class='error'>Please state your amount </p>");
            $('.preloader').fadeOut();
            return false;
        }
        var form_action = $('#new_will_form').attr('action');
        var form_data = {
                post : will_post,
                description : description,
                currency : currency,
                amount : amount,
                type : type
                };
            $.ajax({
                type:'post',
                url: form_action,
                data: form_data,
                success: function(response){
                    if(response == "success"){
                        $('.feedback').fadeIn().html("<p class='success'>Successfully Created</p>");
                        $('.preloader').fadeOut();
                        $('.feedback').delay(500).fadeOut(400);
                        $('#popup_window').delay(900).fadeOut(400);
                        $('#overlay').delay(1200).fadeOut(400);
                        $('#posts').fadeOut(400).fadeIn(400).load('includes/posts.php');
                        
                    }else{
                        $('.feedback').fadeIn().html("<p class='error'>There was an error!</p>");
                        $('.preloader').fadeOut();
                    }
                }
            });*/
        return false;
    });
    
    
     // I want post
    $('#want_btn').click(function(){
        // Getting the data from a form
        want_post = $('#want_input').val();
        // check if the user is logged in or not
        $.ajax({
            url:'includes/session_check.php',
            success:function(response){
                if(response == 'success'){
                    $('#overlay').fadeIn(500);
                    $('#popup_window').delay(500).fadeIn(500);
                    $('#popup_window_title').fadeIn().html('I want');
                    $('#popup_window_content').fadeIn().load('includes/new_want.php', function(responseTxt,statusTxt,xhr){
                        if(statusTxt=="success"){
                            $('#want_post').val(want_post);
                        }else{
                            console.log('Failed to load the new_want.php')
                        }
                    });
                    $('#popup_window').css({'width':'400px'}); 
                }else{
                    $('#overlay').fadeIn(500);
                    $('#popup_window').delay(500).fadeIn(500);
                    $('#popup_window_title').fadeIn().html('Login First');
                    $('#popup_window_content').fadeIn().load('includes/login.php');
                    $('#popup_window').css({'width':'220px'});
                }
            }
        });
        return false;
    });    
   // I want post process
    $('#want_create_btn').click(function(){
        //Getting data from the Form
        var want_post = $('#want_post').val();
        var description = $('#description').val();
        var currency = $('input[name=currency]:checked', '#new_want_form').val();
        var amount = $('#amount').val();
        var type = $('#type').val();
        
        // Preloader Icon
        $('.preloader').fadeIn();
        
        // Checking the will_post input
        if($('#want_post').val() == '' ){
            $('.feedback').fadeIn().html("<p class='error'>Please fill in the 'WANT' Statement</p>");
            $('.preloader').fadeOut();
            return false;
        }
        // Checking the description text field
        if($('#description').val() == '' ){
            $('.feedback').fadeIn().html("<p class='error'>Please give a detailed description of your 'WANT'</p>");
            $('.preloader').fadeOut();
            return false;
        }
        // Checking the amount input
        if($('#amount').val() == '' ){
            $('.feedback').fadeIn().html("<p class='error'>Please state your amount </p>");
            $('.preloader').fadeOut();
            return false;
        }
        var form_action = $('#new_want_form').attr('action');
        var form_data = {
                post : want_post,
                description : description,
                currency : currency,
                amount : amount,
                type : type
                };
            $.ajax({
                type:'post',
                url: form_action,
                data: form_data,
                success: function(response){
                    if(response == "success"){
                        $('.feedback').fadeIn().html("<p class='success'>Successfully Created</p>");
                        $('.preloader').fadeOut();
                        $('.feedback').delay(500).fadeOut(400);
                        $('#popup_window').delay(900).fadeOut(400);
                        $('#overlay').delay(1200).fadeOut(400);
                        $('#posts').fadeOut(400).fadeIn(400).load('includes/posts.php');
                    }else{
                        $('.feedback').fadeIn().html("<p class='error'>There was an error!</p>");
                        $('.preloader').fadeOut();
                    }
                }
            });
        return false;
    });  
    

	$('#posts').load('includes/posts.php');
	preload_stop();
	
	
	
	
	
	
	
	
	// Get Contact
     $(document).on('click', '.get_contact_btn', function () {
		 
		
		var button = $(this);
		
		
		
		
		 $.ajax({
            url:'includes/session_check.php',
            success:function(response){
                if(response == 'success'){
					
					 
					$('#overlay').fadeIn(500);
					$('#popup_window').delay(500).fadeIn(500);					
					$('#popup_window_title').fadeIn().html('Profile');

					$('#popup_window_content').fadeIn().load('includes/get_contact.php?id='+button.attr('id'));					
					$('#popup_window').css({'width':'320px'});
              
                }else{
                    $('#overlay').fadeIn(500);
                    $('#popup_window').delay(500).fadeIn(500);
                    $('#popup_window_title').fadeIn().html('Login First');
                    $('#popup_window_content').fadeIn().load('includes/login.php');
                    $('#popup_window').css({'width':'220px'});
                }
            }
        });
	
		
    });
	
	
	
	
	
	
	
	
	
	
	
	
	
//4-22-2013


	
	
	
	
	
	// Get lists
     $(document).on('click', '#list_btn', function () {
		 $("a").unbind('click');
	$("button").unbind('click');
			
			load_page('posts','includes/lists.php');
		
		
    });
	
	
	// Get ongoings
	     $(document).on('click', '#ongoing_btn', function () {
				 $("a").unbind('click');
				$("button").unbind('click');
			
			load_page('posts','includes/ongoings.php');
		
		
    });

	
	
	
	
	
	     $(document).on('click', '.view_bid_btn', function () {
		 
		
			var button = 	$(this);
		
			load_page('posts','includes/bids.php?id='+button.attr('id'));
			
		
		
    });

	
	
	
	
	
	
	
	
	
	
	
	
	
	

	$('#will_sort').click(function(e) {
		
			load_page('posts','includes/posts.php?sort=wills');
		
        
    });

	$('#want_sort').click(function(e) {
		
			load_page('posts','includes/posts.php?sort=wants');
		
        
    });
    $('#all_sort').click(function(e) {
		
			load_page('posts','includes/posts.php');
		
        
    });

	
	//Search
	
	$('#search_btn').click(function(e){
			e.preventDefault();
  			var txt = $('#search_txt').val();
			load_page('posts','includes/posts.php?mode=search&txt='+txt);
	
		
	});






$(document).on('click','.accept_bid_btn',function(e) {
	
	
 		 e.preventDefault();
		 var button = $(this);
		 var list_id = button.attr('id');
		 
		  $.ajax({
                type:'post',
                url: 'includes/bid_process.php?list_id='+list_id,
                success: function(response){
				
				
					if(response == "empty"){
                
                     
                    	
						toastr.error('Please deposit money in your account');
	
					
                        
                      	
                        
                    }					
                    else if(response == "success"){
                        
                     toastr.options.onFadeOut = function() { location.reload();  }      
					  toastr.success('Post Approved', 'Bid Accepted');
				    
                      	                          

	   
				   

                        
                    }else 
								
					{
						 	toastr.error('Some error ocurred please try again');
                        
						
                      
                    }
                }
            });
	
	
	
});







$(document).on('click','.pay_btn',function(e) {
	
	
 		 e.preventDefault();
		 var button = $(this);
		 var ongoing_id = button.attr('id');
		 
		  $.ajax({
                type:'post',
                url: 'includes/on_process.php?on_id='+ongoing_id,
                success: function(response){
				
				
					if(response == "funds"){
                
                     
                    	
						toastr.error('Insufficient funds in your account.Please Deposit money ');
	
					
                        
                      	
                        
                    }					
                    else if(response == "success"){
                        
				     
					  

					
					 toastr.options.onFadeOut = function() { location.reload();  }                                               
			         toastr.success('Payment Completed', 'Post closed with success');

                      

	   
				   

                        
                    }else 
								
					{
						 	toastr.error('Some error ocurred please try again');
                        
						
                      
                    }
                }
            });
	
	
	
});














 $(document).on('click', '.add_apply_btn', function (e) {
	
		 e.preventDefault();
		 
		 
	$("a").unbind('click');
	$("button").unbind('click');
		 
		 var button = $(this);

		var post_id  = $('.post_id').val();
        var post_to_id = $('.post_to_id').val();
		var bid  = $('#bid_amount').val();
		
		
		if(is_int(bid) )
		{
		
		
      
		
		
		
		     $.ajax({
                type:'post',
                url: 'includes/apply_process.php',
                data: {'post_id':post_id,'post_to_id':post_to_id ,'bid':bid },
                success: function(response){
				
				
					if(response == "empty"){
                
                     
                        $('#error_a').fadeIn(400).text('Please deposit money in your account to continue');
						 $('.preloader').fadeOut();
                        
                      	
                        
                    }					
                    else if(response == "success"){
                        
                       
				        $('.feedback').fadeIn().html("<p class='success'>Process completed with success</p>");
                        $('.preloader').fadeOut();
                        $('.feedback').delay(500).fadeOut(400);
                        $('#popup_window').delay(900).fadeOut(400);
                        $('#overlay').delay(1200).fadeOut(400 , function() {
                      	load_page('posts','includes/posts.php');                            
                        });;
	   
				   

                        
                    }else 
								
					{
						  $('.preloader').fadeIn();	
					      $('#error_a').fadeIn(400).text('Some error occured please try again after some time');
						 $('.preloader').fadeOut();
                        
						
                      
                    }
                }
            });
		
		}
		else 
		{
			  $('.preloader').fadeIn();	
			  $('#error_a').fadeIn(400).text('Please enter valid amount');
			 $('.preloader').fadeOut();
			
			
		}
		
		
		
    });

















  $(document).on('click', '.add_trust_btn', function (e) {
	$("a").unbind('click');
	$("button").unbind('click');
		e.preventDefault();
		 var button = $(this);
		var trust_by  = button.attr('id');
		var post_id  = $('.trusted_to').val();
       
		
		
		
		
		
		     $.ajax({
                type:'post',
                url: 'includes/trust_process.php',
                data: {'by':trust_by,'post_id':post_id},
                success: function(response){
                    if(response == "success"){
                        
                         $('.feedback').delay(500).fadeOut(400);
                        $('#popup_window').delay(900).fadeOut(400);
                        $('#overlay').delay(1200).fadeOut(400);
                      	load_page('posts','includes/posts.php');
                        
                    }else 
								
					{
					
					button.text('trusted');
                      
                    }
                }
            });
		
        
    });

	





//Hire / Apply


	// Get Contact
     $(document).on('click', '.apply_btn', function () {
		 $("a").unbind('click');
	$("button").unbind('click');
		
		var button = $(this);
   
		
		
		
		 $.ajax({
            url:'includes/session_check.php',
            success:function(response){
                if(response == 'success'){
					
					 
					$('#overlay').fadeIn(500);
					$('#popup_window').delay(500).fadeIn(500);					
					$('#popup_window_title').fadeIn().html('Description');
					$('#popup_window_content').fadeIn().load('includes/get_apply.php?id='+button.attr('id'));					
					$('#popup_window').css({'width':'320px'});
              
                }else
				{
                    $('#overlay').fadeIn(500);
                    $('#popup_window').delay(500).fadeIn(500);
                    $('#popup_window_title').fadeIn().html('Login First');
                    $('#popup_window_content').fadeIn().load('includes/login.php');
                    $('#popup_window').css({'width':'220px'});
                }
            }
        });
	
		
    });
	
	
	
	
	

					
	
	
});//ready ends