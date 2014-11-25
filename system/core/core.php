<?php
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
$errorvars .= '<h3>CORE LOADED</h3>';
require_once 'system/core/index.php';
$errorvars .= '<h3>INDEX LOADED</h3>';

require_once 'system/core/app.php';
$errorvars .= '<h3>APP LOADED</h3>';

if (isset($_GET['site'])) { // Wenn eine Site mitgegeben wurde
	require_once 'system/core/site.php';
}
else { // Wenn keine Unterseite angegeben wurde
	if (isset($_GET['type'])) { // Wenn ein Type angegeben ist
		require_once 'system/core/type.php';
	}
	else { // Wenn kein Type angegeben ist
		require_once 'system/core/notype.php';
	}
}
$errorvars .= '<h3>TYPE LOADED</h3>';

require_once 'system/inc/menue.php'; // Navigation
$errorvars .= '<h3>MENUE LOADED</h3>';
require_once 'themes/'.$site_template.'/template.php'; // Website Struktur
$errorvars .= '<h3>TEMPLATE LOADED</h3>';
if($sitecache == '1') {
	$content = ob_get_clean();
	$fh = fopen("system/cache/".$lang."/".$sitecachename.".html","w");
	fputs($fh, $content);
	fclose($fh);
	echo $content;
}
?>
