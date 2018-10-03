<?php

//print("*** ApplyUpload.php </br>");

class UploadImage {
	
	private static $newFilePath;
	
	public static function init($filePath){
	
		//echo '*** ApplyUpload::init()</p>';
		
		try {
		
			// Undefined | Multiple Files | $_FILES Corruption Attack
			// If this request falls under any of them, treat it invalid.
			if ( !isset($_FILES['imageFileName']['error']) || is_array($_FILES['imageFileName']['error'])) {
				throw new RuntimeException('Error ... Invalid parameters.');
			}
		
			// Check $_FILES['imageFileName']['error'] value.
			switch ($_FILES['imageFileName']['error']) {
				case UPLOAD_ERR_OK:
						break;
				case UPLOAD_ERR_NO_FILE:
						throw new RuntimeException('Error ... No file sent.');
				case UPLOAD_ERR_INI_SIZE:
				case UPLOAD_ERR_FORM_SIZE:
						throw new RuntimeException('Error ... Exceeded filesize limit.');
				default:
						throw new RuntimeException('Error ... Unknown errors.');
			}
		
			// You should also check filesize here. 
			if ($_FILES['imageFileName']['size'] > 1000000) {
				throw new RuntimeException('Error ... Exceeded filesize limit.');
			}
		
			// DO NOT TRUST $_FILES['imageFileName']['mime'] VALUE !!
			// Check MIME Type by yourself.
			$finfo = new finfo(FILEINFO_MIME_TYPE);
			if (false === $ext = array_search(
				$finfo->file($_FILES['imageFileName']['tmp_name']),
				array(
					'jpg' 	=> 'image/jpeg',
				),
				true
			)) {
				throw new RuntimeException('Error ... Invalid file format.');
			}

			self::$newFilePath = sprintf($filePath.'.'.$ext);
	
			if (!move_uploaded_file(	$_FILES['imageFileName']['tmp_name'],
										self::$newFilePath)){
											
				throw new RuntimeException('Error ... Failed to move uploaded file.');
			}
	
			//echo '... File is uploaded successfully.</p>';
			
			return "success";
		
			} catch (RuntimeException $e) {
			
				echo "<div class='button-error pure-button'>".$e->getMessage()."</div></p>";
				
				return "fail";
			
			}
	}
	
	
	public static function getNewFileName(){
		
		return 	self::$newFilePath;
	}
}

?>



