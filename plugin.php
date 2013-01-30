<?php
/*
#######################################
#     e107 website system plguin      #
#     AACGC Steam Stats               #    
#     by M@CH!N3                      #
#     http://www.AACGC.com            #
#######################################
*/
// Plugin info -------------------------------------------------------------------------------------------------------
$eplug_name = "AACGC Steam Stats";
$eplug_version = "2.0";
$eplug_author = "M@CHIN3";
$eplug_logo = "";
$eplug_url = "http://www.aacgc.com";
$eplug_email = "cuscus1986@gmail.com";
$eplug_description = "Scrape data from Steam Community.";
$eplug_compatible = "e107v0.7+";
$eplug_readme = "";        // leave blank if no readme file
$eplug_compliant = FALSE;
// Name of the plugin's folder -------------------------------------------------------------------------------------
$eplug_folder = "aacgc_steamstats";

// Name of menu item for plugin ----------------------------------------------------------------------------------
$eplug_menu_name = "";

// Name of the admin configuration file --------------------------------------------------------------------------
$eplug_conffile = "admin_main.php";  // use admin_ for all admin files.

// Icon image and caption text ------------------------------------------------------------------------------------
$eplug_icon = $eplug_folder."/images/icon_32.png";
$eplug_icon_small = $eplug_folder."/images/icon_16.png";
$eplug_icon_custom = e_PLUGIN . "aacgc_steamstats/images/icon_64.png";
$eplug_caption =  "AACGC Steam Stats";

// Preferences --------------
$eplug_prefs = array(
"steamstats_pagetitle" => "Member Steam Stats",
"steamstatsmenu_height" => "200",
"steamfriendmenu_height" => "200",
"steamstats_avatar_size" => "25",
"steamstats_enable_forums" => "1",
"steamstats_enable_profiles" => "1",
"steamstats_enable_gold" => "0",
"steamstats_enable_avatar" => "1",
"steamstats_forumbadgesize" => "200",
"steamstats_friendbadgesize" => "225",
"steamstats_badgesize" => "225",
);

// List of table names ------------------------------------------------------------------------------------------------
$eplug_table_names = "";

// List of sql requests to create tables -----------------------------------------------------------------------------
$eplug_tables = "";

// Create a link in main menu (yes=TRUE, no=FALSE) -------------------------------------------------------------
$eplug_link = TRUE;
$eplug_link_name = "Member Steam Stats";
$eplug_link_url = "".e_PLUGIN."aacgc_steamstats/Steam_Stats.php";


// Text to display after plugin successfully installed ------------------------------------------------------------------
$eplug_done = "Installation Successful.";

$upgrade_add_prefs = array(
"steamstats_pagetitle" => "Member Steam Stats",
"steamstatsmenu_height" => "200",
"steamfriendmenu_height" => "200",
"steamstats_avatar_size" => "25",
"steamstats_enable_forums" => "1",
"steamstats_enable_profiles" => "1",
"steamstats_enable_gold" => "0",
"steamstats_enable_avatar" => "1",
"steamstats_forumbadgesize" => "200",
"steamstats_friendbadgesize" => "225",
"steamstats_badgesize" => "225",
);
$upgrade_remove_prefs = "";
$upgrade_alter_tables = "";
$eplug_upgrade_done = "";

?>
