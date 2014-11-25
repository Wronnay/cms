<?php
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
$codebody .= '<article>';
$title = ''.l73.' - '.$site_title.'';
  if(isset($_GET['what'])) {
$what2 = str_replace('_', '%', presql($_GET['what']));
      $sql = "SELECT
            id,
            autor_id,
			topic_id,
			title,
			post,
            date
        FROM
            ".$PREFIX."_posts
		WHERE
		    post
		LIKE
		    '%".presql($what2)."%'
		OR
		    title
		LIKE
		    '%".presql($what2)."%'
        ORDER BY
            date DESC
		";
    $dbpre = $dbc->prepare($sql);
    $dbpre->execute();
$codebody .= '<h2>'.l74.':</h2>';
      while ($row = mysql_fetch_array($result)){
$codebody .= '<div><h2><a href="index.php?type=topic&id='.nocss($row['topic_id']).'#'.nocss($row['id']).'">'.nocss($row['title']).'</a></h2>
		<p><a href="index.php?type=topic&id='.nocss($row['topic_id']).'#'.nocss($row['id']).'">'.nl2p(parse_bbcode($row['post'])).'</a></p>
        </div>';
	  }
  }
else {
  if(isset($_POST['submit']) AND $_POST['submit'] == l75) {
  $what = presql($_POST['suchbegriff']);
  $what = strtolower($what);
  $what = str_replace(' ', '_', $what);
  header("Location: index.php?type=search&what=".$what);
  }
$codebody .= l76;
$codebody .= '<form method="post" enctype="multipart/form-data" action="index.php?type=search">
<input type="text" name="suchbegriff" size="40">
<input type="submit" name="submit" value="'.l75.'">
</form>';
}
$codebody .= '</article>';
?>
