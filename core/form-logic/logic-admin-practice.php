<?php

error_reporting(E_ALL);

class PracticeAdmin {

	public static function init() {
		
		require_once (dirname(dirname(__FILE__)) .'/config/paths.php');
		require_once (PATH_SERVER.'core/form-logic/logic-admin-ajax-control.php');
		require_once (PATH_SERVER.'core/library/display/display-menu.php');
		require_once (PATH_SERVER.'core/library/display/display-practice.php');
		require_once (PATH_SERVER.'core/library/display/display-update-form-fields.php');
		require_once (PATH_SERVER.'core/library/display/display-vars.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/practice/practice.php');
		
		require_once (PATH_SERVER.'core/library/session/session-variables.php');
		
		// ---------------------------------------------------------------------------
		// SET SESSION VARS BY GET
		// ---------------------------------------------------------------------------
		
		setSessionWithGet('menu', 'get');
		setSessionWithGet('practiceID', 1);
			
		// ---------------------------------------------------------------------------
		// DRAW HORIZONTAL MENU / ADD / GET / AMEND / DELETE
		// ---------------------------------------------------------------------------

		DisplayMenu::asHorizontalMenu('PRACTICE',['add','get','amend','delete']);	
		
		// ---------------------------------------------------------------------------
		// SUBMIT DATA TO DATABASE / ADD / AMEND / DELETE
		// ---------------------------------------------------------------------------
		
		if(Ajaxcontrol::deleteRow('practiceID', 'delete-practice', 'do-not-delete-practice')){
	
			Practice::delete($_POST['practiceID']);	
			$_POST['practiceID'] = null;
		}
		
		
		if(isset($_POST['submit'])){
			
			if($_POST['submit'] == 'add-practice'){
				
			 	Practice::add(	$_POST['practiceName']);
			}
		
			if($_POST['submit'] == 'amend-practice'){

				Practice::amend($_POST['practiceID'],
								$_POST['practiceName']);
			}
		}
	
		// DISPLAY : GENERATE ADMIN FORMS ACORDING TO MENU SELECTION
		
		$result = Practice::get('NULL');
		
		// ---------------------------------------------------------------------------	
		
		if(isset($_SESSION['menu'])){
			
			// ---------------------------------------------------------------------------
			// GET
		
			if($_SESSION['menu'] == 'get'){
				
				echo '<div class="pure-g">
    					<div class="pure-u-1-2">
							<p>'; 
								DisplayPractice::asScrollList($result);
				echo 	    '</p>
						</div>
				
						<div class="pure-u-1-2">
							<p>';
								$result = Practice::get($_SESSION['practiceID']);
								DisplayPractice::asTextList($result);
							
				echo		'</p>
						</div>
					</div>';	
			}
			
			// ---------------------------------------------------------------------------	
			// ADD
			
			if($_SESSION['menu'] == 'add'){
				
				echo '<div class="pure-g">
    					<div class="pure-u-1-2">
							<p>'; 
								require_once (PATH_SERVER.'core/form-fields/fields-admin-practice-add.php');
				echo 	    '</p>
						</div>
				
						<div class="pure-u-1-2">
							<p>
							</p>
						</div>
					</div>';	
			}
			
			// ---------------------------------------------------------------------------	
			// AMEND
			
			if($_SESSION['menu'] == 'amend'){
				
				echo '<div class="pure-g">
						<div class="pure-u-1-2">
							<p>';
								DisplayPractice::asScrollList($result);
				echo 	    '</p>
						</div>
						
						<div class="pure-u-1-2">
							<p>';
								require_once (PATH_SERVER.'core/form-fields/fields-admin-practice-amend.php');
				echo 		'</p>
						</div>
					</div>';			
			}
			
			// ---------------------------------------------------------------------------	
			// DELETE
			
			if($_SESSION['menu'] == 'delete'){
				
				echo '<div class="pure-g">
						<div class="pure-u-1-2">
							<p>';
								DisplayPractice::asScrollList($result);
				echo 	    '</p>
						</div>
						
						<div class="pure-u-1-2">
							<p>';
								require_once (PATH_SERVER.'core/form-fields/fields-admin-practice-delete.php');
				echo 		'</p>
						</div>
					</div>';			
			}
	
		}
	
		// ----------------------------------------------------------------------------	
		// POST DATA : ADD OFFICE DATA RESULT
		
		if(isset($_SESSION['practiceID'])){
			
			$practice = Practice::get($_SESSION['practiceID']);	
			
			if(!empty($practice)){
			
				foreach ($practice as $currentRow){
					
					$_POST['practiceID'] 			= $currentRow['practice_id'];
					$_POST['practiceName'] 			= $currentRow['practice_name'];
				}
			}
		}
		
		// DISPLAY : WRITE POST VARS INTO FORMS
		
		if($_SESSION['menu'] == 'add'){
				$_POST = array();
		}

		require_once (PATH_SERVER.'/web-templates/template-includes-javascript.php');
				if($_SESSION['menu'] == 'delete'){
			
			?>
            
			<script 	src="<?php echo PATH_BASE?>/js/jquery-dialoge-confirm/dialoge-confirm.js"></script>
            
            <?PHP
		}
		
		
		DisplayVars::show($_POST);
		DisplayVars::show($_SESSION);

		DisplayUpdateTextFields::update($_POST);
	}
}

?>
