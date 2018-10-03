<?php

error_reporting(E_ALL);

require_once ('core/library/connections/connector.php');
require_once ('core/library/display/display-table.php');

class Brand extends Connector {
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function get($brandID = 'NULL', $countryID = 'NULL') {	
		
		//echo '*** Brand::Connector::get()</p>';					
		$result = Connector::callProcedure("CALL pr_brand_get(".$brandID.",".$countryID.")");
		return $result;
	}
}










	
