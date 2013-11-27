<?php $this->load->view('partials/top'); ?>

<!-- Page content -->
<div id="page-content" class="block">
    <!-- Animations Header -->
    <div class="block-header">
        <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
        <a href="" class="header-title-link">
            <h1>
                <i class="fa fa-magic animation-expandUp"></i>Animations<br><small>Ready to use CSS3 animations just by adding a class!</small>
            </h1>
        </a>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li><i class="fa fa-cog"></i></li>
        <li>Components</li>
        <li><a href="">Animations</a></li>
    </ul>
    <!-- END Animations Header -->

    <!-- Animations Content -->
    <p>You can easily animate most of the HTML elements just by adding a class to them! Click the following buttons to check live all the available animations on the image! (The animations will work in modern browsers!)</p>
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
            <h4 class="sub-header">Animation class: <code id="animation-class">None</code></h4>
            <div class="block-section">
                <img src="<?php echo img_url('template/avatar2.jpg'); ?>" id="animation-element" alt="avatar">
            </div>
            <h4 class="sub-header">Entrances <small>10 animations</small></h4>
            <p class="animation-buttons">
                <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-animation="animation-slideDown">SlideDown</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-animation="animation-slideUp">SlideUp</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-animation="animation-slideLeft">SlideLeft</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-animation="animation-slideRight">SlideRight</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-animation="animation-slideExpandUp">SlideExpandUp</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-animation="animation-expandUp">ExpandUp</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-animation="animation-fadeIn">FadeIn</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-animation="animation-expandOpen">ExpandOpen</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-animation="animation-bigEntrance">BigEntrance</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-animation="animation-hatch">Hatch</a>
            </p>
            <h4 class="sub-header">Misc <small>8 animations</small></h4>
            <p class="animation-buttons">
                <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-animation="animation-bounce">Bounce</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-animation="animation-pulse">Pulse</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-animation="animation-floating">Floating</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-animation="animation-tossing">Tossing</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-animation="animation-pullUp">PullUp</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-animation="animation-pullDown">PullDown</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-animation="animation-stretchLeft">StretchLeft</a>
                <a href="javascript:void(0)" class="btn btn-sm btn-primary" data-animation="animation-stretchRight">StretchRight</a>
            </p>
        </div>
    </div>
    <!-- END Animations Content -->
</div>
<!-- END Page Content -->

<?php $this->load->view('partials/footer'); ?>

<!-- Javascript code only for this page -->
<script>
    $(function() {
        /* Add/Remove Animation */
        var animElem = $('#animation-element');
        var animSpan = $('#animation-class');
        var animClass = '';

        $('.animation-buttons .btn').click(function() {
            animClass = $(this).data('animation');

            animElem.removeClass().addClass(animClass);
            animSpan.text(animClass);
        });
    });
</script>

<?php $this->load->view('partials/bottom'); ?>