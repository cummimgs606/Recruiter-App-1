<?php

ini_set('display_errors', 'On');

class DisplayBioBrand {
	
	public static function asDropDown($brand, $disabled = '', $selectID = ''){
		
		if(!empty($brand)){
		
			echo '<select name="bioBrandID'.$selectID.'" style="width:25%" '.$disabled.'>';
			
			echo'<option value="0">None</option>';
		
			foreach ($brand as $currentRow){
				
				echo'<option value="'.$currentRow["brand_id"].'"> '.$currentRow["brand_name"].'</option>';	

			}
			
			echo '</select>';
		
		}
	}
}
?>

	
	
