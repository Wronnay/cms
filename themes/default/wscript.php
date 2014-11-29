<?php
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
$sql = "SELECT id, autor_id, title, news, date, description, keywords FROM ".$PREFIX."_news WHERE lang = '".$lang."' ORDER BY date DESC LIMIT 5";
    $dbpre = $dbc->prepare($sql);
    $dbpre->execute();
    while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$sql551 = "SELECT
	        username
            FROM
                    ".$PREFIX."_user
            WHERE
			        id = '".$row['autor_id']."'";
    $dbpre1 = $dbc->prepare($sql551);
    $dbpre1->execute();
    while ($dbpre1->fetch(PDO::FETCH_ASSOC)) { $autor = $row551['username']; }
    
$shownews .= '<article class="box"><h2><a href="index.php?type=news&type_id='.nocss($row['id']).'">'.nocss($row['title']).'</a></h2><div class="notes">'.w118.': <a href="index.php?type=user&id='.nocss($row['autor_id']).'">'.nocss($autor).'</a> | '.w119.': '.nocss($row['date']).'</div><p>' . $row['news'] . '</p></article>';
}
$sql = "SELECT id, autor_id, title, news, date, description, keywords FROM ".$PREFIX."_news WHERE lang = '".$lang."' ORDER BY date DESC";
    $dbpre2 = $dbc->prepare($sql);
    $dbpre2->execute();
    while ($row = $dbpre2->fetch(PDO::FETCH_ASSOC)) {
$sql551 = "SELECT
	        username
            FROM
                    ".$PREFIX."_user
            WHERE
			        id = '".$row['autor_id']."'";
    $dbpre3 = $dbc->prepare($sql551);
    $dbpre3->execute();
    while ($row551 = $dbpre3->fetch(PDO::FETCH_ASSOC)) { $autor = $row551['username']; }
    
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
$dbpre = $dbc->prepare($sql);
$dbpre->execute();
while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
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
$dbpre = $dbc->prepare($sql);
$dbpre->execute();
while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
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
$dbpre = $dbc->prepare($sql);
$dbpre->execute();
while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$row['code'] = str_replace('#footer_nav', $footer_menue, $row['code']);
$template_footer = $row['code'];
}
?>
