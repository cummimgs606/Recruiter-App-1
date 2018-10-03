<form 	class	= "pure-form pure-form-aligned" 
		method	= "post" 
		action	= "<?php echo $_SERVER['PHP_SELF'].'?menu=search'?>">

    <fieldset>
    
       <legend></legend></p></p>
    	
      	<!--------------------------------------------------------------------->

        <div class="pure-control-group">  
                                        
            <label>Consultant IDs</label>
            
            <input name="consultantIDs" type="text" placeholder="Consultant IDs" class="pure-input-1-4"></input>
            
        </div>
        
        
         <!--------------------------------------------------------------------->

        <div class="pure-control-group">  
                                        
            <label>Consultant First Name</label>
            
            <input name="consultantFirstName" type="text" placeholder="Consultant First Name" class="pure-input-1-4"></input>
            
        </div>
        
         <!--------------------------------------------------------------------->

        <div class="pure-control-group">  
                                        
            <label>Consultant Last Name</label>
            
            <input name="consultantLastName" type="text" placeholder="Consultant Last Name" class="pure-input-1-4"></input>
            
        </div>
        
        <!--------------------------------------------------------------------->

        <div class="pure-control-group"> 
                                         
            <label>Consultant Email</label>
            
            <input name="consultantEmail" type="text" placeholder="Consultant Email" class="pure-input-1-4"></input>
            
        </div>
        
        <legend></legend></p></p>
        
        <!--------------------------------------------------------------------->

        
        <div class="pure-control-group">   
         
            <label>Office</label>

            	<?php 
				
					$result = Office::get();
					DisplayOffice::asDropDown($result);
				
				?>

        </div>
        
        <!--------------------------------------------------------------------->

        <div class="pure-control-group">   
         
            <label>Office Country</label>

            	<?php 
				
					$result = Country::getByOfficeConsultant();
					DisplayCountryOffice::asDropDown($result);
				
				?>

        </div>
        
        <!--------------------------------------------------------------------->

        <div class="pure-control-group">   
         
            <label>Practice</label>

            	<?php 
				
					$result = Practice::get('NULL');
					DisplayPractice::asDropDown($result);
				
				?>

        </div>
 
        <legend></legend></p></p>
               
        <!--------------------------------------------------------------------->

        <div class="pure-control-group">   
         
            <label>Team</label>

            	<?php 
				
					$result = Team::get('NULL');
					DisplayTeam::asDropDown($result);
				
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
        
        <!--------------------------------------------------------------------->

        <div class="pure-control-group">   
         
            <label>Brand Country</label>

            	<?php 
				
					$result = Country::getByBrandConsultant();
					DisplayCountryBrand::asDropDown($result);
				
				?>

        </div>
        
         <legend></legend></p></p>

        <div class="pure-controls">
            <button name="submit" type="submit" class="pure-button pure-button-primary" value="search-consultant">Search</button>
        </div>
        
    </fieldset>
    
</form>


