<?php

//session_start(); //started in menu;
//session_unset(); 
//session_destroy(); 

error_reporting(E_ALL);

class ConsultantTeamPublic{

	public static function init($language, $brand) {
		
		require_once (dirname(dirname(__FILE__)) .'/config/paths.php');
		
		require_once (PATH_SERVER.'core/form-languages/language-'.$language.'.php');
		
		require_once (PATH_SERVER.'core/library/display/display-back-button.php');
		require_once (PATH_SERVER.'core/library/display/display-bio.php');
		require_once (PATH_SERVER.'core/library/display/display-consultant.php');
		require_once (PATH_SERVER.'core/library/display/display-consultant-practice.php');
		require_once (PATH_SERVER.'core/library/display/display-consultant-team.php');
		require_once (PATH_SERVER.'core/library/display/display-team.php');
		require_once (PATH_SERVER.'core/library/display/display-vars.php');
		
		require_once (PATH_SERVER.'core/library/procedures-public/bio/bio.php');
		require_once (PATH_SERVER.'core/library/procedures-public/consultant/consultant.php');
		require_once (PATH_SERVER.'core/library/procedures-public/consultant-practice/consultant-practice.php');
		require_once (PATH_SERVER.'core/library/procedures-public/team/team.php');
		require_once (PATH_SERVER.'core/library/session/session-variables.php');
	
		// ---------------------------------------------------------------------------
		// SET SESSION VARS BY GET
		// ---------------------------------------------------------------------------
		
		clearSessionIndex('menu', ['gallery', 'gallery-item']);
		
		setSessionWithGet('menu', 'gallery');
		setSessionWithGet('teamID', 1);
		setSessionWithGet('consultantID', NULL);
		
		$deleted = 0;

		// ---------------------------------------------------------------------------
		// DISPLAY : GENERATE ADMIN FORMS ACORDING TO MENU SELECTION
		// ---------------------------------------------------------------------------	
		
		if(isset($_SESSION['menu'])){
	
			if($_SESSION['menu'] == 'gallery-item'){
				
				
				echo '<div class="pure-g">
				
						<div class="pure-u-1-4">
							<p>';
	
								$result = Team::get('NULL');
								DisplayTeam::asScrollList($result, 'gallery');
	
				echo 		'</p>
						</div>
			
						<div class="pure-u-1-2">';
						
								DisplayBackButton::render('gallery');
						
								$result = Team::get($_SESSION['teamID']);
								DisplayTeam::asTitle($result);
								
								$result = Consultant::get($_SESSION['consultantID']);
								DisplayConsultant::asGalleryItem($result, $_SESSION['teamID'], 'gallery', $deleted);
								
				echo 	    '</p>
						</div>
						
					</div>';	
			}
			
			if($_SESSION['menu'] == 'gallery'){
				
				echo '<div class="pure-g">
				
						<div class="pure-u-1-4">
							<p>';

								$result = Team::get('NULL');
								DisplayTeam::asScrollList($result, 'gallery');

				echo 		'</p>
						</div>
			
						<div class="pure-u-1-2">';
						
								$getVars = '&brandID='.$_SESSION['teamID'].'&menu=gallery';
								DisplayBackButton::setURL('gallery', $getVars );

								$result = Team::get($_SESSION['teamID']);
								DisplayTeam::asTitle($result);
							
								$result = Consultant::getByTeam($_SESSION['teamID']);
								DisplayConsultantTeam::asGallery($result, 'gallery-item');
								
				echo 	    '</p>
						</div>
						
					</div>';	
			}
			
		}

		DisplayVars::show($_SESSION);
	}
}
?>
