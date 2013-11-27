<?php $this->load->view('top'); ?>

<!-- Page content -->
<div id="page-content" class="block">
    <!-- Search Results Header -->
    <div class="block-header">
        <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
        <a href="" class="header-title-link">
            <h1>
                <i class="fa fa-search"></i>Search Results<br><small>Projects, Users and Classic styles ready to be used!</small>
            </h1>
        </a>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><i class="fa fa-file-o"></i></li>
        <li>Pages</li>
        <li><a href="">Search Results</a></li>
    </ul>
    <!-- END Search Results Header -->

    <!-- Search Form -->
    <div class="block-section">
        <form action="page_ready_search_results.php" method="post">
            <div class="input-group input-group-lg">
                <div class="input-group-btn">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Everything <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li class="active"><a href="javascript:void(0)"><i class="fa fa-check"></i> Everything</a></li>
                        <li class="divider"></li>
                        <li><a href="javascript:void(0)">Users</a></li>
                        <li><a href="javascript:void(0)">Projects</a></li>
                        <li><a href="javascript:void(0)">Sites</a></li>
                    </ul>
                </div>
                <input type="text" id="search-term" name="search-term" class="form-control" placeholder="Search..">
                <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search fa-fw"></i></button>
                </div>
            </div>
        </form>
    </div>
    <!-- END Search Form -->

    <!-- Search Styles -->
    <div class="block block-tabs">
        <!-- Search Styles Title -->
        <div class="block-title">
            <ul class="nav nav-tabs" data-toggle="tabs">
                <li class="active"><a href="#search-tab-project">Projects</a></li>
                <li><a href="#search-tab-user">Users</a></li>
                <li><a href="#search-tab-classic">Classic</a></li>
            </ul>
        </div>
        <!-- END Search Styles Title -->

        <!-- Search Styles Content -->
        <div class="tab-content">
            <!-- Project Search -->
            <div class="tab-pane active" id="search-tab-project">
                <!-- Search Info - Pagination -->
                <div class="block-section clearfix">
                    <ul class="pagination remove-margin pull-right">
                        <li class="disabled"><a href="javascript:void(0)">&laquo;</a></li>
                        <li class="active"><a href="javascript:void(0)">1</a></li>
                        <li><a href="javascript:void(0)">2</a></li>
                        <li><a href="javascript:void(0)">3</a></li>
                        <li><a href="javascript:void(0)">&raquo;</a></li>
                    </ul>
                    <h4><strong>15</strong> <small>Results</small></h4>
                </div>
                <!-- END Search Info - Pagination -->

                <!-- The Results -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-xs-6">Project</th>
                            <th class="col-xs-6 text-center">Results</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-xs-6">
                                <h4><a href="javascript:void(0)">Project Title</a></h4>
                                <p>
                                    <a href="page_special_user_profile.php" class="label label-danger">John</a>
                                    <a href="page_special_user_profile.php" class="label label-danger">Michael</a>
                                </p>
                                <p><em>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti.</em></p>
                            </td>
                            <td class="col-xs-6">
                                <!-- Results Row -->
                                <div class="row text-center">
                                    <div class="col-md-4">
                                        <h4>EARNINGS</h4>
                                        <h2 class="text-success">$ 40320</h2>
                                    </div>
                                    <div class="col-md-4">
                                        <h4>ALL SALES</h4>
                                        <h2 class="text-primary">3360</h2>
                                    </div>
                                    <div class="col-md-4">
                                        <h4>SALES TODAY</h4>
                                        <h2 class="text-warning">70</h2>
                                    </div>
                                </div>
                                <!-- END Results Row -->
                            </td>
                        </tr>
                        <tr>
                            <td class="col-xs-6">
                                <h4><a href="javascript:void(0)">Project Title</a></h4>
                                <p>
                                    <a href="page_special_user_profile.php" class="label label-danger">Lisa</a>
                                    <a href="page_special_user_profile.php" class="label label-danger">Ann</a>
                                </p>
                                <p><em>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti.</em></p>
                            </td>
                            <td class="col-xs-6">
                                <!-- Results Row -->
                                <div class="row text-center">
                                    <div class="col-md-4">
                                        <h4>EARNINGS</h4>
                                        <h2 class="text-success">$ 32376</h2>
                                    </div>
                                    <div class="col-md-4">
                                        <h4>ALL SALES</h4>
                                        <h2 class="text-primary">2698</h2>
                                    </div>
                                    <div class="col-md-4">
                                        <h4>SALES TODAY</h4>
                                        <h2 class="text-warning">35</h2>
                                    </div>
                                </div>
                                <!-- END Results Row -->
                            </td>
                        </tr>
                        <tr>
                            <td class="col-xs-6">
                                <h4><a href="javascript:void(0)">Project Title</a></h4>
                                <p>
                                    <a href="page_special_user_profile.php" class="label label-danger">Michael</a>
                                </p>
                                <p><em>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti.</em></p>
                            </td>
                            <td class="col-xs-6">
                                <!-- Results Row -->
                                <div class="row text-center">
                                    <div class="col-md-4">
                                        <h4>EARNINGS</h4>
                                        <h2 class="text-success">$ 11820</h2>
                                    </div>
                                    <div class="col-md-4">
                                        <h4>ALL SALES</h4>
                                        <h2 class="text-primary">985</h2>
                                    </div>
                                    <div class="col-md-4">
                                        <h4>SALES TODAY</h4>
                                        <h2 class="text-warning">15</h2>
                                    </div>
                                </div>
                                <!-- END Results Row -->
                            </td>
                        </tr>
                        <tr>
                            <td class="col-xs-6">
                                <h4><a href="javascript:void(0)">Project Title</a></h4>
                                <p>
                                    <a href="page_special_user_profile.php" class="label label-danger">Sarah</a>
                                </p>
                                <p><em>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti.</em></p>
                            </td>
                            <td class="col-xs-6">
                                <!-- Results Row -->
                                <div class="row text-center">
                                    <div class="col-md-4">
                                        <h4>EARNINGS</h4>
                                        <h2 class="text-success">$ 82224</h2>
                                    </div>
                                    <div class="col-md-4">
                                        <h4>ALL SALES</h4>
                                        <h2 class="text-primary">6852</h2>
                                    </div>
                                    <div class="col-md-4">
                                        <h4>SALES TODAY</h4>
                                        <h2 class="text-warning">135</h2>
                                    </div>
                                </div>
                                <!-- END Results Row -->
                            </td>
                        </tr>
                        <tr>
                            <td class="col-xs-6">
                                <h4><a href="javascript:void(0)">Project Title</a></h4>
                                <p>
                                    <a href="page_special_user_profile.php" class="label label-danger">John</a>
                                </p>
                                <p><em>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti.</em></p>
                            </td>
                            <td class="col-xs-6">
                                <!-- Results Row -->
                                <div class="row text-center">
                                    <div class="col-md-4">
                                        <h4>EARNINGS</h4>
                                        <h2 class="text-success">$ 8280</h2>
                                    </div>
                                    <div class="col-md-4">
                                        <h4>ALL SALES</h4>
                                        <h2 class="text-primary">690</h2>
                                    </div>
                                    <div class="col-md-4">
                                        <h4>SALES TODAY</h4>
                                        <h2 class="text-warning">27</h2>
                                    </div>
                                </div>
                                <!-- END Results Row -->
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- END The Results -->

                <!-- Bottom Navigation -->
                <div class="block-section text-right">
                    <ul class="pagination remove-margin">
                        <li class="disabled"><a href="javascript:void(0)">&laquo;</a></li>
                        <li class="active"><a href="javascript:void(0)">1</a></li>
                        <li><a href="javascript:void(0)">2</a></li>
                        <li><a href="javascript:void(0)">3</a></li>
                        <li><a href="javascript:void(0)">&raquo;</a></li>
                    </ul>
                </div>
                <!-- END Bottom Navigation -->
            </div>
            <!-- END Project Search -->

            <!-- User Search -->
            <div class="tab-pane" id="search-tab-user">
                <!-- Search Info - Pagination -->
                <div class="block-section clearfix">
                    <ul class="pagination remove-margin pull-right">
                        <li class="disabled"><a href="javascript:void(0)">&laquo;</a></li>
                        <li class="active"><a href="javascript:void(0)">1</a></li>
                        <li><a href="javascript:void(0)">2</a></li>
                        <li><a href="javascript:void(0)">3</a></li>
                        <li><a href="javascript:void(0)">4</a></li>
                        <li><a href="javascript:void(0)">&raquo;</a></li>
                    </ul>
                    <h4><strong>40</strong> <small>Results</small></h4>
                </div>
                <!-- END Search Info - Pagination -->

                <!-- The Results -->
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">Photo</th>
                                <th>Full Name</th>
                                <th>Username</th>
                                <th>Status</th>
                                <th class="text-center"><i class="fa fa-user"></i> Account</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center"><img src="<?php echo img_url('placeholders/image_64x64_light.png'); ?>" class="img-circle" alt="photo"></td>
                                <td><a href="page_special_user_profile.php">John Doe</a></td>
                                <td>username1</td>
                                <td><span class="label label-success">Active</span></td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="page_special_user_profile.php" class="btn btn-default" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><img src="<?php echo img_url('placeholders/image_64x64_dark.png'); ?>" class="img-circle" alt="photo"></td>
                                <td><a href="page_special_user_profile.php">John Doe</a></td>
                                <td>username2</td>
                                <td><span class="label label-success">Active</span></td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="page_special_user_profile.php" class="btn btn-default" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><img src="<?php echo img_url('placeholders/image_64x64_light.png'); ?>" class="img-circle" alt="photo"></td>
                                <td><a href="page_special_user_profile.php">John Doe</a></td>
                                <td>username3</td>
                                <td><span class="label label-default">Inactive</span></td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="page_special_user_profile.php" class="btn btn-default" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><img src="<?php echo img_url('placeholders/image_64x64_dark.png'); ?>" class="img-circle" alt="photo"></td>
                                <td><a href="page_special_user_profile.php">John Doe</a></td>
                                <td>username4</td>
                                <td><span class="label label-warning">Pending..</span></td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="page_special_user_profile.php" class="btn btn-default" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><img src="<?php echo img_url('placeholders/image_64x64_light.png'); ?>" class="img-circle" alt="photo"></td>
                                <td><a href="page_special_user_profile.php">John Doe</a></td>
                                <td>username5</td>
                                <td><span class="label label-danger">Disabled</span></td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="page_special_user_profile.php" class="btn btn-default" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><img src="<?php echo img_url('placeholders/image_64x64_dark.png'); ?>" class="img-circle" alt="photo"></td>
                                <td><a href="page_special_user_profile.php">John Doe</a></td>
                                <td>username6</td>
                                <td><span class="label label-success">Active</span></td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="page_special_user_profile.php" class="btn btn-default" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><img src="<?php echo img_url('placeholders/image_64x64_light.png'); ?>" class="img-circle" alt="photo"></td>
                                <td><a href="page_special_user_profile.php">John Doe</a></td>
                                <td>username7</td>
                                <td><span class="label label-danger">Disabled</span></td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="page_special_user_profile.php" class="btn btn-default" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><img src="<?php echo img_url('placeholders/image_64x64_dark.png'); ?>" class="img-circle" alt="photo"></td>
                                <td><a href="page_special_user_profile.php">John Doe</a></td>
                                <td>username8</td>
                                <td><span class="label label-warning">Pending..</span></td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="page_special_user_profile.php" class="btn btn-default" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><img src="<?php echo img_url('placeholders/image_64x64_light.png'); ?>" class="img-circle" alt="photo"></td>
                                <td><a href="page_special_user_profile.php">John Doe</a></td>
                                <td>username9</td>
                                <td><span class="label label-success">Active</span></td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="page_special_user_profile.php" class="btn btn-default" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center"><img src="<?php echo img_url('placeholders/image_64x64_dark.png'); ?>" class="img-circle" alt="photo"></td>
                                <td><a href="page_special_user_profile.php">John Doe</a></td>
                                <td>username10</td>
                                <td><span class="label label-success">Active</span></td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <a href="page_special_user_profile.php" class="btn btn-default" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Delete"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- END The Results -->

                <!-- Bottom Navigation -->
                <div class="block-section text-right">
                    <ul class="pagination remove-margin">
                        <li class="disabled"><a href="javascript:void(0)">&laquo;</a></li>
                        <li class="active"><a href="javascript:void(0)">1</a></li>
                        <li><a href="javascript:void(0)">2</a></li>
                        <li><a href="javascript:void(0)">3</a></li>
                        <li><a href="javascript:void(0)">4</a></li>
                        <li><a href="javascript:void(0)">&raquo;</a></li>
                    </ul>
                </div>
                <!-- END Bottom Navigation -->
            </div>
            <!-- END User Search -->

            <!-- Classic Search -->
            <div class="tab-pane" id="search-tab-classic">
                <!-- Search Info - Pagination -->
                <div class="block-section clearfix">
                    <ul class="pagination remove-margin pull-right">
                        <li class="disabled"><a href="javascript:void(0)">&laquo;</a></li>
                        <li class="active"><a href="javascript:void(0)">1</a></li>
                        <li><a href="javascript:void(0)">2</a></li>
                        <li><a href="javascript:void(0)">3</a></li>
                        <li><a href="javascript:void(0)">&raquo;</a></li>
                    </ul>
                    <h4><strong>30</strong> <small>Results</small></h4>
                </div>
                <!-- END Search Info - Pagination -->

                <!-- The Results -->
                <ol>
                    <li>
                        <h4 class="sub-header"><a href="javascript:void(0)">Premium Admin Dashboard Template</a></h4>
                        <em>September 30, 2013</em> | <a href="javascript:void(0)">http://example.com/</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi.</p>
                    </li>
                    <li>
                        <h4 class="sub-header"><a href="javascript:void(0)">Premium Admin Dashboard Template</a></h4>
                        <em>September 30, 2013</em> | <a href="javascript:void(0)">http://example.com/</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi.</p>
                    </li>
                    <li>
                        <h4 class="sub-header"><a href="javascript:void(0)">Premium Admin Dashboard Template</a></h4>
                        <em>September 30, 2013</em> | <a href="javascript:void(0)">http://example.com/</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi.</p>
                    </li>
                    <li>
                        <h4 class="sub-header"><a href="javascript:void(0)">Premium Admin Dashboard Template</a></h4>
                        <em>September 30, 2013</em> | <a href="javascript:void(0)">http://example.com/</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi.</p>
                    </li>
                    <li>
                        <h4 class="sub-header"><a href="javascript:void(0)">Premium Admin Dashboard Template</a></h4>
                        <em>September 30, 2013</em> | <a href="javascript:void(0)">http://example.com/</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi.</p>
                    </li>
                    <li>
                        <h4 class="sub-header"><a href="javascript:void(0)">Premium Admin Dashboard Template</a></h4>
                        <em>September 30, 2013</em> | <a href="javascript:void(0)">http://example.com/</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi.</p>
                    </li>
                    <li>
                        <h4 class="sub-header"><a href="javascript:void(0)">Premium Admin Dashboard Template</a></h4>
                        <em>September 30, 2013</em> | <a href="javascript:void(0)">http://example.com/</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi.</p>
                    </li>
                    <li>
                        <h4 class="sub-header"><a href="javascript:void(0)">Premium Admin Dashboard Template</a></h4>
                        <em>September 30, 2013</em> | <a href="javascript:void(0)">http://example.com/</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi.</p>
                    </li>
                    <li>
                        <h4 class="sub-header"><a href="javascript:void(0)">Premium Admin Dashboard Template</a></h4>
                        <em>September 30, 2013</em> | <a href="javascript:void(0)">http://example.com/</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi.</p>
                    </li>
                    <li>
                        <h4 class="sub-header"><a href="javascript:void(0)">Premium Admin Dashboard Template</a></h4>
                        <em>September 30, 2013</em> | <a href="javascript:void(0)">http://example.com/</a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi.</p>
                    </li>
                </ol>
                <!-- END The Results -->

                <!-- Bottom Navigation -->
                <div class="block-section text-right">
                    <ul class="pagination remove-margin">
                        <li class="disabled"><a href="javascript:void(0)">&laquo;</a></li>
                        <li class="active"><a href="javascript:void(0)">1</a></li>
                        <li><a href="javascript:void(0)">2</a></li>
                        <li><a href="javascript:void(0)">3</a></li>
                        <li><a href="javascript:void(0)">&raquo;</a></li>
                    </ul>
                </div>
                <!-- END Bottom Navigation -->
            </div>
            <!-- END Classic Search -->
        </div>
        <!-- END Search Styles Content -->
    </div>
    <!-- END Search Styles -->
</div>
<!-- END Page Content -->

<?php $this->load->view('footer'); ?>
<?php $this->load->view('bottom'); ?>