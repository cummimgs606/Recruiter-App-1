<?php

error_reporting(E_ALL);

require_once ('core/library/connections/connector.php');

class Office extends Connector {
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function get($officeID = 'NULL') {	
							
		//echo '*** Office::Connector::get()</p>';
		
		$result = Connector::callProcedure("CALL pr_office_details_get(".$officeID.")");		
		return $result;
	}
	
	
	public static function add(	$officeName, 
								$officeAddress1, 
								$officeAddress2, 
								$officeAddress3, 
								$officeAddress4, 
								$officePostalCode, 
								$officeTelephone,
								$countryID) {
									
		//echo '*** Office::Connector::add()</p>';
		
		$result = Connector::callProcedure("CALL pr_office_details_add( '".$officeName."',
																'".$officeAddress1."',
																'".$officeAddress2."',
																'".$officeAddress3."',
																'".$officeAddress4."',
																'".$officePostalCode."',
																'".$officeTelephone."',
																".$countryID.")");	
													
																			
		return $result;	
	}

	public static function amend( 	$officeID, 
									$officeName, 
									$address1, 
									$address2, 
									$address3, 
									$address4, 
									$postalCode, 
									$telephone,
									$countryID) {		
							
		//echo '*** Office::Connector::amend()</p>';
		
		$result = Connector::callProcedure("CALL pr_office_details_amend(".$officeID.",
																'".$officeName."',
																'".$address1."',
																'".$address2."',
																'".$address3."',
																'".$address4."',
																'".$postalCode."',
																'".$telephone."',
																".$countryID.")");
	return $result;		
	}	
	
	public static function delete($officeID) {	
		
		//echo '*** Office::Connector::delete()</p>';
		
		$result = Connector::callProcedure("CALL pr_office_details_delete(".$officeID.")");			
		return $result;
	}
}










	
