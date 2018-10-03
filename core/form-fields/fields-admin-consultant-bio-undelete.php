<?php 
		
	$result = Bio::getRowCount($_SESSION['consultantID'], 'NULL', 'NULL', 'NULL', 1);
	
	if($result == 0){
		
		echo 'There are no bios to undelete.</p>';
		
	}else{
	
	
		for($i = 1; $i <= $result ; $i ++){
				
			echo	'<form
						id		= "form" 
						class	= "pure-form pure-form-aligned" 
						enctype	= "multipart/form-data"
						method	= "post" 
						action	= "'.$_SERVER['PHP_SELF'].'?menu=undelete">
						
						<fieldset>';
				
			echo 			'<legend></legend></p></p>';
							
							DisplayConsultantBios::asForms($i);
				
			echo 			'<div class="pure-controls">
								<button type="submit" name="submit" class="pure-button pure-button-primary" value="undelete-bio">Undelete Bio</button>
							</div>
						
						</fieldset>
					
					</form>';
		}
		
	}
	
	
?>


