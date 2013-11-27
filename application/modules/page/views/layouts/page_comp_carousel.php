<?php $this->load->view('top'); ?>

<!-- Page content -->
<div id="page-content" class="block">
    <!-- Carousel Header -->
    <div class="block-header">
        <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
        <a href="" class="header-title-link">
            <h1>
                <i class="fa fa-camera animation-expandUp"></i>Carousel<br><small>A simple and easy to setup carousel for your content!</small>
            </h1>
        </a>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><i class="fa fa-cog"></i></li>
        <li>Components</li>
        <li><a href="">Carousel</a></li>
    </ul>
    <!-- END Carousel Header -->

    <!-- Carousel Content -->
    <p>
		Bootstrap provides responsive carousel functionality if you would like to showcase some photos or content. It offers a simple way
		for cycling between various content and it is very easy to customize it to your needs.
	</p>

    <div class="row gutter30">
        <!-- Default Carousel -->
        <div class="col-md-6">
            <h3 class="sub-header">Default <small>Slide effect, captions and indicators</small></h3>
            <div id="example-carousel" class="carousel slide">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#example-carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#example-carousel" data-slide-to="1"></li>
                    <li data-target="#example-carousel" data-slide-to="2"></li>
                    <li data-target="#example-carousel" data-slide-to="3"></li>
                    <li data-target="#example-carousel" data-slide-to="4"></li>
                    <li data-target="#example-carousel" data-slide-to="5"></li>
                </ol>
                <!-- END Indicators -->

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="active item">
                        <img src="<?php echo img_url('placeholders/image_1680x1050_dark.png'); ?>" alt="fakeimg">
                        <div class="carousel-caption">
                            <p>Caption..</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="<?php echo img_url('placeholders/image_1680x1050_light.png'); ?>" alt="fakeimg">
                        <div class="carousel-caption">
                            <p>Caption..</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="<?php echo img_url('placeholders/image_1680x1050_dark.png'); ?>" alt="fakeimg">
                        <div class="carousel-caption">
                            <p>Caption..</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="<?php echo img_url('placeholders/image_1680x1050_light.png'); ?>" alt="fakeimg">
                        <div class="carousel-caption">
                            <p>Caption..</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="<?php echo img_url('placeholders/image_1680x1050_dark.png'); ?>" alt="fakeimg">
                        <div class="carousel-caption">
                            <p>Caption..</p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="<?php echo img_url('placeholders/image_1680x1050_light.png'); ?>" alt="fakeimg">
                        <div class="carousel-caption">
                            <p>Caption..</p>
                        </div>
                    </div>
                </div>
                <!-- END Wrapper for slides -->

                <!-- Controls -->
                <a class="left carousel-control" href="#example-carousel" data-slide="prev">
                    <span class="icon-prev"></span>
                </a>
                <a class="right carousel-control" href="#example-carousel" data-slide="next">
                    <span class="icon-next"></span>
                </a>
                <!-- END Controls -->
            </div>
        </div>
        <!-- END Default Carousel -->

        <!-- Alternative Carousel -->
        <div class="col-md-6">
            <h3 class="sub-header">Alternative <small>No effect, captions or indicators with icon controls</small></h3>
            <div id="example-carousel2" class="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="active item">
                        <img src="<?php echo img_url('placeholders/image_1680x1050_dark.png'); ?>" alt="fakeimg">
                    </div>
                    <div class="item">
                        <img src="<?php echo img_url('placeholders/image_1680x1050_light.png'); ?>" alt="fakeimg">
                    </div>
                    <div class="item">
                        <img src="<?php echo img_url('placeholders/image_1680x1050_dark.png'); ?>" alt="fakeimg">
                    </div>
                    <div class="item">
                        <img src="<?php echo img_url('placeholders/image_1680x1050_light.png'); ?>" alt="fakeimg">
                    </div>
                    <div class="item">
                        <img src="<?php echo img_url('placeholders/image_1680x1050_dark.png'); ?>" alt="fakeimg">
                    </div>
                    <div class="item">
                        <img src="<?php echo img_url('placeholders/image_1680x1050_light.png'); ?>" alt="fakeimg">
                    </div>
                </div>
                <!-- END Wrapper for slides -->

                <!-- Controls -->
                <a class="left carousel-control" href="#example-carousel2" data-slide="prev">
                    <span><i class="fa fa-chevron-left"></i></span>
                </a>
                <a class="right carousel-control" href="#example-carousel2" data-slide="next">
                    <span><i class="fa fa-chevron-right"></i></span>
                </a>
                <!-- END Controls -->
            </div>
        </div>
        <!-- END Alternative Carousel -->
    </div>
    <!-- END Carousel Content -->
</div>
<!-- END Page Content -->

<?php $this->load->view('footer'); ?>
<?php $this->load->view('bottom'); ?>