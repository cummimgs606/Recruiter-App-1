<?php 
		
	$result = Bio::getRowCount($_SESSION['consultantID'], 'NULL', 'NULL','NULL','NULL');
	
	if($result == 1){
		
		echo 'A minimum of one record is required - add a new record before deleting this one.</p>';
				
		echo	'<form
					id		= "form" 
					class	= "pure-form pure-form-aligned" 
					enctype	= "multipart/form-data"
					method	= "post" 
					action	= "'.$_SERVER['PHP_SELF'].'?menu=delete">
					
					<fieldset>';
			
		echo 			'<legend></legend></p></p>';
						
						DisplayConsultantBios::asForms(1);
			
		echo 		'</fieldset>
				
				</form>';
	
		
		
	}else{

		for($i = 1; $i <= $result ; $i ++){
				
			echo	'<form
						id		= "form" 
						class	= "pure-form pure-form-aligned" 
						enctype	= "multipart/form-data"
						method	= "post" 
						action	= "'.$_SERVER['PHP_SELF'].'?menu=delete">
						
						<fieldset>';
				
			echo 			'<legend></legend></p></p>';
							
							DisplayConsultantBios::asForms($i);
				
			echo 			'<div class="pure-controls">
								<button type="submit" name="submit" class="pure-button pure-button-primary" value="delete-bio">Delete Bio</button>
							</div>
						
						</fieldset>
					
					</form>';
		}
	}
	
?>


