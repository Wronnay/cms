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
<h2><?php echo w78; ?>:</h2>
<?php
        if(isset($_POST['submit']) AND $_POST['submit']== l245){
                $sql = "UPDATE
                                ".$PREFIX."_data
                        SET
								url =  '".presql(trim($_POST['design']))."'
                        WHERE
                                name = 'design'
                       ";
                $dbpre = $dbc->prepare($sql);
                $dbpre->execute();
                $sql = "UPDATE
                                ".$PREFIX."_data
                        SET
								text =  '".presql(trim($_POST['title']))."',
                                                                lang = '".$lang."'
                        WHERE
                                name = 'title'
                        AND
                                lang = '".$lang."'
                       ";
                $dbpre = $dbc->prepare($sql);
                $dbpre->execute();
if (presql(trim($_POST['show_headtitle'])) == 1) {$show_headtitle1 = 0;}
else {$show_headtitle1 = 1;}
                $sql = "UPDATE
                                ".$PREFIX."_data
                        SET
								text =  '".presql(trim($_POST['headtitle']))."',
								active = '".$show_headtitle1."',
                                                                lang = '".$lang."'
                        WHERE
                                name = 'headtitle'
                        AND
                                lang = '".$lang."'
                       ";
                $dbpre = $dbc->prepare($sql);		
                $dbpre->execute();		
	$url = presql($_POST["url"]);
	$url_website = ( substr($url, 0, 7) != 'http://' ? 'http://'.$url : $url );  
                $sql = "UPDATE
                                ".$PREFIX."_data
                        SET
								url =  '".$url_website."'
                        WHERE
                                name = 'url'
                       ";
                $dbpre = $dbc->prepare($sql);
                $dbpre->execute();
if (presql(trim($_POST['show_subtitle'])) == 1) {$show_subtitle1 = 0;}
else {$show_subtitle1 = 1;}
                $sql = "UPDATE
                                ".$PREFIX."_data
                        SET
								text =  '".presql(trim($_POST['subtitle']))."',
								active = '".$show_subtitle1."',
                                                                lang = '".$lang."'
                        WHERE
                                name = 'subtitle'
                        AND
                                lang = '".$lang."'
                       ";
                $dbpre = $dbc->prepare($sql);
                $dbpre->execute();
if (presql(trim($_POST['show_logo'])) == 1) {$show_logo1 = 0;}
else {$show_logo1 = 1;}
                $sql = "UPDATE
                                ".$PREFIX."_data
                        SET
								url =  '".presql(trim($_POST['logo']))."',
								active = '".$show_logo1."',
                                                                lang = '".$lang."'
                        WHERE
                                name = 'logo'
                        AND
                                lang = '".$lang."'
                       ";
                $dbpre = $dbc->prepare($sql);	
                $dbpre->execute();
if (presql(trim($_POST['referrer'])) == 1) {$referrer1 = 'yes';}
else {$referrer1 = 'none';}
                $sql = "UPDATE
                                ".$PREFIX."_data
                        SET
								text =  '".$referrer1."'
                        WHERE
                                name = 'referrer'
                       ";
                $dbpre = $dbc->prepare($sql);		
                $dbpre->execute();
                $sql = "UPDATE
                                ".$PREFIX."_data
                        SET
								url =  '".presql(trim($_POST['favicon']))."',
                                                                lang = '".$lang."'
                        WHERE
                                name = 'favicon'
                       ";
                $dbpre = $dbc->prepare($sql);	
                $dbpre->execute();
              $sql = "UPDATE
                                ".$PREFIX."_data
                        SET
								text =  '".presql(trim($_POST['description']))."',
                                                                lang = '".$lang."'
                        WHERE
                                name = 'description'
                        AND
                                lang = '".$lang."'
                       ";
                $dbpre = $dbc->prepare($sql);		
                $dbpre->execute();	
              $sql = "UPDATE
                                ".$PREFIX."_data
                        SET
								text =  '".presql(trim($_POST['keywords']))."',
                                                                lang = '".$lang."'
                        WHERE
                                name = 'keywords'
                        AND
                                lang = '".$lang."'
                       ";
                $dbpre = $dbc->prepare($sql);	
                $dbpre->execute();
              $sql = "UPDATE
                                ".$PREFIX."_data
                        SET
								url =  '".presql(trim($_POST['imprint']))."',
                                                                lang = '".$lang."'
                        WHERE
                                name = 'imprint'
                        AND
                                lang = '".$lang."'
                       ";
                $dbpre = $dbc->prepare($sql);		
                $dbpre->execute();
              $sql = "UPDATE
                                ".$PREFIX."_data
                        SET
								text =  '".presql(trim($_POST['rules']))."',
                                                                lang = '".$lang."'
                        WHERE
                                name = 'rules'
                        AND
                                lang = '".$lang."'
                       ";
                $dbpre = $dbc->prepare($sql);
                $dbpre->execute();
                $sql = "UPDATE
                                ".$PREFIX."_data
                        SET
								active =  '".presql(trim($_POST['user_act']))."'
                        WHERE
                                name = 'email_act'
                       ";
                $dbpre = $dbc->prepare($sql);
                $dbpre->execute();
                $sql = "UPDATE
                                ".$PREFIX."_data
                        SET
								url =  '".presql(trim($_POST['server_email']))."'
                        WHERE
                                name = 'email'
                       ";
                $dbpre = $dbc->prepare($sql);									
				$dbpre->execute();
                echo l228.
                     "\n";
        }
