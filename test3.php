<?php
 function new_hash($plainText, $salt = 'M42d9h&!.') {
            
            if ($salt === null){
                $salt = substr(md5(uniqid(rand(), true)), 0, 9);
            }else{
                $salt = substr($salt, 0, SALT_LENGTH);
            }

            return $salt . sha1($salt . $plainText);
        }
        
        echo new_hash('matrix');
?>