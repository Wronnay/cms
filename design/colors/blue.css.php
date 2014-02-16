<?php
  header('Content-type: text/css');
?>
/*
--------------------------------
COLORDESIGN
--------------------------------
Design by Christoph Miksche
Website: http://celzekr.webpage4.me
License: Attribution-NonCommercial-ShareAlike 3.0 Unported (CC BY-NC-SA 3.0)

Dieses Werk bzw. Inhalt steht unter einer Creative Commons Namensnennung-Nicht-kommerziell-
Weitergabe unter gleichen Bedingungen 3.0 Unported Lizenz.

Sie duerfen den/die Link/s zu Celzekr.webpage4.me nicht entfernen!

(http://creativecommons.org/licenses/by-nc-sa/3.0/)
*/
<?php
$bgimg1 = '../images/system/h.png';
$bgimg2 = '../images/system/hb2b.png';
$bgimg3 = '../images/system/kat.png';
$bgimg4 = '../images/system/kat2.png';
$bgimg5 = '../images/system/post.png';
$bgimg6 = '../images/system/quote.png';
$bgimg7 = '../images/system/code.png';

$color1 = '#ffffff';
$color2 = '#000000';
$color3 = '#cccccc';
$color4 = '#aaaaff';
$color5 = '#4747ff';
$color6 = '#414141';
$color7 = '#656565';
$color8 = '#5f7ebb';
$color9 = '#adbddd';
$color10 = '#686868';
$color11 = '#ff0000';
$color12 = '#ffafaf';
$color13 = '#a6ffa6';
$color14 = '#36a736';
$color15 = '#850000';
$color16 = '#afc0e4';
$color17 = '#dddddd';
?>
#body {background-image : url(<?php echo $bgimg1; ?>); background-repeat : repeat; background-position : center top; text-align : left; background-color : <?php echo $color1; ?>; min-width:1000px; max-width:95%; color:<?php echo $color2; ?>; margin : 0 auto; padding : 10px 10px 10px 10px; -moz-box-shadow: 0px 0px 15px <?php echo $color4; ?>; -webkit-box-shadow: 0px 0px 15px <?php echo $color4; ?>; box-shadow: 0px 0px 15px <?php echo $color4; ?>; border-bottom-right-radius: 5px; border-bottom-left-radius: 10px; border-top-right-radius: 10px; border-top-left-radius: 5px; border:1px solid <?php echo $color5; ?>; }
#head {background-image : url(<?php echo $bgimg2; ?>); background-repeat : repeat-x; background-position : center top; background-color : <?php echo $color6; ?>; color:<?php echo $color1; ?>; margin : 0 auto; padding : 5px 5px 5px 5px; font-size : 40px; text-shadow: 2px 2px 3px <?php echo $color2; ?>; border-radius: 10px; border:1px solid <?php echo $color5; ?>; }
.untertitel { background-image : url(<?php echo $bgimg1; ?>); background-repeat : repeat; background-position : center top; font-size : 20px; color:<?php echo $color3; ?>; background-color : <?php echo $color8; ?>; border-radius: 5px; padding : 5px 5px 5px 5px; margin : 5px 5px 5px 5px; border:1px solid <?php echo $color3; ?>; text-shadow: 0 0 0.8em <?php echo $color2; ?>, 0 0 0.5em <?php echo $color2; ?>, 0 0 0.2em <?php echo $color2; ?>; }
#foot {border:1px solid <?php echo $color5; ?>; border-radius: 5px; background-color: <?php echo $color1; ?>; clear:both; margin : 0 auto; padding : 5px 5px 5px 5px; font-size : 11px; text-align : center;}
.kat {clear:right; z-index:1; background-color : <?php echo $color1; ?>; margin : 5px 5px 5px 5px; border-radius: 10px; border:1px solid <?php echo $color5; ?>;}
.title {background-image : url(<?php echo $bgimg3; ?>); background-repeat : repeat-x; background-position : center bottom; border-top-left-radius: 10px; border-top-right-radius: 10px; background-color : <?php echo $color9; ?>; padding : 5px 5px 5px 5px; margin : 5px 5px 5px 5px; border-bottom:2px solid <?php echo $color5; ?>; font-size : 18px;}
.kat2 {overflow:auto; color:<?php echo $color10; ?>; font-size : 12px; background-image : url(<?php echo $bgimg3; ?>); background-repeat : repeat-x; background-position : center top; background-color : <?php echo $color9; ?>; padding : 5px 0px 5px 5px; margin : 0px 5px 5px 5px; border-bottom:1px solid <?php echo $color5; ?>;}
.kat2:hover {overflow:auto; color:<?php echo $color10; ?>; font-size : 12px; background-image : url(<?php echo $bgimg4; ?>); background-repeat : repeat-x; background-position : center top; background-color : <?php echo $color9; ?>; padding : 5px 0px 5px 5px; margin : 0px 5px 5px 5px; border-bottom:1px solid <?php echo $color5; ?>;}
 .fehler { text-align: left; border-left:5px solid <?php echo $color11; ?>; background-color:<?php echo $color12; ?>; padding: 5px 5px 5px 5px; margin: 5px 5px 5px 5px;}
