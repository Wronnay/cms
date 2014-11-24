<?php
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
<h2><?php echo w38; ?>:</h2>
	<p>
<?php   
   $query1 = "SELECT id, title, date FROM ".$PREFIX."_topics ORDER BY date DESC"; 
   $dbpre = $dbc->prepare($query1);
   $dbpre->execute();
   if($result1) {
   echo '<table class="maintable">
   		 <tr>
    	 <td width="50px"><strong>ID</strong></td>
    	 <td width="300px"><strong>'.l247.'</strong></td>
    	 <td width="50px"><span class="false">'.l62.'</span></td>
   		 </tr>
   		 </table>';
   while($row1 = $dbpre->fetch(PDO::FETCH_ASSOC)) {
   echo '<table class="maintable">
   		 <tr>
    	 <td width="50px"><strong>' . nocss($row1['id']) . '</strong></td>
    	 <td width="300px"><span class="blue">' . nocss($row1['title']) . '</span></td>
    	 <td width="50px"><a href="topics.php?id=' . nocss($row1['id']) . '"><img src="../../design/pics/icons/standard/close2r.png" border="0" title="'.l62.'" /></a></td>
   		 </tr>';
}
	echo '</table>';	
	} 
	else {   
	echo l248;
	}
?>
</p>
<?php
    if (is_numeric($_GET['id'])) {
?>
<div class="title"><?php echo l249; ?>:</div>
<p>
<?php	
    $user_id = presql($_GET['id']);
    $query = "DELETE FROM ".$PREFIX."_topics WHERE id = '" . $user_id . "'";
    $dbpre = $dbc->prepare($query);
    $dbpre->execute(); 
    if($dbpre) {
    echo l250;
	}else{
    echo l251;
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