?>
<form action="data.php" method="post">
	  <table>
	  <tr><td><?php echo l229; ?>: </td><td><input type="text" class="li" name="design" value="<?php echo $site_design; ?>" size="50"></td></tr>
	  <tr><td><?php echo l230; ?>: </td><td><input type="text" class="li" name="title" value="<?php echo $site_title; ?>" size="50"></td></tr>
	  <tr><td><?php echo l231; ?>: </td><td><input type="text" class="li" name="headtitle" value="<?php echo $site_headtitle; ?>" size="50"></td></tr>
<?php
           echo "<tr><td>\n".
                 l232.
                 "</td><td>\n";
            if(isset($site_headtitle)){
                echo "<input type=\"radio\" name=\"show_headtitle\" value=\"1\" checked> ".l102."\n";
                echo "<input type=\"radio\" name=\"show_headtitle\" value=\"0\"> ".l103."\n";
            }
            else{
                echo "<input type=\"radio\" name=\"show_headtitle\" value=\"1\"> ".l102."\n";
                echo "<input type=\"radio\" name=\"show_headtitle\" value=\"0\" checked> ".l103."\n";
            }
?>
</td></tr>
	  <tr><td><?php echo l233; ?>: </td><td><input type="text" class="li" name="subtitle" value="<?php echo $site_subtitle; ?>" size="50"></td></tr>
<?php
           echo "<tr><td>\n".
                 l234.
                 "</td><td>\n";
            if(isset($site_subtitle)){
                echo "<input type=\"radio\" name=\"show_subtitle\" value=\"1\" checked> ".l102."\n";
                echo "<input type=\"radio\" name=\"show_subtitle\" value=\"0\"> ".l103."\n";
            }
            else{
                echo "<input type=\"radio\" name=\"show_subtitle\" value=\"1\"> ".l102."\n";
                echo "<input type=\"radio\" name=\"show_subtitle\" value=\"0\" checked> ".l103."\n";
            }
?>
</td></tr>
	  <tr><td><?php echo l235; ?>: </td><td><input type="text" class="li" name="logo" value="<?php echo $site_logo; ?>" size="50"></td></tr>
<?php
           echo "<tr><td>\n".
                 l236.
                 "</td><td>\n";
            if(isset($site_logo)){
                echo "<input type=\"radio\" name=\"show_logo\" value=\"1\" checked> ".l102."\n";
                echo "<input type=\"radio\" name=\"show_logo\" value=\"0\"> ".l103."\n";
            }
            else{
                echo "<input type=\"radio\" name=\"show_logo\" value=\"1\"> ".l102."\n";
                echo "<input type=\"radio\" name=\"show_logo\" value=\"0\" checked> ".l103."\n";
            }
?>
</td></tr>
<?php
           echo "<tr><td>\n".
                 l237.
                 "</td><td>\n";
            if($site_referrer == 'yes'){
                echo "<input type=\"radio\" name=\"referrer\" value=\"1\" checked> ".l102."\n";
                echo "<input type=\"radio\" name=\"referrer\" value=\"0\"> ".l103."\n";
            }
            else{
                echo "<input type=\"radio\" name=\"referrer\" value=\"1\"> ".l102."\n";
                echo "<input type=\"radio\" name=\"referrer\" value=\"0\" checked> ".l103."\n";
            }
?>
</td></tr>
<?php
           echo "<tr><td>\n".
                 w132.
                 "</td><td>\n";
            if($site_user_act == '1'){
                echo "<input type=\"radio\" name=\"user_act\" value=\"1\" checked> ".l102."\n";
                echo "<input type=\"radio\" name=\"user_act\" value=\"0\"> ".l103."\n";
            }
            else{
                echo "<input type=\"radio\" name=\"user_act\" value=\"1\"> ".l102."\n";
                echo "<input type=\"radio\" name=\"user_act\" value=\"0\" checked> ".l103."\n";
            }
?>
</td></tr>
      <tr><td><?php echo w133; ?>: </td><td><input type="text" class="li" name="server_email" value="<?php echo $site_email; ?>" size="50"></td></tr>
	  <tr><td><?php echo l238; ?>: </td><td><input type="text" class="li" name="favicon" value="<?php echo $site_favicon; ?>" size="50"></td></tr>
	  <tr><td><?php echo l239; ?>: </td><td><input type="text" class="li" name="url" value="<?php echo $site_url; ?>" size="50"></td></tr>
      <tr><td><?php echo l240; ?>: </td><td><input type="text" class="li" name="description" value="<?php echo $site_description; ?>" size="50"></td></tr>
	  <tr><td><?php echo l241; ?>: </td><td><input type="text" class="li" name="keywords" value="<?php echo $site_keywords; ?>" size="50"> (<?php echo l242; ?>)</td></tr>
	  <tr><td><?php echo l243; ?>: </td><td><input type="text" class="li" name="imprint" value="<?php echo $site_imprint; ?>" size="50"></td></tr>
      <tr><td><?php echo l244; ?>: </td><td>
<?php
include '../inc/sbbcb.php';
?>
      <textarea id="nachricht" class="li" name="rules" cols="55" rows="15"><?php echo $site_rules; ?></textarea></td></tr>
	  </table>
      <input class="lb" name="submit" type="submit" value="<?php echo l245; ?>">
      </form>
</article>
<?php
include 'inc/footer.php';
ob_end_flush();
?>
