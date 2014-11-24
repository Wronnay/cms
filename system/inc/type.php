<?php
if ($type == 'site') {
	$filename = 'themes/'.$site_template.'/incsite.php';
	if (file_exists($filename)) {
		include $filename;
	}
	else {
		include 'themes/default/incsite.php';
	}
}
elseif ($type == 'tag') {
	$filename = 'themes/'.$site_template.'/tag.php';
	if (file_exists($filename)) {
		include $filename;
	}
	else {
		include 'themes/default/tag.php';
	}
}
elseif ($type == 'news') {
	$filename = 'themes/'.$site_template.'/news.php';
	if (file_exists($filename)) {
		include $filename;
	}
	else {
		include 'themes/default/news.php';
	}
}
elseif ($type == 'profile') {
	$filename = 'themes/'.$site_template.'/myprofile.php';
	if (file_exists($filename)) {
		include $filename;
	}
	else {
		include 'themes/default/myprofile.php';
	}
}
elseif ($type == 'login') {
	$filename = 'themes/'.$site_template.'/login.php';
	if (file_exists($filename)) {
		include $filename;
	}
	else {
		include 'themes/default/login.php';
	}
}
elseif ($type == 'logout') {
	$filename = 'themes/'.$site_template.'/logout.php';
	if (file_exists($filename)) {
		include $filename;
	}
	else {
		include 'themes/default/logout.php';
	}
}
elseif ($type == 'rules') {
	$filename = 'themes/'.$site_template.'/rules.php';
	if (file_exists($filename)) {
		include $filename;
	}
	else {
		include 'themes/default/rules.php';
	}
}
elseif ($type == 'search') {
	$filename = 'themes/'.$site_template.'/search.php';
	if (file_exists($filename)) {
		include $filename;
	}
	else {
		include 'themes/default/search.php';
	}
}
elseif ($type == 'register') {
	$filename = 'themes/'.$site_template.'/register.php';
	if (file_exists($filename)) {
		include $filename;
	}
	else {
		include 'themes/default/register.php';
	}
}
elseif ($type == 'topic') {
	$filename = 'themes/'.$site_template.'/topic.php';
	if (file_exists($filename)) {
		include $filename;
	}
	else {
		include 'themes/default/topic.php';
	}
}
elseif ($type == 'forum') {
	$filename = 'themes/'.$site_template.'/forum.php';
	if (file_exists($filename)) {
		include $filename;
	}
	else {
		include 'themes/default/forum.php';
	}
}
elseif ($type == 'board') {
	$filename = 'themes/'.$site_template.'/board.php';
	if (file_exists($filename)) {
		include $filename;
	}
	else {
		include 'themes/default/board.php';
	}
}
elseif ($type == 'messages') {
	$filename = 'themes/'.$site_template.'/messages.php';
	if (file_exists($filename)) {
		include $filename;
	}
	else {
		include 'themes/default/messages.php';
	}
}
elseif ($type == 'user') {
	$filename = 'themes/'.$site_template.'/user.php';
	if (file_exists($filename)) {
		include $filename;
	}
	else {
		include 'themes/default/user.php';
	}
}
elseif ($type == 'act') {
	$filename = 'themes/'.$site_template.'/act.php';
	if (file_exists($filename)) {
		include $filename;
	}
	else {
		include 'themes/default/act.php';
	}
}
?>
