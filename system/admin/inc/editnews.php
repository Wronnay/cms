<h2><?php echo w9; ?></h2>
<?php 
if(isset($_GET['id'])){
	$abfrage = mysql_query("SELECT title, news, description, keywords FROM ".$PREFIX."_news WHERE id='".presql($_GET['id'])."'");
	while ($row = mysql_fetch_assoc($abfrage)) {
$atitle = nocss($row['title']);
$adescription = nocss($row['description']);
$akeywords = nocss($row['keywords']);
$anews = $row['news'];
}
}
  if(isset($_POST['submit']) AND $_POST['submit'] == w8) {
        if(empty($_REQUEST['title']) || empty($_REQUEST['description']) || empty($_REQUEST['keywords']) || empty($_REQUEST['news']))
      {
        echo w10;
      }
	  else {
mysql_query("UPDATE ".$PREFIX."_news SET autor_id = '".presql($_SESSION["ADMINid"])."', title = '".presql($_REQUEST['title'])."', news = '".presql($_REQUEST['news'])."', description = '".presql($_REQUEST['description'])."', keywords = '".presql($_REQUEST['keywords'])."' WHERE id = '".presql($_GET['id'])."'");
	  echo w11;
	  }
  }
?>
<form action="" method="post">
	  <table>
	  <tr><td><?php echo w12; ?>: </td><td><input type="text" class="li" name="title" value="<?php echo $atitle; ?>" size="50"></td></tr>
	  <tr><td><?php echo w13; ?>: </td><td><input type="text" class="li" name="description" value="<?php echo $adescription; ?>" size="50"></td></tr>
	  <tr><td><?php echo w14; ?>: </td><td><input type="text" class="li" name="keywords" value="<?php echo $akeywords; ?>" size="50"> (<?php echo w15; ?>)</td></tr>
      <tr><td><?php echo w16; ?>: </td><td>
      <textarea id="nachricht" class="ckeditor" name="news" cols="55" rows="15"><?php echo $anews; ?></textarea>
      </td></tr>
	  </table>
      <input class="lb" name="submit" type="submit" value="<?php echo w8; ?>">
      </form>
