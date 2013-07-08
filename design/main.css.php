<?php
error_reporting(0);
ob_start();
session_start();
include 'system/inc/lang.php';
include '../system/inc/config.php';
mysql_connect($HOST,$USER,$PW)or die(mysql_error());
mysql_select_db($DB)or die(mysql_error());
include '../system/inc/functions.php';
include '../system/inc/data.php';
$design = $_SESSION["design"];
header(base64_decode('Q29udGVudC10eXBlOiB0ZXh0L2Nzcw=='));
?>
/*
--------------------------------
MAINDESIGN
--------------------------------
Design by Christoph Miksche
Website: http://celzekr.tk
License: Attribution-NonCommercial-ShareAlike 3.0 Unported (CC BY-NC-SA 3.0)

Dieses Werk bzw. Inhalt steht unter einer Creative Commons Namensnennung-Nicht-kommerziell-
Weitergabe unter gleichen Bedingungen 3.0 Unported Lizenz.

Sie duerfen den/die Link/s zu Celzekr.tk nicht entfernen!

(http://creativecommons.org/licenses/by-nc-sa/3.0/)
*/
#made {
  position:fixed;
  bottom:0px;
  background: #ccc;
  font-size: 14px;
  color: #000;
  font-family: liberation, Arial, Verdana, sans-serif;
  text-align : center;
  margin : 0 auto;
  padding: 5px;
  opacity: 0.3;
  z-index:99;
}
#made:hover {opacity: 1.0;}
/* ADMIN-HEADER ------------------------------------------ */
#admin-header {z-index:898; height:30px; width:100%; background:#000; top:0px; position:fixed; opacity:0.8;}
#admin-header nav ul {
  list-style-type: none;
  font-family: liberation;
  margin: 0;
  padding: 0;
  float:right;
}
#admin-header nav ul li {
  display: inline;
  margin: 0;
  padding: 0;
}
#admin-header nav ul li a {
  display: inline-block;
  color: #fff;
font-size: 14px;
  text-decoration: none;
  line-height:20px;
  padding:5px;
font-family : liberation;
opacity: 0.8;
}
 
#admin-header nav ul li.active a {
  color: #fff;
  opacity: 0.8;
}
#admin-header nav ul li a:hover {
opacity: 1.0;
}
.ahlogo {float:left; margin-left:5px; margin-right:5px; opacity:0.8;}
.ahlogo:hover {opacity:1.0;}
.ahlogo img {border: 0px solid #fff; opacity: 1.0;}
<?php
if (isset($design) and !empty($design)) {
include $design;
}  
else {
include $site_design;
}
ob_end_flush();
?>
