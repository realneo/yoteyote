function is_int(value){ 
    if((parseFloat(value) == parseInt(value)) && !isNaN(value)){
        return true;
    }else { 
        return false;
    } 
}

function preload_start(){
    $("#status").show();  // will first fade out the loading animation
    $("#loader").show();
}

function preload_stop(){
    $("#status").fadeOut(); // will first fade out the loading animation
    $("#loader").delay(350).fadeOut("slow"); //  will fade out the white DIV that covers the website.
}

function load_page(param,page){
	preload_start();
	$('#'+param).load(page).ajaxComplete(function(event, XMLHttpRequest, ajaxOptions) {
            preload_stop();
        });; 	
}

$(document).ready(function(){
    
    $("a").unbind('click');
    $("button").unbind('click');
    
    // Hiding Objects
    $('#posts_create').hide();
    $('.feedback').hide();
    $('#new_user_form').hide();
    
    /****************** IF USER IS LOGGED IN *******************/
    $.ajax({
        url:'includes/session_check.php',
        success:function(response){
            if(response == 'success'){
                $('#posts_create').slideDown();
                $('#sign_in_dropdown').hide();
            }else{
                $('#posts_create').hide();
                $('#sign_in_dropdown').slideDown();
            }
        }
    });
    /*****************************************************************/
    /******************** HOME BUTTON *********************************/
    $('#home_btn').click(function(){
        $('.loader').fadeIn();
        $('#content').fadeOut(400);
        $('#new_user_form').slideUp();
        $('#posts').hide(400);
        $('#sort_tab').delay(500).slideDown();
        $('#content').load('includes/posts.php').fadeIn(400);
        $('.loader').fadeOut();        
    });
    /*****************************************************************/
    //Overflow 
    $('#overlay').click(function(){
        $('#popup_window').fadeOut();
        $(this).delay(500).fadeOut();
    });
    /*****************************************************************/
    /******************* SIGN IN PROCESS *****************************/
    
    $('#sign-in').click(function(){
        $('.loader').fadeIn();
        if($('#email').val() == "" || $('#password').val() == ""){
            $('.alert').fadeIn(400).html("Enter BOTH Email & Password").delay(200).fadeOut();
            $('.loader').fadeOut(400);
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
                        $('.loader').fadeOut();
                        $('.dropdown-menu').slideUp();
                        $('#sign_in_dropdown').fadeOut();
                        $('#user').load('includes/logged_user.php?mode=al');
                        $('#posts_create').slideDown();
                        
                    }else{
                        $('.alert').fadeIn().html("<p class='error'>Either your Username or Password is incorrect</p>").delay(400).fadeOut();
                        $('.loader').fadeOut();
                    }
                }
            });
        }
        return false;
    });
    /****************************************************************/
    /******************* SIGNUP FORM *****************************/
    $('#signup_btn').click(function(){
        $('.loader').fadeIn();
        $('#posts').hide(400);
        $('#sort_tab').slideUp();
        $('#content').fadeOut();
        $('#new_user_form').slideDown();
        $('.loader').fadeOut();
    });
    /****************************************************************/
    /******************* SIGNUP PROCESS *****************************/
    $('#signup_process').click(function(){
        $('.loader').fadeIn();
        var form_name = "form[name='new_user_form']";
        var first_name = $(form_name + " input[name = 'first_name']").val();
        var form_action = "includes/registration_process.php";
        var last_name = $(form_name + " input[name = 'last_name']").val();
        var terms = $(form_name + " input[name = 'terms']").is(":checked");
        var email = $(form_name + " input[name = 'email']").val();
        var email2 = $(form_name + " input[name = 'email2']").val();
        var password = $(form_name + " input[name = 'password']").val();
        var password2 = $(form_name + " input[name = 'password2']").val();
        var mobile = $(form_name + " input[name = 'mobile']").val();
        
        // Check if All Fields are set
        if(first_name == '' || last_name == '' || email == '' || email2 == '' || password =='' || password2 == '' || mobile == ''){
            $('.alert_content').addClass('alert-block');
            $('.alert_content').fadeIn().html("Fill in <strong>All</strong> the Fields.").delay(10000).fadeOut();
            $('.loader').fadeOut();
            console.log(form_action);
            return false;
        }else if(terms == false){
            $('.alert_content').addClass('alert-block');
            $('.alert_content').fadeIn().html("You have to accept our <strong>Terms & Conditions</strong> .").delay(10000).fadeOut();
            $('.loader').fadeOut();
            return false;
        }
       
       // Check if Email Match
       if(email != email2){
           $('.alert_content').addClass('alert-block');
            $('.alert_content').fadeIn().html("Email Addresses do not <strong>Match</strong> .").delay(10000).fadeOut();
            $('.loader').fadeOut();
            return false;
       }
       // Check if Passwords Match
       if(password != password2){
           $('.alert_content').addClass('alert-block');
            $('.alert_content').fadeIn().html("Passwords do not <strong>Match</strong> .").delay(10000).fadeOut();
            $('.loader').fadeOut();
            return false;
       }
       
       // Check if Email exists in Database
       var form_data = {email : email, mobile : mobile};
        $.ajax({
            type:'post',
            url: 'includes/registration_process.php',
            data: form_data,
            success: function(response){
                if(response == "success"){
                    $('.alert_content').addClass('alert-error');
                    $('.alert_content').fadeIn().html("Email Or Mobile Number is Currently associated with <strong>Another Account</strong> .").delay(400).fadeOut();
                    $('.loader').fadeOut();
                    return false;
                }else{
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
                            $(form_name)[0].reset();
                            $('.alert_conten').removeClass('alert-error');
                            $('.alert_content').addClass('alert-success');
                            $('.alert_content').fadeIn().html("Successfully Registered. Please <strong>SignIn</strong> .").delay(5000).fadeOut();
                            $('.loader').fadeOut();
                            $('#new_user_form').fadeOut();
                            $('#sort_tab').delay(500).slideDown();
                            $('#content').load('includes/posts.php').fadeIn(400);

                        }else{
                            $('.alert_content').addClass('alert-error');
                            $('.alert_content').fadeIn().html("Something Went Wrong>!!!!</strong> .").delay(10000).fadeOut();
                            $('.loader').fadeOut();
                        }
                    }

                });
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
        var amount = $(form_name + " input[name = 'amount']").val();
        var type = 'will';
        
        // Checking the will_post input
        if(will_post == '' ){
            $('.alert').addClass('alert-block');
            $('.alert').fadeIn().html("Please Fill In the <strong>'I Will'</strong> field before proceeding.");
            $('.loader').fadeOut();
            return false;
        }
        if(description == '' ){
            $('.alert').addClass('alert-block');
            $('.alert').fadeIn().html("Please Fill In the <strong>'Description'</strong> field before proceeding.");
            $('.loader').fadeOut();
            return false;
        }
        if(currency == '' ){
            $('.alert').addClass('alert-block');
            $('.alert').fadeIn().html("Please choose <strong>'Currency'</strong> before proceeding.");
            $('.loader').fadeOut();
            return false;
        }
        if(amount == '' ){
            $('.alert').addClass('alert-block');
            $('.alert').fadeIn().html("Please Fill in the  <strong>'Amount'</strong> before proceeding.");
            $('.loader').fadeOut();
            return false;
        }
        if(terms == '' ){
            $('.alert').addClass('alert-block');
            $('.alert').fadeIn().html("You need to accept our <strong>'Terms & Conditions'</strong> before proceeding.");
            $('.loader').fadeOut();
            return false;
        }
        
        var form_action = $("form[name='new_will_form']").attr('action');
        var form_data = {
            post: will_post,
            description: description,
            currency: currency,
            type: type,
            amount : amount
        };
        $.ajax({
                type:'post',
                url: form_action,
                data: form_data,
                success: function(response){
                    if(response == "success"){
                        $(form_name)[0].reset();
                        $("#will_modal").modal("hide");
                        $('#overlay').fadeOut();
                        $('.alert_content').addClass('alert-success');
                        $('.alert_content').slideDown().html("Successfully Added a <strong>New Post</strong>");
                        $('.loader').fadeOut();
                        $('.alert').delay(2000).slideUp();
                        $('#posts').fadeOut().fadeIn(400).load('includes/posts.php');
                        
                    }else{
                        $('.alert').fadeIn().html("<p class='error'>There was an error!</p>");
                        $('.loader').fadeOut();
                    }
                }
            });
        return false;
    });
    /****************************************************************************************/
        /***********************  I WANT - CREATE PROCESS ************************/
    /*************************************************************************/
    $('#want_create_btn').click(function(){
                
        // Loading Icon Fade In
        $('.loader').fadeIn();
        
        // Assigning Variables to the form and its elements
        var form_name = "form[name='new_want_form']";
        var terms = $(form_name + " input[name = 'terms']").is(":checked");
        var post = $(form_name + " input[name = 'post']").val();
        var description = $(form_name + " textarea[name = 'description']").val();
        var currency = $(form_name + " input[name = 'currency']").val();
        var amount = $(form_name + " input[name = 'amount']").val();
        var type = 'want';
        
        // Checking the will_post input
        if(post == '' ){
            $('.alert').addClass('alert-block');
            $('.alert').fadeIn().html("Please Fill In the <strong>'I Want'</strong> field before proceeding.");
            $('.loader').fadeOut();
            return false;
        }
        if(description == '' ){
            $('.alert').addClass('alert-block');
            $('.alert').fadeIn().html("Please Fill In the <strong>'Description'</strong> field before proceeding.");
            $('.loader').fadeOut();
            return false;
        }
        if(currency == '' ){
            $('.alert').addClass('alert-block');
            $('.alert').fadeIn().html("Please choose <strong>'Currency'</strong> before proceeding.");
            $('.loader').fadeOut();
            return false;
        }
        if(amount == '' ){
            $('.alert').addClass('alert-block');
            $('.alert').fadeIn().html("Please Fill in the  <strong>'Amount'</strong> before proceeding.");
            $('.loader').fadeOut();
            return false;
        }
        if(terms == '' ){
            $('.alert').addClass('alert-block');
            $('.alert').fadeIn().html("You need to accept our <strong>'Terms & Conditions'</strong> before proceeding.");
            $('.loader').fadeOut();
            return false;
        }
        
        var form_action = "includes/post_process.php";
        var form_data = {
            post: post,
            description: description,
            currency: currency,
            type: type,
            amount : amount
        };
        $.ajax({
                type:'post',
                url: form_action,
                data: form_data,
                success: function(response){
                    if(response == "success"){
                        $(form_name)[0].reset();
                        $("#want_modal").modal("hide");
                        $('#overlay').fadeOut();
                        $('.alert_content').addClass('alert-success');
                        $('.alert_content').slideDown().html("Successfully Added a <strong>New Post</strong>");
                        $('.loader').fadeOut();
                        $('.alert').delay(2000).slideUp();
                        $('#posts').fadeOut().fadeIn(400).load('includes/posts.php');
                        
                    }else{
                        $('.alert').fadeIn().html("<p class='error'>There was an error!</p>");
                        $('.loader').fadeOut();
                    }
                }
            });
        return false;
    });
    /****************************************************************************************/
    
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
        var button = $(this);		
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
	$("#file").pekeUpload({theme:'bootstrap', multi: false});
        $("#file1").pekeUpload({theme:'bootstrap', multi: false});
});//ready ends