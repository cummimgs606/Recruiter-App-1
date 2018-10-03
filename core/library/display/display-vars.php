<?php

class DisplayVars {
	
	
	public static function show($object){
		
		//echo '*** DisplayVars::show()</p>';
		
		if (count($object) == 0){
			return;	
		} ;
		
		$objectType = "";
		
		if($object == $_POST){
			$objectType = "POST VARS";
		}else if($object == $_SESSION){
			$objectType = "SESSION VARS";
		}else if($object == $_GET){
			$objectType = "GET VARS";
		}
		
		echo '<div style="height:200px"></div>';
		
		echo '<div style="background-color:#E2E2E2; padding:16px;padding:16px">';
		echo "START ".$objectType.'</br>';
		echo "</div>";
		
		echo '<div style="background-color:#EFEFEF; padding:16px;padding-top:2px;padding-bottom:2px">';
		echo 	'<h6>';
	
					foreach( $object as $item => $val ) {
						if( is_array( $item ) ) {
							foreach( $item as $arrayItem) {
								echo $arrayItem;
							}
						} else {
							
							echo 'var '.$item.' = ';
							echo $val.'</p>';
						}
					}
				
		echo 	'</h6>';
		echo '</div>';
		
		echo '<div style="background-color:#E2E2E2; padding:16px;padding:16px">';
		echo "END ".$objectType.'</br>';
		echo "</div>";

	}
}
?>

	
    

	
