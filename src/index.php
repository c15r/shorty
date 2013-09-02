<?php
include_once ('app/RequestController.php');
include_once ('app/Controller.php');

include_once ('app/Config.php');
include_once ('config/shorty.php');

session_start();

if(key_exists("key", $_GET)) {
	RequestController::dispatch();
}
else {
	Controller::dispatch();
}

?>
