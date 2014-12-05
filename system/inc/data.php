<?php
/*
CMS by Christoph Miksche
Website: http://cms.wronnay.net
License: GNU General Public License
*/
    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    active = '0'
		AND
		    name = 'title'
        AND
                    lang = '".$lang."'
		";
    $dbpre = $dbc->prepare($sql1);
    $dbpre->execute();
    while ($row1 = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$site_title = nocss($row1['text']);
    }
    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    active = '0'
		AND
		    name = 'rules'
        AND
                    lang = '".$lang."'
		";
    $dbpre = $dbc->prepare($sql1);
    $dbpre->execute();
    while ($row1 = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$site_rules = nocss($row1['text']);
    }
    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    active = '0'
		AND
		    name = 'headtitle'
        AND
                    lang = '".$lang."'
		";
    $dbpre = $dbc->prepare($sql1);
    $dbpre->execute();
    while ($row1 = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$site_headtitle = nocss($row1['text']);
    }
    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    active = '0'
		AND
		    name = 'imprint'
        AND
                    lang = '".$lang."'
		";
    $dbpre = $dbc->prepare($sql1);
    $dbpre->execute();
    while ($row1 = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$site_imprint = nocss($row1['url']);
    }
    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    active = '0'
		AND
		    name = 'subtitle'
        AND
                    lang = '".$lang."'
		";
    $dbpre = $dbc->prepare($sql1);
    $dbpre->execute();
    while ($row1 = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$site_subtitle = nocss($row1['text']);
    }
    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    active = '0'
		AND
		    name = 'logo'
        AND
                    lang = '".$lang."'
		";
    $dbpre = $dbc->prepare($sql1);
    $dbpre->execute();
    while ($row1 = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$site_logo = nocss($row1['url']);
$site_logoalt = nocss($row1['text']);
    }
    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    active = '0'
		AND
		    name = 'favicon'
		";
    $dbpre = $dbc->prepare($sql1);
    $dbpre->execute();
    while ($row1 = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$site_favicon = nocss($row1['url']);
    }
	    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    active = '0'
		AND
		    name = 'url'
		";
    $dbpre = $dbc->prepare($sql1);
    $dbpre->execute();
    while ($row1 = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$site_url = nocss($row1['url']);
    }
	    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    active = '0'
		AND
		    name = 'key'
		";
    $dbpre = $dbc->prepare($sql1);
    $dbpre->execute();
    while ($row1 = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$site_key = nocss($row1['text']);
    }

	    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    active = '0'
		AND
		    name = 'referrer'
		";
    $dbpre = $dbc->prepare($sql1);
    $dbpre->execute();
    while ($row1 = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$site_referrer = nocss($row1['text']);
    }
	    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    active = '0'
		AND
		    name = 'description'
        AND
                    lang = '".$lang."'
		";
    $dbpre = $dbc->prepare($sql1);
    $dbpre->execute();
    while ($row1 = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$site_description = nocss($row1['text']);
    }
	    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    active = '0'
		AND
		    name = 'keywords'
        AND
                    lang = '".$lang."'
		";
    $dbpre = $dbc->prepare($sql1);
    $dbpre->execute();
    while ($row1 = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$site_keywords = nocss($row1['text']);
    }
	    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    active = '0'
		AND
		    name = 'design'
		";
    $dbpre = $dbc->prepare($sql1);
    $dbpre->execute();
    while ($row1 = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$site_design = nocss($row1['url']);
    }
	    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    active = '0'
		AND
		    name = 'template'
		";
    $dbpre = $dbc->prepare($sql1);
    $dbpre->execute();
    while ($row1 = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$site_template = nocss($row1['text']);
    }
	    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    active = '0'
		AND
		    name = 'email'
		";
    $dbpre = $dbc->prepare($sql1);
    $dbpre->execute();
    while ($row1 = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$site_email = nocss($row1['url']);
    }
	    $sql1 = "SELECT
            id,
            name,
			url,
			text,
			date,
			active
        FROM
            ".$PREFIX."_data
        WHERE
		    name = 'email_act'
		";
    $dbpre = $dbc->prepare($sql1);
    $dbpre->execute();
    while ($row1 = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$site_user_act = nocss($row1['active']);
    }
	    $sql1 = "SELECT
			text
        FROM
            ".$PREFIX."_data
        WHERE
		    name = 'version'
		";
    $dbpre = $dbc->prepare($sql1);
    $dbpre->execute();
    while ($row1 = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$VERSION = nocss($row1['text']);
    }
	    $sql1 = "SELECT
			text
        FROM
            ".$PREFIX."_data
        WHERE
		    name = 'senddata'
		";
    $dbpre = $dbc->prepare($sql1);
    $dbpre->execute();
    while ($row1 = $dbpre->fetch(PDO::FETCH_ASSOC)) {
$senddata = nocss($row1['text']);
    }
?>
