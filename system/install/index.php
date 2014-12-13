<?php
header('content-type: text/html; charset=UTF-8');
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
error_reporting(0);
session_start();
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
include '../../lang/de/1.php';
  }
  else
  {
include '../../lang/forum/en/1.php';
include '../../lang/en/1.php';
  }
?>
<!DOCTYPE HTML>
<html>
 <head>
 <title><?php echo l277; ?> | WronnayCMS</title>
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="../../design/css/install.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<style type="text/css">
input[type=radio] {
    display:none;
}
 
input[type=radio] + label {
    display:inline-block;
    margin:-2px;
    padding: 4px 12px;
    margin-bottom: 0;
    font-size: 14px;
    line-height: 20px;
    color: #333;
    text-align: center;
    text-shadow: 0 1px 1px rgba(255,255,255,0.75);
    vertical-align: middle;
    cursor: pointer;
    background-color: #f5f5f5;
    background-image: -moz-linear-gradient(top,#fff,#e6e6e6);
    background-image: -webkit-gradient(linear,0 0,0 100%,from(#fff),to(#e6e6e6));
    background-image: -webkit-linear-gradient(top,#fff,#e6e6e6);
    background-image: -o-linear-gradient(top,#fff,#e6e6e6);
    background-image: linear-gradient(to bottom,#fff,#e6e6e6);
    background-repeat: repeat-x;
    border: 1px solid #ccc;
    border-color: #e6e6e6 #e6e6e6 #bfbfbf;
    border-color: rgba(0,0,0,0.1) rgba(0,0,0,0.1) rgba(0,0,0,0.25);
    border-bottom-color: #b3b3b3;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff',endColorstr='#ffe6e6e6',GradientType=0);
    filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
    -webkit-box-shadow: inset 0 1px 0 rgba(255,255,255,0.2),0 1px 2px rgba(0,0,0,0.05);
    -moz-box-shadow: inset 0 1px 0 rgba(255,255,255,0.2),0 1px 2px rgba(0,0,0,0.05);
    box-shadow: inset 0 1px 0 rgba(255,255,255,0.2),0 1px 2px rgba(0,0,0,0.05);
}
 
input[type=radio]:checked + label {
       background-image: none;
    outline: 0;
    -webkit-box-shadow: inset 0 2px 4px rgba(0,0,0,0.15),0 1px 2px rgba(0,0,0,0.05);
    -moz-box-shadow: inset 0 2px 4px rgba(0,0,0,0.15),0 1px 2px rgba(0,0,0,0.05);
    box-shadow: inset 0 2px 4px rgba(0,0,0,0.15),0 1px 2px rgba(0,0,0,0.05);
        background-color:#e0e0e0;
}
</style>
 </head>
 <body>
 <div id="logo"><img src="../../design/pics/system/logo.png" alt=""></div>
 <div id="seite">
<div class="title">WronnayCMS - <?php echo l277; ?>:</div>
<?php
switch($_GET["install"]){
  case "":
  include '../inc/config.php'; // Datenbankdaten
if (isset ($DB)) { header("Location: ../../index.php"); }
?>
<div class="title2">(<?php echo l278; ?> 1/4)</div>
<h3><?php echo w146; ?></h3>
<form action="?install=1" method="post">	  <p>
<input type="radio" id="anf" name="erf" value="0" checked>
   <label for="anf"><?php echo w147; ?><br><img src="../../design/pics/icons/standard/avatar_i.png" alt="<?php echo w147; ?>"></label>
<input type="radio" id="fort" name="erf" value="1">
   <label for="fort"><?php echo w148; ?><br><img src="../../design/pics/icons/standard/avatarpro_i.png" alt="<?php echo w148; ?>"></label></p>
<!--
<h3><?php echo w151; ?></h3>
<p><input type="radio" id="mysql" name="db" value="mysql" checked>
   <label for="mysql">MySQL<br><img src="../../design/pics/icons/standard/dbn.png" alt="MySQL"></label>
<input type="radio" id="sqlite" name="db" value="sqlite">
   <label for="sqlite">SQLite<br><img src="../../design/pics/icons/standard/dbl.png" alt="SQLite"></label></p>
--->
<h3><?php echo w149; ?></h3>
<p><?php echo w150; ?></p>
<p><input type="radio" id="1" name="data" value="1" checked>
   <label for="1"><?php echo l102; ?></label>
<input type="radio" id="0" name="data" value="0">
   <label for="0"><?php echo l103; ?></label></p>
	  <input type="submit" name="submit" value="<?php echo l285; ?>">
	  </form>
<?php
  break;
  case "1":
  if(isset($_POST['submit'])){
//  $_SESSION['db'] = $_POST['db'];
  $_SESSION['db'] = 'mysql';
  $_SESSION['senddata'] = $_POST['data'];
  $_SESSION['codedata'] = $_POST['erf'];
if($_SESSION['db'] == 'mysql') { 
  header("Location: ?install=1-2");
} 
elseif($_SESSION['db'] == 'sqlite') {
  header("Location: ?install=2");
} 
  }
  break;
  case "1-2":
?>
<div class="title2">(<?php echo l278; ?> 2/4)</div><br>
<b><?php echo l279; ?>:</b><br>
	  <form action="?install=2" method="post">
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
 case "2":
?>
<div class="title2">(<?php echo l278; ?> 2/4)</div><br>
<?php
if($_POST["pass"] != $_POST["pass2"])
	  {
	    echo l286;
	  }
else {
if($_SESSION['db'] == 'sqlite') { 
	$_POST['database'] = 'wcms';
	$DBPH1 = 'db/'.$_POST['database'].'.sql.db';
	$datenbank = '../'.$DBPH1;
	// Datenbank-Datei erstellen
	if (!file_exists($datenbank)) {
 		$dbc = new PDO('sqlite:'.$datenbank);
	}
	// Schreibrechte überprüfen
	if (!is_writable($datenbank)) {
 		// Schreibrechte setzen
 	chmod($datenbank, 0777);
	}
}
elseif($_SESSION['db'] == 'mysql') {
	$dbc = new PDO('mysql:host='.$_POST['host'].'', ''.$_POST['user'].'', ''.$_POST['pass'].'');   	
	$dbc->query("SET CHARACTER SET utf8");
	$dbpre = $dbc->prepare("CREATE DATABASE IF NOT EXISTS ".$_POST['database'].";");
	$dbpre->execute();
	}
$fp = fopen("../inc/config.php","w+");
chmod('../inc/config.php', 0777);
      $HOST = '$HOST';
      $USER = '$USER';
      $PW = '$PW';
      $DB = '$DB';
      $PREFIX = '$PREFIX';
      $CHARSET = '$CHARSET';
      $CODE = '$CODE';
      $DBTYPE = '$DBTYPE';
$daten = "<?php
$HOST = '$_POST[host]'; 
$USER = '$_POST[user]'; 
$PW = '$_POST[pass]'; 
$DB = '$_POST[database]'; 
$PREFIX = '$_POST[prefix]';
$CHARSET = 'UTF-8';
$CODE = '$_SESSION[codedata]';
$DBTYPE = '$_SESSION[db]';
?>";
      fwrite($fp,$daten);
include("../inc/config.php");
if($DBTYPE == 'sqlite') { 
$dbc = new PDO(''.$DBTYPE.':../db/'.$DB.'.sql.db'); 
$dbc->query("SET CHARACTER SET utf8");  	
	 }
elseif($DBTYPE == 'mysql') { 
$dbc = new PDO(''.$DBTYPE.':host='.$HOST.';dbname='.$DB.'', ''.$USER.'', ''.$PW.'');   	
$dbc->query("SET CHARACTER SET utf8");
	 }
   $import = file_get_contents("wcms.sql");
   $import = preg_replace ("%/\*(.*)\*/%Us", '', $import);
   $import = preg_replace ("%^--(.*)\n%mU", '', $import);
   $import = preg_replace ("%^$\n%mU", '', $import);
   $import = str_replace('$PREFIX', $PREFIX, $import);
   $import = explode (";", $import);
   foreach ($import as $imp){
    if ($imp != '' && $imp != ' '){
     $dbpre = $dbc->prepare($imp);
     $dbpre->execute();
    }
   }  
$url12 = $_SERVER['SERVER_NAME'];
$dbpre = $dbc->prepare("INSERT INTO ".$PREFIX."_data (id, name, url, text, date, active) VALUES ('8', 'url', '".$url12."', 'none', now(), '0')");
$dbpre->execute();
$dbpre = $dbc->prepare("INSERT INTO ".$PREFIX."_data (id, name, url, text, date, active) VALUES ('29', 'version', 'none', '1.0', now(), '0')");
$dbpre->execute();
$dbpre = $dbc->prepare("INSERT INTO ".$PREFIX."_data (name, url, text, date, active) VALUES ('senddata', 'none', '".$_SESSION['senddata']."', now(), '0')");
$dbpre->execute();
header("Location: ?install=4");
}
  break;
 case "3":
?>
<div class="title2">(<?php echo l278; ?> 3/4)</div><br>

<?php
  break;
 case "3-1":

header("Location: ?install=4");
  break;
 case "4":
?>
<div class="title2">(<?php echo l278; ?> 3/4)</div><br>
<b><?php echo l287; ?>:</b><br>
<?php
        echo "<form ".
             " name=\"Registrieren\" ".
             " action=\"?install=4-1\" ".
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
	    echo "<p style=\"padding:5px;\"><span>\n".
             "".l101.":\n".
             "</span>\n";
        echo ' <input type="radio" id="radio5" name="Show_Email" value="1" checked>
   <label for="radio5">'.l102.'</label>
<input type="radio" id="radio6" name="Show_Email" value="0">
   <label for="radio6">'.l103.'</label></p>';
        echo "<input type=\"submit\" name=\"submit\" value=\"".l131."\" class=\"lb\"> \n";
		echo "<input class=\"lb\" type=\"reset\" value=\"".l149."\">\n";
        echo "</form>\n";

  break;
 case "4-1":
include("../inc/config.php");
if($DBTYPE == 'sqlite') { 
$dbc = new PDO(''.$DBTYPE.':../db/'.$DB.'.sql.db'); 
$dbc->query("SET CHARACTER SET utf8");  	
	 }
elseif($DBTYPE == 'mysql') { 
$dbc = new PDO(''.$DBTYPE.':host='.$HOST.';dbname='.$DB.'', ''.$USER.'', ''.$PW.'');   
$dbc->query("SET CHARACTER SET utf8");	
	 }
  if(isset($_POST['submit']) AND $_POST['submit']== l131){
        $errors = array();
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
            if(trim($_POST['hallo'])=='')
                $errors[]= l136;
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
                             rang,
                             act
                            )
                    VALUES
                            ('".trim($_POST['Username'])."',
                             '".md5(trim($_POST['Password']))."',
                             now(),
                             '".trim($_POST['hallo'])."',
                             '".trim($_POST['Show_Email'])."',
                             'Admin',
                             'yes'
                            )
                   ";
            $dbpre = $dbc->prepare($sql);
            $dbpre->execute();
header("Location: ?install=5");
            echo "<div class=\"erfolg\">".l144."\n<br>".
                 "".l145."\n<br>".
                 "".l146."\n<br></div>";
        }
	}
  break;
 case "5":
?>
<div class="title2">(<?php echo l278; ?> 4/4)</div><br>
<b><?php echo l288; ?>:</b><br>
<?php echo l289; ?>
<?php
break;
}
?>
 </div>
 <div id="footer">
<div class="text">&copy; <a href="http://cms.wronnay.net">CMS.Wronnay.net</a><br><br>
 </div></div>
 </body>
</html>
<?php
ob_end_flush();
?>
