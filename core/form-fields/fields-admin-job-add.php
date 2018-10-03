<form 	class	= "pure-form pure-form-aligned" 
		method	= "post" 
		action	= "<?php echo $_SERVER['PHP_SELF'].'?menu=add'?>">
          

    <fieldset>
    
        <!--<legend><h3>Job Search</h3></legend>-->

        <!--------------------------------------------------------------------->    
           
        <legend></legend></p></p>

        <!--------------------------------------------------------------------->

        <div class="pure-control-group"> 
                                         
            <label>Job Title</label>
            
            <input name="jobTitle" type="text" placeholder="Job Title" class="pure-input-1-4"></input>
            
        </div>
        
        <!--------------------------------------------------------------------->

        <div class="pure-control-group"> 
                                         
            <label>Job Salary</label>
            
            <input name="jobSalary" type="text" placeholder="Job Salary" class="pure-input-1-4"></input>
            
        </div>   
             
        <!--------------------------------------------------------------------->

   		<div class="pure-control-group"> 
                                         
            <label>Job Description</label>
            
            <textarea name="jobDescription" class="pure-input-1-3" placeholder="Job Description" style="width:300px; height:200px;"></textarea>
            
        </div>
        
        <!--------------------------------------------------------------------->    
           
        <legend></legend></p></p>

        <!--------------------------------------------------------------------->       

   		<div class="pure-control-group">                                  
            <label>Job Featured</label>
            
           <select name="jobFeatured">
                <option value='0'>NO	</option>
                <option value='1'>YES	</option>
           </select>

        </div>
        
       	<!--------------------------------------------------------------------->    
           
        <legend></legend></p></p>
       
        <!--------------------------------------------------------------------->  
          
        <div class="pure-control-group"> 
                                         
            <label>Job Start Date</label>
            
            <input name="jobStartDate" type="text" placeholder="Job Start Date" class="pure-input-1-4" id="popupDatepicker-1"></input>
            
        </div>
        
        <!--------------------------------------------------------------------->
             
        <div class="pure-control-group"> 
                                         
            <label>Job Duration</label>
            
            <input name="jobDuration" type="text" placeholder="Job Duration" class="pure-input-1-4"></input>
            
        </div>  
               
        <!--------------------------------------------------------------------->       
        
        <div class="pure-control-group"> 
                                         
            <label>Job Expiry Date</label>
            
            <input name="jobExpiryDate" type="text" placeholder="Job Expiry Date" class="pure-input-1-4" id="popupDatepicker-2"></input>
            
        </div>    
        
        <!--------------------------------------------------------------------->    
           
        <legend></legend></p></p>

        <!--------------------------------------------------------------------->

        <div class="pure-control-group"> 
                                         
            <label>Job Response Email</label>
            
            <input name="jobResponseEmail" type="text" placeholder="Job Response Email" class="pure-input-1-4"></input>
            
        </div>  
        
       <!--------------------------------------------------------------------->   

        <div class="pure-control-group"> 
                                         
            <label>Job External Reference</label>
            
            <input name="jobExternalReference" type="text" placeholder="Job External Reference" class="pure-input-1-4"></input>
            
        </div>
        
        <!--------------------------------------------------------------------->    
           
        <legend></legend></p></p>

        <!---------------------------------------------------------------------> 
        
        <div class="pure-control-group">   
         
            <label>Job Source</label>

            	<?php 
				
					$result = JobSource::get('NULL');
					DisplayJobSource::asDropDown($result);
				
				?>

        </div> 
                          
        <!--------------------------------------------------------------------->    
           
        <legend></legend></p></p>

        <!--------------------------------------------------------------------->      

        <div class="pure-control-group"> 
                                         
            <label>Job Location Text</label>
            
            <input name="jobLocationText" type="text" placeholder="Job Location Text" class="pure-input-1-4"></input>
            
        </div> 
        
        <!--------------------------------------------------------------------->      

        <div class="pure-control-group"> 
                                         
            <label>Job Postal Code</label>
            
            <input name="postalCode" type="text" placeholder="Postal Code" class="pure-input-1-4"></input>
            
        </div>  

        <!--------------------------------------------------------------------->    
           
        <legend></legend></p></p>

        <!--------------------------------------------------------------------->
        
        <div class="pure-control-group">   
         
            <label>Job Type</label>

            	<?php 
				
					$result = JobType::get('NULL');
					DisplayJobType::asDropDown($result);
				
				?>

        </div> 
        
        <!--------------------------------------------------------------------->    
           
        <legend></legend></p></p>

        <!--------------------------------------------------------------------->
        
        <div class="pure-control-group">   
         
            <label>Consultant</label>

            	<?php 
				
					$result = Consultant::get('NULL','NULL');
					DisplayConsultant::asDropDown($result);
				
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
           
        <legend></legend></p></p>

        <!--------------------------------------------------------------------->
        
        <div class="pure-control-group">   
         
            <label>Language</label>

            	<?php 
				
					$result = Language::get(NULL);
					DisplayLanguage::asDropDown($result,'',42);
				
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
        

        <div class="pure-controls">
            <button name="submit" type="submit" class="pure-button pure-button-primary" value="add-job">Add</button>
        </div>
        
    </fieldset>
    
</form>