.erfolg { text-align: left; border-left:5px solid <?php echo $color14; ?>; background-color: <?php echo $color13; ?>; padding: 5px 5px 5px 5px; margin: 5px 5px 5px 5px;}
.comment {text-align: left; border-left:2px solid <?php echo $color3; ?>; border-bottom:2px solid <?php echo $color3; ?>; background-color: <?php echo $color1; ?>; padding: 5px 5px 5px 5px; margin: 5px 5px 5px 5px;}
#foot a:link    {color: <?php echo $color6; ?>;  text-decoration:none; border-bottom:1px solid <?php echo $color7; ?>;}
#foot a:visited {color: <?php echo $color6; ?>;  text-decoration:none; border-bottom:1px solid <?php echo $color7; ?>;}
#foot a:focus   {color: <?php echo $color6; ?>;  text-decoration:none; border-bottom:1px solid <?php echo $color7; ?>;}
#foot a:hover   {color: <?php echo $color2; ?>;  text-decoration:none; border-bottom:1px solid <?php echo $color2; ?>;}
#foot a:active  {color: <?php echo $color6; ?>;  text-decoration:none; border-bottom:1px solid <?php echo $color7; ?>;}
.spalte {float:left; width:50%;}
.post {overflow:auto; clear:right; margin:0px; padding:5px; border-radius: 10px; border:1px solid <?php echo $color5; ?>; background-image : url(<?php echo $bgimg5; ?>); background-repeat : repeat-x; background-position : center top;}
.post2 {overflow:auto; clear:right; margin:8px 2px; padding:0px; border-radius: 10px; background-image : url(<?php echo $bgimg1; ?>); background-repeat : repeat; background-position : center top; background-color: <?php echo $color1; ?>;}
.posttext {color:<?php echo $color2; ?>; margin:5px; padding:5px; border-radius: 10px; background-color: <?php echo $color1; ?>; border:1px solid <?php echo $color5; ?>;}
.postsignature {opacity: 0.5; color:<?php echo $color2; ?>; margin:5px; padding:5px; border-radius: 10px; background-color: <?php echo $color1; ?>; border:1px solid <?php echo $color5; ?>;}
.kat2 a:link    {color: <?php echo $color5; ?>;  text-decoration:none; font-size : 15px;}
.kat2 a:visited {color: <?php echo $color5; ?>;  text-decoration:none; font-size : 15px;}
.kat2 a:focus   {color: <?php echo $color5; ?>;  text-decoration:none; font-size : 15px;}
.kat2 a:hover   {color: <?php echo $color15; ?>;  text-decoration:underline; font-size : 15px;}
.kat2 a:active  {color: <?php echo $color5; ?>;  text-decoration:none; font-size : 15px;}
.text a:link    {color: <?php echo $color5; ?>;  text-decoration:none; font-size : 15px;}
.text a:visited {color: <?php echo $color5; ?>;  text-decoration:none; font-size : 15px;}
.text a:focus   {color: <?php echo $color5; ?>;  text-decoration:none; font-size : 15px;}
.text a:hover   {color: <?php echo $color15; ?>;  text-decoration:underline; font-size : 15px;}
.text a:active  {color: <?php echo $color5; ?>;  text-decoration:none; font-size : 15px;}
.newbutton a:link, .newbutton a:visited, .newbutton a:focus, .newbutton a:active {float:right; text-shadow: 0 0 0.2em <?php echo $color2; ?>; color: <?php echo $color1; ?>; margin:5px; padding:5px; background-image : url(<?php echo $bgimg2; ?>); background-repeat : repeat-x; background-position : center top; border-radius: 5px;}
.newbutton a:hover {float:right; text-shadow: 0 0 0.2em <?php echo $color2; ?>; color:<?php echo $color1; ?>; text-decoration:underline; margin:5px; padding:5px; background-image : url(<?php echo $bgimg2; ?>); background-repeat : repeat-x; background-position : center top; border-radius: 5px;}
h2 {font-size : 15px; border-bottom:1px solid <?php echo $color5; ?>; padding: 0px 5px 0px 5px; margin:0px;}
.infos {font-size : 15px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px; border-top-right-radius: 10px; opacity: 0.7; z-index:10; float:right; text-align: left; border:1px solid <?php echo $color5; ?>; background-color: <?php echo $color1; ?>; padding: 0px 0px 0px 0px; margin: 5px 5px 0px 5px;}
.lastpost {float:right; padding: 5px 5px 5px 5px; width:200px; border-left:1px solid <?php echo $color5; ?>;}
.posts {float:right; padding: 5px 5px 5px 5px; width:100px; border-left:1px solid <?php echo $color5; ?>;}
.topics {float:right; padding: 5px 5px 5px 5px; width:100px;}
.lastpost:hover {border-bottom-right-radius: 10px; border-top-right-radius: 10px; -moz-box-shadow: 0px 0px 5px <?php echo $color2; ?>; -webkit-box-shadow: 0px 0px 5px <?php echo $color2; ?>; box-shadow: 0px 0px 5px <?php echo $color2; ?>; float:right; padding: 5px 5px 5px 5px; width:200px; border-left:1px solid <?php echo $color5; ?>;}
.posts:hover {-moz-box-shadow: 0px 0px 5px <?php echo $color2; ?>; -webkit-box-shadow: 0px 0px 5px <?php echo $color2; ?>; box-shadow: 0px 0px 5px <?php echo $color2; ?>; float:right; padding: 5px 5px 5px 5px; width:100px; border-left:1px solid <?php echo $color5; ?>;}
.topics:hover { border-bottom-left-radius: 10px; -moz-box-shadow: 0px 0px 5px <?php echo $color2; ?>; -webkit-box-shadow: 0px 0px 5px <?php echo $color2; ?>; box-shadow: 0px 0px 5px <?php echo $color2; ?>; float:right; padding: 5px 5px 5px 5px; width:100px;}
.infos2 {font-size : 15px; float:right; text-align: left; padding: 0px 0px 0px 0px; margin: 5px 0px 0px 5px;}
.lastpost2 {float:right; padding: 5px 5px 5px 5px; width:200px; border-left:1px solid <?php echo $color10; ?>;}
.posts2 {float:right; padding: 5px 5px 5px 5px; width:100px; border-left:1px solid <?php echo $color10; ?>;}
.topics2 {float:right; padding: 5px 5px 5px 5px; width:100px;}
img {border:0px;}
#navi img {opacity: 0.7; border:1px solid <?php echo $color2; ?>; margin : 0 auto; text-align : center; -moz-box-shadow: 0px 0px 5px <?php echo $color2; ?>; -webkit-box-shadow: 0px 0px 5px <?php echo $color2; ?>; box-shadow: 0px 0px 5px <?php echo $color2; ?>;}
#navi img:hover {opacity: 1.0; border:1px solid <?php echo $color2; ?>; margin : 0 auto; text-align : center; -moz-box-shadow: 0px 0px 5px <?php echo $color2; ?>; -webkit-box-shadow: 0px 0px 5px <?php echo $color2; ?>; box-shadow: 0px 0px 5px <?php echo $color2; ?>;}

