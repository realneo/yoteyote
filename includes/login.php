<html>
    <head>
        <title>Login Form</title>
        <script type='text/javascript' src='js/main.js'></script>
    </head>
    <body>
            <form name="login_form" id='login_form' method="post" action="includes/login_process.php">
                <table width="200">
                  <tr>
                      <td align='right'>Email</td>
                      <td><input type='text' name='email' value='' id='user_email'/></td>
                  </tr>
                  <tr>
                      <td align='right'>Password</td>
                      <td><input type='password' name='password' value='' id='user_password'/></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td align="right"><button type='submit' id='login_btn'>Login </button></td>
                  </tr>
                </table>
            </form>
        <div class='preloader'><img src='images/loader.gif' height='12px'/></div><!-- preloader -->
        <div class='feedback'></div><!-- feedback -->
    </body>
</html>