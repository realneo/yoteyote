<?php $this->load->view('partials/top'); ?>

<!-- Page content -->
<div id="page-content" class="block">
    <!-- Blocks - Grid Header -->
    <div class="block-header">
        <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
        <a href="" class="header-title-link">
            <h1>
                <i class="fa fa-th-large animation-expandUp"></i>Blocks - Grid<br><small>Create well structured pages using the flexible grid and blocks!</small>
            </h1>
        </a>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><i class="fa fa-rocket"></i></li>
        <li>Elements</li>
        <li><a href="">Blocks - Grid</a></li>
    </ul>
    <!-- END Blocks - Grid Header -->

    <h3 class="page-header">Blocks</h3>

    <!-- Block -->
    <div class="block">
        <!-- Block Title -->
        <div class="block-title"><h2>Block's Title</h2></div>
        <!-- END Block Title -->

        <!-- Block Content -->
        <p>This is block's content..</p>
        <!-- END Block Content -->
    </div>
    <!-- END Block -->

    <!-- Block with Options Row -->
    <div class="row gutter30">
        <div class="col-md-6">
            <!-- Block with Options -->
            <div class="block">
                <!-- Block with Options Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                        <div class="btn-group btn-group-sm">
                            <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Post on Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Post on Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                            <div class="btn-group btn-group-sm">
                                <a href="javascript:void(0)" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0)">Action</a></li>
                                    <li class="disabled"><a href="javascript:void(0)">Disabled</a></li>
                                    <li class="divider"></li>
                                    <li><a href="javascript:void(0)">Another Action</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <h2>Title</h2>
                </div>
                <!-- END Block with Options Title -->

                <!-- Block with Options Content -->
                <p>You can have a block with button options to the top right..</p>
                <!-- END Block with Options Content -->
            </div>
            <!-- END Block with Options -->
        </div>
        <div class="col-md-6">
            <!-- Block with Options Left -->
            <div class="block">
                <!-- Block with Options Left Title -->
                <div class="block-title clearfix">
                    <div class="block-options pull-left">
                        <div class="btn-group btn-group-sm">
                            <div class="btn-group btn-group-sm">
                                <a href="javascript:void(0)" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)">Action</a></li>
                                    <li class="disabled"><a href="javascript:void(0)">Disabled</a></li>
                                    <li class="divider"></li>
                                    <li><a href="javascript:void(0)">Another Action</a></li>
                                </ul>
                            </div>
                            <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Settings"><i class="fa fa-cog"></i></a>
                            <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Post on Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Post on Facebook"><i class="fa fa-facebook"></i></a>
                        </div>
                    </div>
                    <h2 class="pull-right">Title</h2>
                </div>
                <!-- END Block with Options Left Title -->

                <!-- Block with Options Left Content -->
                <p>...or to the top left!</p>
                <!-- END Block with Options Left Content -->
            </div>
            <!-- END Block with Options Left -->
        </div>
    </div>
    <!-- END Block with Options Row -->

    <!-- Grids Content -->
    <h3 class="page-header">12 Column Grids</h3>
    <h4 class="sub-header">Grid with 10px gutter</h4>
    <div class="row">
        <div class="col-sm-4">
            <div class="block"><p><code>.col-sm-4</code></p></div>
        </div>
        <div class="col-sm-4">
            <div class="block"><p><code>.col-sm-4</code></p></div>
        </div>
        <div class="col-sm-4">
            <div class="block"><p><code>.col-sm-4</code></p></div>
        </div>
    </div>
    <h4 class="sub-header">Grid with 30px gutter</h4>
    <div class="row gutter30">
        <div class="col-sm-4">
            <div class="block"><p><code>.col-sm-4</code></p></div>
        </div>
        <div class="col-sm-4">
            <div class="block"><p><code>.col-sm-4</code></p></div>
        </div>
        <div class="col-sm-4">
            <div class="block"><p><code>.col-sm-4</code></p></div>
        </div>
    </div>
    <h4 class="sub-header">Grid <small><code>.col-xs-*</code> (never collapsing)</small></h4>
    <div class="row gutter30">
        <div class="col-xs-6">
            <div class="block"><p><code>.col-xs-6</code></p></div>
        </div>
        <div class="col-xs-6">
            <div class="block"><p><code>.col-xs-6</code></p></div>
        </div>
    </div>
    <h4 class="sub-header">Grid <small><code>.col-sm-*</code> (collapsed at 768px)</small></h4>
    <div class="row gutter30">
        <div class="col-sm-4">
            <div class="block"><p><code>.col-sm-4</code></p></div>
        </div>
        <div class="col-sm-4">
            <div class="block"><p><code>.col-sm-4</code></p></div>
        </div>
        <div class="col-sm-4">
            <div class="block"><p><code>.col-sm-4</code></p></div>
        </div>
    </div>
    <h4 class="sub-header">Grid <small><code>.col-md-*</code> (collapsed at 992px)</small></h4>
    <div class="row gutter30">
        <div class="col-md-4">
            <div class="block"><p><code>.col-md-4</code></p></div>
        </div>
        <div class="col-md-4">
            <div class="block"><p><code>.col-md-4</code></p></div>
        </div>
        <div class="col-md-4">
            <div class="block"><p><code>.col-md-4</code></p></div>
        </div>
    </div>
    <h4 class="sub-header">Grid <small><code>.col-lg-*</code> (collapsed at 1200px)</small></h4>
    <div class="row gutter30">
        <div class="col-lg-4">
            <div class="block"><p><code>.col-lg-4</code></p></div>
        </div>
        <div class="col-lg-4">
            <div class="block"><p><code>.col-lg-4</code></p></div>
        </div>
        <div class="col-lg-4">
            <div class="block"><p><code>.col-lg-4</code></p></div>
        </div>
    </div>
    <h4 class="sub-header">Example</h4>
    <div class="row gutter30">
        <div class="col-sm-2">
            <div class="block"><p><code>.col-sm-2</code></p></div>
        </div>
        <div class="col-sm-2">
            <div class="block"><p><code>.col-sm-2</code></p></div>
        </div>
        <div class="col-sm-2">
            <div class="block"><p><code>.col-sm-2</code></p></div>
        </div>
        <div class="col-sm-2">
            <div class="block"><p><code>.col-sm-2</code></p></div>
        </div>
        <div class="col-sm-2">
            <div class="block"><p><code>.col-sm-2</code></p></div>
        </div>
        <div class="col-sm-2">
            <div class="block"><p><code>.col-sm-2</code></p></div>
        </div>
        <div class="col-sm-3">
            <div class="block"><p><code>.col-sm-3</code></p></div>
        </div>
        <div class="col-sm-3">
            <div class="block"><p><code>.col-sm-3</code></p></div>
        </div>
        <div class="col-sm-3">
            <div class="block"><p><code>.col-sm-3</code></p></div>
        </div>
        <div class="col-sm-3">
            <div class="block"><p><code>.col-sm-3</code></p></div>
        </div>
        <div class="col-sm-4">
            <div class="block"><p><code>.col-sm-4</code></p></div>
        </div>
        <div class="col-sm-4">
            <div class="block"><p><code>.col-sm-4</code></p></div>
        </div>
        <div class="col-sm-4">
            <div class="block"><p><code>.col-sm-4</code></p></div>
        </div>
        <div class="col-sm-6">
            <div class="block"><p><code>.col-sm-6</code></p></div>
        </div>
        <div class="col-sm-6">
            <div class="block"><p><code>.col-sm-6</code></p></div>
        </div>
        <div class="col-sm-7">
            <div class="block"><p><code>.col-sm-7</code></p></div>
        </div>
        <div class="col-sm-5">
            <div class="block"><p><code>.col-sm-5</code></p></div>
        </div>
        <div class="col-sm-4">
            <div class="block"><p><code>.col-sm-4</code></p></div>
        </div>
        <div class="col-sm-8">
            <div class="block"><p><code>.col-sm-8</code></p></div>
        </div>
        <div class="col-sm-9">
            <div class="block"><p><code>.col-sm-9</code></p></div>
        </div>
        <div class="col-sm-3">
            <div class="block"><p><code>.col-sm-3</code></p></div>
        </div>
        <div class="col-sm-2">
            <div class="block"><p><code>.col-sm-2</code></p></div>
        </div>
        <div class="col-sm-10">
            <div class="block"><p><code>.col-sm-10</code></p></div>
        </div>
    </div>
    <!-- END Grids Content -->

    <!-- Grid Blocks -->
    <h3 class="page-header">Create any layout you want using the grid!</h3>

    <div class="block">
        <!-- Grid Blocks Title -->
        <div class="block-title"><h2>Grid of Blocks in Block</h2></div>
        <!-- END Grid Blocks Title -->

        <!-- Grid Blocks Content -->
        <div class="row gutter30">
            <div class="col-sm-3">
                <!-- Block 1 -->
                <div class="block">
                    <div class="block-title"><h4>Block</h4></div>
                    <p>...</p>
                </div>
                <!-- END Block 1 -->
            </div>
            <div class="col-sm-3">
                <!-- Block 2 -->
                <div class="block">
                    <div class="block-title"><h4>Block</h4></div>
                    <p>...</p>
                </div>
                <!-- END Block 2 -->
            </div>
            <div class="col-sm-6">
                <!-- Block 3 -->
                <div class="block">
                    <div class="block-title"><h4>Block</h4></div>
                    <p>...</p>
                </div>
                <!-- END Block 3 -->
            </div>
        </div>
        <!-- END Grid Blocks -->
    </div>
    <!-- END Grid Blocks Block -->

    <!-- Blocks in Grid -->
    <div class="row gutter30">
        <div class="col-sm-2">
            <div class="block">
                <div class="block-title"><h4>1/6</h4></div>
                <p>...</p>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="block">
                <div class="block-title"><h4>1/6</h4></div>
                <p>...</p>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="block">
                <div class="block-title"><h4>1/6</h4></div>
                <p>...</p>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="block">
                <div class="block-title"><h4>1/6</h4></div>
                <p>...</p>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="block">
                <div class="block-title"><h4>1/6</h4></div>
                <p>...</p>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="block">
                <div class="block-title"><h4>1/6</h4></div>
                <p>...</p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="block">
                <div class="block-title"><h4>1/3</h4></div>
                <p>...</p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="block">
                <div class="block-title"><h4>1/3</h4></div>
                <p>...</p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="block">
                <div class="block-title"><h4>1/3</h4></div>
                <p>...</p>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="block">
                <div class="block-title"><h4>1/2</h4></div>
                <p>...</p>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="block">
                <div class="block-title"><h4>1/2</h4></div>
                <p>...</p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="block">
                <div class="block-title"><h4>1/3</h4></div>
                <p>...</p>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="block">
                <div class="block-title"><h4>2/3</h4></div>
                <p>...</p>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="block">
                <div class="block-title"><h4>2/3</h4></div>
                <p>...</p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="block">
                <div class="block-title"><h4>1/3</h4></div>
                <p>...</p>
            </div>
        </div>
    </div>
    <!-- END Blocks in Grid -->

    <!-- Paragraphs Block -->
    <div class="block">
        <!-- Paragraphs Title -->
        <div class="block-title">
            <h2>Paragraphs</h2>
        </div>
        <!-- END Paragraphs Title -->

        <!-- Paragraphs Content -->
        <div class="row gutter30">
            <div class="col-md-6">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit. Ut egestas tempor est, in cursus enim venenatis eget! Nulla quis ligula ipsum. Donec vitae ultrices dolor?</p>
            </div>
            <div class="col-md-6">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit. Ut egestas tempor est, in cursus enim venenatis eget! Nulla quis ligula ipsum. Donec vitae ultrices dolor?</p>
            </div>
        </div>
        <div class="row gutter30">
            <div class="col-md-4">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus.</p>
            </div>
            <div class="col-md-4">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus.</p>
            </div>
            <div class="col-md-4">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus.</p>
            </div>
        </div>
        <div class="row gutter30">
            <div class="col-md-8">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit. Ut egestas tempor est, in cursus enim venenatis eget! Nulla quis ligula ipsum. Donec vitae ultrices dolor?</p>
            </div>
            <div class="col-md-4">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat.</p>
            </div>
        </div>
        <div class="row gutter30">
            <div class="col-md-4">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat.</p>
            </div>
            <div class="col-md-8">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit. Ut egestas tempor est, in cursus enim venenatis eget! Nulla quis ligula ipsum. Donec vitae ultrices dolor?</p>
            </div>
        </div>
        <!-- END Paragraphs Content -->
    </div>
    <!-- END Paragraphs Block -->
</div>
<!-- END Page Content -->

<?php $this->load->view('partials/footer'); ?>
<?php $this->load->view('partials/bottom'); ?>