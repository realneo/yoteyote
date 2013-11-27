<?php $this->load->view('top'); ?>

<!-- Page content -->
<div id="page-content" class="block">
    <!-- Forms General Header -->
    <div class="block-header">
        <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
        <a href="" class="header-title-link">
            <h1>
                <i class="fa fa-wrench animation-expandUp"></i>Form General Elements<br><small>Any form element you need, you will find it here!</small>
            </h1>
        </a>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><i class="fa fa-pencil-square-o"></i></li>
        <li>Forms</li>
        <li><a href="">General</a></li>
    </ul>
    <!-- END Forms General Header -->

    <!-- Basic Form Elements Block -->
    <div class="block">
        <!-- Basic Form Elements Title -->
        <div class="block-title">
            <h2>Basic Form Elements</h2>
        </div>
        <!-- END Form Elements Title -->

        <!-- Basic Form Elements Content -->
        <form action="page_forms_general.php" method="post" enctype="multipart/form-data" class="form-horizontal" onsubmit="return false;">
            <h4 class="sub-header">Text Inputs</h4>
            <div class="form-group">
                <label class="col-md-2 control-label">Static</label>
                <div class="col-md-10">
                    <p class="form-control-static">Username</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="example-text-input">Text Input</label>
                <div class="col-md-3">
                    <input type="text" id="example-text-input" name="example-text-input" class="form-control" placeholder="Text">
                    <span class="help-block">This is a help text</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="example-password-input">Password</label>
                <div class="col-md-3">
                    <input type="password" id="example-password-input" name="example-password-input" class="form-control" placeholder="Password">
                    <span class="help-block">Please enter a complex password</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="example-disabled-input">Disabled Input</label>
                <div class="col-md-3">
                    <input type="text" id="example-disabled-input" name="example-disabled-input" class="form-control" placeholder="Disabled" disabled>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="example-textarea-input">Textarea</label>
                <div class="col-md-5">
                    <textarea id="example-textarea-input" name="example-textarea-input" rows="4" class="form-control" placeholder="Content.."></textarea>
                </div>
            </div>
            <h4 class="sub-header">Selects, Radios and Checkboxes</h4>
            <div class="form-group">
                <label class="col-md-2 control-label" for="example-select">Select</label>
                <div class="col-md-2">
                    <select id="example-select" name="example-select" class="form-control" size="1">
                        <option value="0">Please select</option>
                        <option value="1">Option #1</option>
                        <option value="2">Option #2</option>
                        <option value="3">Option #3</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="example-multiple-select">Multiple select</label>
                <div class="col-md-2">
                    <select id="example-multiple-select" name="example-multiple-select" class="form-control" size="5" multiple>
                        <option value="1">Option #1</option>
                        <option value="2">Option #2</option>
                        <option value="3">Option #3</option>
                        <option value="4">Option #4</option>
                        <option value="5">Option #5</option>
                        <option value="6">Option #6</option>
                        <option value="7">Option #7</option>
                        <option value="8">Option #8</option>
                        <option value="9">Option #9</option>
                        <option value="10">Option #10</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Radios</label>
                <div class="col-md-10">
                    <div class="radio">
                        <label for="example-radio1">
                            <input type="radio" id="example-radio1" name="example-radios" value="option1"> Option 1
                        </label>
                    </div>
                    <div class="radio">
                        <label for="example-radio2">
                            <input type="radio" id="example-radio2" name="example-radios" value="option2"> Option 2
                        </label>
                    </div>
                    <div class="radio">
                        <label for="example-radio3">
                            <input type="radio" id="example-radio3" name="example-radios" value="option3"> Option 3
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Inline Radios</label>
                <div class="col-md-10">
                    <label class="radio-inline" for="example-inline-radio1">
                        <input type="radio" id="example-inline-radio1" name="example-inline-radios" value="option1"> One
                    </label>
                    <label class="radio-inline" for="example-inline-radio2">
                        <input type="radio" id="example-inline-radio2" name="example-inline-radios" value="option2"> Two
                    </label>
                    <label class="radio-inline" for="example-inline-radio3">
                        <input type="radio" id="example-inline-radio3" name="example-inline-radios" value="option3"> Three
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Checkboxes</label>
                <div class="col-md-10">
                    <div class="checkbox">
                        <label for="example-checkbox1">
                            <input type="checkbox" id="example-checkbox1" name="example-checkbox1" value="option1"> Option 1
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="example-checkbox2">
                            <input type="checkbox" id="example-checkbox2" name="example-checkbox2" value="option2"> Option 2
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="example-checkbox3">
                            <input type="checkbox" id="example-checkbox3" name="example-checkbox3" value="option3"> Option 3
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Inline Checkboxes</label>
                <div class="col-md-10">
                    <label class="checkbox-inline" for="example-inline-checkbox1">
                        <input type="checkbox" id="example-inline-checkbox1" name="example-inline-checkbox1" value="option1"> One
                    </label>
                    <label class="checkbox-inline" for="example-inline-checkbox2">
                        <input type="checkbox" id="example-inline-checkbox2" name="example-inline-checkbox2" value="option2"> Two
                    </label>
                    <label class="checkbox-inline" for="example-inline-checkbox3">
                        <input type="checkbox" id="example-inline-checkbox3" name="example-inline-checkbox3" value="option3"> Three
                    </label>
                </div>
            </div>
            <h4 class="sub-header">File Upload Inputs</h4>
            <div class="form-group">
                <label class="col-md-2 control-label" for="example-file-input">File input</label>
                <div class="col-md-5">
                    <input type="file" id="example-file-input" name="example-file-input">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="example-file-multiple-input">Multiple File input</label>
                <div class="col-md-5">
                    <input type="file" id="example-file-multiple-input" name="example-file-multiple-input" multiple>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-5 col-md-offset-2">
                    <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Reset</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-arrow-right"></i> Submit</button>
                </div>
            </div>
        </form>
        <!-- END Basic Form Elements Content -->
    </div>
    <!-- END Basic Form Elements Block -->

    <!-- Bordered Form Block -->
    <div class="block">
        <!-- Bordered Form Title -->
        <div class="block-title">
            <h2>Bordered Form <small><code>.form-horizontal</code> <code>.form-bordered</code></small></h2>
        </div>
        <!-- END Bordered Form Title -->

        <!-- Bordered Form Content -->
        <form action="page_forms_general.php" method="post" class="form-horizontal form-bordered" onsubmit="return false;">
            <div class="form-group">
                <label class="col-sm-2 control-label" for="bordered-username">Username</label>
                <div class="col-sm-4">
                    <input type="text" id="bordered-username" name="bordered-username" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="bordered-password-input">Password</label>
                <div class="col-sm-4">
                    <input type="password" id="bordered-password-input" name="bordered-password-input" class="form-control">
                    <span class="help-block">Please enter a complex password</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="bordered-bio">Bio</label>
                <div class="col-sm-4">
                    <textarea id="bordered-bio" name="bordered-bio" rows="4" class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="example-select">Options</label>
                <div class="col-sm-2">
                    <select id="bordered-select" name="bordered-select" class="form-control" size="1">
                        <option value="0">Please select</option>
                        <option value="1">Option #1</option>
                        <option value="2">Option #2</option>
                        <option value="3">Option #3</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">More Options</label>
                <div class="col-sm-10">
                    <div class="checkbox">
                        <label for="bordered-checkbox1">
                            <input type="checkbox" id="bordered-checkbox1" name="bordered-checkbox1" value="option1"> Option 1
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="bordered-checkbox2">
                            <input type="checkbox" id="bordered-checkbox2" name="bordered-checkbox2" value="option2"> Option 2
                        </label>
                    </div>
                    <div class="checkbox">
                        <label for="bordered-checkbox3">
                            <input type="checkbox" id="bordered-checkbox3" name="bordered-checkbox3" value="option3"> Option 3
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <button type="reset" class="btn btn-sm btn-default"><i class="fa fa-times"></i> Reset</button>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Submit</button>
                </div>
            </div>
        </form>
        <!-- END Bordered Form Content -->
    </div>
    <!-- END Bordered Form Block -->

    <!-- Input Groups Row -->
    <div class="row gutter30">
        <div class="col-sm-4">
            <!-- Input Groups - Icons/Text Block -->
            <div class="block">
                <!-- Input Groups - Icons/Text Title -->
                <div class="block-title">
                    <h2>Groups - Icons/Text</h2>
                </div>
                <!-- END Input Groups - Icons/Text Title -->

                <!-- Input Groups Content -->
                <form action="page_forms_general.php" method="post" class="form-horizontal" onsubmit="return false;">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" id="example-input1-group1" name="example-input1-group1" class="form-control" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="email" id="example-input2-group1" name="example-input2-group1" class="form-control" placeholder="Email">
                            <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                        </div>
                    </div><div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-euro"></i></span>
                            <input type="text" id="example-input3-group1" name="example-input3-group1" class="form-control" placeholder="..">
                            <span class="input-group-addon">.00</span>
                        </div>
                    </div>
                </form>
                <!-- END Input Groups - Icons/Text Content -->
            </div>
            <!-- END Input Groups - Icons/Text Block -->
        </div>
        <div class="col-sm-4">
            <!-- Input Groups - Buttons Block -->
            <div class="block">
                <!-- Input Groups - Buttons Title -->
                <div class="block-title">
                    <h2>Groups - Buttons</h2>
                </div>
                <!-- END Input Groups - Buttons Title -->

                <!-- Input Groups - Buttons Content -->
                <form action="page_forms_general.php" method="post" class="form-horizontal" onsubmit="return false;">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default"><i class="fa fa-search"></i> Search</button>
                            </span>
                            <input type="text" id="example-input1-group2" name="example-input1-group2" class="form-control" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="email" id="example-input2-group2" name="example-input2-group2" class="form-control" placeholder="Email">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-default">Submit</button>
                            </span>
                        </div>
                    </div><div class="form-group">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info"><i class="fa fa-facebook"></i> Facebook</button>
                            </span>
                            <input type="text" id="example-input3-group2" name="example-input3-group2" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info"><i class="fa fa-twitter"></i> Twitter</button>
                            </span>
                        </div>
                    </div>
                </form>
                <!-- END Input Groups - Buttons Content -->
            </div>
            <!-- END Input Groups - Buttons Block -->
        </div>
        <div class="col-sm-4">
            <!-- Input Groups - Dropdowns Block -->
            <div class="block">
                <!-- Input Groups - Dropdowns Title -->
                <div class="block-title">
                    <h2>Groups - Dropdowns</h2>
                </div>
                <!-- END Input Groups - Dropdowns Title -->

                <!-- Input Groups - Dropdowns Content -->
                <form action="page_forms_general.php" method="post" class="form-horizontal" onsubmit="return false;">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)">Action</a></li>
                                    <li><a href="javascript:void(0)">Another action</a></li>
                                    <li><a href="javascript:void(0)">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="javascript:void(0)">Separated link</a></li>
                                </ul>
                            </div>
                            <input type="text" id="example-input1-group3" name="example-input1-group3" class="form-control" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="email" id="example-input2-group3" name="example-input2-group3" class="form-control" placeholder="Email">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0)">Action</a></li>
                                    <li><a href="javascript:void(0)">Another action</a></li>
                                    <li><a href="javascript:void(0)">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="javascript:void(0)">Separated link</a></li>
                                </ul>
                            </div>
                        </div>
                    </div><div class="form-group">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default">Action</button>
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)">Action</a></li>
                                    <li><a href="javascript:void(0)">Another action</a></li>
                                    <li><a href="javascript:void(0)">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="javascript:void(0)">Separated link</a></li>
                                </ul>
                            </div>
                            <input type="text" id="example-input3-group3" name="example-input3-group3" class="form-control" placeholder="..">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0)">Action</a></li>
                                    <li><a href="javascript:void(0)">Another action</a></li>
                                    <li><a href="javascript:void(0)">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="javascript:void(0)">Separated link</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END Input Groups - Dropdowns Content -->
            </div>
            <!-- END Input Groups - Dropdowns Block -->
        </div>
    </div>
    <!-- END Input Groups Row -->

    <!-- Form Example with Blocks in the Grid -->
    <div class="row gutter30">
        <div class="col-sm-4">
            <!-- Example Form Block -->
            <div class="block">
                <!-- Example Form Title -->
                <div class="block-title">
                    <h2>Example Form</h2>
                </div>
                <!-- END Example Form Title -->

                <!-- Example Form Content -->
                <form action="page_forms_general.php" method="post" onsubmit="return false;">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" id="example-username" name="example-username" class="form-control" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" id="example-email" name="example-email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                            <input type="password" id="example-password" name="example-password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-power-off"></i> Register</button>
                    </div>
                </form>
                <!-- END Example Form Content -->
            </div>
            <!-- END Example Form Block -->
        </div>
        <div class="col-sm-4">
            <!-- Example Form Block -->
            <div class="block">
                <!-- Example Form Title -->
                <div class="block-title">
                    <h2>Example Form</h2>
                </div>
                <!-- END Example Form Title -->

                <!-- Example Form Content -->
                <form action="page_forms_general.php" method="post" onsubmit="return false;">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" id="example-username2" name="example-username2" class="form-control" placeholder="Username">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="email" id="example-email2" name="example-email2" class="form-control" placeholder="Email">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="password" id="example-password2" name="example-password2" class="form-control" placeholder="Password">
                            <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-lock"></i> Register</button>
                    </div>
                </form>
                <!-- END Example Form Content -->
            </div>
            <!-- END Example Form Block -->
        </div>
        <div class="col-sm-4">
            <!-- Example Form Block -->
            <div class="block">
                <!-- Example Form Title -->
                <div class="block-title">
                    <h2>Example Form</h2>
                </div>
                <!-- END Example Form Title -->

                <!-- Example Form Content -->
                <form action="page_forms_general.php" method="post" onsubmit="return false;">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" id="example-username3" name="example-username3" class="form-control">
                            <span class="input-group-addon">Username</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" id="example-email3" name="example-email3" class="form-control">
                            <span class="input-group-addon">Email</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
                            <input type="password" id="example-password3" name="example-password3" class="form-control">
                            <span class="input-group-addon">Password</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
                <!-- END Example Form Content -->
            </div>
            <!-- END Example Form Block -->
        </div>
    </div>
    <!-- END Form Example with Blocks in the Grid -->

    <!-- Input Sizes Block -->
    <div class="block">
        <!-- Input Sizes Title -->
        <div class="block-title">
            <h2>Input Sizes</h2>
        </div>
        <!-- END Input Sizes Title -->

        <!-- Input Sizes Content -->
        <form action="page_forms_general.php" method="post" class="form-horizontal" onsubmit="return false;">
            <h4 class="sub-header">Small, Normal and Large</h4>
            <div class="form-group">
                <label class="col-md-2 control-label" for="example-input-small">Small Input</label>
                <div class="col-md-3">
                    <input type="text" id="example-input-small" name="example-input-small" class="form-control input-sm" placeholder=".input-sm">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="example-input-normal">Normal Input</label>
                <div class="col-md-3">
                    <input type="text" id="example-input-normal" name="example-input-normal" class="form-control" placeholder="Normal">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="example-input-large">Large Input</label>
                <div class="col-md-3">
                    <input type="text" id="example-input-large" name="example-input-large" class="form-control input-lg" placeholder=".input-lg">
                </div>
            </div>
            <h4 class="sub-header">User grid classes to create any width size you want</h4>
            <div class="form-group">
                <label class="col-sm-2 control-label">Grid Inputs</label>
                <div class="col-sm-1">
                    <input type="text" class="form-control" placeholder=".col-sm-1">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-2 col-sm-offset-2">
                    <input type="text" class="form-control" placeholder=".col-sm-2">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3 col-sm-offset-2">
                    <input type="text" class="form-control" placeholder=".col-sm-3">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <input type="text" class="form-control" placeholder=".col-sm-4">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-5 col-sm-offset-2">
                    <input type="text" class="form-control" placeholder=".col-sm-5">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6 col-sm-offset-2">
                    <input type="text" class="form-control" placeholder=".col-sm-6">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-7 col-sm-offset-2">
                    <input type="text" class="form-control" placeholder=".col-sm-7">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-8 col-sm-offset-2">
                    <input type="text" class="form-control" placeholder=".col-sm-8">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-9 col-sm-offset-2">
                    <input type="text" class="form-control" placeholder=".col-sm-9">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <input type="text" class="form-control" placeholder=".col-sm-10">
                </div>
            </div>
        </form>
        <!-- END Input Sizes Content -->
    </div>
    <!-- END Input Sizes Block -->

    <!-- Input Grid Row -->
    <div class="row gutter30">
        <div class="col-md-6">
            <!-- Input Grid Block -->
            <div class="block">
                <!-- Input Grid Title -->
                <div class="block-title">
                    <h2>Use the grid for any layout! <small><code>.col-lg-*</code> <code>.col-md-*</code> <code>.col-sm-*</code></small></h2>
                </div>
                <!-- END Input Grid Title -->

                <!-- Input Grid Content -->
                <form action="page_forms_general.php" method="post" class="form-horizontal form-grid" onsubmit="return false;">
                    <div class="form-group">
                        <div class="col-md-7">
                            <input type="text" class="form-control" placeholder=".col-md-7">
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control" placeholder=".col-md-5">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder=".col-md-6">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder=".col-md-6">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <input type="text" class="form-control" placeholder=".col-md-3">
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" placeholder=".col-md-9">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-8">
                            <input type="text" class="form-control" placeholder=".col-md-8">
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder=".col-md-4">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-3">
                            <input type="text" class="form-control" placeholder=".col-md-3">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" placeholder=".col-md-3">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" placeholder=".col-md-3">
                        </div>
                        <div class="col-md-3">
                            <input type="text" class="form-control" placeholder=".col-md-3">
                        </div>
                    </div>
                </form>
                <!-- END Input Grid Content -->
            </div>
            <!-- END Input Grid Block -->
        </div>
        <div class="col-md-6">
            <!-- Input Grid Block -->
            <div class="block">
                <!-- Input Grid Title -->
                <div class="block-title">
                    <h2>Input Grid for small devices <small>The grid will remain intact <code>.col-xs-*</code></small></h2>
                </div>
                <!-- END Input Grid Title -->

                <!-- Input Grid Content -->
                <form action="page_forms_general.php" method="post" class="form-horizontal form-grid">
                    <div class="form-group">
                        <div class="col-xs-7">
                            <input type="text" class="form-control" placeholder=".col-xs-7">
                        </div>
                        <div class="col-xs-5">
                            <input type="text" class="form-control" placeholder=".col-xs-5">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-6">
                            <input type="text" class="form-control" placeholder=".col-xs-6">
                        </div>
                        <div class="col-xs-6">
                            <input type="text" class="form-control" placeholder=".col-xs-6">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-8">
                            <input type="text" class="form-control" placeholder=".col-xs-8">
                        </div>
                        <div class="col-xs-4">
                            <input type="text" class="form-control" placeholder=".col-xs-4">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-3">
                            <input type="text" class="form-control" placeholder=".col-xs-3">
                        </div>
                        <div class="col-xs-9">
                            <input type="text" class="form-control" placeholder=".col-xs-9">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-5">
                            <input type="text" class="form-control" placeholder=".col-xs-5">
                        </div>
                        <div class="col-xs-7">
                            <input type="text" class="form-control" placeholder=".col-xs-7">
                        </div>
                    </div>
                </form>
                <!-- END Input Grid Content -->
            </div>
            <!-- END Input Grid Block -->
        </div>
    </div>
    <!-- END Input Grid Row -->
</div>
<!-- END Page Content -->

<?php $this->load->view('footer'); ?>
<?php $this->load->view('bottom'); ?>