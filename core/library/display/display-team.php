<?php

ini_set('display_errors', 'On');

class DisplayTeam {
	
	public static function asTitle($consultant){

		if(!empty($consultant)){
			
			foreach ($consultant as $currentRow){
				
				echo "<h3>".$currentRow["team_name"]."</h3></P>";
			}
		}
	}	
	
	public static function asTextList($team){

		if(!empty($team)){
			
			foreach ($team as $currentRow){
	
				echo "<h3>".$currentRow["team_name"]."</h3>";
				echo "<p>Team Description : ".$currentRow["team_description"]."</p>";
				echo "<p>Brand ID : ".$currentRow["brand_id"]."</p>";
				echo "<p>ID : ".$currentRow["team_id"]."</p>";
			}
		}
	}
	
	public static function asScrollList($team, $menu){
		
		echo '<div class="pure-menu pure-menu-scrollable custom-restricted">
				<a href="#" class="pure-menu-link pure-menu-heading">Teams</a>
					<ul class="pure-menu-list">';
					
						if(!empty($team)){
							
							foreach ($team as $currentRow){

								$url = '?teamID='.$currentRow["team_id"].'&brandID='.$currentRow["brand_id"].'&menu='.$menu;
								
								echo '<li class="pure-menu-item"><a href="'.$url.'" class="pure-menu-link"><b>'.$currentRow["team_id"].' '.$currentRow["team_name"].'</b><div style="font-size:12px;color:#888888;padding-left:14px">   '.$currentRow["brand_name"].'</div></a></li>';
							}
			
			echo '</ul>
			</div>';
						}
	}
	
	public static function asDropDown($team, $disabled = '', $selectID = ''){
		
		if(!empty($team)){
		
			echo '<select name="teamID'.$selectID.'" style="width:25%" '.$disabled.'>';
			
			echo'<option value="0">None</option>';
		
			foreach ($team as $currentRow){
			
				echo'<option value="'.$currentRow["team_id"].'">'.$currentRow["team_name"].'</option>';
			}
			
			echo '</select>';
		
		}
	}
}
?>

	
	
