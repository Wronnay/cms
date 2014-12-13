CREATE TABLE IF NOT EXISTS `$PREFIX_ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `url` varchar(220) NOT NULL,
  `img` varchar(220) NOT NULL,
  `code` text NOT NULL,
  `date` datetime NOT NULL,
  `clicks` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `type` varchar(220) NOT NULL,
  `lang` varchar(220) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `$PREFIX_apps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(220) NOT NULL,
  `code` text NOT NULL,
  `date` datetime NOT NULL,
  `type` varchar(220) NOT NULL,
  `type_id` int(11) NOT NULL,
  `autor_id` int(11) NOT NULL,
  `lang` varchar(220) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `$PREFIX_comments` (
  `id` int(22) NOT NULL AUTO_INCREMENT,
  `site_id` int(22) NOT NULL,
  `news_id` int(11) NOT NULL,
  `autor_id` int(22) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL,
  `lang` varchar(220) NOT NULL,
  `name` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `$PREFIX_counter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `number` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `$PREFIX_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(220) NOT NULL,
  `url` varchar(220) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `active` int(11) NOT NULL,
  `lang` varchar(220) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `$PREFIX_data` (`id`, `name`, `url`, `text`, `date`, `active`, `lang`) VALUES
(1, 'title', 'none', 'WronnayCMS', '2013-03-25 20:05:40', 0, 'de'),
(2, 'subtitle', 'none', 'Das WronnayCMS', '2013-03-25 20:05:40', 0, 'de'),
(3, 'logo', '', 'Das Logo von WronnayCMS', '2013-03-25 20:05:40', 1, 'de'),
(4, 'favicon', 'images/system/favicon.ico', 'none', '2013-03-25 20:05:40', 0, 'de'),
(5, 'headtitle', 'none', 'WronnayCMS', '2013-03-25 20:05:40', 0, 'de'),
(6, 'imprint', 'index.php?site=impressum', 'none', '2013-03-25 20:05:40', 0, 'de'),
(7, 'rules', 'none', 'Die Registrierung und Benutzung unseres Forums ist kostenlos. Durch Ihre Anmeldung erklären Sie sich mit den Forenregeln einverstanden.\r\n\r\n[b]Verhalten & Kommunikation[/b]\r\nFormuliere deine Fragen, Beiträge, Umfragen, Gedanken... klar und deutlich. Achte bitte auch auf Rechtschreibung, Satzzeichen, Absätze, Abstände, Akzente und dezente Smilie-Benutzung. Mit dem Absenden deiner Nachricht/ Botschaft achte bitte auch sorgfältig darauf in welche Kategorie sie gehört.\r\n\r\n[b]Doppelte Postings[/b]\r\nIhr solltet vermeiden gleiche Postings in verschiedenen Kategorien zu posten. Falls ihr euch nicht sicher seit in welches Forum die Frage gehört, wendet euch bitte direkt an unser Team. Das Posten von privaten Inhalten/Informationen von oder über andere Mitglieder ist Verboten!\r\n\r\n[b]Links / Werbung[/b]\r\nLinks oder Eigenwerbung dürfen nur für eure eigene Homepage stattfinden und auch nur in der dafür vorgesehenen Kategorie. Es ist Verboten kommerzielle Projekte zu bewerben oder/und Seiten die gegen VII verstoßen. Wiederholte oder merfache Eigenwerbung ist nicht gestattet!\r\n\r\n[b]Hilfe-Bereich[/b]\r\nBei Fragen rund um unser Webangebot oder eventuelle andere Fragen die nicht in eine Kategorie passen, bitte direkt an unser Team richten.\r\n\r\n[b]Copyright & geltende Gesetze beachten[/b]\r\nWenn Sie Artikel, Bilder, Videos oder ähnliches posten wollen, dann sprechen Sie sicherhaltshalber vorher mit dem Rechtinhaber, dem das Urheberrecht gehört! Der Inhaber des Forums kommt nicht für diese Missachtung auf und kann nicht zur Rechenschaft gezogen werden. Jedes Mitglied ist für seine Inhalte selbst verantwortlich und kann je nach Missachtung dieser Regeln belangt werden.\r\n\r\n[b]Regelverstöße[/b]\r\nBei wiederholtem Verstoß gegen unsere Forumregeln wird ohne vorherige Ankündigung Ihr Account gelöscht.\r\n\r\n[b]Abschließend[/b]\r\nDurch dein Einverständnis der Regeln garantierst du, dass du keine Nachrichten oder Beiträge mit vulgären, rassistischen, sexuell-orientierten, gewaltverherrlichten oder der gleichen im Forum postest, die gegen das geltende deutsche Recht/ dem Gesetz der Bundesrepublik Deutschland verstoßen.', '2013-07-05 22:54:11', 0, 'de'),
(9, 'key', 'none', '346456546daf', '2013-03-25 20:05:40', 0, 'de'),
(10, 'referrer', 'none', 'yes', '2013-03-25 20:05:40', 0, 'de'),
(11, 'description', 'none', 'Die Webseite des WronnayCMS', '2013-03-25 20:05:40', 0, 'de'),
(12, 'keywords', 'none', 'WronnayCMS, Support Forum, forum, foren, board', '2013-03-25 20:05:40', 0, 'de'),
(13, 'design', 'css/ampersand.css', 'none', '2013-03-25 20:05:40', 0, 'de'),
(14, 'title', 'none', 'WronnayCMS', '2013-03-25 20:05:40', 0, 'en'),
(15, 'subtitle', 'none', 'Das Support-Forum von WronnayCMS', '2013-03-25 20:05:40', 0, 'en'),
(16, 'logo', 'images/system/logo2.png', 'Das Logo von WronnayCMS', '2013-03-25 20:05:40', 1, 'en'),
(17, 'favicon', 'images/system/favicon.ico', 'none', '2013-03-25 20:05:40', 0, 'en'),
(18, 'headtitle', 'none', 'WronnayCMS', '2013-03-25 20:05:40', 0, 'en'),
(19, 'imprint', 'index.php?site=impressum', 'none', '2013-03-25 20:05:40', 0, 'en'),
(20, 'rules', 'none', 'Die Registrierung und Benutzung unseres Forums ist kostenlos. Durch Ihre Anmeldung erklären Sie sich mit den Forenregeln einverstanden.\r\n\r\n[b]Verhalten & Kommunikation[/b]\r\nFormuliere deine Fragen, Beiträge, Umfragen, Gedanken... klar und deutlich. Achte bitte auch auf Rechtschreibung, Satzzeichen, Absätze, Abstände, Akzente und dezente Smilie-Benutzung. Mit dem Absenden deiner Nachricht/ Botschaft achte bitte auch sorgfältig darauf in welche Kategorie sie gehört.\r\n\r\n[b]Doppelte Postings[/b]\r\nIhr solltet vermeiden gleiche Postings in verschiedenen Kategorien zu posten. Falls ihr euch nicht sicher seit in welches Forum die Frage gehört, wendet euch bitte direkt an unser Team. Das Posten von privaten Inhalten/Informationen von oder über andere Mitglieder ist Verboten!\r\n\r\n[b]Links / Werbung[/b]\r\nLinks oder Eigenwerbung dürfen nur für eure eigene Homepage stattfinden und auch nur in der dafür vorgesehenen Kategorie. Es ist Verboten kommerzielle Projekte zu bewerben oder/und Seiten die gegen VII verstoßen. Wiederholte oder merfache Eigenwerbung ist nicht gestattet!\r\n\r\n[b]Hilfe-Bereich[/b]\r\nBei Fragen rund um unser Webangebot oder eventuelle andere Fragen die nicht in eine Kategorie passen, bitte direkt an unser Team richten.\r\n\r\n[b]Copyright & geltende Gesetze beachten[/b]\r\nWenn Sie Artikel, Bilder, Videos oder ähnliches posten wollen, dann sprechen Sie sicherhaltshalber vorher mit dem Rechtinhaber, dem das Urheberrecht gehört! Der Inhaber des Forums kommt nicht für diese Missachtung auf und kann nicht zur Rechenschaft gezogen werden. Jedes Mitglied ist für seine Inhalte selbst verantwortlich und kann je nach Missachtung dieser Regeln belangt werden.\r\n\r\n[b]Regelverstöße[/b]\r\nBei wiederholtem Verstoß gegen unsere Forumregeln wird ohne vorherige Ankündigung Ihr Account gelöscht.\r\n\r\n[b]Abschließend[/b]\r\nDurch dein Einverständnis der Regeln garantierst du, dass du keine Nachrichten oder Beiträge mit vulgären, rassistischen, sexuell-orientierten, gewaltverherrlichten oder der gleichen im Forum postest, die gegen das geltende deutsche Recht/ dem Gesetz der Bundesrepublik Deutschland verstoßen.', '2013-03-25 20:05:40', 0, 'en'),
(21, 'key', 'none', '346456546daf', '2013-03-25 20:05:40', 0, 'en'),
(22, 'referrer', 'none', 'yes', '2013-03-25 20:05:40', 0, 'en'),
(23, 'description', 'none', 'Die Webseite des WronnayCMS', '2013-03-25 20:05:40', 0, 'en'),
(24, 'keywords', 'none', 'WronnayCMS, Support Forum, forum, foren, board', '2013-03-25 20:05:40', 0, 'en'),
(25, 'design', 'css/ampersand.css', 'none', '2013-03-25 20:05:40', 0, 'en'),
(26, 'template', '', 'ampersand', '2013-03-26 00:00:00', 0, ''),
(27, 'email', 'noreply@example.com', 'none', '2013-11-08 00:00:00', 0, 'en'),
(28, 'email_act', 'none', 'none', '2013-11-08 00:00:00', 0, 'en');

CREATE TABLE IF NOT EXISTS `$PREFIX_designs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(220) NOT NULL,
  `url` varchar(220) NOT NULL,
  `pic` varchar(220) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `$PREFIX_designs` (`id`, `name`, `url`, `pic`, `date`) VALUES
(1, 'WCMSblack', 'css/wcmsblack.css.php', 'wcmsblack.png', '2013-06-16 00:00:00'),
(2, 'green_black', 'css/green_black.css.php', 'green_black.png', ''),
(3, 'Simple-SkyBlue', 'css/Simple-SkyBlue.css.php', 'Simple-SkyBlue.png', ''),
(4, 'Bootstrap_starter', 'css/Bootstrap_starter.css.php', 'Bootstrap_starter.png', ''),
(5, 'ampersand', 'css/ampersand.css', 'ampersand.png', '');

CREATE TABLE IF NOT EXISTS `$PREFIX_icons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `set` varchar(220) NOT NULL,
  `title` varchar(220) NOT NULL,
  `url` varchar(220) NOT NULL,
  `lang` varchar(220) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `$PREFIX_kat1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(220) NOT NULL,
  `lang` varchar(220) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `$PREFIX_kat2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(220) NOT NULL,
  `kat1_id` int(11) NOT NULL,
  `beschreibung` text NOT NULL,
  `lang` varchar(220) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `$PREFIX_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(220) NOT NULL,
  `url` varchar(220) NOT NULL,
  `menue_id` int(11) NOT NULL,
  `lang` varchar(220) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `$PREFIX_links` (`id`, `name`, `url`, `menue_id`, `lang`) VALUES
(1, 'Startseite', '?site=index', '1', 'de'),
(2, 'Home', '?site=index', '1', 'en');

CREATE TABLE IF NOT EXISTS `$PREFIX_menue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(220) NOT NULL,
  `name` varchar(220) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `$PREFIX_menue` (`id`, `type`, `name`) VALUES
(1, 'header', 'Hauptmenue'),
(2, 'footer', 'Wichtiges');

CREATE TABLE IF NOT EXISTS `$PREFIX_nachrichten` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userFrom` int(11) NOT NULL,
  `userTo` int(11) NOT NULL,
  `subject` varchar(220) NOT NULL,
  `body` text NOT NULL,
  `sendtime` datetime NOT NULL,
  `readen` tinyint(4) NOT NULL,
  `inbox_delete` tinyint(4) NOT NULL,
  `outbox_delete` tinyint(4) NOT NULL,
  `lang` varchar(220) NOT NULL,
  PRIMARY KEY (`ID`)
);

CREATE TABLE IF NOT EXISTS `$PREFIX_news` (
  `id` int(22) NOT NULL AUTO_INCREMENT,
  `autor_id` int(22) NOT NULL,
  `title` varchar(220) NOT NULL,
  `news` text NOT NULL,
  `date` datetime NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `lang` varchar(220) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `$PREFIX_news` (`id`, `autor_id`, `title`, `news`, `date`, `description`, `keywords`, `lang`) VALUES
(1, 1, 'Ihre erste News.', '<h3>Überschrift</h3><p>Beispieltext.</p><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>', '2013-06-16 00:00:00', 'Beispieltext.', 'Beispiel, Text, News', 'de'),
(2, 1, 'Your first News.', '<h3>Headline</h3><p>Sample text.</p><p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>', '2013-06-16 00:00:00', 'Sample text.', 'Sample, Text, News', 'en');

CREATE TABLE IF NOT EXISTS `$PREFIX_online` (
  `ip` varchar(220) DEFAULT NULL,
  `date` datetime DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS `$PREFIX_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `autor_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `title` varchar(220) NOT NULL,
  `post` text NOT NULL,
  `date` datetime NOT NULL,
  `lang` varchar(220) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `$PREFIX_sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `autor_id` int(11) NOT NULL,
  `name` varchar(220) NOT NULL,
  `title` varchar(220) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `description` text NOT NULL,
  `tags` text NOT NULL,
  `pic` varchar(220) NOT NULL,
  `lang` varchar(220) NOT NULL,
  `cache` int(11) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `$PREFIX_sites` (`id`, `autor_id`, `name`, `title`, `text`, `date`, `description`, `tags`, `pic`, `lang`) VALUES
(1, 1, 'index', 'Startseite', '<h2>Hallo.</h2><p>Dies ist die Startseite Ihrer Webseite.</p><p>Jetzt ein paar Neuigkeiten:</p>#news#', '', 'Die Startseite Ihrer Webseite.', 'startseite, webseite', '', 'de'),
(2, 1, 'index', 'Home', '<h2>Hello.</h2><p>This is your new Homepage.</p><p>Now some news:</p>#news#', '', 'This is your new Homepage.', 'homepage, home, page', '', 'en'),
(3, 1, 'error', 'Error', '<h2>Hey.</h2><p>Something went wrong.</p>', '', 'Something went wrong.', 'error', '', 'en'),
(4, 1, 'error', 'Error', '<h2>Hallo.</h2><p>Etwas ist schief gelaufen.</p>', '', 'Etwas ist schief gelaufen.', 'error', '', 'de');

CREATE TABLE IF NOT EXISTS `$PREFIX_smilies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(220) NOT NULL,
  `title` varchar(220) NOT NULL,
  `url` varchar(220) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `$PREFIX_smilies` (`id`, `color`, `title`, `url`) VALUES
(1, 'green', ':alien:', 'icon_alien.gif'),
(2, 'green', ':biggrin:', 'icon_biggrin.gif'),
(3, 'green', ':blush:', 'icon_blush.gif'),
(4, 'green', ':censored:', 'icon_censored.gif'),
(5, 'green', ':confused:', 'icon_confused.gif'),
(6, 'green', ':cool:', 'icon_cool.gif'),
(7, 'green', ':cuinlove:', 'icon_cuinlove.gif'),
(8, 'green', ':down:', 'icon_down.gif'),
(9, 'green', ':eek:', 'icon_eek.gif'),
(10, 'green', ':erschreckt:', 'icon_erschreckt.gif'),
(11, 'green', ':fies:', 'icon_fies.gif'),
(12, 'green', ':frown:', 'icon_frown.gif'),
(13, 'green', ':igitt:', 'icon_igitt.gif'),
(14, 'green', ':irre:', 'icon_irre.gif'),
(15, 'green', ':lol:', 'icon_lol.gif'),
(16, 'green', ':mad:', 'icon_mad.gif'),
(17, 'green', ':neutral:', 'icon_neutral.gif'),
(18, 'green', ':nosmile:', 'icon_nosmile.gif'),
(19, 'green', ':razz:', 'icon_razz.gif'),
(20, 'green', ':rolleyes:', 'icon_rolleyes.gif'),
(21, 'green', ':shocked:', 'icon_shocked.gif'),
(22, 'green', ':skeptisch:', 'icon_skeptisch.gif'),
(23, 'green', ':slash:', 'icon_slash.gif'),
(24, 'green', ':smile:', 'icon_smile.gif'),
(25, 'green', ':x', 'icon_stumm.gif'),
(26, 'green', ':ugly:', 'icon_ugly.gif'),
(27, 'green', ':wink:', 'icon_wink.gif');

CREATE TABLE IF NOT EXISTS `$PREFIX_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(220) NOT NULL,
  `type` varchar(220) NOT NULL,
  `code` text NOT NULL,
  `date` datetime NOT NULL,
  `lang` varchar(220) NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `$PREFIX_templates` (`id`, `name`, `type`, `code`, `date`, `lang`) VALUES
(1, 'WCMSblack', 'meta', '', '2013-03-26 00:00:00', ''),
(2, 'WCMSblack', 'header', '<header>\r\n    <nav>\r\n      <ul>\r\n#header_nav\r\n      </ul>\r\n    </nav>\r\n</header>', '2013-03-26 00:00:00', ''),
(3, 'WCMSblack', 'footer', '<footer>\r\n    <nav>\r\n      <ul>\r\n#footer_nav\r\n      </ul>\r\n    </nav>\r\n</footer>', '2013-03-26 00:00:00', ''),
(4, 'green_black', 'meta', '', '', ''),
(5, 'green_black', 'header', '</div><!--navi--><div class="l"><p>Main:</p>#header_nav', '', ''),
(6, 'green_black', 'footer', '<p>Second:</p>#footer_nav</div><!--navi end-->', '', ''),
(7, 'Simple-SkyBlue', 'meta', '', '', ''),
(8, 'Simple-SkyBlue', 'header', '<!--navi--><div class="navi">#header_nav', '', ''),
(9, 'Simple-SkyBlue', 'footer', '#footer_nav<!--Den Link nicht entfernen!--><img src="themes/Simple-SkyBlue/images/trennstrich.png" alt=""><a href="http://celzekr.webpage4.me">Designed by celzekr</a><!--Den Link nicht entfernen! end--></div><!--navi end-->', '', ''),
(10, 'Bootstrap_starter', 'meta', '', '', ''),
(11, 'Bootstrap_starter', 'header', '#header_nav', '', ''),
(12, 'Bootstrap_starter', 'footer', '#footer_nav', '', ''),
(13, 'ampersand', 'meta', '', '', ''),
(14, 'ampersand', 'header', '#header_nav', '', ''),
(15, 'ampersand', 'footer', '#footer_nav', '', '');

CREATE TABLE IF NOT EXISTS `$PREFIX_topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kat2_id` int(11) NOT NULL,
  `autor_id` int(11) NOT NULL,
  `title` varchar(220) NOT NULL,
  `date` datetime NOT NULL,
  `lang` varchar(220) NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `$PREFIX_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(220) NOT NULL,
  `password` varchar(220) NOT NULL,
  `registerdate` datetime NOT NULL,
  `email` varchar(220) NOT NULL,
  `show_email` int(11) NOT NULL,
  `rang` varchar(220) NOT NULL,
  `signature` text NOT NULL,
  `avatar` varchar(220) NOT NULL,
  `facebook` varchar(220) NOT NULL,
  `twitter` varchar(220) NOT NULL,
  `googleplus` varchar(220) NOT NULL,
  `firstname` varchar(220) NOT NULL,
  `lastname` varchar(220) NOT NULL,
  `website` varchar(220) NOT NULL,
  `newsletter` int(11) NOT NULL,
  `messages` int(11) NOT NULL,
  `answers` int(11) NOT NULL,
  `lang` varchar(220) NOT NULL,
  `ref` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `server` int(11) NOT NULL,
  `cms` varchar(220) NOT NULL,
  `quest` int(11) NOT NULL,
  `country` VARCHAR(220) NOT NULL,
  `city` VARCHAR(220) NOT NULL,
  `adress` VARCHAR(220) NOT NULL,
  `street` VARCHAR(220) NOT NULL,
  `streetnumber` VARCHAR(220) NOT NULL,
  `phonenumber` VARCHAR(220) NOT NULL,
  `act_code` VARCHAR(10) NOT NULL,
  `act` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`)
);
