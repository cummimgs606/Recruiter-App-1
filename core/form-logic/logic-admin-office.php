<?php
   
error_reporting(E_ALL);

class OfficeAdmin {

	public static function init() {
		
		require_once (dirname(dirname(__FILE__)) .'/config/paths.php');
		require_once (PATH_SERVER.'core/form-logic/logic-admin-ajax-control.php');
		require_once (PATH_SERVER.'core/library/display/display-country.php');
		require_once (PATH_SERVER.'core/library/display/display-menu.php');
		require_once (PATH_SERVER.'core/library/display/display-office.php');
		require_once (PATH_SERVER.'core/library/display/display-update-form-fields.php');
		require_once (PATH_SERVER.'core/library/display/display-vars.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/country/country.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/office/office.php');
		require_once (PATH_SERVER.'core/library/session/session-variables.php');
		
		// ---------------------------------------------------------------------------
		// SET GET AND POST VARS
		// ---------------------------------------------------------------------------
		
		setSessionWithGet('menu', 'get');
		setSessionWithGet('officeID', 1);
				
		// ---------------------------------------------------------------------------
		// DRAW HORIZONTAL MENU / ADD / GET / AMEND / DELETE
		// ---------------------------------------------------------------------------

		DisplayMenu::asHorizontalMenu('OFFICE',['add','get','amend','delete']);		
		
		// ---------------------------------------------------------------------------
		// SUBMIT DATA TO DATABASE / ADD / AMEND / DELETE
		// ---------------------------------------------------------------------------
		
		
		if(Ajaxcontrol::deleteRow('officeID', 'delete-office', 'do-not-delete-office')){
	
			Office::delete($_POST['officeID']);	
			$_POST['officeID'] = null;
		}
		
		
		if(isset($_POST['submit'])){
			
			if($_POST['submit'] == 'add-office'){
	
			 	Office::add(		$_POST['officeName'],
								$_POST['officeAddress1'],
								$_POST['officeAddress2'],
								$_POST['officeAddress3'],
								$_POST['officeAddress4'],
								$_POST['officePostalCode'],
								$_POST['officeTelephone'],
								$_POST['countryID']);
			}
		
			if($_POST['submit'] == 'amend-office'){
			
				Office::amend(	$_POST['officeID'],
			 					$_POST['officeName'],
								$_POST['officeAddress1'],
								$_POST['officeAddress2'],
								$_POST['officeAddress3'],
								$_POST['officeAddress4'],
								$_POST['officePostalCode'],
								$_POST['officeTelephone'],
								$_POST['countryID']);
				
			}
		}

		// DISPLAY : GENERATE ADMIN FORMS ACORDING TO MENU SELECTION
		
		$result = Office::get('NULL');
		
		// ---------------------------------------------------------------------------	
		
		if(isset($_SESSION['menu'])){
			
			// ---------------------------------------------------------------------------
			
			if($_SESSION['menu'] == 'get'){
				
				echo '<div class="pure-g">
    					<div class="pure-u-1-2">
							<p>'; 
								DisplayOffice::asScrollList($result, $_SESSION['menu']);
				echo 	    '</p>
						</div>
				
						<div class="pure-u-1-2">
							<p>';
								$result = Office::get($_SESSION['officeID']);
								DisplayOffice::asTextList($result, false, 'get');
							
				echo		'</p>
						</div>
					</div>';	
			}
			
			// ---------------------------------------------------------------------------	
			
			if($_SESSION['menu'] == 'add'){
				
				echo '<div class="pure-g">
    					<div class="pure-u-1-2">
							<p>'; 
								require_once (PATH_SERVER.'core/form-fields/fields-admin-office-add.php');
				echo 	    '</p>
						</div>
				
						<div class="pure-u-1-2">
							<p>
							</p>
						</div>
					</div>';	
			}
			
			// ---------------------------------------------------------------------------	
			
			if($_SESSION['menu'] == 'amend'){
				
				echo '<div class="pure-g">
						<div class="pure-u-1-2">
							<p>';
								DisplayOffice::asScrollList($result, $_SESSION['menu']);
				echo 	    '</p>
						</div>
						
						<div class="pure-u-1-2">
							<p>';
								require_once (PATH_SERVER.'core/form-fields/fields-admin-office-amend.php');
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
								DisplayOffice::asScrollList($result, $_SESSION['menu']);
				echo 	    '</p>
						</div>
						
						<div class="pure-u-1-2">
							<p>';
								require_once (PATH_SERVER.'core/form-fields/fields-admin-office-delete.php');
				echo 		'</p>
						</div>
					</div>';			
			}
		}
	
		// ----------------------------------------------------------------------------	
		// POST DATA : ADD OFFICE DATA RESULT
		
		if(isset($_SESSION['officeID'])){
			
			$office = Office::get($_SESSION['officeID']);	
			
			if(!empty($office)){
			
				foreach ($office as $currentRow){
					
					$_POST['officeID'] 			= $currentRow['office_id'];
					$_POST['officeName'] 		= $currentRow['office_name'];
					$_POST['officeAddress1'] 	= $currentRow['office_address1'];
					$_POST['officeAddress2'] 	= $currentRow['office_address2'];
					$_POST['officeAddress3'] 	= $currentRow['office_address3'];
					$_POST['officeAddress4'] 	= $currentRow['office_address4'];
					$_POST['officePostalCode'] 	= $currentRow['office_postal_code'];
					$_POST['officeTelephone'] 	= $currentRow['office_telephone'];
					$_POST['countryID'] 			= $currentRow['country_id'];
					
					
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
