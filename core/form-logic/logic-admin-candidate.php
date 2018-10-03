<?php

error_reporting(E_ALL);

class CandidateAdmin {

	public static function init() {
		
		require_once (dirname(dirname(__FILE__)) .'/config/paths.php');
		require_once (PATH_SERVER.'core/form-logic/logic-admin-ajax-control.php');
		require_once (PATH_SERVER.'core/library/display/display-candidate.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/candidate/candidate.php');
		
		require_once (PATH_SERVER.'core/library/display/display-brand.php');
		require_once (PATH_SERVER.'core/library/display/display-country.php');
		require_once (PATH_SERVER.'core/library/display/display-menu.php');
		require_once (PATH_SERVER.'core/library/display/display-update-form-fields.php');
		require_once (PATH_SERVER.'core/library/display/display-vars.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/country/country.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/brand/brand.php');
		require_once (PATH_SERVER.'core/library/session/session-variables.php');
		
		// ---------------------------------------------------------------------------
		// SET SESSION VARS BY GET
		// ---------------------------------------------------------------------------
		
		setSessionWithGet('menu', 'get');
		setSessionWithGet('candidateID', 1);
		
		// ---------------------------------------------------------------------------
		// DRAW HORIZONTAL MENU / ADD / GET / AMEND / DELETE
		// ---------------------------------------------------------------------------

		DisplayMenu::asHorizontalMenu('CANDIDATE',['get','delete']);		
	
		// ---------------------------------------------------------------------------
		// SUBMIT DATA TO DATABASE / ADD / AMEND / DELETE
		// ---------------------------------------------------------------------------
		
		if(Ajaxcontrol::deleteRow('candidateID', 'delete-candidate', 'do-not-delete-candidate')){
				
			Candidate::delete($_POST['candidateID']);	
				
			$_POST['candidateID'] = null;	
		}
		
		
		/*
		if(isset($_POST['submit'])){
			
			if($_POST['submit'] == 'add-brand'){
				
			 	Brand::add(		$_POST['brandName'], 
								$_POST['brandDescription'], 
								$_POST['countryID']);
			}
		
			if($_POST['submit'] == 'amend-brand'){

				Brand::amend(	$_POST['brandID'],
								$_POST['brandName'],
								$_POST['brandDescription'],
								$_POST['countryID']);
			}
		}
		*/
		
		// DISPLAY : GENERATE ADMIN FORMS ACORDING TO MENU SELECTION
			
		if(isset($_SESSION['menu'])){
			
			// ---------------------------------------------------------------------------
			
			if($_SESSION['menu'] == 'get'){
				
				echo '<div class="pure-g">
    					<div class="pure-u-1-2">
							<p>';
								$result = Candidate::get('NULL');
								DisplayCandidate::asScrollList($result, $_SESSION['menu']);
				echo 	    '</p>
						</div>
				
						<div class="pure-u-1-2">
							<p>';
								$result = Candidate::get($_SESSION['candidateID']);
								DisplayCandidate::asTextList($result);
				echo		'</p>
						</div>
					</div>';	
			}
			
			// ---------------------------------------------------------------------------	
			
			/*
			if($_SESSION['menu'] == 'add'){
				
				echo '<div class="pure-g">
    					<div class="pure-u-1-2">
							<p>'; 
								require_once (PATH_SERVER.'core/form-fields/fields-admin-brand-add.php');
				echo 	    '</p>
						</div>
				
						<div class="pure-u-1-2">
							<p>
							</p>
						</div>
					</div>';	
			}
			*/
			
			// ---------------------------------------------------------------------------	
			
			/*
			if($_SESSION['menu'] == 'amend'){
				
				echo '<div class="pure-g">
						<div class="pure-u-1-2">
							<p>';
								$result = Brand::get('NULL');
								DisplayBrand::asScrollList($result, $_SESSION['menu']);
				echo 	    '</p>
						</div>
						
						<div class="pure-u-1-2">
							<p>';
								require_once (PATH_SERVER.'core/form-fields/fields-admin-brand-amend.php');
				echo 		'</p>
						</div>
					</div>';			
			}
			*/
			
			// ---------------------------------------------------------------------------	
			
			if($_SESSION['menu'] == 'delete'){
				
				echo '<div class="pure-g">
						<div class="pure-u-1-2">
							<p>';
								$result = Candidate::get('NULL');
								DisplayCandidate::asScrollList($result, $_SESSION['menu']);
				echo 	    '</p>
						</div>
						
						<div class="pure-u-1-2">
							<p>';
								require_once (PATH_SERVER.'core/form-fields/fields-admin-candidate-delete.php');
				echo 		'</p>
						</div>
					</div>';			
			}
	
		}
	
		// ----------------------------------------------------------------------------	
		// POST DATA : ADD OFFICE DATA RESULT
		
		if(isset($_SESSION['candidateID'])){
			
			$candidate = Candidate::get($_SESSION['candidateID']);	
			
			if(!empty($candidate)){
			
				foreach ($candidate as $currentRow){
					
					$_POST['candidateID'] 				= $currentRow['candidate_id'];;
					$_POST['candidateFirstName'] 		= $currentRow['candidate_first_name'];
					$_POST['candidateMiddleName'] 		= $currentRow['candidate_middle_name'];
					$_POST['candidateLastName'] 			= $currentRow['candidate_last_name'];
				}
			}
		}
		
		// DISPLAY : WRITE POST VARS INTO FORMS
		
		/*
		if($_SESSION['menu'] == 'add'){
				$_POST = array();
		}
		*/
		
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
