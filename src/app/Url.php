<?php

class Url {
	
	private $name;
	private $url;
		
	function __construct($name, $url) {
		$this->name = $name;
		$this->url = $url;
	}
	
	public static function byLine($line) {
		$parts = split(";", $line);
		$url = new self($parts[0], $parts[1]);
		
		return $url;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function getUrl() {
		return $this->url;
	}
	
	public function toString() {
		return $this->getName() . ": " . $this->getUrl();
	}
	
	public function getAsCsvLine() {
		return $this->getName() . ";" . $this->getUrl();
	}
}
?>