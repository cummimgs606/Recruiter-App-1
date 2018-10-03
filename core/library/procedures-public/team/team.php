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
}










	
