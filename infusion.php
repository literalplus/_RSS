<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2011 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: infusion.php
| _RSS
| Author: _xxyy
| für PHP-Fusion v 7.02.xx
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/
if (!defined("IN_FUSION")) { die("Access Denied"); }

include INFUSIONS."_rss_panel/infusion_db.php";

/*// Check if locale file is available matching the current site locale setting.
if (file_exists(INFUSIONS."infusion_folder/locale/".$settings['locale'].".php")) {
	// Load the locale file matching the current site locale setting.
	include INFUSIONS."infusion_folder/locale/".$settings['locale'].".php";
} else {
	// Load the infusion's default locale file.
	include INFUSIONS."infusion_folder/locale/English.php";
}*/

// Infusion general information
$inf_title = "_RSS";
$inf_description = "RSS Feeds";
$inf_version = "1.0";
$inf_developer = "xxyy";
$inf_email = "xxyy98@gmail.com";
$inf_weburl = "http://xxyy.bplaced.net/";

$inf_folder = "_rss_panel"; // The folder in which the infusion resides.

// Delete any items not required below.
$inf_newtable[1] = DB_RSS_SETTINGS." (
id SMALLINT(5) UNSIGNED AUTO_INCREMENT,
name TINYINT(5) NOT NULL,
setting VARCHAR(200) NOT NULL,
PRIMARY KEY (id)
) ENGINE=MyISAM;";

$inf_newtable[2] = DB_RSS_CRYPT." (
cid INT(10) UNSIGNED AUTO_INCREMENT,
cuid INT(10) NOT NULL,
crypt TEXT NOT NULL,
PRIMARY KEY (cid)
) ENGINE=MyISAM;";
$inf_newtable[3] = DB_RSS_USERS." (
id INT(10) UNSIGNED AUTO_INCREMENT,
uid INT(10) NOT NULL,
crypt TINYINT(1) NOT NULL,
userfeeds TINYINT(1) NOT NULL,
PRIMARY KEY (id)
) ENGINE=MyISAM;";

$inf_insertdbrow[1] = DB_RSS_SETTINGS." (name,setting) VALUES('showcopy', '1')";
$inf_insertdbrow[2] = DB_RSS_SETTINGS." (name,setting) VALUES('panel_title', '_RSS Feeds')";
$inf_insertdbrow[3] = DB_RSS_SETTINGS." (name,setting) VALUES('rss_img', 'rss_logo.png')";
//feeds
$inf_insertdbrow[4] = DB_RSS_SETTINGS." (name,setting) VALUES('forum', '0')";
$inf_insertdbrow[5] = DB_RSS_SETTINGS." (name,setting) VALUES('news', '0')";
$inf_insertdbrow[6] = DB_RSS_SETTINGS." (name,setting) VALUES('downloads', '0')";
$inf_insertdbrow[7] = DB_RSS_SETTINGS." (name,setting) VALUES('pro_downloads', '0')";
$inf_insertdbrow[8] = DB_RSS_SETTINGS." (name,setting) VALUES('articles', '0')";
$inf_insertdbrow[9] = DB_RSS_SETTINGS." (name,setting) VALUES('pns', '0')";
$inf_insertdbrow[10] = DB_RSS_SETTINGS." (name,setting) VALUES('pfss', '0')";
$inf_insertdbrow[11] = DB_RSS_SETTINGS." (name,setting) VALUES('lotto', '0')";
$inf_insertdbrow[12] = DB_RSS_SETTINGS." (name,setting) VALUES('photos', '0')";
$inf_insertdbrow[13] = DB_RSS_SETTINGS." (name,setting) VALUES('submissions', '0')";
$inf_insertdbrow[14] = DB_RSS_SETTINGS." (name,setting) VALUES('hue', '0')";
$inf_insertdbrow[15] = DB_RSS_SETTINGS." (name,setting) VALUES('raetseldb', '0')";
$inf_insertdbrow[16] = DB_RSS_SETTINGS." (name,setting) VALUES('awecal', '0')";
//feeds
$inf_insertdbrow[17] = DB_RSS_SETTINGS." (name,setting) VALUES('rss_site_name', '".$settings["sitename"]."')";
$inf_insertdbrow[18] = DB_RSS_SETTINGS." (name,setting) VALUES('rss_site_link', '0')";
$inf_insertdbrow[19] = DB_RSS_SETTINGS." (name,setting) VALUES('rss_desc', '0')";
$inf_insertdbrow[20] = DB_RSS_SETTINGS." (name,setting) VALUES('user_links', '0')";//Links für spezifischen User, sonst nur öffentliches, PNs etc. deaktiviert!


$inf_droptable[1] = DB_RSS_SETTINGS;
$inf_droptable[2] = DB_RSS_CRYPT;
$inf_droptable[3] = DB_RSS_USERS;

$inf_deldbrow[1] = DB_PANELS." WHERE panel_filename='".$inf_folder."'";

$inf_insertdbrow[1] = DB_PANELS." SET panel_name='_RSS Update Panel', panel_filename='".$inf_folder."', panel_content='\$_rss_panel_type = \"update\"; \include INFUSIONS.\"_rss_panel/_rss_panel.php\";', panel_side=2, panel_order='50', panel_type='php', panel_access='0', panel_display='1', panel_status='1' ";

$inf_adminpanel[1] = array(
	"title" => "_RSS Admin",
	"image" => "_rss.gif",
	"panel" => "_rss_admin.php",
	"rights" => "_RSS"
);

/*$inf_sitelink[1] = array(
	"title" => $locale['xxx_link1'],
	"url" => "filename.php",
	"visibility" => "0"
);*/
?>