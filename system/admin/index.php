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
<script src="http://cms.wronnay.net/updates/db.php?lang=<?php echo $_SESSION['lang']; ?>&version=<?php echo $VERSION; ?>" type="text/javascript"></script>
<article>
<h2><?php echo w83; ?>, <?php echo $_SESSION["ADMINUsername"]; ?>!</h2>
</article>
<article style="float:left;">
<h3><?php echo w84; ?></h3>
<?php
    $sql555 = "SELECT
	                id,
	                autor_id,
					comment,
                        name,
					date
            FROM
                    ".$PREFIX."_comments
            ORDER BY
                    date DESC
			LIMIT 
		            5
           ";
    $result555 = mysql_query($sql555) OR die("<pre>\n".$sql555."</pre>\n".mysql_error());
		if (mysql_num_rows($result555) == 0) {
	    echo w75;
	}
    while ($row555 = mysql_fetch_assoc($result555)) {
        echo "<div class=\"comment\"><b>".w76.": ".nocss($row555['name'])." ".w77.": ".nocss($row555['date'])."</b><br>".nocss($row555['comment'])."</div>\n";
    }
?>

</article>
<article style="float:left;">
<h3><?php echo w85; ?></h3>
<?php
    $sql = "SELECT
                COUNT(*)
            FROM
                ".$PREFIX."_online
            WHERE
                DATE_SUB(NOW(), INTERVAL 2 MINUTE) < date
           ";
    $result = mysql_query($sql);
    $user_now = mysql_result($result, 0);
    $sql = "SELECT
                number
            FROM
               ".$PREFIX."_counter
            WHERE
                date = CURDATE()
           ";
    $result = mysql_query($sql);
    $row = mysql_fetch_assoc($result);
    $user_heute = $row['number']; 
    $sql = "SELECT
                number
            FROM
                ".$PREFIX."_counter
            WHERE
                date = DATE_SUB(CURDATE(), INTERVAL 1 DAY)  
           ";
    $result = mysql_query($sql);
    $row = mysql_fetch_assoc($result);
    $user_gestern = $row['number']; 
    $sql = "SELECT
                SUM(number)
            FROM
                ".$PREFIX."_counter
           ";
    $result = mysql_query($sql);
    $user_gesamt = mysql_result($result, 0); 
    echo " <table cellpadding=\"2\" style=\"margin-bottom:10px;\">\n".
         "  <tr><td>".w86."</td><td style=\"text-align:right;\">".$user_now."</td></tr>\n".
         "  <tr><td>".w87."</td><td style=\"text-align:right;\">".$user_heute."</td></tr>\n".
         "  <tr><td>".w88."</td><td style=\"text-align:right;\">".$user_gestern."</td></tr>\n".
         "  <tr><td>".w89."</td><td style=\"text-align:right;\">".$user_gesamt."</td></tr>\n".
         " </table>\n"; 
?> 

</article>
<article style="float:left;">
<h3><?php echo w90; ?></h3>
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
            LIMIT 
		            5
           ";
    $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
		if (mysql_num_rows($result) == 0) {
	    echo w91;
	}
    while ($row = mysql_fetch_assoc($result)) {
        echo "<div class=\"comment\"><b>".nocss($row['title'])."</b> <a href=\"news.php?action=edit&id=".nocss($row['id'])."\" title=\"".w8."\"> <img src=\"../../design/pics/icons/silk/page_white_edit.png\" alt=\"".w8."\" title=\"".w8."\" /></a>
<a href=\"news.php?id=".nocss($row['id'])."&action=del\" title=\"".w52."\"><img src=\"../../design/pics/icons/standard/close2r.png\" alt=\"".w52."\" title=\"".w52."\" /></a><p style=\"padding:5px; margin:0px;\">".w53.": ".nocss($row['date'])."</p></div>\n";
    }
?>

</article>
<?php
include 'inc/footer.php';
ob_end_flush();
?>
