<div class='row'>
<?php
   include ("../lib/Main.php");
	$main= new Main;
	$post_obj=$main->load_model('Post');
	$active_filter = " AND posts.active='y'";
	
	
	if(isset($_GET['mode']) && $_GET['mode']=='search'){
            $posts =  $post_obj->searchPost($_GET['txt']);				
	}
	else if(isset($_GET['sort']) && $_GET['sort']=='wants'){
            $posts =  $post_obj->getAllPosts('*',$orderby ='posts.type',$option=" AND posts.type='want' $active_filter");				
	}
	
	else if(isset($_GET['sort']) && $_GET['sort']=='wills'){
            $posts =  $post_obj->getAllPosts('*',$orderby ='posts.type',$option=" AND posts.type='will' $active_filter");				
	}
	else{
            $posts = $post_obj->getAllPosts();
	}
        
	$html.="";

	if (!empty($posts) ){
            foreach($posts as $post){
                
                if($post['type']=='will'){
                     $color_toggle = 'success'; // If the post type is WILL then change the color_toggle to the assigned class 'success'
                }else{
                    $color_toggle = 'red_color';// If the post type is WANT then change the color_toggle to the assigned class 'red_color'
                }
                
                

                // english notation (default)
                $conv_amount = number_format($post['amount']);
                // 1,235
                // 
                //Post

                $html.="
                    
                        <div class='span4 thumbnail plan'>
                            <div class='row'>
                                <div class='span6 offset1'>
                                    <span class='post_type $color_toggle'>I $post[type]</span>
                                    <span class='post_title'>$post[post]</span>
                                </div>
                                <div class='span5 text-right'>
                                    <span class='label label-inverse'>$post[currency]</span>
                                    <span class='amount $color_toggle'>$conv_amount</span>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='span11 offset1 post_description'>
                                    <p>$post[description]</p>
                                </div>
                            </div>
                            <div class='row'>
                                <div class='span2 offset1'><img src='images/sample_user.png' alt=''/></div>
                                <div class='span9 greytxt'>$post[first_name] $post[last_name]</div>
                                <div class='span9 $color_toggle'>$post[mobile]</div>
                            </div>
                        </div>
                
                       ";
            }
	   
	   echo $html;
	 }
?>
<!--
<li class='span4 '>
                        <div class='thumbnail plan no_margin'>
                            <span class='label label-inverse'>$post[currency]</span>
                            <span class='amount $color_toggle'>$conv_amount</span> - 
                            <span class='post_type $color_toggle'>I $post[type]</span>
                            <span class='post_title'>$post[post]</span>
                            <hr />
                            <span class='post_description'>$post[description]</span>
                            <hr />
                            <div class='span3'><img src='images/sample_user.png' alt='' width='50px'/></div>
                            <a href='#' class='font15 greytxt'>$post[first_name] $post[last_name]</a>
                            <p class='number $color_toggle '>$post[mobile]</p>
                        </div>
                    </li>-->
</div>

<div class='tex'