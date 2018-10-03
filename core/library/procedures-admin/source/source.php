<?php

error_reporting(E_ALL);

require_once ('core/library/connections/connector.php');

class Source extends Connector {
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function get($job_source_id) {	
							
		//echo '*** Source::Connector::get()</p>';
			
		$result = Connector::callProcedure("CALL pr_job_source_get(".$job_source_id.")");
			
		return $result;
	}
	
}










	
