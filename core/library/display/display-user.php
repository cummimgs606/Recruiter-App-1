<?php

ini_set('display_errors', 'On');

class DisplayUser {
	
	public static function asTextList($user){

		if(!empty($user)){
			
			foreach ($user as $currentRow){
	
				echo "<h3>".$currentRow["user_name"]."</h3>";
				echo "<p>".$currentRow["user_first_name"]."</p>";
				echo "<p>".$currentRow["user_last_name"]."</p>";
				echo "<p>".$currentRow["user_email"]."</p>";
				echo "<p>User Admin : ".$currentRow["user_admin"]."</p>";
				echo "<p>User Active Directory : ".$currentRow["user_active_directory"]."</p>";
				echo "<p>User ID : ".$currentRow["user_id"]."</p>";
				echo "<p>Brand ID : ".$currentRow["brand_id"]."</p>";
				
	
			}
		}
	}
	
	public static function asScrollList($user){
		
		echo '<div class="pure-menu pure-menu-scrollable custom-restricted">
				<a href="#" class="pure-menu-link pure-menu-heading">USERS</a>
					<ul class="pure-menu-list">';
					
						if(!empty($user)){
							
							foreach ($user as $currentRow){

								$url = '?userID='.$currentRow["user_id"].'&menu='.$_SESSION['menu'];
								
								echo '<li class="pure-menu-item"><a href="'.$url.'" class="pure-menu-link">'.$currentRow["user_id"].' '.$currentRow["user_name"].'</a></li>';
							}
			
			echo '</ul>
			</div>';
						}
	}
}
?>

	
	
