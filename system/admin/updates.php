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
<script src="http://cms.wronnay.net/updates/index.php?lang=<?php echo $_SESSION['lang']; ?>&version=<?php echo $VERSION; ?>" type="text/javascript"></script>
</article>
<?php
include 'inc/footer.php';
ob_end_flush();
?>
