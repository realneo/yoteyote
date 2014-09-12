<?php
    
    class Main {
        
        public function __construct(){
        }
        // Secure PHP Form Input function
        public function secure_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        // Secure GET id 
        protected function secure_id($id){
            $s_id = ($id * 8371)+1;
            return $s_id;
        }

        // Unsecure GET id
        protected function un_secure_id($id){
            $u_id = $id - 1;
            $u_id = $u_id / 8371;
            return $u_id;
        }
        
        // Gets user IP Address
        public function get_user_ip(){
            $ipaddress = '';
            if (getenv('HTTP_CLIENT_IP'))
                $ipaddress = getenv('HTTP_CLIENT_IP');
            else if(getenv('HTTP_X_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
            else if(getenv('HTTP_X_FORWARDED'))
                $ipaddress = getenv('HTTP_X_FORWARDED');
            else if(getenv('HTTP_FORWARDED_FOR'))
                $ipaddress = getenv('HTTP_FORWARDED_FOR');
            else if(getenv('HTTP_FORWARDED'))
                $ipaddress = getenv('HTTP_FORWARDED');
            else if(getenv('REMOTE_ADDR'))
                $ipaddress = getenv('REMOTE_ADDR');
            else
                $ipaddress = 'UNKNOWN';
         
            return $ipaddress;
        }
        
        // Sets Now DateTime
        
        public function set_now(){
            return date("Y-m-d H:i:s");
        }
        
    }// End of Common Class
?>
