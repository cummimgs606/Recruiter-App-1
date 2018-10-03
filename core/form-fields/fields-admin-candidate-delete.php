<form 	class	= "pure-form pure-form-aligned" 
		method	= "post" 
        name 	= "submitDelete"
		action	= "<?php echo PATH_BASE.'core/form-logic/logic-admin-ajax-return.php'?>">

	<fieldset>
        
      	<!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label>Candiate ID</label>
            <input name="candidateID" type="text" placeholder="candidate ID" class="pure-input-1-3" readonly></input>
        </div>
        
      	<!--------------------------------------------------------------------->

		
        <div class="pure-control-group">                                  
            <label>Candidate First Name</label>
            <input name="candidateFirstName" type="text" placeholder="Candiate First Name" class="pure-input-1-3" readonly></input>
        </div>
 
      	<!--------------------------------------------------------------------->
		
        <div class="pure-control-group">                                  
            <label>Candidate Middle Name</label>
            <input name="candidateMiddleName" type="text" placeholder="Candiate Middle Name" class="pure-input-1-3" readonly></input>
        </div>
  
      	<!--------------------------------------------------------------------->
	
        <div class="pure-control-group">                                  
            <label>Candidate Last Name</label>
            <input name="candidateLastName" type="text" placeholder="Candiate Last Name" class="pure-input-1-3" readonly></input>
        </div>
   	
        <!--------------------------------------------------------------------->  

        <div class="pure-controls">
			<button name="submit" type="button" class="pure-button pure-button-primary" value="delete-candidate">Delete</button>
        </div>
        
        
        
    </fieldset>
    
</form>


