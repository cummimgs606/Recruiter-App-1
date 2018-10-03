<?php 
		
	$result = ConsultantPractice::getByConsultantRowCount($_SESSION['consultantID'], $_SESSION['consultantPracticeDeleted']);
	
	if($result == 0){
		
		echo 'A minimum of one practice is required - Add a new practice.</p>';
		
	}else if($result == 1){
				
		echo	'<form
					id		= "form" 
					class	= "pure-form pure-form-aligned" 
					enctype	= "multipart/form-data"
					method	= "post" 
					action	= "'.$_SERVER['PHP_SELF'].'?menu=amend">
					
					<fieldset>';
			
		echo 			'<legend></legend></p></p>';
						
						DisplayConsultantPractices::asForm(1);
			
		echo 			'<div class="pure-controls">
							<button type="submit" name="submit" class="pure-button pure-button-primary" value="amend-consultant-practice">Amend Practice</button>
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
						action	= "'.$_SERVER['PHP_SELF'].'?menu=amend">
						
						<fieldset>';
				
			echo 			'<legend></legend></p></p>';
							
							DisplayConsultantPractices::asForm($i);
				
			echo 			'<div class="pure-controls">
								<button type="submit" name="submit" class="pure-button pure-button-primary" value="amend-consultant-practice">Amend Practice</button>
							</div>
						
						</fieldset>
					</form>';
		}
	}
	
?>




