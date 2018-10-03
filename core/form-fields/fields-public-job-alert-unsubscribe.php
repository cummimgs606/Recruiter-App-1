<form 	id		= "form" 
		class	= "pure-form pure-form-aligned" 
		enctype	= "multipart/form-data" 
        method	= "post" 
        action	= "<?php $_SERVER["PHP_SELF"] ?>">

    <fieldset>
    
        <legend><h3><?php echo TITLE_JOB_ALERT_UNSUBSCRIBE ?></h3></legend>
        
        <!--------------------------------------------------------------------->
    
        <div class="pure-control-group">                                  
            <label><?php echo FORM_EMAIL_ADDRESS ?></label>
            <input type="text" name="candidateEmail" class="pure-input-1-4" required></input>
        </div>
    	
        <!--------------------------------------------------------------------->
        
        <div class="pure-controls">
            <button type="submit" name="submit" class="pure-button pure-button-primary"><?php echo BUTTON_SUBMIT ?></button>
        </div>

    </fieldset>
    
</form> 
  





						
								
							
							
							
							
							
								
							
	