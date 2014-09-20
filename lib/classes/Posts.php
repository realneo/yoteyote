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
        
    }
    
?>