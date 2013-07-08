<?php
error_reporting(0);
ini_set('session.use_only_cookies', 1);
session_start();
ob_start();
include '../inc/lang.php'; // Sprache
if($_SESSION['lang'] == "de")
  {
include '../../lang/de/1.php';
include '../../lang/forum/de/1.php';
  }
  else
  {
include '../../lang/en/1.php';
include '../../lang/forum/en/1.php';
  }
include '../inc/config.php'; // Datenbankdaten
mysql_connect($HOST,$USER,$PW)or die(mysql_error());
mysql_select_db($DB)or die(mysql_error());
include '../inc/functions.php'; // Funktionen
include '../inc/data.php'; // Informationen
?>
<!DOCTYPE HTML>
<!--
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
-->
<html><head><title><?php echo w101; ?></title>
<meta name="description" content="<?php echo w102; ?>">
<meta name="keywords" content="<?php echo w103; ?>">
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../../design/css/login.css">
</head><body>
<div id="distance"></div>
<div id="container"> 
<div class="logo"><a href="http://cms.wronnay.net" target="_blank"><img alt="" src="../../design/pics/system/logo.png"></a></div>
 <article>
<?php
if (isset($_POST['submit'])) {
        $sql22 = "SELECT
                        id,
			username
                FROM
                        ".$PREFIX."_user
                WHERE
                        username = '".presql(trim($_POST['Username']))."'
				AND
                        password = '".md5(trim($_POST['Password']))."'
				AND
		        rang = 'Admin'
               ";
        $result22 = mysql_query($sql22) OR die("<pre>\n".$sql22."</pre>\n".mysql_error());
        $row22 = mysql_fetch_assoc($result22);
		if (mysql_num_rows($result22)==1){
			$_SESSION["ADMINid"] = $row22['id'];
                        $_SESSION["id"] = $row22['id'];
                        $_SESSION["ADMINUsername"] = $row22['username'];
			header("Location: index.php");
		}
        else{
        echo 'false';
        }
}
else {
?>
	  <form action="login.php" method="post">
	  <table>
	  <tr><td><?php echo w104; ?></td><td><input type="text" name="Username"></td></tr>
	  <tr><td><?php echo w105; ?></td><td><input type="password" name="Password"></td></tr>
          <tr><td></td><td><input type="submit" name="submit" value="<?php echo w106; ?>"></td></tr>
	  </table>
	  </form>
<?php
}
?>
 </article>
</div>
 </body>
</html>
<?php
ob_end_flush();
?>
