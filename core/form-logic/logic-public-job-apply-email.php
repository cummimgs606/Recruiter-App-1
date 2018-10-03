<?php

class JobApplyEmail {
	
	public static function withCV($post, $jobs, $filename){
		
		$s1 = $s2 = $s3 = $s4 = $s5 = $s6 = $s7 = $s8 = $s9 = $s10 = $s11 = $s12 = '';
		
		$s1 	= EMAIL_1_0.$jobs[0]["job_title"].EMAIL_1_1;
    	$s2 	= $jobs[0]['job_response_email'];
		$s3 	= $_POST['candidateEmailAddress'];
		$s4 	= EMAIL_1_2.' '.$jobs[0]["consultant_name"].',</br></br>';
		$s5 	= EMAIL_1_3.' '.$_POST['candidateFirstName'].' '.$_POST['candidateLastName'].' </br>';
		$s6 	= EMAIL_1_4.' <b>'.$jobs[0]['job_title'].'</b>.</br></br>';
		$s7 	= JOB_SALARY_RATE.': '.$jobs[0]["job_salary"].'</br>';
		$s8 	= JOB_TYPE.': '.$jobs[0]["job_type_name"].'</br>';
		$s9 	= JOB_LOCATION.': '.$jobs[0]["job_location_text"].'</br>';
		$s10 = JOB_START.': '.$jobs[0]["job_start_date"].'</br>';
		$s11 = JOB_DURATION.': '.$jobs[0]["job_duration"].'</br></br>';
		$s12 = '<a href="'.URL_LOCALISED.'/index.php?jobID='.$jobs[0]["job_id"].'">'.EMAIL_1_5.'</a>';

		$email = [	'subject' 	=> $s1,
					'from' 		=> $s2,
					'to'		=> $s3,
					'body'		=> $s4.$s5.$s6.$s7.$s8.$s9.$s10.$s11.$s12,
					'attach'	=> $filename];
		
		$response = self::send(		$email['subject'], 
									$email['from'], 
									$email['to'],
									$email['body'], 
									$email['attach']);
		
		return $response;
	}
	
	public static function withoutCV($post, $jobs){
		
		$s1 = $s2 = $s3 = $s4 = $s5 = $s6 = $s7 = $s8 = $s9 = $s10 = $s11 = $s12 = $s13 = $s14 = '';

		$s1 	= EMAIL_2_0.' '.$jobs[0]["job_title"].''.EMAIL_2_1;
    	$s2 	= $jobs[0]['job_response_email'];
		$s3 	= $_POST['candidateEmailAddress'];
		$s4 	= EMAIL_2_2.' '.$_POST['candidateFirstName'].' '.$_POST['candidateLastName'].',</br></br>';
		$s5 	= EMAIL_2_3.' <b>'.$jobs[0]['job_title'].'</b>.</br>';
		$s6 	= EMAIL_2_4.'.</br></br>';
		$s7 	= JOB_TITLE.': '.$jobs[0]["job_title"].'</br>';
		$s8 	= JOB_SALARY_RATE.': '.$jobs[0]["job_salary"].'</br>';
		$s9 	= JOB_TYPE.': '.$jobs[0]["job_type_name"].'</br>';
		$s10 = JOB_CONSULTANT.': '.$jobs[0]["consultant_name"].'</br>';
		$s11 = JOB_LOCATION.': '.$jobs[0]["job_location_text"].'</br>';
		$s12 = JOB_START.': '.$jobs[0]["job_start_date"].'</br>';
		$s13 = JOB_DURATION.': '.$jobs[0]["job_duration"].'</br></br>';
		$s14 = '<a href="'.URL_LOCALISED.'/index.php?jobID='.$jobs[0]["job_id"].'">'.EMAIL_2_5.'</a>';
                         
		$email = [	'subject' 	=> $s1,
    				'from' 		=> $s2,
					'to'		=> $s3,
					'body'		=> $s4.$s5.$s6.$s7.$s8.$s9.$s10.$s11.$s12.$s13.$s14,
					'attach'	=> ''];
		
		$response = self::send(		$email['subject'], 
									$email['from'], 
									$email['to'],
									$email['body'], 
									$email['attach']);
		
		return $response;
	}
	
	public static function send($messageSubject, $messageFrom, $messageTo, $messageBody, $messageAttach){
		
		$responseMail = Mail::send($messageSubject, $messageFrom, $messageTo, $messageBody, $messageAttach);
		
		if($responseMail == "success"){
				
			return 'success';
						
		}else{

			echo ("<div class='button-error pure-button'>Error ... Email could not be sent.</div></p>");
	
			return 'fail';	
		}
	}
}

?>






						
								
							
							
							
							
							
								
							
	