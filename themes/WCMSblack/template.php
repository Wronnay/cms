<?php
include 'themes/default/wscript.php';
echo '<!DOCTYPE HTML>';
echo '
<!--
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
-->';
echo '
<html><head><title>'.$title.'</title>
<meta name="Generator" content="WronnayCMS (http://cms.wronnay.net)" />
<meta name="description" content="'.$description.'">
<meta name="keywords" content="'.$keywords.'">
<meta charset="'.$CHARSET.'"><link rel="shortcut icon" href="'.$site_favicon.'">
<link rel="stylesheet" type="text/css" href="design/main.css.php">
'.$template_meta.'';
include 'system/inc/showbbc.php';
echo '</head><body>';
	if(isset($_SESSION['ADMINid']))
	{
?>
<div id="admin-header">
<div class="ahlogo"><a href="http://cms.wronnay.net" target="_blank"><img alt="" src="design/pics/system/admin.png"></a></div>
    <nav>
      <ul>
<li><a href="system/admin/index.php"><?php echo w27; ?></a></li>
<li><a href="index.php?lang=de"><?php echo w24; ?></a></li>
<li><a href="index.php?lang=en"><?php echo w25; ?></a></li>
<li><a href="system/admin/logout.php"><?php echo w26; ?></a></li>
      </ul>
    </nav>
</div>
<div style="margin-top:30px;"></div>
<?php
	}
echo $template_header;
echo $appbody;
echo $body;
echo $codebody;
echo $template_footer;
echo '
<div id="made"><div style="line-height:30px;"><a href="system/admin/index.php">'.w152.'</a></div></div>
</body></html>
';
?>
