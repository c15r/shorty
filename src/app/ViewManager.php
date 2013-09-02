<?php
include_once ('HtmlHelper.php');

class ViewManager {
	
	private $viewPath = "views";
	
	function __construct() {
		
	}
	
	public function get($viewName, $data = array()) {
		$filename = $this->viewPath ."/". $viewName .".php";
		if(!file_exists($filename))
			die("View does not exists!");
		
		include_once($filename);
	}
	
	public function redirect($action, $data = array()) {
		$query = "";
		if(count($data) > 0) {
			foreach ($data as $key => $value) {
				$query .= "&".$key."=".$value;
			}
		}
		
		header("Location: ?action=".$action.$query);
	}
}

?>