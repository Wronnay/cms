<?php
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
if(!isset($_SESSION['id']))
{
header("Location: index.php");
exit();
}
?>
