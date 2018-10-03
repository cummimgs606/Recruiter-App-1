<?php

ini_set('display_errors', 'On');

class DisplayConsultantPractices {
	
	
	public static function asForm($selectID = '', $disabled = '', $rankSelected = 0 ){
		
		$result = Practice::get();
		Practice::store($result);
		
		
		echo '<div class="pure-control-group">';                                
				//<label>Consultant Practice ID</label>
		echo '<input type="hidden" name="consultantPracticeID'.$selectID.'" placeholder="Consultant Practice ID" class="pure-input-1-3" readonly></input>
			 </div>';
		
		
		echo '<div class="pure-control-group">';  
			 
		echo 	'<label>Consultant Practice '.$selectID.'</label>';
						
					$selectName = 'practiceID'.$selectID;
					DisplayPractice::asDropDown(Practice::getAll(),$selectName, $disabled);
							
		echo '</div>';
			 

   		echo '<div class="pure-control-group"> 
		                                 
				<label>Practice Rank</label>
				
				<select name="practiceRank'.$selectID.'" '.$disabled.'>
					
					<option value="0">None</option>';
				
						for($i = 1; $i <=10; $i++){
							
							if($i == $rankSelected+1){
								$selected = 'selected="selected"';
							}else{
								$selected = '';
							}
								
							echo '<option '.$selected.' value="'.$i.'">'.$i.'</option>';
						}
						
		echo 	'</select>

        	</div>';
	}
	
	public static function asList($practices){
		
		$rowCount = 0;
		$tempArray= [];
		$rankArray = [];
		
		//$practices = ConsultantPractice::getByConsultant($_SESSION['consultantID'], $_SESSION['consultantPracticeDeleted']);
	
		if(!empty($practices)){
			
			foreach ($practices as $currentRow){
				
				$tempArray[$rowCount]['practice_name'] = $currentRow["practice_name"];
				$tempArray[$rowCount]['practice_rank'] = intval($currentRow["practice_rank"]);
				
				$rowCount++;
			}
			
			// -------------------------------------
			// SORT ON START
			// -------------------------------------
			
			foreach ($tempArray as $key => $row){
				$rankArray[$key] = $row["practice_rank"];
			}
			
			array_multisort($rankArray, SORT_ASC, $tempArray);
			
			// -------------------------------------
			// SORT ON END
			// -------------------------------------
			
			echo '<h6>';
			
			$rowCount = 0;
	
			foreach ($tempArray as $currentRow){
				
				
		
				if($rowCount == 0){
					echo $currentRow["practice_name"];
				}else{
					echo ' - '.$currentRow["practice_name"];
				}

				$rowCount++;
			}
			
			echo '</h6>';
		}
		
	}

	public static function small($consultant){

		if(!empty($consultant)){
			
			$rowCount 			= 0;
			$tempArray  		= [];
			$practice_amount 	= [];
			$practiceArray	 	= [];
			
			foreach ($consultant as $currentRow){
				
				$practice_amount = explode( ' - ', $currentRow["practice_names"]);
				
				$tempArray[$rowCount]['practice_amount'] 	= count($practice_amount);
				$tempArray[$rowCount]['practice_namess'] 	= $currentRow["practice_names"];
				$tempArray[$rowCount]['consultant_name'] 	= $currentRow["consultant_first_name"].' '.$currentRow["consultant_last_name"];
				$tempArray[$rowCount]['consultant_id'] 		= $currentRow["consultant_id"];
				
				$rowCount++;
			}
			
			// -------------------------------------
			// SORT ON START
			// -------------------------------------
			
			foreach ($tempArray as $key => $row){
				$practiceArray[$key] = $row["practice_amount"];
			}
			
			array_multisort($practiceArray, SORT_DESC, $tempArray);
			
			// -------------------------------------
			// SORT ON END
			// -------------------------------------
			
			$rowCount = 0;
	
			foreach ($tempArray as $currentRow){
				
				$string1 = '<span style="color:#1B9221">'.$tempArray[$rowCount]['practice_namess'].'</span> ';
				$string2 = '<a href="#"><span style="color:#888888">'.$tempArray[$rowCount]['consultant_name'].'</span></a></P>';
				
				echo $string1.$string2;
				$rowCount++;
			}
		}
	}

}
?>

	
	
