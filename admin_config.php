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
if (!defined('e107_INIT'))
{exit;}
if (!getperms("P"))
{header("location:" . e_HTTP . "index.php");
exit;}
require_once(e_ADMIN . "auth.php");
if (!defined('ADMIN_WIDTH'))
{define(ADMIN_WIDTH, "width:100%;");}

if (e_QUERY == "update")
{
 
    $pref['steamstats_pagetitle'] = $_POST['steamstats_pagetitle'];
    $pref['steamstatsmenu_height'] = $_POST['steamstatsmenu_height'];
    $pref['steamfriendmenu_height'] = $_POST['steamfriendmenu_height'];
    $pref['steamstats_avatar_size'] = $_POST['steamstats_avatar_size'];
    $pref['steamstats_forumbadgesize'] = $_POST['steamstats_forumbadgesize'];
    $pref['steamstats_friendbadgesize'] = $_POST['steamstats_friendbadgesize'];
    $pref['steamstats_badgesize'] = $_POST['steamstats_badgesize'];

if (isset($_POST['steamstats_enable_forums'])) 
{$pref['steamstats_enable_forums'] = 1;}
else
{$pref['steamstats_enable_forums'] = 0;}

if (isset($_POST['steamstats_enable_profiles'])) 
{$pref['steamstats_enable_profiles'] = 1;}
else
{$pref['steamstats_enable_profiles'] = 0;}

if (isset($_POST['steamstats_enable_gold'])) 
{$pref['steamstats_enable_gold'] = 1;}
else
{$pref['steamstats_enable_gold'] = 0;}

if (isset($_POST['steamstats_enable_avatar'])) 
{$pref['steamstats_enable_avatar'] = 1;}
else
{$pref['steamstats_enable_avatar'] = 0;}

if (isset($_POST['steamstats_enable_theme'])) 
{$pref['steamstats_enable_theme'] = 1;}
else
{$pref['steamstats_enable_theme'] = 0;}

    save_prefs();
    $led_msgtext = "Settings Saved";
}

$admin_title = "AACGC Steam Stats (settings)";
//--------------------------------------------------------------------


$text .= "
<form method='post' action='" . e_SELF . "?update' id='confnwb'>
	<table style='" . ADMIN_WIDTH . "' class='fborder'>


		<tr>
			<td colspan='3' class='fcaption'><b>Page Settings:</b></td>
		</tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Use Forumheader3 and Indent Tables (Effects page only):</td>
		        <td colspan=2 class='forumheader3'>".($pref['steamstats_enable_theme'] == 1 ? "<input type='checkbox' name='steamstats_enable_theme' value='1' checked='checked' />" : "<input type='checkbox' name='steamstats_enable_theme' value='0' />")." (Recommended - Only Works On Some Themes)</td>
	        </tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Steam Stats Page Title:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='50' name='steamstats_pagetitle' value='" . $tp->toFORM($pref['steamstats_pagetitle']) . "' /></td>
	        </tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Users Avatar Above Badges:</td>
		        <td colspan=2 class='forumheader3'>".($pref['steamstats_enable_avatar'] == 1 ? "<input type='checkbox' name='steamstats_enable_avatar' value='1' checked='checked' />" : "<input type='checkbox' name='steamstats_enable_avatar' value='0' />")."</td>
	        </tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Avatar Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='steamstats_avatar_size' value='" . $tp->toFORM($pref['steamstats_avatar_size']) . "' />px  (pixles)</td>
		</tr>




		<tr>
			<td colspan='3' class='fcaption'><b>Forum/Profile Settings:</b></td>
		</tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Large Steam Badges In Profiles:</td>
		        <td colspan=2 class='forumheader3'>".($pref['steamstats_enable_profiles'] == 1 ? "<input type='checkbox' name='steamstats_enable_profiles' value='1' checked='checked' />" : "<input type='checkbox' name='steamstats_enable_profiles' value='0' />")."</td>
	        </tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Mini Steam Badge In Forums:</td>
		        <td colspan=2 class='forumheader3'>".($pref['steamstats_enable_forums'] == 1 ? "<input type='checkbox' name='steamstats_enable_forums' value='1' checked='checked' />" : "<input type='checkbox' name='steamstats_enable_forums' value='0' />")."</td>
	        </tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Forum Badge Width:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='steamstats_forumbadgesize' value='" . $tp->toFORM($pref['steamstats_forumbadgesize']) . "' />px  (pixles)</td>
		</tr>





		<tr>
			<td colspan='3' class='fcaption'><b>User List Menu Settings:</b></td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Menu Height:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='steamstatsmenu_height' value='" . $tp->toFORM($pref['steamstatsmenu_height']) . "' />px  (pixles)</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>User Badge Width:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='steamstats_badgesize' value='" . $tp->toFORM($pref['steamstats_badgesize']) . "' />px  (pixles)</td>
		</tr>




		<tr>
			<td colspan='3' class='fcaption'><b>Friend List Menu Settings:</b></td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Menu Height:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='steamfriendmenu_height' value='" . $tp->toFORM($pref['steamfriendmenu_height']) . "' />px  (pixles)</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Friend Badge Width:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='steamstats_friendbadgesize' value='" . $tp->toFORM($pref['steamstats_friendbadgesize']) . "' />px  (pixles)</td>
		</tr>




		<tr>
			<td colspan='3' class='fcaption'><b>Other Settings:</b></td>
		</tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Gold Orbs as Usernames Above Badges: (must have Gold Orbs installed)</td>
		        <td colspan=2 class='forumheader3'>".($pref['steamstats_enable_gold'] == 1 ? "<input type='checkbox' name='steamstats_enable_gold' value='1' checked='checked' />" : "<input type='checkbox' name='steamstats_enable_gold' value='0' />")."</td>
	        </tr>




                <tr>
			<td colspan='3' class='fcaption' style='text-align: left;'><input type='submit' name='update' value='Save Settings' class='button' /></td>
		</tr>





</table>
</form>";



$ns->tablerender($admin_title, $text);
require_once(e_ADMIN . "footer.php");
?>
