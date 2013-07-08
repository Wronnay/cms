<?php
error_reporting(0);
ob_start();
@session_start();
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: Attribution-NonCommercial-ShareAlike 3.0 Unported (CC BY-NC-SA 3.0)
*/
include 'system/inc/config.php';
mysql_connect($HOST,$USER,$PW)or die(mysql_error());
mysql_select_db($DB)or die(mysql_error());
include 'system/inc/functions.php';
include 'system/inc/lang.php';
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
include 'system/inc/data.php';
if ($site_referrer == 'yes') {
?>
<!DOCTYPE HTML>
<html>
<head>
<title><?php echo l83; ?> <?php echo nocss($_SERVER['QUERY_STRING']); ?></title>
<link rel="stylesheet" type="text/css" href="design/css/referrer.css"><meta charset="UTF-8">
<META HTTP-EQUIV="refresh" CONTENT="5; URL=<?php echo nocss($_SERVER['QUERY_STRING']); ?>">
</head>
<body>
<p class="text"><?php echo l84; ?> <A HREF="<?php echo nocss($_SERVER['QUERY_STRING']); ?>"><?php echo nocss($_SERVER['QUERY_STRING']); ?></A> <?php echo l85; ?></p>
<p>
<!--Den Link nicht entfernen!-->
<a href="http://cms.wronnay.net" target="_blank">CMS by WronnayScripts</a>
<!--Den Link nicht entfernen! end-->
</p>
</body>
</html>
<?php
}
else {header("Location: ". nocss($_SERVER['QUERY_STRING']));}
ob_end_flush();
?>
