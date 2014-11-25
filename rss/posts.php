<?php
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
header('Content-Type: application/rss+xml; charset=UTF-8');
error_reporting(0);
include '../system/inc/config.php';
if($DBTYPE == 'sqlite') { $dbc = new PDO(''.$DBTYPE.':../system/db/'.$DB.'.sql.db'); }
elseif($DBTYPE == 'mysql') { $dbc = new PDO(''.$DBTYPE.':host='.$HOST.';dbname='.$DB.'', ''.$USER.'', ''.$PW.''); }
include '../system/inc/functions.php';
ini_set("session.gc_maxlifetime", 2000);
include '../system/inc/lang.php'; // Sprache
if($lang == "de")
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
      <title><?php echo l291; ?> - <?php echo $site_title; ?></title>
      <link><?php echo $site_url; ?></link>
      <description><?php echo $site_title; ?> - <?php echo l292; ?></description>
      <language><?php echo l293; ?></language>
      <copyright>Copyright <?php echo $site_title; ?></copyright>
<?php
    $sql = "SELECT
            id,
            autor_id,
			topic_id,
			title,
			post,
            date
        FROM
            ".$PREFIX."_posts
        ORDER BY
            date DESC
		LIMIT
		    15
		";
    $dbpre = $dbc->prepare($sql);
    $dbpre->execute();
      while ($aResult = $dbpre->fetch(PDO::FETCH_ASSOC)){
?>
        <item>
        <title><?php echo nocss($aResult['title']); ?></title>
		<description><![CDATA[ <?php echo nl2p(parse_bbcode($aResult['post'])); ?> ]]></description>
        <link><?php echo nocss($site_url); ?>/index.php?type=topic&amp;id=<?php echo nocss($aResult['topic_id']); ?>#<?php echo nocss($aResult['id']); ?></link>
        <guid><?php echo nocss($site_url); ?>/index.php?type=topic&amp;id=<?php echo nocss($aResult['topic_id']); ?>#<?php echo nocss($aResult['id']); ?></guid>
        <pubDate><?php $pubdate = strtotime($aResult['date']); ?>
<?php $pubdate = date(r, $pubdate); ?>
<?php echo $pubdate; ?></pubDate>
        </item>
<?php
      }
?>
    </channel>
  </rss> 
