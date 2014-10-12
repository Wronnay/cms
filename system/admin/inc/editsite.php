<h2><?php echo w17; ?></h2>
<?php 
if(isset($_GET['id'])){
	$abfrage = mysql_query("SELECT name, title, text, date, description, tags, cache FROM ".$PREFIX."_sites WHERE id='".presql($_GET['id'])."'");
	while ($row = mysql_fetch_assoc($abfrage)) {
$atitle = nocss($row['title']);
$aname = nocss($row['name']);
$adescription = nocss($row['description']);
$akeywords = nocss($row['tags']);
$anews = $row['text'];
$acache = $row['cache'];
}
}
  if(isset($_POST['submit']) AND $_POST['submit'] == w8) {
        if(empty($_REQUEST['title']) || empty($_REQUEST['name']) || empty($_REQUEST['description']) || empty($_REQUEST['keywords']) || empty($_REQUEST['text']))
      {
        echo w18;
      }
	  else {
	  if (isset($_REQUEST['cache'])) { $cache = 1; }
	  else { $cache = 0; }
mysql_query("UPDATE ".$PREFIX."_sites SET autor_id = '".presql($_SESSION["ADMINid"])."', name = '".presql($_REQUEST['name'])."', title = '".presql($_REQUEST['title'])."', text = '".presql($_REQUEST['text'])."', description = '".presql($_REQUEST['description'])."', tags = '".presql($_REQUEST['keywords'])."', cache = '".$cache."' WHERE id = '".presql($_GET['id'])."'");
	  echo w19;
	  }
  }
?>
<form action="" method="post">
	  <table>
          <tr><td><?php echo w4; ?>: </td><td><input type="text" class="li" name="name" value="<?php echo $aname; ?>" size="50"></td></tr>
	  <tr><td><?php echo w12; ?>: </td><td><input type="text" class="li" name="title" value="<?php echo $atitle; ?>" size="50"></td></tr>
	  <tr><td><?php echo w13; ?>: </td><td><input type="text" class="li" name="description" value="<?php echo $adescription; ?>" size="50"></td></tr>
	  <tr><td><?php echo w14; ?>: </td><td><input type="text" class="li" name="keywords" value="<?php echo $akeywords; ?>" size="50"> (<?php echo w15; ?>)</td></tr>
      <tr><td><?php echo w16; ?>: </td><td>
      <textarea id="nachricht" class="ckeditor" name="text" cols="55" rows="15"><?php echo $anews; ?></textarea></td></tr>
	  </table>
<?php
if($CODE == '1')
{
?>
<?php if($acache == '1') {
echo '	  <p><input class="li" type="checkbox" name="cache" checked /> '.w145.'</p>';
} 
else {
echo '	  <p><input class="li" type="checkbox" name="cache" /> '.w145.'</p>';
}
?>
<?php
}
?>
      <input class="lb" name="submit" type="submit" value="<?php echo w8; ?>">
      </form>
