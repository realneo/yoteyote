<?php $this->load->view('partials/top'); ?>

<!-- Page content -->
<div id="page-content" class="block">
    <!-- Blank Header -->
    <div class="block-header">
       	<div class="header-background header-pad">
		    <div class="row">
        		<div class="col-xs-6">
        			<h1>
        			<div>
	    	    		<img src="<?php echo image_url('logo.png'); ?>" alt="logo" height="87" width="87">
						<strong>Yoteyote</strong>
						<br />
						<small>
						<strong class="discover-pad">Buy & Sell small jobs from one another.&nbsp;&nbsp;</strong>
						<a id="discover_btn" href="#" class="btn btn-danger btn-sm" role="button"> Discover how</a><br />
						</small>
						</div>
					</h1>
        		</div>

		        <div class="col-xs-6 header2-pad">
					<div class="btn-group pull-right"> <!-- I Will -->
						<button type="button" class="btn btn-default active"> I Will&nbsp;&nbsp;</button>
						<a href="#" class="btn btn-success" role="button"> Create</a>
					</div><br /><br /><br />
					<div class="btn-group pull-right"> <!-- I Want -->
						<button type="button" class="btn btn-default active"> I Want</button>
						<a href="#" class="btn btn-danger" role="button"> Create</a>
					</div>
		        </div>
		    </div>
	    </div>
    </div>

    <ul class="breadcrumb breadcrumb-top">
        <li><i class="fa fa-file-o"></i></li>
        <li>Pages</li>
        <li><a href="">Yoteyote</a></li>
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
			This is block's content..

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