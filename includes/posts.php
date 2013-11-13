<script>
    $('.container').shapeshift({
        animateOnInit:'true'
    });
</script>
<div class='container'>
    <?php
        include ("../lib/Main.php");

        $main= new Main;
            $post_obj=$main->load_model('Post');
            $active_filter = " AND posts.post_active='y'";


            if(isset($_GET['mode']) && $_GET['mode']=='search'){
                $posts =  $post_obj->searchPost($_GET['txt']);
            }
            elseif(isset($_GET['sort']) && $_GET['sort']=='wants'){
                $posts =  $post_obj->getAllPosts('*',$orderby ='posts.post_type',$option=" AND posts.post_type='want' $active_filter");
            }

            elseif(isset($_GET['sort']) && $_GET['sort']=='wills'){
                $posts =  $post_obj->getAllPosts('*',$orderby ='posts.post_type',$option=" AND posts.post_type='will' $active_filter");
            }
            else{
                $posts = $post_obj->getAllPosts();
            }

            $html='';

            if (!empty($posts) ){
                foreach($posts as $post){

                    if($post['post_type']=='will'){
                         $color_toggle = 'success'; // If the post type is WILL then change the color_toggle to the assigned class 'success'
                    }else{
                        $color_toggle = 'red_color';// If the post type is WANT then change the color_toggle to the assigned class 'red_color'
                    }

                    $q=  mysql_query("SELECT `pic` FROM `posts` WHERE `id` = '$post[id]'");
                    while($row = mysql_fetch_array($q)){
                        $pic = $row['pic'];
                        if ($pic == NULL){
                            $picture = '';
                        }else{
                            $picture = "<img src='images/posts/{$pic}' alt='$post[post]' width='280'/>";
                        }
                    }

                    $user_id = $post['user_id'];
                    $q = mysql_query("SELECT * FROM `users` WHERE `user_id` = '$user_id'");
                    while($row = mysql_fetch_array($q)){
                        $user_data['pic'] = $row['pic'];

                    if($user_data['pic'] == false){
                        $profile_pic = "<img src='images/users/default.png' width='50' alt='' class='pull-left'/>";
                    }else{
                        $profile_pic = "<img src='images/posts/$user_data[pic]' width='50' alt='' class='pull-left'/>";
                    }


                    // english notation (default)
                    $conv_amount = number_format($post['amount']);

                    // 1,235
                    //
                    //Post
                    $html.="
                            <div class='box thumbnail plan'>
                                <h4 class='pull-right'><span class='label label-inverse'>$post[currency]</span> <span class='amount $color_toggle'>$conv_amount</span></h4>
                                <h4><span class='post_type $color_toggle'>I $post[post_type]</span> <span class='post_title'>$post[post]</span></h4>
                                $picture
                                <p class='post_description'>$post[description]</p>
                                $profile_pic
                                &nbsp;<span class='greytxt'>$post[first_name] $post[last_name]</span><br />
                                 &nbsp;<span class='$color_toggle'>$post[mobile]</span>
                            </div>
                           ";
                    }


                }

               echo $html;
             }
    ?>
</div>