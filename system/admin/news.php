<?php
error_reporting(0);
ini_set('session.use_only_cookies', 1);
session_start();
ob_start();
include '../inc/lang.php'; // Sprache
include '../inc/config.php'; // Datenbankdaten
mysql_connect($HOST,$USER,$PW)or die(mysql_error());
mysql_select_db($DB)or die(mysql_error());
include '../inc/functions.php'; // Funktionen
$_SESSION['lang'] = presql($_SESSION['lang']);
$_SESSION['lang'] = nocss($_SESSION['lang']);
include '../inc/data.php'; // Informationen
include 'inc/check.php';
include 'inc/header.php';
?>
<article>
 <?php
switch($_GET["action"]){
  case "":
?>
<h2><?php echo w35; ?>:</h2>
<div style="float:left; margin:10px; padding:10px;"><a href="news.php?action=new"><?php echo w50; ?></a></div>
<?php
    $sql = "SELECT
	                id,
	                autor_id,
					title,
					date
            FROM
                    ".$PREFIX."_news
            ORDER BY
                    date DESC
           ";
    $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
		if (mysql_num_rows($result) == 0) {
	    echo w108;
	}
    while ($row = mysql_fetch_assoc($result)) {
        echo "<div class=\"comment\"><b>".nocss($row['title'])."</b> <a href=\"news.php?action=edit&id=".nocss($row['id'])."\" title=\"".w8."\"> <img src=\"../../design/pics/icons/silk/page_white_edit.png\" alt=\"".w8."\" title=\"".w8."\" /></a>
<a href=\"news.php?id=".nocss($row['id'])."&action=del\" title=\"".w52."\"><img src=\"../../design/pics/icons/standard/close2r.png\" alt=\"".w52."\" title=\"".w52."\" /></a><p style=\"padding:5px; margin:0px;\">".w53.": ".nocss($row['date'])."</p></div>\n";
    }
?>
<?php
  break;
  case "new":
include 'inc/newnews.php';
  break;
  case "del":
if(isset($_GET['id'])){
      mysql_query("DELETE FROM ".$PREFIX."_news WHERE id='".presql($_GET['id'])."'");
	  echo w109;
}
  break;
  case "edit":
include 'inc/editnews.php';
  break;
}
?>
</article>
<?php
include 'inc/footer.php';
ob_end_flush();
?>
