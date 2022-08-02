<?php 

    session_start();

    if (!isset($_SESSION['admin_login']) OR !isset($_SESSION['user_login'])) {
        header('location: ../index.php');
    } else if (isset($_SESSION['admin_login'])) {
        unset($_SESSION['admin_login']);
    } else if (isset($_SESSION['user_login'])) {
        unset($_SESSION['user_login']);
    }

    session_destroy();
    header('location: ../index.php');
    
?>
