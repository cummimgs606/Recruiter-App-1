<?php

ini_set('display_errors', 'On');

class DisplayBioTeam {
	
	public static function asDropDown($team, $disabled = '', $selectID = ''){
		
		if(!empty($team)){
		
			echo '<select name="bioTeamID'.$selectID.'" style="width:25%" '.$disabled.'>';
			
			echo'<option value="0">None</option>';
		
			foreach ($team as $currentRow){
				
				echo'<option value="'.$currentRow["team_id"].'"> '.$currentRow["team_name"].'</option>';	

			}
			
			echo '</select>';
		
		}
	}
}
?>