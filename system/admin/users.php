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
<h2><?php echo w39; ?>:</h2>
	<p>
<?php   
   $query1 = "SELECT id, username FROM ".$PREFIX."_user"; 
   $result1 = mysql_query($query1);

   if($result1) {
   echo '<table class="maintable">
   		 <tr>
    	 <td width="50px"><strong>ID</strong></td>
    	 <td width="300px"><strong>'.l253.'</strong></td>
    	 <td width="50px"><span class="false">'.l62.'</span></td>
   		 </tr>
   		 </table>';

   while($row1 = mysql_fetch_array($result1)) {
   echo '<table class="maintable">
   		 <tr>
    	 <td width="50px"><strong>' . nocss($row1['id']) . '</strong></td>
    	 <td width="300px"><span class="blue">' . nocss($row1['username']) . '</span></td>
    	 <td width="50px"><a href="users.php?user_id=' . nocss($row1['id']) . '"><img src="../../design/pics/icons/standard/close2r.png" border="0" title="'.l62.'" /></a></td>
   		 </tr>';
}
	echo '</table>';	
	} 
	
	else {   
	echo l254;
	}
?>
</p>
<?php
    if (is_numeric($_GET['user_id'])) {
?>
<div class="title"><?php echo l255; ?>:</div>
<p>
<?php	
    $user_id = presql($_GET['user_id']);
     
    $query = "DELETE FROM ".$PREFIX."_user WHERE id = '" . $user_id . "'";
    $result = mysql_query($query);
     
    if($result) {
	
    echo l256;
    
	}else{
	
    echo l257;
    }
?>
</p>
<?php
}
?>
</article>
<?php
include 'inc/footer.php';
ob_end_flush();
?>
