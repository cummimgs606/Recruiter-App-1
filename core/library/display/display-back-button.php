<?php

ini_set('display_errors', 'On');

class DisplayBackButton{
	
	public static function setURL($id, $getVars = ''){
	
		$string 		= explode("?", $_SERVER["REQUEST_URI"]);
		$string1 	= isset($string[0]) ? $string[0] : '';
	
		$_SESSION['backButtonURL_'.$id] = $string1.'?'.$getVars ;
	}
		
	public static function getURL($id){
				
		return $_SESSION['backButtonURL_'.$id];
	}
		
	public static function render($id){
		
		echo '<p><a class="pure-button" href="'.self::getURL($id).'">'.BUTTON_BACK.'</a>';
	}
		
}
?>.

	
	
