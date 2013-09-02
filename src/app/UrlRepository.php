<?php

include_once ('Url.php');
include_once ('DataHandler.php');

class UrlRepository {
	
	private $db;
	private $FILE;
	
	function __construct() {
		$this->db = new DataHandler();
		$this->FILE = Config::get("Shorty.db.file");
	}
	
	public function get($key) {
		$urls = $this->readAllLinesAsUrls();
		
		$result = null;
		foreach ($urls as $url) {
			if($url->getName() == $key)
				$result = $url;
		}
		
		return $result;
	}
	
	public function all() {
		return $this->readAllLinesAsUrls();
	}
	
	public function add($url) {
		$this->db->addLine($url->getAsCsvLine(), $this->FILE);
	}
	
	public function delete($key) {
		$this->db->removeLine($key, $this->FILE);
	}
	
	public function exists($key) {
		return $this->db->search($key, $this->FILE);
	}
	
	private function readAllLinesAsUrls() {
		$allLines = $this->db->getLines($this->FILE);
		
		$urls = array();
		
		foreach($allLines as $line) {
			$urls[] = Url::byLine($line);
		}
		
		return $urls;
	}
}
?>
