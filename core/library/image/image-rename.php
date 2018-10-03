<?php

//session_start(); started in menu;
//session_unset(); 
//session_destroy(); 

error_reporting(E_ALL);

class ImageRename {

	public static function init($consultants){
		
		// THIS WAS USED TO PREPARE LIBRARY BUT MAY NOT BE USED AGAIN.
	
		foreach ($consultants as $currentRow){
				
			$id = $currentRow["consultant_id"];
	
			if(strlen(strval ($id)) == 1){ $imageID = '000'.$id;};
			if(strlen(strval ($id)) == 2){ $imageID = '00'.$id;};
			if(strlen(strval ($id)) == 3){ $imageID = '0'.$id;};
	
			$oldImageName =  '256x256-consultant-'.$imageID.'.jpg';
			$newImageName =  '256x256-consultant-'.$id.'.jpg';
			
			$pathIn 		= '/var/www/webroot/uploads/';
			$pathOut 	= '/var/www/webroot/consultant-images/';
			
			self::streamCopy($pathIn.$oldImageName, $pathOut.$newImageName);
			
			echo '<img src="http://10.3.5.56/consultant-images/256x256-consultant-'.$id.'.jpg?"></img>';
			
		}
	}
	
	public static function streamCopy($src, $dest){
		
		// THIS WAS USED TO PREPARE LIBRARY BUT MAY NOT BE USED AGAIN.
		
		$fsrc = fopen($src,'r');
		$fdest = fopen($dest,'w+');
		$len = stream_copy_to_stream($fsrc,$fdest);
		fclose($fsrc);
		fclose($fdest);
		return $len;
	}
}

?>