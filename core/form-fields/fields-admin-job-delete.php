<form 	class	= "pure-form pure-form-aligned" 
		method	= "post" 
		action	= "<?php echo $_SERVER['PHP_SELF'].'?menu=delete'?>">
          

    <fieldset>
    
        <!--<legend><h3>Job Search</h3></legend>-->
        
		<legend></legend>
        
      	<!--------------------------------------------------------------------->

        <div class="pure-control-group">  
                                        
            <label>Job ID</label>
            
            <input name="jobID" type="text" placeholder="Job ID" class="pure-input-1-4" readonly></input>
            
        </div>
        
        <!--------------------------------------------------------------------->    
           
        <legend></legend></p></p>
        
		<!--------------------------------------------------------------------->

        <div class="pure-control-group"> 
                                         
            <label>Job Title</label>
            
            <input name="jobTitle" type="text" placeholder="Job Title" class="pure-input-1-4" readonly></input>
            
        </div>
  
        
        <div class="pure-control-group"> 
                                         
            <label>Job Expiry Date</label>
            
            <input name="jobExpiryDate" type="text" placeholder="Job Expiry Date" class="pure-input-1-4" id="popupDatepicker-2" readonly></input>
            
        </div>   


        <div class="pure-control-group"> 
                                         
            <label>Job External Reference</label>
            
            <input name="jobExternalReference" type="text" placeholder="Job External Reference" class="pure-input-1-4" readonly></input>
            
        </div>
        
        <!--------------------------------------------------------------------->    
           
        <legend></legend></p></p>

        <!---------------------------------------------------------------------> 

        <div class="pure-control-group">   
         
            <label>Consultant</label>

            	<?php 
				
					$result = Consultant::get('NULL','NULL');
					DisplayConsultant::asDropDown($result, 'disabled');
				
				?>

        </div>  

        <!---------------------------------------------------------------------> 

        <legend></legend></p></p>

        <!--------------------------------------------------------------------->
 
        <div class="pure-controls">
            <button name="submit" type="submit" class="pure-button pure-button-primary" value="delete-job">Delete</button>
        </div>
        
    </fieldset>
    
</form>


