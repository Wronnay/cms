<?php
if ($type == 'site') {
include 'themes/'.$site_template.'/incsite.php';
}
elseif ($type == 'tag') {
include 'themes/'.$site_template.'/tag.php';
}
elseif ($type == 'news') {
include 'themes/'.$site_template.'/news.php';
}
elseif ($type == 'profile') {
include 'themes/'.$site_template.'/myprofile.php';
}
elseif ($type == 'login') {
include 'themes/'.$site_template.'/login.php';
}
elseif ($type == 'logout') {
include 'themes/'.$site_template.'/logout.php';
}
elseif ($type == 'rules') {
include 'themes/'.$site_template.'/rules.php';
}
elseif ($type == 'search') {
include 'themes/'.$site_template.'/search.php';
}
elseif ($type == 'register') {
include 'themes/'.$site_template.'/register.php';
}
elseif ($type == 'topic') {
include 'themes/'.$site_template.'/topic.php';
}
elseif ($type == 'forum') {
include 'themes/'.$site_template.'/forum.php';
}
elseif ($type == 'board') {
include 'themes/'.$site_template.'/board.php';
}
elseif ($type == 'messages') {
include 'themes/'.$site_template.'/messages.php';
}
elseif ($type == 'user') {
include 'themes/'.$site_template.'/user.php';
}
?>
