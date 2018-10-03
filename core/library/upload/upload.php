<?php

//print("*** ApplyUpload.php </br>");

class Upload {
	
	private static $newFilePath;
	
	public static function init(){
		
		//echo '*** ApplyUpload::init()</p>';
		
		try {
		
			// Undefined | Multiple Files | $_FILES Corruption Attack
			// If this request falls under any of them, treat it invalid.
			if ( !isset($_FILES['CVFileName']['error']) || is_array($_FILES['CVFileName']['error'])) {
				throw new RuntimeException('Error ... Invalid parameters.');
			}
		
			// Check $_FILES['CVFileName']['error'] value.
			switch ($_FILES['CVFileName']['error']) {
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
			if ($_FILES['CVFileName']['size'] > 1000000) {
				throw new RuntimeException('Error ... Exceeded filesize limit.');
			}
		
			// DO NOT TRUST $_FILES['CVFileName']['mime'] VALUE !!
			// Check MIME Type by yourself.
			$finfo = new finfo(FILEINFO_MIME_TYPE);
			if (false === $ext = array_search(
				$finfo->file($_FILES['CVFileName']['tmp_name']),
				array(
					'doc' 	=> 'application/msword',
					'docx' 	=> 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
					'pdf' 	=> 'application/pdf',
					'rtf' 	=> 'application/rtf',
					'txt'	=> 'text/plain',
				),
				true
			)) {
				throw new RuntimeException('Error ... Invalid file format.');
			}
		
			// You should name it uniquely.
			// DO NOT USE $_FILES['CVFileName']['name'] WITHOUT ANY VALIDATION !!
			// On this example, obtain safe unique name from its binary data.
	
			self::$newFilePath = sprintf('../../../uploads/%s.%s',sha1 ( self::generateRandomString(16).time(),false), $ext);
			
			if (!move_uploaded_file(	$_FILES['CVFileName']['tmp_name'],
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
		
		//echo('--- ApplyUpload::getNewFileName()</p>');
		//echo('... $newFileName : '.self::$newFilePath.'</p>');
		
		return 	self::$newFilePath;
	}
	 
	
	private static function generateRandomString($length = 10) {
		
		//echo ('--- ApplyUpload::generateRandomString()</p>');
		
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}

?>



