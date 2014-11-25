<?php
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
if(file_exists("system/cache/".$lang."/".$sitecachename.".html") && time()-filemtime("system/cache/".$lang."/".$sitecachename.".html")<24*3600) {
  echo file_get_contents("system/cache/".$lang."/".$sitecachename.".html");
  exit();
}
?>
