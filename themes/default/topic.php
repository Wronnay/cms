<?php
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
$codebody .= '<div style="clear:both;"></div>';
if ($_GET['id'] == '') {
$title = ''.l150.' - '.$site_title.'';
if ($_GET['action'] == 'edit'){
	  $kategoriesql = "
	  SELECT
            id,
            title
        FROM
            ".$PREFIX."_topics
	    WHERE id  = '".presql($_GET['topicid'])."'
	  ";
	   $dbpre1 = $dbc->prepare($kategoriesql);
	   $dbpre1->execute();
    while ($kategorierow = $dbpre1->fetch(PDO::FETCH_ASSOC)) {
	$kategorie = $kategorierow['title'];
	$kategorieid = $kategorierow['id'];
	}
if (isset($_GET['postid'])) {
	  $quotesql = "
	  SELECT
            id,
            autor_id,
			topic_id,
			title,
			post,
            date
        FROM
            ".$PREFIX."_posts
	    WHERE id = '".presql($_GET['postid'])."'
	  ";
	   $dbpre2 = $dbc->prepare($quotesql);
	   $dbpre2->execute();
    if ($dbpre2->rowCount() < 1) {
	    $codebody .= l158;
	}
    while ($orow = $dbpre2->fetch(PDO::FETCH_ASSOC)) {
	$quotepost = nocss($orow['post']);
        $opostid = nocss($orow['id']);
        $oposttitle = nocss($orow['title']);
	}
}
  if(isset($_POST['submit']) AND $_POST['submit'] == Edit) {
    	if(isset($_SESSION['id']))
	{
        if(empty($_REQUEST['body']))
      {
        $codebody .= l152;
      }
	    else {	
	  $bodynachricht = presql($_REQUEST['body']);
	  $sql2d = "
UPDATE 
       ".$PREFIX."_posts
SET
       post = '".$bodynachricht."'
WHERE 
       id = '".presql($_GET['postid'])."'
AND
       autor_id = '".$_SESSION['id']."'
";
	  $dbpre3 = $dbc->prepare($sql2d);
	  $dbpre3->execute();
	  $codebody .= l153;
          header("Location: index.php?type=topic&id=".nocss($_GET['topicid'])."");

		}
				}
		else {$codebody .= l154;}
  }


  $codebody .= '<form action="index.php?type=topic&action=edit&postid='.nocss($_GET['postid']).'&topicid='.nocss($_GET['topicid']).'" method="post" enctype="multipart/form-data"><table>
	  <tr><td><b>'.l155.'</b>: </td><td>'.nocss($kategorie).'</td></tr>
	  <tr><td><b>'.l156.'</b>: </td><td>'.nocss($oposttitle).'</td></tr>
      <tr><td><b>'.l157.'</b>: </td><td>';
$codebody .= '<div id="beitrag"> 
 <div id="smilies2">';
$smiliesql = "SELECT id, title, url, color FROM ".$PREFIX."_smilies WHERE color='green'";
$dbpre4 = $dbc->prepare($smiliesql);
$dbpre4->execute();
    while ($smilieu = $dbpre4->fetch(PDO::FETCH_ASSOC)) {
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
$codebody .= '<textarea id="nachricht" name="body" cols="55" rows="15">
'.$quotepost.'
</textarea></td></tr>
	  </table>
      <input name="submit" type="submit" value="Edit">
      </form>';
}

if ($_GET['action'] == 'newpost'){
	  $kategoriesql = "
	  SELECT
            id,
            title
        FROM
            ".$PREFIX."_topics
	    WHERE id  = '".presql($_GET['topicid'])."'
	  ";
	   $dbpre5 = $dbc->prepare($kategoriesql);
	   $dbpre5->execute();
	if ($dbpre5->rowCount() < 1) {
	    $codebody .= l151;
	}
    while ($kategorierow = $dbpre5->fetch(PDO::FETCH_ASSOC)) {
	$kategorie = $kategorierow['title'];
	$kategorieid = $kategorierow['id'];
		  $auesql = "
	  SELECT
            email
        FROM
            ".$PREFIX."_user
	    WHERE id  = '".presql($kategorierow['autor_id'])."'
	  ";
	   $dbpre6 = $dbc->prepare($auesql);
	   $dbpre6->execute();
	   while ($auerow = $dbpre6->fetch(PDO::FETCH_ASSOC)) {
		  $autoremail = $auerow['email'];
   }
	}
  if(isset($_POST['submit']) AND $_POST['submit'] == l150) {
    	if(isset($_SESSION['id']))
	{
        if(empty($_REQUEST['body']))
      {
        $codebody .= l152;
      }
	    else {	
	  $bodynachricht = presql($_REQUEST['body']);
	  $sql2 = "INSERT INTO ".$PREFIX."_posts (autor_id, topic_id, title, date, post) VALUES ('".$_SESSION['id']."','".presql($_GET['topicid'])."','".presql($_REQUEST['titel'])."', now(),'".$bodynachricht."')";
	  $dbpre7 = $dbc->prepare($sql2);
	  $dbpre7->execute();
	  $ID = $dbc->lastInsertId();
$from = "From: ".$site_email."\n";
$from .= "Content-Type: text/html; charset=".$CHARSET."\n";
if($site_user_act == '1') { mail(presql(trim($autoremail)), l312, "".l313." "."<br>"."<a href=\"".$site_url."/index.php?type=topic&id=".presql($_GET['topicid'])."#".$ID."\">".$site_url."/index.php?type=topic&id=".presql($_GET['topicid'])."#".$ID."</a>", $from); }
	  $codebody .= l153;
	  header("Location: index.php?type=topic&id=".nocss($_GET['topicid'])."");
		}
				}
		else {$codebody .= l154;}
  }
  $codebody .= '<form action="index.php?type=topic&action=newpost&topicid='.nocss($_GET['topicid']).'" method="post" enctype="multipart/form-data">
	  <table>
	  <tr><td><b>'.l155.'</b>: </td><td>'.nocss($kategorie).' </td></tr>
	  <tr><td><b>'.l156.'</b>: </td><td><input type="text" name="titel" value="" size="50"></td></tr>
      <tr><td><b>'.l157.'</b>: </td><td>';
$codebody .= '<div id="beitrag"> 
 <div id="smilies2">';
$smiliesql = "SELECT id, title, url, color FROM ".$PREFIX."_smilies WHERE color='green'";
$dbpre8 = $dbc->prepare($smiliesql);
$dbpre8->execute();
    while ($smilieu = $dbpre8->fetch(PDO::FETCH_ASSOC)) {
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
     $codebody .= '<textarea id="nachricht" name="body" cols="55" rows="15">';
if (isset($_GET['quoteid'])) {
	  $quotesql = "
	  SELECT
            id,
            autor_id,
			topic_id,
			title,
			post,
            date
        FROM
            ".$PREFIX."_posts
	    WHERE id = '".presql($_GET['quoteid'])."'
	  ";
	   $dbpre9 = $dbc->prepare($quotesql);
	   $dbpre9->execute();
    if ($dbpre9->rowCount() < 1) {
	    $codebody .= l158;
	}
    while ($orow = $dbpre9->fetch(PDO::FETCH_ASSOC)) {
	$quotepost = nocss($orow['post']);
	$quote = '[quote]'.$quotepost.'[/quote]';
	}
$codebody .= $quote;
}
$codebody .= '</textarea></td></tr>
	  </table>
      <input name="submit" type="submit" value="'.l150.'">
      </form>';
}
}


else {
$dbpre10 = $dbc->prepare('SELECT COUNT(*) as `total` FROM `'.$PREFIX.'_posts` WHERE topic_id = '.presql($_GET['id']).'');
$dbpre10->execute();
$row_total = $dbpre10->fetch(PDO::FETCH_ASSOC);
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
            autor_id,
			topic_id,
			title,
			post,
            date
        FROM
            ".$PREFIX."_posts
		WHERE topic_id  = '".presql($_GET['id'])."'
        ORDER BY
            date
		LIMIT
		    ".$limit.", ".$ergebnisse_pro_seite."
		";
    $sqltit = "SELECT
            id,
            autor_id,
			topic_id,
			title,
			post,
            date
        FROM
            ".$PREFIX."_posts
		WHERE topic_id  = '".presql($_GET['id'])."'
        ORDER BY
            date
		LIMIT
		    1
		";
    $dbpre11 = $dbc->prepare($sqltit);
    $dbpre11->execute();
while ($rowtit = $dbpre11->fetch(PDO::FETCH_ASSOC)) {
$title = ''.nocss($rowtit['title']).' - '.$site_title.'';
}
if(isset($_SESSION['id']))
	{
$codebody .= '<div class="newbutton"><a href="index.php?type=topic&action=newpost&topicid='.nocss($_GET['id']).'">'.l159.'</a></div>';
}
if (empty($_GET['seite_nr'])) {
    $quseite = '';
} else {
    $quseite = '&seite_nr='.nocss($_GET['seite_nr']).'';
    if ($quseite > $gesamt_seiten) {
        $quseite = '';
    }
}
$codebody .= '<a target="_blank" href="rss/topic.php?id='.nocss($_GET['id']).''.$quseite.'"><img title="RSS" src="images/icons/mix/rss.png" alt="" /> '.l160.'</a>';
    $dbpre12 = $dbc->prepare($sql);
    $dbpre12->execute();
	if ($dbpre12->rowCount() < 1) {
	    $codebody .= l161;
	}
    while ($row = $dbpre12->fetch(PDO::FETCH_ASSOC)) {
		$a = "SELECT username, avatar, email, signature, website, facebook, twitter, googleplus, rang FROM ".$PREFIX."_user WHERE id=".$row['autor_id']."";
 $dbpre13 = $dbc->prepare($a);
 $dbpre13->execute();
    while ($au = $dbpre13->fetch(PDO::FETCH_ASSOC)) {
	$user = nocss($au['username']);
	$user_email = nocss($au['email']);
	$signature = nocss($au['signature']);
	$website = nocss($au['website']);
	$facebook = nocss($au['facebook']);
	$twitter = nocss($au['twitter']);
	$googlep = nocss($au['googleplus']);
    if ($au['rang'] == '') {
	$rang = 'User';
	}
	else {
	$rang = nocss($au['rang']);
	}
	if ($au['avatar'] == '') {
	$avatar = $site_url.'/images/icons/standard/avatar.png';
	}
	else {
	$avatar = $site_url.'/images/avatare/'.nocss($au['avatar']);
	}
	}
$codebody .= '<div class="post2" id="'.nocss($row['id']).'">
<div class="post">
<div class="postinfos">
<b>'.l162.':</b> <a href="index.php?type=user&id='.nocss($row['autor_id']).'">'.$user.'</a><br>
<b>'.l163.':</b> '.$rang.'<br>';
$grav_url = "http://www.gravatar.com/avatar/".md5(strtolower(trim($user_email)))."?d=".urlencode($avatar)."&s=150";
$codebody .= "<img class=\"avatar\" src='".$grav_url."' alt='' />";
$codebody .= '<br>';
if(isset($_SESSION['id']))
	{
$codebody .='<a href="index.php?type=messages&action=write&userid='.nocss($row['autor_id']).'">
<img title="'.l164.'" src="images/icons/standard/15brief.png" alt="" /></a>'; 
}
if ($website == '') {}
else {
$codebody .= '<a target="_blank" href="referrer.php?'.$website.'">
<img title="Homepage" src="images/icons/standard/15homepage.png" alt="" /></a>'; 
}
if ($facebook == '') {}
else {
$codebody .= '<a target="_blank" href="referrer.php?'.$facebook.'">
<img title="Facebook" src="images/icons/mix/facebook.png" alt="" /></a>'; 
}
if ($twitter == '') {}
else {
$codebody .= '<a target="_blank" href="referrer.php?'.$twitter.'">
<img title="Twitter" src="images/icons/mix/twitter.png" alt="" /></a>'; 
}
?>
<?php
if ($googlep == '') {}
else {
$codebody .= '<a target="_blank" href="referrer.php?'.$googlep.'">
<img title="Google+" src="images/icons/mix/google.png" alt="" /></a>';
}
$codebody .= '<a target="_blank" href="rss/userposts.php?id='.nocss($row['autor_id']).'">
<img title="RSS" src="images/icons/mix/rss.png" alt="" /></a> 
</div>
<div class="postmain">
<div class="pdinfos" style="text-shadow: 0 0 0.2em #000000, 0 0 0.5em #000000;">';
if($row['title'] == '') {}
else {
$codebody .= '<h2>'.nocss($row['title']).'</h2>';
}
$codebody .= l310.':'.nocss($row['date']).'';
$codebody .= '</div>
<div class="posttext">';
$codebody .= nl2p(parse_bbcode($row['post']));
$codebody .= '</div>';
if ($signature == '') {}
else {
$codebody .= '
<div class="postsignature">';
$codebody .= nl2p(parse_bbcode($signature));
$codebody .= '</div>';
}
$codebody .= '
</div>
<div class="postfunc">
<a href="index.php?type=topic&id='.nocss($row['topic_id']).''.$quseite.'#'.nocss($row['id']).'">
<img title="'.l165.'" src="images/icons/mix/link.png" alt="" /></a><br>';
if(isset($_SESSION['id']))
	{
$codebody .= '<a href="index.php?type=topic&action=newpost&topicid='.nocss($row['topic_id']).'&quoteid='.nocss($row['id']).'">
<img title="'.l166.'" src="images/icons/mix/quote.png" alt="" /></a>';
if($_SESSION['id'] == $row['autor_id'])
	{
$codebody .= '
<a href="index.php?type=topic&action=edit&topicid='.nocss($row['topic_id']).'&postid='.nocss($row['id']).'">
<img title="Edit" src="images/icons/silk/page_white_edit.png" alt="" /></a>';
}
}
$codebody .= '
</div>
</div>
</div>';
    }
	if ($gesamte_anzahl <= $ergebnisse_pro_seite) {}
	else {
	for ($i=1; $i<=$gesamt_seiten; ++$i) {
    if ($seite == $i) {
        $codebody .= '<div class="seitenr"><a href="index.php?type=topic&id='.nocss($_GET['id']).'&seite_nr='.$i.'" style="font-weight: bold;">'.$i.'</a></div>';
    } else {
        $codebody .= '<div class="seitenr2"><a href="index.php?type=topic&id='.nocss($_GET['id']).'&seite_nr='.$i.'">'.$i.'</a></div>';
    }
}
}
if(isset($_SESSION['id']))
	{
$codebody .= '<div class="newbutton"><a href="index.php?type=topic&action=newpost&topicid='.nocss($_GET['id']).'">'.l159.'</a></div>';
?>
<?php
}
}
?>
