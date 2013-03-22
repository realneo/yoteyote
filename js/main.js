$(document).ready(function(){
    // Input General Animation
	$('input').focus(function(){
		input_value = $(this).val();
		$(this).val("");
	});
	$('input').focusout(function(){
		if(!$(this).val()){
			$(this).val(input_value);		
		}
	});
        
    //Overflow 
    $('#overlay').click(function(){
        $('#popup_window').fadeOut(500);
        $(this).delay(500).fadeOut(500);
    });
    
    // Login popup window
    $('#login_pop').click(function(){
        $('#overlay').fadeIn(500);
        $('#popup_window').delay(500).fadeIn(500);
        $('#popup_window_title').fadeIn().html('Login');
        $('#popup_window_content').fadeIn().load('includes/login.php');
        $('#popup_window').css({'width':'220px'}); 
    });
    
    //Login Process
    $('#login_btn').click(function(){
        $('.preloader').fadeIn();
        if($('#user_email').val() == "" || $('#user_password').val() == ""){
            $('.feedback').fadeIn(400).html("Please Enter BOTH Email & Password Before Proceeding");
            $('.feedback').delay(2000).fadeOut(400);
            $('.preloader').fadeOut(400);
        }else{
            var form_action = $('#login_form').attr('action');
            var form_data = {
                email : $('#user_email').val(),
                password : $('#user_password').val()
                };
            $.ajax({
                type:'post',
                url: form_action,
                data: form_data,
                success: function(response){
                    if(response == "success"){
                        $('.feedback').fadeIn().html("<p class='success'>Login Successful</p>");
                        $('.preloader').fadeOut();
                        $('.feedback').delay(500).fadeOut(400);
                        $('#popup_window').delay(900).fadeOut(400);
                        $('#overlay').delay(1200).fadeOut(400);
                        $('#user').load('includes/logged_user.php');
                        
                    }else{
                        $('.feedback').fadeIn().html("<p class='error'>Either your Username or Password is incorrect</p>");
                        $('.preloader').fadeOut();
                    }
                }
            });
        }
        return false;
    });
    
    // Registration window
    $('#register_pop').click(function(){
        $('#overlay').fadeIn(500);
        $('#popup_window').delay(500).fadeIn(500);
        $('#popup_window_title').fadeIn().html('Register Now');
        $('#popup_window_content').fadeIn().load('includes/new_user_form.php');
        $('#popup_window').css({'width':'400px'}); 
    });
    //Login Process
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
                    $('#popup_window_content').fadeIn().load('includes/new_will.php');
                    $('#popup_window').css({'width':'400px'}); 
                    $('#will_post').val(will_post);
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
});