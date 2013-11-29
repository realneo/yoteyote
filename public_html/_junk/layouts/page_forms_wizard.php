<?php $this->load->view('top'); ?>

<!-- Page content -->
<div id="page-content" class="block">
    <!-- Wizard Header -->
    <div class="block-header">
        <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
        <a href="" class="header-title-link">
            <h1>
                <i class="fa fa-magic animation-expandUp"></i>Form Wizard<br><small>Guide your users step-by-step!</small>
            </h1>
        </a>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><i class="fa fa-pencil-square-o"></i></li>
        <li>Forms</li>
        <li><a href="">Wizard</a></li>
    </ul>
    <!-- END Wizard Header -->

    <!-- Basic Wizard Block -->
    <div class="block">
        <!-- Basic Wizard Title -->
        <div class="block-title">
            <h2><i class="fa fa-magic"></i> Basic Wizard</h2>
        </div>
        <!-- END Basic Wizard Title -->

        <!-- Basic Wizard Content -->
        <form id="basic-wizard" action="page_forms_wizard.php" method="post" class="form-horizontal">
            <!-- First Step -->
            <div id="first" class="step">
                <!-- Step Info -->
                <div class="wizard-steps">
                    <div class="row">
                        <div class="col-xs-4 text-center active">1. Account</div>
                        <div class="col-xs-4 text-center">2. Personal</div>
                        <div class="col-xs-4 text-center">3. Extras</div>
                    </div>
                </div>
                <!-- END Step Info -->
                <div class="form-group">
                    <label class="control-label col-md-2" for="example-username">Username</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" id="example-username" name="example-username" class="form-control">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="example-email">Email</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" id="example-email" name="example-email" class="form-control">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="example-password">Password</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="password" id="example-password" name="example-password" class="form-control">
                            <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="example-password2">Retype Password</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="password" id="example-password2" name="example-password2" class="form-control">
                            <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END First Step -->

            <!-- Second Step -->
            <div id="second" class="step">
                <!-- Step Info -->
                <div class="wizard-steps">
                    <div class="row">
                        <div class="col-xs-4 text-center done">1. Account <i class="fa fa-check"></i></div>
                        <div class="col-xs-4 text-center active">2. Personal</div>
                        <div class="col-xs-4 text-center">3. Extras</div>
                    </div>
                </div>
                <!-- END Step Info -->
                <div class="form-group">
                    <label class="control-label col-md-2" for="example-firstname">Firstname</label>
                    <div class="col-md-3">
                        <input type="text" id="example-firstname" name="example-firstname" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="example-lastname">Lastname</label>
                    <div class="col-md-3">
                        <input type="text" id="example-lastname" name="example-lastname" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="example-address">Address</label>
                    <div class="col-md-3">
                        <input type="text" id="example-address" name="example-address" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="example-city">City</label>
                    <div class="col-md-3">
                        <input type="text" id="example-city" name="example-city" class="form-control">
                    </div>
                </div>
            </div>
            <!-- END Second Step -->

            <!-- Third Step -->
            <div id="third" class="step">
                <!-- Step Info -->
                <div class="wizard-steps">
                    <div class="row">
                        <div class="col-xs-4 text-center done">1. Account <i class="fa fa-check"></i></div>
                        <div class="col-xs-4 text-center done">2. Personal <i class="fa fa-check"></i></div>
                        <div class="col-xs-4 text-center active">3. Extras</div>
                    </div>
                </div>
                <!-- END Step Info -->
                <div class="form-group">
                    <label class="control-label col-md-2" for="example-bio">Bio</label>
                    <div class="col-md-10">
                        <textarea id="example-bio" name="example-bio" rows="6" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="example-newsletter">Newsletter</label>
                    <div class="col-md-10">
                        <div class="checkbox">
                            <label for="example-newsletter">
                                <input type="checkbox" id="example-newsletter" name="example-newsletter"> Sign up
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2"><a href="javascript:void(0)">Terms and Conditions</a></label>
                    <div class="col-md-10">
                        <div class="checkbox">
                            <label for="example-terms">
                                <input type="checkbox" id="example-terms" name="example-terms" value="1"> Accept
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Third Step -->

            <!-- Form Buttons -->
            <div class="form-group">
                <div class="col-md-10 col-md-offset-2">
                    <input type="reset" class="btn btn-default" id="back" value="Back">
                    <input type="submit" class="btn btn-primary" id="next" value="Next">
                </div>
            </div>
            <!-- END Form Buttons -->
        </form>
        <!-- END Basic Wizard Content -->
    </div>
    <!-- END Basic Wizard Block -->

    <!-- Advanced Wizard Block -->
    <div class="block">
        <!-- Advanced Wizard Title -->
        <div class="block-title">
            <h2><i class="fa fa-magic"></i> + <i class="fa fa-exclamation-triangle"></i> Advanced Wizard with Validation</h2>
        </div>
        <!-- END Advanced Wizard Title -->

        <!-- Advanced Wizard Content -->
        <form id="advanced-wizard" action="page_forms_wizard.php" method="post" class="form-horizontal">
            <!-- First Step -->
            <div id="advanced-first" class="step">
                <!-- Step Info -->
                <div class="wizard-steps">
                    <div class="row">
                        <div class="col-xs-6 text-center active">1. Account</div>
                        <div class="col-xs-6 text-center">2. Info</div>
                    </div>
                </div>
                <!-- END Step Info -->
                <div class="form-group">
                    <label class="control-label col-md-2" for="val_username">Username *</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                            <input type="text" id="val_username" name="val_username" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="val_email">Email *</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
                            <input type="text" id="val_email" name="val_email" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="val_password">Password *</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-asterisk fa-fw"></i></span>
                            <input type="password" id="val_password" name="val_password" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="val_confirm_password">Retype Password *</label>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-asterisk fa-fw"></i></span>
                            <input type="password" id="val_confirm_password" name="val_confirm_password" class="form-control" required>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END First Step -->

            <!-- Second Step -->
            <div id="advanced-second" class="step">
                <!-- Step Info -->
                <div class="wizard-steps">
                    <div class="row">
                        <div class="col-xs-6 text-center done">1. Account <i class="fa fa-check"></i></div>
                        <div class="col-xs-6 text-center active">2. Info</div>
                    </div>
                </div>
                <!-- END Step Info -->
                <div class="form-group">
                    <label class="control-label col-md-2" for="example-advanced-bio">Bio</label>
                    <div class="col-md-10">
                        <textarea id="example-advanced-bio" name="example-advanced-bio" rows="6" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2" for="example-advanced-newsletter">Newsletter</label>
                    <div class="col-md-10">
                        <div class="checkbox">
                            <label for="example-advanced-newsletter">
                                <input type="checkbox" id="example-advanced-newsletter" name="example-advanced-newsletter">  Sign up
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-2"><a href="javascript:void(0)">Terms and Conditions</a></label>
                    <div class="col-md-10">
                        <div class="checkbox">
                            <label for="val_terms">
                                <input type="checkbox" id="val_terms" name="val_terms" value="1"> Accept
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Second Step -->

            <!-- Form Buttons -->
            <div class="form-group">
                <div class="col-md-10 col-md-offset-2">
                    <input type="reset" class="btn btn-default" id="back2" value="Back">
                    <input type="submit" class="btn btn-primary" id="next2" value="Next">
                </div>
            </div>
            <!-- END Form Buttons -->
        </form>
        <!-- END Advanced Wizard Content -->
    </div>
    <!-- END Advanced Wizard Block -->
