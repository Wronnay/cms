<?php
$codebody .= '<article>';
$title = ''.l72.' - '.$site_title.'';
$codebody .= '<h2>'.l72.':</h2>';
$codebody .= nl2p(parse_bbcode($site_rules));
$codebody .= '</article>';
?>
