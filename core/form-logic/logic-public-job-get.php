<?php


error_reporting(E_ALL);

class JobGet {

	public static function init($language, $brand) {
		
		require_once (dirname(dirname(__FILE__)) .'/config/paths.php');
			   
		require_once (PATH_SERVER.'core/form-languages/language-'.$language.'.php');
		require_once (PATH_SERVER.'core/form-fields/fields-public-job-get.php');
		require_once (PATH_SERVER.'core/library/display/display-jobs-small.php');
		require_once (PATH_SERVER.'core/library/display/display-jobs-medium.php');
		require_once (PATH_SERVER.'core/library/display/display-jobs-large.php');
		require_once (PATH_SERVER.'core/library/display/display-update-form-fields.php');
		require_once (PATH_SERVER.'core/library/display/display-vars.php');
		
		require_once (PATH_SERVER.'core/library/paginator/paginator.php');
		
		require_once (PATH_SERVER.'core/library/procedures-public/job/job.php');
		require_once (PATH_SERVER.'core/library/procedures-public/job/jobs.php');
		require_once (PATH_SERVER.'core/library/session/session-variables.php');
		
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
		// ---------------------------------------------------------------------------
		
		$_SESSION['last-header-menu'] = 'Job Get';
		
		setSessionWithGet('menu', 'get');
		setSessionWithGet('jobID', '');
		setSessionWithGet('deleted', 'NULL');
		setSessionWithGet('expired', 'NULL');
		setSessionWithGet('rowStart', 0);
		setSessionWithGet('rowAmount', 3);
		
		// ---------------------------------------------------------------------------
		// GET JOBS FUNCTION()
		
		function callJobs(){
			
			$result = Jobs::get ($_SESSION['jobID'], 
								$_SESSION['deleted'],
								$_SESSION['expired'],
								$_SESSION['rowStart'], 
								$_SESSION['rowAmount'] );
								
			Jobs::store($result);
		}
		
		function callJobsRows(){
			
			$rowTotal = Jobs::getRowCount(	$_SESSION['jobID'],
											$_SESSION['deleted'],
											$_SESSION['expired']);
											
			return  $rowTotal;
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
		
		require_once (PATH_SERVER.'/web-templates/template-includes-javascript.php');
		
		DisplayVars::show($_POST);
		DisplayUpdateTextFields::update($_POST);
		
		}
	}

?>
