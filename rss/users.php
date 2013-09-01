<?php
header('Content-Type: application/rss+xml; charset=UTF-8');
error_reporting(0);
include '../system/inc/config.php';
mysql_connect($HOST,$USER,$PW)or die(mysql_error());
mysql_select_db($DB)or die(mysql_error());
mysql_set_charset('utf8');
include '../system/inc/functions.php';
ini_set("session.gc_maxlifetime", 2000);
$default_lang = 'en';
if(!isset($_SESSION['lang']))
{
    if (isset($_SERVER['HTTP_ACCEPT_LANGUAGE']))
    {
      $_SESSION['lang'] = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
    }
	else
    {
	$_SESSION['lang'] = 'en';
    }
}
if(isset($_GET['lang']))
{
    $_SESSION['lang'] = $_GET['lang'];
}
if($_SESSION['lang'] == "de")
  {
include '../lang/de/1.php';
include '../lang/forum/de/1.php';
  }
  else
  {
include '../lang/en/1.php';
include '../lang/forum/en/1.php';
  }
include '../system/inc/data.php';
echo "<?xml version=\"1.0\" encoding=\"UTF-8\" ?><rss version=\"2.0\" xmlns:atom=\"http://www.w3.org/2005/Atom\">";
?>
    <channel>
      <title><?php echo l302; ?> - <?php echo $site_title; ?></title>
      <link><?php echo $site_url; ?></link>
      <description><?php echo $site_title; ?> - <?php echo l303; ?></description>
      <language><?php echo l293; ?></language>
      <copyright>Copyright <?php echo $site_title; ?></copyright>
<?php
    $sql = "SELECT
            id,
            username,
			email,
			show_email,
			rang,
			signature,
			avatar,
			facebook,
			twitter,
			googleplus,
			firstname,
			lastname,
			website,
            registerdate
        FROM
            ".$PREFIX."_user
        ORDER BY
            registerdate DESC
		LIMIT
		    15
		";
    $rResultset = mysql_query($sql) OR die(mysql_error()."<pre>".$sql."</pre>");
      while ($aResult = mysql_fetch_array($rResultset)){
	  if($aResult['show_email'] == '1') {$rssemail = '<b>Email:</b> '.nocss($aResult['email']).'<br>';}
	  else {$rssemail = '';}
    if ($aResult['rang'] == '') {
	$rssrang = '<b>'.l78.':</b> User<br>';
	}
	else {
	$rssrang = '<b>'.l78.':</b> '.nocss($aResult['rang']).'<br>';
	}
    if ($aResult['facebook'] == '') {
	$rssfb = '';
	}
	else {
	$rssfb = '<br><img title="Facebook" src="images/icons/mix/facebook.png" alt="" /> <b>Facebook:</b> <a href="referrer.php?'.nocss($aResult['facebook']).'">'.nocss($aResult['facebook']).'</a><br>';
	}
    if ($aResult['twitter'] == '') {
	$rsstwitter = '';
	}
	else {
	$rsstwitter = '<img title="Twitter" src="images/icons/mix/twitter.png" alt="" /> <b>Twitter:</b> <a href="referrer.php?'.nocss($aResult['twitter']).'">'.nocss($aResult['twitter']).'</a><br>';
	}
	if ($aResult['googleplus'] == '') {
	$rssgp = '';
	}
	else {
	$rssgp = '<img title="Google+" src="images/icons/mix/google.png" alt="" /> <b>Google+:</b> <a href="referrer.php?'.nocss($aResult['googleplus']).'">'.nocss($aResult['googleplus']).'</a><br>';
	}
	if ($aResult['firstname'] == '') {
	$rssfirstname = '';
	}
	else {
	$rssfirstname = '<b>'.l79.':</b> '.nocss($aResult['firstname']).'<br>';
	}
	if ($aResult['lastname'] == '') {
	$rsslastname = '';
	}
	else {
	$rsslastname = '<b>'.l80.':</b> '.nocss($aResult['lastname']).'<br>';
	}
	if ($aResult['website'] == '') {
	$rsswebsite = '';
	}
	else {
	$rsswebsite = '<img title="Homepage" src="images/icons/standard/15homepage.png" alt="" /> <b>'.l81.':</b> <a href="referrer.php?'.nocss($aResult['website']).'">'.nocss($aResult['website']).'</a><br>';
	}
	if ($aResult['signature'] == '') {
	$rsssig = '';
	}
	else {
	$rsssig = '<br><b>'.l82.':</b><br> '.nl2p(parse_bbcode($aResult['signature'])).'<br>';
	}
?>
        <item>
        <title><?php echo nocss($aResult['username']); ?></title>
		<description><![CDATA[ 
<?php
echo $rssfirstname; 
echo $rsslastname;
echo $rssemail;
echo $rssrang;
echo $rssfb;
echo $rsstwitter;
echo $rssgp;
echo $rsswebsite;
echo $rsssig;
?> ]]></description>
        <link><?php echo nocss($site_url); ?>/index.php?type=user&amp;id=<?php echo nocss($_GET['id']); ?></link>
        <guid><?php echo nocss($site_url); ?>/index.php?type=user&amp;id=<?php echo nocss($_GET['id']); ?></guid>
        <pubDate><?php $pubdate = strtotime($aResult['registerdate']); ?>
<?php $pubdate = date(r, $pubdate); ?>
<?php echo $pubdate; ?></pubDate>
        </item>
<?php
      }
?>
    </channel>
  </rss> 
