<form 	class	= "pure-form pure-form-aligned" 
		method	= "post" 
		action	= "<?php echo $_SERVER['PHP_SELF']?>?menu=delete">

    <fieldset>

      	<!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label>Consultant ID</label>
            <input type="text" name="consultantID" placeholder="Consultant ID" class="pure-input-1-3" readonly></input>
        </div>  
              
        <!---------------------------------------------------------------------> 
        
        <div class="pure-control-group">                                  
            <label>Consultant First Name</label>
            <input type="text" name="consultantFirstName" placeholder="Consultant First Name" class="pure-input-1-3" readonly></input>
        </div>
        
        <!--------------------------------------------------------------------->
        
        <div class="pure-control-group">                                  
            <label>Consultant Last Name</label>
            <input type="text" name="consultantLastName" placeholder="Consultant Last Name" class="pure-input-1-3" readonly></input>
        </div>
        
        <!--------------------------------------------------------------------->
        
        <div class="pure-controls">
			<button type="submit" name="submit" class="pure-button pure-button-primary" value="delete-consultant">Delete</button>
        </div>

    </fieldset>
    
</form>
