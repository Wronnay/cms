<?php
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
$codebody .= '<article>';
$title = ''.l44.' - '.$site_title.'';
include 'system/inc/check.php';
$codebody .= '<div style="float:left; padding:10px; border-radius: 15px; box-shadow:inset 0px 0px 15px #cccccc;">
<b>'.l44.':</b><br>
<a href="index.php?type=messages&action=box"> '.l45.'</a><br>
<a href="index.php?type=messages&action=outbox"> '.l46.'</a><br>
<a href="index.php?type=messages&action=write"> '.l47.'</a><br>
</div>
<div style="float:left; padding:15px;">';
switch($_GET["action"]){
  case "":
$codebody .= '<h2>'.l48.':</h2><p>';
    $sql = "SELECT
	                ID,
	                userFrom,
					userTo,
					subject,
					body,
					readen,
					inbox_delete,
					DATE_FORMAT(`sendtime`, '%d.%m.%Y - %H:%i:%s') as `send`
            FROM
                    ".$PREFIX."_nachrichten
			WHERE 
			        inbox_delete = '0'
			AND
			        userTo = '".$_SESSION['id']."'
            ORDER BY
                    sendtime DESC
			LIMIT
			        5
           ";
    $dbpre = $dbc->prepare($sql);
    $dbpre->execute();
			if ($dbpre->rowCount() < 1) {
	    $codebody .= l49;
	}
    while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$codebody .= '<a href="index.php?type=messages&action=box&id='.nocss($row['ID']).'&option=delete"><img title="'.l62.'" src="images/icons/standard/close2r.png" alt="" /></a>
 <a href="index.php?type=messages&action=box&id='.nocss($row['ID']).'">'.nocss($row['subject']).'</a>
 ('.l50.': '.nocss($row['send']).') <br>';
	}
$codebody .= '</p>';
break;
case "write":
  if(isset($_POST['submit']) AND $_POST['submit'] == l52) {
        if(empty($_REQUEST['userTo']) || empty($_REQUEST['subject']) || empty($_REQUEST['body']))
      {
        $codebody .= l38;
      }
	    else {
			if (!is_numeric($_REQUEST['userTo'])) {
				$auesql1 = "
				SELECT
				id
				FROM
				".$PREFIX."_user
				WHERE username  = '".presql($_REQUEST['userTo'])."'
				";
				$dbpre1m = $dbc->prepare($auesql1);
				$dbpre1m->execute();
				while ($auerow1 = $dbpre1m->fetch(PDO::FETCH_ASSOC)) {
				$_REQUEST['userTo'] = $auerow1['id'];
				}
			}
          $auesql = "
        SELECT
            email
        FROM
            ".$PREFIX."_user
	    WHERE id  = '".presql($_REQUEST['userTo'])."'
	  ";
	   $dbpre = $dbc->prepare($auesql);
	   $dbpre->execute();
	   while ($auerow = $dbpre->fetch(PDO::FETCH_ASSOC)) {
		  $autoremail = $auerow['email'];
   }
	  $bodynachricht = presql($_REQUEST['body']);
	  $sql = "INSERT INTO ".$PREFIX."_nachrichten (userFrom, userTo, subject, body, sendtime) VALUES ('".$_SESSION['id']."','".presql($_REQUEST['userTo'])."','".presql($_REQUEST['subject'])."','".$bodynachricht."', now())";
	  $dbpre = $dbc->prepare($sql);
	  $dbpre->execute();
	  $ID = $dbc->lastInsertId();
$from = "From: ".$site_email."\n";
$from .= "Content-Type: text/html; charset=".$CHARSET."\n";
if($site_user_act == '1') { mail(presql(trim($autoremail)), l314, "".l315." "."<br>"."<a href=\"".$site_url."/index.php?type=messages&action=box&id=".$ID."\">".$site_url."/index.php?type=messages&action=box&id=".$ID."</a>", $from); }
	  $codebody .= l51;
	}
  }
  $codebody .= '<form action="index.php?type=messages&action=write" method="post" enctype="multipart/form-data">';
