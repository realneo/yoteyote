  <!--  <div id='menu_bar'></div><!-- menu_bar -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="#" name="top">Yoteyote</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li><a href="#"><i class="icon-home"></i> Home</a></li>
                    <li class="divider-vertical"></li>
                    <li class="active"><a href="#"><i class="icon-file"></i> Posts</a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="#"><i class="icon-envelope"></i> Messages</a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="#"><i class="icon-signal"></i> Stats</a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="#"><i class="icon-lock"></i> Yoteyote Bank</a></li>
                    <li class="divider-vertical"></li>
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