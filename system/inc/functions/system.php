<?php
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
function nl2p($str, $separator = "\n") {
    $str    = str_replace("\r\n", "\n", $str);
    $output = array_map(function($line) {
        $pattern =  '/^\[(.*)\](.*)\[\/(.*)\]$/';
        $line = trim($line);
        if(preg_match($pattern, $line)) {
            return $line;
        }
        return '<p>'.$line.'</p>';
    }, array_filter(explode("\n", $str))); 
    
    return join($separator, $output);
}
function parse_bbcode($str)
{
    $str = htmlspecialchars($str, ENT_QUOTES, $GLOBALS['CHARSET']);
		$smiliesql = "SELECT id, title, url, color FROM ".$GLOBALS['PREFIX']."_smilies WHERE color = 'green'";
 $dbpre = $GLOBALS['dbc']->prepare($smiliesql);
 $dbpre->execute();
    while ($smilieu = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$str = str_replace($smilieu['title'], '<img src="design/pics/smilies/'.$smilieu['color'].'/'.$smilieu['url'].'" />', $str);
	}

  $str = preg_replace('#\[b\](.*)\[/b\]#isU', "<b>$1</b>", $str);
  $str = preg_replace('#\[i\](.*)\[/i\]#isU', "<i>$1</i>", $str);
  $str = preg_replace('#\[u\](.*)\[/u\]#isU', "<u>$1</u>", $str);
  $str = preg_replace('#\[color=(.*)\](.*)\[/color\]#isU', "<span style=\"color: $1\">$2</span>", $str);
  $str = preg_replace('#\[size=(8|10|12)\](.*)\[/size\]#isU', "<span style=\"font-size: $1 pt\">$2</span>", $str);
  $str = preg_replace('#\[url\](.*)\[/url\]#isU', "<a target=\"_blank\" href=\"referrer.php?$1\">$1</a>", $str);
  $str = preg_replace('#\[url=(.*)\](.*)\[/url\]#isU', "<a target=\"_blank\" href=\"referrer.php?$1\">$2</a>", $str);
  $str = preg_replace('#\[img\](.*)\[/img\]#isU', "<img src=\"$1\" alt=\"$1\" />", $str);
  $str = preg_replace('#\[quote\](.*)\[/quote\]#isU', "<div class=\"zitat\">$1</div>", $str);
  $str = preg_replace('#\[code\](.*)\[/code\]#isU', "<div class=\"code\">$1</div>", $str);
  $str = preg_replace('#\[list\](.*)\[/list\]#isU', "<ul>$1</ul>", $str);
  $str = preg_replace('#\[list=(1|a)\](.*)\[/list\]#isU', "<ol type=\"$1\">$2</ol>", $str);
  $str = preg_replace("#\[*\](.*)\\r\\n#U", "<li>$1</li>", $str);
  return $str;
}
function showGravatarImage($emailaddress)
{
  $default = ''; 
  $size = 150; 
 
  $hashedMail = md5(strtolower(trim($emailaddress))); 
  $gravatar = "http://www.gravatar.com/avatar/". $hashedMail . "?d=" . urlencode($avatar) ."&s=" . $size;  
  $gravimage = '<img class="avatar" src="' . $gravatar . '" alt="Gravatar" width="' . $size . '" height="' . $size . '" />';
 
  return $gravimage;
}
function nocss($nocss) {
  $nocss = strip_tags($nocss);
  $nocss = htmlspecialchars($nocss, ENT_QUOTES, $GLOBALS['CHARSET']);
  return $nocss;
}
function nocss2($nocss2) {
  $filename = "system/inc/htmlpurifier/library/HTMLPurifier.auto.php";
if (file_exists($filename)) {
  require_once 'system/inc/htmlpurifier/library/HTMLPurifier.auto.php';
}
elseif (file_exists('../'.$filename)) {
include_once '../'.$filename;
}
elseif (file_exists('../../'.$filename)) {
include_once '../../'.$filename;
}
  $purifier = new HTMLPurifier();
  $nocss2 = $purifier->purify($nocss2);
  return $nocss2;
}
function presql($presql) {
  return $presql;
}
function check_back_link_iframe($remote_url, $your_link) {
    $match_pattern = preg_quote(rtrim($your_link, "/"), "/");
    $found = false;
    $text = file_get_contents($remote_url);
    if (preg_match("/<IFRAME(.*)SRC=[\"']".$match_pattern.
"(.*)[\"'](.*)>(.*)<\/IFRAME>/", $text)) {
        $found = true;
    }
    return $found;
} 
function check_back_link_javascript($remote_url, $your_link) {
    $match_pattern = preg_quote(rtrim($your_link, "/"), "/");
    $found = false;
    $text = file_get_contents($remote_url);
    if (preg_match("/<script(.*)src=[\"']".$match_pattern.
"(.*)[\"'](.*)>(.*)<\/script>/", $text)) {
        $found = true;
    }
    return $found;
} 
function check_back_link($remote_url, $your_link) {
    $match_pattern = preg_quote(rtrim($your_link, "/"), "/");
    $found = false;
    $text = file_get_contents($remote_url);
    if (preg_match("/<a(.*)href=[\"']".$match_pattern.
"(.*)[\"'](.*)>(.*)<\/a>/", $text)) {
        $found = true;
    }
    return $found;
} 
  function random_pwd($length){
    // Festlegung der verfügbaren Buchstaben, Zahlen und Sonderzeichen
    $specialChars = array('!','@','#','$','%','&','*','(',')','_','-','+','=','[',']','<','>','?','/');
    $chars = array_merge(range('a','z'), range('A','Z'), range(0,9), $specialChars);
    // Einzelne Buchstaben entfernen
    unset($chars[array_search('i',$chars)]);
    unset($chars[array_search('l',$chars)]);
    unset($chars[array_search('o',$chars)]);
    unset($chars[array_search('I',$chars)]);
    unset($chars[array_search('O',$chars)]);
    unset($chars[array_search('Q',$chars)]);
    $chars = array_values($chars);
    // Array mischen
    shuffle($chars);
    // Array beschneiden
    $pwd = array_slice($chars,0,$length);
    // Rückgabewert als String
    return implode('',$pwd);
  }
?>
