<?php $this->load->view('partials/top'); ?>

<!-- Page content -->
<div id="page-content" class="block">
    <!-- Blank Header -->
    <div class="block-header">
        <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
        <a href="" class="header-title-link">
            <h1>
                <i class="glyphicon-pencil animation-expandUp"></i>Article<br><small>A subtitle would go here!</small>
            </h1>
        </a>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><i class="fa fa-file-o"></i></li>
        <li>Pages</li>
        <li><a href="">Article</a></li>
    </ul>
    <!-- END Blank Header -->

    <!-- Article Content -->
    <div class="row gutter30">
        <div class="col-sm-7">
            <!-- Article Block -->
            <div class="block">
                <!-- Article Title -->
                <div class="block-title">
                    <h2><small>By <a href="page_special_user_profile.php">John Doe</a> | November 1, 2013 | <a href="javascript:void(0)">web design</a>, <a href="javascript:void(0)">tutorial</a></small></h2>
                </div>
                <!-- END Article Title -->

                <!-- Article Content -->
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit. Ut egestas tempor est, in cursus enim venenatis eget! Nulla quis ligula ipsum. Donec vitae ultrices dolor? Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <blockquote>
                    <p>This is a blockquote that says something smart!</p>
                    <small>John Doe</small>
                </blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas <a href="javascript:void(0)">ultrices</a>, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit. Ut egestas tempor est, in cursus enim venenatis eget! Nulla quis ligula ipsum. Donec vitae ultrices dolor? Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <div class="row">
                    <div class="col-xs-6">
                        <p>
                            <a href="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" data-toggle="lightbox-image">
                                <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="fakeimg" class="img-responsive">
                            </a>
                        </p>
                    </div>
                    <div class="col-xs-6">
                        <p>
                            <a href="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" data-toggle="lightbox-image">
                                <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="fakeimg" class="img-responsive">
                            </a>
                        </p>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit. Ut egestas tempor est, in cursus enim venenatis eget! Nulla quis ligula ipsum. Donec vitae ultrices dolor? Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit. Ut egestas tempor est, in cursus enim venenatis eget! Nulla quis ligula ipsum. Donec vitae ultrices dolor? Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <div class="row">
                    <div class="col-xs-4">
                        <p>
                            <a href="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" data-toggle="lightbox-image">
                                <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="fakeimg" class="img-responsive">
                            </a>
                        </p>
                    </div>
                    <div class="col-xs-4">
                        <p>
                            <a href="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" data-toggle="lightbox-image">
                                <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="fakeimg" class="img-responsive">
                            </a>
                        </p>
                    </div>
                    <div class="col-xs-4">
                        <p>
                            <a href="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" data-toggle="lightbox-image">
                                <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="fakeimg" class="img-responsive">
                            </a>
                        </p>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit. Ut egestas tempor est, in cursus enim venenatis eget! Nulla quis ligula ipsum. Donec vitae ultrices dolor? Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. Integer sed dolor erat. Fusce erat ipsum, varius vel euismod sed, tristique et lectus? Etiam egestas fringilla enim, id convallis lectus laoreet at. Fusce purus nisi, gravida sed consectetur ut, interdum quis nisi. Quisque egestas nisl id lectus facilisis scelerisque? Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti. Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit. Ut egestas tempor est, in cursus enim venenatis eget! Nulla quis ligula ipsum. Donec vitae ultrices dolor? Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <!-- END Article Content -->
            </div>
            <!-- END Article Block -->
        </div>
        <div class="col-sm-5">
            <!-- Author Block -->
            <div class="block full">
                <!-- Author Title -->
                <div class="block-title">
                    <h2>About the author</h2>
                </div>
                <!-- END Author Title -->

                <!-- Author Content -->
                <div class="content-text clearfix">
                    <img src="<?php echo img_url('template/avatar2.jpg'); ?>" alt="avatar" class="img-circle pull-left">
                    <h5><a href="page_special_user_profile.php" class="label label-primary">John Doe</a></h5>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus.
                </div>
                <!-- END Author Content -->
            </div>
            <!-- END Author Block -->

            <!-- Related Block -->
            <div class="block full">
                <!-- Related Title -->
                <div class="block-title">
                    <h2><i class="fa fa-file-text"></i> Related Articles</h2>
                </div>
                <!-- END Related Title -->

                <!-- Related Content -->
                <h4 class="sub-header">In Web Design &amp; Development</h4>
                <ul class="fa-ul remove-margin">
                    <li><i class="fa fa-angle-right fa-li"></i> <a href="javascript:void(0)">Learn PHP from scratch</a></li>
                    <li><i class="fa fa-angle-right fa-li"></i> <a href="javascript:void(0)">Choosing the best IDE</a></li>
                    <li><i class="fa fa-angle-right fa-li"></i> <a href="javascript:void(0)">Latest Trends in Web Design</a></li>
                    <li><i class="fa fa-angle-right fa-li"></i> <a href="javascript:void(0)">Photoshop, is it the best tool?</a></li>
                </ul>
                <h4 class="sub-header">In Tutorials</h4>
                <ul class="fa-ul remove-margin">
                    <li><i class="fa fa-angle-right fa-li"></i> <a href="javascript:void(0)">Design the perfect icon</a></li>
                    <li><i class="fa fa-angle-right fa-li"></i> <a href="javascript:void(0)">Photoshop Basics</a></li>
                    <li><i class="fa fa-angle-right fa-li"></i> <a href="javascript:void(0)">Building a CMS, Part #6</a></li>
                    <li><i class="fa fa-angle-right fa-li"></i> <a href="javascript:void(0)">Creating an icon set, Part #4</a></li>
                </ul>
                <!-- END Related Content -->
            </div>
            <!-- END Related Block -->

            <!-- Comments Block -->
            <div class="block">
                <!-- Comments Title -->
                <div class="block-title">
                    <h2><i class="fa fa-comments"></i> Comments</h2>
                </div>
                <!-- END Comments Title -->

                <!-- Comments Content -->
                <ul class="media-list">
                    <li class="media">
                        <a href="javascript:void(0)" class="pull-left">
                            <img src="<?php echo img_url('placeholders/image_64x64_dark.png'); ?>" alt="Avatar" class="media-object img-circle" width="50" height="50">
                        </a>
                        <div class="media-body">
                            <h6><a href="javascript:void(0)" class="label label-primary"><i class="fa fa-user"></i> username</a> <span class="label label-default"><i class="fa fa-clock-o"></i> 3 min ago</span></h6>
                            <p class="remove-margin">Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis.</p>
                            <a href="javascript:void(0)" class="btn btn-xs btn-success" data-toggle="tooltip" title="Like"><i class="fa fa-thumbs-up"></i></a>
                            <a href="javascript:void(0)" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Dislike"><i class="fa fa-thumbs-down"></i></a>
                        </div>
                    </li>
                    <li class="media">
                        <a href="javascript:void(0)" class="pull-left">
                            <img src="<?php echo img_url('placeholders/image_64x64_dark.png'); ?>" alt="Avatar" class="media-object img-circle" width="50" height="50">
                        </a>
                        <div class="media-body">
                            <h6><a href="javascript:void(0)" class="label label-primary"><i class="fa fa-user"></i> username</a> <span class="label label-default"><i class="fa fa-clock-o"></i> 4 hours ago</span></h6>
                            <p class="remove-margin">Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis.</p>
                            <a href="javascript:void(0)" class="btn btn-xs btn-success" data-toggle="tooltip" title="Like"><i class="fa fa-thumbs-up"></i> 15</a>
                            <a href="javascript:void(0)" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Dislike"><i class="fa fa-thumbs-down"></i> 1</a>
                        </div>
                    </li>
                    <li class="media">
                        <a href="javascript:void(0)" class="pull-left">
                            <img src="<?php echo img_url('placeholders/image_64x64_dark.png'); ?>" alt="Avatar" class="media-object img-circle" width="50" height="50">
                        </a>
                        <div class="media-body">
                            <h6><a href="javascript:void(0)" class="label label-primary"><i class="fa fa-user"></i> username</a> <span class="label label-default"><i class="fa fa-clock-o"></i> 10 hours ago</span></h6>
                            <p class="remove-margin">Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis.</p>
                            <a href="javascript:void(0)" class="btn btn-xs btn-success" data-toggle="tooltip" title="Like"><i class="fa fa-thumbs-up"></i></a>
                            <a href="javascript:void(0)" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Dislike"><i class="fa fa-thumbs-down"></i></a>
                        </div>
                    </li>
                    <li class="media">
                        <a href="javascript:void(0)" class="pull-left">
                            <img src="<?php echo img_url('placeholders/image_64x64_light.png'); ?>" alt="Avatar" class="media-object img-circle" width="50" height="50">
                        </a>
                        <div class="media-body">
                            <form action="page_ready_article.php" method="post" class="form-horizontal" onsubmit="return false;">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <textarea id="article-comment" name="article-comment" class="form-control" rows="3" placeholder="Enter you comment.."></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <button type="submit" class="btn btn-sm  btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                </ul>
                <!-- END Comments Content -->
            </div>
            <!-- END Comments Block -->
        </div>
    </div>
    <!-- END Article Content -->
</div>
<!-- END Page Content -->

<?php $this->load->view('partials/footer'); ?>
<?php $this->load->view('partials/bottom'); ?>