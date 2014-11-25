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
if(!$CODE == '1')
{
	    header("Location: index.php");
		exit;
}
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
    $dbpre = $dbc->prepare($sql1);
    $dbpre->execute();
    while ($row1 = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$empfaenger = nocss($row1['email']);
$betreff = nocss($_REQUEST['title']);
$from = "From: ".$site_email."\n";
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
    $dbpre = $dbc->prepare($sql1);
    $dbpre->execute();
    while ($row1 = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$empfaenger = nocss($row1['email']);
$betreff = nocss($_REQUEST['title']);
$from = "From: ".$site_email."\n";
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
