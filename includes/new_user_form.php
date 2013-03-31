<html>
    <head>
        <title>Registration Form</title>
        <script type='text/javascript' src='js/main.js'></script>
    </head>
    <body>
        <form action="includes/registration_process.php" method="post" name="new_user_form" id='reg_form'>
            <table>
            <tr>
                <td width="120" align="right">First Name</td>
                <td width="170"><input name="first_name" type="text" id="first_name" size="35" /></td>
            </tr>
            <tr>
                <td align="right">Last Name</td>
                <td><input name="last_name" type="text" id="last_name" size="35" /></td>
            </tr>
            <tr>
                <td align="right">Email</td>
                <td><input name="email" type="text" id="email" size="35" /></td>
            </tr>
            <tr>
                <td align="right">Re-Enter Email</td>
                <td><input name="email2" type="text" id="email2" size="35" /></td>
            </tr>
            <tr>
                <td align="right">Mobile</td>
                <td><input name="mobile" type="text" id="mobile" size="15" /></td>
            </tr>
            <tr>
                <td align="right">Password</td>
                <td><input name="password" type="password" id="password" size="35" /></td>
            </tr>
            <tr>
                <td align="right">Re-Enter Password</td>
                <td><input name="password2" type="password" id="password2" size="35" /></td>
            </tr>
            <tr>
                <td align="right">&nbsp;</td>
                <td align="right"><button type='submit' id='reg_btn'>Register </button></td>
            </tr>
          </table>
        </form>
        <div class='preloader'><img src='images/loader.gif' height='12px'/></div><!-- preloader -->
        <div class='feedback'></div><!-- preloader -->
    </body>
</html>
