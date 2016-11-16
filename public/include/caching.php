<?php
class Caching {
	var $filePath = "";
	var $apiUrl = "";

	function __construct($filePath, $apiUrl) {
		$this->filePath = $filePath;
		$this->apiUrl = $apiUrl;
	}
	
	function GetData() {
		$cachetime = 12 * 60 * 60;  #12 hours
		if (file_exists($this->filePath) && (time() - $cachetime < filemtime($this->filePath))) {
			return $this->GetCachedData();
		}
		else {
			$cache = $this->GetDataFromApi();
			$this->SaveFileToCache($cache);
			return $cache;
		}
	}
	
	function GetDataFromApi() {
		$data = str_replace("\n", " ", file_get_contents($this->apiUrl));
		return $data;	
	}
	
	function GetCachedData() {
		return file_get_contents($this->filePath);
	}
	
	function SaveFileToCache($data) {
		file_put_contents($this->filePath, $data);
	}
}
?>