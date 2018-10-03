<?php

error_reporting(E_ALL);

require_once ('core/library/connections/connector.php');

class Language extends Connector {
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function get() {	
							
		//echo '*** Source::Connector::get()</p>';
			
		$result = Connector::callProcedure("CALL pr_language_get();");
			
		return $result;
	}
	
}










	
