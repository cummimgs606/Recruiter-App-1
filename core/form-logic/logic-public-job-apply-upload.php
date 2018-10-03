<?php

error_reporting(E_ALL);

class JobApplyUpload {
	
	public static $newFileName = '';
	
	public static function init($post, $jobs){
		
		require_once ('core/form-logic/logic-public-job-apply-email.php');
		require_once ('core/library/upload/upload.php');
	
	
		self::$newFileName = '';
		
		if ($_FILES['CVFileName']['name'] != ''){	
		
			// CV YES
			// CV UPLOAD 

			$responseUpload = Upload::init();
			
			if($responseUpload == "success"){
				
				// SEND MAIL TO APLITRACK-BROADBEAN

				self::$newFileName = Upload::getNewFileName();
				
				return JobApplyEmail::withCV($post, $jobs, self::$newFileName);
											
			}else{
				
				echo ("<div class='button-error pure-button'>Error ... File did not upload..</div></p>");
				return 'fail';
			}
			
		}else{
			
			// CV NO 
			// SEND MAIL TO CANDIDATE
			
			return JobApplyEmail::withoutCV($post, $jobs);
		}
	
	}
	
	public static function getnewFileName(){
		return self::$newFileName;	
	}
}
?>