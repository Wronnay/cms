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
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">'.$template_meta.'';
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
echo '    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">'.$site_title.'</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
';
echo $template_header;
echo $template_footer;
echo '          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">

      <div class="starter-template">';
echo $appbody;
echo $body;
echo $codebody;
echo '
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<div id="made"><div style="line-height:30px;">'.w122.'</div> <a href="http://cms.wronnay.net" target="_blank"><img alt="" src="design/pics/system/madewcms.png"></a></div>
</body></html>
';
?>
