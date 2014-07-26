<?php
$sql = "SELECT id, autor_id, title, news, date, description, keywords FROM ".$PREFIX."_news WHERE keywords LIKE '%".presql($_GET['name'])."%' ORDER BY date DESC";
    $result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
			if (mysql_num_rows($result) == 0) {
	    $body = w117;
	}
    while ($row = mysql_fetch_assoc($result)) {
$tags = explode(", ", $row['keywords']);
for($i=0; $i < count($tags); $i++)
   {
$htmltags .= '<li><a href="?type=tag&name='.nocss($tags[$i]).'">'.nocss($tags[$i]).'</a></li> ';
   }
$comments = mysql_num_rows(mysql_query("SELECT id FROM ".$PREFIX."_comments WHERE news_id = '".$type_id."'"));
$title = ''.nocss($_GET['name']).' - '.$site_title.'';
$description = nocss($row['description']);
$keywords = nocss($row['keywords']);
$sql551 = "SELECT
	        username
            FROM
                    ".$PREFIX."_user
            WHERE
			        id = '".$row['autor_id']."'";
    $result551 = mysql_query($sql551) OR die("<pre>\n".$sql551."</pre>\n".mysql_error());
    while ($row551 = mysql_fetch_assoc($result551)) { $autor = $row551['username']; }
$codebody .= '<article class="box"><h2><a href="index.php?type=news&type_id='.nocss($row['id']).'">'.nocss($row['title']).'</a></h2><div class="notes">'.w118.': <a href="index.php?type=user&id='.nocss($row['autor_id']).'">'.nocss($autor).'</a> | '.w119.': '.nocss($row['date']).'</div><p>' . $row['news'] . '</p></article>';
}
?>