if (isset($_GET["userid"])) { $userid = nocss($_GET["userid"]); } else { $userid = 'Username'; }
if (isset($_GET["userid"])) { $readfunc = 'readonly'; } else { $readfunc = "onclick=\"if(this.value && this.value==this.defaultValue)this.value=''\""; }
if (isset($_GET["subject"])) { $subj = nocss($_GET["subject"]); } else { $subj = ''; }
$codebody .= '<table>
	  <tr><td><b>'.l53.'</b>: </td><td>
	  <input type="text" name="userTo" value="'.$userid.'" size="25" '.$readfunc.'></td></tr>
	  <tr><td><b>'.l54.'</b>: </td><td><input type="text" name="subject" value="'.$subj.'" size="50"></td></tr>
      <tr><td><b>'.l55.'</b>: </td><td>';
$codebody .= '<div id="beitrag"> 
 <div id="smilies2">';
$smiliesql = "SELECT id, title, url, color FROM ".$PREFIX."_smilies WHERE color='green'";
$dbpre = $dbc->prepare($smiliesql);
$dbpre->execute();
    while ($smilieu = $dbpre->fetch(PDO::FETCH_ASSOC)) {
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
      <input name="submit" type="submit" value="'.l52.'">
      </form>';
break;
case "box":
if (isset($_GET["id"])) {
if ($_GET["option"] == 'delete') {
$dbpre = $dbc->prepare("UPDATE ".$PREFIX."_nachrichten SET inbox_delete = '1' WHERE ID = '".presql($_GET["id"])."'"); 
$dbpre->execute();
$codebody .= l56;
}
else {
$dbpre = $dbc->prepare("UPDATE ".$PREFIX."_nachrichten SET readen = '1' WHERE ID = '".presql($_GET["id"])."'"); 
$dbpre->execute();
    $sql = "SELECT
	                ID,
	                userFrom,
					userTo,
					subject,
					body,
					readen,
					inbox_delete,
					DATE_FORMAT(`sendtime`, '%d.%m.%Y - %H:%i:%s') as `send`
            FROM
                    ".$PREFIX."_nachrichten
			WHERE 
			        inbox_delete = '0'
			AND
			        userTo = '".$_SESSION['id']."'
			AND
			        ID = '".presql($_GET["id"])."'
			LIMIT
			        1
           ";
    $dbpre = $dbc->prepare($sql);
    $dbpre->execute();
	if ($dbpre->rowCount() < 1) {
	    $codebody .= l57;
	}
    while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
		$a = "SELECT username FROM ".$PREFIX."_user WHERE id=".$row['userFrom'].";";
 $a_result = $dbpre = $dbc->prepare($a);
 $dbpre->execute();
    while ($au = $dbpre->fetch(PDO::FETCH_ASSOC)) {
	$fromuser = nocss($au['username']);
	}
	$codebody .= '<h2>'.nocss($row['subject']).':</h2>';
$codebody .= '<p>
<b>'.l58.'</b>: <a href="index.php?type=user&id='.nocss($row['userFrom']).'">'.$fromuser.'</a><br>
<b>'.l59.'</b>: '.nocss($row['send']).'<br>
</p><p>
'.nl2p(parse_bbcode($row['body'])).'
</p>
<h2>'.l60.':</h2>
<p>
<a href="index.php?type=messages&action=write&userid='.nocss($row['userFrom']).'&subject=RE: '.nocss($row['subject']).'">
<img src="images/icons/standard/brief3.png" alt="" /> '.l61.'</a><br>
<a href="index.php?type=messages&action=box&id='.nocss($row['ID']).'&option=delete"><img title="Löschen" src="images/icons/standard/close2r.png" alt="" /> '.l62.'</a>';
	}
 }} else {
$codebody .= l63;
    $sql = "SELECT
	                ID,
	                userFrom,
					userTo,
					subject,
					body,
					readen,
					inbox_delete,
					DATE_FORMAT(`sendtime`, '%d.%m.%Y - %H:%i:%s') as `send`
            FROM
                    ".$PREFIX."_nachrichten
			WHERE 
			        inbox_delete = '0'
			AND
			        userTo = '".$_SESSION['id']."'
            ORDER BY
                    sendtime DESC
           ";
    $dbpre = $dbc->prepare($sql);
    $dbpre->execute();
	if ($dbpre->rowCount() < 1) {
	    $codebody .= l64;
	}
    while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$codebody .= '<a href="index.php?type=messages&action=box&id='.nocss($row['ID']).'&option=delete"><img title="'.l62.'" src="images/icons/standard/close2r.png" alt="" /></a>
 <a href="index.php?type=messages&action=box&id='.nocss($row['ID']).'">'.nocss($row['subject']).'</a>
 ('.l59.': '.nocss($row['send']).') <br>';
	}
