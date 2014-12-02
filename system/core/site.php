<?php
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
$site = presql($_GET['site']);
$sql = "SELECT
            id,
            name,
            cache
        FROM
            ".$PREFIX."_sites
        WHERE
            lang = '".$lang."'
        AND
            name = '".$site."'
		";
$dbpre = $dbc->prepare($sql);
$dbpre->execute();
while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
	$siteid = nocss($row['id']);
	$sitecache = nocss($row['cache']);
	$sitecachename = nocss($row['name']);
}
if($sitecache == '1') { include 'system/inc/cache.php'; }
$sql = "SELECT
            code
        FROM
            ".$PREFIX."_apps
        WHERE
            type_id = '".$siteid."'
        AND
            type = 'site'
		";
$dbpre = $dbc->prepare($sql);
$dbpre->execute();
while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
	$app = $row['code'];
}
eval ($app);
$filename = 'themes/'.$site_template.'/site.php';
if (file_exists($filename)) {
include_once $filename;
}
else {
include_once 'themes/default/site.php';
}
?>
