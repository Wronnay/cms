<?php
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
	   $kategorie2 = mysql_query($kategoriesql) OR die("<pre>\n".$kategoriesql."</pre>\n".mysql_error());
			if (mysql_num_rows($kategorie2) == 0) {
	    $codebody .= l18;
	}
    while ($kategorierow = mysql_fetch_assoc($kategorie2)) {
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
	   $kategorie2 = mysql_query($kategoriesql) OR die("<pre>\n".$kategoriesql."</pre>\n".mysql_error());
			if (mysql_num_rows($kategorie2) == 0) {
	    $codebody .= l21;
	}
    while ($kategorierow = mysql_fetch_assoc($kategorie2)) {
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
	   $kategorie3 = mysql_query($kategoriesql2) OR die("<pre>\n".$kategoriesql2."</pre>\n".mysql_error());
			if (mysql_num_rows($kategorie3) == 0) {
	    $codebody .= l21;
	}
    while ($kategorierow3 = mysql_fetch_assoc($kategorie3)) {
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
	  $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
if (empty($topicsid)) 
{ 
$topicsid = 1;
}
elseif ($topicsid == '0') 
{ 
$topicsid = 1;
}
	  $sql2 = "INSERT INTO ".$PREFIX."_posts (autor_id, topic_id, title, date, post) VALUES ('".$_SESSION['id']."','".$topicsid."','".presql($_REQUEST['titel'])."', now(),'".$bodynachricht."')";
	  $result2 = mysql_query($sql2) OR die("<pre>\n".$sql2."</pre>\n".mysql_error());
	  $codebody .= l22;
	  header("Location: index.php?type=forum&id=".mysql_real_escape_string($_GET['kat2id'])."");
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
$smilies_result = mysql_query($smiliesql) OR die("<pre>\n".$smiliesql."</pre>\n".mysql_error());
    while ($smilieu = mysql_fetch_assoc($smilies_result)) {
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
$result_total = mysql_query('SELECT COUNT(*) as `total` FROM `'.$PREFIX.'_topics` WHERE kat2_id = '.presql($_GET['id']).'');
$row_total = mysql_fetch_assoc($result_total);
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
    $resulttit = mysql_query($sqltit) OR die("<pre>\n".$sqltit."</pre>\n".mysql_error());
while ($rowtit = mysql_fetch_assoc($resulttit)) {
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
    $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
			if (mysql_num_rows($result) == 0) {
	    $codebody .= l32;
	}
    while ($row = mysql_fetch_assoc($result)) {
	$posts2 = mysql_num_rows(mysql_query("SELECT id FROM ".$PREFIX."_posts WHERE topic_id = '".$row['id']."'"));
	$posts = $posts2 - 1;
	$last_post2 = mysql_query("SELECT autor_id, date FROM ".$PREFIX."_posts WHERE topic_id = '".$row['id']."' ORDER BY date DESC LIMIT 1");
	while ($last_post = mysql_fetch_assoc($last_post2)) {
 $a = "SELECT username FROM ".$PREFIX."_user WHERE id=".$last_post['autor_id'].";";
 $a_result = mysql_query($a) OR die("<pre>\n".$a."</pre>\n".mysql_error());
    while ($au = mysql_fetch_assoc($a_result)) {
	$lastpostuser = nocss($au['username']);
	}
	$lastpostid = nocss($last_post['autor_id']);
	$lastpostdate = nocss($last_post['date']);
	}
	$abfrage = mysql_query("SELECT username FROM ".$PREFIX."_user WHERE id = '".$row['autor_id']."'");
	$autor = mysql_fetch_assoc($abfrage);
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