input[type="submit"], input[type="reset"], button {
   -moz-box-shadow: 0px 0px 5px <?php echo $color5; ?>;
-webkit-box-shadow: 0px 0px 5px <?php echo $color5; ?>;
box-shadow: 0px 0px 5px <?php echo $color5; ?>;
background-image : url(<?php echo $bgimg2; ?>); background-repeat : repeat-x; background-position : center top; border-radius: 5px;
 }

input[type="submit"]:hover, input[type="reset"]:hover, button:hover {
   -moz-box-shadow: 0px 0px 5px <?php echo $color5; ?>;
-webkit-box-shadow: 0px 0px 5px <?php echo $color5; ?>;
box-shadow: 0px 0px 5px <?php echo $color5; ?>;
background-image : url(<?php echo $bgimg2; ?>); background-repeat : repeat-x; background-position : center top; border-radius: 5px;
opacity: 0.7;
}
textarea {
border:1px solid <?php echo $color5; ?>;
color:<?php echo $color1; ?>;
background-color : <?php echo $color16; ?>;
  padding: 2px 2px 2px 2px;
   font-size: 12px;
   margin-bottom:5px;
   background-image : url(<?php echo $bgimg2; ?>); background-repeat : repeat-x; background-position : top center; border-radius: 5px;
 }
