<?php
if(file_exists("system/cache/".$_SESSION['lang']."/".$sitecachename.".html") && time()-filemtime("system/cache/".$_SESSION['lang']."/".$sitecachename.".html")<24*3600) {
  echo file_get_contents("system/cache/".$_SESSION['lang']."/".$sitecachename.".html");
  exit();
}
?>
