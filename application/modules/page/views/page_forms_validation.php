<?php $this->load->view('partials/top'); ?>

<!-- Page content -->
<div id="page-content" class="block">
    <!-- Validation Header -->
    <div class="block-header">
        <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
        <a href="" class="header-title-link">
            <h1>
                <i class="fa fa-exclamation-triangle animation-expandUp"></i>Form Validation<br><small>Easy validation and user helpers!</small>
            </h1>
        </a>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><i class="fa fa-pencil-square-o"></i></li>
        <li>Forms</li>
        <li><a href="">Validation</a></li>
    </ul>
    <!-- END Validation Header -->

    <!-- Validation States and Messages Block -->
    <div class="block">
        <!-- Validation States and Messages Title -->
        <div class="block-title">
            <h2><i class="fa fa-exclamation-triangle"></i> Validation States and Messages <small>Help the user fill out the forms</small></h2>
        </div>
        <!-- END Validation States and Messages Title -->

        <!-- Validation States and Messages Content -->
        <form action="page_forms_validation.php" method="post" class="form-horizontal" onsubmit="return false;">
            <div class="form-group">
                <label class="col-md-2 control-label" for="example-text-input">Input with Help Message</label>
                <div class="col-md-3">
                    <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="Username">
                    <span class="help-block">Please enter your username</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="example-text-input2">Input with Tooltip</label>
                <div class="col-md-3">
                    <input type="text" id="example-text-input2" name="example-text-input2" class="form-control" placeholder="Hover me" data-toggle="tooltip" title="This is a help tooltip!">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="example-text-input3">Input with Popover</label>
                <div class="col-md-3">
                    <input type="text" id="example-text-input3" name="example-text-input3" class="form-control" placeholder="Focus me" data-toggle="popover" data-placement="top" title="Title" data-content="This is a help popover! You can add your requirements in here!">
                </div>
            </div>
            <div class="form-group has-success">
                <label class="col-md-2 control-label" for="example-text-input4">Success State</label>
                <div class="col-md-3">
                    <input type="text" id="example-text-input4" name="example-text-input4" class="form-control" placeholder="...">
                    <span class="help-block">By using the class <code>.has-success</code></span>
                </div>
            </div>
            <div class="form-group has-warning">
                <label class="col-md-2 control-label" for="example-text-input5">Warning State</label>
                <div class="col-md-3">
                    <input type="text" id="example-text-input5" name="example-text-input5" class="form-control" placeholder="...">
                    <span class="help-block">By using the class <code>.has-warning</code></span>
                </div>
            </div>
            <div class="form-group has-error">
                <label class="col-md-2 control-label" for="example-text-input6">Error State</label>
                <div class="col-md-3">
                    <input type="text" id="example-text-input6" name="example-text-input6" class="form-control" placeholder="...">
                    <span class="help-block">By using the class <code>.has-error</code></span>
                </div>
            </div>
        </form>
        <!-- END Validation States and Messages Content -->
    </div>
    <!-- END Validation States and Messages Block -->

    <!-- Validation Block -->
    <div class="block">
        <!-- Validation Title -->
        <div class="block-title">
            <h2><i class="fa fa-wrench"></i> Validation <small>Validate easily in the front-end before sending data for further process</small></h2>
        </div>
        <!-- END Validation Title -->

        <!-- Validation Content -->
        <form id="form-validation" action="page_forms_validation.php" method="post" class="form-horizontal">
            <h4 class="sub-header">Basic Info</h4>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_username">Username</label>
                <div class="col-md-3">
                    <div class="input-group">
                        <input type="text" id="val_username" name="val_username" class="form-control">
                        <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_email">Email</label>
                <div class="col-md-3">
                    <div class="input-group">
                        <input type="text" id="val_email" name="val_email" class="form-control">
                        <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                    </div>
                </div>
            </div>
            <h4 class="sub-header">Vital Info</h4>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_password">Password</label>
                <div class="col-md-3">
                    <div class="input-group">
                        <input type="password" id="val_password" name="val_password" class="form-control">
                        <span class="input-group-addon"><i class="fa fa-asterisk fa-fw"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_confirm_password">Confirm Password</label>
                <div class="col-md-3">
                    <div class="input-group">
                        <input type="password" id="val_confirm_password" name="val_confirm_password" class="form-control">
                        <span class="input-group-addon"><i class="fa fa-asterisk fa-fw"></i></span>
                    </div>
                </div>
            </div>
            <h4 class="sub-header">Personal Stuff</h4>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_skill">Best Skill</label>
                <div class="col-md-3">
                    <select id="val_skill" name="val_skill" class="form-control">
                        <option value="">Please select</option>
                        <option value="html">HTML</option>
                        <option value="css">CSS</option>
                        <option value="javascript">Javascript</option>
                        <option value="php">PHP</option>
                        <option value="mysql">MySQL</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_website">Website</label>
                <div class="col-md-3">
                    <div class="input-group">
                        <input type="text" id="val_website" name="val_website" class="form-control" value="http://">
                        <span class="input-group-addon"><i class="fa fa-globe fa-fw"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_credit_card">Credit Card</label>
                <div class="col-md-3">
                    <div class="input-group">
                        <input type="text" id="val_credit_card" name="val_credit_card" class="form-control" data-toggle="tooltip" title="Try 446-667-651">
                        <span class="input-group-addon"><i class="fa fa-credit-card fa-fw"></i></span>
                    </div>
                </div>
            </div>
            <h4 class="sub-header">Extras</h4>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_digits">Digits</label>
                <div class="col-md-2">
                    <div class="input-group">
                        <input type="text" id="val_digits" name="val_digits" class="form-control">
                        <span class="input-group-addon"><i class="fa fa-asterisk fa-fw"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_number">Number</label>
                <div class="col-md-2">
                    <div class="input-group">
                        <input type="text" id="val_number" name="val_number" class="form-control">
                        <span class="input-group-addon"><i class="fa fa-asterisk fa-fw"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="val_range">Range [1, 500]</label>
                <div class="col-md-2">
                    <div class="input-group">
                        <input type="text" id="val_range" name="val_range" class="form-control">
                        <span class="input-group-addon"><i class="fa fa-asterisk fa-fw"></i></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Service Terms</label>
                <div class="col-md-3">
                    <div class="checkbox">
                        <label for="val_terms">
                            <input type="checkbox" id="val_terms" name="val_terms" value="1"> I Agree
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4 col-md-offset-4">
                    <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Reset</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i> Submit</button>
                </div>
            </div>
        </form>
        <!-- END Validation Content -->
    </div>
    <!-- END Validation Block -->
