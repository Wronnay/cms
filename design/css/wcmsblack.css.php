<?php
  header('Content-type: text/css');
?>
/*
Design by Christoph Miksche
Website: http://wronnay.net
*/
/* FONT -------------------------------------------- */
@font-face { font-family: liberation-bold; src: url(../content/font/liberation_sans/LiberationSans-Bold.ttf); }
b {font-family: liberation-bold;}
@font-face { font-family: liberation-italic; src: url(../content/font/liberation_sans/LiberationSans-Italic.ttf); }
i {font-family: liberation-italic;}
@font-face {
font-family : liberation;
src : url(../content/font/liberation_sans/LiberationSans-Regular.ttf);
}
h2, h2 a:link, a:visited, a:focus, a:active {
padding:0px;
margin:0px;
font-family: liberation;
border : 0px;
text-decoration:none;
}
a:link, a:visited, a:focus, a:active {
color: #000000;
}
a:hover {
color:#888;
}
h3, h3 a:link, a:visited, a:focus, a:active {
padding:0px;
margin:0px;
font-family: liberation;
border : 0px;
text-decoration:none;
}
h1 {font-family: liberation;}
/* INPUT ------------------------------------------- */
input[type="text"], input[type="password"], textarea, select {
outline : none;
}
input[type="text"], input[type="password"], textarea, select {

text-align : left;
border : 1px solid #000000;
color : #000000;
padding : 5px 5px 5px 5px;
margin : 5px 5px 5px 5px;
background-color : #ffffff;
font-family : liberation;
font-size: 14px;
}
input[type="text"]:focus, input[type="password"]:focus, textarea:focus {
text-align : left;
border : 1px solid #fff;
color : #fff;
padding : 5px 5px 5px 5px;
margin : 5px 5px 5px 5px;
background-color : #666;
font-family : liberation;
font-size: 14px;
}
input[type="submit"], input[type="reset"], button{
color : #fff;
background-color : #666;
border : 1px solid #fff;
cursor : pointer;
font-family : liberation;
font-size: 14px;
}
input:hover[type="submit"], button:hover{
color : #fff;
background-color : #000;
border : 1px solid #fff;
cursor : pointer;
font-family : liberation;
font-size: 14px;
}
/* HTML5 HACK -------------------------------------- */  
header, section, footer, aside, nav, article {  
	display: block;  
}
/* LAYOUT ------------------------------------------ */
.hallo {display:none;}
body {
  background: #fff;
  font-size: 14px;
  font-color: #000;
  font-family: liberation, Arial, Verdana, sans-serif;
  margin-top: 0px;
  margin-bottom:0px;
  margin-left:0px;
  margin-right:0px;
  padding: 0;
}

