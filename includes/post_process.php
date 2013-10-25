<?php
   include ("../lib/Main.php");
   $main = new Main;
   $main->initSession();
   $post = $main->load_model('Post');
   $post->insertPost($_POST); 
    
            
?>