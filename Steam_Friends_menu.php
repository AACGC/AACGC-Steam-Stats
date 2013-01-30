<?php

//------------------------------------------------------

$steamstats_title .= "My Steam Friends";

//------------------------------------------------------


$sql->db_Select("user_extended", "*", "user_extended_id=".USERID."");
$row = $sql->db_Fetch();

if ($row['user_steamid'] == "")
{$steamstats_text .= "You currently do not have a Steam ID associated with your profile. You can add your Steam ID in your profile settings.";}

else

{

//------------------------------------------------------

include("".e_PLUGIN."aacgc_steamstats/STEAMID.php");
$sid = $row['user_steamid'];
$steamID = new SteamID($sid);

$steamstats_text .= "<div style='width:100%; height:".$pref['steamfriendmenu_height']."px; overflow:auto'>";

foreach ($steamID->get_Friends() as $friend) {

$steamstats_text .= "<a href='".$friend['url']."' target='_blank'>
					 <img width='".$pref['steamstats_friendbadgesize']."px' src='http://badges.steamprofile.com/profile/simple/steam/".$friend['id'].".png' border='0' alt='' /></a><br/>";}

$steamstats_text .= "</div>";

//------------------------------------------------------

}

//------------------------------------------------------

$ns->tablerender($steamstats_title, $steamstats_text);

//------------------------------------------------------

?>