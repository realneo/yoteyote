<?php
    include('../config/config.php');
    include('Main.php');
    include('Database.php');
    
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
        
        public function add_user($email, $first_name, $last_name){
            
            if($this->check_email_match() == false && $this->check_user_exists() == false){
                
                $user_ip = $this->get_user_ip();
                $created_at = $this->set_now();
                
            }else{
             
                return false;
                
            }
            
        }
        
        
        
    }
    
    $users = new Users($db);
    
    $user = $users->check_user_exists('neo@yoteyote.com');

    echo $users->get_user_ip();
    
    echo "<pre>";
    var_dump('Neo');
    echo "</pre>";


?>