textarea:focus {
border:1px solid <?php echo $color5; ?>;
box-shadow:inset 0 0 2px <?php echo $color1; ?>;
color:<?php echo $color1; ?>;
background-color : <?php echo $color16; ?>;
  padding: 2px 2px 2px 2px;
   font-size: 12px;
   margin-bottom:5px;
   background-image : url(<?php echo $bgimg2; ?>); background-repeat : repeat-x; background-position : top center; border-radius: 5px;
 }
input[type="text"], select, input[type="password"] {
border:1px solid <?php echo $color5; ?>;
color:<?php echo $color1; ?>;
background-color : <?php echo $color2; ?>;
  padding: 2px 2px 2px 2px;
   font-size: 12px;
   margin-bottom:5px;
   background-image : url(<?php echo $bgimg2; ?>); background-repeat : repeat-x; background-position : center center; border-radius: 5px;
 }
input[type="text"]:hover, select:hover, input[type="password"]:hover {
border:1px solid <?php echo $color5; ?>;
color:<?php echo $color1; ?>;
background-color : <?php echo $color2; ?>;
  padding: 2px 2px 2px 2px;
   font-size: 12px;
   margin-bottom:5px;
   background-image : url(<?php echo $bgimg2; ?>); background-repeat : repeat-x; background-position : center top; border-radius: 5px;
} 
input[type="text"]:focus, select:focus, input[type="password"]:focus {
border:1px solid <?php echo $color5; ?>;
color:<?php echo $color1; ?>;
box-shadow:inset 0 0 2px <?php echo $color1; ?>;
background-color : <?php echo $color2; ?>;
  padding: 2px 2px 2px 2px;
   font-size: 12px;
   margin-bottom:5px;
   background-image : url(<?php echo $bgimg2; ?>); background-repeat : repeat-x; background-position : center top; border-radius: 5px;
} 
 .fehler {
 text-align: left;
border-left:5px solid <?php echo $color11; ?>;
background-color:<?php echo $color12; ?>;
padding: 5px 5px 5px 5px;
margin: 5px 5px 5px 5px;
 }
.erfolg {
 text-align: left;
border-left:5px solid <?php echo $color14; ?>;
background-color: <?php echo $color13; ?>;
padding: 5px 5px 5px 5px;
margin: 5px 5px 5px 5px;
 }
