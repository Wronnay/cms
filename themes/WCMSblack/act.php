<?php
$title = ''.w140.' - '.$site_title.'';
$description = '';
$keywords = '';
if($_REQUEST['id'] && $_REQUEST['act_code'])
{
    $_REQUEST['id'] = mysql_real_escape_string($_REQUEST['id']);
    $_REQUEST['act_code'] = mysql_real_escape_string($_REQUEST['act_code']);

    $ResultPointer = mysql_query("SELECT id FROM ".$PREFIX."_user WHERE id = '".$_REQUEST['id']."' AND act_code = '".$_REQUEST['act_code']."'");

    if(mysql_num_rows($ResultPointer) > 0)
    {
        @mysql_query("UPDATE ".$PREFIX."_user SET act = 'yes' WHERE id = '".$_REQUEST['id']."'");
      $codebody .= "<div class=\"erfolg\">".w139."</div>";
    }
}
?>
