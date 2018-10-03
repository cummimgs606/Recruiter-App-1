<?php 
		
	$result = ConsultantPractice::getByConsultantRowCount($_SESSION['consultantID'], $_SESSION['consultantPracticeDeleted']);
	
	
	if($result == 0){
		
		echo 'There is no record to undelete</p>';
		
	}else if($result == 1){
		
		echo 'There is no record to undelete</p>';
				
		echo	'<form
					id		= "form" 
					class	= "pure-form pure-form-aligned" 
					enctype	= "multipart/form-data"
					method	= "post" 
					action	= "'.$_SERVER['PHP_SELF'].'?menu=undelete">
					
					<fieldset>';
			
		echo 			'<legend></legend></p></p>';
						
						DisplayConsultantPractices::asForm(1, 'disabled');
			
		echo 			'<div class="pure-controls">
							<button type="submit" name="submit" class="pure-button pure-button-primary" value="undelete-consultant-practice">Undelete Practice</button>
						</div>
						
					</fieldset>
				</form>';
	
		
		
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
							
						DisplayConsultantPractices::asForm($i, 'disabled');
				
		echo 			'<div class="pure-controls">
							<button type="submit" name="submit" class="pure-button pure-button-primary" value="undelete-consultant-practice">Undelete Practice</button>
						</div>
						
					</fieldset>
				</form>';
		}
	}
	
?>




