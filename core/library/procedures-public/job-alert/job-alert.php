<?php

error_reporting(E_ALL);

require_once ('core/library/connections/connector.php');

class JobAlert extends Connector {
	
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	
	public static function compile() {	
							
			//echo '*** JobAlert::Connector::compile()</p>';
			
			$result = Connector::callProcedure("CALL pr_job_alert_compile()");
														
			return $result;
	}
	
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	
	public static function get($rowStart, $rowAmount) {	
							
			//echo '*** JobAlert::Connector::get()</p>';
			
			$result = Connector::callProcedure("CALL pr_job_alert_get(".$rowStart.",".$rowAmount.")");
														
			return $result;
	}
	
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	
	public static function getRowCount() {	
							
			echo '*** JobAlert::Connector::getRowCount()</p>';
			
			$result = Connector::callProcedure("CALL pr_job_alert_get_row_count()");
														
			return $result;
	}
	
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
		
			
	public static function subscribe( 	$candidateFirstName,
										$candidateMiddleName,
										$candidateLastName,
										$candidateSalutation,
										$candidateEmail,
										$candidatePhoneHome,
										$candidatePhoneMobile,
										$jobAlertSubscribeKeyword,
										$jobAlertSubscribeKocation,
										$jobTypeID,
										$brandID,
										$countryID,
										$languageID) {	
						
		$result = Connector::callProcedure("CALL pr_job_alert_subscribe('".$candidateFirstName."',
																		'".$candidateMiddleName."',
																		'".$candidateLastName."',
																		'".$candidateSalutation."',
																		'".$candidateEmail."',
																		'".$candidatePhoneHome."',
																		'".$candidatePhoneMobile."',
																		'".$jobAlertSubscribeKeyword."',
																		'".$jobAlertSubscribeKocation."',
																		".$jobTypeID.",
																		".$brandID.",
																		".$countryID.",
																		".$languageID.")");			
		return $result;
		
    }
	
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	
	public static function unsubscribe($candidateEmail) {	
							
			echo '*** JobAlert::Connector::unsubcribe()</p>';
			
			$result = Connector::callProcedure("CALL pr_job_alert_unsubscribe('".$candidateEmail."')");
														
			return $result;
	}
}
?>












	
