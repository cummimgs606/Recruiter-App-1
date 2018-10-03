<?php

error_reporting(E_ALL);

class TeamAdmin {

	public static function init() {
		
		require_once (dirname(dirname(__FILE__)) .'/config/paths.php');
		require_once (PATH_SERVER.'core/form-logic/logic-admin-ajax-control.php');
		require_once (PATH_SERVER.'core/library/display/display-brand.php');
		require_once (PATH_SERVER.'core/library/display/display-menu.php');
		require_once (PATH_SERVER.'core/library/display/display-table.php');
		require_once (PATH_SERVER.'core/library/display/display-team.php');
		require_once (PATH_SERVER.'core/library/display/display-update-form-fields.php');
		require_once (PATH_SERVER.'core/library/display/display-vars.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/brand/brand.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/team/team.php');
		
		require_once (PATH_SERVER.'core/library/session/session-variables.php');
		
		// ---------------------------------------------------------------------------
		// SET SESSION VARS BY GET
		// ---------------------------------------------------------------------------
		
		setSessionWithGet('menu', 'get');
		setSessionWithGet('teamID', 1);
				
		// ---------------------------------------------------------------------------
		// DRAW HORIZONTAL MENU / ADD / GET / AMEND / DELETE
		// ---------------------------------------------------------------------------

		DisplayMenu::asHorizontalMenu('TEAM',['add','get','amend','delete']);	
		
		// ---------------------------------------------------------------------------
		// SUBMIT DATA TO DATABASE / ADD / AMEND / DELETE
		// ---------------------------------------------------------------------------
		
		
		if(Ajaxcontrol::deleteRow('teamID', 'delete-team', 'do-not-delete-team')){
	
			Team::delete($_POST['teamID']);	
			$_POST['teamID'] = null;
		}
		
		
		if(isset($_POST['submit'])){
			
			//echo '$_POST[submit] : '.$_POST['submit'];
			
			if($_POST['submit'] == 'add-team'){

			 	Team::add(	$_POST['teamName'],
							$_POST['teamDescription'],
							$_POST['brandID'] == 0 ? 'NULL' : $_POST['brandID']);
			}
		
			if($_POST['submit'] == 'amend-team'){
				
				Team::amend($_POST['teamID'],
							$_POST['teamName'],
							$_POST['teamDescription'],
							$_POST['brandID']);
				
			}
		}
		
		// DISPLAY : GENERATE ADMIN FORMS ACORDING TO MENU SELECTION
		
		$result = Team::get('NULL');
		
		//DisplayTable::show($result );
		
		// ---------------------------------------------------------------------------	
		
		if(isset($_SESSION['menu'])){
			
			// ---------------------------------------------------------------------------
		
			if($_SESSION['menu'] == 'get'){
				
				echo '<div class="pure-g">
    					<div class="pure-u-1-3">
							<p>'; 
								DisplayTeam::asScrollList($result, $_SESSION['menu']);
				echo 	    '</p>
						</div>
				
						<div class="pure-u-1-2">
							<p>';
								$result = Team::get($_SESSION['teamID']);
								DisplayTeam::asTextList($result, $_SESSION['menu']);
				echo		'</p>
						</div>
					</div>';	
			}
			
			// ---------------------------------------------------------------------------	
			
			if($_SESSION['menu'] == 'add'){
				
				echo '<div class="pure-g">
    					<div class="pure-u-1-2">
							<p>'; 
								require_once (PATH_SERVER.'core/form-fields/fields-admin-team-add.php');
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
						<div class="pure-u-1-3">
							<p>';
								DisplayTeam::asScrollList($result, $_SESSION['menu']);
				echo 	    '</p>
						</div>
						
						<div class="pure-u-1-2">
							<p>';
								require_once (PATH_SERVER.'core/form-fields/fields-admin-team-amend.php');
				echo 		'</p>
						</div>
					</div>';			
			}
			
			// ---------------------------------------------------------------------------	
	
			if($_SESSION['menu'] == 'delete'){
				
				echo '<div class="pure-g">
						<div class="pure-u-1-3">
							<p>';
								DisplayTeam::asScrollList($result, $_SESSION['menu']);
				echo 	    '</p>
						</div>
						
						<div class="pure-u-1-2">
							<p>';
								require_once (PATH_SERVER.'core/form-fields/fields-admin-team-delete.php');
				echo 		'</p>
						</div>
					</div>';			
			}
		}
	
		// ----------------------------------------------------------------------------	
		// POST DATA : ADD OFFICE DATA RESULT
		
		if(isset($_SESSION['teamID'])){
			
			$team = Team::get($_SESSION['teamID']);	
			
			if(!empty($team)){
			
				foreach ($team as $currentRow){
					
					$_POST['teamID'] 			= $currentRow['team_id'];
					$_POST['teamName'] 			= $currentRow['team_name'];
					$_POST['teamDescription'] 	= $currentRow['team_description'];
					$_POST['brandID'] 			= $currentRow['brand_id'];
					
					
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
