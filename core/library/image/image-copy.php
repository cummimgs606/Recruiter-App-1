<?php

error_reporting(E_ALL);

class ImageCopy {
	
	public static function copyDefault($sourceFilePath, $destinationFilePath){
		
		$fsrc = fopen($sourceFilePath,'r');
		$fdest = fopen($destinationFilePath,'w+');
		$len = stream_copy_to_stream($fsrc,$fdest);
		fclose($fsrc);
		fclose($fdest);
		return $len;
	}
}

?>