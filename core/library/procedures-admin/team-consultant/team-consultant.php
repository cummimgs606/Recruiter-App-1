<?php

error_reporting(E_ALL);

require_once ('core/library/connections/connector.php');

class TeamConsultant extends Connector {
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function getConsultant($teamID = 'NULL', $deleted = 'NULL') {	
							
		$result = Connector::callProcedure("CALL pr_team_consultant_get_consultant(".$teamID.",".$deleted.")");
		return $result;
	}
	
	public static function add(	$consultantID, 
								$teamID) {	
									
		$result = Connector::callProcedure("CALL pr_team_consultant_add(".$consultantID.",
																		".$teamID.")");
	}
	
	public static function delete( $consultantID,
								   $teamID) {	
								   
		$result = Connector::callProcedure("CALL pr_team_consultant_delete_set(".$consultantID.",
																			  ".$teamID.")");
	}
	
	public static function undelete( $consultantID,
									$teamID) {	
									
		$result = Connector::callProcedure("CALL pr_team_consultant_delete_unset(".$consultantID.",
																			     ".$teamID.")");										
	}
}










	
