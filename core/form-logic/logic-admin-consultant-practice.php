<?php

//session_start(); started in menu;
//session_unset(); 
//session_destroy(); 

error_reporting(E_ALL);

class ConsultantPracticeAdmin {

	public static function init() {
		
		require_once (dirname(dirname(__FILE__)) .'/config/paths.php');
		
		require_once (PATH_SERVER.'core/library/display/display-consultant.php');
		require_once (PATH_SERVER.'core/library/display/display-consultant-practice.php');
		require_once (PATH_SERVER.'core/library/display/display-menu.php');
		require_once (PATH_SERVER.'core/library/display/display-practice.php');
		require_once (PATH_SERVER.'core/library/display/display-update-form-fields.php');
		require_once (PATH_SERVER.'core/library/display/display-vars.php');
		
		require_once (PATH_SERVER.'core/library/procedures-admin/consultant/consultant.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/consultant-practice/consultant-practice.php');	
		require_once (PATH_SERVER.'core/library/procedures-admin/practice/practice.php');
		
		require_once (PATH_SERVER.'core/library/session/session-variables.php');
		
		// ---------------------------------------------------------------------------
		// SET SESSION VARS BY GET
		// ---------------------------------------------------------------------------
		
		setSessionWithGet('menu', 'add');
		setSessionWithGet('consultantID', 1);
		
		if($_SESSION['menu'] == 'undelete'){
				
				$_SESSION['consultantPracticeDeleted'] = 1;
				
			}else{
		
				$_SESSION['consultantPracticeDeleted'] = 0;
		}
		
		// ---------------------------------------------------------------------------
		// DRAW HORIZONTAL MENU : ADD / SEARCH / GET / AMEND / DELETE / UNDELETE
		// ---------------------------------------------------------------------------
		
		DisplayMenu::asHorizontalMenu('CONSULTANT PRACTICE',['add','amend','delete','undelete']);
	

		// ---------------------------------------------------------------------------
		// SUBMIT DATA TO DATABASE / ADD / AMEND / DELETE
		// ---------------------------------------------------------------------------
		
		if(isset($_POST['submit'])){
			
			if($_POST['submit'] == 'add-consultant-practice'){

				$consultantID 	= $_SESSION['consultantID'];
				$practiceID 		= ($_POST['practiceID1']  	== 0 )? 'NULL': $_POST['practiceID1'];
				$practiceRank 	= ($_POST['practiceRank1'] 	== 0 )? 'NULL': $_POST['practiceRank1'];
				
				
				if($practiceID  != 'NULL' AND $practiceRank != 'NULL'){
					
					ConsultantPractice::add($consultantID, $practiceID, $practiceRank);
				}
			}
			
			if($_POST['submit'] == 'amend-consultant-practice'){
				
				for($i = 1; $i <= 8 ; $i++){

					if(isset($_POST['consultantPracticeID'.$i])){
						
						$consultantPracticeID 	= $_POST['consultantPracticeID'.$i];
						$practiceID 			= $_POST['practiceID'.$i];
						$practiceRank 			= ($_POST['practiceRank'.$i] == 0 )? 'NULL': $_POST['practiceRank'.$i];
						
						ConsultantPractice::amend($consultantPracticeID, $practiceID, $practiceRank);
					}
				}
			}
			
			if($_POST['submit'] == 'delete-consultant-practice'){
	
				for($i = 1; $i <= 8 ; $i++){

					if(isset($_POST['consultantPracticeID'.$i])){
						
						$consultantPracticeID = $_POST['consultantPracticeID'.$i];
						ConsultantPractice::delete($consultantPracticeID);
					}
				}
			}
			
			if($_POST['submit'] == 'undelete-consultant-practice'){
	
				for($i = 1; $i <= 8 ; $i++){

					if(isset($_POST['consultantPracticeID'.$i])){
						
						$consultantPracticeID = $_POST['consultantPracticeID'.$i];
						ConsultantPractice::undelete($consultantPracticeID);
					}
				}
			}
		}
		
		// DISPLAY : GENERATE ADMIN FORMS ACORDING TO MENU SELECTION
		
		// ---------------------------------------------------------------------------	
		
		if(isset($_SESSION['menu'])){
	
			// ---------------------------------------------------------------------------	

			if($_SESSION['menu'] == 'add'){
				
				echo '<div class="pure-g">
						<div class="pure-u-1-2">
							<p>';
								$result = Consultant::get('NULL');
								DisplayConsultant::asScrollList($result, 'add');
				echo 	    '</p>
						</div>
						
						<div class="pure-u-1-2">
							<p>';
							
								$max1 = ConsultantPractice::getByConsultantRowCount($_SESSION['consultantID'],0);
								$max2 = ConsultantPractice::getByConsultantRowCount($_SESSION['consultantID'],1);
								$max3 = $max1 + $max2;
								
								$result = Consultant::get($_SESSION['consultantID']);
								DisplayConsultant::asTitle($result);
								
								$result = ConsultantPractice::getByConsultant($_SESSION['consultantID'], $_SESSION['consultantPracticeDeleted']);
								DisplayConsultantPractices::asList($result);
								
								if($max3 < 8){

									require_once(PATH_SERVER.'core/form-fields/fields-admin-consultant-practice-add.php');
									
								}else{
									
									echo 'A Maximum of 8 Practices has been reached';
								}
				echo 		'</p>
						</div>
					</div>';	
			}
			
			// ---------------------------------------------------------------------------	
			
			if($_SESSION['menu'] == 'amend'){
	
				echo '<div class="pure-g">
						<div class="pure-u-1-2">
							<p>';
								$result = Consultant::get('NULL');
								DisplayConsultant::asScrollList($result, 'amend');
				echo 	    '</p>
						</div>
						
						<div class="pure-u-1-2">
							<p>';
								$result = Consultant::get($_SESSION['consultantID']);
								DisplayConsultant::asTitle($result);
								
								$result = ConsultantPractice::getByConsultant($_SESSION['consultantID'], $_SESSION['consultantPracticeDeleted']);
								DisplayConsultantPractices::asList($result);
								
								require_once(PATH_SERVER.'core/form-fields/fields-admin-consultant-practice-amend.php');
				echo 		'</p>
						</div>
					</div>';			
			}
			
			// ---------------------------------------------------------------------------	
			
			if($_SESSION['menu'] == 'delete'){
				
				echo '<div class="pure-g">
						<div class="pure-u-1-2">
							<p>';
								$result = Consultant::get('NULL');
								DisplayConsultant::asScrollList($result, 'delete');
				echo 	    '</p>
						</div>
						
						<div class="pure-u-1-2">
							<p>';
								$result = Consultant::get($_SESSION['consultantID']);
								DisplayConsultant::asTitle($result);
								
								$result = ConsultantPractice::getByConsultant($_SESSION['consultantID'], $_SESSION['consultantPracticeDeleted']);
								DisplayConsultantPractices::asList($result);
								
								require_once(PATH_SERVER.'core/form-fields/fields-admin-consultant-practice-delete.php');
				echo 		'</p>
						</div>
					</div>';			
			}
			
			if($_SESSION['menu'] == 'undelete'){
				
				echo '<div class="pure-g">
						<div class="pure-u-1-2">
							<p>';
								$result = Consultant::get('NULL');
								DisplayConsultant::asScrollList($result, 'delete');
				echo 	    '</p>
						</div>
						
						<div class="pure-u-1-2">
							<p>';
								$result = Consultant::get($_SESSION['consultantID']);
								DisplayConsultant::asTitle($result);
								
								$result = ConsultantPractice::getByConsultant($_SESSION['consultantID'], $_SESSION['consultantPracticeDeleted']);
								DisplayConsultantPractices::asList($result);
								
								require_once(PATH_SERVER.'core/form-fields/fields-admin-consultant-practice-undelete.php');
				echo 		'</p>
						</div>
					</div>';			
			}
		}

		// ----------------------------------------------------------------------------	
		// POST DATA : ADD CONSULTANT DATA RESULT TO POST
		
		if(isset($_SESSION['consultantID'])){
			
			$practice = ConsultantPractice::getByConsultant($_SESSION['consultantID'], 	$_SESSION['consultantPracticeDeleted']);
	
			for($i = 1; $i <= 8 ; $i ++){ 
			
				$_POST['practiceID'.$i]	= 0;
			}

			if(!empty($practice)){
				
				$i = 1;

				foreach ($practice as $currentRow){
					
					$_POST['practiceID'.$i]					= $currentRow['practice_id'];
					$_POST['practiceRank'.$i]				= (empty($currentRow['practice_rank'])) ? 1: $currentRow['practice_rank'];
					$_POST['consultantPracticeID'.$i]		= $currentRow['consultant_practice_id'];
					
					$i++;
				}
			}
		}
		
		require_once (PATH_SERVER.'/web-templates/template-includes-javascript.php');
	
		if(	$_SESSION['menu'] == 'add'){
			$_POST = array();
		}
		
		DisplayVars::show($_POST);
		DisplayUpdateTextFields::update($_POST);
	}
}
?>
