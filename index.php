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
                        <td><input type='text' name='will' value='desing your website for 100,000' size='40'/></td>
                        <td><button type='submit'>create ></button></td>
                    </tr>
                </form>
                <form name='want_form' action='' method='post'>
                    <tr>
                        <th align='right'><span class='want_color'>I want</span></th>
                        <td><input type='text' name='want' value='a cleaner for my house for 30,000' size='40'/></td>
                        <td><button type='submit'>create ></button></td>
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
            <div id='posts'>
                <div class='post'>
                  <table width="310">
                    <tr>
                        <td height="77" colspan="2" valign="top">
                            <div class='amount'><span class='currency'>Tshs.</span>100,000</div><!-- amount -->
                            <div class='will_want'> - I will design a website for you in 2 days</div>
                            <!-- class post --></td>
                    </tr>
                    <tr>
                      <td width="66" rowspan="2"><div class='user_pic'><img src='images/sample_user.png' alt='' /></div><!-- user_pic --></td>
                      <td width="232" height="20" valign="top"><div class='user_name'>Mary Jane</div><!-- user_name --></td>
                    </tr>
                    <tr>
                      <td height="16" valign="top"><div class='trusted_by'>Trusted by 5 people</div><!-- trusted_by -->
                      <div class='get_contact'><button name='get_contact'>Get Contact</button></div><!-- get_contact -->
                      </td>
                    </tr>
                </table>   
                </div><!-- post -->
                
                <div class='post'>
                  <table width="310">
                    <tr>
                        <td height="77" colspan="2" valign="top">
                            <div class='amount'><span class='currency'>Tshs.</span>100,000</div><!-- amount -->
                            <div class='will_want'> - I will design a website for you in 2 days</div>
                            <!-- class post --></td>
                    </tr>
                    <tr>
                      <td width="66" rowspan="2"><div class='user_pic'><img src='images/sample_user.png' alt='' /></div><!-- user_pic --></td>
                      <td width="232" height="20" valign="top"><div class='user_name'>Mary Jane</div><!-- user_name --></td>
                    </tr>
                    <tr>
                      <td height="16" valign="top"><div class='trusted_by'>Trusted by 5 people</div><!-- trusted_by -->
                      <div class='get_contact'><button name='get_contact'>Get Contact</button></div><!-- get_contact -->
                      </td>
                    </tr>
                </table>   
                </div><!-- post -->
                
                <div class='post'>
                  <table width="310">
                    <tr>
                        <td height="77" colspan="2" valign="top">
                            <div class='amount'><span class='currency'>Tshs.</span>100,000</div><!-- amount -->
                            <div class='will_want'> - I will design a website for you in 2 days</div>
                            <!-- class post --></td>
                    </tr>
                    <tr>
                      <td width="66" rowspan="2"><div class='user_pic'><img src='images/sample_user.png' alt='' /></div><!-- user_pic --></td>
                      <td width="232" height="20" valign="top"><div class='user_name'>Mary Jane</div><!-- user_name --></td>
                    </tr>
                    <tr>
                      <td height="16" valign="top"><div class='trusted_by'>Trusted by 5 people</div><!-- trusted_by -->
                      <div class='get_contact'><button name='get_contact'>Get Contact</button></div><!-- get_contact -->
                      </td>
                    </tr>
                </table>   
                </div><!-- post -->
                
                <div class='post'>
                  <table width="310">
                    <tr>
                        <td height="77" colspan="2" valign="top">
                            <div class='amount'><span class='currency'>Tshs.</span>100,000</div><!-- amount -->
                            <div class='will_want'> - I will design a website for you in 2 days</div>
                            <!-- class post --></td>
                    </tr>
                    <tr>
                      <td width="66" rowspan="2"><div class='user_pic'><img src='images/sample_user.png' alt='' /></div><!-- user_pic --></td>
                      <td width="232" height="20" valign="top"><div class='user_name'>Mary Jane</div><!-- user_name --></td>
                    </tr>
                    <tr>
                      <td height="16" valign="top"><div class='trusted_by'>Trusted by 5 people</div><!-- trusted_by -->
                      <div class='get_contact'><button name='get_contact'>Get Contact</button></div><!-- get_contact -->
                      </td>
                    </tr>
                </table>   
                </div><!-- post -->
                
                <div class='post'>
                  <table width="310">
                    <tr>
                        <td height="77" colspan="2" valign="top">
                            <div class='amount'><span class='currency'>Tshs.</span>100,000</div><!-- amount -->
                            <div class='will_want'> - I will design a website for you in 2 days</div>
                            <!-- class post --></td>
                    </tr>
                    <tr>
                      <td width="66" rowspan="2"><div class='user_pic'><img src='images/sample_user.png' alt='' /></div><!-- user_pic --></td>
                      <td width="232" height="20" valign="top"><div class='user_name'>Mary Jane</div><!-- user_name --></td>
                    </tr>
                    <tr>
                      <td height="16" valign="top"><div class='trusted_by'>Trusted by 5 people</div><!-- trusted_by -->
                      <div class='get_contact'><button name='get_contact'>Get Contact</button></div><!-- get_contact -->
                      </td>
                    </tr>
                </table>   
                </div><!-- post -->
                
                <div class='post'>
                  <table width="310">
                    <tr>
                        <td height="77" colspan="2" valign="top">
                            <div class='amount'><span class='currency'>Tshs.</span>100,000</div><!-- amount -->
                            <div class='will_want'> - I will design a website for you in 2 days</div>
                            <!-- class post --></td>
                    </tr>
                    <tr>
                      <td width="66" rowspan="2"><div class='user_pic'><img src='images/sample_user.png' alt='' /></div><!-- user_pic --></td>
                      <td width="232" height="20" valign="top"><div class='user_name'>Mary Jane</div><!-- user_name --></td>
                    </tr>
                    <tr>
                      <td height="16" valign="top"><div class='trusted_by'>Trusted by 5 people</div><!-- trusted_by -->
                      <div class='get_contact'><button name='get_contact'>Get Contact</button></div><!-- get_contact -->
                      </td>
                    </tr>
                </table>   
                </div><!-- post -->
                
                <div class='post'>
                  <table width="310">
                    <tr>
                        <td height="77" colspan="2" valign="top">
                            <div class='amount'><span class='currency'>Tshs.</span>100,000</div><!-- amount -->
                            <div class='will_want'> - I will design a website for you in 2 days</div>
                            <!-- class post --></td>
                    </tr>
                    <tr>
                      <td width="66" rowspan="2"><div class='user_pic'><img src='images/sample_user.png' alt='' /></div><!-- user_pic --></td>
                      <td width="232" height="20" valign="top"><div class='user_name'>Mary Jane</div><!-- user_name --></td>
                    </tr>
                    <tr>
                      <td height="16" valign="top"><div class='trusted_by'>Trusted by 5 people</div><!-- trusted_by -->
                      <div class='get_contact'><button name='get_contact'>Get Contact</button></div><!-- get_contact -->
                      </td>
                    </tr>
                </table>   
                </div><!-- post -->
                
                <div class='post'>
                  <table width="310">
                    <tr>
                        <td height="77" colspan="2" valign="top">
                            <div class='amount'><span class='currency'>Tshs.</span>100,000</div><!-- amount -->
                            <div class='will_want'> - I will design a website for you in 2 days</div>
                            <!-- class post --></td>
                    </tr>
                    <tr>
                      <td width="66" rowspan="2"><div class='user_pic'><img src='images/sample_user.png' alt='' /></div><!-- user_pic --></td>
                      <td width="232" height="20" valign="top"><div class='user_name'>Mary Jane</div><!-- user_name --></td>
                    </tr>
                    <tr>
                      <td height="16" valign="top"><div class='trusted_by'>Trusted by 5 people</div><!-- trusted_by -->
                      <div class='get_contact'><button name='get_contact'>Get Contact</button></div><!-- get_contact -->
                      </td>
                    </tr>
                </table>   
                </div><!-- post -->
                
                <div class='post'>
                  <table width="310">
                    <tr>
                        <td height="77" colspan="2" valign="top">
                            <div class='amount'><span class='currency'>Tshs.</span>100,000</div><!-- amount -->
                            <div class='will_want'> - I will design a website for you in 2 days</div>
                            <!-- class post --></td>
                    </tr>
                    <tr>
                      <td width="66" rowspan="2"><div class='user_pic'><img src='images/sample_user.png' alt='' /></div><!-- user_pic --></td>
                      <td width="232" height="20" valign="top"><div class='user_name'>Mary Jane</div><!-- user_name --></td>
                    </tr>
                    <tr>
                      <td height="16" valign="top"><div class='trusted_by'>Trusted by 5 people</div><!-- trusted_by -->
                      <div class='get_contact'><button name='get_contact'>Get Contact</button></div><!-- get_contact -->
                      </td>
                    </tr>
                </table>   
                </div><!-- post -->
                
                <div class='post'>
                  <table width="310">
                    <tr>
                        <td height="77" colspan="2" valign="top">
                            <div class='amount'><span class='currency'>Tshs.</span>100,000</div><!-- amount -->
                            <div class='will_want'> - I will design a website for you in 2 days</div>
                            <!-- class post --></td>
                    </tr>
                    <tr>
                      <td width="66" rowspan="2"><div class='user_pic'><img src='images/sample_user.png' alt='' /></div><!-- user_pic --></td>
                      <td width="232" height="20" valign="top"><div class='user_name'>Mary Jane</div><!-- user_name --></td>
                    </tr>
                    <tr>
                      <td height="16" valign="top"><div class='trusted_by'>Trusted by 5 people</div><!-- trusted_by -->
                      <div class='get_contact'><button name='get_contact'>Get Contact</button></div><!-- get_contact -->
                      </td>
                    </tr>
                </table>   
                </div><!-- post -->
                
                <div class='post'>
                  <table width="310">
                    <tr>
                        <td height="77" colspan="2" valign="top">
                            <div class='amount'><span class='currency'>Tshs.</span>100,000</div><!-- amount -->
                            <div class='will_want'> - I will design a website for you in 2 days</div>
                            <!-- class post --></td>
                    </tr>
                    <tr>
                      <td width="66" rowspan="2"><div class='user_pic'><img src='images/sample_user.png' alt='' /></div><!-- user_pic --></td>
                      <td width="232" height="20" valign="top"><div class='user_name'>Mary Jane</div><!-- user_name --></td>
                    </tr>
                    <tr>
                      <td height="16" valign="top"><div class='trusted_by'>Trusted by 5 people</div><!-- trusted_by -->
                      <div class='get_contact'><button name='get_contact'>Get Contact</button></div><!-- get_contact -->
                      </td>
                    </tr>
                </table>   
                </div><!-- post -->
                
                <div class='post'>
                  <table width="310">
                    <tr>
                        <td height="77" colspan="2" valign="top">
                            <div class='amount'><span class='currency'>Tshs.</span>100,000</div><!-- amount -->
                            <div class='will_want'> - I will design a website for you in 2 days</div>
                            <!-- class post --></td>
                    </tr>
                    <tr>
                      <td width="66" rowspan="2"><div class='user_pic'><img src='images/sample_user.png' alt='' /></div><!-- user_pic --></td>
                      <td width="232" height="20" valign="top"><div class='user_name'>Mary Jane</div><!-- user_name --></td>
                    </tr>
                    <tr>
                      <td height="16" valign="top"><div class='trusted_by'>Trusted by 5 people</div><!-- trusted_by -->
                      <div class='get_contact'><button name='get_contact'>Get Contact</button></div><!-- get_contact -->
                      </td>
                    </tr>
                </table>   
                </div><!-- post -->
                
                <div class='post'>
                  <table width="310">
                    <tr>
                        <td height="77" colspan="2" valign="top">
                            <div class='amount'><span class='currency'>Tshs.</span>100,000</div><!-- amount -->
                            <div class='will_want'> - I will design a website for you in 2 days</div>
                            <!-- class post --></td>
                    </tr>
                    <tr>
                      <td width="66" rowspan="2"><div class='user_pic'><img src='images/sample_user.png' alt='' /></div><!-- user_pic --></td>
                      <td width="232" height="20" valign="top"><div class='user_name'>Mary Jane</div><!-- user_name --></td>
                    </tr>
                    <tr>
                      <td height="16" valign="top"><div class='trusted_by'>Trusted by 5 people</div><!-- trusted_by -->
                      <div class='get_contact'><button name='get_contact'>Get Contact</button></div><!-- get_contact -->
                      </td>
                    </tr>
                </table>   
                </div><!-- post -->
                
                <div class='post'>
                  <table width="310">
                    <tr>
                        <td height="77" colspan="2" valign="top">
                            <div class='amount'><span class='currency'>Tshs.</span>100,000</div><!-- amount -->
                            <div class='will_want'> - I will design a website for you in 2 days</div>
                            <!-- class post --></td>
                    </tr>
                    <tr>
                      <td width="66" rowspan="2"><div class='user_pic'><img src='images/sample_user.png' alt='' /></div><!-- user_pic --></td>
                      <td width="232" height="20" valign="top"><div class='user_name'>Mary Jane</div><!-- user_name --></td>
                    </tr>
                    <tr>
                      <td height="16" valign="top"><div class='trusted_by'>Trusted by 5 people</div><!-- trusted_by -->
                      <div class='get_contact'><button name='get_contact'>Get Contact</button></div><!-- get_contact -->
                      </td>
                    </tr>
                </table>   
                </div><!-- post -->
                
                <div class='post'>
                  <table width="310">
                    <tr>
                        <td height="77" colspan="2" valign="top">
                            <div class='amount'><span class='currency'>Tshs.</span>100,000</div><!-- amount -->
                            <div class='will_want'> - I will design a website for you in 2 days</div>
                            <!-- class post --></td>
                    </tr>
                    <tr>
                      <td width="66" rowspan="2"><div class='user_pic'><img src='images/sample_user.png' alt='' /></div><!-- user_pic --></td>
                      <td width="232" height="20" valign="top"><div class='user_name'>Mary Jane</div><!-- user_name --></td>
                    </tr>
                    <tr>
                      <td height="16" valign="top"><div class='trusted_by'>Trusted by 5 people</div><!-- trusted_by -->
                      <div class='get_contact'><button name='get_contact'>Get Contact</button></div><!-- get_contact -->
                      </td>
                    </tr>
                </table>   
                </div><!-- post -->
                
                <div class='post'>
                  <table width="310">
                    <tr>
                        <td height="77" colspan="2" valign="top">
                            <div class='amount'><span class='currency'>Tshs.</span>100,000</div><!-- amount -->
                            <div class='will_want'> - I will design a website for you in 2 days</div>
                            <!-- class post --></td>
                    </tr>
                    <tr>
                      <td width="66" rowspan="2"><div class='user_pic'><img src='images/sample_user.png' alt='' /></div><!-- user_pic --></td>
                      <td width="232" height="20" valign="top"><div class='user_name'>Mary Jane</div><!-- user_name --></td>
                    </tr>
                    <tr>
                      <td height="16" valign="top"><div class='trusted_by'>Trusted by 5 people</div><!-- trusted_by -->
                      <div class='get_contact'><button name='get_contact'>Get Contact</button></div><!-- get_contact -->
                      </td>
                    </tr>
                </table>   
                </div><!-- post -->
                
                <div class='post'>
                  <table width="310">
                    <tr>
                        <td height="77" colspan="2" valign="top">
                            <div class='amount'><span class='currency'>Tshs.</span>100,000</div><!-- amount -->
                            <div class='will_want'> - I will design a website for you in 2 days</div>
                            <!-- class post --></td>
                    </tr>
                    <tr>
                      <td width="66" rowspan="2"><div class='user_pic'><img src='images/sample_user.png' alt='' /></div><!-- user_pic --></td>
                      <td width="232" height="20" valign="top"><div class='user_name'>Mary Jane</div><!-- user_name --></td>
                    </tr>
                    <tr>
                      <td height="16" valign="top"><div class='trusted_by'>Trusted by 5 people</div><!-- trusted_by -->
                      <div class='get_contact'><button name='get_contact'>Get Contact</button></div><!-- get_contact -->
                      </td>
                    </tr>
                </table>   
                </div><!-- post -->
                
                <div class='post'>
                  <table width="310">
                    <tr>
                        <td height="77" colspan="2" valign="top">
                            <div class='amount'><span class='currency'>Tshs.</span>100,000</div><!-- amount -->
                            <div class='will_want'> - I will design a website for you in 2 days</div>
                            <!-- class post --></td>
                    </tr>
                    <tr>
                      <td width="66" rowspan="2"><div class='user_pic'><img src='images/sample_user.png' alt='' /></div><!-- user_pic --></td>
                      <td width="232" height="20" valign="top"><div class='user_name'>Mary Jane</div><!-- user_name --></td>
                    </tr>
                    <tr>
                      <td height="16" valign="top"><div class='trusted_by'>Trusted by 5 people</div><!-- trusted_by -->
                      <div class='get_contact'><button name='get_contact'>Get Contact</button></div><!-- get_contact -->
                      </td>
                    </tr>
                </table>   
                </div><!-- post -->
                
                <div class='post'>
                  <table width="310">
                    <tr>
                        <td height="77" colspan="2" valign="top">
                            <div class='amount'><span class='currency'>Tshs.</span>100,000</div><!-- amount -->
                            <div class='will_want'> - I will design a website for you in 2 days</div>
                            <!-- class post --></td>
                    </tr>
                    <tr>
                      <td width="66" rowspan="2"><div class='user_pic'><img src='images/sample_user.png' alt='' /></div><!-- user_pic --></td>
                      <td width="232" height="20" valign="top"><div class='user_name'>Mary Jane</div><!-- user_name --></td>
                    </tr>
                    <tr>
                      <td height="16" valign="top"><div class='trusted_by'>Trusted by 5 people</div><!-- trusted_by -->
                      <div class='get_contact'><button name='get_contact'>Get Contact</button></div><!-- get_contact -->
                      </td>
                    </tr>
                </table>   
                </div><!-- post -->
            </div><!-- posts -->
            
        </div><!-- main_content -->
        <div id='bottom_content'>
            <?php
                if($user_id == false){
                    echo "<div id='logging_in'>             
                <a href='#' id='login_pop'>Login</a> |
                <a href='#'>Register</a>
            </div><!-- logging_in -->";
                }else{
                    echo "<div id='user'>
                <div id='user_pic'><img src='images/sample_user2.png' alt=''></div><!-- user_pic -->
                <div id='user_name'>John Doe</div><!-- user_name -->
                <div id='user_links'>
                    <a href='#'>My Settings</a>
                    <a href='#'>My Listings</a>
                    <div id='logout_btn'>Logout</div><!-- logout -->
                </div><!-- user_links -->
                
            </div><!-- user -->";
                }
            ?>
            
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
                <div id="popup_window_content"></div><!-- popup_window_content -->
        </div><!-- popup_window -->
    </body>
</html>