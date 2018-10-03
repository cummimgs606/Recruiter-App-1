<form 	class	= "pure-form pure-form-aligned" 
		method	= "post" 
		action	= "<?php echo $_SERVER['PHP_SELF']?>">

    <fieldset>
    
        <legend><h3><?php echo TITLE_GET ?></h3></legend>
    	
      	<!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label><?php echo 'Job ID'?></label>
            <input type="text" name="jobID" placeholder="Job ID" class="pure-input-1-4"></input>
        </div>
        
        <!--------------------------------------------------------------------->

        <div class="pure-controls">
            <button type="submit" name="submit" class="pure-button pure-button-primary"><?php echo BUTTON_SUBMIT ?></button>
        </div>
        
    </fieldset>
    
</form>


