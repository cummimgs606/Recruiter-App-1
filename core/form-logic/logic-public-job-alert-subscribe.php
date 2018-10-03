<?php

//session_start();
//session_unset(); 
//session_destroy();   
error_reporting(E_ALL);

class JobAlertSubscribe {
	
	public static function init($language, $brand) {
		
		require_once (dirname(dirname(__FILE__)) .'/config/paths.php');
		
		require_once (PATH_SERVER.'core/library/display/display-country.php');
		require_once (PATH_SERVER.'core/library/display/display-brand.php');
		require_once (PATH_SERVER.'core/library/display/display-job-type.php');
		require_once (PATH_SERVER.'core/library/display/display-language.php');
		require_once (PATH_SERVER.'core/library/display/display-table.php');
		require_once (PATH_SERVER.'core/library/display/display-update-form-fields.php');
		require_once (PATH_SERVER.'core/library/display/display-vars.php');
		
		require_once (PATH_SERVER.'core/library/procedures-public/brand/brand.php');
		require_once (PATH_SERVER.'core/library/procedures-public/country/country.php');
		require_once (PATH_SERVER.'core/library/procedures-public/language/language.php');
		require_once (PATH_SERVER.'core/library/procedures-public/job/job.php');
		require_once (PATH_SERVER.'core/library/procedures-public/job/jobs.php');
		require_once (PATH_SERVER.'core/library/procedures-public/job-alert/job-alert.php');
		require_once (PATH_SERVER.'core/library/procedures-public/job-type/job-type.php');
		
		require_once (PATH_SERVER.'core/library/session/session-variables.php');
		
		require_once (PATH_SERVER.'core/form-languages/language-'.$language.'.php');
		require_once (PATH_SERVER.'core/form-fields/fields-public-job-alert-subscribe.php');
		

		// ---------------------------------------------------------------------------	

		// SET : POST AND SESSION DATA

		if(isset($_POST['submit'])){					
	
			$result = JobAlert::subscribe(	$_POST['candidateFirstName'],
											$_POST['candidateMiddleName'],
											$_POST['candidateLastName'],
											ucfirst(strtolower($_POST['candidateSalutation'])),
											$_POST['candidateEmail'],
											$_POST['candidatePhoneHome'],
											$_POST['candidatePhoneMobile'],
											$_POST['jobAlertSubscribeKeyword'],
											$_POST['jobAlertSubscribeKocation'],
											$_POST['jobTypeID'],
											$_POST['brandID'],
											$_POST['countryID'],
											$_POST['languageID']);
											
			if($result){
				
				echo '<h3>'.JOB_ALERT_SUBSCRIBE_SUCCESS.'</h3>'; 
			
			}else{
				
				echo '<h3>'.JOB_ALERT_SUBSCRIBE_FAIL.'</h3>'; 
				
			}				
													
		}
		
		// ---------------------------------------------------------------------------	
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
