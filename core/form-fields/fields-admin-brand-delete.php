<form 	class	= "pure-form pure-form-aligned" 
		method	= "post" 
        name 	= "submitDelete"
		action	= "<?php echo PATH_BASE.'core/form-logic/logic-admin-ajax-return.php'?>">

	<fieldset>
        
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
					DisplayCountry::asDropDown($result, 'readonly disabled');
				?>
                
        </div>
    	
      	<!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label>Brand Name</label>
            <input name="brandName" type="text" placeholder="Brand Name" class="pure-input-1-3" readonly></input>
        </div>
   
        <!--------------------------------------------------------------------->

   		<div class="pure-control-group">                                  
            <label>Brand Description</label>
            <textarea name="brandDescription" class="pure-input-1-3" placeholder="Brand Description" style="width:300px; height:200px;" readonly></textarea>
            
        </div>

       <!--------------------------------------------------------------------->     

        <div class="pure-controls">
			<button name="submit" type="button" class="pure-button pure-button-primary" value="delete-brand">Delete</button>
        </div>
        
    </fieldset>
    
</form>


