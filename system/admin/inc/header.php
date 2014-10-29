<?php
mysql_set_charset('utf8');
if($_SESSION['lang'] == "de")
  {
include '../../lang/de/1.php';
include '../../lang/forum/de/1.php';
  }
  else
  {
include '../../lang/en/1.php';
include '../../lang/forum/en/1.php';
  }
?>
<!DOCTYPE HTML>
<!--
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
-->
<html><head><title><?php echo w20; ?></title>
<meta name="description" content="<?php echo w21; ?>">
<meta name="keywords" content="<?php echo w22; ?>">
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../../design/css/admin.css">
<?php
include '../inc/showbbc.php';
?>
<script src="//cdn.ckeditor.com/4.4.5/full/ckeditor.js"></script>
</head><body><header>
<div class="logo"><a href="http://cms.wronnay.net" target="_blank"><img alt="" src="../../design/pics/system/admin.png"></a></div>
    <nav>
      <ul>
<li><a href="../../index.php"><?php echo w23; ?></a></li>
<li><a href="index.php?lang=de"><?php echo w24; ?></a></li>
<li><a href="index.php?lang=en"><?php echo w25; ?></a></li>
<li><a href="logout.php"><?php echo w26; ?></a></li>
      </ul>
    </nav>
</header>
<div style="margin-top:30px;"></div>
<aside>
    <nav>
      <ul>
<li><a href="index.php"><?php echo w27; ?></a></li>
<?php
if($CODE == '1') {
?>
<li><a href="apps.php"><?php echo w28; ?></a></li>
<?php
}
?>
<li><a href="cats.php"><?php echo w29; ?></a></li>
<li><a href="comments.php"><?php echo w30; ?></a></li>
<li><a href="data.php"><?php echo w31; ?></a></li>
<li><a href="design.php"><?php echo w32; ?></a></li>
<li><a href="links.php"><?php echo w33; ?></a></li>
<li><a href="menue.php"><?php echo w34; ?></a></li>
<li><a href="news.php"><?php echo w35; ?></a></li>
<li><a href="posts.php"><?php echo w36; ?></a></li>
<li><a href="sites.php"><?php echo w37; ?></a></li>
<li><a href="topics.php"><?php echo w38; ?></a></li>
<li><a href="users.php"><?php echo w39; ?></a></li>
<?php
if($CODE == '1') {
?>
<li><a href="newsletter.php"><?php echo w131; ?></a></li>
<?php
}
?>
      </ul>
    </nav>
</aside>
