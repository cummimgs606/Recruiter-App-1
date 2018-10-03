<?php

error_reporting(E_ALL);

class UploadImageAdmin {
	
	public static $newFileName = '';
	public static $messageTimeStamp = '';
	
	public static function init($filePath = NULL){
	
		require_once ('core/library/upload/upload-image.php');
		
		self::$newFileName = '';
		
		if ($_FILES['imageFileName']['name'] != ''){	
		
			$responseUpload = UploadImage::init($filePath);
			
			if($responseUpload == "success"){

				self::$newFileName = UploadImage::getNewFileName();

			}
		}
	}
	
	public static function getnewFileName(){
		return self::$newFileName;	
	}
}
?>