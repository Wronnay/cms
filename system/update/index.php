<?php
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
header('content-type: text/html; charset=UTF-8');
error_reporting(0);
ob_start();
ini_set("session.gc_maxlifetime", 2000);
$default_lang = 'en';
if(!isset($_SESSION['lang']))
{
    if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
    {
      $_SESSION['lang'] = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
    }
	else
    {
	$_SESSION['lang'] = 'en';
    }
}
if(isset($_GET['lang']))
{
    $_SESSION['lang'] = $_GET['lang'];
}
if($_SESSION['lang'] == "de")
  {
include '../../lang/forum/de/1.php';
include '../../lang/de/1.php';
  }
  else
  {
include '../../lang/forum/en/1.php';
include '../../lang/en/1.php';
  }
?>
<!DOCTYPE HTML>
<html>
 <head>
 <title>Update | WronnayCMS</title>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="../../design/css/install.css">
 </head>
 <body>
 <div id="logo"><img src="../../design/pics/system/logo.png" alt=""></div>
 <div id="seite">
<div class="title">WronnayCMS - Update:</div>
<?php
switch($_GET["update"]){
  case "":
?>
<div class="title2">(<?php echo l278; ?> 1 / 1)</div>
	  <form action="?update=1-2" method="post">
	<p><?php echo w143; ?></p>
	  <input type="submit" value="<?php echo w144; ?>">
	  </form>
<?php
  break;
  case "1-2":
include("../inc/config.php");
if($DBTYPE == 'sqlite') {
$dbc = new PDO(''.$DBTYPE.':../db/'.$DB.'.sql.db');
}
elseif($DBTYPE == 'mysql') {
$dbc = new PDO(''.$DBTYPE.':host='.$HOST.';dbname='.$DB.'', ''.$USER.'', ''.$PW.'');
}
include '../inc/functions.php'; // Funktionen
include '../inc/data.php'; // Informationen
if ($VERSION < '0.2') {
# MySQL - Update - 0.1 zu 0.2
$dbpre = $dbc->prepare("INSERT INTO ".$PREFIX."_data (id, name, url, text, date, active) VALUES ('29', 'version', 'none', '0.2', now(), '0') ON DUPLICATE KEY UPDATE text = '0.2'");
$dbpre->execute();
$dbpre = $dbc->prepare("INSERT INTO ".$PREFIX."_designs (id, name, url, pic, date) VALUES
(2, 'green_black', 'css/green_black.css.php', 'green_black.png', ''),
(3, 'Simple-SkyBlue', 'css/Simple-SkyBlue.css.php', 'Simple-SkyBlue.png', ''),
(4, 'Bootstrap_starter', 'css/Bootstrap_starter.css.php', 'Bootstrap_starter.png', '')");
$dbpre->execute();
$dbpre = $dbc->prepare("INSERT INTO ".$PREFIX."_templates (id, name, type, code, date, lang) VALUES
(4, 'green_black', 'meta', '', '', ''),
(5, 'green_black', 'header', '</div><!--navi--><div class=\"l\"><p>Main:</p>#header_nav', '', ''),
(6, 'green_black', 'footer', '<p>Second:</p>#footer_nav</div><!--navi end-->', '', ''),
(7, 'Simple-SkyBlue', 'meta', '', '', ''),
(8, 'Simple-SkyBlue', 'header', '<!--navi--><div class=\"navi\">#header_nav', '', ''),
(9, 'Simple-SkyBlue', 'footer', '#footer_nav<!--Den Link nicht entfernen!--><img src=\"themes/Simple-SkyBlue/images/trennstrich.png\" alt=\"\"><a href=\"http://celzekr.webpage4.me\">Designed by celzekr</a><!--Den Link nicht entfernen! end--></div><!--navi end-->', '', ''),
(10, 'Bootstrap_starter', 'meta', '', '', ''),
(11, 'Bootstrap_starter', 'header', '#header_nav', '', ''),
(12, 'Bootstrap_starter', 'footer', '#footer_nav', '', '')");
$dbpre->execute();
$dbpre = $dbc->prepare("INSERT INTO ".$PREFIX."_links (id, name, url, menue_id, lang) VALUES
(1, 'Startseite', '?site=index', '1', 'de'),
(2, 'Home', '?site=index', '1', 'en')");
$dbpre->execute();
$dbpre = $dbc->prepare("INSERT INTO ".$PREFIX."_sites (id, autor_id, name, title, text, date, description, tags, pic, lang) VALUES
(1, 1, 'index', 'Startseite', '<h2>Hallo.</h2><p>Dies ist die Startseite Ihrer Webseite.</p>', '', 'Die Startseite Ihrer Webseite.', 'startseite, webseite', '', 'de'),
(2, 1, 'index', 'Home', '<h2>Hello.</h2><p>This is your new Homepage.</p>', '', 'This is your new Homepage.', 'homepage, home, page', '', 'en')");
$dbpre->execute();
header("Location: ../../index.php");
}
elseif ($VERSION < '0.3') {
# MySQL - Update - 0.2 zu 0.3
$dbpre = $dbc->prepare("ALTER TABLE ".$PREFIX."_sites ADD cache INT(2);");
$dbpre->execute();
$dbpre = $dbc->prepare("UPDATE ".$PREFIX."_data SET text = '0.3' WHERE id = '29'");
$dbpre->execute();
header("Location: ../../index.php"); 	
}
elseif ($VERSION < '0.4') {
# MySQL - Update - 0.3 zu 0.4
$dbpre = $dbc->prepare("INSERT INTO ".$PREFIX."_data (name, url, text, date, active) VALUES ('senddata', 'none', '0', now(), '0')");
$dbpre->execute();
$dbpre = $dbc->prepare("UPDATE ".$PREFIX."_data SET text = '0.4' WHERE id = '29'");
$dbpre->execute();
header("Location: ../../index.php"); 	
}
elseif ($VERSION < '1.0') {
# MySQL - Update - 0.4 zu 1.0
$dbpre = $dbc->prepare("UPDATE ".$PREFIX."_data SET text = '1.0' WHERE id = '29'");
$dbpre->execute();
$dbpre = $dbc->prepare("INSERT INTO ".$PREFIX."_sites (autor_id, name, title, text, date, description, tags, pic, lang) VALUES
(1, 'error', 'Error', '<h2>Hey.</h2><p>Something went wrong.</p>', '', 'Something went wrong.', 'error', '', 'en'),
(1, 'error', 'Error', '<h2>Hallo.</h2><p>Etwas ist schief gelaufen.</p>', '', 'Etwas ist schief gelaufen.', 'error', '', 'de')");
$dbpre->execute();
$dbpre = $dbc->prepare("INSERT INTO ".$PREFIX."_templates (name, type, code, date, lang) VALUES
('ampersand', 'meta', '', '', ''),
('ampersand', 'header', '#header_nav', '', ''),
('ampersand', 'footer', '#footer_nav', '', '')");
$dbpre->execute();
$dbpre = $dbc->prepare("INSERT INTO ".$PREFIX."_designs (name, url, pic, date) VALUES
('ampersand', 'css/ampersand.css', 'ampersand.png', '')");
$dbpre->execute();
header("Location: ../../index.php"); 
}
else {
header("Location: ../../index.php"); 	
}
  break;
 case "2":
?>
<div class="title2">(<?php echo l278; ?> 2 / 2)</div><br>

<?php
  break;
}
?>
 </div>
 <div id="footer">
<div class="text">&copy; <a href="http://scripts.wronnay.net">Scripts.Wronnay.net</a><br><br>
 </div></div>
 </body>
</html>
<?php
ob_end_flush();
?>
