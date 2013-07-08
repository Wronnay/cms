<?php
error_reporting(0);
ini_set('session.use_only_cookies', 1);
session_start();
$_SESSION = array();
session_destroy(); 
header("Location: ../../index.php");
?>
