<?php

ini_set('display_errors', 'On');

class DisplayConsultant {
	
	public static function asTitle($consultant){

		if(!empty($consultant)){
			
			foreach ($consultant as $currentRow){
				
				echo "<h3>".$currentRow["consultant_first_name"].' '.$currentRow["consultant_last_name"]."</h3></P>";
			}
		}
	}	
	
	public static function asTextList($consultant){

		if(!empty($consultant)){
			
			foreach ($consultant as $currentRow){
				
				echo "<h3>Consultant Name:".$currentRow["consultant_first_name"].' '.$currentRow["consultant_last_name"]."</h3></P>";
				echo "<p>Consultant ID:".$currentRow["consultant_id"]."</P>"; 
				echo "<p>Consultant Job Title:".$currentRow["consultant_job_title"]."</P>"; 
				echo "<p>Consultant Rank:".$currentRow["consultant_rank"]."</P>"; 
				echo "<p>Consultant Expertise:".$currentRow["consultant_expertise"]."</P>"; 
				echo "<p>Consultant Email:".$currentRow["consultant_email"]."</P>"; 
				echo "<p>Consultant Linked In:".$currentRow["consultant_linkedin"]."</P>"; 
				echo "<p>Consultant Twitter:".$currentRow["consultant_twitter"]."</P>"; 
				echo "<p>Consultant Phone Mobile:".$currentRow["consultant_phone_mobile"]."</P>"; 
				echo "<p>Consultant Image:".$currentRow["consultant_image"]."</P>"; 
				
				echo "<p>Office ID:".$currentRow["office_id"]."</P>"; 
				echo "<p>Practice IDs:".$currentRow["practice_ids"]."</P>"; 
				echo "<p>Bio IDs:".$currentRow["bio_ids"]."</P>"; 
			}
		}
	}
	
	public static function asGalleryItem($consultant,  $teamID, $menu, $deleted){

		if(!empty($consultant)){
			
			foreach ($consultant as $currentRow){
				
				
				$brandID 	= 'NULL';
				$languageID 	= 'NULL';
				$deleted	= 'NULL';
				
				echo '<ul class="flex-container">';
				echo 	"<li class='flex-item'>
							<img class='image-small' src='".PATH_ROOT."consultant-images/".$currentRow["consultant_image"]."'?test=0/></p>";
				echo 	"</li>";	
				echo '</ul>';
				
				echo "<h3>".$currentRow["consultant_first_name"].' '.$currentRow["consultant_last_name"]."</h3></P>";
				echo "<p>".$currentRow["consultant_job_title"]."</P>"; 
				
				
				echo "RENDER CONSULTANT PRACTICE </P>";
				
				$result = ConsultantPractice::getByConsultant($currentRow["consultant_id"], $deleted);
				DisplayConsultantPractices::asList($result);
				
				$result =  Bio::get($currentRow["consultant_id"] ,$brandID, $languageID, $teamID, $deleted);
				DisplayBio::asText($result);
				
				echo "<b>Expertise:</b> ".$currentRow["consultant_expertise"]."</p>"; 
				echo "<b>Office Location: </b>".$currentRow["office_name"]."</P>"; 
				 
				echo "<b>Email: </b><a href='mailto:".$currentRow["consultant_email"]."'>".$currentRow["consultant_email"]."</a></P>"; 
				echo "<b>LinkedIn: </b><a href='".$currentRow["consultant_linkedin"]."'>".$currentRow["consultant_linkedin"]."</a></P>"; 
				echo "<b>Twitter: </b><a href='".$currentRow["consultant_twitter"]."'>".$currentRow["consultant_twitter"]."</a></P>"; 
				
				echo "<b>Phone Mobile: </b>".$currentRow["consultant_phone_mobile"]."</P>"; 
				echo "<b>Phone Office: </b>".$currentRow["consultant_phone_mobile"]."</P>"; 
				echo "<b>Bio IDs: </b>".$currentRow["bio_ids"]."</P>"; 
				
				
			}
		}
	}
	
	public static function asScrollList($consultant, $menu = NULL){
		
		echo '<div class="pure-menu pure-menu-scrollable custom-restricted">
				<a href="#" class="pure-menu-link pure-menu-heading">Consultant</a>
					<ul class="pure-menu-list">';
					
						if(!empty($consultant)){
							
							foreach ($consultant as $currentRow){
								
								if($menu != NULL){
									$url = '?consultantID='.$currentRow["consultant_id"].'&menu='.$menu;
								}else{
									$url = '?consultantID='.$currentRow["consultant_id"];
								}
								
								echo '<li class="pure-menu-item"><a href="'.$url.'" class="pure-menu-link">'.$currentRow["consultant_id"].' '.$currentRow["consultant_first_name"].' '.$currentRow["consultant_last_name"].'</a></li>';
							}
			
			echo '</ul>
			</div>';
						}
	}
	
	public static function asDropDown($consultant, $disabled = ''){
		
		if(!empty($consultant)){
			
			$people = array();
			
			$index = 0;
			
			foreach ($consultant as $currentRow){
				
				$people[$index] = array("consultant_id" => $currentRow["consultant_id"], "consultant_name"=> $currentRow["consultant_first_name"].' '.$currentRow["consultant_last_name"]);
				
				$index++;
			}
			
			$sortArray = array(); 
		
			foreach($people as $person){ 
				foreach($person as $key=>$value){ 
					if(!isset($sortArray[$key])){ 
						$sortArray[$key] = array(); 
					} 
					$sortArray[$key][] = $value; 
				} 
			} 
			
			$orderby = "consultant_name";
			
			array_multisort($sortArray[$orderby],SORT_ASC,$people); 
	
			echo '<select name="consultantID" style="width:25%" '.$disabled.'>';
			
				echo'<option value="0">None</option>';
			
				foreach ($people as $currentRow){
					
	
					echo'<option value="'.$currentRow["consultant_id"].'">'.$currentRow["consultant_name"].'</option>';
				}
			
			echo '</select>';
			
		
		}
	}
}
?>

	
	
