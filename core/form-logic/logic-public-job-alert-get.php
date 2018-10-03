<?php

session_start();
//session_unset(); 
//session_destroy();   
error_reporting(E_ALL);

class JobAlertGet {
	
	public static function init($language) {
		
		require_once (dirname(dirname(__FILE__)) .'/config/paths.php');
		
		require_once (PATH_SERVER.'core/form-logic/logic-job-alert-email.php');
		require_once (PATH_SERVER.'core/form-languages/language-'.$language.'.php');
		require_once (PATH_SERVER.'core/library/display/display-jobs-email.php');
		require_once (PATH_SERVER.'core/library/mail/mail.php');
		require_once (PATH_SERVER.'core/library/procedures-public/job/job.php');
		require_once (PATH_SERVER.'core/library/procedures-public/job/jobs.php');
		require_once (PATH_SERVER.'core/library/session/session-variables.php');
	
		// ---------------------------------------------------------------------------	
		
		
		$result = Jobs::alertGetRowCount();
		
		$row = 	$result->fetch();
		$rowTotal = $row['total'];
		
		$rowStart 	= 0;
		$rowAmount 	= $rowTotal;

		
		$result = Jobs::alertGet($rowStart, $rowAmount);
		JobAlertEmail::send($result);
							
		// ----------------------------------------------------------------------------	
	}
}

?>
