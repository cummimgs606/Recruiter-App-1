<?php

//session_start(); started in menu;
//session_unset(); 
//session_destroy(); 

error_reporting(E_ALL);

class TeamConsultantAdmin{

	public static function init() {
		
		require_once (dirname(dirname(__FILE__)) .'/config/paths.php');
		require_once (PATH_SERVER.'core/library/display/display-consultant.php');
		require_once (PATH_SERVER.'core/library/display/display-menu.php');
		require_once (PATH_SERVER.'core/library/display/display-team.php');
		require_once (PATH_SERVER.'core/library/display/display-team-consultant.php');
		require_once (PATH_SERVER.'core/library/display/display-update-form-fields.php');
		require_once (PATH_SERVER.'core/library/display/display-vars.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/consultant/consultant.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/consultant-practice/consultant-practice.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/team/team.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/team-consultant/team-consultant.php');
		
		require_once (PATH_SERVER.'core/library/session/session-variables.php');
		
		// ---------------------------------------------------------------------------
		// SET SESSION VARS BY GET
		// ---------------------------------------------------------------------------
		
		setSessionWithGet('menu', 'amend');
		setSessionWithGet('teamID', 1);
		setSessionWithGet('consultantID', 1);
		
		// ---------------------------------------------------------------------------
		// DRAW HORIZONTAL MENU : ADD / SEARCH / GET / AMEND / DELETE / UNDELETE
		// ---------------------------------------------------------------------------
		
		DisplayMenu::asHorizontalMenu('TEAM CONSULTANT',['amend']);
	
		// ---------------------------------------------------------------------------
		// SUBMIT DATA TO DATABASE / ADD / AMEND / DELETE
		// ---------------------------------------------------------------------------
		
		
		if(isset($_SESSION['menu'])){
			
			if($_SESSION['menu'] == 'add-team-consultant'){
	
				TeamConsultant::add($_SESSION['consultantID'], $_SESSION['teamID']);
			}
			
			if($_SESSION['menu'] == 'delete-team-consultant'){
	
				TeamConsultant::delete($_SESSION['consultantID'], $_SESSION['teamID']);
			}
			
			if($_SESSION['menu'] == 'delete-all-team-consultant'){
	
				TeamConsultant::delete($_SESSION['consultantID'] , 'NULL');
			}
			
			$_SESSION['menu'] = 'amend';
		}
		
		// DISPLAY : GENERATE ADMIN FORMS ACORDING TO MENU SELECTION
		
		// ---------------------------------------------------------------------------	
		
		if(isset($_SESSION['menu'])){
	
			if($_SESSION['menu'] == 'amend'){
				
				echo '<div class="pure-g">
				
						<div class="pure-u-1-4">
							<p>';
							
								$result = Team::get($_SESSION['teamID']);
								DisplayTeam::asTitle($result,'Add');
	
								$result = Team::get('NULL');
								DisplayTeam::asScrollList($result, 'amend');
	
				echo 		'</p>
						</div>
			
						<div class="pure-u-1-4">
							<p> <h3>Delete</h3>';
							
								$result = TeamConsultant::getConsultant($_SESSION['teamID'],0);
								DisplayTeamConsultant::asScrollList($result, 'delete-team-consultant');
								
				echo 	    '</p>
						</div>
						
						<div class="pure-u-1-4">
							<p> <h3>Add</h3>';
							
								$result = Consultant::get('NULL');
								DisplayConsultant::asScrollList($result, 'add-team-consultant');
								
				echo 		'</p>
						</div>
						<!--
						<div class="pure-u-1-4">
							<p> <h3>Undelete</h3>';
							
								$result = TeamConsultant::getConsultant($_SESSION['teamID'], 1);
								DisplayTeamConsultant::asScrollList($result, 'undelete-team-consultant');
								
				echo 		'</p>
						</div>
						--->
						
						<!---
						<div class="pure-u-1-4">
							<p> <h3>Delete All </h3>';
							
								$result = Consultant::get('NULL');
								DisplayTeamConsultant::asScrollList($result, 'delete-all-team-consultant');
								
				echo 		'</p>
						</div>
						--->
					</div>';	
			}
			
		}

		// ----------------------------------------------------------------------------	
		// POST DATA : ADD CONSULTANT DATA RESULT TO POST
		
		require_once (PATH_SERVER.'/web-templates/template-includes-javascript.php');
	
		if(	$_SESSION['menu'] == 'add'){
			$_POST = array();
		}
		
		
		DisplayUpdateTextFields::update($_POST);
	}
}
?>
