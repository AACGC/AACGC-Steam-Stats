<?php
class imageURLHandler {
	
	var $url = "";
	
	function __construct($url = "") {
		$this->url = $url;
		$this->getImage();
	}
	
	public function seturl($url) {
		$this->url = $url;
	}
	
	private function getImage() {
		$url_parts = $this->explodeurl();
		
		if (!is_dir("images/games/".$url_parts[4])) {
			mkdir("images/games/".$url_parts[4]);
		}
		
		if (!file_exists("images/games/".$url_parts[4]."/".$url_parts[5])) {
			$ch = curl_init($url);
		
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);
		
			$remote_image = curl_exec();
		
			curl_close($ch);
			
			$outfile = fopen("images/games/".$url_parts[4]."/".$url_parts[5], "w");
			fwrite($outfile, $data);
			fclose($outfile);
		}
	}
	
	/**
	 * Explosion should result in the following array;
	 * 0 - steamcommunity.com
	 * 1 - public
	 * 2 - images
	 * 3 - apps
	 * 4 - appID
	 * 5 - filename  
	 */
	private function explodeurl() {
		$temp_url = substr($this->url, 7);
		return explode("/", $temp_url);
	}
}
?>