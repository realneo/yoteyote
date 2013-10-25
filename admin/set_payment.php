<?php 
$message="";
$alert="";
include("header.php");
include("sidebar.php");
$admin =   $main->load_model("Admin");

if(isset($_POST['submit']))
{
	$payment	=$_POST['payment'];
	if(isset($payment))
	{
	if(preg_match('/^[1-9]\d*(\.\d+)?$/', $payment))
	{
	
	if($admin->addCurrency($payment))
	{
	$message.="Currecny Rate Successfully Updated";
	$alert.=$admin->show_bar(1,$message,1);
	
	}
	
	}else
	{
	
	$message.="Only integer value allow";
	$alert.=$admin->show_bar(0,$message,1);
	}
	
	}
	

}elseif(isset($_POST['deduct']))
{

	$mobile	=$_POST['mobile'];
	$transc	=$_POST['transc'];
	
	if(preg_match('/^[1-9]\d*(\.\d+)?$/', $mobile) && preg_match('/^[1-9]\d*(\.\d+)?$/', $transc))
	{
	
	if($admin->deductCharges($_POST))
	{
	$message.="Deduction Charges Successfully Updated";
	$alert.=$admin->show_bar(1,$message,1);
	
	}
	
	
	}else
	{
	
	$message.="Only integer value allow";
	$alert.=$admin->show_bar(0,$message,1);
	
		
	}	

}
$table='currency_setting,deduction';
	$where='where currency_setting.id=1 and deduction.id=1';
	$row	=$admin->SearchData($table,$where);	

?>



<section id="main" class="column">

<?=$alert?>

<article class="module width_full">
			<header><h3>Payment Setting</h3></header>
			<div class="module_content">
				<article class="stats_graph">
					<form name="currency" id="currency" action="#" method="POST">
					<fieldset style="width:90%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
						<label>Enter Tshs Rate Per Dollar</label>
						<input type="text" id="payment" name="payment" required value=""  style="width:89%;">
					

					
					
					<div class="submit_link">

					<input type="submit" class="alt_btn" name="submit" value="submit">
				
					</div>
					
					
					</fieldset>
					</form>				
				</article>
				<article class="stats_overview">
					<div class="overview_today">
						<p class="overview_day">Currency Rate (Today)</p>
						<p class="overview_count"><?=number_format($row[0]['rate'])?></p>
						<p class="overview_type">Tshs/$</p>

					</div>

				</article>
								<article class="stats_graph">
					<form name="deduction" id="deduction" action="#" method="POST">
					<fieldset style="width:90%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
						<label>Enter Mobile Charges</label>
						<input type="text" id="mobile" name="mobile" required value=""  style="width:89%;">
						<label>Enter Transcation Charges</label>
						<input type="text" id="transc" name="transc" required value=""  style="width:89%;">
					

					
					
					<div class="submit_link">

					<input type="submit" class="alt_btn" name="deduct" value="submit">
				
					</div>
					
					
					</fieldset>
					</form>				
				</article>
				<article class="stats_overview">
					<div class="overview_today">
						<p class="overview_day">Transaction deduction</p>
						<p class="overview_count"><?=number_format($row[0]['transc'])?></p>
						<p class="overview_type">Tshs</p>

					</div>
					
					<div class="overview_today">
						<p class="overview_day">Mobile deduction Charges</p>
						<p class="overview_count"><?=number_format($row[0]['mobile'])?></p>
						<p class="overview_type">Tshs</p>

					</div>					


				</article>
				
				<div class="clear"></div>
			</div>
		</article>
		
            <div class="clear"></div>

    <div style="height:700px"></div>
    </section>
<?php 
 include("footer.php");
 ?>