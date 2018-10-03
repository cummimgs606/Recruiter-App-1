<?php

//session_start();
//session_unset(); 
//session_destroy();   
error_reporting(E_ALL);

class JobAlertUnsubscribe {
	
	public static function init($language, $brand) {
		
		//echo '*** JobAlertUnsubscribe()';
		
		require_once (dirname(dirname(__FILE__)) .'/config/paths.php');
		
		require_once (PATH_SERVER.'core/library/display/display-table.php');
		require_once (PATH_SERVER.'core/library/display/display-update-form-fields.php');
		require_once (PATH_SERVER.'core/library/display/display-vars.php');
		
        require_once (PATH_SERVER.'core/library/procedures-public/job/job.php');
		require_once (PATH_SERVER.'core/library/procedures-public/job/jobs.php');
		require_once (PATH_SERVER.'core/library/procedures-public/job-alert/job-alert.php');
		
		require_once (PATH_SERVER.'core/library/session/session-variables.php');
		
		require_once (PATH_SERVER.'core/form-languages/language-'.$language.'.php');
		require_once (PATH_SERVER.'core/form-fields/fields-public-job-alert-unsubscribe.php');
		
		// ---------------------------------------------------------------------------
		// SET SESSION VARS BY GET
		// ---------------------------------------------------------------------------
		
		setSessionWithGet('candidateEmail', '');
	
		
		// ---------------------------------------------------------------------------	
		// SET : POST AND SESSION DATA
				
		if(isset($_SESSION['candidateEmail'])){
				
			$result = JobAlert::unsubscribe($_SESSION['candidateEmail']);
					
			if($result){
				
				echo '<h3>'.JOB_ALERT_UNSUBSCRIBE_SUCCESS.'</h3>'; 
						
			}else{
							
				echo '<h3>'.JOB_ALERT_UNSUBSCRIBE_FAIL.'</h3>'; 
							
			}
		}
		
	
	
		// ----------------------------------------------------------------------------	
		// DISPLAY : WRITE POST VARS INTO FORMS	
		
		if(isset($_POST['submit'])){
			
			copyPostToSession($_POST);
			
		}else{
			
			if(isset($_SESSION)){
				
				copySessionToPost($_SESSION);
			}
		}
		
		require_once (PATH_SERVER.'/web-templates/template-includes-javascript.php');
	
		DisplayVars::show($_POST);
		DisplayUpdateTextFields::update($_POST);
	}
}

?>
