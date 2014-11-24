<?php
error_reporting(0);
ini_set('session.use_only_cookies', 1);
session_start();
ob_start();
include '../inc/lang.php'; // Sprache
include '../inc/config.php'; // Datenbankdaten
if($DBTYPE == 'sqlite') {
$dbc = new PDO(''.$DBTYPE.':../db/'.$DB.'.sql.db');
}
elseif($DBTYPE == 'mysql') {
$dbc = new PDO(''.$DBTYPE.':host='.$HOST.';dbname='.$DB.'', ''.$USER.'', ''.$PW.'');
}
include '../inc/functions.php'; // Funktionen
include '../inc/data.php'; // Informationen
include 'inc/check.php';
include 'inc/header.php';
?>
<article>
<h2><?php echo w73; ?>:</h2>
<?php
if(isset($_GET['id'])){
      $dbpre = $dbc->prepare("DELETE FROM ".$PREFIX."_comments WHERE id='".presql($_GET['id'])."'");
	  $dbpre->execute();
	  echo w74;
}
    $sql = "SELECT
	                id,
	                autor_id,
					comment,
					date,
                        name
            FROM
                    ".$PREFIX."_comments
            ORDER BY
                    date DESC
           ";
    $dbpre = $dbc->prepare($sql);
    $dbpre->execute();
		if ($dbpre->rowCount() < 1) {
	    echo '<div class="fehler">'.w75.'</div>';
	}
    while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class=\"comment\"><b>".w76.": ".nocss($row['name'])." ".w77.": ".nocss($row['date'])."</b> <a href=\"comments.php?id=".nocss($row['id'])."\" title=\"".w52."\"><img src=\"../../design/pics/icons/standard/close2r.png\" alt=\"".w52."\" title=\"".w52."\" /></a><br>".nocss($row['comment'])."</div>\n";
    }
?>
</article>
<?php
include 'inc/footer.php';
ob_end_flush();
?>
