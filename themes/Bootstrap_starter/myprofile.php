<?php
$codebody .= '<article>';
$title = ''.l92.' - '.$site_title.'';
include 'system/inc/check.php';
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
                     WHERE
                         id = '".presql($_SESSION['id'])."'
                    ";
            $dbpre = $dbc->prepare($sql);
            $dbpre->execute();
            $row = $dbpre->fetch(PDO::FETCH_ASSOC);
$codebody .= '<h2>'.l92.':</h2>
<div>';
        if(isset($_POST['submit']) AND $_POST['submit']== l93){
	$url = presql($_POST["website"]);
	$user_website = ( substr($url, 0, 7) != 'http://' ? 'http://'.$url : $url );  
            $errors = array();
            if(!isset($_POST['Email'],
                      $_POST['Show_Email']))
                $errors = l94;
            else{
                $emails = array();
                $sql = "SELECT
                               email
                        FROM
                               ".$PREFIX."_user
                       ";
                $dbpre = $dbc->prepare($sql);
                $dbpre->execute();
                while($row = $dbpre->fetch(PDO::FETCH_ASSOC))
                    $emails[] = $row['email'];
                $sql = "SELECT
                               email
                        FROM
                               ".$PREFIX."_user
                        WHERE
                               id = '".presql($_SESSION['id'])."'
                       ";
                $dbpre = $dbc->prepare($sql);
                $dbpre->execute();
                $row = $dbpre->fetch(PDO::FETCH_ASSOC);

                if(trim($_POST['Email'])=='')
                    $errors[]= l95;
                elseif(!filter_var(trim($_POST['Email']), FILTER_VALIDATE_EMAIL))
                    $errors[]= l96;
                elseif(in_array(trim($_POST['Email']), $emails) AND trim($_POST['Email'])!= $row['email'])
                    $errors[]= l97;
                }
                if(count($errors)){
$codebody .= l98.
                         "<br>\n";
                    foreach($errors as $error)
$codebody .= $error."<br>\n";
$codebody .= "<br>\n".
                         "\n";
                }
                else{
                $sql = "UPDATE
                                ".$PREFIX."_user
                        SET
                                email =  '".presql(trim($_POST['Email']))."',
                                show_email = '".presql(trim($_POST['Show_Email']))."',
								firstname =  '".presql(trim($_POST['firstname']))."',
								lastname =  '".presql(trim($_POST['lastname']))."',
								website =  '".$user_website."',
								facebook =  '".presql(trim($_POST['facebook']))."',
								twitter =  '".presql(trim($_POST['twitter']))."',
								googleplus =  '".presql(trim($_POST['googleplus']))."',
								signature =  '".presql(trim($_POST['signature']))."'
                        WHERE
                                id = '".presql($_SESSION['id'])."'
                       ";
                $dbpre = $dbc->prepare($sql);
                $dbpre->execute();
$codebody .= l99.
                     "\n";
            }
        }
$codebody .= '<form action="index.php?type=profile" method="post" enctype="multipart/form-data">
<table>
<tr><td><b>'.l79.'</b>: </td><td>
<input type="text" name="firstname" value="';
if (isset($row['firstname'])) { $codebody .= nocss($row['firstname']); } else { $codebody .= ''; }
$codebody .= '" size="50">
</td></tr>
<tr><td><b>'.l80.'</b>: </td><td>
<input type="text" name="lastname" value="';
if (isset($row['lastname'])) { $codebody .= nocss($row['lastname']); } else { $codebody .= ''; }
$codebody .= '" size="50">
</td></tr>
<tr><td><b>'.l81.'</b>: </td><td>
<input type="text" name="website" value="';
if (isset($row['website'])) { $codebody .= nocss($row['website']); } else { $codebody .= 'http://'; }
$codebody .=  '" size="50">
</td></tr>
<tr><td><b>Facebook ('.l86.')</b>: </td><td>
<input type="text" name="facebook" value="';
if (isset($row['facebook'])) { $codebody .= nocss($row['facebook']); } else { $codebody .= 'http://facebook.com/'; }
$codebody .= '" size="50">
</td></tr>
<tr><td><b>Twitter ('.l86.')</b>: </td><td>
<input type="text" name="twitter" value="';
if (isset($row['twitter'])) { $codebody .= nocss($row['twitter']); } else { $codebody .= 'http://twitter.com/'; }
$codebody .= '" size="50">
</td></tr>
<tr><td><b>Google+ ('.l86.')</b>: </td><td>
<input type="text" name="googleplus" value="';
if (isset($row['googleplus'])) { $codebody .= nocss($row['googleplus']); } else { $codebody .= 'http://plus.google.com/'; }
$codebody .= '" size="50">
</td></tr>
<tr><td><b>'.l100.'</b>: </td><td>
<input type="text" name="Email" value="';
if (isset($row['email'])) { $codebody .= nocss($row['email']); } else { $codebody .= ''; }
$codebody .= '" size="50">
</td></tr>';
$codebody .= "<tr><td><b>\n".
                 "".l101."\n".
                 "</b>: </td><td>\n";
            if($row['show_email']==1){
$codebody .= "<input type=\"radio\" name=\"Show_Email\" value=\"1\" checked> ".l102."\n";
$codebody .= "<input type=\"radio\" name=\"Show_Email\" value=\"0\"> ".l103."\n";
            }
            else{
$codebody .= "<input type=\"radio\" name=\"Show_Email\" value=\"1\"> ".l102."\n";
$codebody .= "<input type=\"radio\" name=\"Show_Email\" value=\"0\" checked> ".l103."\n";
            }
