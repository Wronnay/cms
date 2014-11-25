<?php
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
$title = ''.w140.' - '.$site_title.'';
$description = '';
$keywords = '';
if($_REQUEST['id'] && $_REQUEST['act_code'])
{
    $_REQUEST['id'] = presql($_REQUEST['id']);
    $_REQUEST['act_code'] = presql($_REQUEST['act_code']);

    $dbpre = $dbc->prepare("SELECT id FROM ".$PREFIX."_user WHERE id = '".$_REQUEST['id']."' AND act_code = '".$_REQUEST['act_code']."'");
	$dbpre->execute();
    if($dbpre->rowCount() > 0)
    {
        $dbpre = $dbc->prepare("UPDATE ".$PREFIX."_user SET act = 'yes' WHERE id = '".$_REQUEST['id']."'");
        $dbpre->execute();
      $codebody .= "<div class=\"erfolg\">".w139."</div>";
    }
}
?>
