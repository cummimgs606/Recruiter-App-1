<?php

ini_set('display_errors', 'On');

class DisplayJobSource {
	
	public static function asDropDown($source, $disabled = ''){
		
		if(!empty($source)){
		
			echo '<select name="jobSourceID" style="width:25%" '.$disabled.'>';
		
			foreach ($source as $currentRow){
			
				echo'<option value="'.$currentRow["job_source_id"].'">'.$currentRow["job_source_name"].'</option>';
			}
			
			echo '</select>';
		
		}
	}
}
?>

	
	
