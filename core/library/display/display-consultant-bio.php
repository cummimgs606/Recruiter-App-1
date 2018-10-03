<?php

ini_set('display_errors', 'On');

class DisplayConsultantBios {
	
	
	public static function asForms($selectID = ''){
	
		echo '<div class="pure-control-group">';                                  
        echo '    <label><h3>Bio '.$selectID.'</h3></label>';
      	echo '</div> ';
		
		echo '<div class="pure-control-group">';                                  
        echo '    <label>Bio ID'.$selectID.'</label>';
        echo '    <input type="text" name="bioID'.$selectID.'" placeholder="Bio ID '.$selectID.'" class="pure-input-1-3" readonly></input>';
      	echo '</div> ';    

      	echo '<div class="pure-control-group">';                                  
        echo '    <label>Bio Title '.$selectID.'</label>';
        echo '    <input type="text" name="bioTitle'.$selectID.'" placeholder="Bio Title '.$selectID.'" class="pure-input-1-3" ></input>';
      	echo '</div> ';       
        
        echo '<div class="pure-control-group">';                                   
        echo '    <label>Bio Strapline '.$selectID.'</label>'; 
        echo '    <input type="text" name="bioStrapline'.$selectID.'" placeholder="Bio Strapline '.$selectID.'" class="pure-input-1-3"></input>'; 
        echo ' </div>';   
        
        echo '<div class="pure-control-group">';                                 
        echo '    <label>Bio Expertise '.$selectID.'</label>';
        echo '    <input type="text" name="bioExpertise'.$selectID.'" placeholder="Bio Expertise '.$selectID.'" class="pure-input-1-3"></input>';
        echo '</div>';
        
   		echo '<div class="pure-control-group">';                
        echo '    <label>Bio About '.$selectID.'</label>'; 
        echo '    <textarea name="bioAbout'.$selectID.'" class="pure-input-1-3" placeholder="Bio About '.$selectID .'" style="width:300px; height:200px;"></textarea>';
        echo '</div>';
		
		echo '<div class="pure-control-group"> ';  
        echo '	<label>Bio Language '.$selectID.'</label>';
				$result = Language::get();
				DisplayBioLanguage::asDropDown($result, '', $selectID );
        echo '</div>';	
		
        echo '<div class="pure-control-group">';  
        echo '	<label>Bio Brand '.$selectID.'</label>';
				$result = Brand::getByConsultant($_SESSION['consultantID']);
				DisplayBioBrand ::asDropDown($result, '', $selectID );
        echo '</div>';
		
		echo '<div class="pure-control-group">';  
        echo '	<label>Bio Team '.$selectID.'</label>';
				$result = Team::getByConsultant($_SESSION['consultantID']);
				DisplayBioTeam ::asDropDown($result, '', $selectID );
        echo '</div>';
	}
	
}
?>

	
	
