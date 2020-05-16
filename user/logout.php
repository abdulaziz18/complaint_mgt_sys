<?php 
session_start();
session_destroy();
$_SESSION['admin_logged_in'] = null;
$_SESSION['user_logged_in'] = null;

header('location:../index.php');



?>