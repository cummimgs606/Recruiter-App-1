<?php

error_reporting(E_ALL);

class JobSearch {

	public static function init($language, $brand) {
		
		require_once (dirname(dirname(__FILE__)) .'/config/paths.php');
	
		require_once (PATH_SERVER.'core/library/display/display-brand.php');
		require_once (PATH_SERVER.'core/library/display/display-job-type.php');
		require_once (PATH_SERVER.'core/library/display/display-jobs-large.php');
		require_once (PATH_SERVER.'core/library/display/display-jobs-medium.php');
		require_once (PATH_SERVER.'core/library/display/display-jobs-small.php');
		require_once (PATH_SERVER.'core/library/display/display-update-form-fields.php');
		require_once (PATH_SERVER.'core/library/display/display-vars.php');
		
		require_once (PATH_SERVER.'core/library/paginator/paginator.php');
		
		require_once (PATH_SERVER.'core/library/procedures-public/job/job.php');
		require_once (PATH_SERVER.'core/library/procedures-public/job/jobs.php');
		require_once (PATH_SERVER.'core/library/procedures-public/job-type/job-type.php');
		require_once (PATH_SERVER.'core/library/procedures-public/brand/brand.php');
		require_once (PATH_SERVER.'core/library/session/session-variables.php');
		
		require_once (PATH_SERVER.'core/form-languages/language-'.$language.'.php');
		require_once (PATH_SERVER.'core/form-fields/fields-public-job-search.php');
		
		// ---------------------------------------------------------------------------
		// COPY DATA
			
		if(isset($_POST['submit'])){
			
			copyPostToSession($_POST);
			
		}else{
			
			if(isset($_SESSION)){
				
				copySessionToPost($_SESSION);
			}
		}
		
		// ---------------------------------------------------------------------------
		// SET SESSION VARS BY GET
				
		$_SESSION['last-header-menu'] = 'Job Search';
		
		setSessionWithGet('menu', 'get');
		setSessionWithGet('keyword', '');
		setSessionWithGet('location', '');
		setSessionWithGet('jobTypeID', 3);
		setSessionWithGet('brandID', 'NULL');
		setSessionWithGet('countryID', 235);
		
		// ---------------------------------------------------------------------------	
		// GET JOBS FUNCTION()
		
		function callJobs(){
			
			$_SESSION['jobTypeID']  	= ($_SESSION['jobTypeID'] 	== 0  ? 'NULL' : $_SESSION['jobTypeID']);
			$_SESSION['brandID'] 	= ($_SESSION['brandID']  	== 0  ? 'NULL' : $_SESSION['brandID'] );
			
			$result = Jobs::search(	$_SESSION['keyword'], 
									$_SESSION['location'],
									$_SESSION['countryID'], 
									$_SESSION['jobTypeID'],   
									$_SESSION['brandID'], 
									$_SESSION['rowStart'], 
									$_SESSION['rowAmount']);
	
			Jobs::store($result);
		}
		
		function callJobsRows(){
			
			$_SESSION['jobTypeID']  = ($_SESSION['jobTypeID'] 	== 0  ? 'NULL' : $_SESSION['jobTypeID']);
			$_SESSION['brandID']		= ($_SESSION['brandID']  	== 0  ? 'NULL' : $_SESSION['brandID'] );
			
			$rowTotal = Jobs::searchRowCount(	$_SESSION['keyword'], 
												$_SESSION['location'],
												$_SESSION['countryID'],
												$_SESSION['jobTypeID'],   
												$_SESSION['brandID']);
																		 	
			return $rowTotal;
		}
		

		// ---------------------------------------------------------------------------	
		// INIT : PAGINATOR VALUES
				
		$rowTotal = callJobsRows();
	
		require_once (PATH_SERVER.'core/library/paginator/paginator-setup.php');
		
		// ---------------------------------------------------------------------------	
		// RENDER : PAGINATOR RESULT
		
		callJobs();
		
		require_once (PATH_SERVER.'core/library/display/display-paginator.php');
		
		// ---------------------------------------------------------------------------	
		// DISPLAY : WRITE POST VARS INTO FORMS
		
		$_SESSION['jobTypeID']  = ($_SESSION['jobTypeID'] 	== 'NULL' ? 0 : $_SESSION['jobTypeID']);
		$_SESSION['brandID']		= ($_SESSION['brandID']  	== 'NULL' ? 0 : $_SESSION['brandID'] );
		
	
		
		require_once (PATH_SERVER.'/web-templates/template-includes-javascript.php');
		
		DisplayVars::show($_SESSION);
		DisplayUpdateTextFields::update($_POST);
	}
}

?>
