<?php

    class Users extends Main{
        
        protected $db;
        
        public function __construct($db){
            $this->db = $db;
        }
        
        public function check_user_exists($email){
            $this->db->query("SELECT `user_email` FROM `users` WHERE `user_email` = :entered_email");
            $this->db->bind(':entered_email', $email);
            $this->db->execute();
    
            if($this->db->rowCount() == 0){
                return false;
            }else{
                return true;
            }
        }
        
        public function check_email_match($email, $re_email){
            if($email === $re_email){
                return true;
            }else{
                return false;
            }
        }
        
        public function check_password_match($password, $password2){
            if($password === $password2){
                return true;
            }else{
                return false;
            }
        }
        
        public function add_user($email, $password, $first_name, $last_name){

            $user_ip = $this->get_user_ip();
            $created_at = $this->set_now();
            $token = $this->get_new_token();
            
            $hashed_password = $this->new_hash($password);
                
            $query = $this->db->query("INSERT INTO
                                        `users`
                                            (
                                                `user_email`,
                                                `user_password`,
                                                `first_name`,
                                                `last_name`,
                                                `user_ip_address`,
                                                `user_token`,
                                                `user_created_at`
                                            )
                                        VALUES
                                            (
                                                :email,
                                                :password,
                                                :first_name,
                                                :last_name,
                                                :user_ip,
                                                :token,
                                                :created_at
                                            )
                                        ");
                
            $this->db->bind(':email', $email);
            $this->db->bind(':password', $hashed_password);
            $this->db->bind(':first_name', $first_name);
            $this->db->bind(':last_name', $last_name);
            $this->db->bind(':user_ip', $user_ip);
            $this->db->bind(':token', $token);
            $this->db->bind(':created_at', $created_at);
        
            $this->db->execute();
            
            if($this->db->lastInsertId() == true){
                $this->alert('success', 'Successfully Logged In');
                return true;
            }else{
                $this->alert('danger', 'There was a system Error, Please Try Again');
                return false;
            }
        }
        
        public function add_password($id, $password){
            
        }

        public function login($email, $password){
            
            // Secure the Input Fields
            $hashed_password = $this->new_hash($password);
             
            // Check if user with the same password exists
            $this->db->query("SELECT * FROM `users` WHERE `user_email` = :email AND `user_password` = :password");
            $this->db->bind(':email', $email);
            $this->db->bind(':password', $hashed_password);
                
            $row = $this->db->rowCount();
                
            // If there is no rowCount
            if($row > 0){
                $this->alert('danger', 'Email or Password is incorrect');
                return false;
            }else{
                $this->alert('success', 'Successfully Logged In');
                return true;
            }  
        }
        
        public function get_user_info($email){
            $this->db->query("SELECT * FROM `users` WHERE `user_email` = :email");
            $this->db->bind(':email', $email);
            return $this->db->resultset();
        }
        
    }
?>