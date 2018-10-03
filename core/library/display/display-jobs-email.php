<?php

ini_set('display_errors', 'On');

class DisplayJobsEmail {

	public static function showList($jobs, $myUrl, $compiledGetVars){
		
		$string0 = '';
		
		if(!empty($jobs)){
			
			foreach ($jobs as $currentRow){
				
				$string1 = $currentRow["job_title"]."</br>";
				$string2 = JOB_SALARY_RATE.": ".$currentRow["job_salary"]."</br>";
				$string3 = '</p>';
	
				$string4 = '<a href="'.$myUrl.'/index.php?header-menu=Job%20Get&jobID='.$currentRow["job_id"].'">'.BUTTON_MORE.'</a></p>';
	
				$string0 = $string0.$string1.$string2.$string3.$string4;
			}
		}
		
		return $string0;
	}
}
?>

	
	
