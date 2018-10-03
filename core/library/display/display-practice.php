<?php

ini_set('display_errors', 'On');

class DisplayPractice {
	
	
	public static function asTextList($practice){

		if(!empty($practice)){
			
			foreach ($practice as $currentRow){
				
				echo "<h3>".$currentRow["practice_name"]."</h3>";
				echo "ID : ".$currentRow["practice_id"]."</p>";
			}
		}
	}
	
	public static function asScrollList($practice){
		
		echo '<div class="pure-menu pure-menu-scrollable custom-restricted">
				<a href="#" class="pure-menu-link pure-menu-heading">PRACTICES</a>
					<ul class="pure-menu-list">';
					
						if(!empty($practice)){
							
							foreach ($practice as $currentRow){

								$url = '?practiceID='.$currentRow["practice_id"].'&menu='.$_SESSION['menu'];
								
								echo '<li class="pure-menu-item"><a href="'.$url.'" class="pure-menu-link">'.$currentRow["practice_id"].' '.$currentRow["practice_name"].'</a></li>';
							}
			
			echo '</ul>
			</div>';
						}
	}
	
	public static function asDropDown($practice, $selectName = 'practiceID', $disabled = ''){
		
		if(!empty($practice)){
		
			echo '<select name="'.$selectName.'" style="width:25%" '.$disabled.'>';
			
			echo'<option value="0">None</option>';
		
			foreach ($practice as $currentRow){
			
				echo'<option value="'.$currentRow["practice_id"].'">'.$currentRow["practice_id"].' '.$currentRow["practice_name"].'</option>';
			}
			
			echo '</select>';
		}
	}
}
?>

	
	
