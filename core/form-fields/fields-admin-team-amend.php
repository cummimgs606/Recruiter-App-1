<form 	class	= "pure-form pure-form-aligned" 
		method	= "post" 
		action	= "<?php echo $_SERVER['PHP_SELF'].'?menu=amend'?>">

    <fieldset>
    
        <!--<legend><h3>Office Amend</h3></legend>-->
        
      	<!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label>Team ID</label>
            <input name="teamID" type="text" placeholder="Team ID" class="pure-input-1-3" readonly></input>
        </div>  
              
      	<!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label>Team Name</label>
            <input name="teamName" type="text" placeholder="Team Name" class="pure-input-1-3"></input>
        </div>
        
        <!--------------------------------------------------------------------->

   		<div class="pure-control-group">                                  
            <label>Team Description</label>
            <textarea name="teamDescription" class="pure-input-1-3" placeholder="Team Description" style="width:300px; height:200px;"></textarea>
        </div> 
        
        <!--------------------------------------------------------------------->
        
        <div class="pure-control-group">   
         
            <label>Brand</label>

            	<?php 
				
					$result = Brand::get('NULL');
					DisplayBrand::asDropDown($result);
				
				?>

        </div>   
         
       <!--------------------------------------------------------------------->     

        <div class="pure-controls">
			<button name="submit" type="submit" class="pure-button pure-button-primary" value="amend-team">Amend</button>
        </div>
        
    </fieldset>
    
</form>


