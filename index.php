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
mysql_set_charset('utf8');
include 'system/inc/functions.php'; // Funktionen
$_SESSION['lang'] = presql($_SESSION['lang']);
$_SESSION['lang'] = nocss($_SESSION['lang']);
include 'system/inc/data.php'; // Informationen
if ($VERSION < '0.3') { header("Location: system/update/index.php"); }
include 'system/inc/counter.php'; // Counter
$design = nocss($_GET['design']);
if (isset($design) and !empty($design)) { // Ist ein Design ausgewählt?
$_SESSION["design"] = $design;
}  
$template = nocss($_GET['template']);
if (isset($template) and !empty($template)) {
$site_template = $template;
}  
$sql = "SELECT
            code
        FROM
            ".$PREFIX."_apps
        WHERE
            type = 'general'
		";
$result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
while ($row = mysql_fetch_assoc($result)) {
$allapp = $row['code'];
}
eval ($allapp);
if (isset($_GET['site'])) { // Wenn eine Site mitgegeben wurde
$site = presql($_GET['site']);
$sql = "SELECT
            id,
            name,
            cache
        FROM
            ".$PREFIX."_sites
        WHERE
            lang = '".$_SESSION['lang']."'
        AND
            name = '".$site."'
		";
$result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
while ($row = mysql_fetch_assoc($result)) {
$siteid = nocss($row['id']);
$sitecache = nocss($row['cache']);
$sitecachename = nocss($row['name']);
}
if($sitecache == '1') { include 'system/inc/cache.php'; }
$sql = "SELECT
            code
        FROM
            ".$PREFIX."_apps
        WHERE
            type_id = '".$siteid."'
        AND
            type = 'site'
		";
$result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
while ($row = mysql_fetch_assoc($result)) {
$app = $row['code'];
}
eval ($app);
include 'themes/'.$site_template.'/site.php';
}
else { // Wenn keine Unterseite angegeben wurde
if (isset($_GET['type'])) { // Wenn ein Type angegeben ist
$type = presql($_GET['type']);
$type_id = presql($_GET['type_id']);
$sql = "SELECT
            code
        FROM
            ".$PREFIX."_apps
        WHERE
            type_id = '".$type_id."'
        AND
            type = '$type'
		";
$result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
while ($row = mysql_fetch_assoc($result)) {
$app = $row['code'];
}
eval ($app);
include 'system/inc/type.php';
}
else { // Wenn kein Type angegeben ist
$site = 'index';
$sql = "SELECT
            id
        FROM
            ".$PREFIX."_sites
        WHERE
            lang = '".$_SESSION['lang']."'
        AND
            name = '".$site."'
		";
$result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
while ($row = mysql_fetch_assoc($result)) {
$siteid = nocss($row['id']);
}
$sql = "SELECT
            code
        FROM
            ".$PREFIX."_apps
        WHERE
            type_id = '".$siteid."'
        AND
            type = 'site'
		";
$result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
while ($row = mysql_fetch_assoc($result)) {
$app = $row['code'];
}
eval ($app);
include 'themes/'.$site_template.'/site.php';
}
}

include 'system/inc/menue.php'; // Navigation
include 'themes/'.$site_template.'/template.php'; // Website Struktur

if($sitecache == '1') {
$content = ob_get_clean();
$fh = fopen("system/cache/".$_SESSION['lang']."/".$sitecachename.".html","w");
fputs($fh, $content);
fclose($fh);
echo $content;
}

ob_end_flush();
?>
