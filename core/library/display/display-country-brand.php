<?php

ini_set('display_errors', 'On');

class DisplayCountryBrand{
	
	public static function asDropDown($country, $disabled = '', $selectID = ''){
		
		if(!empty($country)){
		
			echo '<select name="brandCountryID'.$selectID.'" style="width:25%" '.$disabled.'>';
			
			echo'<option value="0">None</option>';
		
			foreach ($country as $currentRow){
				
				if($currentRow["brand_country_id"] == $selectID){
					$selected ='selected="selected"';
				}else{
					$selected = '';
				}
				
				$iso_2 = $currentRow["iso_2"] == '' ? 'XX' : $currentRow["iso_2"];
			
				echo'<option '.$selected.' value="'.$currentRow["brand_country_id"].'">'.$iso_2.' - '.$currentRow["short_name_en"].'</option>';
			}
			
			echo '</select>';
		
		}
	}
}
?>

	
