<form 	class	= "pure-form pure-form-aligned" 
		method	= "post" 
		action	= "<?php echo $_SERVER['PHP_SELF'].'?menu=get'?>">

    <fieldset>
    
        <!--<legend><h3>Job Search</h3></legend>-->
    	
      	<!--------------------------------------------------------------------->

        <div class="pure-control-group">  
                                        
            <label>Job IDs</label>
            
            <input name="jobIDs" type="text" placeholder="Job IDs" class="pure-input-1-4"></input>
            
        </div>
        
        <!--------------------------------------------------------------------->
<!---
         <div class="pure-control-group">   
         
            <label>Job Deleted</label>
            
            <select name="jobDeleted">
            
                <option value='0' 	>No	</option>
                <option value='1'	>Yes</option>
            </select>
        
        </div>
 --->      
         <!--------------------------------------------------------------------->
<!---
         <div class="pure-control-group">   
         
            <label>Job Expired</label>
            
            <select name="jobExpired">
            
                <option value='0' 	>No	</option>
                <option value='1'	>Yes</option>
            </select>
        
        </div>
--->   
        <!--------------------------------------------------------------------->

        <div class="pure-controls">
            <button name="submit" type="submit" class="pure-button pure-button-primary" value="get-job">Get</button>
        </div>
        
    </fieldset>
    
</form>


