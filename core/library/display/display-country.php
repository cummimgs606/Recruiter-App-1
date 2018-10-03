<?php

ini_set('display_errors', 'On');

class DisplayCountry{
	
	public static function asDropDown($country, $disabled = '', $selectID = ''){
		
		if(!empty($country)){
		
			echo '<select name="countryID" style="width:25%" '.$disabled.'>';
			
			echo'<option value="0">None</option>';
		
			foreach ($country as $currentRow){
				
				if($currentRow["id"] == $selectID){
					$selected ='selected="selected"';
				}else{
					$selected ='';
				}
			
				echo'<option '.$selected.' value="'.$currentRow["id"].'">'.$currentRow["iso_2"].' - '.$currentRow["short_name_en"].'</option>';
			}
			
			echo '</select>';
		
		}
	}
}
?>

	
	