</div>
<!-- END Page Content -->

<?php $this->load->view('partials/footer'); ?>

<!-- Javascript code only for this page -->
<script>
    $(function(){
        /* For advanced usage and examples please check out
         *  Jquery Validation   -> https://github.com/jzaefferer/jquery-validation
         */

        /* Initialize Form Validation */
        $('#form-validation').validate({
            errorClass: 'help-block', // You can add help-inline instead of help-block if you like validation messages to the right of the inputs
            errorElement: 'div',
            errorPlacement: function(error, e) {
                e.parents('.form-group > div').append(error);
            },
            highlight: function(e){
                $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                $(e).closest('.help-block').remove();
            },
            success: function(e){
                // You can remove the .addClass('has-success') part if you don't want the inputs to get green after success!
                e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                e.closest('.help-block').remove();
            },
            rules: {
                val_username: {
                    required: true,
                    minlength: 3
                },
                val_email: {
                    required: true,
                    email: true
                },
                val_password: {
                    required: true,
                    minlength: 5
                },
                val_confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: '#val_password'
                },
                val_skill: {
                    required: true
                },
                val_website: {
                    required: true,
                    url: true
                },
                val_credit_card: {
                    required: true,
                    creditcard: true
                },
                val_digits: {
                    required: true,
                    digits: true
                },
                val_number: {
                    required: true,
                    number: true
                },
                val_range: {
                    required: true,
                    range: [1, 500]
                },
                val_terms: {
                    required: true
                }
            },
            messages: {
                val_username: {
                    required: 'Please enter a username',
                    minlength: 'Your username must consist of at least 3 characters'
                },
                val_email: 'Please enter a valid email address',
                val_password: {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 5 characters long'
                },
                val_confirm_password: {
                    required: 'Please provide a password',
                    minlength: 'Your password must be at least 5 characters long',
                    equalTo: 'Please enter the same password as above'
                },
                val_skill: 'Please select a skill!',
                val_website: 'Please enter your website!',
                val_credit_card: 'Please enter a valid credit card!',
                val_digits: 'Please enter only digits!',
                val_number: 'Please enter a number!',
                val_range: 'Please enter a number between 1 and 500!',
                val_terms: 'You must agree to the service terms!'
            }
        });
    });
</script>

<?php $this->load->view('partials/bottom'); ?>