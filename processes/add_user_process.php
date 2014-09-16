<?php
    require_once('lib/config/autoload.php');

    $users = new Users($db);
    
    $user = $users->add_user('mussa@yoteyote.com', 'mussa@yoteyote.com', 'Mussa', 'Bahayan');

    
    echo "<pre>";
    var_dump($user);
    echo "</pre>"; 
    
    echo dirname(__FILE__);
?>