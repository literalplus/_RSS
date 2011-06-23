<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2011 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: _rss.icl.php
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
if(!defined("IN_FUSION")) { die("Access denied");}
if(!defined("_RSS")){
define("_RSS",INFUSIONS."_rss_panel/");
}
if(!defined("_RSS_ICL")){
define("_RSS_ICL",_RSS."includes/");
}
include _RSS."infusion_db.php";



//class
class _RSS{

public function __construct($cryptinclude=false){

$this->SettingsAuslesen();

if($cryptinclude){
//Crypt Klasse
include_once _RSS_ICL."Crypt.class.php";
$Crypt=new Crypt();
//ende crypt
}

}

private function SettingsAuslesen(){

//settings
$result=dbarray(dbquery("SELECT * FROM ".DB_RSS_SETTINGS));
$rsss=array();
foreach($result as $item){

$rsss[$item['name']] = $item['setting'];

}
//ende settings

}

public function ReNewSettings(){

$this->SettingsAuslesen();

}

public function getgroups($userid){

$user_groups=array();
$user_data_22 = dbarray(dbquery("SELECT * FROM ".DB_USERS." WHERE user_id='".$userid."'"));
switch($user_data_22['user_level']){

case "101":
$user_groups[]=101;
//$user_groups[]=0;
break;
case "102":
$user_groups[]=102;
$user_groups[]=101;
//$user_groups[]=0;
break;
case "103":
$user_groups[]=103;
$user_groups[]=102;
$user_groups[]=101;
//$user_groups[]=0;
break;
case "104":
$user_groups[]=104;
$user_groups[]=103;
$user_groups[]=102;
$user_groups[]=101;
//$user_groups[]=0;
break;
default:
$user_groups[]=0;

}

$ug_temp=explode(".",$user_data_22['user_groups']);
foreach($ug_temp as $thing){

$user_groups[]=$thing;

}

return $user_groups;

}

public function _RenderCopyright(){

if($rsss['showcopy'] == "1"){
echo'<div class="small" style="align:right;"><a href="http://blacktigers.bplaced.net/" title="_RSS wurde entwickelt von xxyy.">&raquo;</div>';
}

}
}
?>