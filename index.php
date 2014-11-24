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
if($lang == "de")
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
$GLOBALS['PREFIX'] = $PREFIX;
$GLOBALS['CHARSET'] = $CHARSET;
if (!isset ($DB)) { header("Location: system/install/index.php"); }
if($DBTYPE == 'sqlite') { $dbc = new PDO(''.$DBTYPE.':system/db/'.$DB.'.sql.db'); }
elseif($DBTYPE == 'mysql') { $dbc = new PDO(''.$DBTYPE.':host='.$HOST.';dbname='.$DB.'', ''.$USER.'', ''.$PW.''); }
include 'system/inc/functions.php'; // Funktionen
include 'system/inc/data.php'; // Informationen
if ($VERSION < '1.0') { header("Location: system/update/index.php"); }
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
$dbpre = $dbc->prepare($sql);
$dbpre->execute();
while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
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
            lang = '".$lang."'
        AND
            name = '".$site."'
		";
$dbpre = $dbc->prepare($sql);
$dbpre->execute();
while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
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
$dbpre = $dbc->prepare($sql);
$dbpre->execute();
while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
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
$dbpre = $dbc->prepare($sql);
$dbpre->execute();
while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
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
            lang = '".$lang."'
        AND
            name = '".$site."'
		";
$dbpre = $dbc->prepare($sql);
$dbpre->execute();
while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
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
$dbpre = $dbc->prepare($sql);
$dbpre->execute();
while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
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
$fh = fopen("system/cache/".$lang."/".$sitecachename.".html","w");
fputs($fh, $content);
fclose($fh);
echo $content;
}

ob_end_flush();
?>
