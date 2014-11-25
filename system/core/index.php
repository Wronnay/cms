<?php
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
include 'system/inc/lang.php'; // Sprache
if($lang == "de") {
	include 'lang/de/1.php';
	include 'lang/forum/de/1.php';
}
else {
	include 'lang/en/1.php';
	include 'lang/forum/en/1.php';
}
include 'system/inc/config.php'; // Datenbankdaten
$GLOBALS['PREFIX'] = $PREFIX;
$GLOBALS['CHARSET'] = $CHARSET;
if (!isset ($DB)) { header("Location: system/install/index.php"); }
if($DBTYPE == 'sqlite') { $dbc = new PDO(''.$DBTYPE.':system/db/'.$DB.'.sql.db'); }
elseif($DBTYPE == 'mysql') { $dbc = new PDO(''.$DBTYPE.':host='.$HOST.';dbname='.$DB.'', ''.$USER.'', ''.$PW.''); }
$GLOBALS['dbc'] = $dbc;
include 'system/inc/functions.php'; // Funktionen
include 'system/inc/data.php'; // Informationen
if ($VERSION < $THVERS) { header("Location: system/update/index.php"); }
include 'system/inc/counter.php'; // Counter
$design = nocss($_GET['design']);
if (isset($design) and !empty($design)) { // Ist ein Design ausgewählt?
	$_SESSION["design"] = $design;
}  
$template = nocss($_GET['template']);
if (isset($template) and !empty($template)) {
	$site_template = $template;
}  
?>
