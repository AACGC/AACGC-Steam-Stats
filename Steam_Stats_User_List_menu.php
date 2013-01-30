<?php

/*
#######################################
#     e107 website system plguin      #
#     AACGC Steam Stats               #
#     by M@CH!N3                      #
#     http://www.aacgc.com            #
#######################################
*/


//-----------------------------------------------------------------------------------------------------------+

$steamuserlist_title .= "Member Steam Stats";

$steamuserlist_text .= "<div style='width:100%; height:".$pref['steamstatsmenu_height']."px; overflow:auto'>";


$sql->db_Select("user_extended", "*", "user_steamid!='' ORDER BY user_extended_id ASC");
while($row = $sql->db_Fetch()){

if ($row['user_steamurl'] == "id") 
{$steammurl = "http://steamcommunity.com/id/".$row['user_steamid']."";}

if ($row['user_steamurl'] == "profile")
{$steammurl = "http://steamcommunity.com/profiles/".$row['user_steamid']."";}

if ($row['user_steamurl'] == "")
{$steammurl = "".e_BASE."user.php?id.".$row['user_extended_id']."";}

$steamuserlist_text .= "<a href='".$steammurl."' target='_blank'>
<img width='".$pref['steamstats_friendbadgesize']."px'src='http://badges.steamprofile.com/profile/simple/steam/".$row['user_steamid'].".png' border='0' />
</a><br>";}


$steamuserlist_text .= "</div>";

//-----------------------------------------------------------------------------------------------------------

$ns->tablerender($steamuserlist_title, $steamuserlist_text);

?>

