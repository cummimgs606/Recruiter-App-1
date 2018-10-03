<?php

ini_set('display_errors', 'On');

class DisplayOffice{
	
	public static function asTitle($office){

		if(!empty($office)){
			
			foreach ($office as $currentRow){
				
				echo "<h3>".$currentRow["office_name"]."</h3></P>";
			}
		}
	}
	
	public static function asTextList($office, $addButton, $buttonText){

		if(!empty($office)){
			
			foreach ($office as $currentRow){
				
				echo "<h3>".$currentRow["office_name"]."</h3>";
				echo "Address 1 : ".$currentRow["office_address1"]."</p>";
				echo "Address 2 : ".$currentRow["office_address2"]."</p>";
				echo "Address 3 : ".$currentRow["office_address3"]."</p>";
				echo "Address 4 : ".$currentRow["office_address4"]."</p>";
				echo "Postal Code : ".$currentRow["office_postal_code"]."</p>";
				echo "Telephone : ".$currentRow["office_telephone"]."</p>";
				echo "Country ID : ".$currentRow["country_id"]."</p>";
				echo "Added : ".$currentRow["office_added"]."</p>";
				echo "Office ID : ".$currentRow["office_id"]."</p>";
				
				if($addButton){
					
					$officeID = $currentRow["office_id"];
					
					echo "<p></p><a class='pure-button' href='".$_SERVER["PHP_SELF"]."?office=".$officeID."'>".$buttonText."</a><p></p>";	
									
				}
			}
		}
	}
	
	public static function asScrollList($office, $menu){
		
		echo '<div class="pure-menu pure-menu-scrollable custom-restricted">
				<a href="#" class="pure-menu-link pure-menu-heading">Offices</a>
					<ul class="pure-menu-list">';
					
						if(!empty($office)){
							
							foreach ($office as $currentRow){
								
								$url = '?officeID='.$currentRow["office_id"].'&menu='.$menu;
								
								echo 	'<li class="pure-menu-item">
											<a href="'.$url.'" class="pure-menu-link">
												<b>'.$currentRow["office_id"].' '.$currentRow["office_name"].'</b>
												<div style="font-size:12px;color:#888888;padding-left:14px">   '.$currentRow["short_name_en"].'</div>
											</a>
										</li>';
					
								
								//echo '<li class="pure-menu-item">
										//<a href="'.$url.'" class="pure-menu-link">'.$currentRow["office_id"].' '.$currentRow["office_name"].'</a>
									//</li>';
							}
			
			echo '</ul>
			</div>';
						}
	}
	
	public static function asDropDown($office, $disabled = ''){
		
		if(!empty($office)){
		
			echo '<select name="officeID" style="width:25%" '.$disabled.'>';
		
			echo'<option value="0">None</option>';
			
			foreach ($office as $currentRow){
			
				echo'<option value="'.$currentRow["office_id"].'">'.$currentRow["office_name"].'</option>';
			}
			
			echo '</select>';
		
		}
	}
}
?>

	
	
