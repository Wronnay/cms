<?php
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
$type = presql($_GET['type']);
$type_id = presql($_GET['type_id']);
$sql = "SELECT
            code
        FROM
            ".$PREFIX."_apps
        WHERE
            type_id = '".$type_id."'
        AND
            type = '$type'
		";
$dbpre = $dbc->query($sql);
while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
	$app = $row['code'];
}
eval ($app);
include 'system/inc/type.php';
?>
