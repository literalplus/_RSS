<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2011 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: _Admin.class.php
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
+--------------------------------------------------------+
*/

class _Admin {//admin funktionen

public $Page;


public function __construct($page="settings"){

$this->Page=$page;

add_to_title("&#187;_RSS Administration&#187;".$this->getSiteName());

}

private function getSiteName(){
switch($this->Page){

case "settings":
return "Einstellungen";
break;
case "seo":
return "SEO";
break;
case "feeds":
return "Feeds";
break;
default:
return "Einstellungen";
}

}
public function  Menue(){
$this->Menue2();
}
private function Menue2(){
opentable("_RSS - Administration - Navigation");

echo'<table width="100%" class="noborder"><tr>';
echo'<td class="'.(($this->Page == "settings") ? "tbl2" : "tbl1").'"><a href="'._RSS.'_rss_admin.php?aid='.iAUTH.'&amp;page=settings">Einstellungen</a></td>';
//echo'<td class="'.($this->Page == "seo") ? "tbl2" : "tbl1".'">SEO</td>';
echo'<td class="'.(($this->Page == "feeds") ? "tbl2" : "tbl1").'"><a href="'._RSS.'_rss_admin.php?aid='.iAUTH.'&amp;page=settings">Feeds</a></td>';
echo'</tr></table>';

closetable();
}

public function SaveSettings(){
global $_POST;

$edit = dbquery("UPDATE ".DB_RSS_SETTINGS." SET setting='".$_POST['showcopy']."' WHERE name='showcopy'");
$edit = dbquery("UPDATE ".DB_RSS_SETTINGS." SET setting='".$_POST['rss_site_name']."' WHERE name='rss_site_name'");
$edit = dbquery("UPDATE ".DB_RSS_SETTINGS." SET setting='".$_POST['rss_site_link']."' WHERE name='rss_site_link'");
$edit = dbquery("UPDATE ".DB_RSS_SETTINGS." SET setting='".$_POST['rss_desc']."' WHERE name='rss_desc'");
$edit = dbquery("UPDATE ".DB_RSS_SETTINGS." SET setting='".$_POST['rss_img']."' WHERE name='rss_img'");
$_RSS::ReNewSettings();

}

public function RenderSettings($formname="ReanderSettings"){
global $settings,$rsss;

echo'Willkommen in der Administration von _RSS.Hier k&ouml;nnen einige Einstellungen vorgenommen werden:<br />';
echo'<form name="RenderSettingsForm" action="_rss_admin.php?aid='.iAUTH.'&amp;page=settings&amp;save=NqUr786TRs5g" method="post">';
echo'<table class="noborder" width="100%">';
echo'<tr><td>Einstellung</td><td>Aktueller Wert</td><td>&Auml;ndern</td></tr>';
echo'<tr class="tbl1"><td>Zeige Copyright (&raquo;)?</td><td>'.$rsss['showcopy'].'</td><td>'.$this->MakeYNSelect("showcopy").'</td></tr>';
echo'<tr class="tbl2"><td>Seitenname im RSS-Feed:</td><td>'.$rsss['rss_site_name'].'</td><td>'.$this->MakeTextInput("rss_site_name",$rsss['rss_site_name']).'</td></tr>';
echo'<tr class="tbl1"><td>Seitenlink im RSS-Feed:</td><td>'.$rsss['rss_site_link'].'</td><td>'.$this->MakeTextInput("rss_site_link",$rsss['rss_site_link']).'</td></tr>';
echo'<tr class="tbl2"><td>Kurzbeschreibung der Seite im RSS-Feed:</td><td>'.$rsss['rss_desc'].'</td><td>'.$this->MakeBigTextInput("rss_desc",$rsss['rss_desc']).'</td></tr>';
echo'<tr class="tbl1"><td>Seitenbild im RSS-Feed (Ordner INFUSIONS/_rss_panel/images/):</td><td>'.$rsss['rss_img'].'</td><td>'.$this->MakeTextInput("rss_img",$rsss['rss_img']).'</td></tr>';
echo'</table></form>';

}

private function MakeBigTextInput($name,$variable="0"){

if($variable == "0"){
$set="";
} else {
$set=" value=\"".$variable."\"";
}
echo'<textarea class="textbox" rows="5" cols="20" name="'.$name.'"'.$set.'></textarea>';

}

private function MakeTextInput($name,$variable="0"){

if($variable == "0"){
$set="";
} else {
$set=" value=\"".$variable."\"";
}
echo'<input type="text" class="textbox" name="'.$name.'"'.$set.' />';

}

private function MakeYNSelect($name) {

$Select='<select name="'.$name.'" class="textbox"><option value="-">Nicht ver&auml;ndern</option><option value="0">Nein</option><option value="1">Ja</option></select>';
return $Select;

}

}


?>