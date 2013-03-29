<?php
    session_start();
    include('includes/db_conn.php');
    if($_SESSION['user_id']){
        $user_id = $_SESSION['user_id'];
    }else{
        $user_id = false;
    }
?>
<html>
    <head>
        <title>Yoteyote | Lets Work Together</title>
        <link type='text/css' href='css/main.css' rel='stylesheet' /> 
        <script type='text/javascript' src='js/jquery-1.8.3.min.js'></script>
        <script type='text/javascript' src='js/jquery-ui-1.9.2.custom.min.js'></script>
        <script type='text/javascript' src='js/main.js'></script>
    </head>
    <body>
        <div id='top_content'>
            <div id='top_bg'><img src='images/top_bg.png' alt='' /></div>
            <div id='logo'><img src='images/logo.png' alt='Yoteyote' /></div><!-- logo -->
            <div id='logo_text'>Yoteyote</div><!-- logo_text -->
            <div id='logo_message'>Buy & Sell small jobs from one another</div><!-- logo_message -->
            <div id='discover_btn'>Discover How</div><!-- discover_btn -->
            <div id='will_want_form'>
                <table>
                <form name='will_form' action='' method='post'>
                    <tr>
                        <th align='right'><span class='will_color'>I will</span></th>
                        <td><input type='text' name='will' value='desing your website for 100,000' size='40' id='will_input'/></td>
                        <td><button type='submit' id='will_btn'>create ></button></td>
                    </tr>
                </form>
                <form name='want_form' action='' method='post'>
                    <tr>
                        <th align='right'><span class='want_color'>I want</span></th>
                        <td><input type='text' name='want' value='a cleaner for my house for 30,000' size='40' id='want_input'/></td>
                        <td><button type='submit' id='want_btn'>create ></button></td>
                    </tr>
                </form>
                </table>
            </div><!-- will_want_form -->
        </div><!-- top_content -->
        <div id='menu_bar'></div><!-- menu_bar -->
        <div id='main_content'>
            <div id='menu'>
                <a href='#'>Popular</a>
                <a href='#'>New</a>
                <a href='#'>Recent</a>
            </div><!-- menu -->
            <div id='will_want_toggle'>
                Sort by: 
                <a href='#'>Wills</a>
                <a href='#'>Wants</a>
            </div><!-- will_want_toggle -->
            <div id='search'>
                <form name='search' action='' method='get'>
                    <input type='text' name='search' value='iPhone 5' size='40'/>
                    <button type='submit'>Search </button>
                </form>
            </div><!-- search -->
            <div id='posts'></div><!-- posts -->
            
        </div><!-- main_content -->
        <div id='bottom_content'>
            <div id='user'>
            <?php
                if($user_id == false){
                    echo "<div id='logging_in'>             
                <a href='#' id='login_pop'>Login</a> |
                <a href='#' id='register_pop'>Register</a>
            </div><!-- logging_in -->";
                }else{
                    include('includes/logged_user.php');
                }
            ?>
            </div><!-- user -->
            <div id='footer'>
                <a href='#'>How does it Work?</a> 
                <a href='#'>Help</a>
                <a href='#'>About Us</a>
                <a href='#'>Any Suggestions</a> 
                <a href='#'>Contact Us</a>
                &nbsp;
                &nbsp;
                &nbsp;
                &nbsp;
                All Rights Reserved. Yoteyote.com 2013
            </div><!-- footer -->
        </div><!-- bottom_content -->
        <div id="overlay"></div><!-- overlay -->
        <div id="popup_window">
                <div id="popup_window_title"></div><!-- title -->
                <div id="popup_window_content">
                </div><!-- popup_window_content -->
        </div><!-- popup_window -->
    </body>
</html>