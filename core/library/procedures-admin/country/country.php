<?php

error_reporting(E_ALL);

require_once ('core/library/connections/connector.php');

class Country extends Connector {
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//

	public static function get($countryID = 'NULL') {	
							
			//echo '*** Country::Connector::get()</p>';
			
			$result = Connector::callProcedure("CALL pr_country_get(".$countryID.")");
						
			return $result;
	}
	
	public static function  getByOfficeConsultant() {	
							
			//echo '*** Country::Connector::officesGet(()</p>';
			
			$result = Connector::callProcedure("CALL pr_country_get_by_office_consultant()");
						
			return $result;
	}
	
	public static function  getByBrandConsultant() {	
							
			//echo '*** Country::Connector::officesGet(()</p>';
			
			$result = Connector::callProcedure("CALL pr_country_get_by_brand_consultant()");
						
			return $result;
	}
}




