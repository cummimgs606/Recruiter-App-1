<?php

ini_set('display_errors', 'On');

class DisplayJobsLarge {
	
	public static function showList($jobs, $addButton = true, $buttonText='Apply', $paginator = NULL){

		$rowCount = 1;
		
		if(!empty($jobs)){
			
			foreach ($jobs as $currentRow){
				
				echo "<h3>".$currentRow["job_title"]."</h3>";
				echo JOB_LOCATION.": ".$currentRow["job_location_text"]. "</br>";
				echo JOB_SALARY_RATE.": ".$currentRow["job_salary"]. "</br>";
				echo JOB_TYPE.": ".$currentRow["job_type_name"]. "</p>";
	
				echo JOB_DESCRIPTION." : ".$currentRow["job_description"]. "</br></br>"; 
				
				echo JOB_CONSULTANT.": ".$currentRow["consultant_name"]. "</br>"; ;
				echo JOB_PHONE_OFFICE.": <a href='".$currentRow["office_telephone"]."'>".$currentRow["office_telephone"]."</a></br>";	
				echo JOB_PHONE_MOBILE.": <a href='".$currentRow["consultant_phone_mobile"]."'>".$currentRow["consultant_phone_mobile"]."</a></br>";
				echo JOB_ID.": ".$currentRow["job_id"]."</br>";
				echo JOB_REF.": notset123 </br>";	
				
				if($addButton){
					echo "<p></p><a class='pure-button' href='".PATH_LOCALISED."/index.php?header-menu=Job%20Apply&jobID=".$currentRow["job_id"]."'>".$buttonText."</a><p></p>";
					//$buttonApply = '<a class="pure-button" href="'.PATH_LOCALISED.'/index.php?header-menu=Job%20Apply&jobID='.Jobs::getDetail(0,"job_id").'">'.BUTTON_APPLY.'</a>';
						
				}

				$rowCount++;
			}
		}
	}
}
?>

	
	
