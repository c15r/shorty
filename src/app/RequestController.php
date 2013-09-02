<?php
include_once ('DataHandler.php');
include_once ('UrlRepository.php');

class RequestController {
	
	public static function dispatch() {
		$repo = new UrlRepository();
		$key = $_GET["key"];
		
		//search for key
		$url = $repo->get($key);
		
		//exists a url for this key?
		if($url != null) {	
			header("HTTP/1.0 301 Moved Permanently");
			header("Location: ". $url->getUrl());
		}
		else {	
			include ('views/NotFound.php');
		}
	}
}

?>