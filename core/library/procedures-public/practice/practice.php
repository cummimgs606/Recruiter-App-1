<?php

error_reporting(E_ALL);

require_once ('core/library/connections/connector.php');

class Practice extends Connector {
	
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	
	public static function get($practiceID = 'NULL') {	
							
		//echo '*** Practice::Connector::get()</p>';
		$result = Connector::callProcedure("CALL pr_practice_get(".$practiceID.")");
		return $result;
	}
	
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
		
		
	public static function getLinked($practiceList) {	
							
		//echo '*** Job::Connector::consultant::consultantPracticeGetLinked() SORT THIS OUT</p>';

		$result = Connector::callProcedure("CALL pr_practice_get_by_practice_linked('".$practiceList."')");
	
		if(!empty($result )){
	
			foreach ($result as $currentRow){
				$practiceIDs = $currentRow['practice_ids'];
			}
		}else{
			$practiceIDs = '';
		}
		
		return $practiceIDs;
		
	}
	
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
		
		
	private static $practices;
	
	public static function store($query){

		self::$practices = $query->fetchAll();
	}
	
	public static function getAll(){
		
		return self::$practices;
	}
}







	
