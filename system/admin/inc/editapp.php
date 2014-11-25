<?php
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
if(!$CODE == '1')
{
	    header("Location: index.php");
		exit;
}
?>
<h2><?php echo w1; ?></h2>
<?php 
if(isset($_GET['id'])){
	$dbpre = $dbc->query("SELECT name, code, type, type_id FROM ".$PREFIX."_apps WHERE id='".presql($_GET['id'])."'");
	while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$atitle = nocss($row['name']);
$adescription = nocss($row['type']);
$akeywords = nocss($row['type_id']);
$anews = $row['code'];
}
}
  if(isset($_POST['submit']) AND $_POST['submit'] == w8) {
        if(empty($_REQUEST['name']) || empty($_REQUEST['code']) || empty($_REQUEST['type']) || empty($_REQUEST['type_id']))
      {
        echo w2;
      }
	  else {
$dbpre = $dbc->exec("UPDATE ".$PREFIX."_apps SET autor_id = '".presql($_SESSION["ADMINid"])."', name = '".presql($_REQUEST['name'])."', code = '".presql($_REQUEST['code'])."', type = '".presql($_REQUEST['type'])."', type_id = '".presql($_REQUEST['type_id'])."' WHERE id = '".presql($_GET['id'])."'");
	  echo w3;
	  }
  }
?>
<form action="" method="post">
	  <table>
	  <tr><td><?php echo w4; ?>: </td><td><input type="text" class="li" name="name" value="<?php echo $atitle; ?>" size="50"></td></tr>
	  <tr><td><?php echo w5; ?>: </td><td><select name="type">
<option value="<?php echo $adescription; ?>"><?php echo $adescription; ?></option>
</select></td></tr>
	  <tr><td><?php echo w6; ?>: </td><td><input type="text" class="li" name="type_id" value="<?php echo $akeywords; ?>" size="50"></td></tr>
      <tr><td><?php echo w7; ?>: </td><td>
      <textarea id="code" class="li" name="code" cols="55" rows="15"><?php echo $anews; ?></textarea></td></tr>
	  </table>
      <input class="lb" name="submit" type="submit" value="<?php echo w8; ?>">
      </form>
