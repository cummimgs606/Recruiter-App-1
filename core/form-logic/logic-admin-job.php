
<?php

//session_start(); started in menu;
//session_unset(); 
//session_destroy(); 

error_reporting(E_ALL);

class JobAdmin {

	public static function init() {
		
		require_once (dirname(dirname(__FILE__)) .'/config/paths.php');
		require_once (PATH_SERVER.'core/library/display/display-brand.php');
		require_once (PATH_SERVER.'core/library/display/display-consultant.php');
		require_once (PATH_SERVER.'core/library/display/display-country.php');
		require_once (PATH_SERVER.'core/library/display/display-job.php');
		require_once (PATH_SERVER.'core/library/display/display-job-type.php');
		require_once (PATH_SERVER.'core/library/display/display-job-source.php');
		require_once (PATH_SERVER.'core/library/display/display-menu.php');
		require_once (PATH_SERVER.'core/library/display/display-language.php');
		require_once (PATH_SERVER.'core/library/display/display-office.php');
		require_once (PATH_SERVER.'core/library/display/display-table.php');
		require_once (PATH_SERVER.'core/library/display/display-update-form-fields.php');
		require_once (PATH_SERVER.'core/library/display/display-vars.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/country/country.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/brand/brand.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/consultant/consultant.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/job/job.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/job-type/job-type.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/job-source/job-source.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/language/language.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/office/office.php');
		
		require_once (PATH_SERVER.'core/library/session/session-variables.php');
		
		// ---------------------------------------------------------------------------
		// SET SESSION VARS BY GET
		// ---------------------------------------------------------------------------
		
		setSessionWithGet('menu', 'search');
		setSessionWithGet('jobID', NULL);
	
		// ---------------------------------------------------------------------------
		// DRAW HORIZONTAL MENU / ADD / GET / AMEND / DELETE
		// ---------------------------------------------------------------------------
		
		DisplayMenu::asHorizontalMenu('JOB',['add','search','get','amend', 'delete','undelete']);
		
		// ---------------------------------------------------------------------------
		// SET GET AND POST VARS
		// ---------------------------------------------------------------------------

		$_POST['rowStart'] 	= 'NULL';
		$_POST['rowAmount'] = 'NULL';	
		
		// ----------------------------------------------------------------------------	
		// SEARCHAND GET FUNCTIONS
		
		function search($menu){
			
			if(!isset($_POST['keyword'])){$_POST['keyword'] 		= '';}
			if(!isset($_POST['location'])){$_POST['location'] 	= '';}
			if(!isset($_POST['jobTypeID'])){$_POST['jobTypeID']	= 0;}
			if(!isset($_POST['brandID'])){$_POST['brandID'] 		= 0;} 
			if(!isset($_POST['countryID'])){$_POST['countryID'] 	= 0;}
			
			$keyword  		= ($_POST['keyword']		== '') ? NULL 	: $_POST['keyword'];
			$location  		= ($_POST['location'] 	== '') ? NULL 	: $_POST['location'];
			$countryID		= ($_POST['countryID'] 	== 0)  ? 'NULL' 	: $_POST['countryID'];
			$jobTypeID		= ($_POST['jobTypeID'] 	== 0)  ? 'NULL' 	: $_POST['jobTypeID'];
			$brandID 		= ($_POST['brandID'] 	== 0)  ? 'NULL' 	: $_POST['brandID'];
			$rowStart	 	= ($_POST['rowStart'] 	== 0)  ? 'NULL' 	: $_POST['rowStart'];
			$rowAmount	 	= ($_POST['rowAmount'] 	== 0)  ? 'NULL' 	: $_POST['rowAmount'];
	
			$result = Job::search(	$keyword, 
									$location,
									$countryID, 
									$jobTypeID, 
									$brandID,
									$rowStart, 
									$rowAmount);

			DisplayJob::asScrollList($result, $menu);	
		}
		
		function get($menu){
			
			if(!isset($_POST["jobIDs"])){
				$_POST["jobIDs"] = '';
			}
	
			if($_SESSION['menu'] == 'get'){
				
				$jobIDs 		= $_POST['jobIDs'];
				$jobDeleted = 0;
				$jobExpired = 0;
			}
				
			if($_SESSION['menu'] == 'delete'){
				
				$jobIDs 		= '';
				$jobDeleted = 0;
				$jobExpired = 0;
			}
				
			if($_SESSION['menu'] == 'undelete'){
				
				$jobIDs 		= '';
				$jobDeleted = 1;
				$jobExpired = 1;
			}

			$result = Job::get(	$jobIDs, 
								$jobDeleted, 
								$jobExpired);
	
			DisplayJob::asScrollList($result, $menu);
		}
		
		function drawPage($left =  NULL, $right =  NULL, $linkto = NULL){
			
			echo '<div class="pure-g">
					<div class="pure-u-1-2">
						<p>'; 
						
							if($left != NULL){
								
								if($left == 'search_result'){
									
									search('amend');
									
								}else if($left == 'get_result'){
	
									get($linkto);

								}else{
									
									require_once (PATH_SERVER.$left);
								}
							}
			echo		'</p>
					</div>
					
					<div class="pure-u-1-2">
						<p>';
						if($right != NULL){
								
								if($right == 'search_result'){
									
									search('amend');
									
								}else if($right == 'get_result'){
									
									get($linkto);
									
								}else{
									
									require_once (PATH_SERVER.$right);
								}
							}
			echo		'</p>
					</div>
				 </div>';		
		}
		
		// ---------------------------------------------------------------------------
		// SUBMIT DATA TO DATABASE / ADD / AMEND / DELETE
		// ---------------------------------------------------------------------------
		
		
		if(isset($_POST['submit'])){
			
			if($_POST['submit'] == 'add-job'){
				
				$jobTitle 				= ($_POST['jobTitle'] 				== '') 	? ''		: $_POST['jobTitle'];			
				$jobSalary 				= ($_POST['jobSalary'] 				== '') 	? ''		: $_POST['jobSalary'];	
				$jobDescription 		= ($_POST['jobDescription'] 			== '') 	? ''		: $_POST['jobDescription'];			
				$jobFeatured 			= ($_POST['jobFeatured'] 			== '') 	? ''		: $_POST['jobFeatured'];			
				$jobStartDate 			= ($_POST['jobStartDate'] 			== '') 	? NULL 	: $_POST['jobStartDate'];				
				$jobDuration 			= ($_POST['jobDuration'] 			== '') 	? ''		: $_POST['jobDuration'];				
				$jobExpiryDate 			= ($_POST['jobExpiryDate'] 			== '') 	? NULL	: $_POST['jobExpiryDate'];			
				$jobResponseEmail 		= ($_POST['jobResponseEmail'] 		== '') 	? NULL	: $_POST['jobResponseEmail'];			
				$jobExternalReference  	= ($_POST['jobExternalReference']	== '') 	? NULL	: $_POST['jobExternalReference'];
				$jobSourceID 			= ($_POST['jobSourceID'] 			== 0) 	? 'NULL'	: $_POST['jobSourceID']; 		
				$jobLocationText 		= ($_POST['jobLocationText'] 		== '') 	? ''		: $_POST['jobLocationText'];			
				$postalCode 				= ($_POST['postalCode'] 				== '') 	? ''		: $_POST['postalCode'];				
				$jobTypeID 				= ($_POST['jobTypeID'] 				== 0) 	? 'NULL'	: $_POST['jobTypeID'];			
				$consultantID 			= ($_POST['consultantID']			== 0) 	? 'NULL'	: $_POST['consultantID']; 				
				$brandID 				= ($_POST['brandID'] 				== 0) 	? 'NULL'	: $_POST['brandID'];									
				$languageID  			= ($_POST['languageID']				== 0) 	? 'NULL'	: $_POST['languageID']; 					
				$countryID				= ($_POST['countryID']				== 0) 	? 'NULL'	: $_POST['countryID']; 				
					
			
				$result = Job::add(	$jobTitle,				
									$jobSalary,				
									$jobDescription,						
									$jobFeatured,							
									$jobStartDate,								
									$jobDuration,								
									$jobExpiryDate,						
									$jobResponseEmail,					
									$jobExternalReference,
									$jobSourceID,	 		
									$jobLocationText,						
									$postalCode,								
									$jobTypeID,							
									$consultantID,				 				
									$brandID,																		
									$languageID,									
									$countryID);	
			}
			
			elseif($_POST['submit'] == 'amend-job'){
		
				$jobID 					= ($_POST['jobID'] 					== '') 	? '' 		: 	$_POST['jobID'];	
				$jobTitle 				= ($_POST['jobTitle'] 				== '') 	? '' 		: 	$_POST['jobTitle'];				
				$jobSalary 				= ($_POST['jobSalary'] 				== '') 	? '' 		: 	$_POST['jobSalary'];		
				$jobDescription 		= ($_POST['jobDescription'] 			== '') 	? '' 		: 	$_POST['jobDescription'];				
				$jobFeatured			= ($_POST['jobFeatured'] 			== '') 	? '' 		: 	$_POST['jobFeatured'];				
				$jobStartDate			= ($_POST['jobStartDate'] 			== '') 	? NULL 		: 	$_POST['jobStartDate'];					
				$jobDuration 			= ($_POST['jobDuration'] 			== '') 	? '' 		: 	$_POST['jobDuration'];					
				$jobExpiryDate			= ($_POST['jobExpiryDate'] 			== '') 	? NULL 		: 	$_POST['jobExpiryDate'];				
				$jobResponseEmail		= ($_POST['jobResponseEmail'] 		== '') 	? NULL 		: 	$_POST['jobResponseEmail'];				
				$jobExternalReference	= ($_POST['jobExternalReference']	== '') 	? NULL 		: 	$_POST['jobExternalReference'];
				$jobSourceID			= ($_POST['jobSourceID'] 			== 0) 	? 'NULL' 	: 	$_POST['jobSourceID'];	 		
				$jobLocationText		= ($_POST['jobLocationText'] 		== '') 	? '' 		: 	$_POST['jobLocationText'];				
				$postalCode				= ($_POST['postalCode'] 				== '') 	? '' 		: 	$_POST['postalCode'];					
				$jobTypeID				= ($_POST['jobTypeID'] 				== 0) 	? 'NULL' 	: 	$_POST['jobTypeID'];				
				$consultantID		 	= ($_POST['consultantID']			== 0) 	? 'NULL' 	: 	$_POST['consultantID'];	 				
				$brandID 				= ($_POST['brandID'] 				== 0) 	? 'NULL' 	: 	$_POST['brandID'];											
				$languageID				= ($_POST['languageID']				== 0) 	? 'NULL' 	: 	$_POST['languageID'];	 					
				$countryID				= ($_POST['countryID']				== 0) 	? 'NULL' 	: 	$_POST['countryID'];	 				
					
				
				$result = Job::amend(	$jobID, 
										$jobTitle, 
										$jobSalary, 
										$jobDescription, 
										$jobFeatured, 
										$jobStartDate, 
										$jobDuration, 
										$jobExpiryDate, 
										$jobResponseEmail, 
										$jobExternalReference, 
										$jobSourceID,
										$jobLocationText,
										$postalCode,
										$jobTypeID,
										$consultantID, 
										$brandID, 
										$languageID, 
										$countryID);
			}
		
			elseif($_POST['submit'] == 'delete-job'){
				
				Job::delete($_POST['jobID']);
			}
			
			elseif($_POST['submit'] == 'undelete-job'){
				
				Job::undelete($_POST['jobID']);

			}
		}
		
		// DISPLAY : GENERATE ADMIN FORMS ACORDING TO MENU SELECTION
		// ---------------------------------------------------------------------------	
		
		if(isset($_SESSION['menu'])){
			
			// ---------------------------------------------------------------------------	

			if($_SESSION['menu'] == 'add'){
				
				drawPage('core/form-fields/fields-admin-job-add.php');
			}
			
			// ---------------------------------------------------------------------------
		
			if($_SESSION['menu'] == 'search'){
				
				drawPage('core/form-fields/fields-admin-job-search.php', 'search_result', 'amend');
			}
						
			// ---------------------------------------------------------------------------
		
			if($_SESSION['menu'] == 'get'){
				
				drawPage('core/form-fields/fields-admin-job-get.php', 'get_result', 'amend' );
			}
				
			// ---------------------------------------------------------------------------	
			
			if($_SESSION['menu'] == 'amend'){
				
				drawPage('core/form-fields/fields-admin-job-amend.php');	
			}
			
			// ---------------------------------------------------------------------------	
			
			if($_SESSION['menu'] == 'delete'){
				
				drawPage('get_result', 'core/form-fields/fields-admin-job-delete.php', 'delete');	
			}
			
			// ---------------------------------------------------------------------------	
					
			if($_SESSION['menu'] == 'undelete'){
				
				drawPage('get_result', 'core/form-fields/fields-admin-job-undelete.php', 'undelete');		
			}
		}

		// ----------------------------------------------------------------------------	
		// POST DATA
		
		if(isset($_SESSION['jobID'])){
			
			if($_SESSION['menu'] == 'undelete'){
				
				$job = Job::get($_SESSION['jobID'], 1, 1);	
				
			}else{
				
				$job = Job::get($_SESSION['jobID'], 'NULL','NULL');	
			}
			
			if(!empty($job)){
			
				foreach ($job as $currentRow){
	
					$_POST['jobID'] 						= $currentRow['job_id'];
					$_POST['jobTitle'] 					= $currentRow['job_title'];
					$_POST['jobSalary'] 					= $currentRow['job_salary'];
					$_POST['jobDescription'] 			= $currentRow['job_description'];
					$_POST['jobFeatured'] 				= $currentRow['job_featured'];
					$_POST['jobStartDate'] 				= $currentRow['job_start_date'];
					$_POST['jobDuration'] 				= $currentRow['job_duration'];
					$_POST['jobExpiryDate'] 				= $currentRow['job_expiry_date'];
					$_POST['jobResponseEmail'] 			= $currentRow['job_response_email'];
					$_POST['jobExternalReference'] 		= $currentRow['job_external_reference'];
					$_POST['jobSourceID'] 				= $currentRow['job_source_id'];
					$_POST['jobLocationText'] 			= $currentRow['job_location_text'];
					$_POST['postalCode'] 				= $currentRow['postal_code'];
					$_POST['jobTypeID'] 					= $currentRow['job_type_id'];
					$_POST['consultantID'] 				= $currentRow['consultant_id'];
					$_POST['brandID'] 					= $currentRow['brand_id'];
					$_POST['languageID'] 				= $currentRow['language_id'];	
					$_POST['countryID'] 					= $currentRow['country_id'];
					
					$_SESSION['jobDescription'] 			= $currentRow['job_description'];
				}
			}
		}
		
		if($_SESSION['menu'] == 'add' || $_SESSION['menu'] == 'undelete'){
				
				$_POST = array();
		}
		
		DisplayVars::show($_POST);
	
		echo "<script>
			(function() {
				
				document.getElementById('view-description').onclick = function() {  
				
					var text1 = document.getElementsByName('jobTitle')[0].value;
					var text2 = document.getElementsByName('jobSalary')[0].value;
					var text3 = document.getElementsByName('jobDescription')[0].value;
					
					var dialog = document.getElementById('window');  
				
	
					popitup(text1,text2,text3,dialog ); 
				};  
				
				function popitup(text1,text2,text3,dialog ) {
					//console.log('POPUP')
					newwindow2=window.open(dialog ,'_blank','height=600,width=800');
					var tmp = newwindow2.document;
					tmp.write('<html><head><title>Job Description</title>');
					tmp.write('</head><body><h3>' + text1 + ' </h3><p></p><p> ' +text2 + '</p><p> ' +text3 + '</p>');
					tmp.write('</body></html>');
					tmp.close();
				}
			})();  
			</script>";	
	
		echo '<link href="../js/jquery.datepick.package-5.0.1/smoothness.datepick.css" rel="stylesheet">';
		echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>';
		echo '<script src="../js/jquery.datepick.package-5.0.1/jquery.plugin.min.js"></script>';
		echo '<script src="../js/jquery.datepick.package-5.0.1/jquery.datepick.js"></script>';
		
		echo '<script>
				$(function() {
					$("#popupDatepicker-1").datepick({dateFormat: "yyyy-mm-dd" });
					$("#popupDatepicker-2").datepick({defaultDate: "+6m",dateFormat: "yyyy-mm-dd" });
					
				});
			</script>
			';
		
		DisplayUpdateTextFields::update($_POST);
	}
}
?>




