<?php

    class Posts extends Main{

        protected $db;

        public function __construct($db){
            $this->db = $db;
        }

        public function add_post($post_user_id, $post_type, $post_title, $post_content, $category_id, $post_currency, $post_amount){
            $created_at = $this->set_now();

            $this->db->query("INSERT INTO `posts`
                                (
                                    `post_user_id`,
                                    `post_title`,
                                    `post_content`,
                                    `post_type`,
                                    `post_category_id`,
                                    `post_amount`,
                                    `post_currency`,
                                    `post_created_at`
                                )
                                VALUES (
                                    :post_user_id,
                                    :post_title,
                                    :post_content,
                                    :post_type,
                                    :post_category_id,
                                    :post_amount,
                                    :post_currency,
                                    :post_created_at
                                )"
                            );
            $this->db->bind(':post_user_id', $post_user_id);
            $this->db->bind(':post_title', $post_title);
            $this->db->bind(':post_content', $post_content);
            $this->db->bind(':post_type', $post_type);
            $this->db->bind(':post_category_id', $category_id);
            $this->db->bind(':post_amount', $post_amount);
            $this->db->bind(':post_currency', $post_currency);
            $this->db->bind(':post_created_at', $created_at);

            $this->db->execute();

            if($this->db->lastInsertId() == true){
                return true;
            }else{
                return false;
            }
        }

        // Get all POSTS
        public function get_posts(){
          $this->db->query("SELECT * FROM `posts`");
          $this->db->execute();
          return $this->db->resultset();
        }

        public function get_posts_limit($orderby, $sort, $start, $end){
          $this->db->query("SELECT * FROM `posts` ORDER BY :orderby :sort LIMIT :start,:end");
          $this->db->bind(':start', $start);
          $this->db->bind(':end', $end);
          $this->db->bind(':orderby', $orderby);
          $this->db->bind(':sort', $sort);
          $this->db->execute();
          return $this->db->resultset();
        }


        // Get all from a selected POST
        public function get_post($id){
          $this->db->query("SELECT * FROM `posts` WHERE `id` = :id");
	        $this->db->bind(':id', $id);
	        $this->db->execute();
	        return $this->db->resultset();
        }

        // Get Total Post Views of a selected POST
        public function get_post_views($post_id){
            $this->db->query("SELECT `post_views` FROM `posts` WHERE `id` = :id");
            $this->db->bind(':id', $post_id);
            $this->db->execute();

            return $this->db->single();
        }

        // Get Total Post
        public function get_total_rows_by_type($post_type){
            $this->db->query("SELECT * FROM `posts` WHERE `post_type` = :post_type");
            $this->db->bind(':post_type', $post_type);
            $this->db->execute();

            return $this->db->rowCount();
        }

        // Get Total Post
        public function get_posts_by_type($post_type){
            $this->db->query("SELECT * FROM `posts` WHERE `post_type` = :post_type");
            $this->db->bind(':post_type', $post_type);
            $this->db->execute();

            return $this->db->resultset();
        }

        // Get all Post Views Log of a selected POST
        public function get_post_views_log($post_id){
            $this->db->query("SELECT * FROM `post_views` WHERE `post_id` = :id");
            $this->db->bind(':id', $post_id);
            $this->db->execute();

            return $this->db->single();
        }

        // Check if user already viewed the POST
        public function user_post_viewed($user_id, $post_id){
            $this->db->query("SELECT * FROM `post_views` WHERE `post_id` = :post_id AND `user_id` = :user_id");
            $this->db->bind(':user_id', $user_id);
            $this->db->bind(':post_id', $post_id);
            $this->db->execute();

            if($this->db->rowCount() == 1){
                return true;
            }else{
                return false;
            }
        }

        // Check if user viewed, if not then insert into post_views
        public function new_post_view($user_id, $post_id){

            if($this->user_post_viewed($user_id, $post_id) == true){
                return false;
            }else{

                $this->db->query("INSERT INTO `post_views` (`date`, `user_id`, `post_id`) VALUES (:date, :user_id, :post_id)");
                $this->db->bind(':date', $this->db->set_now());
                $this->db->bind(':user_id', $user_id);
                $this->db->bind(':post_id', $post_id);

                $this->db->execute();

                $post_views = $this->get_post_views($post_id)['post_views'];
                $new_post_view = $post_views + 1;
                $this->db->query("UPDATE `posts` SET `post_views` = '$new_post_view' WHERE `id` = :id");
                $this->db->bind(':id', $post_id);

                $this->db->execute();

                return true;
            }

        }

        // New Post Comment
        public function new_post_comment($post_id, $post_comment, $user_id){

            $this->db->query("INSERT INTO `post_comments` (`date`, `user_id`, `post_id`, `comment`) VALUES (:date, :user_id, :post_id, :comment)");
            $this->db->bind(':date', $this->db->set_now());
            $this->db->bind(':user_id', $user_id);
            $this->db->bind(':post_id', $post_id);
            $this->db->bind(':comment', $post_comment);

            $this->db->execute();

            if($this->db->lastInsertId() == 0){
                return false;
            }else{
                return true;
            }
        }

        // Get all Comments of a specific POST
        public function get_post_comment($post_id){

            $this->db->query("SELECT * FROM `post_comments` WHERE `post_id` = :post_id ORDER BY `id` DESC");
            $this->db->bind(':post_id', $post_id);
            $this->db->execute();

            return $this->db->resultset();
        }

        // Total Comments for the Post
        public function get_total_comments($post_id){

            $this->db->query("SELECT * FROM `post_comments` WHERE `post_id` = :post_id");
            $this->db->bind(':post_id', $post_id);
            $this->db->execute();
            $this->db->resultset();

            return $this->db->rowCount();
        }


    }

?>
