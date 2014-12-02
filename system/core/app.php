<?php
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
$sql = "SELECT
            code
        FROM
            ".$PREFIX."_apps
        WHERE
            type = 'general'
		";
$dbpre = $dbc->prepare($sql);
$dbpre->execute();
while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
	$allapp = $row['code'];
}
eval ($allapp);
?>
