
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
                
                // Get total trusts for each user
                $trusts = $post_obj->getTotalTrusts($post['user_id']);
                
                // Assigning different values for post type. 
                // If its a "WILL" or "WANT"
                
                if($post['type']=='will'){
                    $type_text = "Hire"; //If post type is WILL then change the button text to "Hire"
                     $btn_toggle = 'btn-success'; // If the post type is WILL then change the button to the assigned class 'btn-success'
                     $color_toggle = 'success'; // If the post type is WILL then change the color_toggle to the assigned class 'success'
                }else{
                    $type_text = "Bid"; //If post type is WANT then change the button text to "Bid"
                    $btn_toggle = 'btn-danger';// If the post type is WANT then change the button to the assigned class 'btn-danger'
                    $color_toggle = 'red_color';// If the post type is WANT then change the color_toggle to the assigned class 'red_color'
                }
                
                

                // english notation (default)
                $conv_amount = number_format($post['amount']);
                // 1,235
                // 
                //Post

                $html.="
                    <li class='span4 '>
                        <div class='thumbnail plan no_margin'>
                            <span class='label label-inverse'>$post[currency]</span>
                            <span class='amount'>$conv_amount</span> - 
                            <span class='post_type $color_toggle'>I $post[type]</span>
                            <span class='post_title'>design a website in one day</span>
                            <br />
                            <div class='span3'><img src='images/sample_user.png' alt='' width='50px'/></div>
                            <a href='#' class='font15 greytxt'>$post[first_name] $post[last_name]</a>
                            <p class='number'>$post[mobile]</p>
                        </div>
                    </li>
                
                        ";
            }
	   
	   echo $html;
	 }
?>