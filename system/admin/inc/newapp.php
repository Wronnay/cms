<?php
if(!$CODE == '1')
{
	    header("Location: index.php");
		exit;
}
?>
<h2><?php echo w40; ?></h2>
<?php 
  if(isset($_POST['submit']) AND $_POST['submit'] == w43) {
        if(empty($_REQUEST['name']) || empty($_REQUEST['type']) || empty($_REQUEST['type_id']) || empty($_REQUEST['code']))
      {
        echo w41;
      }
	  else {
	  mysql_query("INSERT INTO ".$PREFIX."_apps (autor_id, name, code, date, type, type_id, lang) VALUES ('".presql($_SESSION["ADMINid"])."','".presql($_REQUEST['name'])."','".presql($_REQUEST['code'])."', now(),'".presql($_REQUEST['type'])."','".presql($_REQUEST['type_id'])."', '".presql($_SESSION['lang'])."')");
	  echo w42;
	  }
  }
?>
<form action="" method="post">
	  <table>
	  <tr><td><?php echo w4; ?>: </td><td><input type="text" class="li" name="name" value="" size="50"></td></tr>
	  <tr><td><?php echo w5; ?>: </td><td><select name="type">
<option value="site">site</option>
<option value="general">general</option>
</select></td></tr>
	  <tr><td><?php echo w6; ?>: </td><td><input type="text" class="li" name="type_id" value="" size="50"></td></tr>
      <tr><td><?php echo w7; ?>: </td><td>
      <textarea id="phpcode" class="li" name="code" cols="55" rows="15"></textarea></td></tr>
	  </table>
      <input class="lb" name="submit" type="submit" value="<?php echo w43; ?>">
      </form>
