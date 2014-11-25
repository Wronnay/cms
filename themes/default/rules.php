<?php
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
$codebody .= '<article>';
$title = ''.l72.' - '.$site_title.'';
$codebody .= '<h2>'.l72.':</h2>';
$codebody .= nl2p(parse_bbcode($site_rules));
$codebody .= '</article>';
?>
