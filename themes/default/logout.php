<?php
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
$title = ''.l43.' - '.$site_title.'';
include 'system/inc/check.php';
$_SESSION = array();
session_destroy(); 
header("Location: index.php");
?>
