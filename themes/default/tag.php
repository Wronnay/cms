<?php
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
$sql = "SELECT id, autor_id, title, news, date, description, keywords FROM ".$PREFIX."_news WHERE keywords LIKE '%".presql($_GET['name'])."%' ORDER BY date DESC";
    $dbpre = $dbc->prepare($sql);
    $dbpre->execute();
	if ($dbpre->rowCount() < 1) {
	    $body = w117;
	}
    while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$tags = explode(", ", $row['keywords']);
for($i=0; $i < count($tags); $i++)
   {
$htmltags .= '<li><a href="?type=tag&name='.nocss($tags[$i]).'">'.nocss($tags[$i]).'</a></li> ';
   }
   $dbpre2 = $dbc->prepare("SELECT id FROM ".$PREFIX."_comments WHERE news_id = '".$type_id."'");
   $dbpre2->execute();
$comments = $dbpre2->rowCount();
$title = ''.nocss($_GET['name']).' - '.$site_title.'';
$description = nocss($row['description']);
$keywords = nocss($row['keywords']);
$sql551 = "SELECT
	        username
            FROM
                    ".$PREFIX."_user
            WHERE
			        id = '".$row['autor_id']."'";
    $dbpre1 = $dbc->prepare($sql551);
    $dbpre1->execute();
    while ($row551 = $dbpre1->fetch(PDO::FETCH_ASSOC)) { $autor = $row551['username']; }
$codebody .= '<article class="box"><h2><a href="index.php?type=news&type_id='.nocss($row['id']).'">'.nocss($row['title']).'</a></h2><div class="notes">'.w118.': <a href="index.php?type=user&id='.nocss($row['autor_id']).'">'.nocss($autor).'</a> | '.w119.': '.nocss($row['date']).'</div><p>' . nocss2($row['news']) . '</p></article>';
}
?>
