<?php $this->load->view('top'); ?>

<!-- Page content -->
<div id="page-content" class="block">
    <!-- Gallery Header -->
    <div class="block-header">
        <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
        <a href="" class="header-title-link">
            <h1>
                <i class="fa fa-camera-retro animation-expandUp"></i>Gallery<br><small>Lots of options for creating the gallery you want!</small>
            </h1>
        </a>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><i class="fa fa-cog"></i></li>
        <li>Components</li>
        <li><a href="">Gallery</a></li>
    </ul>
    <!-- END Gallery Header -->

    <!-- Lightbox Block -->
    <div class="block">
        <!-- Lightbox Title -->
        <div class="block-title">
            <h2><i class="fa fa-picture-o"></i> Lightbox</h2>
        </div>
        <!-- END Lightbox Title -->

        <!-- Lightbox Content -->
        <!-- Basic Usage -->
        <h4 class="sub-header">Basic Usage</h4>
        <div class="row gutter30">
            <div class="col-sm-9">
                <p>Adding the lightbox functionality to an image is pretty easy! You can create an image link pointing to your big image and add the attribute <code>data-toggle=&quot;lightbox-image&quot;</code> to it:</p>
                <pre class="line-numbers"><code class="language-markup">&lt;a href=&quot;<?php echo img_url('placeholders/image_720x450_dark.png'); ?>&quot; data-toggle=&quot;lightbox-image&quot;&gt;
    &lt;img src=&quot;<?php echo img_url('placeholders/image_160x120_dark.png'); ?>&quot; alt=&quot;image&quot;&gt;
