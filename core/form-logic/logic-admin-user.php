<?php

error_reporting(E_ALL);

class UserAdmin {

	public static function init() {
		
		require_once (dirname(dirname(__FILE__)) .'/config/paths.php');
		require_once (PATH_SERVER.'core/form-logic/logic-admin-ajax-control.php');
		require_once (PATH_SERVER.'core/library/display/display-brand.php');
		require_once (PATH_SERVER.'core/library/display/display-menu.php');
		require_once (PATH_SERVER.'core/library/display/display-user.php');
		require_once (PATH_SERVER.'core/library/display/display-update-form-fields.php');
		require_once (PATH_SERVER.'core/library/display/display-vars.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/brand/brand.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/user/user.php');
		require_once (PATH_SERVER.'core/library/session/session-variables.php');
		
		// ---------------------------------------------------------------------------
		// SET GET AND POST VARS
		// ---------------------------------------------------------------------------
		
		setSessionWithGet('menu', 'get');
		setSessionWithGet('userID', 1);
		
		// ---------------------------------------------------------------------------
		// DRAW HORIZONTAL MENU / ADD / GET / AMEND / DELETE
		// ---------------------------------------------------------------------------

		DisplayMenu::asHorizontalMenu('USER',['add','get','amend','delete']);	
	
		// ---------------------------------------------------------------------------
		// SUBMIT DATA TO DATABASE / ADD / AMEND / DELETE
		// ---------------------------------------------------------------------------
		
				
		if(Ajaxcontrol::deleteRow('userID', 'delete-user', 'do-not-delete-user')){
	
			User::delete($_POST['userID']);	
			$_POST['userID'] = null;
		}
		
		
		if(isset($_POST['submit'])){
			
			if($_POST['submit'] == 'add-user'){
				
			 	User::add(	$_POST['userName'],
							$_POST['userFirstName'], 
							$_POST['userLastName'],
							$_POST['userEmail'],
							$_POST['userActiveDirectory'],
							$_POST['userAdmin'],
							$_POST['brandID']);
				
			}
		
			if($_POST['submit'] == 'amend-user'){
			
				 User::amend(	$_POST['userID'],
				 				$_POST['userName'],
								$_POST['userFirstName'], 
								$_POST['userLastName'],
								$_POST['userEmail'],
								$_POST['userActiveDirectory'],
								$_POST['userAdmin'],
								$_POST['brandID']);
			}
		}
		
		// DISPLAY : GENERATE ADMIN FORMS ACORDING TO MENU SELECTION
		
		$result = User::get('NULL','NULL');
		
		// ---------------------------------------------------------------------------	
		
		if(isset($_SESSION['menu'])){
			
			// ---------------------------------------------------------------------------

			if($_SESSION['menu'] == 'get'){
				
				echo '<div class="pure-g">
    					<div class="pure-u-1-2">
							<p>'; 
								DisplayUser::asScrollList($result);
				echo 	    '</p>
						</div>
				
						<div class="pure-u-1-2">
							<p>';
					
							$result = User::get($_SESSION['userID'], 'NULL');
	
							DisplayUser::asTextList($result);
							
				echo		'</p>
						</div>
					</div>';	
			}
			
			// ---------------------------------------------------------------------------	
			
			if($_SESSION['menu'] == 'add'){
				
				echo '<div class="pure-g">
    					<div class="pure-u-1-2">
							<p>'; 
								require_once (PATH_SERVER.'core/form-fields/fields-admin-user-add.php');
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
								DisplayUser::asScrollList($result);
				echo 	    '</p>
						</div>
						
						<div class="pure-u-1-2">
							<p>';
								require_once (PATH_SERVER.'core/form-fields/fields-admin-user-amend.php');
				echo 		'</p>
						</div>
					</div>';			
			}
			
			// ---------------------------------------------------------------------------	
			
			if($_SESSION['menu'] == 'delete'){
				
				echo '<div class="pure-g">
						<div class="pure-u-1-2">
							<p>';
								DisplayUser::asScrollList($result);
				echo 	    '</p>
						</div>
						
						<div class="pure-u-1-2">
							<p>';
								require_once (PATH_SERVER.'core/form-fields/fields-admin-user-delete.php');
				echo 		'</p>
						</div>
					</div>';			
			}
	
		}
		
		// ----------------------------------------------------------------------------	
		// POST DATA : ADD OFFICE DATA RESULT
		
		if(isset($_SESSION['userID'])){
			
			$user = User::get($_SESSION['userID'], 'NULL');	
			
			if(!empty($user)){
			
				foreach ($user as $currentRow){

					$_POST['userID'] 				= $currentRow['user_id'];
					$_POST['userName'] 				= $currentRow['user_name'];
					$_POST['userFirstName']			= $currentRow['user_first_name']; 
					$_POST['userLastName']			= $currentRow['user_last_name'];
					$_POST['userEmail']				= $currentRow['user_email'];
					$_POST['userActiveDirectory'] 	= $currentRow['user_active_directory'];
					$_POST['userAdmin'] 				= $currentRow['user_admin'];
					$_POST['brandID'] 				= $currentRow['brand_id'];
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
