<?php 
 
    if($_SERVER['REQUEST_METHOD']=='POST'){
 
         //Getting actual file name
         $name = $_FILES['photo']['name'];

         //Getting temporary file name stored in php tmp folder 
         $tmp_name = $_FILES['photo']['tmp_name'];

         //Path to store files on server
         $path = 'images/posts/';

         //checking file available or not 
         if(!empty($name)){
         //Moving file to temporary location to upload path 
         move_uploaded_file($tmp_name,$path.$name);

         //Displaying success message 
         echo "Upload successfully";
         }else{
         //If file not selected displaying a message to choose a file 
         echo "Please choose a file";
         }
     }
?>