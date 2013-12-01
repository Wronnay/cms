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
<h2><?php echo w34; ?>:</h2>
<?php
include '../inc/menue.php';
  if(isset($_POST['submit']) AND $_POST['submit'] == w8) {
        if(empty($_REQUEST['headername']) || empty($_REQUEST['footername']))
      {
        echo w10;
      }
	  else {
mysql_query("UPDATE ".$PREFIX."_menue SET name = '".presql($_REQUEST['headername'])."' WHERE type = 'header'");
mysql_query("UPDATE ".$PREFIX."_menue SET name = '".presql($_REQUEST['footername'])."' WHERE type = 'footer'");
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
