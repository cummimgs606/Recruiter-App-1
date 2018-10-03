<?php

error_reporting(E_ALL);

require_once ('core/library/connections/connector.php');

class Job extends Connector {

	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	
	public static function apply(	$candidateFirstName,
									$candidateMiddleName, 
									$candidateLastName, 
									$candidateSalutation,
									$candidateEmailAddress,
									$candidatePhoneHome, 
									$candidatePhoneMobile,
									$candidateCV,
									$jobAppicationCampaign,
									$jobAppicationKeyword,
									$jobAppicationLocation,
									$jobID,
									$jobTitle,
									$jobTypeID) {
											
		//echo '*** Job::Connector::apply()</p>';
										
		$result = Connector::callProcedure("CALL pr_job_apply(	 '".$candidateFirstName."',
																'".$candidateMiddleName."', 
																'".$candidateLastName."',
																'".$candidateSalutation."',
																'".$candidateEmailAddress."',
																'".$candidatePhoneHome."', 
																'".$candidatePhoneMobile."',
																'".$candidateCV."',
																'".$jobAppicationCampaign."',
																'".$jobAppicationKeyword."',
																'".$jobAppicationLocation."',
																 ".$jobID.",
																'".$jobTitle."',
																".$jobTypeID.")");
																
		$row = $result->fetch();													
															 
		return $row['response'];
    }
	
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	
	public static function get(	$jobID, 
								$showDeleted 	= 'NULL', 
								$showExpired 	= 'NULL', 
								$rowStart 		= 'NULL', 
								$rowAmount		= 'NULL') {
		
		//echo("*** Job::Connector::get()</p>");
		 
		$result = Connector::callProcedure("CALL pr_job_details_get( '".$jobID."',
																	 ".$showDeleted.",
																	 ".$showExpired.",
																	 ".$rowStart.",
																	 ".$rowAmount.")"); 								 
		return $result;
    }
	
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	
	public static function getRowCount(	$jobID, 
										$showDeleted = 'NULL', 
										$showExpired = 'NULL') {
		
		//echo("*** Job::Connector::get()</p>");
		
		$result = Connector::callProcedure("CALL pr_job_details_get_row_count(  '".$jobID."',
																				".$showDeleted.",
																				".$showExpired.")"); 
		$row = 	$result->fetch();																
		return $row['total'];
    }
	
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	
	public static function searchRowCount(	$keyword 	= 'NULL', 
											$location	= 'NULL',
											$countryID	= 'NULL', 
											$jobTypeID	= 'NULL', 
											$brandID	= 'NULL'){
																				
		//echo("*** Job::Connector::searchRowCount()</p>");
		
		$result = Connector::callProcedure("CALL pr_job_details_search_row_count(	'".$keyword."',
																		   			'".$location."',
																					".$countryID.",
																					".$jobTypeID.",
																					".$brandID.")");

		$row = 	$result->fetch();																
		return $row['total'];
	}	
	
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	
	public static function search(	$keyword, 
									$location,
									$countryID, 
									$jobTypeID, 
									$brandID,
									$rowStart,
									$rowAmount){
										
		//echo("*** Job::Connector::search()</p>");
	
		$result = Connector::callProcedure("CALL pr_job_details_search(	'".$keyword."',
															  			 '".$location."',
																		".$countryID.",
																		".$jobTypeID.",
																		".$brandID.",
																		".$rowStart.",
																		".$rowAmount.")");
		
		return $result;
	}
}
?>












	
