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
            lang = '".$_SESSION['lang']."'
        AND
            name = '".$site."'
        ORDER BY
            id
		";
$result = mysql_query($sql) OR die("<pre>\n".$sql."</pre>\n".mysql_error());
if (mysql_num_rows($result) == 0) {
header("Location: system/admin/index.php");
}
while ($row = mysql_fetch_assoc($result)) {
$title = ''.nocss($row['title']).' - '.$site_title.'';
$description = nocss($row['description']);
$keywords = nocss($row['tags']);
$codebody = '<article>'.$row['text'].'</article>';
}
?>
