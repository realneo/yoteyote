<?php
    session_start();
    unset($_SESSION['user_id']);
    unset($_SESSION['first_name']);
    unset($_SESSION['last_name']);
    session_destroy();
    header('Location: ../index.php');
?>