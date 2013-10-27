<!-- Modal -->

    <div id="will_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <h3 class='success'>I Will</h3>
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
                <div class='alert'></div><!-- feedback -->
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-success" id='will_create_btn'>Create</button>
            </div>
        </form>
    </div><!-- will-modal -->