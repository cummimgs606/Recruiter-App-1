<form 	class	= "pure-form pure-form-aligned" 
		method	= "post" 
		action	= "<?php echo $_SERVER['PHP_SELF'].'?menu=amend'?>">

    <fieldset>
    
        <!--<legend><h3>Office Amend</h3></legend>-->
        
      	<!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label>Practice ID</label>
            <input name="practiceID" type="text" placeholder="Practice ID" class="pure-input-1-3" readonly></input>
        </div>  
              
      	<!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label>Practice Name</label>
            <input name="practiceName" type="text" placeholder="Practice Name" class="pure-input-1-3"></input>
        </div>
   
       <!--------------------------------------------------------------------->     

        <div class="pure-controls">
			<button name="submit" type="submit" class="pure-button pure-button-primary" value="amend-practice">Amend</button>
        </div>
        
    </fieldset>
    
</form>


