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
include '../inc/lang.php'; // Sprache
include '../inc/config.php'; // Datenbankdaten
if($DBTYPE == 'sqlite') { $dbc = new PDO(''.$DBTYPE.':../db/'.$DB.'.sql.db'); }
elseif($DBTYPE == 'mysql') { $dbc = new PDO(''.$DBTYPE.':host='.$HOST.';dbname='.$DB.'', ''.$USER.'', ''.$PW.''); }
include '../inc/functions.php'; // Funktionen
include '../inc/data.php'; // Informationen
include 'inc/check.php';
include 'inc/header.php';
?>
<article>
<h2><?php echo w34; ?>:</h2>
<?php
include '../inc/menue.php';
  if(isset($_POST['submit']) AND $_POST['submit'] == w8) {
        if(empty($_REQUEST['headername']) || empty($_REQUEST['footername']))
      {
        echo w10;
      }
	  else {
$dbpre = $dbc->prepare("UPDATE ".$PREFIX."_menue SET name = '".presql($_REQUEST['headername'])."' WHERE type = 'header'");
$dbpre->execute();
$dbpre = $dbc->prepare("UPDATE ".$PREFIX."_menue SET name = '".presql($_REQUEST['footername'])."' WHERE type = 'footer'");
$dbpre->execute();	  
	  echo w107;
	  }
  }
?>
<form action="menue.php" method="post">
<table>
<tr><td><?php echo w5; ?>: </td><td>header</td></tr>
<tr><td><?php echo w4; ?>: </td><td><input type="text" name="headername" value="<?php echo $menue_header_name; ?>"></td></tr>
<tr><td><?php echo w5; ?>: </td><td>footer</td></tr>
<tr><td><?php echo w4; ?>: </td><td><input type="text" name="footername" value="<?php echo $menue_footer_name; ?>"></td></tr>
</table>
<input name="submit" type="submit" value="<?php echo w8; ?>"><br>
</form>
</article>
<?php
include 'inc/footer.php';
ob_end_flush();
?>