$codebody .= '</p>';
}
break;
case "outbox":
if (isset($_GET["id"])) {
if ($_GET["option"] == 'delete') {
$dbpre = $dbc->prepare("UPDATE ".$PREFIX."_nachrichten SET outbox_delete = '1' WHERE ID = '".presql($_GET["id"])."'"); 
$dbpre->execute();
$codebody .= l65;
}
else {
    $sql = "SELECT
	                ID,
	                userFrom,
					userTo,
					subject,
					body,
					readen,
					outbox_delete,
					DATE_FORMAT(`sendtime`, '%d.%m.%Y - %H:%i:%s') as `send`
            FROM
                    ".$PREFIX."_nachrichten
			WHERE 
			        outbox_delete = '0'
			AND
			        userFrom = '".$_SESSION['id']."'
			AND
			        ID = '".presql($_GET["id"])."'
			LIMIT
			        1
           ";
    $dbpre = $dbc->prepare($sql);
    $dbpre->execute();
	if ($dbpre->rowCount() < 1) {
$codebody .= l66;
	}
    while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
if ($row['readen'] == '1') { $gelesen = l67; } else { $gelesen = l68; }
$codebody .= '<h2>'.nocss($row['subject']).':</h2>';
$codebody .= '<p>
<b>'.l59.'</b>: '.nocss($row['send']).'<br>
<b>'.l69.'</b>: '.$gelesen.'
</p><p>
'.nl2p(parse_bbcode($row['body'])).'
</p>
<h2>'.l60.':</h2>
<p>
<a href="index.php?type=messages&action=outbox&id='.$row['ID'].'&option=delete"><img title="'.l62.'" src="images/icons/standard/close2r.png" alt="" /> '.l62.'</a>
</p>';
	}
 }} else {
$codebody .= l70;
    $sql = "SELECT
	                ID,
	                userFrom,
					userTo,
					subject,
					body,
					readen,
					outbox_delete,
					DATE_FORMAT(`sendtime`, '%d.%m.%Y - %H:%i:%s') as `send`
            FROM
                    ".$PREFIX."_nachrichten
			WHERE 
			        outbox_delete = '0'
			AND
			        userFrom = '".$_SESSION['id']."'
            ORDER BY
                    sendtime DESC
           ";
    $dbpre = $dbc->prepare($sql);
    $dbpre->execute();
	if ($dbpre->rowCount() < 1) {
$codebody .= l71;
	}
    while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$codebody .= '<a href="index.php?type=messages&action=outbox&id='.nocss($row['ID']).'&option=delete"><img title="'.l62.'" src="images/icons/standard/close2r.png" alt="" /></a> 
<a href="index.php?type=messages&action=outbox&id='.nocss($row['ID']).'">'.nocss($row['subject']).'</a> 
('.l59.': '.nocss($row['send']).')<br>';
	}
echo '</p>';
}
break;
}
$codebody .= '</div>';
$codebody .= '</article>';
?>
