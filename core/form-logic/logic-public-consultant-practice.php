<?php

//session_start();
//session_unset(); 
//session_destroy();   
error_reporting(E_ALL);


class PracticeLinkedPublic {
	
	public static function init($language, $brand) {
	
		require_once (dirname(dirname(__FILE__)) .'/config/paths.php');
		
		require_once (PATH_SERVER.'core/form-languages/language-'.$language.'.php');
		
		require_once (PATH_SERVER.'core/library/display/display-consultant-practice.php');
		require_once (PATH_SERVER.'core/library/display/display-practice-linked.php');

		require_once (PATH_SERVER.'core/library/procedures-public/consultant-practice/consultant-practice.php');
		require_once (PATH_SERVER.'core/library/procedures-public/practice/practice.php');
		require_once (PATH_SERVER.'core/library/procedures-public/practice/practice-linked.php');
		
		// ---------------------------------------------------------------------------
		// SEVER-LIST
		// ---------------------------------------------------------------------------
	
		$severList = '';
	
		// ---------------------------------------------------------------------------
		// USER-LIST
		// ---------------------------------------------------------------------------
		
		if(!isset($_SESSION['userList'])){
			$_SESSION['userList'] = '';	
		}
	
		if($_SERVER['HTTP_REFERER'] != URL_LOCALISED.'/index.php?header-menu=Consultants%20Practices'){
			$_SESSION['userList'] = '';	
		}
		
		
		echo '';
	
		if(isset($_POST['submit'])){
			
			if($_POST['submit'] == 'reset'){
				
				// USER-LIST RESET
				
				$_SESSION['userList'] = '';
				
			}else{
				
				// USER-LIST SET
				
				if(!isset($_SESSION['userList']) || $_SESSION['userList'] == ''){
					
					// ADD TO USER-LIST WITHOUT COMMA
					
					$_SESSION['userList'] = $_POST['submit'];
					
				}else{
					
					// REMOVE SAME POST-VALUE
					
					$flag = 0;
					
					$tempArray = explode(',', $_SESSION['userList']);
					
					for($i = 0; $i < count($tempArray); $i++){
						
						if($tempArray[$i] == $_POST['submit']){
							
							array_splice($tempArray, $i,  1);
							$flag = 1;
							break;
						}
					}
					
					// WRITE USER-LIST ADDING POST-VALUE
					
					if($flag == 0){
						$_SESSION['userList'] = $_SESSION['userList'].','.$_POST['submit'];
					}
					
					// WRITE USER-LIST REMOVING POST-VALUE
					
					if($flag == 1){
						$_SESSION['userList'] = implode(",", $tempArray);
					}
				}
				
				// GET PRACTICE LIST WORD CLOUD
				
				$result =  Practice::getLinked($_SESSION['userList']);
				$severList = $result;
				
			}
		}
	
	
		// ---------------------------------------------------------------------------
	
	
		function createButtons($renderStart, $renderEnd, $genericList, $severList, $userList){
			
			// CONVERT TO ARAY SERVER-LIST / USER-LIST
			
			if(isset($severList)){
				$severListArray = explode(',', $severList); 
			}
			 
			if(isset($userList)){
				$userListArray= explode(',', $userList); 
			}
			
			// DRAW BUTTONS
			
			for($render = $renderStart; $render <= $renderEnd; $render++ ){
				
				// GET BUTTON VALUES
				
				$name 	=  $genericList[$render-1]['name'];
				$id 	=  $genericList[$render-1]['id'];
				
				// SET BUTTON - ACTIVE - DISABLED - ALL SERVER-LIST ITEMS
				 
				if($severList == ''){
					
					// SET BUTTON - ACTIVE

					$string = '<p><button type="submit" value="'.$id.'" name="submit" class="button-text-primary button-text ">'.$name.'</button></p>';
					 
				}else{
					
					// SET BUTTON - DISABLED
					
			 		$string = '<p><button type="button" value="'.$id.'" name="null" class="button-text-disabled button-text ">'.$name.'</button></p>';
				}
				
				// SET BUTTON - ACTIVE - ALL SERVER-LIST ITEMS
				  
				if(isset($severList)){
			
					for($j = 0; $j < count($severListArray); $j++ ){
							
						if($id == $severListArray[$j]){
	
							$string =  '<p><button type="submit" value="'.$id.'" name="submit" class="button-text-primary button-text ">'.$name.'</button></p>';			
							break;
						}
					}	
				} 
				
				// SET BUTTON - SELECTED - ALL USER-LIST ITEMS
				
				if(isset($userList)){
	
					for( $j = 0; $j < count($userListArray); $j++ ){
						
						if($id == $userListArray[$j]){
							
							$string =  '<p><button type="submit" value="'.$id.'" name="submit" class="button-text-success button-text ">'.$name.'</button></p>';
							break;
						}
					}	
				} 
			
				echo  $string;
			}
		}
	
	
		// ---------------------------------------------------------------------------
		
		// GET AND STORE GENERIC PRACTICES
		
		$allPractices = new PracticeLinked(Practice::get('NULL'));
		$genericList = $allPractices->getAsArray();
		$userList = $_SESSION['userList'];
		
	
		// ---------------------------------------------------------------------------
	
	
		require_once (PATH_SERVER.'core/form-fields/fields-admin-practice-linked.php');
			
					
		// ----------------------------------------------------------------------------	
		
		// DISPLAY CONSULTANTS 
		
		//echo '$userList : '.$userList;
	
		if(isset($userList)){
			
			$result = ConsultantPractice::getByPractice($userList);
			DisplayConsultantPractices::small($result);

		}
		
		require_once (PATH_SERVER.'/web-templates/template-includes-javascript.php');
	
		echo '<script>';

			echo '$(\'[name="userList"]\').val("'.$_SESSION['userList'].'");';
			
		echo '</script>';
	}
}

?>
