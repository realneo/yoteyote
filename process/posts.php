<?php
  require_once('../lib/config/autoload.php');
  require_once('../lib/classes/Posts.php');

  $posts = new Posts($db);
  $load = $_POST['load']*6;
  $db_posts = $posts->get_posts_limit('id', 'DESC', $load, 6);

  foreach($db_posts as $post){
?>

<div class='boxed post'>
  <!--<div class='badge post_badge'></div> -->
  <div class='col-md-12 text-center post_title'><h5><span class='bolder-text <?php //echo $text_color; ?>'>I <?php echo $post['post_type']; ?></span> <?php //echo $post_title; ?></h5></div>
  <div class='col-md-12 post_amount'><h4><span class="label label-default currency"><?php echo $post['post_currency']; ?></span> <?php echo number_format($post['post_amount']); ?></h4></div>
  <?php //echo $pic ; ?>
  <div class='col-md-12'><p><?php echo $post['post_content']; ?></p></div>
  <div class="col-md-12">
  <img alt="" src="images/users/default.png" class='post_profile_pic'>
  <div class='user_info'>
      <p>
        <strong><?php //echo $user_first_name. " " . $user_last_name; ?></strong><br />
        <!--Trusted By <span class='round-badge orange_bg'>12</span><br />
        Satisfied Users <span class='round-badge green_bg'>12</span><br />-->
        <?php if($session->is_user_logged_in() == true){ ?>
          <!--<a href="post_content.php?id=<?php echo $db->secure_id($post_id); ?>" class="btn <?php echo $btn_color; ?>"><span><?php echo $btn_text; ?></span></a>-->
          <p><strong>Contacts:</strong> <?php echo $user_mobile; ?> </p>
        <?php }else{ ?>
          <p>Login to Buy or Bid</p>
        <?php } ?>
      </p>
    </div>
  </div>
</div>

<?php } ?>
