<?php

error_reporting(E_ALL);

require_once ('core/library/connections/connector.php');

class Consultant extends Connector {
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function get(	$consultantID 	= 'NULL', 
								$deleted 		= 'NULL') {	

		//echo '*** Connector::consultant::get()</p>';
		
		$result = Connector::callProcedure("CALL pr_consultant_details_get(	".$consultantID.",
																			".$deleted.")");
		return $result;
	}
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//	
	
	public static function getByBrand(	$brandID = 'NULL', 
									 	$deleted = 'NULL') {	
	
		//echo '*** Connector::consultant::getByBrand()</p>';
							
		$result = Connector::callProcedure("CALL pr_consultant_details_get_by_brand(".$brandID.",".$deleted.")");
		
		return $result;
	}
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function getByTeam(	$teamID = 'NULL', 
										$deleted = 'NULL') {	
										
		//echo '*** Connector::consultant::getByTeam()</p>';								
																	
		$result = Connector::callProcedure("CALL pr_consultant_details_get_by_team(".$teamID.",".$deleted.")");
		
		return $result;
	}
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function getByOffice(	$officeID = 'NULL', 
										$deleted = 'NULL') {	
										
		//echo '*** Connector::consultant::getByOffice()</p>';								
																	
		$result = Connector::callProcedure("CALL pr_consultant_details_get_by_office(".$officeID.",".$deleted.")");
		
		return $result;
	}
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//	
	
	public static function search(	$consultantID, 
									$consultantEmail,
									$officeID,
									$countryID,
									$practiceID) {	
				
		//echo '*** Connector::consultant::search()</p>';
				
		$result = Connector::callProcedure("CALL pr_consultant_search('".$x."','".$x."',".$x.",".$x.",'".$x."')");
							
		return $result;
		
	}	
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
}
?>












	
