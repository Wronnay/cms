<?php
include 'themes/'.$site_template.'/wscript.php';
echo '<!DOCTYPE HTML>';
echo '
<!--
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
-->
<!--
Design by Christoph Miksche
Website: http://celzekr.webpage4.me/
License: Attribution-NonCommercial-ShareAlike 3.0 Unported (CC BY-NC-SA 3.0)

Dieses Werk bzw. Inhalt steht unter einer Creative Commons Namensnennung-Nicht-kommerziell-
Weitergabe unter gleichen Bedingungen 3.0 Unported Lizenz.

Sie duerfen den/die Link/s zu http://celzekr.webpage4.me/ nicht entfernen!

(http://creativecommons.org/licenses/by-nc-sa/3.0/)
-->';
echo '
<html><head><title>'.$title.'</title>
<meta name="Generator" content="WronnayCMS (http://cms.wronnay.net)" />
<meta name="description" content="'.$description.'">
<meta name="keywords" content="'.$keywords.'">
<meta charset="'.$CHARSET.'"><link rel="shortcut icon" href="'.$site_favicon.'">
<link rel="stylesheet" type="text/css" href="design/main.css.php">'.$template_meta.'';
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
echo '<div id="xbody"><!--header-->
 <div id="hn">'.$site_title.'</div>
 <!--header end-->
 <div id="p">';
echo $appbody;
echo $body;
echo $codebody;
echo $template_header;
echo $template_footer;
echo '
<div id="f">
		 <!--Den Link nicht entfernen!-->
<a href="http://celzekr.webpage4.me/">Designed by celzekr</a>
<!--Den Link nicht entfernen! end-->
 </div></div>
<div id="made"><div style="line-height:30px;">'.w122.'</div> <a href="http://cms.wronnay.net" target="_blank"><img alt="" src="design/pics/system/madewcms.png"></a></div>
</body></html>
';
?>
