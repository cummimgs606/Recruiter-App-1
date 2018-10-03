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
	
	public static function getByConsultant($consultant_id = 'NULL') {	
		
		//echo '*** Brand::Connector::getbyConsultant()</p>';					
		$result = Connector::callProcedure("CALL pr_brand_get_by_consultant(".$consultant_id.")");
		return $result;
	}

	
	public static function add(	$brandName, 
								$brandDescription, 
								$countryID ) {	
							
		//echo '*** Brand::Connector::add()</p>';
		$result = Connector::callProcedure("CALL pr_brand_add('".$brandName."','".$brandDescription."',".$countryID.")");		
		return $result;	
	}

	public static function amend(	$brandID,
									$brandName,
									$brandDescription,
									$countryID) {		
	
		//echo '*** Brand::Connector::amend()</p>';
		$result = Connector::callProcedure("CALL pr_brand_amend(".$brandID.",'".$brandName."','".$brandDescription."',".$countryID.")");
		return $result;
	}	
	
	public static function delete($brandID) {	
		
		//echo '*** Brand::Connector::delete()</p>';
		$result = Connector::callProcedure("CALL pr_brand_delete(".$brandID.")");			
		return $result;
	}
}










	
