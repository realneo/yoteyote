<?php
   include ("../lib/Main.php");
	$main= new Main;
	$main->initSession();
	$user=$main->load_model('User');
	$user_id  = $_SESSION['user_id'];
	
	
	$ongoings  = $user->getOngoings($user_id);
	

		
?>
<style>


table {
    *border-collapse: collapse; /* IE7 and lower */
    border-spacing: 0;
    width: 100%;  
  
}

.bordered {
    border: solid #ccc 1px;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    border-radius: 6px;
    -webkit-box-shadow: 0 1px 1px #ccc; 
    -moz-box-shadow: 0 1px 1px #ccc; 
    box-shadow: 0 1px 1px #ccc;         
}

.bordered tr:hover {
    background: #fbf8e9;
    -o-transition: all 0.1s ease-in-out;
    -webkit-transition: all 0.1s ease-in-out;
    -moz-transition: all 0.1s ease-in-out;
    -ms-transition: all 0.1s ease-in-out;
    transition: all 0.1s ease-in-out;     
}    
    
.bordered td, .bordered th {
    border-left: 1px solid #ccc;
    border-top: 1px solid #ccc;
    padding: 10px;
    text-align: left;    
}

.bordered th {
    background-color: #dce9f9;
    background-image: -webkit-gradient(linear, left top, left bottom, from(#ebf3fc), to(#dce9f9));
    background-image: -webkit-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:    -moz-linear-gradient(top, #9E1300, #933);
    background-image:     -ms-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:      -o-linear-gradient(top, #ebf3fc, #dce9f9);
    background-image:         linear-gradient(top, #ebf3fc, #dce9f9);
    -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset; 
    -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;  
    box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;        
    border-top: none;
    text-shadow: 0 1px 0 rgba(255,255,255,.5); 
		color:#FFF;
}

.bordered td:first-child, .bordered th:first-child {
    border-left: none;
}

.bordered th:first-child {
    -moz-border-radius: 6px 0 0 0;
    -webkit-border-radius: 6px 0 0 0;
    border-radius: 6px 0 0 0;
}

.bordered th:last-child {
    -moz-border-radius: 0 6px 0 0;
    -webkit-border-radius: 0 6px 0 0;
    border-radius: 0 6px 0 0;
}

.bordered th:only-child{
    -moz-border-radius: 6px 6px 0 0;
    -webkit-border-radius: 6px 6px 0 0;
    border-radius: 6px 6px 0 0;
}

.bordered tr:last-child td:first-child {
    -moz-border-radius: 0 0 0 6px;
    -webkit-border-radius: 0 0 0 6px;
    border-radius: 0 0 0 6px;
}

.bordered tr:last-child td:last-child {
    -moz-border-radius: 0 0 6px 0;
    -webkit-border-radius: 0 0 6px 0;
    border-radius: 0 0 6px 0;
}  
</style>
<table class="bordered">
    <thead>

    <tr>
        <th>Post Title</th>        
        <th>Post Description</th>
        <th>Post By</th>
        <th>Amount</th>
        <th>Action</th>
    </tr>
    </thead>
    
    <? if($ongoings) {  
	
	foreach($ongoings as $ongoing){
	
	?>
    
    <tr>
        <td><?=ucfirst($ongoing['post'])?></td>        
        <td><?=$main->limitchars(ucfirst($ongoing['description']),80,12)?></td>
          <td><?=ucfirst($ongoing['first_name']).' '.$ongoing['last_name']?>&nbsp;&nbsp;&nbsp;<button id="<?=$ongoing['id']?>" class="get_contact_btn" name="get_contact_btn">View Profile</button>&nbsp;&nbsp;&nbsp;<input type="hidden"  class="trusted_to" value="<?=$ongoing['user_id']?>" /><button id="<?=$user_id?>" class="add_trust_btn" name="add_trust_btn">Trust</button></td>
    <td style="font-size:18px"><?=$ongoing['on_amount']?><span  style="font-style:italic;font-size:12px;color:red">Tshs</span></td>        
        <td width="103" align="center"><button id="<?=$ongoing['on_id']?>" class="pay_btn" name="add_trust_btn">Pay & Close</button></td>
    </tr>        
   <?  } }?>

</table>