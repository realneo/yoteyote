<?php include('templates/header.php'); ?>
    <div class='row'>
        <div class='col-md-12'>
	    
	    <div class='row'>
		
		<div class='col-md-2 col-md-offset-1'>
		    
		    <div class='widget_avatar boxed text-center'><div class='inner'><h5>Verified <span class="glyphicon glyphicon-ok"></span></h5></div></div>
		    
		    <div class='widget_avatar boxed text-center'>
			<div class='inner'>
			    <div class='avatar'><img alt="" src="images/users/default.png"/></div>
			</div><!-- inner -->
		    </div><!-- widget -->
		    
		    <div class='widget_avatar boxed text-center'>
			<div class='inner'>
			    <p class='text-left'>Mobile</p>
			    <table class='table-no-border table-hover no-border'>
				<tr>
				    <td><img alt='Tigo' src='images/tigo_logo.gif' /></td>
				    <td><p>Tigo</p></td>
				    <td><span class="glyphicon glyphicon-ok"></span></td>
				</tr>
				<tr>
				    <td><img alt='Vodacom' src='images/vodacom_logo.gif' /></td>
				    <td><p>Vodacom</p></td>
				    <td><span class="glyphicon glyphicon-ok"></span></td>
				</tr>
				<tr>
				    <td><img alt='Airtel' src='images/airtel_logo.gif' /></td>
				    <td><p>Airtel</p></td>
				    <td><span class="glyphicon glyphicon-ok"></span></td>
				</tr>
				<tr>
				    <td><img alt='Zantel' src='images/zantel_logo.gif' /></td>
				    <td><p>Zantel</p></td>
				    <td><span class="glyphicon glyphicon-ok"></span></td>
				</tr>
			    </table>
			    <hr />
			    <p class='text-left'>Email</p>
			    <hr />
			    <p class='text-left'>Social Network</p>
			</div><!-- inner -->
		    </div><!-- widget -->
		    
		</div><!-- left pane -->
		
		
		<div class='col-md-8'>
		    
		    <div class='widget-contianer boxed'>
			<div class='inner'>
			    <h3 class='padding-10 no-margin'><?php echo $_SESSION['user_first_name']. " " . $_SESSION['user_last_name']; ?></h3>
			    <p class='padding-left-10'><i class="glyphicon glyphicon-star no-margin"></i> Trusted by <span class='red_text'><strong>12</strong></span> people</p>
			    <a href="#" class="btn btn-green"><span><i class="glyphicon glyphicon-comment"></i>Chat</span></a>
			    <a href="#" class="btn btn-green"><span><i class="glyphicon glyphicon-credit-card"></i>Pay</span></a>
			    
			    <!--Tabs alternative style-->
			    <div class="tabs_framed styled">
				<div class="inner">
				    <ul class="tabs clearfix active_bookmark1">
					<li class="active"><a href="#me" data-toggle="tab">Me</a></li>
					<li>
					    <a href="#reminders" data-toggle="tab">
						<sup class="note">7</sup>Messages
					    </a>
					</li>
					<li><a href="#starred" data-toggle="tab">Starred</a></li>
					<li><a href="#archive" data-toggle="tab">Archive</a></li>
				    </ul>
			    
				    <div class="tab-content clearfix">
					
					<div class="tab-pane clearfix fade in active" id="me">
					   
					    <div class='row'>
						<div class='col-lg-4'>
						    <h6>About Me</h6>
						    <p>Lorem ipsum dolor sit amet, mea tollit suavitate et, per ex sint referrentur. Vel iriure facilisis et. Nonumy mandamus theophrastus cu sed, iusto persecuti et pro. An ipsum aliquip ceteros qui, sea eu quidam evertitur, ne indoctum expetendis mei.
</p>
						    <h6>Location</h6>
						    <p>Kariakoo, Dar es salaam, Tanzania</p>
						</div>
						<div class='col-lg-4'>
						    <h6>Skills</h6>
						    <ul>
							<li><p>Programming</p></li>
							<li><p>Designing</p></li>
							<li><p>3D Animation</p></li>
							<li><p>Website</p></li>
							<li><p>Writing</p></li>
						    </ul>
						</div>
						<div class='col-lg-4'>
						    <h6>Statistics</h6>
						    <table class='table table-hover lighter-text'>
							<tr>
							    <td><i class='glyphicon glyphicon-save no-margin'></i> Earned : <span class='pull-right'>Tshs <strong><span class='green_text'> 43,422</span></strong></span></td>
							    <td><i class='glyphicon glyphicon-open no-margin'></i> Spent : <span class='pull-right'>Tshs <strong><span class='red_text'> 32,000</span></strong></span></td>
							</tr>
							<tr>
							    <td><i class='glyphicon glyphicon-eye-open no-margin'></i> Profile Views : <strong><span class='green_text pull-right'>455</span></strong></td>
							    <td><i class='glyphicon glyphicon-heart no-margin'></i> Satisfied Buyers: <strong><span class='green_text pull-right'>4</span></strong></td>
							</tr>
							<tr>
							    <td><i class='glyphicon glyphicon-screenshot no-margin'></i> Wills Posted: <strong><span class='green_text pull-right'>4</span></strong></td>
							    <td><i class='glyphicon glyphicon-screenshot no-margin'></i> Wants Posted: <strong><span class='red_text pull-right'>4</span></strong></td>
							</tr>
							<tr>
							    <td><i class='glyphicon glyphicon-ok-circle no-margin'></i> Good Reviews: <strong><span class='green_text pull-right'>4</span></strong></td>
							    <td><i class='glyphicon glyphicon-ban-circle no-margin'></i> Bad Reviews: <strong><span class='red_text pull-right'>4</span></strong></td>
							</tr>
							
						    </table>
						
						</div>
					    </div>
					    
					</div><!-- me tab-pane --->
					
					<div class="tab-pane clearfix fade" id="reminders">
					    <!--place your content here-->Trw
					</div>
					<div class="tab-pane clearfix fade" id="starred">
					    <!--place your content here-->There
					</div>
					<div class="tab-pane clearfix fade" id="archive">
					    <!--place your content here-->Four
					</div>
				    </div>
				</div>
			    </div>
			    
			</div>
		    </div>
		    
		</div><!-- center container -->
	    
	    </div>
	   
        </div><!-- col-md-12 -->	
    </div><!--row -->

<?php include('templates/footer.php'); ?>