</div>
<!-- END Page Content -->

<?php $this->load->view('footer'); ?>

<!-- Javascript code only for this page -->
<script>
    $(function(){
        /* For advanced usage and examples you can check out
         *  Jquery Wizard       -> http://www.thecodemine.org
         *  Jquery Validation   -> https://github.com/jzaefferer/jquery-validation
         */

        /* Initialize Basic Wizard */
        $('#basic-wizard').formwizard({focusFirstInput: true, disableUIStyles: true, inDuration: 0, outDuration: 0});

        /* Initialize Advanced Wizard with Validation */
        $('#advanced-wizard').formwizard({
            disableUIStyles : true,
            validationEnabled: true,
            validationOptions: {
                errorClass: 'help-block',
                errorElement: 'span',
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
                        minlength: 2
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
                    val_email: {
                        required: true,
                        email: true
                    },
                    val_terms: {
                        required: true
                    }
		},
		messages: {
                    val_username: {
                        required: 'Please enter a username',
                        minlength: 'Your username must consist of at least 2 characters'
                    },
                    val_password: {
                        required: 'Please provide a password',
                        minlength: 'Your password must be at least 5 characters long'
                    },
                    val_confirm_password: {
                        required: 'Please provide a password',
                        minlength: 'Your password must be at least 5 characters long',
                        equalTo: 'Please enter the same password as above'
                    },
                    val_email: 'Please enter a valid email address',
                    val_terms: 'Please accept the terms to continue'
		}
            },
            inDuration: 0,
            outDuration: 0
        });
    });
</script>

<?php $this->load->view('bottom'); ?>