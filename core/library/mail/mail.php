<?php

require_once ('extentions/Swift-4.2.2/lib/swift_required.php');

class Mail {
	
	private static $date;
	
	public static function send($messageSubject, $messageFrom, $messageTo, $messageBody, $messageAttach = ''){
		
		/*
		echo '$messageSubject : '.$messageSubject.'</p>'; 
		echo '$messageFrom : '.$messageFrom.'</p>'; 
		echo '$messageTo: '.$messageTo.'</p>';
		echo '$messageBody: '.$messageBody.'</p>';
		echo '$messageAttach: '.$messageAttach.'</p>';
		echo("*** Mail::send()</p>");
		*/
		
		$transport = Swift_SmtpTransport::newInstance('LON-AD-MG03', 25);
		
		$mailer = Swift_Mailer::newInstance($transport);
		
		if($messageAttach == ''){
			
			$message = Swift_Message::newInstance($messageSubject)
				->setFrom($messageFrom)
				->setTo($messageTo)
				->setBody($messageBody)
				->setContentType('text/html');
		}else{

			$message = Swift_Message::newInstance($messageSubject)
				->setFrom($messageFrom)
				->setTo($messageTo)
				->setBody($messageBody)
				->setContentType('text/html')
				->attach(Swift_Attachment::fromPath($messageAttach));
		}
		
		$result = $mailer->send($message);
	
		self::setTimeStamp($message);

		if($result){
		
			return 'success';
			
		}else{
			
			return 'fail';
			
		}
	}
	
	private static function setTimeStamp($message){
		
		//echo("*** Mail::setTimeStamp()</p>");
		
		$date1 = $message->getHeaders()->get('Date');
		$date2 = explode(',', $date1);
		$date3 = $date2[1];
		$date4 = explode('+', $date3 );
	
		self::$date = date_format(new DateTime($date4[0]), 'Y-m-d H:i:s');
	}
	
	public static function getTimeStamp(){
		
		//echo("*** Mail::getTimeStamp()</p>");
		
		//echo '... Date : '.self::$date.'</p>';
	
		return self::$date;
	}
}

?>




