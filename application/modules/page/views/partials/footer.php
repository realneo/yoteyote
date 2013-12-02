<?php
/**
 * footer.php
 *
 * Author: pixelcave
 *
 * The footer of the page
 * Jquery library as well as all other scripts are included here
 *
 */
?>
        <!-- Footer -->
        <footer class="clearfix">
        	<!-- Right Statusbar Text -->
            <div class="pull-right">
                <span id="year-copy"></span> &copy; <a href="http://www.yoteyote.com" target="_blank"><?php echo $template['name'] . ' '; ?></a>
                All rights reserved.
                <!--Crafted with <i class="fa fa-heart"></i> by <a href="http://www.yoteyote.com" target="_blank">Yoteyote</a>-->
            </div>

			<!-- Left Statusbar text -->
            <div class="pull-left">
                <!--<span id="year-copy"></span> &copy; <a href="javascript:void(0)" target="_blank"><?php //echo $template['name'] . ' ' . $template['version']; ?></a>-->

            </div>
        </footer>
        <!-- END Footer -->

    </div>
    <!-- END FX Container -->

</div>
<!-- END Page Container -->

<!-- Scroll to top link, check main.js - scrollToTop() -->
<a href="javascript:void(0)" id="to-top"><i class="fa fa-angle-up"></i></a>

<!-- Get Jquery library from Google but if something goes wrong get Jquery from local file - Remove 'http:' if you have SSL -->
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
<script src="<?php echo js_url('vendor/jquery/1.10.2/jquery.min.js'); ?>"></script>

<script>!window.jQuery && document.write(unescape('%3Cscript src="<?php echo js_url('vendor/jquery-1.10.2.min.js'); ?>" %3E%3C/script%3E'));</script>

<!-- Bootstrap.js, Jquery plugins and custom Javascript code -->
<script src="<?php echo js_url('vendor/bootstrap.min.js'); ?>"></script>
<script src="<?php echo js_url('jquery.cookie.js'); ?>"></script>
<script src="<?php echo js_url('plugins.js'); ?>"></script>
<script src="<?php echo js_url('main.js'); ?>"></script>