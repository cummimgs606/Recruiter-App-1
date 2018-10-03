<?php

error_reporting(E_ALL);

require_once ('core/library/connections/connector.php');

class ConsultantPractice extends Connector {
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function getByConsultant($consultantID = 'NULL', $consultantPracticeDeleted = 0) {	
			
			//echo '*** Connector::consultantPractices::getByConsultant()</p>';
			
			$result = Connector::callProcedure("CALL pr_consultant_practice_get_by_consultant( ".$consultantID.",
																							   ".$consultantPracticeDeleted.")");
			
			return $result;
	}
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function getByConsultantRowCount($consultantID = 'NULL', $consultantPracticeDeleted = 0) {	
			
			//echo '*** Connector::consultantPractices::getByConsultant()</p>';
			
			$result = Connector::callProcedure("CALL pr_consultant_practice_get_by_consultant_row_count( 	".$consultantID.",
																							   				".$consultantPracticeDeleted.")");
			
			if(!empty($result )){
				foreach ($result as $currentRow){
					$total = $currentRow['total_practices'];
				}
			}
			
			return $total;
	}
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function getByPractice($practiceID = '') {	
							
			//echo '*** Connector::consultantPractices::getByPractice()</p>';

			$result = Connector::callProcedure("CALL pr_consultant_practice_get_by_practice('".$practiceID."')");
			
			return $result;
	}
	
}
?>












	
