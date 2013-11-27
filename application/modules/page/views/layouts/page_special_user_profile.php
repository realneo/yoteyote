<?php $this->load->view('top'); ?>

<!-- Page content -->
<div id="page-content" class="block">
    <!-- User Profile Header -->
    <div class="block-header">
        <div class="row remove-margin">
            <!-- Photo and Name -->
            <div class="col-sm-6">
                <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
                <a href="" class="header-title-link">
                    <img src="<?php echo img_url('template/avatar2.jpg'); ?>" alt="Avatar" class="profile-photo animation-expandUp img-circle">
                    <h1 class="profile-name">
                        John Doe <br><small>Web Designer</small>
                    </h1>
                </a>
            </div>
            <!-- END Photo and Name -->

            <!-- Extra Info -->
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-xs-4">
                        <a href="javascript:void(0)" class="header-link">
                            <h1 class="animation-pullDown">
                                750<br><small>Followers</small>
                            </h1>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="javascript:void(0)" class="header-link">
                            <h1 class="animation-pullDown">
                                20<br><small>Projects</small>
                            </h1>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="javascript:void(0)" class="header-link">
                            <h1 class="animation-pullDown">
                                378<br><small>Updates</small>
                            </h1>
                        </a>
                    </div>
                </div>
            </div>
            <!-- END Extra Info -->
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><i class="fa fa-bookmark"></i></li>
        <li><a href="">User Profile</a></li>
    </ul>
    <!-- END User Profile Header -->

    <!-- User Profile Content -->
    <div class="row gutter30">
        <!-- First Column -->
        <div class="col-md-8">
            <!-- Updates Block -->
            <div class="block">
                <!-- Updates Title -->
                <div class="block-title">
                    <h2><i class="fa fa-rss"></i> Updates</h2>
                </div>
                <!-- END Updates Title -->

                <!-- Update Status Form -->
                <form action="page_forms_components.php" method="post" class="profile-status block-top" onsubmit="return false;">
                    <textarea id="default-textarea" name="default-textarea" rows="2" class="form-control" placeholder="How are you?"></textarea>
                    <div class="clearfix">
                        <button type="submit" class="btn btn-primary pull-right">Post</button>
                        <a href="javascript:void(0)" class="btn btn-link btn-icon" data-toggle="tooltip" data-placement="bottom" title="Add Location"><i class="fa fa-location-arrow"></i></a>
                        <a href="javascript:void(0)" class="btn btn-link btn-icon" data-toggle="tooltip" data-placement="bottom" title="Record Voice"><i class="fa fa-microphone"></i></a>
                        <a href="javascript:void(0)" class="btn btn-link btn-icon" data-toggle="tooltip" data-placement="bottom" title="Take Photo"><i class="fa fa-camera"></i></a>
                        <a href="javascript:void(0)" class="btn btn-link btn-icon" data-toggle="tooltip" data-placement="bottom" title="Upload File"><i class="fa fa-cloud-upload"></i></a>
                    </div>
                </form>
                <!-- END Update Status Form -->

                <!-- Status Updates -->
                <ul class="media-list">
                    <li class="media">
                        <a href="javascript:void(0)" class="pull-left">
                            <img src="<?php echo img_url('template/avatar2.jpg'); ?>" alt="Avatar" class="media-object img-circle" width="50" height="50">
                        </a>
                        <div class="media-body">
                            <h6><span class="label label-default"><i class="fa fa-clock-o"></i> 3 hours ago</span></h6>
                            <p class="remove-margin">Aliquam tincidunt sollicitudin sem nec ultrices. Sed at mi velit. Ut egestas <a href="javascript:void(0)">tempor</a> est, in cursus enim venenatis eget! Nulla quis ligula ipsum. Maecenas ultrices, justo vel imperdiet gravida, urna ligula hendrerit nibh, ac cursus nibh sapien in purus. Mauris tincidunt tincidunt turpis in porta. Integer fermentum tincidunt auctor. Vestibulum ullamcorper, odio sed rhoncus imperdiet, enim elit sollicitudin orci, eget dictum leo mi nec lectus. Nam commodo turpis id lectus scelerisque vulputate. </p>
                            <p>
                                <a href="javascript:void(0)" class="btn btn-xs btn-default disabled">2 comments</a>
                                <a href="javascript:void(0)" class="btn btn-xs btn-success" data-toggle="tooltip" title="Like"><i class="fa fa-thumbs-up"></i> 5</a>
                                <a href="javascript:void(0)" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Dislike"><i class="fa fa-thumbs-down"></i></a>
                            </p>
                            <div class="media">
                                <a href="javascript:void(0)" class="pull-left">
                                    <img src="<?php echo img_url('template/avatar.png'); ?>" alt="Avatar" class="media-object img-circle">
                                </a>
                                <div class="media-body">
                                    <h6><span class="label label-default"><i class="fa fa-clock-o"></i> 2 hours ago</span></h6>
                                    <p class="remove-margin">In hac habitasse platea dictumst!</p>
                                    <p>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-success" data-toggle="tooltip" title="Like"><i class="fa fa-thumbs-up"></i> 1</a>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Dislike"><i class="fa fa-thumbs-down"></i></a>
                                    </p>
                                </div>
                            </div>
                            <div class="media">
                                <a href="javascript:void(0)" class="pull-left">
                                    <img src="<?php echo img_url('template/avatar.png'); ?>" alt="Avatar" class="media-object img-circle">
                                </a>
                                <div class="media-body">
                                    <h6><span class="label label-default"><i class="fa fa-clock-o"></i> 1 hour ago</span></h6>
                                    <p class="remove-margin">Check them out: <br><a href="img/placeholders/image_720x450_dark.png" data-toggle="lightbox-image"><img src="img/placeholders/image_160x120_dark.png" alt="demo"></a><a href="<?php echo img_url('placeholders/image_720x450_dark.png'); ?>" data-toggle="lightbox-image"><img src="img/placeholders/image_160x120_dark.png" alt="demo"></a></p>
                                    <p>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-success" data-toggle="tooltip" title="Like"><i class="fa fa-thumbs-up"></i> 1</a>
                                        <a href="javascript:void(0)" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Dislike"><i class="fa fa-thumbs-down"></i></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="media">
                        <a href="javascript:void(0)" class="pull-left">
                            <img src="<?php echo img_url('template/avatar2.jpg'); ?>" alt="Avatar" class="media-object img-circle" width="50" height="50">
                        </a>
                        <div class="media-body">
                            <h6><span class="label label-default"><i class="fa fa-clock-o"></i> Yesterday from mobile</span></h6>
                            <p class="remove-margin">Aliquam tincidunt sollicitudin sem nec ultrices. Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti.</p>
                            <p>
                                <a href="javascript:void(0)" class="btn btn-xs btn-success" data-toggle="tooltip" title="Like"><i class="fa fa-thumbs-up"></i></a>
                                <a href="javascript:void(0)" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Dislike"><i class="fa fa-thumbs-down"></i></a>
                            </p>
                        </div>
                    </li>
                    <li class="media">
                        <a href="javascript:void(0)" class="pull-left">
                            <img src="<?php echo img_url('template/avatar2.jpg'); ?>" alt="Avatar" class="media-object img-circle" width="50" height="50">
                        </a>
                        <div class="media-body">
                            <h6><span class="label label-default"><i class="fa fa-clock-o"></i> Yesterday</span></h6>
                            <p class="remove-margin">Aliquam tincidunt sollicitudin sem nec ultrices. Proin rhoncus dui at ligula vestibulum ut facilisis ante sodales! Suspendisse potenti.</p>
                            <p>
                                <a href="javascript:void(0)" class="btn btn-xs btn-success" data-toggle="tooltip" title="Like"><i class="fa fa-thumbs-up"></i> 15</a>
                                <a href="javascript:void(0)" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Dislike"><i class="fa fa-thumbs-down"></i> 1</a>
                            </p>
                        </div>
                    </li>
                    <li class="media">
                        <a href="javascript:void(0)" class="pull-left">
                            <img src="<?php echo img_url('template/avatar2.jpg'); ?>" alt="Avatar" class="media-object img-circle" width="50" height="50">
                        </a>
                        <div class="media-body">
                            <h6><span class="label label-default"><i class="fa fa-clock-o"></i> 1 week ago from mobile</span></h6>
                            <p class="remove-margin">In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum.</p>
                            <p>
                                <a href="javascript:void(0)" class="btn btn-xs btn-success" data-toggle="tooltip" title="Like"><i class="fa fa-thumbs-up"></i></a>
                                <a href="javascript:void(0)" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Dislike"><i class="fa fa-thumbs-down"></i></a>
                            </p>
                        </div>
                    </li>
                </ul>
                <p class="text-center">
                    <a href="javascript:void(0)" class="btn btn-xs btn-primary"><i class="fa fa-angle-down"></i> Load more..</a>
                </p>
                <!-- END Status Updates -->
            </div>
            <!-- END Updates Block -->
        </div>
        <!-- END First Column -->

        <!-- Second Column -->
        <div class="col-md-4">
            <!-- Actions Block -->
            <div class="block full">
                <!-- Actions Title -->
                <div class="block-title">
                    <h2><i class="fa fa-users"></i> Social</h2>
                </div>
                <!-- END Actions Title -->

                <!-- Actions Content -->
                <a href="javascript:void(0)" class="btn btn-success"><i class="fa fa-share"></i> Follow</a>
                <a href="javascript:void(0)" class="btn btn-info" data-toggle="tooltip" title="Find on Facebook"><i class="fa fa-facebook"></i></a>
                <a href="javascript:void(0)" class="btn btn-info" data-toggle="tooltip" title="Find on Twitter"><i class="fa fa-twitter"></i></a>
                <a href="javascript:void(0)" class="btn btn-danger" data-toggle="tooltip" title="Find on Pinterest"><i class="fa fa-pinterest"></i></a>
                <!-- END Actions Content -->
            </div>
            <!-- END Actions Block -->
            <!-- Actions -->

            <!-- END Actions -->

            <!-- Skills Block -->
            <div class="block">
                <!-- Skills Title -->
                <div class="block-title">
                    <h2><i class="fa fa-bolt"></i> Skills</h2>
                </div>
                <!-- END Skills Title -->

                <!-- Skills Content -->
                <p>
                    <a href="javascript:void(0)" class="label label-info">Web Design</a>
                    <a href="javascript:void(0)" class="label label-info">Web Development</a>
                </p>
                <p>
                    <a href="javascript:void(0)" class="label label-info">HTML</a>
                    <a href="javascript:void(0)" class="label label-info">CSS</a>
                    <a href="javascript:void(0)" class="label label-info">Javascript</a>
                    <a href="javascript:void(0)" class="label label-info">PHP</a>
                    <a href="javascript:void(0)" class="label label-info">ASP</a>
                </p>
                <!-- END Skills Content -->
            </div>
            <!-- END Skills Block -->

            <!-- About Block -->
            <div class="block">
                <!-- About Title -->
                <div class="block-title">
                    <h2><i class="fa fa-info"></i> About</h2>
                </div>
                <!-- END About Title -->

                <!-- About Content -->
                <p>Donec lacinia venenatis metus at bibendum? In hac habitasse platea dictumst. Proin ac nibh rutrum lectus rhoncus eleifend. Sed porttitor pretium venenatis. Suspendisse potenti. Aliquam quis ligula elit. Aliquam at orci ac neque semper dictum. Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci. Praesent at lacinia dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p>Sed tincidunt scelerisque ligula, et facilisis nulla hendrerit non. Suspendisse potenti. Pellentesque non accumsan orci.</p>
                <!-- END About Content -->
            </div>
            <!-- END About Block -->

            <!-- Twitter Block -->
            <div class="block">
                <!-- Twitter Title -->
                <div class="block-title">
                    <h2><i class="fa fa-twitter"></i> Twitter</h2>
                </div>
                <!-- END Twitter Title -->

                <!-- Twitter Content -->
                <ul class="list-unstyled">
                    <li>
                        <h6><span class="label label-default"><i class="fa fa-clock-o"></i> 2 hours ago</span></h6>
                        <p>Check out a great <a href="javascript:void(0)" class="text-info">#psd</a> <a href="javascript:void(0)" class="text-info">#freebie</a>! You can download it from <a href="javascript:void(0)">http://example.com</a>! I hope you like it!</p>
                    </li>
                    <li>
                        <h6><span class="label label-default"><i class="fa fa-clock-o"></i> 3 hours ago</span></h6>
                        <p>Today I'm moving forward with a new and awesome project! <a href="javascript:void(0)" class="text-info">#excited</a></p>
                    </li>
                    <li>
                        <h6><span class="label label-default"><i class="fa fa-clock-o"></i> 1 day ago</span></h6>
                        <p><a href="javascript:void(0)" class="text-info">#Awesome</a> <a href="javascript:void(0)" class="text-info">#Tech</a> This new product seems great!</p>
                    </li>
                    <li>
                        <h6><span class="label label-default"><i class="fa fa-clock-o"></i> 1 day ago</span></h6>
                        <p>Freebie day again, 20 awesome and colorful icons are waiting for you to download them. Check them out at <a href="javascript:void(0)">http://example.com</a></p>
                    </li>
                    <li>
                        <h6><span class="label label-default"><i class="fa fa-clock-o"></i> 2 days ago</span></h6>
                        <p>My new website is ready! Check it out and let me know what you think! I'm waiting for your feedback!</p>
                    </li>
                </ul>
                <!-- END Twitter Content -->
            </div>
            <!-- END Twitter Block -->
        </div>
        <!-- END Second Column -->
    </div>
    <!-- END User Profile Content -->
</div>
<!-- END Page Content -->

<?php $this->load->view('footer'); ?>
<?php $this->load->view('bottom'); ?>