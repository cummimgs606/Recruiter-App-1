<?php

ini_set('display_errors', 'On');

class DisplayJobsSmall {
	
	public static function showList($jobs, $addButton = true, $buttonText='More', $paginator = NULL){
		
		$rowCount = 1;
		
		if(!empty($jobs)){
			
			foreach ($jobs as $currentRow){
				
				echo "<h3>".$currentRow["job_title"]."</h3>";
				echo JOB_LOCATION.": ".$currentRow["job_location_text"]."</br>";
				echo JOB_SALARY_RATE.": ".$currentRow["job_salary"]."</br>";
				
				if($addButton){
					
					$index = $paginator->getZeroIndexStart() + $rowCount;
					
					echo "<p></p><a class='pure-button' href='".$_SERVER["PHP_SELF"]."?show=large&page=".$index."'>".$buttonText."</a><p></p>";	
									
				}
				
				$rowCount++;
			}
		}
	}
}
?>

	
	
