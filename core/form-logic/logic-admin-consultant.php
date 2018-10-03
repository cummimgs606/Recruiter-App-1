<?php

//session_start(); started in menu;
//session_unset(); 
//session_destroy(); 

error_reporting(E_ALL);

class ConsultantAdmin {

	public static function init() {
		
		require_once (dirname(dirname(__FILE__)) .'/config/paths.php');
		require_once (PATH_SERVER.'core/form-logic/logic-admin-upload-image.php');
		require_once (PATH_SERVER.'core/library/display/display-country.php');
		require_once (PATH_SERVER.'core/library/display/display-country-office.php');
		require_once (PATH_SERVER.'core/library/display/display-country-brand.php');
		require_once (PATH_SERVER.'core/library/display/display-consultant.php');
		require_once (PATH_SERVER.'core/library/display/display-team.php');
		require_once (PATH_SERVER.'core/library/display/display-brand.php');
		require_once (PATH_SERVER.'core/library/display/display-menu.php');
		require_once (PATH_SERVER.'core/library/display/display-office.php');
		require_once (PATH_SERVER.'core/library/display/display-practice.php');
		require_once (PATH_SERVER.'core/library/display/display-update-form-fields.php');
		require_once (PATH_SERVER.'core/library/display/display-vars.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/brand/brand.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/country/country.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/consultant/consultant.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/office/office.php');	
		require_once (PATH_SERVER.'core/library/procedures-admin/practice/practice.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/team/team.php');
		require_once (PATH_SERVER.'core/library/image/image-copy.php');
		require_once (PATH_SERVER.'core/library/image/image-resize.php');
		require_once (PATH_SERVER.'core/library/image/image-sweep.php');
		require_once (PATH_SERVER.'core/library/image/image-rename.php');
		require_once (PATH_SERVER.'core/library/session/session-variables.php');
		
		// ---------------------------------------------------------------------------
		// DRAW HORIZONTAL MENU : ADD / SEARCH / GET / AMEND / DELETE / UNDELETE
		// ---------------------------------------------------------------------------
		
		DisplayMenu::asHorizontalMenu('CONSULTANT',['add','search','get','amend','delete', 'undelete']);
	
		// ---------------------------------------------------------------------------
		// SET : GET AND POST VARS
		// ---------------------------------------------------------------------------
		
		setSessionWithGet('menu', 'get');
		setSessionWithGet('consultantID', 1);
		
		// ---------------------------------------------------------------------------
		// IMAGE PATH VARIBLES
		// ---------------------------------------------------------------------------
		
		$directoryIn 		= '/var/www/webroot/consultant-images/';
		$fileNameInDefault 	= '256x256-consultant-defualt-image';
		$fileNameIn  		= '256x256-consultant-';
		$fileSize			= 256;
		$fileExtention		= '.jpg';
		
		// ---------------------------------------------------------------------------
		// SUBMIT DATA TO DATABASE / ADD / AMEND / DELETE
		// ---------------------------------------------------------------------------
		
		if(isset($_POST['submit'])){

			if($_POST['submit'] == 'add-consultant'){
				
				// ADD
				
				$consultant = Consultant::add(	ucfirst (strtolower ( $_POST['consultantFirstName'])),
												ucfirst (strtolower ( $_POST['consultantMiddleName'])),
												ucfirst (strtolower ( $_POST['consultantLastName'])),
												$_POST['consultantJobTitle'], 
												$_POST['consultantRank'], 
												$_POST['consultantExpertise'], 
												$_POST['consultantEmail'], 
												$_POST['consultantLinkedin'],
												$_POST['consultantTwitter'], 
												$_POST['consultantPhoneMobile'],
												$_POST['officeID']);
												
				foreach ($consultant as $currentRow){
						
					$consultantID = $currentRow['consultant_id'];
						
					if($_FILES['imageFileName']['name'] != ''){
						
						UploadImageAdmin::init( $directoryIn.$fileNameIn.$consultantID);	
						ImageResize::resize(		$directoryIn.$fileNameIn.$consultantID.$fileExtention,
													$directoryIn.$fileNameIn.$consultantID.$fileExtention,
													$fileSize);					
					}else{
							
						ImageCopy::copyDefault(	$directoryIn.$fileNameInDefault.$fileExtention,
												$directoryIn.$fileNameIn.$consultantID.$fileExtention);
					}
				}
			}
			
			if($_POST['submit'] == 'search-consultant'){
				
				// SEARCH
				
				if($_POST['consultantIDs'] 			== ''){$consultantIDs 		= NULL;}else{$consultantIDs 				= $_POST['consultantIDs'];}
				if($_POST['consultantFirstName'] 	== ''){$consultantFirstName 	= NULL;}else{$consultantFirstName 		= $_POST['consultantFirstName'];}
				if($_POST['consultantLastName'] 		== ''){$consultantLastName 	= NULL;}else{$consultantLastName			= $_POST['consultantLastName'];}
				if($_POST['consultantEmail'] 		== ''){$consultantEmail 		= NULL;}else{$consultantEmail 			= $_POST['consultantEmail'];}
				if($_POST['officeID'] 				== 0){$officeID 				= 'NULL';}else{$officeID 				= $_POST['officeID'];}
				if($_POST['officeCountryID'] 		== 0){$officeCountryID 		= 'NULL';}else{$officeCountryID			= $_POST['officeCountryID'];}
				if($_POST['practiceID'] 				== 0){$practiceID			= 'NULL';}else{$practiceID				= $_POST['practiceID'];}
				if($_POST['teamID'] 					== 0){$teamID				= 'NULL';}else{$teamID					= $_POST['teamID'];}
				if($_POST['brandID'] 				== 0){$brandID				= 'NULL';}else{$brandID					= $_POST['brandID'];}
				if($_POST['brandCountryID'] 			== 0){$brandCountryID		= 'NULL';}else{$brandCountryID			= $_POST['brandCountryID'];}
				
	
				$searchResult = Consultant::search(	$consultantIDs,
													$consultantFirstName,
													$consultantLastName,							
													$consultantEmail,
													$officeID,
													$officeCountryID,
													$practiceID,
													$teamID,
													$brandID,
													$brandCountryID);
			}
			
			if($_POST['submit'] == 'amend-consultant'){
				
				// AMEND

				$amendResult = Consultant::amend(	$_POST['consultantID'],
													ucfirst (strtolower ( $_POST['consultantFirstName'])),
													ucfirst (strtolower ( $_POST['consultantMiddleName'])),
													ucfirst (strtolower ( $_POST['consultantLastName'])),
													$_POST['consultantJobTitle'], 
													$_POST['consultantRank'],
													$_POST['consultantExpertise'], 
													$_POST['consultantEmail'], 
													$_POST['consultantLinkedin'],
													$_POST['consultantTwitter'], 
													$_POST['consultantPhoneMobile'], 
													$_POST['officeID']);

				if(isset($_FILES['imageFileName'])){
					
					$consultantID = $_POST['consultantID'];
	
					UploadImageAdmin::init( $directoryIn.$fileNameIn.$consultantID);	
					ImageResize::resize(		$directoryIn.$fileNameIn.$consultantID.$fileExtention,
											$directoryIn.$fileNameIn.$consultantID.$fileExtention,
											$fileSize);
				}
			}
		
			if($_POST['submit'] == 'delete-consultant'){
				
				// DELETE
				
				Consultant::delete($_POST['consultantID']);
			}
			
			if($_POST['submit'] == 'undelete-consultant'){
				
				// UNDELETE
				
				Consultant::undelete($_POST['consultantID']);
			}
		}
		
		// DISPLAY : GENERATE ADMIN FORMS ACORDING TO MENU SELECTION
		
		// ---------------------------------------------------------------------------	
		
		if(isset($_SESSION['menu'])){
			
			// ---------------------------------------------------------------------------	

			if($_SESSION['menu'] == 'add'){
				
				// ADD
				
				echo '<div class="pure-g">
    					<div class="pure-u-1-2">
							<p>'; 
								require_once (PATH_SERVER.'core/form-fields/fields-admin-consultant-add.php');
				echo 	    '</p>
						</div>
				
						<div class="pure-u-1-2">
							<p>
							</p>
						</div>
					</div>';	
			}
			
			// ---------------------------------------------------------------------------
	
			if($_SESSION['menu'] == 'search'){
				
				// SEARCH
				
				echo '<div class="pure-g">
    					<div class="pure-u-1-2">
							<p>'; 
								require_once(PATH_SERVER.'core/form-fields/fields-admin-consultant-search.php');
				echo 	    '</p>
						</div>
				
						<div class="pure-u-1-2">
							<p>';
							if(isset($searchResult)){
								DisplayConsultant::asScrollList($searchResult, 'amend');
							}
				echo		'</p>
						</div>
					</div>';	
			}
			
			// ---------------------------------------------------------------------------
	
			if($_SESSION['menu'] == 'get'){
				
				// GET
				
				echo '<div class="pure-g">
    					<div class="pure-u-1-2">
							<p>'; 
								$result = Consultant::get('NULL');
								DisplayConsultant::asScrollList($result, 'get');
				echo 	    '</p>
						</div>
				
						<div class="pure-u-1-2">
							<p>';
							$result = Consultant::get($_SESSION['consultantID'], 'NULL');
							DisplayConsultant::asTextList($result, false, 'EDIT');
				echo		'</p>
						</div>
					</div>';	
			}
			
			// ---------------------------------------------------------------------------	
			
			if($_SESSION['menu'] == 'amend'){
				
				//AMEND
				
				echo '<div class="pure-g">
						<div class="pure-u-1-2">
							<p>';
								$result = Consultant::get('NULL');
								DisplayConsultant::asScrollList($result, 'amend');
				echo 	    '</p>
						</div>
						
						<div class="pure-u-1-2">
							<p>';
								require_once(PATH_SERVER.'core/form-fields/fields-admin-consultant-amend.php');
				echo 		'</p>
						</div>
					</div>';			
			}
			
			// ---------------------------------------------------------------------------	
			
			if($_SESSION['menu'] == 'delete'){
				
				// DELETE
				
				echo '<div class="pure-g">
						<div class="pure-u-1-2">
							<p>';
								$result = Consultant::get('NULL');
								DisplayConsultant::asScrollList($result, 'delete');
				echo 	    '</p>
						</div>
						
						<div class="pure-u-1-2">
							<p>';
								require_once (PATH_SERVER.'core/form-fields/fields-admin-consultant-delete.php');
				echo 		'</p>
						</div>
					</div>';			
			}
			
			// ---------------------------------------------------------------------------	
			
			if($_SESSION['menu'] == 'undelete'){
				
				// UNDELETE
				
				echo '<div class="pure-g">
						<div class="pure-u-1-2">
							<p>';
								$result = Consultant::get('NULL',  1);
								DisplayConsultant::asScrollList($result, 'undelete');
				echo 	    '</p>
						</div>
						
						<div class="pure-u-1-2">
							<p>';
								require_once (PATH_SERVER.'core/form-fields/fields-admin-consultant-undelete.php');
				echo 		'</p>
						</div>
					</div>';			
			}
		}

		// ----------------------------------------------------------------------------	
		// POST DATA : ADD CONSULTANT DATA RESULT TO POST
		
		function setPostData($consultant){
		
			if(!empty($consultant)){

				foreach ($consultant as $currentRow){
	
					$_POST['consultantFirstName'] 		= (empty($currentRow['consultant_first_name'])) ?'': $currentRow['consultant_first_name'];
					$_POST['consultantMiddleName']		= (empty($currentRow['consultant_middle_name'])) ?'': $currentRow['consultant_middle_name'];
					$_POST['consultantLastName'] 		= (empty($currentRow['consultant_last_name'])) ?'': $currentRow['consultant_last_name'];
					$_POST['consultantID'] 				= $currentRow['consultant_id'];
					$_POST['consultantJobTitle'] 		= $currentRow['consultant_job_title'];
					$_POST['consultantRank'] 			= $currentRow['consultant_rank'];
					$_POST['consultantExpertise'] 		= $currentRow['consultant_expertise'];
					$_POST['consultantImage'] 			= $currentRow['consultant_image'];
					$_POST['consultantImageJPG']			= 'http://10.3.5.56/consultant-images/'.$currentRow['consultant_image'];
					$_POST['consultantEmail'] 			= $currentRow['consultant_email'];
					$_POST['consultantLinkedin'] 		= $currentRow['consultant_linkedin'];
					$_POST['consultantTwitter'] 			= $currentRow['consultant_twitter'];
					$_POST['consultantPhoneMobile'] 		= $currentRow['consultant_phone_mobile'];
					$_POST['officeID'] 					= $currentRow['office_id'];
				}
			}
		}
		
		if($_SESSION['menu'] == 'amend' || $_SESSION['menu'] == 'delete' || $_SESSION['menu'] == 'undelete'){
			
			// AMEND // DELETE // UNDELETE
			
			if(isset($_SESSION['consultantID'])){
				
				if($_SESSION['menu'] == 'undelete'){
					
					$consultant = Consultant::get($_SESSION['consultantID'], 1);
					
				}else{
					
					$consultant = Consultant::get($_SESSION['consultantID'], 'NULL');
				}
				
				setPostData($consultant);
			}
		}
		
	
		// ----------------------------------------------------------------------------	
		// DISPLAY : WRITE POST VARS INTO FORMS
		
		require_once (PATH_SERVER.'/web-templates/template-includes-javascript.php');
		
		if(isset($_POST['submit'] )){
			
			// AMEND // DELETE // UNDELETE
			
			if(	$_POST['submit'] == 'amend-consultant' ||
				$_POST['submit'] == 'delete-consultant' || 
				$_POST['submit'] == 'undelete-consultant'){
					
				$_POST = array();
				
			}
		}

		if(	$_SESSION['menu'] == 'add'){
			
			// ADD
			
			$_POST = array();
		}
		
		DisplayVars::show($_POST);
		DisplayUpdateTextFields::update($_POST);
	}
}
?>