$codebody .= '</td></tr>
<tr><td><b>'.l167.'</b>: </td><td>';
$codebody .= '<div id="beitrag"> 
 <div id="smilies2">';
$smiliesql = "SELECT id, title, url, color FROM ".$PREFIX."_smilies WHERE color='green'";
$dbpre = $dbc->prepare($smiliesql);
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
if (isset($row['signature'])) { $siis = nocss($row['signature']); } else { $siis = ''; }
$codebody .= '<textarea id="nachricht" name="signature" cols="55" rows="5">'.$siis.'</textarea></td></tr>
</table>
<input name="submit" type="submit" value="'.l93.'">
</form>
</div>
<div>';
        if(isset($_POST['submit']) AND $_POST['submit'] == l104) {
            $errors=array();
            $sql = "SELECT
                        password
                    FROM
                        ".$PREFIX."_user
                    WHERE
                        id = '".presql($_SESSION['id'])."'
                   ";
            $dbpre = $dbc->prepare($sql);
            $dbpre->execute();
            $row = $dbpre->fetch(PDO::FETCH_ASSOC);
            if(!isset($_POST['Passwort'],
                      $_POST['Passwortwiederholung'],
                      $_POST['Altes_Passwort']))
                $errors[]= l105;
            else {
                if(trim($_POST['Passwort'])=="")
                    $errors[]= l106;
                elseif(strlen(trim($_POST['Passwort'])) < 6)
                    $errors[]= l107;
                if(trim($_POST['Passwortwiederholung'])=="")
                    $errors[]= l108;
                elseif(trim($_POST['Passwort']) != trim($_POST['Passwortwiederholung']))
                    $errors[]= l109;
                if(trim($row['password']) != md5(trim($_POST['Altes_Passwort'])))
                    $errors[]= l110;
            }
            if(count($errors)){
  $codebody .= l111.
                     "<br>\n";
                 foreach($errors as $error)
  $codebody .= $error."<br>\n";
  $codebody .= "<br>\n".
                      "\n";
            }
            else{
                $sql = "UPDATE
                                ".$PREFIX."_user
                        SET
                                password ='".md5(trim($_POST['Passwort']))."'
                        WHERE
                                id = '".$_SESSION['id']."'
                       ";
                $dbpre = $dbc->prepare($sql);
                $dbpre->execute();
                      $auesql = "
	  SELECT
            email
        FROM
            ".$PREFIX."_user
	    WHERE id  = '".presql($_SESSION['id'])."'
	  ";
	   $dbpre = $dbc->prepare($auesql);
	   $dbpre->execute();
	   while ($auerow = $dbpre->fetch(PDO::FETCH_ASSOC)) {
		  $autoremail = $auerow['email'];
   }
                $from = "From: ".$site_email."\n";
$from .= "Content-Type: text/html; charset=".$CHARSET."\n";
if($site_user_act == '1') { mail(presql(trim($autoremail)), l316,"".l317." ", $from); }
  $codebody .= l112.
                     "\n";
            }
        }
$codebody .= '<table>
<form action="index.php?type=profile" method="post" enctype="multipart/form-data">
<tr><td><b>'.l113.'</b>: </td><td>
<input type="password" name="Altes_Passwort" value="" size="20">
</td></tr>
<tr><td><b>'.l114.'</b>: </td><td>
<input type="password" name="Passwort" value="" size="20">
</td></tr>
<tr><td><b>'.l115.'</b>: </td><td>
<input type="password" name="Passwortwiederholung" value="" size="20">
</td></tr>
<tr><td></td><td><input name="submit" type="submit" value="'.l104.'"><br><br></td></tr>
</form>
<tr><td>';
$codebody .= "<form ".
                 " name=\"Avatar\" ".
                 " action=\"index.php?type=profile\" ".
                 " method=\"post\" ".
                 " enctype=\"multipart/form-data\" ".
                 " accept-charset=\"UTF-8\">\n";
