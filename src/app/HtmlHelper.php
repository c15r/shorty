<?php
class HtmlHelper {
	
	public static function printCssIfActive($site) {
		return self::isActive($site) ? print "class=\"active\"" : false;
	}
	
	public static function isActive($site) {
		return key_exists("action", $_GET) && ($site == $_GET['action']);
	}
	
	public static function flash($data) {
		if(key_exists("flash", $data)) {
			print "<div class=\"alert alert-danger\">\n";
			print $data['flash'];
			print "</div>";
		}
	}
}
?>