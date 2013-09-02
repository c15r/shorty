<?php
include_once ('ViewManager.php');
include_once ('UrlRepository.php');
include_once ('KeyGenerator.php');

class Controller {
	
	private $view;
	private $repo;
	
	function __construct() {
		$this->view = new ViewManager();
		$this->repo = new UrlRepository();
	}
	
	public static function dispatch() {
		$controller = new Controller();
		
		if(isset($_SESSION['is_signin']) && key_exists("action", $_GET)) {
			$action = $_GET['action'];
			$controller->$action();
		}
		elseif(isset($_SESSION['is_signin'])) {
			$controller->index();
		}
		else {
			if(key_exists("user", $_POST) && key_exists("password", $_POST))
				$controller->dosignin($_POST['user'], $_POST['password']);
			
			$controller->signin();
		}
	}
		
	public function index() {
		$urls = $this->repo->all();
		
		return $this->view->get("index", array('urls' => $urls));
	}
	
	public function add() {
		$try_total = Config::get("Shorty.url.key.try");
		$try = 0;
		do {
			$key = KeyGenerator::generate();
			$try++;
		} 
		while($try < $try_total && $this->repo->exists($key));
		
		if($try >= $try_total)
			die("Unable to generate a random key. May be something went wrong...");
		
		$data = array("key" => $key, "url" => "");
		
		if(key_exists("name", $_GET)) {
			$data["key"] = $_GET['name'];
			$data["url"] = $_GET['url'];
			$data["flash"] = "Sorry dude, key already exists!";
		}
		
		return $this->view->get("add", $data);
	}
	
	public function save() {
		$url = new Url($_GET['name'], $_GET['url']);
		
		if(!$this->repo->exists($url->getName())) {
			$this->repo->add($url);
			$this->view->redirect("index");
		}
		else {
			$this->view->redirect("add", array("name" => $url->getName(), "url" => $url->getUrl()));
		}
	}
	
	public function delete() {		
		$key = $_GET['name'];
		$this->repo->delete($key);
		
		$this->view->redirect("index");
	}
	
	public function signin() {
		return $this->view->get("signin");
	}
	
	public function dosignin($user, $password) {
		if($user != Config::get("Shorty.security.user")) {
			$this->view->redirect("signin");
			return false;
		}
		
		if(sha1($password) != Config::get("Shorty.security.password")) {
			$this->view->redirect("signin");
			return false;
		}
				
		$_SESSION['is_signin'] = true;
		
		$this->view->redirect("index");
	}
	
	public function signout() {
		unset($_SESSION['is_signin']);
		session_destroy();
		
		$this->view->redirect("signout");
	}
}
?>