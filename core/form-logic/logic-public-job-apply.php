<?php

//session_start();

class JobApply {
	
	private static $jobs;
	
	public static function init($language, $brand) {
		
		require_once (dirname(dirname(__FILE__)) .'/config/paths.php');
		
		require_once (PATH_SERVER.'core/form-languages/language-'.$language.'.php');
		require_once (PATH_SERVER.'core/form-logic/logic-public-job-apply-upload.php');
		
		require_once (PATH_SERVER.'core/library/display/display-jobs-large.php');
		require_once (PATH_SERVER.'core/library/display/display-jobs-small.php');
		require_once (PATH_SERVER.'core/library/display/display-vars.php');
		require_once (PATH_SERVER.'core/library/display/display-table.php');
		require_once (PATH_SERVER.'core/library/display/display-update-form-fields.php');
		
		require_once (PATH_SERVER.'core/library/mail/mail.php');
		
		require_once (PATH_SERVER.'core/library/procedures-public/job/job.php');
		require_once (PATH_SERVER.'core/library/procedures-public/job/jobs.php');
		
		
		if(isset($_GET['jobID'])){
			
			$result = Jobs::get($_GET['jobID'], 'NULL', 'NULL');
			Jobs::store($result);
			self::$jobs = Jobs::getAll();	
			
		}else{
			
			echo JOB_ID_SEARCH_PROMPT;
			
			exit();
		}
	
		
		if(isset($_SESSION["lastURL"])){
			
			$string 		= explode("?", $_SESSION["lastURL"]);
			$string1 	= isset($string[0]) ? $string[0] : '';
			$string2 	= isset($string[1]) ? $string[1] : '';
			$url 		= $string1.'?'.$string2.'&header-menu='.$_SESSION['last-header-menu'];
	
			echo '<a class="pure-button" href="'.$url.'">'.BUTTON_BACK_TO_SEARCH.'</a>';
		}
	
		if(isset($_GET)){
			
			if(isset($_GET['cfn'])){$_POST['candidateFirstName']  	= $_GET['cfn'];}
			if(isset($_GET['cmn'])){$_POST['candidateMiddleName']  	= $_GET['cmn'];}
			if(isset($_GET['cln'])){$_POST['candidateLastName']		= $_GET['cln'];}
			if(isset($_GET['cs'])){$_POST['candidateSalutation'] 	= $_GET['cs'];}
			if(isset($_GET['ce'])){$_POST['candidateEmailAddress']	= $_GET['ce'];}
			if(isset($_GET['cph'])){$_POST['candidatePhoneHome']  	= $_GET['cph'];}
			if(isset($_GET['cpm'])){$_POST['candidatePhoneMobile'] 	= $_GET['cpm'];}
			if(isset($_GET['jac'])){$_POST['jobAppicationCampaign']	= $_GET['jac'];}
			
		}else{
			
			$_POST['candidateFirstName'] 			= 'FN';
			$_POST['candidateMiddleName'] 			= 'MN'; 
			$_POST['candidateLastName'] 				= 'LN'; 
			$_POST['candidateSalutation'] 			= 'MR';
			$_POST['candidateEmailAddress']			= 'mark.cummings@harveynash.com';
			$_POST['candidatePhoneHome'] 			= '123'; 
			$_POST['candidatePhoneMobile'] 			= '321';
			$_POST['jobAppicationCampaign'] 			= 'CAN CANPAIGN';
		}
		
		
		$_POST['jobAppicationKeyword'] 			= !isset($_SESSION['keyword']) ? '': $_SESSION['keyword'];
		$_POST['jobAppicationLocation']			= !isset($_SESSION['location']) ? '': $_SESSION['location'];
		$_POST['jobID']							= self::$jobs[0]['job_id'];
		$_POST['jobTitle'] 						= self::$jobs[0]['job_title'];
		$_POST['jobTypeID']						= self::$jobs[0]['job_type_id'];
		
	
		if (!(isset($_POST['submit']))){

			// DISPLAY: JOB
	
			DisplayJobsSmall::showList(self::$jobs, false);

			// DISPLAY: FORM APPLY
			
			require_once ('core/form-fields/fields-public-job-apply.php');
	
		}else{
			
			// DISPLAY: JOB
			
			DisplayJobsSmall::showList(self::$jobs, false);
	
			// PROCESS: UPLOAD AND EMAIL
	
			$responseUploadMail = JobApplyUpload::init($_POST, Jobs::getAll());
	
			if($responseUploadMail == 'success'){
				
				// PROCESS: INSERT INTO DB
				
				$_POST['candidateCV']	= JobApplyUpload::getnewFileName();
				
			
				$result = Job::apply(	$_POST['candidateFirstName'],
										$_POST['candidateMiddleName'], 
										$_POST['candidateLastName'], 
										$_POST['candidateSalutation'],
										$_POST['candidateEmailAddress'],
										$_POST['candidatePhoneHome'], 
										$_POST['candidatePhoneMobile'],
										$_POST['candidateCV'],
										$_POST['jobAppicationCampaign'],
										$_POST['jobAppicationKeyword'],
										$_POST['jobAppicationLocation'],
										$_POST['jobID'],
										$_POST['jobTitle'],
										$_POST['jobTypeID']);
				
				if($result == 'success'){
					
					echo '<h3>'.APPLY_SUCCESS.'</h3>'; 
				}
				
				if($result == 'fail'){
					
					echo '<h3>'.APPLY_FAIL.'</h3>'; 
				}
				
			}else{
				
				// RESPONSE: MAIL FAIL
				
				echo '<h3>'.APPLY_FAIL.'</h3>'; 
			}
		}
		
		// ----------------------------------------------------------------------------	
		// DISPLAY : WRITE POST VARS INTO FORMS
	
		require_once (PATH_SERVER.'/web-templates/template-includes-javascript.php');

		DisplayVars::show($_SESSION);
		DisplayUpdateTextFields::update($_POST);
	}
}

?>






						
								
							
							
							
							
							
								
							
	