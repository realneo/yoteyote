<?php
session_start();
/*
PekeUpload
Copyright (c) 2013 Pedro Molina
*/

// Define a destination
$targetFolder = "../images/posts/"; // Relative to the root


if (!empty($_FILES)) {
	$tempFile = $_FILES['file']['tmp_name'];
	$targetPath = dirname(__FILE__) . '/' . $targetFolder;
        
        $path = $_FILES['file']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        
        $target_file_name = time().$_SESSION['user_id'].'.'.$ext;
        
	$targetFile = rtrim($targetPath,'/') . '/' . $target_file_name;
	
	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
	$fileParts = pathinfo($_FILES['file']['name']);
	
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
		echo '1';
                $_SESSION['pic_name'] = $target_file_name;
	} else {
		echo 'Invalid file type.';
	}
}
?>