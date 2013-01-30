<?php

/*
#######################################
#     e107 website system plguin      #
#     AACGC Steam Stats               #
#     by M@CH!N3                      #
#     http://www.AACGC.com            #
#######################################
*/


require_once("../../class2.php");
require_once(HEADERF);

if (e_QUERY) {
        $tmp = explode('.', e_QUERY);
        $action = $tmp[0];
        $sub_action = $tmp[1];
        $id = $tmp[2];
        unset($tmp);
}


if ($pref['steamstats_enable_gold'] == "1")
{$gold_obj = new gold();}

if ($pref['steamstats_enable_theme'] == "1")
{$themea = "forumheader3";
$themeb = "indent";}
else
{$themea = "";
$themeb = "";}
//---------------------------------------------------------------------------------

$title .= "".$pref['steamstats_pagetitle'].""; 

//-----------------------------------------------------------------------------------

$text .= "<table style='' class=''>";

$sql->db_Select("user_extended", "*", "user_steamid!='' ORDER BY user_extended_id ASC");
while($row = $sql->db_Fetch()){
$sql2 ->db_Select("user", "*", "user_id='".intval($row['user_extended_id'])."'");
$row2 = $sql2->db_Fetch();

if ($pref['steamstats_enable_gold'] == "1"){
$username = "".$gold_obj->show_orb($row2['user_id'])."";}
else
{$username = "".$row2['user_name']."";}

if ($pref['steamstats_enable_avatar'] == "1"){
if ($row2['user_image'] == "")
{$avatar = "";}
else
{$useravatar = $row2[user_image];
require_once(e_HANDLER."avatar_handler.php");
$useravatar = avatar($useravatar);
$avatar = "<img src='".$useravatar."' width=".$pref['steamstats_avatar_size']."px></img>";}}

if ($row['user_steamurl'] == "id") 
{$steampurl = "http://steamcommunity.com/id/".$row['user_steamid']."";}
if ($row['user_steamurl'] == "profile")
{$steampurl = "http://steamcommunity.com/profiles/".$row['user_steamid']."";}
if ($row['user_steamurl'] == "")
{$steampurl = "".e_BASE."user.php?id.".$row['user_extended_id']."";}

$text .= "
<tr>
<td class='$themea'>
".$avatar." <a href='".e_BASE."user.php?id.".$row2['user_id']."'>".$username."</a>
</td>
</tr>
<tr>
<td class='$themeb'>
<a href='".$steampurl."' target='_blank'><img src='http://badges.steamprofile.com/profile/extended/steam/".$row['user_steamid'].".png' border='0' /></a>
</td>
</tr>
";}


$text .= "</table>";

//-----------------------------------------------------------------------------------

//----#AACGC Plugin Copyright&reg; - DO NOT REMOVE BELOW THIS LINE! - #-------+
require(e_PLUGIN . 'aacgc_steamstats/plugin.php');
$text .= "<br><br><br><br><br><br><br>
<a href='http://www.aacgc.com' target='_blank'>
<font color='808080' size='1'>".$eplug_name." V".$eplug_version."  &reg;</font>
</a>";
//------------------------------------------------------------------------+

$ns -> tablerender($title, $text);

//----------------------------------------------------------------------------------

require_once(FOOTERF);



?>