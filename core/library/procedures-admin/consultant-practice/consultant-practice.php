<?php

error_reporting(E_ALL);

require_once ('core/library/connections/connector.php');

class ConsultantPractice extends Connector {
	
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function add($consultantID,
							  $pratacticeID,
							  $pratacticeRank) {	
							
			//echo '*** Connector::consultantPractices::add()</p>';
			
			$result = Connector::callProcedure("CALL pr_consultant_practice_add(	".$consultantID.",
																				".$pratacticeID.",
																				".$pratacticeRank.")");
		
			return $result;
	}
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function amend($consultantPracticeID,
								$pratacticeID,
								$pratacticeRank) {	
							
			//echo '*** Connector::consultantPractices::amend()</p>';
			
			$result = Connector::callProcedure("CALL pr_consultant_practice_amend(	 ".$consultantPracticeID.",
																					".$pratacticeID.",
																					".$pratacticeRank.")");
			//var_dump($result);																		
		
			return $result;
	}
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function delete($consultantPracticeID) {	
							
			//echo '*** Connector::consultantPractices::delete()</p>';
			
			$result = Connector::callProcedure("CALL pr_consultant_practice_delete_set(".$consultantPracticeID.")");
		
			return $result;
	}
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function undelete($consultantPracticeID) {	
							
			//echo '*** Connector::consultantPractices::delete()</p>';
			
			$result = Connector::callProcedure("CALL pr_consultant_practice_delete_unset(".$consultantPracticeID.")");
		
			return $result;
	}
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function getRowCount($consultantID = '') {	
							
			//echo '*** Connector::consultantPractices::getByPractice()</p>';

			$result = Connector::callProcedure('CALL pr_consultant_practice_get_practice_row_count("'.$consultantID .'");');
			
			$total = 0;
																			
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












	
