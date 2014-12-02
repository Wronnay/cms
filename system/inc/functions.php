<?php
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
$filename = "system/inc/functions/system.php";
if (file_exists($filename)) {
include_once $filename;
}
elseif (file_exists('../'.$filename)) {
include_once '../'.$filename;
}
elseif (file_exists('../../'.$filename)) {
include_once '../../'.$filename;
}
$filename = "system/inc/functions/wcms_site.php";
if (file_exists($filename)) {
include_once $filename;
}
elseif (file_exists('../'.$filename)) {
include_once '../'.$filename;
}
elseif (file_exists('../../'.$filename)) {
include_once '../../'.$filename;
}
?>
