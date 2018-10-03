<form 	id		= "form" 
		class	= "pure-form pure-form-aligned" 
        enctype	= "multipart/form-data"
		method	= "post" 
		action	= "<?php echo $_SERVER['PHP_SELF'].'?menu=amend'?>">

    <fieldset>

      	<!--------------------------------------------------------------------->
        
        <?php 
		
			$result = Bio::getRowCount($_SESSION['consultantID'], 'NULL', 'NULL');
			
			if($result == 0){
				
				echo 'There are no bios to amend! Add a bio first.';
						
			}else{
				
				for($i = 1; $i <= $result ; $i ++){
		
					echo '<legend></legend></p></p>';
			
					DisplayConsultantBios::asForms($i);
				}
				
				echo '<div class="pure-controls">
						<button type="submit" name="submit" class="pure-button pure-button-primary" value="amend-bio">Amend Bio</button>
        			</div>';
			}
        ?>

        
        <!--------------------------------------------------------------------->
        
        
         
    </fieldset>
    
</form>
