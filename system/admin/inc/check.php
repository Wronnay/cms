<?php
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
	@session_start();

	if(!isset($_SESSION['ADMINid']))
	{
	    header("Location: login.php");
		exit;
	}
?>
