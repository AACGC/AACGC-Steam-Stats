if ($pref['steamstats_enable_profiles'] == "1"){
if (USER){

global $sql,$sql2,$user; 

$suser = "";
$USER_ID = "";

$url = $_SERVER["REQUEST_URI"];
$suser = explode(".", $url);
	if ($suser[1] == 'php?id') {
	$suser = $suser[2];
	}
$SUSER_ID = $suser;

$sql->db_Select("user_extended", "*", "user_extended_id='".intval($SUSER_ID)."'");
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
{$stats = "<tr><td colspan=2 class='forumheader3'>
	   <a href='".$steamurl."' target='_blank'><img src='http://badges.steamprofile.com/profile/extended/steam/".$row['user_steamid'].".png' border='0' /></a>
	   </td></tr>";}



return "".$stats."";

}}