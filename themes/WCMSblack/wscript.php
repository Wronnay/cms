<?php
$sql = "SELECT id, autor_id, title, news, date, description, keywords FROM ".$PREFIX."_news WHERE lang = '".$_SESSION['lang']."' ORDER BY date DESC LIMIT 5";
    $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
    while ($row = mysql_fetch_assoc($result)) {
$sql551 = "SELECT
	        username
            FROM
                    ".$PREFIX."_user
            WHERE
			        id = '".$row['autor_id']."'";
    $result551 = mysql_query($sql551) OR die("<pre>\n".$sql551."</pre>\n".mysql_error());
    while ($row551 = mysql_fetch_assoc($result551)) { $autor = $row551['username']; }
    
$shownews .= '<article class="box"><h2><a href="index.php?type=news&type_id='.nocss($row['id']).'">'.nocss($row['title']).'</a></h2><div class="notes">'.w118.': <a href="index.php?type=user&id='.nocss($row['autor_id']).'">'.nocss($autor).'</a> | '.w119.': '.nocss($row['date']).'</div><p>' . $row['news'] . '</p></article>';
}
$sql = "SELECT id, autor_id, title, news, date, description, keywords FROM ".$PREFIX."_news WHERE lang = '".$_SESSION['lang']."' ORDER BY date DESC";
    $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
    while ($row = mysql_fetch_assoc($result)) {
$sql551 = "SELECT
	        username
            FROM
                    ".$PREFIX."_user
            WHERE
			        id = '".$row['autor_id']."'";
    $result551 = mysql_query($sql551) OR die("<pre>\n".$sql551."</pre>\n".mysql_error());
    while ($row551 = mysql_fetch_assoc($result551)) { $autor = $row551['username']; }
    
$longnews .= '<article class="box"><h2><a href="index.php?type=news&type_id='.nocss($row['id']).'">'.nocss($row['title']).'</a></h2><div class="notes">'.w118.': <a href="index.php?type=user&id='.nocss($row['autor_id']).'">'.nocss($autor).'</a> | '.w119.': '.nocss($row['date']).'</div><p>' . $row['news'] . '</p></article>';
}
$body = parse_bbcode($body);
$body = str_replace('#showline', '<div class="featbox">', $body);
$body = str_replace('#/showline', '</div>', $body);
$body = str_replace('#show', '<article class="feat"><div class="in">', $body);
$body = str_replace('#/show', '</div></article>', $body);
$body = str_replace('#box', '<article class="box">', $body);
$body = str_replace('#/box', '</article>', $body);
$body = str_replace('#boox', '<article class="boxo">', $body);
$body = str_replace('#/boox', '</article>', $body);
$body = str_replace('#title', '<h2>', $body);
$body = str_replace('#/title', '</h2>', $body);
$body = str_replace('#txt#', '<p>', $body);
$body = str_replace('#/txt#', '</p>', $body);
$body = str_replace('#notes#', '<div class="notes">', $body);
$body = str_replace('#/notes#', '</div>', $body);
$body = str_replace('#htmltags#', '<ul><li>Tags: </li>'.$htmltags.'</ul>', $body);
$body = str_replace('#news#', $shownews, $body);
$body = str_replace('#longnews#', $longnews, $body);
$body = nl2p($body);
$codebody = str_replace('#news#', $shownews, $codebody);
$codebody = str_replace('#longnews#', $longnews, $codebody);
$sql = "SELECT
            code
        FROM
            ".$PREFIX."_templates
        WHERE
            name = '".$site_template."'
        AND
            type = 'meta'";
$result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
while ($row = mysql_fetch_assoc($result)) {
$template_meta = $row['code'];
}
$sql = "SELECT
            code
        FROM
            ".$PREFIX."_templates
        WHERE
            name = '".$site_template."'
        AND
            type = 'header'";
$result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
while ($row = mysql_fetch_assoc($result)) {
$row['code'] = str_replace('#header_nav', $header_menue, $row['code']);
$template_header = $row['code'];
}
$sql = "SELECT
            code
        FROM
            ".$PREFIX."_templates
        WHERE
            name = '".$site_template."'
        AND
            type = 'footer'
		";
$result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
while ($row = mysql_fetch_assoc($result)) {
$row['code'] = str_replace('#footer_nav', $footer_menue, $row['code']);
$template_footer = $row['code'];
}
?>
