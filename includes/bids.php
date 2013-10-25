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

<?php
   include ("../lib/Main.php");
	$main= new Main;
	$main->initSession();
	$db=$main->load_model('Db');
	$user_id  = $_SESSION['user_id'];
	$active_filter = " AND active='y'";
	
	if(isset($_GET['id']) ) 
	
	{
	$post_id = $_GET['id'];
	
	
	
	$s = "SELECT * from listings,posts,users  where listings.post_id ='$post_id'
	 AND listings.user_id =users.user_id 
	 AND listings.post_id =posts.id    ";
	$bids  = $db->get_rows($s);

	}
	
	
	
		
?>
<table class="bordered">
    <thead>

    <tr>
        <th>Name</th>        
        <th>Trusted by People</th>
        <th>Bid Amount</th>
          <th>Action</th>
    </tr>
    </thead>
    
    <? if($bids) {  
	
	foreach($bids as $bid){
	
	?>
    
    <tr>
        <td><?=ucfirst($bid['first_name']).' '.$bid['last_name']?></td>        
        <td><?=$main->load_model('Post')->getTotalTrusts($user_id)?></td>

        <td align="center"><span  style="color:#9B2116;font-size:15px;font-weight:bold"><?=$bid['bid']?>  <b style="color:red">Tshs</b></span></a></td>
        <td width="114"><button id="<?=$bid['list_id']?>" class="accept_bid_btn">Accept Bid</button></td>
        
    </tr>        
   <?  } }?>

</table>