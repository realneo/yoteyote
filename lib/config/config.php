<?php

    // Environment Settings
    
    $environment = 'localhost'; // localhost or online
    
    $db_host = 'localhost';     // Database Server
    $db_user = 'root';          // Database User
    $db_pass = 'root';          // Database Password
    $db_name = 'yoteyote_db';   // Database Name
    
    if($environment == 'localhost'){
        
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        
        define("DB_HOST", $db_host);
        define("DB_USER", $db_user);
        define("DB_PASS", $db_pass);
        define("DB_NAME", $db_name);
        
    }elseif($environment == 'online'){
        
        define("DB_HOST", $db_host);
        define("DB_USER", $db_user);
        define("DB_PASS", $db_pass);
        define("DB_NAME", $db_name);
        
    }
    
    // Facebook app settings
    $app_id = '1547531755460936';
    $app_secret = '8d66d6e17ace837104273f82566af02f';
    $redirect_uri = 'http://localhost:8888/test2.php';
?>