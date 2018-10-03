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
}
?>












	
