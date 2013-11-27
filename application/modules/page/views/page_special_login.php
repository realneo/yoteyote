<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title><?php echo $template['title'] ?></title>

        <meta name="description" content="<?php echo $template['description'] ?>">
        <meta name="author" content="<?php echo $template['author'] ?>">
        <meta name="robots" content="noindex, nofollow">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="<?php echo img_url('favicon.ico'); ?>">
        <link rel="apple-touch-icon" href="<?php echo img_url('icon57.png'); ?>" sizes="57x57">
        <link rel="apple-touch-icon" href="<?php echo img_url('icon72.png'); ?>" sizes="72x72">
        <link rel="apple-touch-icon" href="<?php echo img_url('icon76.png'); ?>" sizes="76x76">
        <link rel="apple-touch-icon" href="<?php echo img_url('icon114.png'); ?>" sizes="114x114">
        <link rel="apple-touch-icon" href="<?php echo img_url('icon120.png'); ?>" sizes="120x120">
        <link rel="apple-touch-icon" href="<?php echo img_url('icon144.png'); ?>" sizes="144x144">
        <link rel="apple-touch-icon" href="<?php echo img_url('icon152.png'); ?>" sizes="152x152">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- The Open Sans font is included from Google Web Fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,700,700italic">

        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="<?php echo css_url('bootstrap.css'); ?>">

        <!-- Related styles of various icon packs and javascript plugins -->
        <link rel="stylesheet" href="<?php echo css_url('plugins.css'); ?>">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="<?php echo css_url('main.css'); ?>">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->
        <?php if ($template['theme']) { ?>
        <link id="theme-link" rel="stylesheet" href="<?php echo css_url('themes/'.$template['theme'].'.css'); ?>">
        <?php } ?>

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="<?php echo css_url('themes.css'); ?>">
        <!-- END Stylesheets -->

        <!-- Modernizr (Browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support it, eg IE8) -->
        <script src="<?php echo js_url('vendor/modernizr-2.6.2-respond-1.3.0.min.js'); ?>"></script>
    </head>

    <!-- Body -->
    <body>

        <!-- Header -->
        <header class="navbar navbar-default navbar-fixed-top">
            <!-- Header Brand -->
            <a href="page_special_login.php" class="navbar-brand">
                <img src="<?php echo img_url('template/drop.png'); ?>" alt="YoteyoteUI">
                <span><?php echo $template['name']; ?></span>
            </a>
            <!-- END Header Brand -->
        </header>
        <!-- END Header -->

        <!-- Login Container -->
        <div id="login-container">
            <!-- Page Content -->
            <div id="page-content" class="block remove-margin animation-bigEntrance">
                <!-- Login Title -->
                <div class="block-header">
                    <div class="header-section">
                        <h1 class="text-center">
							Welcome to <?php echo $template['name']; ?><br>
							<small>Please Login or Register</small>
						</h1>
                    </div>
                </div>
                <!-- END Login Title -->

                <!-- Login Form -->
                <form action="<?php echo base_url('home'); ?>" method="post" id="form-login" class="form-horizontal">
                    <div class="form-group">
                        <!-- Social Login -->
                        <div class="col-xs-6">
                            <a href="javascript:void(0)" class="btn btn-lg btn-info btn-block"><i class="fa fa-facebook"></i> Facebook</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="javascript:void(0)" class="btn btn-lg btn-info btn-block"><i class="fa fa-twitter"></i> Twitter</a>
                        </div>
                        <!-- END Social Login -->
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="text" id="login-email" name="login-email" class="form-control input-lg" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input type="password" id="login-password" name="login-password" class="form-control input-lg" placeholder="Password">

                            <!--
                            Hidden checkbox. Its checked property will be toggled every time the remember me (#btn-remember) button is clicked (js code at the bottom)
                            You can add the checked property by default (the button will be enabled automatically)
                            -->
                            <input type="checkbox" id="login-remember" name="login-remember" hidden>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-8">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-default disabled">Remember me?</button>
                                <button type="button" class="btn btn-sm btn-default" data-toggle="button" id="btn-remember"><i class="fa fa-check"></i></button>
                            </div>
                        </div>
                        <div class="col-xs-4 text-right">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Login</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <p class="text-center remove-margin"><small>Don't have an account?</small> <a href="javascript:void(0)" id="link-login"><small>Create one for free!</small></a></p>
                        </div>
                    </div>
                </form>
                <!-- END Login Form -->

                <!-- Register Form -->
                <form action="<?php echo base_url('home/page_special_login'); ?>" method="post" id="form-register" class="form-horizontal display-none" onsubmit="return false;">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                <input type="text" id="register-username" name="register-username" class="form-control input-lg" placeholder="Username">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                                <input type="text" id="register-email" name="register-email" class="form-control input-lg" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-asterisk fa-fw"></i></span>
                                <input type="password" id="register-password" name="register-password" class="form-control input-lg" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-asterisk fa-fw"></i></span>
                                <input type="password" id="register-password-verify" name="register-password-verify" class="form-control input-lg" placeholder="Verify Password">
                            </div>

                            <!--
                            Hidden checkbox. Its checked property will be toggled every time the terms (#btn-terms) button is clicked (js code at the bottom)
                            You can add the checked property by default (the button will be enabled automatically)
                            -->
                            <input type="checkbox" id="register-terms" name="register-terms" hidden>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-8">
                            <div class="btn-group">
                                <a href="#modal-terms" class="btn btn-sm btn-primary" data-toggle="modal">Terms</a>
                                <button type="button" class="btn btn-sm btn-default" data-toggle="button" id="btn-terms"><i class="fa fa-check"></i> Agree</button>
                            </div>
                        </div>
                        <div class="col-xs-4 text-right">
                            <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-angle-right"></i> Register</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <p class="text-center remove-margin"><small>Oops, you have an account?</small> <a href="javascript:void(0)" id="link-register"><small>Login!</small></a></p>
                        </div>
                    </div>
                </form>
                <!-- END Register Form -->

                <!-- Modal Terms -->
                <div id="modal-terms" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Terms &amp; Conditions</h4>
                            </div>
                            <div class="modal-body">
                                <h4>Title</h4>
                                <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <h4>Title</h4>
                                <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <h4>Title</h4>
                                <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <h4>Title</h4>
                                <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Modal Terms -->
            </div>
            <!-- END Page Content -->
        </div>
        <!-- END Login Container -->

        <!-- Get Jquery library from Google but if something goes wrong get Jquery from local file - Remove 'http:' if you have SSL -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>!window.jQuery && document.write(unescape('%3Cscript src="<?php echo js_url('vendor/jquery-1.10.2.min.js'); ?>"%3E%3C/script%3E'));</script>

        <!-- Bootstrap.js, Jquery plugins and custom Javascript code -->
        <script src="<?php echo js_url('vendor/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo js_url('plugins.js'); ?>"></script>
        <script src="<?php echo js_url('main.js'); ?>"></script>

        <!-- Javascript code only for this page -->
        <script>
            $(function(){
                /* Save buttons (remember me and terms) and hidden checkboxes in variables */
                var checkR  = $('#login-remember'),
                    checkT  = $('#register-terms'),
                    btnR    = $('#btn-remember'),
                    btnT    = $('#btn-terms');

                // Add the 'active' class to button if their checkbox has the property 'checked'
                if (checkR.prop('checked')) btnR.addClass('active');
                if (checkT.prop('checked')) btnT.addClass('active');

                // Toggle 'checked' property of hidden checkboxes when buttons are clicked
                btnR.on('click', function(){ checkR.prop('checked', !checkR.prop('checked')); });
                btnT.on('click', function(){ checkT.prop('checked', !checkT.prop('checked')); });

                /* Login & Register show-hide */
                var formLogin       = $('#form-login'),
                    formRegister    = $('#form-register');

                $('#link-login').click(function(){ formLogin.slideUp(250); formRegister.slideDown(250); });
                $('#link-register').click(function(){ formRegister.slideUp(250); formLogin.slideDown(250); });
            });
        </script>
    </body>
</html>