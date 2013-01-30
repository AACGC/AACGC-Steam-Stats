<?php
/*
#######################################
#     e107 website system plguin      #
#     AACGC Steam Stats               #    
#     by M@CH!N3                      #
#     http://www.AACGC.com            #
#######################################
*/



class steamID {
	
	var $steamIDBaseURL = "";
	var $steamIDFriends = "";
	var $xml = "";
	



function __construct($steamid) {


$sql = new db;
$sql->db_Select("user_extended", "*", "user_extended_id=".USERID."");
$row = $sql->db_Fetch();
$surl = $row['user_steamurl'];

if ($surl == "id") 
{$url = "http://steamcommunity.com/id/".$steamid."/friends";}
if ($surl == "profile")
{$url = "http://steamcommunity.com/profiles/".$steamid."/friends";}


$this->steamIDBaseURL = $url;
$this->get_SteamID_Friends();
}
	


public function get_Friends() {
preg_match_all("/<p>([^`]*?)<\/p>/", $this->steamIDFriends, $temp);
$friend_elements = array();
for ($i = 1; $i < sizeof($temp[0]); $i++) 
{array_push($friend_elements, $temp[0][$i]);}
$friends = array();
foreach ($friend_elements as $friend_element) {
$temp = split(">", $friend_element);
$temp2 = split("href=", $temp[1]);
$friends[] = array(
'name' => substr($temp[2], 0, -3),
'status' => substr($temp[5], 0, -6),
'url' => substr($temp2[1], 1, -1),
'id' => substr($temp2[1], 29, -1),
);
}
return $friends;}
	
	
private function get_SteamID_Friends() 
{$this->steamIDFriends = $this->curl_request($this->steamIDBaseURL."/friends");}
	
	
private function curl_request($url) {
$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_USERAGENT, 'Googlebot/2.1 //(+http://www.google.com/bot.html)');
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
curl_setopt($curl, CURLOPT_REFERER, 'http://www.google.com');
curl_setopt($curl, CURLOPT_ENCODING, 'gzip,deflate');
curl_setopt($curl, CURLOPT_AUTOREFERER, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_TIMEOUT, 10);

$html = curl_exec($curl); 
curl_close($curl); 

return $html;}


}

?>