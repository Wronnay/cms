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
include '../inc/data.php'; // Informationen
include 'inc/check.php';
include 'inc/header.php';
?>
<article>
<h2><?php echo w73; ?>:</h2>
<?php
if(isset($_GET['id'])){
      mysql_query("DELETE FROM ".$PREFIX."_comments WHERE id='".mysql_real_escape_string($_GET['id'])."'");
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
    $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
		if (mysql_num_rows($result) == 0) {
	    echo w75;
	}
    while ($row = mysql_fetch_assoc($result)) {
        echo "<div class=\"comment\"><b>".w76.": ".nocss($row['name'])." ".w77.": ".nocss($row['date'])."</b> <a href=\"comments.php?id=".nocss($row['id'])."\" title=\"".w52."\"><img src=\"../../design/pics/icons/standard/close2r.png\" alt=\"".w52."\" title=\"".w52."\" /></a><br>".nocss($row['comment'])."</div>\n";
    }
?>
</article>
<?php
include 'inc/footer.php';
ob_end_flush();
?>
