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
<h2><?php echo w79; ?>:</h2>
 <?php
switch($_GET["action"]){
  case "":
?>
<p>
<?php
    $sql = "SELECT
	                id,
                        name,
                        url,
                        pic,
                        date
            FROM
                    ".$PREFIX."_designs
           ";
    $dbpre = $dbc->prepare($sql);
    $dbpre->execute();
	if ($dbpre->rowCount() < 1) {
	    echo l187;
	}
    while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
?>
<div style="float:left; padding:5px; margin:5px;">
<a href="design.php?id=<?php echo nocss($row['id']); ?>"><img title="<?php echo l62; ?>" src="../../design/pics/icons/standard/close2r.png" alt="" /></a> <?php echo nocss($row['name']); ?><br>
<img src="../../design/pics/designs/<?php echo nocss($row['pic']); ?>" alt="">
<br><a href="../../index.php?design=<?php echo nocss($row['url']); ?>&template=<?php echo nocss($row['name']); ?>"><?php echo l188; ?></a> <a href="design.php?make=<?php echo nocss($row['url']); ?>&template=<?php echo nocss($row['name']); ?>"><?php echo l189; ?></a> <a href="design.php?action=code&name=<?php echo nocss($row['name']); ?>"><?php echo w8; ?></a><br></div>
<?php
	}
?>
</p>
<?php
    if (is_numeric($_GET['id'])) {
?>
<h2><?php echo l190; ?>:</h2>
<p>
<?php	

    $catid = presql($_GET['id']);
     
    $query = "DELETE
                          FROM
				 ".$PREFIX."_designs
			  WHERE
				 id = '" .$catid. "'";
    
	$dbpre = $dbc->prepare($query);
    $dbpre->execute(); 
    if($dbpre) {
		echo l191;
	}
	else{
		echo l192;
    }
?>
</p>
<?php
}
?>
<?php
    if (isset($_GET['make'])) {
?>
<h2><?php echo l193; ?>:</h2>
<p>
<?php	
    $make = presql($_GET['make']);
    $template = presql($_GET['template']);
    $query = "UPDATE
                                ".$PREFIX."_data
                        SET
				url =  '".$make."'
                        WHERE
                                name = 'design'";
	$dbpre = $dbc->prepare($query);
	$dbpre->execute();
	$query = "UPDATE
                                ".$PREFIX."_data
                        SET
				text =  '".$template."'
                        WHERE
                                name = 'template'";
    
	$dbpre = $dbc->prepare($query);
    $dbpre->execute(); 
    if($result) {
    echo l194;
	}
	else{
    echo l195;
    }
?>
</p>
<?php
}
break;
case "code":
  if(isset($_POST['submit']) AND $_POST['submit'] == w8) {
        if(empty($_REQUEST['headercode']) || empty($_REQUEST['footercode']))
      {
        echo w80;
      }
	  else {
$dbpre = $dbc->prepare("UPDATE ".$PREFIX."_templates SET code = '".presql($_REQUEST['metacode'])."' WHERE type = 'meta' AND name = '".presql($_GET['name'])."'");
$dbpre->execute();
$dbpre = $dbc->prepare("UPDATE ".$PREFIX."_templates SET code = '".presql($_REQUEST['headercode'])."' WHERE type = 'header' AND name = '".presql($_GET['name'])."'");
$dbpre->execute();
$dbpre = $dbc->prepare("UPDATE ".$PREFIX."_templates SET code = '".presql($_REQUEST['footercode'])."' WHERE type = 'footer' AND name = '".presql($_GET['name'])."'");
$dbpre->execute();
	  echo w81;
	  }
  }
    if (isset($_GET['name'])) {
    $sql = "SELECT
	                id,
                        name,
                        type,
                        code,
                        date
            FROM
                    ".$PREFIX."_templates
            WHERE
                    name = '".presql($_GET['name'])."'
           ";
    $dbpre = $dbc->prepare($sql);
    $dbpre->execute();
	if ($dbpre->rowCount() < 1) {
	    echo l187;
	}
?>
<form action="" method="post">
<table>
<?php
    while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
?>
<tr><td><?php echo w5; ?>: </td><td><?php echo $row['type']; ?></td></tr>
<tr><td><?php echo w82; ?>: </td><td><textarea id="phpcode" class="li" name="<?php echo $row['type']; ?>code" cols="55" rows="15"><?php echo $row['code']; ?></textarea></td></tr>
<?php
}
?>
</table>
<input name="submit" type="submit" value="<?php echo w8; ?>"><br>
</form>
<?php
}
break;
}
?>
</article>
<?php
include 'inc/footer.php';
ob_end_flush();
?>
