<?php

ini_set('display_errors', 'On');

class DisplayMenu{
	
	// ---------------------------------------------------------------------------
	// PRIMARY HORIZONTAL MENU
	// ---------------------------------------------------------------------------	
	
	public static function asPrimryMenu($title, $itemLables){
		
		if(isset($_GET['header-menu'])){
			$_SESSION['header-menu'] = $_GET['header-menu'];
		}else{
			
			if(!isset($_SESSION['header-menu'])){
				$_SESSION['header-menu'] = '';
			}
			
			$_GET['header-menu'] = $_SESSION['header-menu'] ;
		}
		
			
		echo	'<div class="custom-menu-wrapper">
					<div class="pure-menu custom-menu custom-menu-top">
						<a href="#" class="pure-menu-heading custom-menu-brand">'.$title.'</a>
						<a href="#" class="custom-menu-toggle" id="toggle"><s class="bar"></s><s class="bar"></s></a>
					</div>';
					
		echo 		'<div class="	pure-menu pure-menu-horizontal 
									pure-menu-scrollable 
									custom-menu 
									custom-menu-bottom 
									custom-menu-tucked" 
									id="tuckedMenu">
						<div class="custom-menu-screen"></div>
       						<ul class="pure-menu-list">';
		
		for($i = 0; $i < count($itemLables); $i++){
				
			if(isset($_GET['header-menu'])){
					
				if($itemLables[$i] == $_GET['header-menu']){
						
						echo 	'<li class="pure-menu-item pure-menu-selected">
									<a href="'.$_SERVER["PHP_SELF"].'?header-menu='.$itemLables[$i].'" 
									class="pure-menu-link">'.ucfirst($itemLables[$i]).'</a>
								</li>';
				}else{
						echo 	'<li class="pure-menu-item">
									<a href="'.$_SERVER["PHP_SELF"].'?header-menu='.$itemLables[$i].'" 
									class="pure-menu-link">'.ucfirst($itemLables[$i]).'</a>
								</li>';
				}
			}else{
						echo 	'<li class="pure-menu-item">
									<a href="'.$_SERVER["PHP_SELF"].'?header-menu='.$itemLables[$i].'" 
									class="pure-menu-link">'.ucfirst($itemLables[$i]).'</a>
								</li>';
			}
		}
			echo '       </ul>
    				</div>
				</div>';
	}
	
	// ---------------------------------------------------------------------------
	// SECONDAREY HORIZONTAL MENU
	// ---------------------------------------------------------------------------
	
	public static function asHorizontalMenu($title, $itemLables){

		echo	'<div class="pure-menu pure-menu-horizontal" style="background:#DEDEDE;">
					<div class="pure-menu-heading">'.$title.'</div>
						<ul class="pure-menu-list">';
		
		for($i = 0; $i < count($itemLables); $i++){
				
			if(isset($_GET['menu'])){
					
				if($itemLables[$i] == $_GET['menu']){
						
					echo '<li class="pure-menu-item pure-menu-selected"><a href="?menu='.$itemLables[$i].'" 
							class="pure-menu-link">'.ucfirst($itemLables[$i]).'</a></li>';
				}else{
					
					echo '<li class="pure-menu-item"><a href="?menu='.$itemLables[$i].'" 
							class="pure-menu-link">'.ucfirst($itemLables[$i]).'</a></li>';
				}
				
			}else{
					echo '<li class="pure-menu-item"><a href="?menu='.$itemLables[$i].'" 
							class="pure-menu-link">'.ucfirst($itemLables[$i]).'</a></li>';
			}
		}
				echo '</ul>
			</div>';
	}
	
	// ---------------------------------------------------------------------------
	// SESSION RESET
	// ---------------------------------------------------------------------------	
	
	public static function sessionReset($keepIndexes){
		
		
		if(isset($_GET['header-menu'])){
			
			$_SESSION['keepGroup'] 		= isset($_SESSION['keepGroup']) ? $_SESSION['keepGroup'] : 0;
			$_SESSION['header-menu'] 	= isset($_SESSION['header-menu']) ? $_SESSION['header-menu'] : '';
			$keepItem 					= 0;
			$menuSame					= 0;
			$keep 						= 0;
			
			// ----------------------------------------------------------------------
			// Compares the selected item to the menus that keep their session states
		
			foreach ($keepIndexes as $value) {
		
				if($_GET['header-menu'] == $value){
						
					$keepItem = 1;
				}
			}
		
			// ---------------------------------
			// Records if menu is selected twice
		
			if($_SESSION['header-menu'] == $_GET['header-menu']){
					
				$menuSame =  1;
			}
		
			// --------------------------------------------
			// LOGIC MATRIX
			
			if($keepItem == 1){
					
				if($menuSame == 1){
					
					$keep = 1;
				}
					
				if($menuSame == 0){
						
					if($_SESSION['keepGroup'] == 1){
						
						$keep = 1;
					}
				}	
				
				$_SESSION['keepGroup'] = 1;			
			}
				
			if($keepItem == 0){
					
				if($menuSame == 1){
					
					$keep = 1;
				}
				
				$_SESSION['keepGroup'] = 0;
			}
	
			// ---------------------------------------------
			// DESTROY SESSION EXCEPT FOR SESSION CONTROLLER
		
			if(!$keep){
		
				$var1 = $_SESSION['header-menu']; 
				$var2 = $_SESSION['keepGroup'];
				
				session_unset(); 
				
				$_SESSION['header-menu'] 	= $var1;
				$_SESSION['keepGroup'] 		= $var2;
				
				//echo 'DELETE</p>';
				
			}else{
				
				//echo 'KEEP</p>';
			}
		}
	}
}
?>

	
	
