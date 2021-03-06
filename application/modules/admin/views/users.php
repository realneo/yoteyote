<?php $this->load->view('partials/top'); ?>

<!-- Page content -->
<div id="page-content" class="block">
    <!-- Blank Header -->
    <div class="block-header">
        <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
        <a href="" class="header-title-link">
            <h1>
                <i class="glyphicon-brush animation-expandUp"></i><?php echo $page_title; ?><br><small>Manage Users!</small>
            </h1>
        </a>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <?php echo bread_crumbs(); ?>
    </ul>
    <!-- END Blank Header -->

    <!-- Block -->
    <div class="block">

        <!-- Block Title -->
        <div class="block-title">
			<h2><?php echo $page_title; ?></h2>
		</div>
        <!-- END Block Title -->

        <!-- Block Content -->
        <p>

			<!-- For notification messages. -->
			<div id="notifications">

			</div>

			<?php
		        if ( ! isset($view_file))
				{
		            $view_file = '';
		        }

		        if ( ! isset($module))
				{
		            $module = $this->uri->segment(1);
		        }

		        if (($view_file != '') && ($module != ''))
				{
		            $path = $module.'/'.$view_file;
		            $this->load->view($path);
		        }
				else
				{ ?>
					<!-- Yoteyote content id for yoteyote main.js -->
					<div id="content">

			            <p><?php echo nl2br($page_content); ?></p>

					</div>

				<?php }
			?>

		</p>
        <!-- END Block Content -->

    </div>
    <!-- END Block -->

</div>
<!-- END Page Content -->

<?php $this->load->view('partials/footer'); ?>
<?php $this->load->view('partials/bottom'); ?>