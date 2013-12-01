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
<h2><?php echo w92; ?>:</h2>
<?php
include '../inc/menue.php';
if(isset($_GET['id'])){
      mysql_query("DELETE FROM ".$PREFIX."_links WHERE id='".mysql_real_escape_string($_GET['id'])."'");
	  echo w93;
}
    $sql = "SELECT
	                id,
	                name,
                        url,
                        menue_id
            FROM
                    ".$PREFIX."_links
            ORDER BY
                    id
           ";
    $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
		if (mysql_num_rows($result) == 0) {
	    echo w94;
	}
    while ($row = mysql_fetch_assoc($result)) {
        echo "<div class=\"comment\"><b>".nocss($row['name'])."</b> ".w95.": ".nocss($row['url'])." <a href=\"links.php?id=".nocss($row['id'])."\" title=\"".w52."\"><img src=\"../../design/pics/icons/standard/close2r.png\" alt=\"".w52."\" title=\"".w52."\" /></a></div>\n";
    }
?>
</article>
<article>
<h2><?php echo w96; ?>:</h2>
<?php
  if(isset($_POST['submit']) AND $_POST['submit'] == w100) {
        if(empty($_REQUEST['name']) || empty($_REQUEST['url']))
      {
        echo w97;
      }
	  elseif(isset($_POST['email']) && $_POST['email']) {
	  echo "<div class=\"fehler\">You are an SPAM-Bot!</div>";
	  }
	  else {
	  $bodynachricht = parse_bbcode(mysql_real_escape_string($_REQUEST['comment']));
	  mysql_query("INSERT INTO ".$PREFIX."_links (name, url, menue_id, lang) VALUES ('".mysql_real_escape_string($_REQUEST['name'])."','".mysql_real_escape_string($_REQUEST['url'])."','".mysql_real_escape_string($_REQUEST['menue'])."','".presql($_SESSION['lang'])."')");
	  echo w98;
	  }
  }
?>
<br><form action="links.php" method="post">
<p class="hallo">
  <input id="email" name="email" size="60" value="" />
</p>
<?php echo w4; ?>: <input style="width:70%;" type="text" name="name"><br>
<?php echo w95; ?>: <input style="width:70%;" type="text" name="url"><br>
<?php echo w99; ?>: <select style="width:70%;" name="menue">
<option value="<?php echo $menue_header_id; ?>"><?php echo $menue_header_name; ?></option>
<option value="<?php echo $menue_footer_id; ?>"><?php echo $menue_footer_name; ?></option>
</select><br>
<input name="submit" type="submit" value="<?php echo w100; ?>"><br>
</form>
</article>
<?php
include 'inc/footer.php';
ob_end_flush();
?>
