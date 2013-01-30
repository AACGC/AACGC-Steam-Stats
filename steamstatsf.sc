if ($pref['steamstats_enable_forums'] == "1"){

global $post_info, $sql;

$postowner  = $post_info['user_id'];

$sql->db_Select("user_extended", "*", "user_extended_id='".intval($postowner)."'");
$row = $sql->db_Fetch();

if ($row['user_steamurl'] == "id") 
{$steamurl = "http://steamcommunity.com/id/".$row['user_steamid']."";}
if ($row['user_steamurl'] == "profile")
{$steamurl = "http://steamcommunity.com/profiles/".$row['user_steamid']."";}
if ($row['user_steamurl'] == "")
{$steamurl = "".e_BASE."user.php?id.".$row['user_extended_id']."";}

if($row['user_steamid'] == "")
{$stats = "";}
else
{$stats = "
<a href='".$steamurl."' target='_blank'><img width='".$pref['steamstats_forumbadgesize']."px' src='http://badges.steamprofile.com/profile/simple/steam/".$row['user_steamid'].".png' border='0' /></a>";}

return "".$stats."";


}