&lt;/a&gt;</code></pre>
            </div>
            <div class="col-sm-3 text-center">
                <p>
                    <a href="<?php echo img_url('placeholders/image_720x450_dark.png'); ?>" data-toggle="lightbox-image">
                        <img src="<?php echo img_url('img/placeholders/image_160x120_dark.png'); ?>" alt="image">
                    </a>
                </p>
            </div>
        </div>
        <!-- END Basic Usage -->

        <!-- Advanced Usage -->
        <h4 class="sub-header">Advanced Usage</h4>
        <div class="row gutter30">
            <div class="col-sm-9">
                <p>You can easily add extra options such as hover controls (you can use anything you like - labels, buttons etc) or image information to an image like shown below:</p>
                <pre class="line-numbers"><code class="language-markup">&lt;div class=&quot;gallery-image&quot;&gt;
    &lt;img src=&quot;<?php echo img_url('placeholders/image_160x120_dark.png'); ?>&quot; alt=&quot;image&quot;&gt;
    &lt;div class=&quot;gallery-image-options&quot;&gt;
        &lt;a href=&quot;<?php echo img_url('placeholders/image_720x450_dark.png'); ?>&quot; data-toggle=&quot;lightbox-image&quot; title=&quot;This is some info text about the image&quot; class=&quot;gallery-link label label-info&quot;&gt;View&lt;/a&gt;
        &lt;a href=&quot;javascript:void(0)&quot; class=&quot;label label-success&quot;&gt;&lt;i class=&quot;fa fa-pencil&quot;&gt;&lt;/i&gt;&lt;/a&gt;
        &lt;a href=&quot;javascript:void(0)&quot; class=&quot;label label-danger&quot;&gt;&lt;i class=&quot;fa fa-times&quot;&gt;&lt;/i&gt;&lt;/a&gt;
    &lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>
            <div class="col-sm-3 text-center">
                <div class="gallery-image push">
                    <img src="<?php echo img_url('placeholders/image_160x120_dark.png'); ?>" alt="image">
                    <div class="gallery-image-options">
                        <a href="<?php echo img_url('placeholders/image_720x450_dark.png'); ?>" data-toggle="lightbox-image" title="This is some info text about the image" class="gallery-link label label-info">View</a>
                        <a href="javascript:void(0)" class="label label-success"><i class="fa fa-pencil"></i></a>
                        <a href="javascript:void(0)" class="label label-danger"><i class="fa fa-times"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Advanced Usage -->
        <!-- END Lightbox Content -->
    </div>
    <!-- END Lightbox Block -->

    <!-- Galleries Row -->
    <div class="row gutter30">
        <div class="col-md-6">
            <!-- Lightbox Gallery Block -->
            <div class="block">
                <!-- Lightbox Gallery Title -->
                <div class="block-title">
                    <h2><i class="fa fa-camera"></i> Lightbox Gallery</h2>
                </div>
                <!-- END Lightbox Gallery Title -->

                <!-- Lightbox Gallery Content -->
                <!--
                Just create a div with the class .gallery and put the images any way you like in grid.
                If you would like to enable the lightbox gallery, just add the value lightbox-gallery in the attribute data-toggle of the div. If you do that
                make sure that you put your images inside links with the class .gallery-link and the source of your large image as the value of each href attribute!
                -->
                <div class="gallery" data-toggle="lightbox-gallery">
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="<?php echo img_url('placeholders/image_720x450_dark.png'); ?>" class="gallery-link" title="Image Info">
                                <img src="<?php echo img_url('placeholders/image_720x450_dark.png'); ?>" alt="image">
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a href="<?php echo img_url('placeholders/image_720x450_dark.png'); ?>" class="gallery-link" title="Image Info">
                                <img src="<?php echo img_url('placeholders/image_720x450_dark.png'); ?>" alt="image">
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a href="<?php echo img_url('placeholders/image_720x450_dark.png'); ?>" class="gallery-link" title="Image Info">
                                <img src="<?php echo img_url('placeholders/image_720x450_dark.png'); ?>" alt="image">
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a href="<?php echo img_url('placeholders/image_720x450_dark.png'); ?>" class="gallery-link" title="Image Info">
                                <img src="<?php echo img_url('placeholders/image_720x450_dark.png'); ?>">
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a href="<?php echo img_url('placeholders/image_720x450_dark.png'); ?>" class="gallery-link" title="Image Info">
                                <img src="<?php echo img_url('placeholders/image_720x450_dark.png'); ?>" alt="image">
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a href="<?php echo img_url('placeholders/image_720x450_dark.png'); ?>" class="gallery-link" title="Image Info">
                                <img src="<?php echo img_url('placeholders/image_720x450_dark.png'); ?>" alt="image">
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a href="<?php echo img_url('placeholders/image_720x450_dark.png'); ?>" class="gallery-link" title="Image Info">
                                <img src="<?php echo img_url('placeholders/image_720x450_dark.png'); ?>" alt="image">
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a href="<?php echo img_url('placeholders/image_720x450_dark.png'); ?>" class="gallery-link" title="Image Info">
                                <img src="<?php echo img_url('placeholders/image_720x450_dark.png'); ?>" alt="image">
                            </a>
                        </div>
                        <div class="col-sm-4">
                            <a href="<?php echo img_url('placeholders/image_720x450_dark.png'); ?>" class="gallery-link" title="Image Info">
                                <img src="<?php echo img_url('placeholders/image_720x450_dark.png'); ?>" alt="image">
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END Lightbox Gallery Content -->
            </div>
            <!-- END Lightbox Gallery Block -->
        </div>
        <div class="col-md-6">
            <!-- Lightbox Gallery with Options Block -->
            <div class="block">
                <!-- Lightbox Gallery with Options Title -->
                <div class="block-title">
                    <h2><i class="fa fa-camera-retro"></i> Lightbox Gallery with Options</h2>
                </div>
                <!-- END Lightbox Gallery with Options Title -->

                <!-- Lightbox Gallery with Options Content -->
                <div class="gallery" data-toggle="lightbox-gallery">
                    <div class="row">
                        <div class="col-sm-4 gallery-image">
                            <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="image">
                            <div class="gallery-image-options text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" class="gallery-link btn btn-primary" title="Image Info">View</a>
                                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 gallery-image">
                            <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="image">
                            <div class="gallery-image-options text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" class="gallery-link btn btn-primary" title="Image Info">View</a>
                                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 gallery-image">
                            <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="image">
                            <div class="gallery-image-options text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" class="gallery-link btn btn-primary" title="Image Info">View</a>
                                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 gallery-image">
                            <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="image">
                            <div class="gallery-image-options text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" class="gallery-link btn btn-primary" title="Image Info">View</a>
                                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 gallery-image">
                            <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="image">
                            <div class="gallery-image-options text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" class="gallery-link btn btn-primary" title="Image Info">View</a>
                                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 gallery-image">
                            <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="image">
                            <div class="gallery-image-options text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" class="gallery-link btn btn-primary" title="Image Info">View</a>
                                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 gallery-image">
                            <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="image">
                            <div class="gallery-image-options text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" class="gallery-link btn btn-primary" title="Image Info">View</a>
                                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 gallery-image">
                            <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="image">
                            <div class="gallery-image-options text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" class="gallery-link btn btn-primary" title="Image Info">View</a>
                                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 gallery-image">
                            <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="image">
                            <div class="gallery-image-options text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" class="gallery-link btn btn-primary" title="Image Info">View</a>
                                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
                                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Lightbox Gallery with Options Content -->
            </div>
            <!-- END Lightbox Gallery with Options Block -->
        </div>
    </div>
    <!-- END Galleries Row -->

    <!-- Grid Gallery Block -->
    <div class="block">
        <!-- Grid Gallery Title -->
        <div class="block-title">
            <h2><i class="fa fa-th-large"></i> Grid Gallery <small>Use the grid to create any layout you need</small></h2>
        </div>
        <!-- END Grid Gallery Title -->

        <!-- Grid Gallery Content -->
        <div class="gallery">
            <div class="row">
                <div class="col-sm-2">
                    <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="image">
                </div>
                <div class="col-sm-2">
                    <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="image">
                </div>
                <div class="col-sm-2">
                    <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="image">
                </div>
                <div class="col-sm-2">
                    <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="image">
                </div>
                <div class="col-sm-2">
                    <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="image">
                </div>
                <div class="col-sm-2">
                    <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="image">
                </div>
                <div class="col-sm-3">
                    <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="image">
                </div>
                <div class="col-sm-3">
                    <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="image">
                </div>
                <div class="col-sm-3">
                    <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="image">
                </div>
                <div class="col-sm-3">
                    <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="image">
                </div>
                <div class="col-sm-6">
                    <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="image">
                </div>
                <div class="col-sm-6">
                    <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="image">
                </div>
                <div class="col-sm-4">
                    <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="image">
                </div>
                <div class="col-sm-4">
                    <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="image">
                </div>
                <div class="col-sm-4">
                    <img src="<?php echo img_url('placeholders/image_720x450_light.png'); ?>" alt="image">
                </div>
            </div>
        </div>
        <!-- END Grid Gallery Content -->
    </div>
    <!-- END Grid Gallery Block -->
</div>
<!-- END Page Content -->

<?php $this->load->view('footer'); ?>
<?php $this->load->view('bottom'); ?>