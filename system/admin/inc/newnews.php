<h2><?php echo w44; ?></h2>
<?php 
  if(isset($_POST['submit']) AND $_POST['submit'] == w43) {
        if(empty($_REQUEST['title']) || empty($_REQUEST['description']) || empty($_REQUEST['keywords']) || empty($_REQUEST['news']))
      {
        echo w41;
      }
	  else {
	  $bodynachricht = presql($_REQUEST['news']);
	  $dbpre = $dbc->prepare("INSERT INTO ".$PREFIX."_news (autor_id, title, news, date, description, keywords, lang) VALUES ('".presql($_SESSION["ADMINid"])."','".presql($_REQUEST['title'])."','".$bodynachricht."', now(),'".presql($_REQUEST['description'])."','".presql($_REQUEST['keywords'])."', '".presql($lang)."')");
	  $dbpre->execute();
	  echo w45;
	  }
  }
?>
<form action="news.php?action=new" method="post">
	  <table>
	  <tr><td><?php echo w12; ?>: </td><td><input type="text" class="li" name="title" value="" size="50"></td></tr>
	  <tr><td><?php echo w13; ?>: </td><td><input type="text" class="li" name="description" value="" size="50"></td></tr>
	  <tr><td><?php echo w14; ?>: </td><td><input type="text" class="li" name="keywords" value="" size="50"> (<?php echo w15; ?>)</td></tr>
      <tr><td><?php echo w16; ?>: </td><td>
      <textarea id="nachricht" class="ckeditor" name="news" cols="55" rows="15"></textarea>
      </td></tr>
	  </table>
      <input class="lb" name="submit" type="submit" value="<?php echo w43; ?>">
      </form>
