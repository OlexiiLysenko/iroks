<?php 
require "db_rb.php";
unset($_SESSION['logged_user']);
$_SESSION['auth'] = "NO";
session_destroy();
header('Location: /index.php');
?>

