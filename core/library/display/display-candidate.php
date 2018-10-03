<?php

ini_set('display_errors', 'On');

class DisplayCandidate {
	
	public static function asTitle($candidate){

		if(!empty($candidate)){
			
			foreach ($candidate as $currentRow){
				
				echo "<h3>".$currentRow["candidate_first_name"]." - ".$currentRow["candidate_middle_name"]." - ".$currentRow["candidate_last_name"]."</h3></P>";
			}
		}
	}
	
	
	public static function asTextList($candidate){

		if(!empty($candidate)){
			
			foreach ($candidate as $currentRow){
				
				echo "<h3>".$currentRow["candidate_first_name"]." - ".$currentRow["candidate_middle_name"]." - ".$currentRow["candidate_last_name"]."</h3>";
				
				
				echo "Candidate ID: ".$currentRow["candidate_id"]."</p>";
				echo "Candidate First Name: ".$currentRow["candidate_first_name"]."</p>";
				echo "Candidate Middle Name: ".$currentRow["candidate_middle_name"]."</p>";
				echo "Candidate Last Name: ".$currentRow["candidate_last_name"]."</p>";
				echo "Candidate Saultation: ".$currentRow["candidate_salutation"]."</p>";
				echo "Candidate Email: ".$currentRow["candidate_email"]."</p>";
				echo "Candidate Phone Home: ".$currentRow["candidate_phone_home"]."</p>";
				echo "Candidate Phone Mobile: ".$currentRow["candidate_phone_mobile"]."</p>";
				echo "Candidate CV: ".$currentRow["candidate_cv"]."</p>";
				echo "Candidate Added: ".$currentRow["candidate_added"]."</p>";
				echo "Candidate Updated: ".$currentRow["candidate_updated"]."</p>";
			}
		}
	}
	
	public static function asScrollList($candidate, $menu){
		
		echo '<div class="pure-menu pure-menu-scrollable custom-restricted">
				<a href="#" class="pure-menu-link pure-menu-heading">Candidate</a>
					<ul class="pure-menu-list">';
					
						if(!empty($candidate)){
							
							foreach ($candidate as $currentRow){

								$url = '?candidateID='.$currentRow["candidate_id"].'&menu='.$menu;
								
								echo '<li class="pure-menu-item"><a href="'.$url.'" class="pure-menu-link">'.$currentRow["candidate_first_name"]." - ".$currentRow["candidate_middle_name"]." - ".$currentRow["candidate_last_name"].'</a></li>';
							}
			
			echo '</ul>
			</div>';
						}
	}
	
	public static function asDropDown($candidate, $disabled = '', $selectID = ''){
		
		if(!empty($candidate)){
		
			echo '<select name="CandidateID'.$selectID.'" style="width:25%" '.$disabled.'>';
			
			echo'<option value="0">None</option>';
		
			foreach ($candidate as $currentRow){
				
				echo'<option value="'.$currentRow["Candidate_id"].'"> '.$currentRow["Candidate_name"].'</option>';	

			}
			
			echo '</select>';
		
		}
	}
}
?>

	
	
