  <!--  <div id='menu_bar'></div><!-- menu_bar -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="index.php" name="top">Yoteyote</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="active"><a href="#"  id='post_btn'><i class="icon-file"></i> Wills & Wants</a></li>
                    <li class='divider-vertical'></li>
                    <li><a href='#' class='profile_btn'><i class='icon-file'></i> Profile</a></li>
                    
                </ul>
                <ul class="nav pull-right" id='sign_in_dropdown'>
                    <li><a href="#" id="signup_btn">Sign Up</a></li>
                    <li class="divider-vertical"></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
                        <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px;">
                                <legend>Sign In</legend>
                                <div class="alert alert-error">
                                    <a class="close" data-dismiss="alert" href="#">×</a>Incorrect Username or Password!
                                </div>
                                <form method="POST" id='sign_in_form' action="includes/login_process.php" accept-charset="UTF-8">
                                    <input type="email" id="email" class="span3" name="email" placeholder="Email">
                                    <input type="password" id="password" class="span3" name="password" placeholder="Password">
                                    <label class="checkbox">
                                    <input type="checkbox" name="remember" value="1"> Remember Me
                                    </label>
                                    <button type="submit" name="submit" class="btn btn-block" id='sign-in'>Sign In</button>
                                </form>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        <!--/.nav-collapse -->
        </div>
    <!--/.container-fluid -->
    </div>
    <!--/.navbar-inner -->
</div>
<!--/.navbar -->