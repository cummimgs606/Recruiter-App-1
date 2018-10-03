<?php

error_reporting(E_ALL);

require_once ('core/library/connections/connector.php');

class Team extends Connector {
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function get($teamID = 'NULL', $brandID = 'NULL') {	
							
		//echo '*** Practice::Connector::get()</p>';
		$result = Connector::callProcedure("CALL pr_team_details_get(".$teamID.", NULL)");
		return $result;
	}
	
	public static function add(	$teamName,
								$teamDescription,
								$brandID) {	
							
		//echo '*** Practice::Connector::add()</p>';
		$result = Connector::callProcedure("CALL pr_team_details_add(".$brandID.",
															'".$teamName."',
															'".$teamDescription."')");												
		return $result;	
	}

	public static function amend(	$teamID,
									$teamName,
									$teamDescription,
									$brandID) {		
	
		//echo '*** Practice::Connector::amend()</p>';
		$result = Connector::callProcedure("CALL pr_team_details_amend(	".$teamID.",
																		".$brandID.",
																		'".$teamName."',
																		'".$teamDescription."')");														
		return $result;	
	}	
	
	public static function delete($teamID) {	
		
		//echo '*** Practice::Connector::delete()</p>';
		$result = Connector::callProcedure("CALL pr_team_details_delete(".$teamID.")");
		return $result;	
	}
	
	
	public static function getByConsultant($consultantID){
		
		//echo '*** Team::getByConsultant()</p>';
		$result = Connector::callProcedure("CALL pr_team_get_by_consultant(".$consultantID.")");
		return $result;	
	}
}










	
