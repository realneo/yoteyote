<html>
    <head>
        <title>I will Form</title>
        <script type='text/javascript' src='js/main.js'></script>
    </head>
    <body>
        <form id="new_will_form" name="new_will_form" method="post" action="includes/post_process.php">
          <table width="200">
            <tr>
              <td align="right">I will <input type='hidden' name='type' value='will'  id="type"/></td>
              <td><input type="text" name="will_post" id="will_post" size='40' value='' /></td>
            </tr>
            <tr>
              <td align="right" valign="middle">Description</td>
              <td><textarea name="description" id="description" cols="45" rows="10"></textarea></td>
            </tr>
            <tr>
              <td align="right">Currency</td>
              <td>
                <input type="radio" name="currency" value="Tshs" checked="checked"/>Tshs 
                <input type="radio" name="currency" value="USD" />USD</td>
            </tr>
            <tr>
              <td align="right">Amount</td>
              <td><input type="text" name="amount" id="amount" value=''/></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td align="right"><button type='submit' id="will_create_btn">Create </button></td>
            </tr>
          </table>
        </form>
        <div class='preloader'><img src='images/loader.gif' height='12px'/></div><!-- preloader -->
        <div class='feedback'></div><!-- feedback -->
    </body>