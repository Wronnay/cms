<?php
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
$codebody .= '<div style="clear:both;"></div>';
if ($_GET['id'] == '') {
if ($_GET['action'] == 'newtopic'){
$title = ''.l17.' - '.$site_title.'';
	  $kategoriesql = "
	  SELECT
            id,
            name,
			kat1_id,
			beschreibung
        FROM
            ".$PREFIX."_kat2
	    WHERE id  = '".presql($_GET['kat2id'])."'
	  ";
	   $dbpre = $dbc->prepare($kategoriesql);
	   $dbpre->execute();
	if ($dbpre->rowCount() < 1) {
	    $codebody .= l18;
	}
    while ($kategorierow = $dbpre->fetch(PDO::FETCH_ASSOC)) {
	$kategorie = $kategorierow['name'];
	$kategorieid = $kategorierow['id'];
	}
  if(isset($_POST['submit']) AND $_POST['submit'] == l19) {
  	if(isset($_SESSION['id']))
	{
        if(empty($_REQUEST['titel']) || empty($_REQUEST['body']))
      {
        $codebody .= l20;
      }
	    else {
	  $kategoriesql = "
	  SELECT
            id,
            name,
			kat1_id,
			beschreibung
        FROM
            ".$PREFIX."_kat2
	    WHERE id  = '".presql($_GET['kat2id'])."'
	  ";
	   $dbpre = $dbc->prepare($kategoriesql);
	   $dbpre->execute();
	if ($dbpre->rowCount() < 1) {
	    $codebody .= l21;
	}
    while ($kategorierow = $dbpre->fetch(PDO::FETCH_ASSOC)) {
	$kategorie = $kategorierow['name'];
	$kategorieid = $kategorierow['id'];
	}		
	  $kategoriesql2 = "
	  SELECT
            id,
			kat2_id,
			autor_id,
			title,
			date
        FROM
            ".$PREFIX."_topics
	    ORDER BY
		   date DESC
		LIMIT
		   1
	  ";
	   $dbpre2 = $dbc->prepare($kategoriesql2);
	   $dbpre2->execute();
	if ($dbpre2->rowCount() < 1) {
	    $codebody .= l21;
	}
    while ($kategorierow3 = $dbpre2->fetch(PDO::FETCH_ASSOC)) {
if (empty($kategorierow3['id'])) 
{ 
$topicsid = 1;
}
elseif ($kategorierow3['id'] == '0') 
{ 
$topicsid = 1;
}
else {
       $topicsid = $kategorierow3['id'] + 1;
}
	}		
	  $bodynachricht = presql($_REQUEST['body']);
	  $sql = "INSERT INTO ".$PREFIX."_topics (id, kat2_id, autor_id, title, date) VALUES ('".$topicsid."','".$kategorieid."','".$_SESSION['id']."','".presql($_REQUEST['titel'])."', now())";
	  $dbpre3 = $dbc->prepare($sql);
	  $dbpre3->execute();
if (empty($topicsid)) 
{ 
$topicsid = 1;
}
elseif ($topicsid == '0') 
{ 
$topicsid = 1;
}
	  $sql2 = "INSERT INTO ".$PREFIX."_posts (autor_id, topic_id, title, date, post) VALUES ('".$_SESSION['id']."','".$topicsid."','".presql($_REQUEST['titel'])."', now(),'".$bodynachricht."')";
	  $dbpre4 = $dbc->prepare($sql2);
	  $dbpre4->execute();
	  $codebody .= l22;
	  header("Location: index.php?type=forum&id=".presql($_GET['kat2id'])."");
		}
		}
		else {$codebody .= l23;}
  }
  $codebody .= '<form action="index.php?type=forum&action=newtopic&kat2id='.nocss($_GET['kat2id']).'" method="post" enctype="multipart/form-data">';
$codebody .= '<table>
	  <tr><td><b>'.l24.'</b>: </td><td>'.nocss($kategorie).' (<a href="index.php?type=board">'.l25.'</a>)</td></tr>
	  <tr><td><b>'.l26.'</b>: </td><td><input type="text" name="titel" value="" size="50"></td></tr>
      <tr><td><b>'.l27.'</b>: </td><td>';
$codebody .= '<div id="beitrag"> 
 <div id="smilies2">';
$smiliesql = "SELECT id, title, url, color FROM ".$PREFIX."_smilies WHERE color='green'";
$dbpre5 = $dbc->prepare($smiliesql);
$dbpre5->execute();
    while ($smilieu = $dbpre5->fetch(PDO::FETCH_ASSOC)) {
$codebody .= "<img src=\"design/pics/smilies/".$smilieu['color']."/".$smilieu['url']."\" onclick=\"insertText(' ".$smilieu['title']." ','')\" alt=\"".$smilieu['title']."\" title=\"".$smilieu['title']."\" /> ";
	}
$codebody .= '</div>
  <div id="buttonleiste">
    <button type="button" onclick="insertText(\'[b]\',\'[/b]\')" title="[b][/b]"><b>b</b></button>
    <button type="button" onclick="insertText(\'[i]\',\'[/i]\')" title="[i][/i]"><i>i</i></button>
    <button type="button" onclick="insertText(\'[u]\',\'[/u]\')" title="[u][/u]"><u>u</u></button>
    <button type="button" onclick="insertText(\'[quote]\',\'[/quote]\')" title="[quote][/quote]">quote</button>
    <button type="button" onclick="insertText(\'[code]\',\'[/code]\')" title="[code][/code]">code</button>
    <button type="button" onclick="insertText(\'[img]\',\'[/img]\')" title="[img]URL[/img]">img</button>
    <button type="button" onclick="insertText(\'[url]\',\'[/url]\')" title="[url='.w120.']'.w121.'[/url]">url</button>
  </div>
</div>';
$codebody .= '<textarea id="nachricht" name="body" cols="55" rows="15"></textarea></td></tr>
	  </table>
      <input name="submit" type="submit" value="'.l19.'">
      </form>';
}
}
else {
$dbpre6 = $dbc->prepare('SELECT COUNT(*) as `total` FROM `'.$PREFIX.'_topics` WHERE kat2_id = '.presql($_GET['id']).'');
$dbpre6->execute();
$row_total = $dbpre6->fetch(PDO::FETCH_ASSOC);
$gesamte_anzahl = $row_total['total'];
$ergebnisse_pro_seite = 15;
$gesamt_seiten = ceil($gesamte_anzahl/$ergebnisse_pro_seite);
if (empty($_GET['seite_nr'])) {
    $seite = 1;
} else {
    $seite = $_GET['seite_nr'];
    if ($seite > $gesamt_seiten) {
        $seite = 1;
    }
}
$limit = ($seite*$ergebnisse_pro_seite)-$ergebnisse_pro_seite;
    $sql = "SELECT
            id,
			kat2_id,
			autor_id,
			title,
            date
        FROM
            ".$PREFIX."_topics
		WHERE kat2_id  = '".presql($_GET['id'])."'
        ORDER BY
            date DESC
		LIMIT
		    ".$limit.", ".$ergebnisse_pro_seite."
		";
    $sqltit = "SELECT
            id,
			kat1_id,
			name,
			beschreibung
        FROM
            ".$PREFIX."_kat2
		WHERE id  = '".presql($_GET['id'])."'
		LIMIT
		    1
		";
    $dbpre7 = $dbc->prepare($sqltit);
    $dbpre7->execute();
while ($rowtit = $dbpre7->fetch(PDO::FETCH_ASSOC)) {
$title = ''.nocss($rowtit['name']).' - '.$site_title.'';
$description = nocss($rowtit['beschreibung']);
}
if(isset($_SESSION['id']))
	{
$codebody .= '<div class="newbutton"><a href="index.php?type=forum&action=newtopic&kat2id='.nocss($_GET['id']).'">'.l17.'</a></div>';
}
$codebody .= '<div class="kat">
<div class="infos"><div class="lastpost">'.l28.'</div><div class="posts">'.l29.'</div><div class="topics">'.l30.'</div></div>
<div class="title">
'.l31.':
</div>';
    $dbpre8 = $dbc->prepare($sql);
    $dbpre8->execute();
	if ($dbpre8->rowCount() < 1) {
	    $codebody .= l32;
	}
    while ($row = $dbpre8->fetch(PDO::FETCH_ASSOC)) {
	$dbpre9 = $dbc->prepare("SELECT id FROM ".$PREFIX."_posts WHERE topic_id = '".$row['id']."'");
	$dbpre9->execute();
	$posts2 = $dbpre9->rowCount();
	$posts = $posts2 - 1;
	$dbpre10 = $dbc->prepare("SELECT autor_id, date FROM ".$PREFIX."_posts WHERE topic_id = '".$row['id']."' ORDER BY date DESC LIMIT 1");
	$dbpre10->execute();
	while ($last_post = $dbpre10->fetch(PDO::FETCH_ASSOC)) {
 $a = "SELECT username FROM ".$PREFIX."_user WHERE id=".$last_post['autor_id'].";";
 $dbpre11 = $dbc->prepare($a);
 $dbpre11->execute();
    while ($au = $dbpre11->fetch(PDO::FETCH_ASSOC)) {
	$lastpostuser = nocss($au['username']);
	}
	$lastpostid = nocss($last_post['autor_id']);
	$lastpostdate = nocss($last_post['date']);
	}
	$dbpre12 = $dbc->prepare("SELECT username FROM ".$PREFIX."_user WHERE id = '".$row['autor_id']."'");
	$dbpre12->execute();
	$autor = $dbpre12->fetch(PDO::FETCH_ASSOC);
$codebody .= '
<div class="kat2">
<div class="infos2"><div class="lastpost2">'.l274.': <a href="index.php?type=user&id='.$lastpostid.'">'.$lastpostuser.'</a> '.l275.': '.$lastpostdate.'</div><div class="posts2"><a href="index.php?type=user&id='.nocss($row['autor_id']).'">'.nocss($autor['username']).'</a></div><div class="topics2">'.nocss($posts).'</div></div>
<a href="index.php?type=topic&id='.nocss($row['id']).'">'.nocss($row['title']).'</a>
</div>';
    }
$codebody .= '</div>';
	if ($gesamte_anzahl <= $ergebnisse_pro_seite) {}
	else {
	for ($i=1; $i<=$gesamt_seiten; ++$i) {
    if ($seite == $i) {
        $codebody .= '<div class="seitenr"><a href="index.php?type=forum&id='.nocss($_GET['id']).'&seite_nr='.$i.'" style="font-weight: bold;">'.$i.'</a></div>';
    } else {
        $codebody .= '<div class="seitenr2"><a href="index.php?type=forum&id='.nocss($_GET['id']).'&seite_nr='.$i.'">'.$i.'</a></div>';
    }
}
}
if(isset($_SESSION['id']))
	{
$codebody .= '<div class="newbutton"><a href="index.php?type=forum&action=newtopic&kat2id='.nocss($_GET['id']).'">'.l17.'</a></div>';
}
}
?>