.comment {
 text-align: left;
border-left:2px solid <?php echo $color3; ?>;
border-bottom:2px solid <?php echo $color3; ?>;
background-color: <?php echo $color1; ?>;
padding: 5px 5px 5px 5px;
margin: 5px 5px 5px 5px;
}
.text {background-color: <?php echo $color1; ?>; padding: 5px 5px 5px 5px; border-radius: 5px; border:1px solid <?php echo $color5; ?>; margin-right:5px; overflow:auto;}
#nav {overflow:auto; border:1px solid <?php echo $color5; ?>; border-radius: 5px; background-color: <?php echo $color1; ?>; clear:both; margin : 0 auto; padding : 5px 5px 5px 5px; font-size : 14px; text-align : center; margin-top:15px;}
#nav a:link    { -moz-box-shadow: 0px 0px 5px <?php echo $color5; ?>;
-webkit-box-shadow: 0px 0px 5px <?php echo $color5; ?>;
box-shadow: 0px 0px 5px <?php echo $color5; ?>; line-height:30px; border-radius: 5px; background-color: <?php echo $color1; ?>; color: <?php echo $color6; ?>;  text-decoration:none; border:1px solid <?php echo $color5; ?>; padding : 3px 3px 3px 3px; margin : 5px 5px 5px 5px;}
#nav a:visited {-moz-box-shadow: 0px 0px 5px <?php echo $color5; ?>;
-webkit-box-shadow: 0px 0px 5px <?php echo $color5; ?>;
box-shadow: 0px 0px 5px <?php echo $color5; ?>; line-height:30px; border-radius: 5px; background-color: <?php echo $color1; ?>; color: <?php echo $color6; ?>;  text-decoration:none; border:1px solid <?php echo $color5; ?>; padding : 3px 3px 3px 3px; margin : 5px 5px 5px 5px;}
#nav a:focus   {-moz-box-shadow: 0px 0px 5px <?php echo $color5; ?>;
-webkit-box-shadow: 0px 0px 5px <?php echo $color5; ?>;
box-shadow: 0px 0px 5px <?php echo $color5; ?>; line-height:30px; border-radius: 5px; background-color: <?php echo $color1; ?>; color: <?php echo $color6; ?>;  text-decoration:none; border:1px solid <?php echo $color5; ?>; padding : 3px 3px 3px 3px; margin : 5px 5px 5px 5px;}
#nav a:hover   {-moz-box-shadow: 0px 0px 5px <?php echo $color5; ?>;
-webkit-box-shadow: 0px 0px 5px <?php echo $color5; ?>;
box-shadow: 0px 0px 5px <?php echo $color5; ?>; line-height:30px; background-image : url(<?php echo $bgimg2; ?>); background-repeat : repeat-x; background-position : center top; border-radius: 5px; background-color: <?php echo $color5; ?>; color: <?php echo $color1; ?>;  text-decoration:none; border:1px solid <?php echo $color5; ?>; padding : 3px 3px 3px 3px; margin : 5px 5px 5px 5px;}
#nav a:active  {-moz-box-shadow: 0px 0px 5px <?php echo $color5; ?>;
-webkit-box-shadow: 0px 0px 5px <?php echo $color5; ?>;
box-shadow: 0px 0px 5px <?php echo $color5; ?>; line-height:30px; border-radius: 5px; background-color: <?php echo $color1; ?>; color: <?php echo $color6; ?>;  text-decoration:none; border:1px solid <?php echo $color5; ?>; padding : 3px 3px 3px 3px; margin : 5px 5px 5px 5px;}
  #colorpicker       { border:1px ridge <?php echo $color17; ?>; }
  #colorpicker td  { width:10px; height:10px; cursor:pointer; border:0px solid <?php echo $color3; ?>; }
  #colorpicker td:hover  {opacity: 0.5; width:10px; height:10px; cursor:pointer; border:0px solid white; box-shadow: 0px 0px 2px <?php echo $color2; ?>, 0px 0px 5px <?php echo $color3; ?>, 0px 0px 15px <?php echo $color2; ?>;}
#credits a:link    {color: <?php echo $color6; ?>;  text-decoration:none; border-bottom:0px solid <?php echo $color7; ?>;}
#credits a:visited {color: <?php echo $color6; ?>;  text-decoration:none; border-bottom:0px solid <?php echo $color7; ?>;}
#credits a:focus   {color: <?php echo $color6; ?>;  text-decoration:none; border-bottom:0px solid <?php echo $color7; ?>;}
#credits a:hover   {color: <?php echo $color2; ?>;  text-decoration:none; border-bottom:1px solid <?php echo $color2; ?>;}
#credits a:active  {color: <?php echo $color6; ?>;  text-decoration:none; border-bottom:0px solid <?php echo $color7; ?>;}
.seitenr2 {float:left; margin:2px; padding:5px; border:1px solid <?php echo $color5; ?>; border-radius: 3px;}
.zitat {border:1px solid <?php echo $color7; ?>; background-color: <?php echo $color3; ?>; padding:5px; opacity: 0.8; border-radius: 10px; background-image : url(<?php echo $bgimg6; ?>); background-repeat : no-repeat; background-position : right top;}
.code {border:1px solid <?php echo $color7; ?>; background-color: <?php echo $color3; ?>; padding:5px; opacity: 0.8; border-radius: 10px; background-image : url(<?php echo $bgimg7; ?>); background-repeat : no-repeat; background-position : right top;}
