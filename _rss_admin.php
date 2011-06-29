<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2011 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: _rss_admin.php
| _RSS
| Author: _ xxyy
| für PHP-Fusion v7.02
+--------------------------------------------------------+
| This program is released as free software under the
| Affero GPL license. You can redistribute it and/or
| modify it under the terms of this license which you
| can read by viewing the included agpl.txt or online
| at www.gnu.org/licenses/agpl.html. Removal of this
| copyright header is strictly prohibited without
| written permission from the original author(s).
+--------------------------------------------------------*/
//intialisiere...
require_once "../../maincore.php";
require_once THEMES."templates/admin_header.php";
require_once INFUSIONS."_rss_panel/_rss.icl.php";
if(isset($_GET['page'])){
$_RPAGE = $_GET['page'];
} else {
$_RPAGE = "settings";
}
require_once "includes/_Admin.class.php";
$Admin = new _Admin($_RPAGE);
if (!checkrights("_RSS") || !defined("iAUTH") || $_GET['aid'] != iAUTH) { redirect("../../index.php"); }
//end
/*// Check if locale file is available matching the current site locale setting.
if (file_exists(INFUSIONS."infusion_folder/locale/".$settings['locale'].".php")) {
	// Load the locale file matching the current site locale setting.
	include INFUSIONS."infusion_folder/locale/".$settings['locale'].".php";
} else {
	// Load the infusion's default locale file.
	include INFUSIONS."infusion_folder/locale/English.php";
}*/

$Admin->Menue();

if($_RPAGE == "settings"){
if(isset($_GET['save'])){
$Admin->SaveSettings();
echo'<div class="admin-message">Einstellungen gespeichert.</div>';
}
opentable("_RSS - Administration - Einstelleungen");

$Admin->RenderSettings();

closetable();

}elseif($_RPAGE == "feeds"){



}elseif($_RPAGE == "seo"){



}elseif($_RPAGE == "user_links"){



}



require_once THEMES."templates/footer.php";
?>