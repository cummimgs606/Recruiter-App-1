<?php

error_reporting(E_ALL);

require_once ('core/library/connections/connector.php');

class Consultant extends Connector {
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function get(	$consultantID 	= 'NULL', 
								$deleted 		= 'NULL') {	

		//echo '*** Job::Connector::consultant::get()</p>';
		
		$result = Connector::callProcedure("CALL pr_consultant_details_get(	".$consultantID.",
																			".$deleted.")");
		return $result;
	}
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function delete($consultantID) {
						
		//echo '*** Job::Connector::consultant::delete()</p>';
		
		$result = Connector::callProcedure("CALL pr_consultant_details_delete_set(".$consultantID.")");	
			
		return $result;
	}
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function undelete($consultantID) {
						
		//echo '*** Job::Connector::consultantDelete()</p>';
		
		$result = Connector::callProcedure("CALL pr_consultant_details_delete_unset(".$consultantID.")");
				
		return $result;
	}
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function add (	$consultantFirstName,
								$consultantMiddleName,
								$consultantLastName,
								$consultantJobTitle,
								$consultantRank,
								$consultantExpertise,
								$consultantEmail, 
								$consultantLinkedin,
								$consultantTwitter, 
								$consultantPhoneMobile,
								$officeID
								){
	
		
		$result = Connector::callProcedure("CALL pr_consultant_details_add( '".$consultantFirstName."', 
																			'".$consultantMiddleName."', 
																			'".$consultantLastName."', 
																			'".$consultantJobTitle."', 
																			 ".$consultantRank.",
																			'".$consultantExpertise."',
																			'".$consultantEmail."', 
																			'".$consultantLinkedin."', 
																			'".$consultantTwitter."', 
																			'".$consultantPhoneMobile."', 
																			 ".$officeID.")");
			
		return $result;
	}	

	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	

	public static function search(	$consultantIDs, 
									$consultantFirstName,
									$consultantLastName,
									$consultantEmail,
									$officeID,
									$officeCountryID,
									$practiceID,
									$teamID,
									$brandID,
									$brandCountryID) {	
									
									
									
							
		//echo '*** Job::Connector::consultant::search()</p>';	
									
		$result = Connector::callProcedure("CALL pr_consultant_details_search  ('".$consultantIDs."',
																				'".$consultantFirstName."', 
																				'".$consultantLastName."', 
																				'".$consultantEmail."',
																				".$officeID.",
																				".$officeCountryID.",
																				".$practiceID.",
																				".$teamID.",
																				".$brandID.",
																				".$brandCountryID.")");			
		return $result;
	}
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	

	public static function amend(	$consultant_id,
									$consultant_first_name,  
									$consultant_middle_name, 
									$consultant_last_name, 
									$consultant_job_title, 
									$consultant_rank,
									$consultant_expertise,  
									$consultant_email , 
									$consultant_linkedin , 
									$consultant_twitter , 
									$consultant_phone_mobile, 
									$office_id) {	
									
		//echo '*** Job::Connector::consultant::search()</p>';	
									
		$result = Connector::callProcedure("CALL pr_consultant_details_amend( 	 ".$consultant_id.",
																				'".$consultant_first_name."', 
																				'".$consultant_middle_name."', 
																				'".$consultant_last_name."', 
																				'".$consultant_job_title."', 
																				 ".$consultant_rank.", 
																				'".$consultant_expertise."',
																				'".$consultant_email."', 
																				'".$consultant_linkedin."', 
																				'".$consultant_twitter."', 
																				'".$consultant_phone_mobile."', 
																				".$office_id.")");			
		return $result;
	}	
}
?>












	
