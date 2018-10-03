<?php

class DisplayUpdateTextFields {
	
	
	public static function update($object){
			
		if (count($object) == 0){
			return;
		} ;
				
		echo '<script>';

		foreach( $object as $item => $val ) {
			if( is_array( $item ) ) {
				foreach( $item as $arrayItem) {
					echo $arrayItem;
				}
			} else {
				
				if($item == 'consultantImageJPG'){
					echo '$(\'[name="consultantImageIMG"]\').attr("src","'.$val.'");';
				}
				
				if($item != 'imageFileName'){
					echo '$(\'[name="'.$item.'"]\').val("'.$val.'");';
				}
			}
		}
		
		echo '</script>';
		
		/*
		
		foreach( $object as $item => $val ) {
			if( is_array( $item ) ) {
				foreach( $item as $arrayItem) {
					echo $arrayItem;
				}
			} else {
	
				echo 'var '.$item.' = '.$val.'</p>';
			}
		}
		*/
	}
}
?>

	
	
