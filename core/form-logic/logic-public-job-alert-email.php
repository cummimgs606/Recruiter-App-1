<?php

ini_set('display_errors', 'On');

class JobAlertEmail {
	
	public static function init($language, $brand){
		
		require_once (dirname(dirname(__FILE__)) .'/config/paths.php');
		require_once (PATH_SERVER.'core/library/display/display-country.php');
		require_once (PATH_SERVER.'core/library/display/display-brand.php');
		require_once (PATH_SERVER.'core/library/display/display-jobs-email.php');
		require_once (PATH_SERVER.'core/library/display/display-job-type.php');
		require_once (PATH_SERVER.'core/library/display/display-language.php');
		require_once (PATH_SERVER.'core/library/display/display-table.php');
		require_once (PATH_SERVER.'core/library/display/display-update-form-fields.php');
		require_once (PATH_SERVER.'core/library/display/display-vars.php');
		require_once (PATH_SERVER.'core/library/procedures-public/country/country.php');
		require_once (PATH_SERVER.'core/library/procedures-public/brand/brand.php');
		require_once (PATH_SERVER.'core/library/procedures-public/language/language.php');
		require_once (PATH_SERVER.'core/library/procedures-public/job/job.php');
		require_once (PATH_SERVER.'core/library/procedures-public/job/jobs.php');
		require_once (PATH_SERVER.'core/library/procedures-public/job-alert/job-alert.php');
		require_once (PATH_SERVER.'core/library/procedures-public/job-type/job-type.php');
		require_once (PATH_SERVER.'core/library/session/session-variables.php');
		require_once (PATH_SERVER.'core/form-languages/language-'.$language.'.php');
		
		$subscribers = JobAlert::get(0, 999); 
		
		if(!empty($subscribers)){
			
			$count = 1;
			
			foreach ($subscribers as $currentRow){
				
				$jobAlertSubscriptionKeyword	= ($currentRow["job_alert_subscription_keyword"] ? $currentRow["job_alert_subscription_keyword"] : '---');	
				$jobAlertSubscriptionLocation	= $currentRow["job_alert_subscription_location"];	
				$jobAlertCompiled				= $currentRow["job_alert_compiled"];
				$jobsIDs						= $currentRow["job_ids"];
				$candiateFirstName 				= ucwords(strtolower($currentRow["candidate_first_name"]));	
				$candidateMiddleName			= ucwords(strtolower($currentRow["candidate_middle_name"]));	
				$candidateLastName				= ucwords(strtolower($currentRow["candidate_last_name"]));	
				$candidateSalutation			= ucwords(strtolower($currentRow["candidate_salutation"]));	
				$candiateEmail 					= $currentRow["candidate_email"];
				$jobApllicationCampaing 		= 'Job Alert Email : '.$language;
				$jobTypeID						= $currentRow["job_type_id"];
				$jobTypeName					= $currentRow["job_type_name"];
				$languageID						= $currentRow["language_id"];
				$brandID						= $currentRow["brand_id"];
				
				$compiledGetVars 	= 	'cfn='.$candiateFirstName.'&
										cmn='.$candidateMiddleName.'&
										cln='.$candidateLastName.'&
										cs='.$candidateSalutation.'&
										ce='.$candiateEmail.'&
										jac='.$jobApllicationCampaing;
									
				$compiledSerachVars = 	'keyword='.$jobAlertSubscriptionKeyword.'&
										location='.$jobAlertSubscriptionLocation.'&
										jobTypeID='.$jobTypeID.'&
										brandID='.$brandID;
									
				/*
				if(isset($_GET['jbk'])){$_POST['keyword']  	= $_GET['jbk'];}
				if(isset($_GET['jbl'])){$_POST['location'] 	= $_GET['jbl'];}
				if(isset($_GET['jbt'])){$_POST['jobTypeID']	= $_GET['jbt'];}
				*/
	
				$s1 = ALERT_EMAIL_0;	
				$s2 = ALERT_EMAIL_1;	
				$s3 = $candiateEmail;
				$s4 = ALERT_EMAIL_2.' '.$candidateSalutation.' '.$candiateFirstName.' '.$candidateLastName.'</p>';
				
				if($jobsIDs != ''){
					
					$s5 = ALERT_EMAIL_3.'<a href="'.URL_LOCALISED.'/index.php?header-menu=Job%20Search&'.$compiledSerachVars.'">'.ALERT_EMAIL_4.'</a></br>';
					$s6 = ALERT_EMAIL_5.'<a href="'.URL_LOCALISED.'/index.php?header-menu=Job%20Get&jobID='.$jobsIDs.'">'.ALERT_EMAIL_4.'</a></p>';
					
				}else{
					
					$s5 = '';
					$s6 = '';
				}
	
				$s7 =  	ALERT_EMAIL_6.'</br>';
				$s8 =  	FORM_KEYWORD.' : '.$jobAlertSubscriptionKeyword.'</br>';
				$s9 =  	FORM_LOCATION.' : '.$jobAlertSubscriptionLocation.'</br>';
				$s10 =  FORM_JOB_TYPE.' : '.$jobTypeName.'</p></p>';
				
				$s11 = '</p>';
	
				if($jobsIDs != ''){
					
					$jobsResult = Job::get(	$jobsIDs);
					$s12 = DisplayJobsEmail::showList($jobsResult, URL_LOCALISED, $compiledGetVars);

				}else{
					
					$s12 = '';
				}
				
				$s13  = ALERT_EMAIL_7.' <a href="'.URL_LOCALISED.'/index.php?header-menu=Job%20Alert%20Unsubscribe&candidateEmail='.$candiateEmail.'">'.ALERT_EMAIL_8.'</a></p>';
	
				$messageSubject = $s1;
				$messageFrom 	= $s2;
				$messageTo		= $s3;
				$messageBody	= $s4.$s5.$s6.$s7.$s8.$s9.$s10.$s11.$s12.$s13;
				$messageAttach	= '';
				
				echo '<div style="background-color:#CCCCCC; padding:16px;padding-top:2px;padding-bottom:2px">';
				echo 	'<h4> Email : '.$count.'</h4><h5>';
				echo '</div>';
				echo '<div style="background-color:#DDDDDD; padding:16px">';
				echo 	'Subject : <b>'.$messageSubject.'</b></p>';
				echo 	'From : <b>'.$messageFrom.'</b></p>';
				echo 	'To : <b>'.$messageTo.'</b></p>';
				echo '</div>';
				echo '<div style="background-color:#EFEFEF; padding:16px">';
				echo 	$messageBody.'</p>';
				echo '</div>';
				echo '</p>';
				
		
				
				if($count == 2){
					self::create($messageSubject, $messageFrom, $messageTo, $messageBody, $messageAttach);
				}
				
				$count++;
				
				
			}
		}
	}
	
	public static function create($messageSubject, $messageFrom, $messageTo, $messageBody, $messageAttach){
		
		
		//$responseMail = Mail::send($messageSubject, $messageFrom, $messageTo, $messageBody, $messageAttach);
		
		//if($responseMail == "success"){
						
			//self::$messageTimeStamp = Mail::getTimeStamp();
						
			//return 'success';
						
		//}else{

			//echo ("<div class='button-error pure-button'>Error ... Email could not be sent.</div></p>");
	
			//return 'fail';	
		//}
	}	
}
?>

	