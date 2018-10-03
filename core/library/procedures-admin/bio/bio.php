<?php

error_reporting(E_ALL);

require_once ('core/library/connections/connector.php');

class Bio extends Connector {
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function get(	$consultantID 	= 'NULL', 
								$bioBrandID		= 'NULL', 
								$bioLanguageID  = 'NULL',
								$bioTeamID 		= 'NULL',
								$bioDeleted		= 'NULL') {
		
		//echo("*** Bio::Connector::get()</p>");
		
		$result = Connector::callProcedure("CALL pr_consultant_bio_get(	".$consultantID.",
																		".$bioBrandID.",
																		".$bioLanguageID .",
																		".$bioTeamID.",
																		".$bioDeleted.")"); 

		return $result;
    }
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function getRowCount(	$consultantID 	= 'NULL', 
										$brandID		= 'NULL', 
										$languageID  = 'NULL',
										$teamID 		= 'NULL',
										$bioDeleted		= 'NULL') {
											
		//echo("*** Bio::Connector::getRowCount()</p>");
		
		$result = Connector::callProcedure("CALL pr_consultant_bio_get_row_count(".$consultantID.",
																				".$brandID.",
																				".$languageID .",
																				".$teamID.",
																				".$bioDeleted.")"); 

		$total = 0;
																			
		if(!empty($result )){
			foreach ($result as $currentRow){
				$total = $currentRow['total_bios'];
			}
		}
		
		return $total;
    }
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function add(	$consultantID 	= 'NULL',
								$languageID 	= 'NULL',
								$brandID		= 'NULL',
								$teamID			= 'NULL',
								$bioTitle 		= '',
								$bioStrapline 	= '',
								$bioExpertise 	= '',
								$bioAbout 		= '') {
	
		//echo("*** Bio::Connector::add()</p>");
		$result = Connector::callProcedure("CALL pr_consultant_bio_add(	".$consultantID.",
																		".$languageID.",
																		".$brandID.",
																		".$teamID.",
																		'".$bioTitle."',
																		'".$bioStrapline."',
																		'".$bioExpertise."',
																		'".$bioAbout."')"); 
		return $result;
    }
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function amend(	$bioID 			= 'NULL',
									$languageID 	= 'NULL',
									$brandID		= 'NULL',
									$teamID			= 'NULL',
									$bioTitle 		= '',
									$bioStrapline 	= '',
									$bioExpertise 	= '',
									$bioAbout 		= '') {
	
		//echo("*** Bio::Connector::amend()</p>");
		$result = Connector::callProcedure("CALL pr_consultant_bio_amend(	".$bioID.",
																			".$languageID.",
																			".$brandID.",
																			".$teamID.",
																			'".$bioTitle."',
																			'".$bioStrapline."',
																			'".$bioExpertise."',
																			'".$bioAbout."')"); 																	
		return $result;
	
    }
	
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function delete($bioID = 'NULL') {
	
		//echo("*** Bio::Connector::delete()</p>");
		$result = Connector::callProcedure("CALL pr_consultant_bio_delete_set(".$bioID .")"); 
		
		return $result;
    }
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function undelete($bioID = 'NULL') {
	
		//echo("*** Bio::Connector::undelete()</p>");
		$result = Connector::callProcedure("CALL pr_consultant_bio_delete_unset(".$bioID .")"); 
		
		return $result;
    }
}
?>












	
