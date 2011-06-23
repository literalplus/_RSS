<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2011 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: _rss_panel.php
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
if (!defined("IN_FUSION")) { die("Access Denied"); }
require_once INFUSIONS."_rss_panel/_rss.icl.php";

/*// Check if locale file is available matching the current site locale setting.
if (file_exists(INFUSIONS."infusion_folder/locale/".$settings['locale'].".php")) {
	// Load the locale file matching the current site locale setting.
	include INFUSIONS."infusion_folder/locale/".$settings['locale'].".php";
} else {
	// Load the infusion's default locale file.
	include INFUSIONS."infusion_folder/locale/English.php";
}*/

if(isset($_rss_panel_type) && $_rss_panel_type == "update"){

/*if(fileperms(INFUSIONS."_rss_panel/rss.xml") < 600){
echo"<div class='admin-message' style='text-align:center'><strong>_RSS Fehler:</strong><br />
rss.xml ist für das Script nicht schreibbar! Bitte Dateiberechtigungen auf mindestens 644 setzen, da sonst die Feeds nicht aktualisiert werden k&ouml;nnen!";
if(!iADMIN){

echo"<br />Bitte teile diese Fehlermeldung einem Administrator mit!";

}
echo"</div>";

}*/



#TODO

} else {

//Feeds anzeigen!

openside("_RSS Feeds");

#TODO

closeside();
}


// opentable("Center panel");
// closetable();
?>