$codebody .= "<span style=\"font-weight:bold;\" ".
                 " title=\"".l116."\">\n".
                 "".l117.":\n".
                 "</span>\n";
$codebody .= '</td><td>';
        if(isset($_POST['submit']) AND $_POST['submit'] == l118) {
            $errors = array();
            switch ($_FILES['pic']['error']){
                case 1: $errors[] = l119;
                                    break;
                case 2: $errors[] = l119;
                                    break;
                case 3: $errors[] = l120;
                                    break;
                case 4: $errors[] = l121;
                                    break;
                default : break;
            }
            if(!@getimagesize($_FILES['pic']['tmp_name']))
                $errors[] = l122;
            else {
                $erlaubte_typen = array('image/pjpeg',
                                        'image/jpeg',
                                        'image/gif',
                                        'image/png'
                                       );
                if(!in_array($_FILES['pic']['type'], $erlaubte_typen))
                    $errors[] = l123;
                $erlaubte_endungen = array('jpeg',
                                           'jpg',
                                           'gif',
                                           'png'
                                          );
                $endung = strtolower(substr($_FILES['pic']['name'], strrpos($_FILES['pic']['name'], '.')+1));
                    if(!in_array($endung, $erlaubte_endungen))
                        $errors[] = l124;
                $size = getimagesize($_FILES['pic']['tmp_name']);
                    if ($size[0] > 150 OR $size[1] > 150)
                        $errors[] = l125;
            }
            if($_FILES['pic']['size'] > 0.2*1024*1024)
                $errors[] = l119;

            if(count($errors)){
      $codebody .= l126.
                     "<br>\n";
                foreach($errors as $error)
      $codebody .= $error."<br>\n";
      $codebody .= "<br>\n".
                     "\n";
            }
            else {
                $uploaddir = 'images/avatare/';
                $Name = "IMG_".substr(microtime(),-8).".".$endung;
                if (move_uploaded_file($_FILES['pic']['tmp_name'], $uploaddir.$Name)) {
                    $sql = "UPDATE
                                    ".$PREFIX."_user
                            SET
                                    avatar = '".presql(trim($Name))."'
                            WHERE
                                    id = ".$_SESSION['id']."
                           ";
                    $dbpre = $dbc->prepare($sql);
                    $dbpre->execute();

        $codebody .= l127.
                         "\n";
						 header("Location: " . $_SERVER['PHP_SELF']);
                }
                else {
        $codebody .= l128.
                         "\n";
                }
            }
        }
        elseif(isset($_POST['submit']) AND $_POST['submit'] == l130){
            $sql = "SELECT
                        avatar
                    FROM
                        ".$PREFIX."_user
                    WHERE
                        id = '".$_SESSION['id']."'
                   ";
            $dbpre = $dbc->prepare($sql);
            $dbpre->execute();
            $row = $dbpre->fetch(PDO::FETCH_ASSOC);
            unlink('avatare/'.$row['Avatar']);
            $sql = "UPDATE
                        ".$PREFIX."_user
                    SET
                        avatar = ''
                    WHERE
                        id = '".$_SESSION['id']."'
                   ";
            $dbpre = $dbc->prepare($sql);
            $dbpre->execute();
            $codebody .= l129.
                 "\n";
				 header("Location: " . $_SERVER['PHP_SELF']);
        }
            if($row['avatar']=='') {
                $avatar = $site_url.'/images/icons/standard/avatar.png';
				$grav_url = "http://www.gravatar.com/avatar/".md5(strtolower(trim($row['email'])))."?d=".urlencode($avatar)."&s=150";
		$codebody .= '<img class="avatar" src="'.$grav_url.'" alt=""/><br>';
				}
            else {
                $codebody .= "<img alt=\"\" src=\"images/avatare/".htmlentities($row['avatar'], ENT_QUOTES)."\"><br>\n";
				}
            if($row['avatar']=='') {
               $codebody .= "<input class=\"normalinput3\" type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"".(0.02*1024*1024)."\">";
               $codebody .= "<input class=\"normalinput3\" name=\"pic\" type=\"file\">";
               $codebody .= "<br><input class=\"loginbuttonb\" type=\"submit\" name=\"submit\" value=\"".l118."\"><br>\n";
            }
            else {
            $codebody .= "<input class=\"loginbuttonb\" type=\"submit\" name=\"submit\" value=\"".l130."\">\n";
            $codebody .= "</form>\n";
			}
$codebody .= '</td></tr>
</table>
</div>';
$codebody .= '</article>';
?>
