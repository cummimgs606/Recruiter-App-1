<?php

error_reporting(E_ALL);

//echo '*** AjaxControll::deleteRow()</p>';

class AjaxControl {
	
	public static function deleteRow($rowID , $doDelete, $dontDelete) {
		
		if (isset($_SESSION['submit'])) { 

			if (isset($_SESSION[$rowID])) { 
					
				if($_SESSION['submit'] == $doDelete ){
					
					$_POST[$rowID] = $_SESSION[$rowID];
					
					unset ($_SESSION[$rowID]);
					
					$returnValue = true;
				}
				
				if($_SESSION['submit'] == $dontDelete){
					
					$returnValue = false;
				}
			}
			
			unset ($_SESSION['submit']);
			
			return $returnValue;
		}
	}
}

?>
