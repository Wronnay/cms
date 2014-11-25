<?php
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
// WCMS: DEBUG ON = 1 | OFF = 0
$wcmsDEBUG = '0';
$THVERS = '1.0';
if($wcmsDEBUG == '1') {
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
}
else {
error_reporting(0);
}
ini_set('session.use_only_cookies', 1);
session_start();
ob_start();
if($wcmsDEBUG == '1') {
echo '<h1>Debug Mode:</h1>';
}
require_once 'system/core/core.php';
if($wcmsDEBUG == '1') {
echo $errorvars;
}
ob_end_flush();
?>
