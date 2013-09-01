<?php
header('content-type: text/html; charset=UTF-8');
error_reporting(0);
ob_start();
ini_set("session.gc_maxlifetime", 2000);
$default_lang = 'en';
if(!isset($_SESSION['lang']))
{
    if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
    {
      $_SESSION['lang'] = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
    }
	else
    {
	$_SESSION['lang'] = 'en';
    }
}
if(isset($_GET['lang']))
{
    $_SESSION['lang'] = $_GET['lang'];
}
if($_SESSION['lang'] == "de")
  {
include '../../lang/forum/de/1.php';
  }
  else
  {
include '../../lang/forum/en/1.php';
  }
?>
<!DOCTYPE HTML>
<html>
 <head>
 <title><?php echo l277; ?> | WronnayCMS</title>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="../../design/css/install.css">
 </head>
 <body>
 <div id="logo"><img src="../../design/pics/system/logo.png" alt=""></div>
 <div id="seite">
<div class="title">WronnayCMS - <?php echo l277; ?>:</div>
<?php
switch($_GET["install"]){
  case "":
?>
<div class="title2">(<?php echo l278; ?> 1/3)</div><br>
<b><?php echo l279; ?>:</b><br>
	  <form action="?install=1-2" method="post">
	  <table>
	  <tr><td><?php echo l280; ?></td><td><input type="text" name="host" value="localhost"></td></tr>
	  <tr><td><?php echo l281; ?></td><td><input type="text" name="database"></td></tr>
          <tr><td><?php echo l311; ?></td><td><input type="text" name="prefix" value="wcms"></td></tr>
	  <tr><td><?php echo l282; ?></td><td><input type="text" name="user"></td></tr>
	  <tr><td><?php echo l283; ?></td><td><input type="password" name="pass"></td></tr>
	  <tr><td><?php echo l284; ?></td><td><input type="password" name="pass2"></td></tr>
	  </table>
	  <input type="submit" value="<?php echo l285; ?>">
	  </form>
<?php
  break;
 case "1-2":
?>
<div class="title2">(<?php echo l278; ?> 1/3)</div><br>
<?php
if($_POST["pass"] != $_POST["pass2"])
	  {
	    echo l286;
	  }
else {
	  $fp = fopen("../inc/config.php","w+");
      $HOST = '$HOST';
      $USER = '$USER';
      $PW = '$PW';
      $DB = '$DB';
      $PREFIX = '$PREFIX';
      $CHARSET = '$CHARSET';
      $VERSION = '$VERSION';
      $daten = "<?php
      $HOST = '$_POST[host]'; 
      $USER = '$_POST[user]'; 
      $PW = '$_POST[pass]'; 
      $DB = '$_POST[database]'; 
      $PREFIX = '$_POST[prefix]';
      $CHARSET = 'UTF-8';
      $VERSION = 'Open Beta';
      ?>";
      fwrite($fp,$daten);
include("../inc/config.php");
      mysql_connect($HOST,$USER,$PW)or die(mysql_error());
      mysql_select_db($DB)or die(mysql_error());
      mysql_set_charset('utf8');
   $import = file_get_contents("wcms.sql");
   $import = preg_replace ("%/\*(.*)\*/%Us", '', $import);
   $import = preg_replace ("%^--(.*)\n%mU", '', $import);
   $import = preg_replace ("%^$\n%mU", '', $import);
   $import = str_replace('$PREFIX', $PREFIX, $import);
   mysql_real_escape_string($import); 
   $import = explode (";", $import); 
   foreach ($import as $imp){
    if ($imp != '' && $imp != ' '){
     mysql_query($imp);
    }
   }  
$url12 = $_SERVER['SERVER_NAME'];
mysql_query("INSERT INTO ".$PREFIX."_data (id, name, url, text, date, active) VALUES ('8', 'url', '".$url12."', 'none', now(), '0')");
header("Location: ?install=3");
}
  break;
 case "2":
?>
<div class="title2">(<?php echo l278; ?> 2/4)</div><br>

<?php
  break;
 case "2-1":

header("Location: ?install=3");
  break;
 case "3":
?>
<div class="title2">(<?php echo l278; ?> 2/3)</div><br>
<b><?php echo l287; ?>:</b><br>
<?php
        echo "<form ".
             " name=\"Registrieren\" ".
             " action=\"?install=3-1\" ".
             " method=\"post\" ".
             " accept-charset=\"UTF-8\">\n";
        echo "<input type=\"text\" name=\"Username\" value=\"Username\" onclick=\"if(this.value && this.value==this.defaultValue)this.value=''\" size=\"20\" class=\"li\">\n";
        echo "<br>\n";
        echo "<input type=\"password\" name=\"Password\" value=\"".l37."\" onclick=\"if(this.value && this.value==this.defaultValue)this.value=''\" size=\"20\" class=\"li\"> (".l37.")\n";
        echo "<br>\n";
	    echo "<input type=\"password\" name=\"Passwordrepeat\" value=\"".l37."\" onclick=\"if(this.value && this.value==this.defaultValue)this.value=''\" size=\"20\" class=\"li\"> (".l147.")\n";
        echo "<br>\n";
		echo "<input type=\"text\" name=\"hallo\" value=\"".l100."\" onclick=\"if(this.value && this.value==this.defaultValue)this.value=''\" size=\"20\" class=\"li\">\n";
        echo "<br>\n";
	    echo "<span>\n".
             "".l101.":\n".
             "</span>\n";
        echo "<input type=\"radio\" class=\"li\" name=\"Show_Email\" value=\"1\"> ".l102."\n";
        echo "<input type=\"radio\" class=\"li\" name=\"Show_Email\" value=\"0\" checked> ".l103."<br>\n";
        echo "<input type=\"submit\" name=\"submit\" value=\"".l131."\" class=\"lb\"> \n";
		echo "<input class=\"lb\" type=\"reset\" value=\"".l149."\">\n";
        echo "</form>\n";

  break;
 case "3-1":
include("../inc/config.php");
      mysql_connect($HOST,$USER,$PW)or die(mysql_error());
      mysql_select_db($DB)or die(mysql_error());
      mysql_set_charset('utf8');
  if(isset($_POST['submit']) AND $_POST['submit']== l131){
        $errors = array();
            $nicknames = array();
            $emails = array();
            $sql = "SELECT
                             username,
                             email
                     FROM
                             ".$PREFIX."_user
                    ";
            $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
            while($row = mysql_fetch_assoc($result)){
                     $nicknames[] = $row['username'];
                     $emails[] = $row['email'];
            }
			if(trim($_POST['Username'])=='Username') {
			$_POST['Username'] = '';
			}
			if(trim($_POST['hallo'])== l100) {
			$_POST['hallo'] = '';
			}
			if(trim($_POST['Password'])== l37) {
			$_POST['Password'] = '';
			}
			if(trim($_POST['Passwordrepeat'])== l37) {
			$_POST['Passwordrepeat'] = '';
			}
            if(trim($_POST['Username'])=='')
                $errors[]= l132;
            elseif(strlen(trim($_POST['Username'])) < 3)
                $errors[]= l133;
            elseif(!preg_match('/^\w+$/', trim($_POST['Username'])))
                $errors[]= l134;
            elseif(in_array(trim($_POST['Username']), $nicknames))
                $errors[]= l135;
            if(trim($_POST['hallo'])=='')
                $errors[]= l136;
            elseif(in_array(trim($_POST['hallo']), $emails))
                $errors[]= l138;
            if(trim($_POST['Password'])=='')
                $errors[]= l139;
            elseif (strlen(trim($_POST['Password'])) < 6)
                $errors[]= l140;
            if(trim($_POST['Passwordrepeat'])=='')
                $errors[]= l141;
            elseif (trim($_POST['Password']) != trim($_POST['Passwordrepeat']))
                $errors[]= l142;
        if(count($errors)){
             foreach($errors as $error)
                 echo "<div class=\"fehler\">".$error."</div>\n";
        }
        else{
            $sql = "INSERT INTO
                           ".$PREFIX."_user
                            (
                             username,
                             password,
                             registerdate,
                             email,
                             show_email,
                             rang
                            )
                    VALUES
                            ('".mysql_real_escape_string(trim($_POST['Username']))."',
                             '".md5(trim($_POST['Password']))."',
                             now(),
                             '".mysql_real_escape_string(trim($_POST['hallo']))."',
                             '".mysql_real_escape_string(trim($_POST['Show_Email']))."',
                             'Admin'
                            )
                   ";
            mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
header("Location: ?install=4");
            echo "<div class=\"erfolg\">".l144."\n<br>".
                 "".l145."\n<br>".
                 "".l146."\n<br></div>";
        }
	}
  break;
 case "4":
?>
<div class="title2">(<?php echo l278; ?> 3/3)</div><br>
<b><?php echo l288; ?>:</b><br>
<?php echo l289; ?>
<?php
break;
}
?>
 </div>
 <div id="footer">
<div class="text">&copy; <a href="http://scripts.wronnay.net">Scripts.Wronnay.net</a><br><br>
 </div></div>
 </body>
</html>
<?php
ob_end_flush();
?>
