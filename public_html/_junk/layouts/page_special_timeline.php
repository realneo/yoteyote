<?php $this->load->view('top'); ?>

<!-- Page content -->
<div id="page-content" class="block">
    <!-- Timeline Header -->
    <div class="block-header">
        <div class="row remove-margin">
            <div class="col-sm-6">
                <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
                <a href="" class="header-title-link">
                    <h1><i class="fa fa-clock-o animation-expandUp"></i> Timeline<br><small>Your updates hub</small></h1>
                </a>
            </div>
            <div class="col-sm-6">
                <a href="javascript:void(0)" class="header-link" id="refresh-btn">
                    <h1 class="animation-pullDown"><i class="fa fa-refresh"></i><br><small>Refresh</small></h1>
                </a>
            </div>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><i class="fa fa-bookmark"></i></li>
        <li><a href="">Timeline</a></li>
    </ul>
    <!-- END Timeline Header -->

    <!-- Timeline Block -->
    <div class="block">
        <!-- Timeline Title -->
        <div class="block-title">
            <h2><i class="fa fa-rss"></i> Recent Updates</h2>
        </div>
        <!-- Timeline Content -->

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

        <!-- Updates -->
        <ul class="timeline">
            <li>
                <div class="timeline-item">
                    <h4 class="timeline-title"><small class="timeline-meta">3 min ago</small><i class="fa fa-plus"></i> Friend Request</h4>
                    <div class="timeline-content">
                        <p class="clearfix">
                            <img src="<?php echo img_url('template/avatar2.jpg'); ?>" alt="avatar" class="img-circle pull-right">
                            <a href="page_special_user_profile.php">John Doe</a> would like to become friends!
                        </p>
                        <div class="btn-group">
                            <a href="javascript:void(0)" class="btn btn-xs btn-success"><i class="fa fa-check"></i> Accept</a>
                            <a href="javascript:void(0)" class="btn btn-xs btn-danger">Block</a>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-right alt-color">
                <div class="timeline-item">
                    <h4 class="timeline-title"><small class="timeline-meta">20 min ago</small><i class="fa fa-arrow-up"></i> Please consider upgrading</h4>
                    <div class="timeline-content text-center">
                        <p>You are running out of free space!</p>
                        <div class="pie-chart push" data-percent="90" data-size="120">
                            <span>4.5<small>/5</small> <strong>GB</strong></span>
                        </div>
                        <a href="javascript:void(0)" class="btn btn-xs btn-success"><i class="fa fa-angle-up"></i> Upgrade plan now</a>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-item">
                    <h4 class="timeline-title"><small class="timeline-meta">30 min ago</small><i class="fa fa-plus"></i> New Tutorial</h4>
                    <div class="timeline-content"><a href="page_special_user_profile.php">John Doe</a> published a new <a href="javascript:void(0)">tutorial</a> in <a href="javascript:void(0)" class="btn btn-xs btn-primary">Web Design</a></div>
                </div>
            </li>
            <li>
                <div class="timeline-item">
                    <h4 class="timeline-title"><small class="timeline-meta">35 min ago</small><i class="fa fa-plus"></i> New Article</h4>
                    <div class="timeline-content"><a href="page_special_user_profile.php">John Doe</a> published a new <a href="javascript:void(0)">article</a> in <a href="javascript:void(0)" class="btn btn-xs btn-primary">Web Development</a></div>
                </div>
            </li>
            <li class="text-right alt-color">
                <div class="timeline-item">
                    <h4 class="timeline-title"><small class="timeline-meta">45 min ago</small><i class="fa fa-cog"></i> System Update</h4>
                    <div class="timeline-content"><strong>Application</strong> updated to version 3.0! Check out the <a href="javascript:void(0)">documentation</a> to learn about the new features!</div>
                </div>
            </li>
            <li>
                <div class="timeline-item">
                    <h4 class="timeline-title"><small class="timeline-meta">1 hour ago</small><i class="fa fa-picture-o"></i> New Photos</h4>
                    <div class="timeline-content">
                        <p>
                            <a href="page_special_user_profile.php">Estelle</a> just added 2 new photos
                        </p>
                        <a href="<?php echo img_url('placeholders/image_720x450_dark.png'); ?>" data-toggle="lightbox-image">
                            <img src="<?php echo img_url('placeholders/image_160x120_dark.png'); ?>" alt="image">
                        </a>
                        <a href="<?php echo img_url('placeholders/image_720x450_dark.png'); ?>" data-toggle="lightbox-image">
                            <img src="<?php echo img_url('placeholders/image_160x120_dark.png'); ?>" alt="image">
                        </a>
                    </div>
                </div>
            </li>
            <li class="text-right alt-color">
                <div class="timeline-item">
                    <h4 class="timeline-title"><small class="timeline-meta">5 hours ago</small><i class="fa fa-cog"></i> System Warning</h4>
                    <div class="timeline-content">
                        <p>FTP Server is down</p>
                        <a href="javascript:void(0)" class="btn btn-xs btn-primary"><i class="fa fa-repeat"></i> Restart</a>
                    </div>
                </div>
            </li>
            <li class="text-center remove-margin">
                <a href="javascript:void(0)" class="btn btn-xs btn-primary"><i class="fa fa-angle-down"></i> Load more..</a>
            </li>
        </ul>
        <!-- END Updates -->
        <!-- END Timeline Content -->
    </div>
    <!-- END Timeline Block -->
</div>
<!-- END Page Content -->

<!-- Remember to include excanvas for IE8 chart support -->
<!--[if IE 8]><script src="js/helpers/excanvas.min.js"></script><![endif]-->

<?php $this->load->view('footer'); ?>

<!-- Javascript code only for this page -->
<script>
    $(function() {
        // Refresh button functionality
        var demoAdded = null;
        var timeline = $('.timeline');

        $('#refresh-btn').click(function() {
            var icon = $('i', this);
            icon.addClass('fa-spin-fast');
            setTimeout(function() { icon.removeClass('fa-spin-fast'); }, 2000);

            // Demo updates
            if (demoAdded !== 1) {
                demoAdded = 1;

                setTimeout(function() {
                    timeline.prepend('<li class="text-right alt-color animation-pullDown">' +
                        '<div class="timeline-item">' +
                        '<h4 class="timeline-title"><small class="timeline-meta">just now</small><i class="fa fa-magic"></i> Special Offer!</h4>' +
                        '<div class="timeline-content"><a href="page_ready_pricing_tables.php">Upgrade your plan</a> in the next 3 days and get 1 year for free!</div>' +
                        '</div>' +
                        '</li>');
                }, 1000);
                setTimeout(function() {
                    timeline.prepend('<li class="animation-pullDown">' +
                        '<div class="timeline-item">' +
                        '<h4 class="timeline-title"><small class="timeline-meta">just now</small><i class="fa fa-envelope-o"></i> New Message</h4>' +
                        '<div class="timeline-content"><p>Hi! I really like your application, are you free for freelance work?</p><a href="page_special_user_profile.php">Michael</a></div>' +
                        '</div>' +
                        '</li>');
                }, 2000);
            }
        });
    });
</script>

<?php $this->load->view('bottom'); ?>