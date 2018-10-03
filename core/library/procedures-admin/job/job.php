<?php

error_reporting(E_ALL);

require_once ('core/library/connections/connector.php');

class Job extends Connector {
	

	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	
	public static function get(	$jobID, 
								$showDeleted = 'NULL', 
								$showExpired = 'NULL', 
								$rowStart = 'NULL', 
								$rowAmount = 'NULL') {
		
		//echo("*** Job::Connector::get()</p>");
		 
		$result = Connector::callProcedure("CALL pr_job_details_get( 	'".$jobID."',
															 			".$showDeleted.",
																		".$showExpired.",
																		".$rowStart.",
															 			".$rowAmount.")"); 								 
		return $result;
    }
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	
	public static function delete($jobID) {
		 
		$result = Connector::callProcedure("CALL pr_job_details_delete_set(".$jobID.")"); 

		return $result;
    }
	
//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	
	public static function undelete(	$jobID) {
		
		//echo("*** Job::Connector::get()</p>");
		$result = Connector::callProcedure("CALL pr_job_details_delete_unset(".$jobID.")"); 
		//var_dump($result);

		return $result;
    }	
	
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	
	public static function searchRowCount(	$keyword, 
											$location,
											$countryID, 
											$jobTypeID, 
											$brandID){
										
		//echo("*** Job::Connector::searchRowCount()</p>");
		$result = Connector::callProcedure("CALL pr_job_details_search_row_count(	 '".$keyword."',
																					'".$location."',
																					".$countryID.",
																					".$jobTypeID.",
																					".$brandID.")");
	
		return $result;
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
										
		$result = Connector::callProcedure("CALL pr_job_details_search(	'".$keyword."',
																		'".$location."',
																		".$countryID.",
																		".$jobTypeID.",
																		".$brandID.",
																		".$rowStart.",
																		".$rowAmount.")");
		return $result;
	}
	
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	
	public static function add(		$jobTitle,						
									$jobSalary,				
									$jobDescription,						
									$jobFeatured,							
									$jobStartDate,								
									$jobDuration,								
									$jobExpiryDate,						
									$jobResponseEmail,					
									$jobExternalReference,	
									$jobSourceID, 		
									$jobLocationText,						
									$postalCode,								
									$jobTypeID,							
									$consultantID,				 				
									$brandID,																		
									$languageID,									
									$countryID){
																		
		$result = Connector::callProcedure("CALL pr_job_details_add(	'".$jobTitle."',						
																	'".$jobSalary."',				
																	'".$jobDescription."',						
																	".$jobFeatured.",							
																	'".$jobStartDate."',								
																	'".$jobDuration."',								
																	'".$jobExpiryDate."',						
																	'".$jobResponseEmail."',					
																	'".$jobExternalReference."',
																	".$jobSourceID.",	 		
																	'".$jobLocationText."',						
																	'".$postalCode."',								
																	".$jobTypeID.",							
																	".$consultantID.",				 				
																	".$brandID.",																		
																	".$languageID.",									
																	".$countryID.")");													
			return $result;
	}
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	
	public static function amend(	$jobID,
									$jobTitle,
									$jobSalary,
									$jobDescription,
									$jobFeatured,
									$jobStartDate,
									$jobDuration,
									$jobExpiryDate,
									$jobResponseEmail,
									$jobExternalReference,
									$jobSourceID,
									$jobLocationText,
									$postalCode,
									$jobTypeID,
									$consultantID,
									$brandID,
									$languageID,
									$countryID) {
										
		//echo("*** START Job::Connector::job::amend()</p>");				 
		$result = Connector::callProcedure("CALL pr_job_details_amend(	 ".$jobID.",
																		'".$jobTitle."',						
																		'".$jobSalary."',				
																		'".$jobDescription."',						
																		".$jobFeatured.",							
																		'".$jobStartDate."',								
																		'".$jobDuration."',								
																		'".$jobExpiryDate."',						
																		'".$jobResponseEmail."',					
																		'".$jobExternalReference."',
																		".$jobSourceID.",	 		
																		'".$jobLocationText."',						
																		'".$postalCode."',								
																		".$jobTypeID.",							
																		".$consultantID.",				 				
																		".$brandID.",																		
																		".$languageID.",									
																		".$countryID.")");
																
		return $result;
    }
}
?>






	
