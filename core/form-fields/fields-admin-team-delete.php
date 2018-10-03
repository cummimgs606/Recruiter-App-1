<form 	class	= "pure-form pure-form-aligned" 
		method	= "post" 
	    name 	= "submitDelete"
		action	= "<?php echo PATH_BASE.'core/form-logic/logic-admin-ajax-return.php'?>">

    <fieldset>
    
        <!--<legend>Team Delete</legend>-->
        
      	<!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label>Team ID</label>
            <input name="teamID" type="text" placeholder="Team ID" class="pure-input-1-3" readonly></input>
        </div>  
              
      	<!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label>Team Name</label>
            <input name="teamName" type="text" placeholder="Team Name" class="pure-input-1-3" readonly></input>
            
        </div>
        
        <!--------------------------------------------------------------------->

   		<div class="pure-control-group">                                  
            <label>Team Description</label>
            <textarea name="teamDescription" class="pure-input-1-3" placeholder="Team Description" style="width:300px; height:200px;" readonly></textarea>
        </div>

        <!--------------------------------------------------------------------->
        
        <div class="pure-control-group">   
         
            <label>Brand</label>

            	<?php 
				
					$result = Brand::get('NULL');
					DisplayBrand::asDropDown($result, 'disabled');
				
				?>

        </div> 
           
       <!--------------------------------------------------------------------->     

        <div class="pure-controls">
			<button name="submit" type="submit" class="pure-button pure-button-primary" value="delete-team">Delete</button>
        </div>
        
    </fieldset>
    
</form>


