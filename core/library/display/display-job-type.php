<?php

ini_set('display_errors', 'On');

class DisplayJobType{
	
	public static function asDropDown($jobType, $disabled = ''){
		
		if(!empty($jobType)){
		
			echo '<select name="jobTypeID" style="width:25%" '.$disabled.'>';
			
			echo'<option value="0">None</option>';
		
			foreach ($jobType as $currentRow){
			
				echo'<option value="'.$currentRow["job_type_id"].'">'.$currentRow["job_type_name"].'</option>';
			}
			
			echo '</select>';
		
		}
	}
}
?>

	
	
