<?php
class DataHandler {
	
	public function getLines($file) {
		$lines = file($file);
		return $lines;
	}
	
	public function addLine($line, $file) {
		if(strpos($line, "\n") !== 0)
			$line = "\n" . $line;
		
		file_put_contents($file, $line, FILE_APPEND);
	}
	
	public function removeLine($keyToDelete, $file) {
		$lines = $this->getLines($file);
		
		$keyFound = null;
		foreach ($lines as	$key => $line) {
			if(strpos($line, $keyToDelete.";") === 0)
				$keyFound = $key;
		}
		
		if($keyFound != null) {
			unset($lines[$keyFound]);
			$newLines = array_values($lines);
			file_put_contents($file, $newLines);
		}
	}
	
	public function search($key, $file) {
		$content = file_get_contents($file);
		
		return preg_match("/".$key.";/", $content);
	}
}
?>