<!-- Modal -->

    <div id="will_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <h3>I Will</h3>
        </div>
        <div class="modal-body">
            <form name="new_will_form" method="post" action="includes/post_process.php">
                <div class='input-prepend well well-small'>
                    <span class='add-on success'>I Will</span>
                    <input class='span4' name='will_post' type='text' placeholder='design a website for you in 2 days' />
                </div>
                <div>
                    <textarea class="span5" name="description" placeholder="Description about this post." rows="5"></textarea>
                </div>
                <div class="btn-group" data-toggle="buttons-radio" >
                    <button type="button" class="btn" data-toggle="button">
                      Tshs
                      <input type="radio" name="currency" value="Tshs" />
                    </button>
                    <button type="button" class="btn" data-toggle="button">
                      USD
                      <input type="radio" name="currency" value="USD" />
                    </button>
                </div>          
                <div class='input-prepend' style="margin-bottom:0px;">
                    <span class='add-on success'>Amount</span>
                    <input class='span1' name='amount' type='text' placeholder='200,000' />
                </div>
                <div class='model_terms'>
                    <input type="checkbox" name="terms"> I agree with the <a href="#" class='red_color'>Terms and Conditions</a>
                </div>
            </div>
            
            <div class="modal-footer">
                <div class="loader">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-success" id='will_create_btn'>Create</button>
            </div>
        </form>
    </div><!-- will-modal -->
<!--
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
       <!-- <div class='feedback'></div><!-- feedback -->
   <!-- </body>-->