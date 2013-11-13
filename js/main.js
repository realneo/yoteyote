$(document).ready(function(){
    $("#notifications").sticky({topSpacing:0});

    $("a").unbind('click');
    $("button").unbind('click');

    // Hiding Objects
    $('#posts_create').hide();
    $('#new_user_form').hide();

    // Init
    preload_start();
    clear_page('#','content');
    load_page('#','content','includes/posts.php');

    notify_small('Hello and Welcome to Yoteyote', 5000, '6', '');
    /****************** IF USER IS LOGGED IN *******************/
    sessionCheck();
    /*****************************************************************/
    /******************** MAIN MENU *********************************/
    $('#home_btn, #post_btn').click(function(){
        preload_start();
        load_page('#','content','includes/posts.php');
        $('#sort_tab').delay(500).slideDown();
        sessionCheck();
        preload_stop();
    });

    $('.profile_btn').click(function(){
        preload_start();
        load_page('#','content','includes/profile.php');
        $('#sort_tab').delay(500).slideUp();
        sessionCheck();
        preload_stop();
    });
    /*****************************************************************/
    /******************* SIGN IN PROCESS *****************************/
    $('#sign-in').click(function(){
        preload_start();
        if($('#email').val() == "" || $('#password').val() == ""){
            notify('Blank Fields', 'Please Fill in Both your Email and Password', 3000, 'o', '');
            preload_stop();
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
                        $('.dropdown-menu').slideUp();
                        $('#sign_in_dropdown').fadeOut();
                        $('#posts_create').slideDown();
                        notify('Welcome Again', 'We are here for you!', 5000, '6', '');
                        clear_page('#','content');
                        load_page('#', 'content', 'includes/posts.php');
                        clear_page('#','logged_user');
                        load_page('#', 'logged_user', 'includes/logged_user.php');
                        $('.profile_btn').fadeIn();
                        preload_stop();
                        location.reload();
                    }else{
                        notify('Incorrect', 'Email or Password is incorrect', 5000, 'c', true);
                        preload_stop();
                    }
                }
            });
        }
        return false;
    });
    /****************************************************************/
    /******************* SIGNUP FORM *****************************/
    $('#signup_btn').click(function(){
        preload_start();
        //$('#content').fadeOut();
        //clear_page('#','content');
        //$('#content').fadeIn();
        //load_page('#', 'content', 'includes/new_user_form.php');
        $('#sort_tab').slideUp();
        $('#new_user_form').fadeIn();
        notify('Sign Up','It will only take you less than a minute', 15000, '2', '');
        preload_stop();
    });
    /****************************************************************/
    /******************* SIGNUP PROCESS *****************************/
    $('#signup_process').click(function(){
        preload_start();
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
            notify('Blank Fields', 'Please Fill in All the Fields', 5000, 'o', '');
            preload_stop();
            return false;
        }else if(terms == false){
            notify('Terms & Conditions', 'You have to Accept our Terms & Conditions', 5000, 'c', '');
            preload_stop();
            return false;
        }

       // Check if Email Match
       if(email != email2){
            notify('Do Not Match', 'Email Addresses do not Match', 5000, 'X', '');
            preload_stop();
            return false;
       }
       // Check if Passwords Match
       if(password != password2){
            notify('Do Not Match', 'Passwords do not Match', 5000, 'X', '');
            preload_stop();
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
                    notify('Already in Use', 'Email or Mobile is Currently associated with Another Account', 5000, 'X', '');
                    preload_stop();
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
                            $('#new_user_form').fadeOut();
                            $('#sort_tab').delay(500).slideDown();
                            clear_page('#','content');
                            load_page('#','content','includes/posts.php');
                            notify('Successfully Signed Up', 'Successfully Registered. Please Signin', 5000, 'W', '');
                            preload_stop();

                        }else{
                            notify('Error', 'Something Went Wrong', 5000, 'o', true);
                            preload_stop();
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
        preload_start();

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
            notify('Blank Fields', 'Please give a detailed description of your <strong>post</strong>', 5000, 'o', '');
            preload_stop();
            return false;
        }
        if(description == '' ){
            notify('Blank Fields', 'Please fill in the <strong>Description</strong> field', 5000, 'o', '');
            preload_stop();
            return false;
        }
        if(currency == '' ){
            notify('Not Selected', 'Please Select the <strong>Currency</strong> ', 5000, 'o', '');
            preload_stop();
            return false;
        }
        if(amount == '' ){
            notify('Blank Fields', 'Please fill in the <strong>Amount</strong> field', 5000, 'o', '');
            preload_stop();
            return false;
        }
        if(terms == '' ){
            notify('Not Selected', 'Accept our <strong>Terms & Conditions</strong>." ', 5000, 'o', '');
            preload_stop();
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
                        notify('Successfully Posted', 'Your Post is already on the <strong>Grid</strong>', 5000, 'W', '');
                        preload_stop();
                        clear_page('.','posts');
                        load_page('.','posts','includes/posts.php');

                    }else{
                        notify('Error', 'Something Went Wrong', 5000, 'o', true);
                        preload_stop();
                    }
                }
            });
        return false;
    });
    /**************************************************************************/
    /***********************  I WANT - CREATE PROCESS ************************/
    /*************************************************************************/
    $('#want_create_btn').click(function(){

        // Loading Icon Fade In
        preload_start();

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
            notify('Blank Fields', 'Please fill in the <strong>I Want</strong> field', 5000, 'o', '');
            preload_stop();
            return false;
        }
        if(description == '' ){
            notify('Blank Fields', 'Please give a detailed description of your <strong>post</strong>', 5000, 'o', '');
            preload_stop();
            return false;
        }
        if(currency == '' ){
            notify('Not Selected', 'Please Select the <strong>Currency</strong> ', 5000, 'o', '');
            preload_stop();
            return false;
        }
        if(amount == '' ){
            notify('Blank Fields', 'Please fill in the <strong>Amount</strong> field', 5000, 'o', '');
            preload_stop();
            return false;
        }
        if(terms == '' ){
            notify('Not Selected', 'Accept our <strong>Terms & Conditions</strong>." ', 5000, 'o', '');
            preload_stop();
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
                        notify('Successfully Posted', 'Your Post is already on the <strong>Grid</strong>', 5000, 'W', '');
                        preload_stop();
                        clear_page('#','content');
                        load_page('#','content','includes/posts.php');

                    }else{
                        notify('Error', 'Something Went Wrong', 5000, 'o', true);
                        preload_stop();
                        return false;
                    }
                }
            });
        return false;
    });
    /****************************************************************************************/

    $('#will_sort').click(function(e) {
        preload_start();
        load_page('#','content','includes/posts.php?sort=wills');
        notify_small('You can only view <strong>I Will</strong> Posts', 3000, 'M', '');
        preload_stop();
    });

    $('#want_sort').click(function(e) {
        preload_start();
        load_page('#','content','includes/posts.php?sort=wants');
        notify_small('You can only view <strong>I Want</strong> Posts', 3000, 'M', '');
        preload_stop();
    });

    $('#all_sort').click(function(e) {
        preload_start();
	load_page('#','content','includes/posts.php');
        notify_small('You can view <strong>All</strong> Posts', 3000, 'M', '');
        preload_stop();
    });

    //Search
    $('#search_btn').click(function(e){
        e.preventDefault();
        var txt = $('#search_txt').val();
        load_page('#','content','includes/posts.php?mode=search&txt='+txt);
    });

    // Peke Upload
    $("#file").pekeUpload({theme:'bootstrap', multi: false});
    $("#file1").pekeUpload({theme:'bootstrap', multi: false});



    // How it Works
    $('#discover_btn').click(function(){
        notify_small('Quick view on How Yoteyote <strong>Works</strong>', 3000, 'M', '');
    });
    $('#discover_btn').slidepanel({
        orientation: 'left',
        mode: 'push'
    });

    // Profile Pic
});//ready ends