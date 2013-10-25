<?php 
$message="";
$alert="";
include("header.php");
include("sidebar.php");
$admin =   $main->load_model("Admin");

	$table		='currency_setting,deduction';
	$where		='where currency_setting.id=1 and deduction.id=1';
	$row		=$admin->SearchData($table,$where);	
	$currency	=$row[0]['rate'];


if(isset($_POST['submit']))
{
$id			=$_POST['user_id'];
$bank			=$_POST['bank'];
$payment 	=$_POST['payment'];
	if($payment)
	{
		if(preg_match('/^[1-9]\d*(\.\d+)?$/', $payment))
		{
		
			$deduction	=$row[0]['mobile'];
			if($payment<=$deduction && $_POST['method'] !='usd')
			{
			
					$message.="Sorry You Amount Must be greater than deduction charges!";
					$alert.=$admin->show_bar(0,$message,1);
			
			
			}else
			{
			if($_POST['method']=='usd')
			{
				



				if($admin->addTransc($_POST,$id,$bank,$deduction,$currency))
				{
							
					$message.="Transactio Successfully completed";
					$alert.=$admin->show_bar(1,$message,1);
				
				}else
				{
					$message.="Transactio not completed";
					$alert.=$admin->show_bar(0,$message,1);				
				
				}
							
			
			}
						elseif($_POST['method']=='tshs')
			{
				
				if($admin->addTransc($_POST,$id,$bank,$deduction))
				{
							
					$message.="Transactio Successfully completed";
					$alert.=$admin->show_bar(1,$message,1);
				
				}else
				{
					$message.="Transactio not completed";
					$alert.=$admin->show_bar(0,$message,1);				
				
				}
							
			
			}
			}
		
		
		}
			else
		{
		
		$message.="Only integer value allow";
		$alert.=$admin->show_bar(0,$message,1);
		}
			
		

	}




}
if(isset($_GET['id']))
{	
	$id=$_GET['id'];
	$table='users';
	$where="where user_id='$id'";
	$user	=$admin->SearchData($table,$where);	

	$bank	=$user[0]['bank'];
	$name	=ucfirst($user[0]['first_name'].' '.$user[0]['last_name']);
	$mobile	=$user[0]['mobile'];
	
}	

?>

<section id="main" class="column">
<?=$alert?>
<article class="module width_full">
			<header><h3>Payment Area</h3></header>
			
			
			
			<div class="module_content">
			
			<article class="stats_graph">
			<table>
			<tr><td><span style="font-weight:bolder">Username </span></td><td>:<?=$name?></td></tr>
			<tr><td><span style="font-weight:bolder">Mobile </span></td><td>:<?=$mobile?></td></tr>
			<tr><td><span style="font-weight:bolder">Bank </span></td><td>:<?=number_format($bank)?></td></tr>
			</table>
			</article>
				<article class="stats_overview">
				
					<div class="overview_today">
						<p class="overview_day">Currency Rate (Today)</p>
						<p class="overview_count"><?=number_format($currency)?></p>
						<p class="overview_day">Tshs/$</p>

					</div>

				</article>
				
				<article class="stats_graph">
				<form name="currency" method="POST" action="#">
					<fieldset style="width:60%; float:left;"> <!-- to make two field float next to one another, adjust values accordingly -->
						<label>Amount</label>
						<input type="text"  name="payment" required value="" style="width:89%;">
					
					<div style="float:left; margin:10px 10px 10px 10px;">

					Usd :<input type="radio" name='method' value='usd'/>
					Trshs:<input type="radio" name='method' value='tshs' checked="checked"/>

					</div>

					
					
					<div class="submit_link">

					
					<input type="hidden" name="user_id" value="<?=$id?>">
					<input type="hidden" name="bank" value="<?=$bank?>">
					<input type="submit" class="alt_btn" name="submit" value="Add">
				
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