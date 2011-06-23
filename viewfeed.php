<?php
header("Content-type: text/xml");
/*-------------------------------------------------------+
| PHP-Fusion Content Management System
| Copyright © 2002 - 2011 Nick Jones
| http://www.php-fusion.co.uk/
+--------------------------------------------------------+
| Filename: viewfeed.php
| _RSS
| Author: xxyy
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

require_once "../../maincore.php";
require_once INFUSIONS."_rss_panel/_rss.icl.php";
$_RSS = new _RSS(true);
if(!isset($_GET['type'])){
$_GET['type'] = "news";
}
if(isset($_GET['crypt'])){

$guest=false;
$user_id=$Crypt::Check($_GET['crypt']);

} else {

$guest=true;
$user_id=0;

}
echo'<?xml version="1.0" encoding="ISO-8859-1" ?>
<rss version="2.0">
<channel>';
switch($_GET['type']){
case "news":
if($rsss['rss_site_name'] == 0){
$feedtit=$settings['sitename']." News-Feed";
} else {
$feedtit = $rsss['rss_site_name'];
}
if($rsss['rss_desc'] == 0){
$feeddesc=$settings['sitename']." News-Feed";
} else {
$feeddesc = $rsss['rss_desc'];
}
//if($rsss['rss_site_link'] == 0){
$feedlink=$settings['siteurl']."news.php";
/*} else {
$feedlink = $rsss['rss_site_link'];
}*/
echo'<title>'.$feedtit.'</title>
<link>'.$feedlink.'</link>
<description>'.$feeddesc.'</description>
<language>de-at</language>
<generator>_RSS Infusion by xxyy</generator>';
if($rsss['rss_img'] == 0){
} else {
echo'<image>
<title>News Feed</title>
<url>images/'.$rsss['rss_img'].'</url>
<link>'.$feedlink.'</link>
</image>';
$access=$_RSS::getgroups($user_id);
$temp22="";
foreach($access as $thing){

$temp22 .= "news_visibility='".$thing."' OR ";

}
$temp22 .= "news_viibility='0'";
$newsresult = dbquery("SELECT * FROM ".DB_NEWS." WHERE (".$temp22.") LIMIT 10 ORDER BY news_id");
$i=0;
while($data = dbarray($newsresult)){
echo'<item>
<title>'.phpentities($newsresult['news_subject']).'</title>
<link>'.$settings['siteurl'].'news.php?readmore='.$newsresult['news_id'].'</link>
<description>'.phpentities($newsresult['news_news']).'</description>
</item>';
$i++;
}
if($i==0){
//nichts
echo'<item>
<title>Keine News vorhanden!</title>
<link>'.$settings['siteurl'].'news.php</link>
<description>Es wurden keine News erstellt.</description>
</item>';

}


}
break;
case "articles":
break;
case "submissions":
break;
case "photos":
break;
case "forum":
break;
case "downloads":
break;
case "pro_downloads":
break;
case "pns":
break;
case "pfss":
break;
case "lotto":
break;
case "hue":
break;
case "raetseldb":
break;
case "awecal":
break;
default:

redirect(_RSS."viewfeed.php?type=news");

}

echo"</channel></rss>";

?>