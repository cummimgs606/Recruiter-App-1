<?php

ini_set('display_errors', 'On');

class DisplayLanguage {
	
	public static function asDropDown($language, $disabled = '', $selectID = ''){
		
		if(!empty($language)){
		
			echo '<select name="languageID" style="width:25%" '.$disabled.'>';
			
			//echo '<select name="languageID'.$selectID.'" style="width:25%" '.$disabled.'>';
		
			echo'<option value="0">None</option>';
			
			foreach ($language as $currentRow){
				
				if($currentRow["id"] == $selectID){
					$selected ='selected="selected"';
				}else{
					$selected ='';
				}

				echo'<option '.$selected.' value="'.$currentRow["id"].'">'.strtoupper($currentRow["iso_2"]).' - '.$currentRow["name_en"].'</option>';
			}
			
			echo '</select>';
		
		}
	}
	
}
?>

	
	
