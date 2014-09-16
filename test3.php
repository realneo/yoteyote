<?php

    $mail = mail('neo@yoteyote.com', 'Test', 'Test Body', 'From: nadhir2@hotmail.com');
    
    if($mail){
        echo "Email Sent";
    }else{
        echo "Email Failed";
    }

?>