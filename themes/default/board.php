<?php
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
$title = 'Board - '.$site_title.'';
    $sql = "SELECT
            id,
            name
        FROM
            ".$PREFIX."_kat1
        WHERE
            lang = '".$lang."'
        ORDER BY
            id
		";
    $dbpre = $dbc->prepare($sql);
    $dbpre->execute();
	if ($dbpre->rowCount() < 1) {
	    $codebody .= l2;
	}
    while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$codebody .= '<div class="kat">
<div class="infos"><div class="lastpost">'.l271.'</div><div class="topics">'.l272.'</div></div>
<div class="title">
'.nocss($row['name']).'
</div>';
    $sql2 = "SELECT
            id,
            name,
			kat1_id,
			beschreibung
        FROM
            ".$PREFIX."_kat2
	    WHERE kat1_id  = '".presql($row['id'])."'
        ORDER BY
            id
		";
    $dbpre2 = $dbc->prepare($sql2);
    $dbpre2->execute();
			if ($dbpre2->rowCount() < 1) {
	    $codebody .= l273;
	}
    while ($row2 = $dbpre2->fetch(PDO::FETCH_ASSOC)) {
	$dbpre3 = $dbc->prepare("SELECT id, autor_id, title, date FROM ".$PREFIX."_topics WHERE kat2_id = '".$row2['id']."' ORDER BY date DESC LIMIT 1");
	$dbpre3->execute();
	while ($last_post = $dbpre3->fetch(PDO::FETCH_ASSOC)) {
 $a = "SELECT username FROM ".$PREFIX."_user WHERE id=".$last_post['autor_id'].";";
 $dbpre4 = $dbc->prepare($a);
 $dbpre4->execute();
    while ($au = $dbpre4->fetch(PDO::FETCH_ASSOC)) {
	$lastpostuser = nocss($au['username']);
	}
	$lastpostid = nocss($last_post['autor_id']);
	$lastpostdate = nocss($last_post['date']);
	$lastposttitle = nocss($last_post['title']);
	$lastposttitleid = nocss($last_post['id']);
	}
	$dbpre5 = $dbc->prepare("SELECT id FROM ".$PREFIX."_topics WHERE kat2_id = '".$row2['id']."'");
	$dbpre5->execute();
	$topics = $dbpre5->rowCount();
$codebody .= '<div class="kat2">
<div class="infos2">
<div class="lastpost2">';
if ($dbpre3->rowCount() < 1) {
$codebody .= l309;
	}
else {
$codebody .= '<a href="index.php?type=topic&id='.$lastposttitleid.'">'.$lastposttitle.'</a><br>'.l274.': <a href="index.php?type=user&id='.$lastpostid.'">'.$lastpostuser.'</a> '.l275.': '.$lastpostdate.'';
}
$codebody .= '</div>
<div class="topics2">'.nocss($topics).'</div></div>
<a href="index.php?type=forum&id='.nocss($row2['id']).'">'.nocss($row2['name']).'</a><br>
'.nocss($row2['beschreibung']).'
</div>';
    }
$codebody .= '</div>';
    }
?>
