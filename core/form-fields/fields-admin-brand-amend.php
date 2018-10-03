<form 	class	= "pure-form pure-form-aligned" 
		method	= "post" 
		action	= "<?php echo $_SERVER['PHP_SELF'].'?menu=amend'?>">

    <fieldset>
    
        <!--<legend><h3>Office Amend</h3></legend>-->
        
      	<!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label>Brand ID</label>
            <input name="brandID" type="text" placeholder="brand ID" class="pure-input-1-3" readonly></input>
        </div>
        
        <!--------------------------------------------------------------------->
        
        <div class="pure-control-group">   
         
            <label>Country ID</label>

            	<?php 
				
					$result = Country::get();
					DisplayCountry::asDropDown($result);
				
				?>

        </div>
    	
      	<!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label>Brand Name</label>
            <input name="brandName" type="text" placeholder="Brand Name" class="pure-input-1-3"></input>
        </div>
   
        <!--------------------------------------------------------------------->

   		<div class="pure-control-group">                                  
            <label>Brand Description</label>
            <textarea name="brandDescription" class="pure-input-1-3" placeholder="Brand Description" style="width:300px; height:200px;"></textarea>
            
        </div>

       <!--------------------------------------------------------------------->     

        <div class="pure-controls">
			<button name="submit" type="submit" class="pure-button pure-button-primary" value="amend-brand">Amend</button>
        </div>
        

        
    </fieldset>
    
</form>


