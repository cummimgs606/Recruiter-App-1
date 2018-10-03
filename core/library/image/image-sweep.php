<?php

//session_start(); started in menu;
//session_unset(); 
//session_destroy(); 

error_reporting(E_ALL);

class ImageSweep {

	public static function init($directoryIn ){

		echo 'ImageSweep::init('.$directoryIn .')</p>';		
	
		$files = scandir($directoryIn);
		$filesArray = [];
		
		for($i=2; $i<count($files); $i++){
			
			list($size, $string, $id) = explode("-", pathinfo($files[$i], PATHINFO_FILENAME));

			$filesArray[$i]['id'] = $id;
			$filesArray[$i]['filename'] = $files[$i];
		}
		
		function cust_sort($a,$b) {
			return strtolower($a['id']) > strtolower($b['id']);
		}
		
		usort($filesArray, 'cust_sort');
		
		
		for($i=1; $i<count($files); $i++){
			if (isset($filesArray[$i]['id'])) {
				if($filesArray[$i]['id'] != 'defualt'){
					echo 'kept - '.$filesArray[$i]['id'].' - '.$filesArray[$i]['filename'].'</p>';
				}
			}
		}
	
		$result = Consultant::get('NULL', 'NULL');

		foreach ($result as $currentRow){
			unset($filesArray[$currentRow['consultant_id']]);
		}
		
		
		for($i=1; $i<count($files); $i++){
			if (isset($filesArray[$i]['id'])) {
				if($filesArray[$i]['id'] != 'defualt'){
					
					echo 'deleted - '.$filesArray[$i]['id'].' - '.$filesArray[$i]['filename'].'</p>';

					unlink($directoryIn .$filesArray[$i]['filename']);
				}
			}
		}
	
	}
}

?>