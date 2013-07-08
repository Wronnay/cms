<?php
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
error_reporting(0);
ini_set('session.use_only_cookies', 1);
session_start();
ob_start();
include 'system/inc/lang.php'; // Sprache
if($_SESSION['lang'] == "de")
  {
include 'lang/de/1.php';
include 'lang/forum/de/1.php';
  }
  else
  {
include 'lang/en/1.php';
include 'lang/forum/en/1.php';
  }
include 'system/inc/config.php'; // Datenbankdaten
if (!isset ($DB)) { header("Location: system/install/index.php"); }
mysql_connect($HOST,$USER,$PW)or die(mysql_error());
mysql_select_db($DB)or die(mysql_error());
include 'system/inc/functions.php'; // Funktionen
include 'system/inc/data.php'; // Informationen
include 'system/inc/counter.php'; // Counter
$design = nocss($_GET['design']);
if (isset($design) and !empty($design)) { // Ist ein Design ausgewählt?
$_SESSION["design"] = $design;
}  
$template = nocss($_GET['template']);
if (isset($template) and !empty($template)) {
$site_template = $template;
}  
if (isset($_GET['site'])) { // Wenn eine Site mitgegeben wurde
$site = presql($_GET['site']);
include 'themes/'.$site_template.'/site.php';
}
else { // Wenn keine Unterseite angegeben wurde
if (isset($_GET['type'])) { // Wenn ein Type angegeben ist
$type = presql($_GET['type']);
$type_id = presql($_GET['type_id']);
include 'system/inc/type.php';
}
else { // Wenn kein Type angegeben ist
$site = 'index';
include 'themes/'.$site_template.'/site.php';
}
}

include 'system/inc/menue.php'; // Navigation
include 'themes/'.$site_template.'/template.php'; // Website Struktur

ob_end_flush();
?>
