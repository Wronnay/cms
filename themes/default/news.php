<?php
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
$sql = "SELECT id, autor_id, title, news, date, description, keywords FROM ".$PREFIX."_news WHERE id  = '".$type_id."' ORDER BY date DESC";
    $dbpre = $dbc->prepare($sql);
    $dbpre->execute();
	if ($dbpre->rowCount() < 1) {
	    $body = w117;
	}
    while ($row = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$tags = explode(", ", $row['keywords']);
for($i=0; $i < count($tags); $i++)
   {
$htmltags .= '<li><a href="?type=tag&name='.nocss($tags[$i]).'">'.nocss($tags[$i]).'</a></li> ';
   }
   $dbpre = $dbc->prepare("SELECT id FROM ".$PREFIX."_comments WHERE news_id = '".$type_id."'");
   $dbpre->execute();
	$comments = $dbpre->rowCount();
$title = ''.nocss($row['title']).' - '.$site_title.'';
$description = nocss($row['description']);
$keywords = nocss($row['keywords']);
$sql551 = "SELECT
	        username
            FROM
                    ".$PREFIX."_user
            WHERE
			        id = '".$row['autor_id']."'";
    $dbpre = $dbc->prepare($sql551);
    $dbpre->execute();
    while ($row551 = $dbpre->fetch(PDO::FETCH_ASSOC)) { $autor = $row551['username']; }
$codebody .= '<article class="box"><h2><a href="index.php?type=news&type_id='.nocss($row['id']).'">'.nocss($row['title']).'</a></h2><div class="notes">'.w118.': <a href="index.php?type=user&id='.nocss($row['autor_id']).'">'.nocss($autor).'</a> | '.w119.': '.nocss($row['date']).'</div><p>' . nocss2($row['news']) . '</p><div class="notes"><ul><li>'.w123.': </li>'.$htmltags.'</ul></div></article>';
$sql555 = "SELECT
	            id,
	            name,
                    news_id,
		    comment,
		    date
            FROM
                    ".$PREFIX."_comments
            WHERE
	            news_id = '".$type_id."'
            AND 
                    lang = '".presql($lang)."'
            ORDER BY
                    date DESC
           ";
    $dbpre = $dbc->prepare($sql555);
    $dbpre->execute();
$codebody .= "<article class=\"box\"><h2>".w30.":</h2>";
    while ($row555 = $dbpre->fetch(PDO::FETCH_ASSOC)) {

$codebody .=  "<div class=\"comment\"><b>".w76.": ".nocss($row555['name'])." ".w77.": ".nocss($row555['date'])."</b><br>".nl2p(parse_bbcode($row555['comment']))."</div>\n";

    }
$codebody .= "</article>";  
  if(isset($_POST['submit']) AND $_POST['submit'] == w124) {
        if(empty($_REQUEST['comment']) || empty($_REQUEST['name']) || empty($_REQUEST['hallo']))
      {
$codebody .= "<div class=\"fehler\">".w125."</div>";
      }
	  elseif(isset($_POST['email']) && $_POST['email']) {
$codebody .= "<div class=\"fehler\">You are an SPAM-Bot!</div>";
	  }
	  else {
	  $bodynachricht = presql($_REQUEST['comment']);
	  $dbpre = $dbc->prepare("INSERT INTO ".$PREFIX."_comments (name, news_id, comment, date, email, lang) VALUES ('".presql($_REQUEST['name'])."','".$type_id."','".$bodynachricht."',now(),'".presql($_REQUEST['hallo'])."','".presql($lang)."')");
	  $dbpre->execute();
$codebody .=  "<div class=\"erfolg\">".w126."</div>";
	  }
  }
$codebody .=  '<article class="box"><h2>'.w127.':</h2><form action="" method="post">
<p class="hallo">
  <input id="email" name="email" size="60" value="" />
</p>';
$codebody .= '<div id="beitrag"> 
 <div id="smilies2">';
$smiliesql = "SELECT id, title, url, color FROM ".$PREFIX."_smilies WHERE color='green'";
$dbpre = $dbc->prepare($smiliesql) OR die("<pre>\n".$smiliesql."</pre>\n".mysql_error());
$dbpre->execute();
    while ($smilieu = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$codebody .= "<img src=\"design/pics/smilies/".$smilieu['color']."/".$smilieu['url']."\" onclick=\"insertText(' ".$smilieu['title']." ','')\" alt=\"".$smilieu['title']."\" title=\"".$smilieu['title']."\" /> ";
	}
$codebody .= '</div>
  <div id="buttonleiste">
    <button type="button" onclick="insertText(\'[b]\',\'[/b]\')" title="[b][/b]"><b>b</b></button>
    <button type="button" onclick="insertText(\'[i]\',\'[/i]\')" title="[i][/i]"><i>i</i></button>
    <button type="button" onclick="insertText(\'[u]\',\'[/u]\')" title="[u][/u]"><u>u</u></button>
    <button type="button" onclick="insertText(\'[quote]\',\'[/quote]\')" title="[quote][/quote]">quote</button>
    <button type="button" onclick="insertText(\'[code]\',\'[/code]\')" title="[code][/code]">code</button>
    <button type="button" onclick="insertText(\'[img]\',\'[/img]\')" title="[img]URL[/img]">img</button>
    <button type="button" onclick="insertText(\'[url]\',\'[/url]\')" title="[url='.w120.']'.w121.'[/url]">url</button>
  </div>
</div>';
$codebody .=  '
		  '.w128.': <input class="li" type="text" name="name"><br>
          '.w129.': <input class="li" type="text" name="hallo"><br>
<textarea id="nachricht" class="li" name="comment" cols="40" rows="5"></textarea>
          <br>
          <input class="lb" name="submit" type="submit" value="'.w124.'">
      </form></article>';
}
?>
