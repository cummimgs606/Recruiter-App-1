<form 	class	= "pure-form pure-form-aligned" 
		method	= "post" 
		action	= "<?php echo $_SERVER['PHP_SELF'].'?menu=amend'?>">

    <fieldset>
    
      	<!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label>Office ID</label>
            <input name="officeID" type="text" placeholder="Office Name" class="pure-input-1-3" readonly></input>
        </div>
        
      	<!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label>Office Name</label>
            <input name="officeName" type="text" placeholder="Office Name" class="pure-input-1-3"></input>
        </div>

        <!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label>Office Address 1</label>
            <input name="officeAddress1" type="text" placeholder="Address 1" class="pure-input-1-3"></input>
        </div>
        

       <!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label>Office Address 2</label>
            <input name="officeAddress2" type="text" placeholder="Address 2" class="pure-input-1-3"></input>
        </div>

       <!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label>Office Address 3</label>
            <input name="officeAddress3" type="text" placeholder="Address 3" class="pure-input-1-3"></input>
        </div>
        
       <!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label>Office Address 4</label>
            <input name="officeAddress4" type="text" placeholder="Address 4" class="pure-input-1-3"></input>
        </div>
        
       <!--------------------------------------------------------------------->
       
       <div class="pure-control-group">                                  
            <label>Office Postal Code</label>
            <input name="officePostalCode" type="text" placeholder="Postal Code" class="pure-input-1-3"></input>
        </div>
        
       <!--------------------------------------------------------------------->
       
       <div class="pure-control-group">                                  
            <label>Office Telephone</label>
            <input name="officeTelephone" type="text" placeholder="Telephone" class="pure-input-1-3"></input>
        </div>
        
        <!--------------------------------------------------------------------->
        
        <div class="pure-control-group">   
         
            <label>Country</label>

            	<?php 
				
					$result = Country::get();
					DisplayCountry::asDropDown($result);
				
				?>

        </div>
        
       <!--------------------------------------------------------------------->     

        <div class="pure-controls">
			<button name="submit" type="submit" class="pure-button pure-button-primary" value="amend-office">Amend</button>
        </div>
        
    </fieldset>
    
</form>


