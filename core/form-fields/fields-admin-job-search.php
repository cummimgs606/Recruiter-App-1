<form 	class	= "pure-form pure-form-aligned" 
		method	= "post" 
		action	= "<?php echo $_SERVER['PHP_SELF'].'?menu=search'?>">

    <fieldset>
    
        <!--<legend><h3>Job Search</h3></legend>-->
    	
      	<!--------------------------------------------------------------------->

        <div class="pure-control-group">  
                                        
            <label>Keyword</label>
            
            <input name="keyword" type="text" placeholder="keyword" class="pure-input-1-4"></input>
            
        </div>
        
        <!--------------------------------------------------------------------->

        <div class="pure-control-group"> 
                                         
            <label>Location</label>
            
            <input name="location" type="text" placeholder="location" class="pure-input-1-4"></input>
            
        </div>
        

        <!--------------------------------------------------------------------->

        
        <div class="pure-control-group">   
         
            <label>JobType</label>

            	<?php 
				
					$result = JobType::get('NULL');
					DisplayJobType::asDropDown($result);
				
				?>

        </div>
        
        <!--------------------------------------------------------------------->

        <div class="pure-control-group">   
         
            <label>Country</label>

            	<?php 
				
					$result = Country::get('NULL');
					DisplayCountry::asDropDown($result);
				
				?>

        </div>
        
        <!--------------------------------------------------------------------->

        <div class="pure-control-group">   
         
            <label>Brand</label>

            	<?php 
				
					$result = Brand::get('NULL');
					DisplayBrand::asDropDown($result);
				
				?>

        </div>

        <div class="pure-controls">
            <button name="submit" type="submit" class="pure-button pure-button-primary" value="search-job">Search</button>
        </div>
        
    </fieldset>
    
</form>


