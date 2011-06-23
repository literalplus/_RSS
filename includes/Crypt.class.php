<?php
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2011 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: Crypt.class.php
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

class Crypt{//Authentifizierung für Private Feeds

public function __construct(){

if(iGUEST){
$this->guest = true;
} else {
$this->guest = false;
}

}
private function make(){
global $userdata;

$crypt=md5(date("l-A-H.i.s.u:P*TZ")."_RSS_CRYPTING!USER=".$userdata['user_id'].md5("PHP-Fusion"));
return $crypt;

}
private function do_make($uid){
$crypt2 = $this->make();
dbquery("INSERT INTO".DB_RSS_CRYPT." (crypt,cuid) VALUES('".$crypt2."','".$uid."')");
return $crypt2;

}

public function Generate($new=false,$return=false){
global $userdata;
if(!$this->Crypt_exists($userdata['user_id']) || $new==true){


//$result2=dbquery("INSERT INTO ".DB_RSS_CRYPT." (crypt,cuid) VALUES('" . $this->make() . "','".$userdata['user_id']."')");
$this->do_make($userdata['user_id']);


}
}

public function Render(){
global $userdata;
if(!Crypt_exists($userdata['uder_id'])){

return $this->do_make($userdata['user_id']);

} else {

$result=$this->Select_Crypt();
$result=dbarray($result);
return $result['uid'];

}

}

private function Select_Crypt($uid){

return dbquery("SELECT * FROM ".DB_RSS_USERS." WHERE uid='".$uid."'");

}

private function Crypt_exists($uid){

$result=$this->Select_Crypt($uid);
if(mysql_num_rows($result)== 0){

return false;

} else {

return true;

}
}

public function Check($crypt){

$result=dbquery("SELECT uid FROM ".DB_RSS_CRYPT." WHERE crypt='".$crypt."'");

if(mysql_num_rows($result) == 0){

return 0;

} else {
$result=dbarray($result);
return $result['uid'];

}

}

}

?>