/* HEADER ------------------------------------------ */
header {
  background: #fff;
  height:100px;
margin:5px;
background-image : url(../design/pics/system/logo.png); 
background-repeat : no-repeat; 
background-position : left top;
}
header a:link    {color: #000;  text-decoration:none; opacity: 0.5;}
header a:visited {color: #000;  text-decoration:none; opacity: 0.5;}
header a:focus   {color: #000;  text-decoration:none; opacity: 0.5;}
header a:hover   {color: #000;  text-decoration:none; opacity: 1.0;}
header a:active  {color: #000;  text-decoration:none; opacity: 0.5;}

header nav {float:right; padding-right:25px;}

header nav ul {
  list-style-type: none;
  font-family: liberation;
  margin: 0;
  padding: 0;
}
 
header nav ul li {
  display: inline;
  margin: 0;
  padding: 0;
}
 
header nav ul li a {
  display: inline-block;
  color: #000;
  text-decoration: none;
  line-height:100px;
  padding:5px;
font-family : liberation;
}
 
header nav ul li.active a {
  color: #000;
  opacity: 1.0;
}
header nav ul li a:hover {
}
/* FOOTER ------------------------------------------ */
footer {
clear:both;
background: #000;
height:80px;
opacity: 0.8;
/* background-image : url(../design/pics/system/log.png); 
background-repeat : no-repeat; 
background-position : left top; */
}
footer a:link    {color: #fff;  text-decoration:none; opacity: 0.5;}
footer a:visited {color: #fff;  text-decoration:none; opacity: 0.5;}
footer a:focus   {color: #fff;  text-decoration:none; opacity: 0.5;}
footer a:hover   {color: #fff;  text-decoration:none; opacity: 1.0;}
footer a:active  {color: #fff;  text-decoration:none; opacity: 0.5;}

footer nav {float:right; padding-right:25px;}

footer nav ul {
  list-style-type: none;
  font-family: liberation;
  margin: 0;
  padding: 0;
}
 
footer nav ul li {
  display: inline;
  margin: 0;
  padding: 0;
}
 
footer nav ul li a {
  display: inline-block;
  color: #fff;
  text-decoration: none;
  line-height:60px;
  padding:5px;
border-bottom: 5px solid #000;
border-top: 5px solid #000;
font-family : liberation;
}
 
footer nav ul li.active a {
  color: #fff;
  opacity: 1.0;
}
footer nav ul li a:hover {
border-bottom: 5px solid #fff;
border-top: 5px solid #fff;
}
article {clear:left; width:95%; font-family : liberation; font-size: 14px; opacity: 0.8; margin:5px; padding:5px; overflow:auto;}
article:hover {font-family : liberation; font-size: 14px; opacity: 1.0; box-shadow: 0 0 15px #000;}
article p a:link    {color: #000;  text-decoration:none; border-bottom: 1px solid #000;}
article p a:visited {color: #000;  text-decoration:none; border-bottom: 1px solid #000;}
article p a:focus   {color: #000;  text-decoration:none; border-bottom: 1px solid #000;}
article p a:hover   {color: #000;  text-decoration:none; border-bottom: 0px solid #000;}
article p a:active  {color: #000;  text-decoration:none; border-bottom: 1px solid #000;}
.featbox {
clear:right;
} 
.box {background: #fff; color:#000;} 
.boxo {background: #ccc; color:#000;} 
.feat {max-width:25%; float:left;} 
.in {background: #000; color:#fff; padding:5px;}
/* PICS --------------------------------------------- */
img {border: 0px solid #fff; opacity: 1.0;}
img:hover {opacity: 0.8;}
 figure {
  z-index:3;
  padding: 5px;
  margin:15px;
  float: left;
  border: 1px solid #000;
  background-color:#fff;
  border-radius: 5px;
  box-shadow: 0 0 15px #000;
  opacity: 1.0;}

 figure:hover {
  z-index:3;
  padding: 5px;
  margin:15px;
  float: left;
  border: 1px solid #000;
  background-color:#fff;
  border-radius: 5px;
  box-shadow: 0 0 15px #fff;
  opacity: 1.0;}

 figure figcaption {
  z-index:3;
  padding: 2px;
  background-color: #636363;
  color: #cccccc;
  font-family: liberation-italic;
  font-size: 12px;
  border-radius: 0 0 3px 3px;}

 figure img {
       z-index:3;
       border-radius: 3px 3px 0 0;
       padding:0px;
       margin:0px;}
 
/* LIGHTBOX ------------------------------------------- */

ul.lightbox li {
  z-index:8;
  overflow: hidden;
  position: absolute;
  width: 0;
  height: 0;
  left: 0;
  top: 0;
  opacity: 0;
  background: rgba(0, 0, 0, 0.75);
  -moz-transition: opacity 1.5s;
  -o-transition: opacity 1.5s;
  -webkit-transition: opacity 1.5s;
  color:#ffffff;
  text-decoration:none;
}
ul.lightbox li:target {
  z-index:8;
  width: 100%;
  height: 100%;
  opacity: 1;
  color:#ffffff;
  text-decoration:none;
}
ul.lightbox li:target a {
  z-index:8;
  position: absolute;
  top: 50%;
  left: 50%;
  margin: -<?php echo $lbh; ?>px 0 0 -<?php echo $lbb; ?>px;
  border: 1px solid #fff;
  -moz-box-shadow:0 1px 8px #000000;
  -o-box-shadow:0 1px 8px #000000;
  -webkit-box-shadow:0 1px 8px #000000;
  color:#ffffff;
  text-decoration:none;
}
ul.lightbox li:target a:hover {
  z-index:8;
  position: absolute;
  top: 50%;
  left: 50%;
  margin: -<?php echo $lbh; ?>px 0 0 -<?php echo $lbb; ?>px;
  border: 1px solid #fff;
  -moz-box-shadow:0 1px 8px #000000;
  -o-box-shadow:0 1px 8px #000000;
  -webkit-box-shadow:0 1px 8px #000000;
  box-shadow: 0px 0px 25px #ffffff;
  color:#ffffff;
  text-decoration:none;
}
/* MESSAGES */
.notes { 
color: #000000; border-bottom:1px solid #000000; border-top:1px solid #000000;
padding: 5px;
margin: 5px;
opacity: 0.8;
}
.notes a:link    {color: #000;  text-decoration:none; border-bottom: 1px solid #000;}
.notes a:visited {color: #000;  text-decoration:none; border-bottom: 1px solid #000;}
.notes a:focus   {color: #000;  text-decoration:none; border-bottom: 1px solid #000;}
.notes a:hover   {color: #000;  text-decoration:none; border-bottom: 0px solid #000;}
.notes a:active  {color: #000;  text-decoration:none; border-bottom: 1px solid #000;}
.notes ul {
  list-style-type: none;
  font-family: liberation;
  margin: 0;
  padding: 0;
}
 
.notes ul li {
  display: inline;
  margin: 0;
  padding: 0;
}
.fehler {
display:inline-block;
border-left:5px solid #ff0000;
background-color:#ffafaf;
padding: 5px;
margin: 5px;
 }
.erfolg {
display:inline-block;
border-left:5px solid #36a736;
background-color: #a6ffa6;
padding: 5px;
margin: 5px;
 }
.comment {
display:inline-block;
border-left:2px solid #cccccc;
border-bottom:2px solid #cccccc;
background-color: #ffffff;
padding: 5px;
margin: 5px;
}
.comment:hover { background-color: #cccccc; }
.comment a:link    {border:1px solid #656565; margin: 5px; color: #000000;  text-decoration:none; background:#ffffff; line-height: 18px; padding:5px; opacity:0.5; 
}
.comment a:visited {border:1px solid #656565; margin: 5px; color: #000000;  text-decoration:none; background:#ffffff; line-height: 18px; padding:5px; opacity:0.5; 
}
.comment a:focus   {border:1px solid #656565; margin: 5px; color: #000000;  text-decoration:none; background:#ffffff; line-height: 18px; padding:5px; opacity:0.5; 
}
.comment a:hover   {border:1px solid #000; margin: 5px; color: #000000;  text-decoration:none; background:#ffffff; line-height: 18px;  padding:5px; opacity:1.0; 
}
.comment a:active  {border:1px solid #656565; margin: 5px; color: #000000;  text-decoration:none; background:#ffffff; line-height: 18px; padding:5px; opacity:0.5;  
}
/*FORUM ----------------------------------------- */
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
$color = '#000000';
$bgimg1 = '../images/system/none.png';
$bgimg2 = '../images/system/none.png';
$bgimg3 = '../images/system/none.png';
$bgimg4 = '../images/system/none.png';
$bgimg5 = '../images/system/none.png';
$bgimg6 = '../images/system/quote.png';
$bgimg7 = '../images/system/code.png';
?>
#head {background-image : url(<?php echo $bgimg2; ?>); background-repeat : repeat-x; background-position : center top; background-color : <?php echo $color; ?>; color:#ffffff; margin : 0 auto; padding : 5px 5px 5px 5px; font-size : 40px; border-radius: 0px; border:1px solid #cccccc; }
.untertitel { background-image : url(<?php echo $bgimg1; ?>); background-repeat : repeat; background-position : center top; font-size : 20px; color:<?php echo $color; ?>; background-color : #ffffff; border-radius: 0px; padding : 5px 5px 5px 5px; margin : 5px 5px 5px 5px; border:1px solid <?php echo $color; ?>; }
#foot {border:1px solid <?php echo $color; ?>; border-radius: 0px; background-color: #ffffff; clear:both; margin : 0 auto; padding : 5px 5px 5px 5px; font-size : 11px; text-align : center;}
.kat {clear:right; z-index:1; background-color : #ffffff; margin : 5px 5px 5px 5px; border-radius: 0px; border:1px solid <?php echo $color; ?>;}
.title {background-image : url(<?php echo $bgimg3; ?>); background-repeat : repeat-x; background-position : center bottom; border-top-left-radius: 0px; border-top-right-radius: 0px; background-color : #cccccc; padding : 5px 5px 5px 5px; margin : 5px 5px 5px 5px; border-bottom:2px solid <?php echo $color; ?>; font-size : 18px;}
.kat2 {overflow:auto; color:<?php echo $color; ?>; font-size : 12px; background-image : url(<?php echo $bgimg3; ?>); background-repeat : repeat-x; background-position : center top; background-color : #ffffff; padding : 5px 0px 5px 5px; margin : 0px 5px 5px 5px; border-bottom:1px solid <?php echo $color; ?>;}
.kat2:hover {overflow:auto; color:<?php echo $color; ?>; font-size : 12px; background-image : url(<?php echo $bgimg4; ?>); background-repeat : repeat-x; background-position : center top; background-color : #cccccc; padding : 5px 0px 5px 5px; margin : 0px 5px 5px 5px; border-bottom:1px solid <?php echo $color; ?>;}
#foot a:link    {color: <?php echo $color; ?>;  text-decoration:none; border-bottom:1px solid <?php echo $color; ?>;}
#foot a:visited {color: <?php echo $color; ?>;  text-decoration:none; border-bottom:1px solid <?php echo $color; ?>;}
#foot a:focus   {color: <?php echo $color; ?>;  text-decoration:none; border-bottom:1px solid <?php echo $color; ?>;}
#foot a:hover   {color: <?php echo $color; ?>;  text-decoration:none; border-bottom:1px solid #cccccc;}
#foot a:active  {color: <?php echo $color; ?>;  text-decoration:none; border-bottom:1px solid <?php echo $color; ?>;}
.spalte {float:left; width:50%;}
.post {overflow:auto; clear:right; margin:0px; padding:5px; border-radius: 0px; border:1px solid <?php echo $color; ?>; background-image : url(<?php echo $bgimg5; ?>); background-repeat : repeat-x; background-position : center top;}
.post2 {overflow:auto; clear:right; margin:8px 2px; padding:0px; border-radius: 0px; background-image : url(<?php echo $bgimg1; ?>); background-repeat : repeat; background-position : center top; background-color: #ffffff;}
.posttext {color:<?php echo $color; ?>; margin:5px; padding:5px; border-radius: 0px; background-color: #cccccc; border:1px solid <?php echo $color; ?>;}
.postsignature {opacity: 0.5; color:<?php echo $color; ?>; margin:5px; padding:5px; border-radius: 0px; background-color: #cccccc; border:1px solid <?php echo $color; ?>;}
.kat2 a:link    {color: <?php echo $color; ?>;  text-decoration:none; font-size : 15px;}
.kat2 a:visited {color: <?php echo $color; ?>;  text-decoration:none; font-size : 15px;}
.kat2 a:focus   {color: <?php echo $color; ?>;  text-decoration:none; font-size : 15px;}
.kat2 a:hover   {color: <?php echo $color; ?>;  text-decoration:underline; font-size : 15px;}
.kat2 a:active  {color: <?php echo $color; ?>;  text-decoration:none; font-size : 15px;}
.text a:link    {color: <?php echo $color; ?>;  text-decoration:none; font-size : 15px;}
.text a:visited {color: <?php echo $color; ?>;  text-decoration:none; font-size : 15px;}
.text a:focus   {color: <?php echo $color; ?>;  text-decoration:none; font-size : 15px;}
.text a:hover   {color: <?php echo $color; ?>;  text-decoration:underline; font-size : 15px;}
.text a:active  {color: <?php echo $color; ?>;  text-decoration:none; font-size : 15px;}
.newbutton a:link, .newbutton a:visited, .newbutton a:focus, .newbutton a:active {float:right; color: #ffffff; background:<?php echo $color; ?>; margin:5px; padding:5px; background-image : url(<?php echo $bgimg2; ?>); background-repeat : repeat-x; background-position : center top; border-radius: 0px;}
.pdinfos {display:none;}
.newbutton a:hover {float:right; color:#ffffff; text-decoration:underline; margin:5px; padding:5px; background-image : url(<?php echo $bgimg2; ?>); background-repeat : repeat-x; background-position : center top; border-radius: 0px;}
.infos {font-size : 15px; border-bottom-left-radius: 0px; border-bottom-right-radius: 0px; border-top-right-radius: 0px; opacity: 0.7; z-index:10; float:right; text-align: left; border:1px solid #00000; background-color: #ffffff; padding: 0px 0px 0px 0px; margin: 5px 5px 0px 5px;}
.lastpost {float:right; padding: 5px 5px 5px 5px; width:200px; border-left:1px solid <?php echo $color; ?>;}
.posts {float:right; padding: 5px 5px 5px 5px; width:100px; border-left:1px solid <?php echo $color; ?>;}
.topics {float:right; padding: 5px 5px 5px 5px; width:100px;}
.infos2 {font-size : 15px; float:right; text-align: left; padding: 0px 0px 0px 0px; margin: 5px 0px 0px 5px;}
.lastpost2 {float:right; padding: 5px 5px 5px 5px; width:200px; border-left:1px solid <?php echo $color; ?>;}
.posts2 {float:right; padding: 5px 5px 5px 5px; width:100px; border-left:1px solid <?php echo $color; ?>;}
.topics2 {float:right; padding: 5px 5px 5px 5px; width:100px;}
#navi img {opacity: 0.7; border:1px solid <?php echo $color; ?>; margin : 0 auto; text-align : center;}
#navi img:hover {opacity: 1.0; border:1px solid <?php echo $color; ?>; margin : 0 auto; text-align : center;}
.text {background-color: #ffffff; padding: 5px 5px 5px 5px; border-radius: 0px; border:1px solid <?php echo $color; ?>; margin-right:5px; overflow:auto;}
#nav {overflow:auto; border:1px solid <?php echo $color; ?>; border-radius: 0px; background-color: #ffffff; clear:both; margin : 0 auto; padding : 5px 5px 5px 5px; font-size : 14px; text-align : center; margin-top:15px;}
#nav a:link, #nav a:visited, #nav a:focus, #nav a:active    {line-height:30px; border-radius: 0px; background-color: #ffffff; color: <?php echo $color; ?>;  text-decoration:none; border:1px solid <?php echo $color; ?>; padding : 3px 3px 3px 3px; margin : 5px 5px 5px 5px;}
#nav a:hover   {line-height:30px; background-image : url(<?php echo $bgimg2; ?>); background-repeat : repeat-x; background-position : center top; border-radius: 0px; background-color: #ffffff; color: <?php echo $color; ?>;  text-decoration:none; border:1px solid <?php echo $color; ?>; padding : 3px 3px 3px 3px; margin : 5px 5px 5px 5px;}
  #colorpicker       { border:1px ridge <?php echo $color17; ?>; }
  #colorpicker td  { width:10px; height:10px; cursor:pointer; border:0px solid <?php echo $color3; ?>; }
  #colorpicker td:hover  {opacity: 0.5; width:10px; height:10px; cursor:pointer; border:0px solid white; box-shadow: 0px 0px 2px <?php echo $color2; ?>, 0px 0px 5px <?php echo $color3; ?>, 0px 0px 15px <?php echo $color2; ?>;}
#credits a:link    {color: <?php echo $color; ?>;  text-decoration:none; border-bottom:0px solid <?php echo $color; ?>;}
#credits a:visited {color: <?php echo $color; ?>;  text-decoration:none; border-bottom:0px solid <?php echo $color; ?>;}
#credits a:focus   {color: <?php echo $color; ?>;  text-decoration:none; border-bottom:0px solid <?php echo $color; ?>;}
#credits a:hover   {color: <?php echo $color; ?>;  text-decoration:none; border-bottom:1px solid <?php echo $color; ?>;}
#credits a:active  {color: <?php echo $color; ?>;  text-decoration:none; border-bottom:0px solid <?php echo $color; ?>;}
.seitenr2 {float:left; margin:2px; padding:5px; border:1px solid <?php echo $color; ?>; border-radius: 0px;}
.zitat {border:1px solid <?php echo $color; ?>; background-color: #cccccc; padding:5px; opacity: 0.8; border-radius: 0px; background-image : url(<?php echo $bgimg6; ?>); background-repeat : no-repeat; background-position : right top;}
.code {border:1px solid <?php echo $color; ?>; background-color: #cccccc; padding:5px; opacity: 0.8; border-radius: 0px; background-image : url(<?php echo $bgimg7; ?>); background-repeat : no-repeat; background-position : right top;}
.avatar {text-align : center;}
.postmain {width:75%; float:left; color:#ffffff;}
.postinfos {width:150px; float:left; background-color: #ffffff; margin:5px; padding:5px; border-radius: 10px;}
.postfunc {width:16px; float:right; background-color: #ffffff; margin:5px; padding:5px; border-radius: 10px;}
.lio {
color:#000000;
background-color: #ffffff;
   font-size: 12px;
 }
.lio:hover {
color:#ffffff;
background-color: #000000;
   font-size: 12px;
 }
 .li1 {
border:1px solid #000000;
color:#000000;
background-color : #ffffff;
  padding: 2px 2px 2px 2px;
   font-size: 12px;
   margin-bottom:5px;
   margin-right:5px;
 }
.pav {float:right; margin:5px;}
.ptxt{float:left;}
.seitenr {float:left; margin:2px; padding:5px;}
#inhalt {width:100%; float:left; color:#000000; margin : 15px 0px 15px 0px; padding : 5px 5px 5px 5px; font-size : 14px; border-radius: 10px; }
  #beitrag
  { width:570px;
    overflow:visible;
    padding:5px;
    position:relative;
  }
  #beitrag button
  { 
  }
  #beitrag select        { margin:0px 3px; }
  #beitrag textarea      { display:block; margin:5px auto; width:100%; }
  #beitrag div.center    { text-align:center; }
  #beitrag img           { border:none; cursor:pointer;}
  #beitrag #buttonleiste { white-space:nowrap; }
  #beitrag #smilies      {float:right; width:250px; position:relative; right:5px; }
#navleft {float:left; line-height:30px; }
#navright {float:right;}
#cpcontainer {height:60px; padding:5px; margin:5px;}
#credits {opacity: 0.8; margin:5px; font-size:10px;}
