<?php
$title = 'Board - '.$site_title.'';
    $sql = "SELECT
            id,
            name
        FROM
            ".$PREFIX."_kat1
        WHERE
            lang = '".$_SESSION['lang']."'
        ORDER BY
            id
		";
    $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
			if (mysql_num_rows($result) == 0) {
	    $codebody .= l2;
	}
    while ($row = mysql_fetch_assoc($result)) {
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
    $result2 = mysql_query($sql2) OR die("<pre>\n".$sql2."</pre>\n".mysql_error());
			if (mysql_num_rows($result2) == 0) {
	    $codebody .= l273;
	}
    while ($row2 = mysql_fetch_assoc($result2)) {
	$last_post2 = mysql_query("SELECT id, autor_id, title, date FROM ".$PREFIX."_topics WHERE kat2_id = '".$row2['id']."' ORDER BY date DESC LIMIT 1");
	while ($last_post = mysql_fetch_assoc($last_post2)) {
 $a = "SELECT username FROM ".$PREFIX."_user WHERE id=".$last_post['autor_id'].";";
 $a_result = mysql_query($a) OR die("<pre>\n".$a."</pre>\n".mysql_error());
    while ($au = mysql_fetch_assoc($a_result)) {
	$lastpostuser = nocss($au['username']);
	}
	$lastpostid = nocss($last_post['autor_id']);
	$lastpostdate = nocss($last_post['date']);
	$lastposttitle = nocss($last_post['title']);
	$lastposttitleid = nocss($last_post['id']);
	}
	$topics = mysql_num_rows(mysql_query("SELECT id FROM ".$PREFIX."_topics WHERE kat2_id = '".$row2['id']."'"));
$codebody .= '<div class="kat2">
<div class="infos2">
<div class="lastpost2">';
if (mysql_num_rows($last_post2) == 0) {
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
