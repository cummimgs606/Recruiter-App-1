<?php

error_reporting(E_ALL);

require_once ('core/library/connections/connector.php');

class JobType extends Connector {
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function get($jobTypeID) {	
							
		//echo '*** JobType::Connector::get()</p>';
			
		$result = Connector::callProcedure("CALL pr_job_type_get(".$jobTypeID.");");
			
		return $result;
	}
}










	
