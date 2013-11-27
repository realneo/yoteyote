<?php $this->load->view('top'); ?>

<!-- Page content -->
<div id="page-content" class="block">
    <!-- Blank Header -->
    <div class="block-header">
        <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
        <a href="" class="header-title-link">
            <h1>
                <i class="glyphicon-comments animation-expandUp"></i>Forum<br><small>Ready to use UI to create your forum!</small>
            </h1>
        </a>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><i class=" fa fa-file-o"></i></li>
        <li>Pages</li>
        <li><a href="">Forum</a></li>
    </ul>
    <!-- END Blank Header -->

    <!-- Forum Content -->
    <!-- Tabs -->
    <ul class="nav nav-tabs push" data-toggle="tabs">
        <li class="active"><a href="#forum-cats">Categories</a></li>
        <li><a href="#forum-topics">Topics</a></li>
        <li><a href="#forum-discussion">Discussion</a></li>
    </ul>
    <!-- END Tabs -->

    <!-- Tab Content -->
    <div class="tab-content">
        <!-- Forum -->
        <div class="tab-pane active" id="forum-cats">
            <!-- Intro Category -->
            <table class="table forum remove-margin">
                <thead>
                    <tr>
                        <th></th>
                        <th>Introduction</th>
                        <th class="cell-stat text-center hidden-xs hidden-sm">Topics</th>
                        <th class="cell-stat text-center hidden-xs hidden-sm">Posts</th>
                        <th class="cell-stat-2x hidden-xs hidden-sm">Last Post</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="cell-small text-center"><i class="glyphicon-flag fa-2x themed-color"></i></td>
                        <td>
                            <h4><a href="javascript:void(0)">Welcome</a> <br><small>New members feel free to come inside and introduce yourself</small></h4>
                        </td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">6532</a></td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">152123</a></td>
                        <td class="hidden-xs hidden-sm">by <a href="page_special_user_profile.php">Bill</a><br><small>20:09 - September 12, 2013</small></td>
                    </tr>
                    <tr>
                        <td class="text-center"><i class="glyphicon-pen fa-2x themed-color"></i></td>
                        <td>
                            <h4><a href="javascript:void(0)">Forum Rules</a> <br><small>Please read our forum rules and everything should be fine</small></h4>
                        </td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">10</a></td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">10</a></td>
                        <td class="hidden-xs hidden-sm">by <a href="page_special_user_profile.php">admin</a><br><small>14:42 - July 10, 2013</small></td>
                    </tr>
                </tbody>
            </table>
            <!-- END Intro Category -->

            <!-- Web Design and Development Category -->
            <table class="table forum remove-margin">
                <thead>
                    <tr>
                        <th></th>
                        <th>Web Design and Development</th>
                        <th class="cell-stat text-center hidden-xs hidden-sm">Topics</th>
                        <th class="cell-stat text-center hidden-xs hidden-sm">Posts</th>
                        <th class="cell-stat-2x hidden-xs hidden-sm">Last Post</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="cell-small text-center"><i class="glyphicon-brush fa-2x themed-color"></i></td>
                        <td>
                            <h4><a href="javascript:void(0)">Inspiration</a> <br><small>Getting inspired? This is the right place</small></h4>
                        </td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">6221</a></td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">121235</a></td>
                        <td class="hidden-xs hidden-sm">by <a href="page_special_user_profile.php">John Doe</a><br><small>10:15 - September 25, 2013</small></td>
                    </tr>
                    <tr>
                        <td class="text-center"><i class="glyphicon-tint fa-2x themed-color"></i></td>
                        <td>
                            <h4><a href="javascript:void(0)">Photoshop</a> <br><small>Tutorials, Freebies and Resources</small></h4>
                        </td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">8652</a></td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">165232</a></td>
                        <td class="hidden-xs hidden-sm">by <a href="page_special_user_profile.php">Michael</a><br><small>12:16 - September 26, 2013</small></td>
                    </tr>
                    <tr>
                        <td class="text-center"><i class="glyphicon-embed_close fa-2x themed-color"></i></td>
                        <td>
                            <h4><a href="javascript:void(0)">Text Editors and IDEs</a> <br><small>Find out the best of the best out there</small></h4>
                        </td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">2571</a></td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">56891</a></td>
                        <td class="hidden-xs hidden-sm">by <a href="page_special_user_profile.php">Estelle</a><br><small>18:43 - September 23, 2013</small></td>
                    </tr>
                    <tr>
                        <td class="text-center"><i class="glyphicon-heart_empty fa-2x themed-color"></i></td>
                        <td>
                            <h4><a href="javascript:void(0)">HTML, CSS and Javascript</a> <br><small>Tutorials, best practices, tips and news</small></h4>
                        </td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">12611</a></td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">168753</a></td>
                        <td class="hidden-xs hidden-sm">by <a href="page_special_user_profile.php">Mike</a><br><small>19:31 - September 24, 2013</small></td>
                    </tr>
                    <tr>
                        <td class="text-center"><i class="glyphicon-tower fa-2x themed-color"></i></td>
                        <td>
                            <h4><a href="javascript:void(0)">Server Side Scripting Languages</a> <br><small>PHP, ASP, Ruby, Perl, Python and even more, they are all here</small></h4>
                        </td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">18611</a></td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">178369</a></td>
                        <td class="hidden-xs hidden-sm">by <a href="page_special_user_profile.php">admin</a><br><small>23:25 - September 26, 2013</small></td>
                    </tr>
                </tbody>
            </table>
            <!-- END Web Design and Development Category -->

            <!-- Support Category -->
            <table class="table forum">
                <thead>
                    <tr>
                        <th></th>
                        <th>Support</th>
                        <th class="cell-stat text-center hidden-xs hidden-sm">Topics</th>
                        <th class="cell-stat text-center hidden-xs hidden-sm">Posts</th>
                        <th class="cell-stat-2x hidden-xs hidden-sm">Last Post</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="cell-small text-center"><i class="glyphicon-circle_question_mark fa-2x themed-color"></i></td>
                        <td>
                            <h4><a href="javascript:void(0)">Help</a> <br><small>Got stuck somewhere and need help? We are here</small></h4>
                        </td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">3251</a></td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">52561</a></td>
                        <td class="hidden-xs hidden-sm">by <a href="page_special_user_profile.php">John Doe</a><br><small>09:17 - September 27, 2013</small></td>
                    </tr>
                </tbody>
            </table>
            <!-- END Support Category -->
        </div>
        <!-- END Forum -->

        <!-- Topics -->
        <div class="tab-pane" id="forum-topics">
            <div class="push clearfix">
                <div class="pull-right">
                    <ul class="pagination pagination-sm remove-margin">
                        <li class="disabled"><a href="javascript:void(0)">Prev</a></li>
                        <li class="active"><a href="javascript:void(0)">1</a></li>
                        <li><a href="javascript:void(0)">2</a></li>
                        <li><a href="javascript:void(0)">...</a></li>
                        <li><a href="javascript:void(0)">Next</a></li>
                    </ul>
                </div>
                <a href="javascript:void(0)" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> New</a>
            </div>
            <table class="table forum">
                <thead>
                    <tr>
                        <th colspan="2">Forum Category</th>
                        <th class="cell-stat text-center hidden-xs hidden-sm">Replies</th>
                        <th class="cell-stat text-center hidden-xs hidden-sm">Views</th>
                        <th class="cell-stat-2x hidden-xs hidden-sm">Last Post</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="active">
                        <td class="text-center cell-small sticky"><i class="glyphicon-construction_cone fa-2x themed-color"></i></td>
                        <td>
                            <h4><a href="javascript:void(0)">Topic Title</a> <br><small>by <a href="page_special_user_profile.php">admin</a>, September 20, 2013, 16:00</small></h4>
                        </td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">25</a></td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">356</a></td>
                        <td class="hidden-xs hidden-sm">by <a href="page_special_user_profile.php">admin</a><br><small>19:40 - September 25, 2013</small></td>
                    </tr>
                    <tr class="active">
                        <td class="text-center"><i class="glyphicon-construction_cone fa-2x themed-color"></i></td>
                        <td>
                            <h4><a href="javascript:void(0)">Topic Title</a> <br><small>by <a href="page_special_user_profile.php">admin</a>, September 20, 2013, 16:00</small></h4>
                        </td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">25</a></td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">356</a></td>
                        <td class="hidden-xs hidden-sm">by <a href="page_special_user_profile.php">admin</a><br><small>15:58 - September 28, 2013</small></td>
                    </tr>
                    <tr class="active">
                        <td class="text-center"><i class="glyphicon-construction_cone fa-2x themed-color"></i></td>
                        <td>
                            <h4><a href="javascript:void(0)">Topic Title</a> <br><small>by <a href="page_special_user_profile.php">admin</a>, September 20, 2013, 16:00</small></h4>
                        </td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">25</a></td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">356</a></td>
                        <td class="hidden-xs hidden-sm">by <a href="page_special_user_profile.php">admin</a><br><small>10:30 - September 30, 2013</small></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul class="pagination pagination-sm pull-right remove-margin">
                                <li><a href="javascript:void(0)">1</a></li>
                                <li><a href="javascript:void(0)">2</a></li>
                                <li><a href="javascript:void(0)">...</a></li>
                                <li><a href="javascript:void(0)">5</a></li>
                            </ul>
                            <h4><a href="javascript:void(0)">Topic Title</a> <br><small>by <a href="page_special_user_profile.php">username</a>, November 18, 2013, 12:00</small></h4>
                        </td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">25</a></td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">356</a></td>
                        <td class="hidden-xs hidden-sm">by <a href="page_special_user_profile.php">user</a><br><small>12:00 - September 01, 2013</small></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul class="pagination pagination-sm pull-right remove-margin">
                                <li><a href="javascript:void(0)">1</a></li>
                                <li><a href="javascript:void(0)">2</a></li>
                                <li><a href="javascript:void(0)">...</a></li>
                                <li><a href="javascript:void(0)">5</a></li>
                            </ul>
                            <h4><a href="javascript:void(0)">Topic Title</a> <br><small>by <a href="page_special_user_profile.php">username</a>, November 18, 2013, 12:00</small></h4>
                        </td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">25</a></td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">356</a></td>
                        <td class="hidden-xs hidden-sm">by <a href="page_special_user_profile.php">user</a><br><small>12:00 - September 01, 2013</small></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul class="pagination pagination-sm pull-right remove-margin">
                                <li><a href="javascript:void(0)">1</a></li>
                                <li><a href="javascript:void(0)">2</a></li>
                                <li><a href="javascript:void(0)">...</a></li>
                                <li><a href="javascript:void(0)">5</a></li>
                            </ul>
                            <h4><a href="javascript:void(0)">Topic Title</a> <br><small>by <a href="page_special_user_profile.php">username</a>, November 18, 2013, 12:00</small></h4>
                        </td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">25</a></td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">356</a></td>
                        <td class="hidden-xs hidden-sm">by <a href="page_special_user_profile.php">user</a><br><small>12:00 - September 01, 2013</small></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul class="pagination pagination-sm pull-right remove-margin">
                                <li><a href="javascript:void(0)">1</a></li>
                                <li><a href="javascript:void(0)">2</a></li>
                                <li><a href="javascript:void(0)">...</a></li>
                                <li><a href="javascript:void(0)">5</a></li>
                            </ul>
                            <h4><a href="javascript:void(0)">Topic Title</a> <br><small>by <a href="page_special_user_profile.php">username</a>, November 18, 2013, 12:00</small></h4>
                        </td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">25</a></td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">356</a></td>
                        <td class="hidden-xs hidden-sm">by <a href="page_special_user_profile.php">user</a><br><small>12:00 - September 01, 2013</small></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul class="pagination pagination-sm pull-right remove-margin">
                                <li><a href="javascript:void(0)">1</a></li>
                                <li><a href="javascript:void(0)">2</a></li>
                                <li><a href="javascript:void(0)">...</a></li>
                                <li><a href="javascript:void(0)">5</a></li>
                            </ul>
                            <h4><a href="javascript:void(0)">Topic Title</a> <br><small>by <a href="page_special_user_profile.php">username</a>, November 18, 2013, 12:00</small></h4>
                        </td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">25</a></td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">356</a></td>
                        <td class="hidden-xs hidden-sm">by <a href="page_special_user_profile.php">user</a><br><small>12:00 - September 01, 2013</small></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul class="pagination pagination-sm pull-right remove-margin">
                                <li><a href="javascript:void(0)">1</a></li>
                                <li><a href="javascript:void(0)">2</a></li>
                                <li><a href="javascript:void(0)">...</a></li>
                                <li><a href="javascript:void(0)">5</a></li>
                            </ul>
                            <h4><a href="javascript:void(0)">Topic Title</a> <br><small>by <a href="page_special_user_profile.php">username</a>, November 18, 2013, 12:00</small></h4>
                        </td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">25</a></td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">356</a></td>
                        <td class="hidden-xs hidden-sm">by <a href="page_special_user_profile.php">user</a><br><small>12:00 - September 01, 2013</small></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul class="pagination pagination-sm pull-right remove-margin">
                                <li><a href="javascript:void(0)">1</a></li>
                                <li><a href="javascript:void(0)">2</a></li>
                                <li><a href="javascript:void(0)">...</a></li>
                                <li><a href="javascript:void(0)">5</a></li>
                            </ul>
                            <h4><a href="javascript:void(0)">Topic Title</a> <br><small>by <a href="page_special_user_profile.php">username</a>, November 18, 2013, 12:00</small></h4>
                        </td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">25</a></td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">356</a></td>
                        <td class="hidden-xs hidden-sm">by <a href="page_special_user_profile.php">user</a><br><small>12:00 - September 01, 2013</small></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul class="pagination pagination-sm pull-right remove-margin">
                                <li><a href="javascript:void(0)">1</a></li>
                                <li><a href="javascript:void(0)">2</a></li>
                                <li><a href="javascript:void(0)">...</a></li>
                                <li><a href="javascript:void(0)">5</a></li>
                            </ul>
                            <h4><a href="javascript:void(0)">Topic Title</a> <br><small>by <a href="page_special_user_profile.php">username</a>, November 18, 2013, 12:00</small></h4>
                        </td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">25</a></td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">356</a></td>
                        <td class="hidden-xs hidden-sm">by <a href="page_special_user_profile.php">user</a><br><small>12:00 - September 01, 2013</small></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul class="pagination pagination-sm pull-right remove-margin">
                                <li><a href="javascript:void(0)">1</a></li>
                                <li><a href="javascript:void(0)">2</a></li>
                                <li><a href="javascript:void(0)">...</a></li>
                                <li><a href="javascript:void(0)">5</a></li>
                            </ul>
                            <h4><a href="javascript:void(0)">Topic Title</a> <br><small>by <a href="page_special_user_profile.php">username</a>, November 18, 2013, 12:00</small></h4>
                        </td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">25</a></td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">356</a></td>
                        <td class="hidden-xs hidden-sm">by <a href="page_special_user_profile.php">user</a><br><small>12:00 - September 01, 2013</small></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul class="pagination pagination-sm pull-right remove-margin">
                                <li><a href="javascript:void(0)">1</a></li>
                                <li><a href="javascript:void(0)">2</a></li>
                                <li><a href="javascript:void(0)">...</a></li>
                                <li><a href="javascript:void(0)">5</a></li>
                            </ul>
                            <h4><a href="javascript:void(0)">Topic Title</a> <br><small>by <a href="page_special_user_profile.php">username</a>, November 18, 2013, 12:00</small></h4>
                        </td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">25</a></td>
                        <td class="text-center hidden-xs hidden-sm"><a href="javascript:void(0)">356</a></td>
                        <td class="hidden-xs hidden-sm">by <a href="page_special_user_profile.php">user</a><br><small>12:00 - September 01, 2013</small></td>
                    </tr>
                </tbody>
            </table>
            <div class="text-right">
                <ul class="pagination pagination-sm">
                    <li class="disabled"><a href="javascript:void(0)">Prev</a></li>
                    <li class="active"><a href="javascript:void(0)">1</a></li>
                    <li><a href="javascript:void(0)">2</a></li>
                    <li><a href="javascript:void(0)">...</a></li>
                    <li><a href="javascript:void(0)">Next</a></li>
                </ul>
            </div>
        </div>
        <!-- END Topics -->

        <!-- Discussion -->
        <div class="tab-pane" id="forum-discussion">
            <table class="table forum">
                <tbody>
                    <tr>
                        <th class="text-center"><a href="page_special_user_profile.php">John Doe</a></th>
                        <th>Topic, <small>December 1, 15:00</small></th>
                    </tr>
                    <tr>
                        <td class="forum-avatar text-center">
                            <a href="page_special_user_profile.php"><img src="<?php echo img_url('placeholders/image_64x64_dark.png'); ?>" class="img-circle" alt="avatar"></a>
                            <br><br><small><em>Level 12</em></small><br><small>1364 Posts</small>
                        </td>
                        <td class="forum-post">
                            <p>Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit.</p>
                            <div class="forum-sign">
                                <small><em>User's Signature!</em></small>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center"><a href="page_special_user_profile.php">John Doe</a></th>
                        <th>RE: Topic, <small>December 1, 15:00</small></th>
                    </tr>
                    <tr>
                        <td class="forum-avatar text-center">
                            <a href="page_special_user_profile.php"><img src="<?php echo img_url('placeholders/image_64x64_dark.png'); ?>" class="img-circle" alt="avatar"></a>
                            <br><br><small><em>Level 12</em></small><br><small>1364 Posts</small>
                        </td>
                        <td class="forum-post">
                            <p>Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit.</p>
                            <div class="forum-sign">
                                <small><em>User's Signature!</em></small>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center"><a href="page_special_user_profile.php">John Doe</a></th>
                        <th>RE: Topic, <small>December 1, 15:00</small></th>
                    </tr>
                    <tr>
                        <td class="forum-avatar text-center">
                            <a href="page_special_user_profile.php"><img src="<?php echo img_url('placeholders/image_64x64_dark.png'); ?>" class="img-circle" alt="avatar"></a>
                            <br><br><small><em>Level 12</em></small><br><small>1364 Posts</small>
                        </td>
                        <td class="forum-post">
                            <p>Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit.</p>
                            <div class="forum-sign">
                                <small><em>User's Signature!</em></small>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center"><a href="page_special_user_profile.php">John Doe</a></th>
                        <th>RE: Topic, <small>December 1, 15:00</small></th>
                    </tr>
                    <tr>
                        <td class="forum-avatar text-center">
                            <a href="page_special_user_profile.php"><img src="<?php echo img_url('placeholders/image_64x64_dark.png'); ?>" class="img-circle" alt="avatar"></a>
                            <br><br><small><em>Level 12</em></small><br><small>1364 Posts</small>
                        </td>
                        <td class="forum-post">
                            <p>Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit.</p>
                            <div class="forum-sign">
                                <small><em>User's Signature!</em></small>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center"><a href="page_special_user_profile.php">John Doe</a></th>
                        <th>RE: Topic, <small>December 1, 15:00</small></th>
                    </tr>
                    <tr>
                        <td class="forum-avatar text-center">
                            <a href="page_special_user_profile.php"><img src="<?php echo img_url('placeholders/image_64x64_dark.png'); ?>" class="img-circle" alt="avatar"></a>
                            <br><br><small><em>Level 12</em></small><br><small>1364 Posts</small>
                        </td>
                        <td class="forum-post">
                            <p>Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit.</p>
                            <div class="forum-sign">
                                <small><em>User's Signature!</em></small>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th class="text-center"><a href="page_special_user_profile.php">You</a></th>
                        <th>Reply</th>
                    </tr>
                    <tr>
                        <td class="forum-avatar text-center">
                            <a href="page_special_user_profile.php"><img src="<?php echo img_url('template/avatar2.jpg'); ?>" class="img-circle" alt="avatar"></a>
                        </td>
                        <td class="forum-post">
                            <form action="page_ready_forum.php" method="post" class="form-horizontal" onsubmit="return false;">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <textarea id="textarea-wysiwyg" name="textarea-wysiwyg" rows="15" class="form-control textarea-editor"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-sm btn-info"><i class="fa fa-reply"></i> Reply</button>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="text-right">
                <ul class="pagination pagination-sm">
                    <li class="disabled"><a href="javascript:void(0)">Prev</a></li>
                    <li class="active"><a href="javascript:void(0)">1</a></li>
                    <li><a href="javascript:void(0)">2</a></li>
                    <li><a href="javascript:void(0)">...</a></li>
                    <li><a href="javascript:void(0)">Next</a></li>
                </ul>
            </div>
        </div>
        <!-- END Discussion -->
    </div>
    <!-- END Tab Content -->
    <!-- END Forum Content -->
</div>
<!-- END Page Content -->

<?php $this->load->view('footer'); ?>
<?php $this->load->view('bottom'); ?>