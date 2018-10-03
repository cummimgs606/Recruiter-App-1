<?php

ini_set('display_errors', 'On');

class DisplayBrand {
	
	public static function asTitle($brand){

		if(!empty($brand)){
			
			foreach ($brand as $currentRow){
				
				echo "<h3>".$currentRow["brand_name"]."</h3></P>";
			}
		}
	}
	
	
	public static function asTextList($brand){

		if(!empty($brand)){
			
			foreach ($brand as $currentRow){
				
				echo "<h3>".$currentRow["brand_name"]."</h3>";
				echo "Brand Description : ".$currentRow["brand_description"]."</p>";
				echo "Country ID : ".$currentRow["country_id"]."</p>";
				echo "ID : ".$currentRow["brand_id"]."</p>";
			}
		}
	}
	
	public static function asScrollList($brand, $menu){
		
		echo '<div class="pure-menu pure-menu-scrollable custom-restricted">
				<a href="#" class="pure-menu-link pure-menu-heading">Brands</a>
					<ul class="pure-menu-list">';
					
						if(!empty($brand)){
							
							foreach ($brand as $currentRow){

								$url = '?brandID='.$currentRow["brand_id"].'&menu='.$menu;
								
								echo '<li class="pure-menu-item"><a href="'.$url.'" class="pure-menu-link">'.$currentRow["brand_id"].' '.$currentRow["brand_name"].'</a></li>';
							}
			
			echo '</ul>
			</div>';
						}
	}
	
	public static function asDropDown($brand, $disabled = '', $selectID = ''){
		
		if(!empty($brand)){
		
			echo '<select name="brandID'.$selectID.'" style="width:25%" '.$disabled.'>';
			
			echo'<option value="0">None</option>';
		
			foreach ($brand as $currentRow){
				
				echo'<option value="'.$currentRow["brand_id"].'"> '.$currentRow["brand_name"].'</option>';	

			}
			
			echo '</select>';
		
		}
	}
}
?>

	
	
