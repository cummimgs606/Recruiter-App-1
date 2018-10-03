<?php

//session_start(); started in menu;
//session_unset(); 
//session_destroy(); 

error_reporting(E_ALL);

class ConsultantBioAdmin {

	public static function init() {
		
		require_once (dirname(dirname(__FILE__)) .'/config/paths.php');
		
		require_once (PATH_SERVER.'core/library/display/display-bio-brand.php');
		require_once (PATH_SERVER.'core/library/display/display-bio-language.php');
		require_once (PATH_SERVER.'core/library/display/display-bio-team.php');
		require_once (PATH_SERVER.'core/library/display/display-brand.php');
		require_once (PATH_SERVER.'core/library/display/display-consultant.php');
		require_once (PATH_SERVER.'core/library/display/display-consultant-bio.php');
		require_once (PATH_SERVER.'core/library/display/display-language.php');
		require_once (PATH_SERVER.'core/library/display/display-menu.php');
		require_once (PATH_SERVER.'core/library/display/display-update-form-fields.php');
		require_once (PATH_SERVER.'core/library/display/display-vars.php');
		
		require_once (PATH_SERVER.'core/library/procedures-admin/bio/bio.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/brand/brand.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/consultant/consultant.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/language/language.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/team/team.php');
		require_once (PATH_SERVER.'core/library/session/session-variables.php');
		
		// ---------------------------------------------------------------------------
		// SET : GET AND SESSION VARS
		// ---------------------------------------------------------------------------
		
		setSessionWithGet('menu', 'get');
		setSessionWithGet('consultantID', 1);
		
		// ---------------------------------------------------------------------------
		// DRAW HORIZONTAL MENU : ADD / SEARCH / GET / AMEND / DELETE / UNDELETE
		// ---------------------------------------------------------------------------
		
		DisplayMenu::asHorizontalMenu('CONSULTANT BIO',['add','amend','delete', 'undelete']);
		
		// ---------------------------------------------------------------------------
		// SUBMIT DATA TO DATABASE / ADD / AMEND / DELETE
		// ---------------------------------------------------------------------------
		
		if(isset($_POST['submit'])){

			if($_POST['submit'] == 'add-bio'){
				
				$consultantID = $_SESSION['consultantID'];
				
				if($_POST['bioLanguageID'] 	== 0 ){$bioLanguageID 	= 'NULL';}else{$bioLanguageID	= $_POST['bioLanguageID'];}
				if($_POST['bioBrandID'] 		== 0 ){$bioBrandID 		= 'NULL';}else{$bioBrandID		= $_POST['bioBrandID'];}
				if($_POST['bioTeamID'] 		== 0 ){$bioTeamID 		= 'NULL';}else{$bioTeamID		= $_POST['bioTeamID'];}

				$bioTitle 		= $_POST['bioTitle'];
				$bioStrapline 	= $_POST['bioStrapline']; 
				$bioExpertise 	= $_POST['bioExpertise'];
				$bioAbout 		= $_POST['bioAbout']; 
	
				$result = Bio::add(	$consultantID,
									$bioLanguageID,
									$bioBrandID,
									$bioTeamID,
									$bioTitle,
									$bioStrapline,
									$bioExpertise,
									$bioAbout);
			}
			
			if($_POST['submit'] == 'amend-bio'){
				
				$max = Bio::getRowCount($_SESSION['consultantID'], 'NULL', 'NULL');
		
				for($i = 1; $i <= $max ; $i ++){
	
					$bioID 			= $_POST['bioID'.$i];
					$bioLanguageID	= $_POST['bioLanguageID'.$i];
					$bioBrandID		= $_POST['bioBrandID'.$i];
					$bioTeamID		= $_POST['bioTeamID'.$i];
					$bioTitle 		= $_POST['bioTitle'.$i];
					$bioStrapline 	= $_POST['bioStrapline'.$i];
					$bioExpertise 	= $_POST['bioExpertise'.$i];
					$bioAbout 		= $_POST['bioAbout'.$i];
					
					if($bioLanguageID	== 0){$bioLanguageID		= 'NULL';}
					if($bioBrandID		== 0){$bioBrandID		= 'NULL';}
					if($bioTeamID		== 0){$bioTeamID			= 'NULL';}
					

					Bio::amend(	$bioID,
								$bioLanguageID,
								$bioBrandID,
								$bioTeamID,
								$bioTitle,
								$bioStrapline,
								$bioExpertise,
								$bioAbout);
				}
				
			}
			
			if($_POST['submit'] == 'delete-bio'){
				
				$max = Bio::getRowCount($_SESSION['consultantID'], 'NULL', 'NULL', 'NULL');
		
				for($i = 1; $i <= $max ; $i ++){
					
					if(isset($_POST['bioID'.$i])){
						
						$bioID = $_POST['bioID'.$i];
						Bio::delete(	$bioID);
					}
				}
			}
			
			
			if($_POST['submit'] == 'undelete-bio'){
				
				$max = Bio::getRowCount($_SESSION['consultantID'], 'NULL', 'NULL', 'NULL', 1);
				
				for($i = 1; $i <= $max ; $i ++){
					
					if(isset($_POST['bioID'.$i])){
						
						$bioID = $_POST['bioID'.$i];
						Bio::undelete(	$bioID);
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
							
								$max1 	= Bio::getRowCount($_SESSION['consultantID'], 'NULL', 'NULL', 'NULL', 'NULL');
								$max2 	= Bio::getRowCount($_SESSION['consultantID'], 'NULL', 'NULL', 'NULL', 1);
								$max 	= $max1 + $max2;
								
								if($max < 4){
									
									$result = Consultant::get($_SESSION['consultantID']);
									DisplayConsultant::asTitle($result);
									require_once(PATH_SERVER.'core/form-fields/fields-admin-consultant-bio-add.php');
									
								}else{
									
									echo 'A maximum of 4 bios has been reached';
								
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
								
								require_once(PATH_SERVER.'core/form-fields/fields-admin-consultant-bio-amend.php');
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
								
								require_once(PATH_SERVER.'core/form-fields/fields-admin-consultant-bio-delete.php');
				echo 		'</p>
						</div>
					</div>';			
			}
			
			// ---------------------------------------------------------------------------	
			
			if($_SESSION['menu'] == 'undelete'){
				
				echo '<div class="pure-g">
						<div class="pure-u-1-2">
							<p>';
								$result = Consultant::get('NULL');
								DisplayConsultant::asScrollList($result, 'undelete');
				echo 	    '</p>
						</div>
						
						<div class="pure-u-1-2">
							<p>';
								$result = Consultant::get($_SESSION['consultantID']);
								DisplayConsultant::asTitle($result);
								
								require_once(PATH_SERVER.'core/form-fields/fields-admin-consultant-bio-undelete.php');
				echo 		'</p>
						</div>
					</div>';			
			}		
		
		}

		// ----------------------------------------------------------------------------	
		// POST DATA : ADD CONSULTANT DATA RESULT TO POST
		
		if(isset($_SESSION['consultantID'])){
			
			if($_SESSION['menu'] == 'undelete'){
				$deleted = 1;
			}else{
				$deleted = 'NULL';
			}
	
			$bio = Bio::get(			$_SESSION['consultantID'], 'NULL', 'NULL', 'NULL', $deleted );
			$max = Bio::getRowCount($_SESSION['consultantID'], 'NULL', 'NULL', 'NULL', $deleted );
	
			for($i = 1; $i <= $max; $i ++){
	
				$_POST['bioID'.$i]			= 0;
				$_POST['bioLanguageID'.$i]	= 0;
				$_POST['bioBrandID'.$i]		= 0;
				$_POST['bioTeamID'.$i]		= 0;
				$_POST['bioTitle'.$i]		= '';
				$_POST['bioStrapline'.$i]	= '';
				$_POST['bioExpertise'.$i]	= '';
				$_POST['bioAbout'.$i]		= '';
			}
			
			if(!empty($bio)){
				
				$i = 1;

				foreach ($bio as $currentRow){
	
					$_POST['bioID'.$i]			= $currentRow['bio_id'];
					$_POST['bioTitle'.$i]		= $currentRow['bio_title'];
					$_POST['bioStrapline'.$i]	= $currentRow['bio_strapline'];
					$_POST['bioExpertise'.$i]	= $currentRow['bio_expertise'];
					$_POST['bioAbout'.$i]		= $currentRow['bio_about'];
					$_POST['bioBrandID'.$i]		= (empty($currentRow['bio_brand_id'])) 		|| is_null($currentRow['bio_brand_id'])? 0 		: $currentRow['bio_brand_id'];
					$_POST['bioLanguageID'.$i]	= (empty($currentRow['bio_language_id'])) 	|| is_null($currentRow['bio_language_id'])? 0 	: $currentRow['bio_language_id'];
					$_POST['bioTeamID'.$i]		= (empty($currentRow['bio_team_id'])) 		|| is_null($currentRow['bio_team_id'])? 0 		: $currentRow['bio_team_id'];
					
					$i ++;
				}
			}
		}	
		
		// DISPLAY : WRITE POST VARS INTO FORMS
			
		require_once (PATH_SERVER.'/web-templates/template-includes-javascript.php');
	
		if(	$_SESSION['menu'] == 'add'){
			$_POST = array();
		}
		
		DisplayVars::show($_POST);
		DisplayUpdateTextFields::update($_POST);
	}
}
?>
