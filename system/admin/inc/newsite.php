<h2><?php echo w47; ?></h2>
<?php 
  if(isset($_POST['submit']) AND $_POST['submit'] == w43) {
        if(empty($_REQUEST['title']) || empty($_REQUEST['name']) || empty($_REQUEST['description']) || empty($_REQUEST['keywords']) || empty($_REQUEST['text']))
      {
        echo w10;
      }
	  else {
	  if (isset($_REQUEST['cache'])) { $cache = 1; }
	  else { $cache = 0; }
	  $bodynachricht = presql($_REQUEST['text']);
	  $dbpre = $dbc->prepare("INSERT INTO ".$PREFIX."_sites (autor_id, name, title, text, date, description, tags, lang, cache) VALUES ('".presql($_SESSION["ADMINid"])."','".presql($_REQUEST['name'])."','".presql($_REQUEST['title'])."','".$bodynachricht."', now(),'".presql($_REQUEST['description'])."','".presql($_REQUEST['keywords'])."', '".presql($lang)."', '".$cache."')");
	  $dbpre->execute();
	  echo w46;
	  }
  }
?>
<form action="sites.php?action=new" method="post">
	  <table>
          <tr><td><?php echo w4; ?>: </td><td><input type="text" class="li" name="name" value="" size="50"></td></tr>
	  <tr><td><?php echo w12; ?>: </td><td><input type="text" class="li" name="title" value="" size="50"></td></tr>
	  <tr><td><?php echo w13; ?>: </td><td><input type="text" class="li" name="description" value="" size="50"></td></tr>
	  <tr><td><?php echo w14; ?>: </td><td><input type="text" class="li" name="keywords" value="" size="50"> (<?php echo w15; ?>)</td></tr>
      <tr><td><?php echo w16; ?>: </td><td>
      <textarea id="nachricht" class="ckeditor" name="text" cols="55" rows="15"></textarea></td></tr>
	  </table>
<?php
if($CODE == '1')
{
?>
	  <p><input class="li" type="checkbox" name="cache" /> <?php echo w145; ?></p>
<?php
}
?>
      <input class="lb" name="submit" type="submit" value="<?php echo w43; ?>">
      </form>
