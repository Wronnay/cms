<?php
$sql = "SELECT
            id,
            autor_id,
            title,
            text,
            date,
            description,
            tags,
            pic
        FROM
            ".$PREFIX."_sites
        WHERE
            lang = '".$lang."'
        AND
            name = '".$site."'
        ORDER BY
            id
		";
$dbpre = $dbc->prepare($sql);
$dbpre->execute();
if ($dbpre->rowCount() < 1) {
header("Location: system/admin/index.php");
}
while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$title = ''.nocss($row['title']).' - '.$site_title.'';
$description = nocss($row['description']);
$keywords = nocss($row['tags']);
$codebody = '<article>'.$row['text'].'</article>';
}
?>
