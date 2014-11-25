<?php
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
$sql = "SELECT
            id,
            type,
            name
        FROM
            ".$PREFIX."_menue
        WHERE
            type = 'header'";
$dbpre = $dbc->prepare($sql);
$dbpre->execute();
while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$menue_header_id = nocss($row['id']);
$menue_header_name = nocss($row['name']);
}
$sql = "SELECT
            id,
            type,
            name
        FROM
            ".$PREFIX."_menue
        WHERE
            type = 'footer'";
$dbpre = $dbc->prepare($sql);
$dbpre->execute();
while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$menue_footer_id = nocss($row['id']);
$menue_footer_name = nocss($row['name']);
}
$sql = "SELECT
            id,
            name,
            url,
            lang
        FROM
            ".$PREFIX."_links
        WHERE
            menue_id = '".$menue_footer_id."'
        AND
            lang = '".presql($lang)."'";
$dbpre = $dbc->prepare($sql);
$dbpre->execute();
while($row = $dbpre->fetch(PDO::FETCH_OBJ))
{
    $footer_menue .= '<li><a href="'.nocss($row->url).'">'.nocss($row->name).'</a></li>';
}
if($lang == "de")
  {
$footer_menue .= "<li><a href=\"index.php?lang=en\">English</a></li>";
}
else {
$footer_menue .= "<li><a href=\"index.php?lang=de\">Deutsch</a></li>";	
}
$sql = "SELECT
            id,
            name,
            url,
            lang
        FROM
            ".$PREFIX."_links
        WHERE
            menue_id = '".$menue_header_id."'
        AND
            lang = '".presql($lang)."'";
$dbpre = $dbc->prepare($sql);
$dbpre->execute();
while($row = $dbpre->fetch(PDO::FETCH_OBJ))
{
$flsite = $row->url;
$sksite = '?site='.$site;	
if ($flsite == $sksite) {$act = "class=\"active\"";} else {$act = '';}
    $header_menue .= "<li ".$act."><a href=\"".nocss($row->url)."\">".nocss($row->name)."</a></li>";
}
if(isset($_SESSION['id']))
{
	$flsite = '?type=profile';
    $sksite = '?type='.$type;	
	if ($flsite == $sksite) {$act = "class=\"active\"";} else {$act = '';}
	$header_menue .= "<li ".$act."><a href=\"index.php?type=profile\">".w112."</a></li>";
    $flsite = '?type=messages';
    $sksite = '?type='.$type;	
	if ($flsite == $sksite) {$act = "class=\"active\"";} else {$act = '';}
	$header_menue .= "<li ".$act."><a href=\"index.php?type=messages\">".w113."</a></li>";
	$flsite = '?type=logout';
    $sksite = '?type='.$type;	
	if ($flsite == $sksite) {$act = "class=\"active\"";} else {$act = '';}
	$header_menue .= "<li ".$act."><a href=\"index.php?type=logout\">".w114."</a></li>";
}
else
{
	$flsite = '?type=login';
    $sksite = '?type='.$type;	
	if ($flsite == $sksite) {$act = "class=\"active\"";} else {$act = '';}
	$header_menue .= "<li ".$act."><a href=\"index.php?type=login\">".w115."</a></li>";
	$flsite = '?type=register';
    $sksite = '?type='.$type;	
	if ($flsite == $sksite) {$act = "class=\"active\"";} else {$act = '';}
	$header_menue .= "<li ".$act."><a href=\"index.php?type=register\">".w116."</a></li>";
}
?>
