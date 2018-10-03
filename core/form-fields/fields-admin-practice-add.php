<form 	class	= "pure-form pure-form-aligned" 
		method	= "post" 
		action	= "<?php echo $_SERVER['PHP_SELF'].'?menu=get'?>">

    <fieldset>
    
        <!--<legend><h3>Office Amend</h3></legend>-->
        
    	
      	<!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label>Practice Name</label>
            <input name="practiceName" type="text" placeholder="Practice Name" class="pure-input-1-3"></input>
        </div>
   
       <!--------------------------------------------------------------------->     

        <div class="pure-controls">
			<button name="submit" type="submit" class="pure-button pure-button-primary" value="add-practice">Add</button>
        </div>
        

        
    </fieldset>
    
</form>


