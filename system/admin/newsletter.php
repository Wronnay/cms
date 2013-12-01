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
<h2><?php echo w131; ?>:</h2>
<?php 
  if(isset($_POST['submit']) AND $_POST['submit'] == w134) {
        if(empty($_REQUEST['receiver']) || empty($_REQUEST['title']) || empty($_REQUEST['text']))
      {
        echo w41;
      }
	  else {
		  if($_REQUEST['receiver'] == 'act') {
	    $sql1 = "SELECT
            email,
            act
        FROM
            ".$PREFIX."_user
        WHERE
		    act = 'yes'
		";
    $result1 = mysql_query($sql1) OR die("<pre>\n".$sql1."</pre>\n".mysql_error());
    while ($row1 = mysql_fetch_assoc($result1)) {
$empfaenger = nocss($row1['email']);
$betreff = nocss($_REQUEST['title']);
$from = "From: ".$site_title." ".$site_email."\n";
$from .= "Content-Type: text/html; charset=".$CHARSET."\n";
$text = $_REQUEST['text'];

mail($empfaenger, $betreff, $text, $from);
    }
echo '<div class="erfolg">'.w138.'</div>';	
	  }
	  else {

	    $sql1 = "SELECT
            email
        FROM
            ".$PREFIX."_user
		";
    $result1 = mysql_query($sql1) OR die("<pre>\n".$sql1."</pre>\n".mysql_error());
    while ($row1 = mysql_fetch_assoc($result1)) {
$empfaenger = nocss($row1['email']);
$betreff = nocss($_REQUEST['title']);
$from = "From: ".$site_title." ".$site_email."\n";
$from .= "Content-Type: text/html\n";
$text = nocss($_REQUEST['text']);

mail($empfaenger, $betreff, $text, $from);
    }
echo '<div class="erfolg">'.w138.'</div>';		  
		  }
  }
  }
?>
<form action="newsletter.php" method="post">
	  <table>
      <tr><td><?php echo w135; ?>: </td><td><select name="receiver">
<option value="act"><?php echo w136; ?></option>
<option value="all"><?php echo w137; ?></option>
</select></td></tr>
	  <tr><td><?php echo w12; ?>: </td><td><input type="text" class="li" name="title" value="" size="50"></td></tr>
      <tr><td><?php echo w16; ?>: </td><td>
      <textarea id="nachricht" class="ckeditor" name="text" cols="55" rows="15"></textarea></td></tr>
	  </table>
      <input class="lb" name="submit" type="submit" value="<?php echo w134; ?>">
      </form>
</article>
<?php
include 'inc/footer.php';
ob_end_flush();
?>
