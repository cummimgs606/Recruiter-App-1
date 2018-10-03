<form 	id		= "form" 
		class	= "pure-form pure-form-aligned" 
        enctype	= "multipart/form-data"
		method	= "post" 
		action	= "<?php echo $_SERVER['PHP_SELF'].'?menu=add'?>">

    <fieldset>

        <legend></legend>
       
      	<!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label>First Name</label>
            <input type="text" name="consultantFirstName" placeholder="First Name" class="pure-input-1-3"></input>
        </div>

        <div class="pure-control-group">                                  
            <label>Middle Name</label>
            <input type="text" name="consultantMiddleName" placeholder="Middle Name" class="pure-input-1-3"></input>
        </div>       
 
        <div class="pure-control-group">                                  
            <label>Last Name</label>
            <input type="text" name="consultantLastName" placeholder="Last Name" class="pure-input-1-3"></input>
        </div>  
            
        <!--------------------------------------------------------------------->    
           
        <legend></legend></p></p>

        <!--------------------------------------------------------------------->
        
        <div class="pure-control-group">                                  
            <label>Consultant Job Title</label>
            <input type="text" name="consultantJobTitle" placeholder="Job Title" class="pure-input-1-3"></input>
        </div>
        
        <!--------------------------------------------------------------------->

   		<div class="pure-control-group">                                  
            <label>Consultant Rank</label>
            
           <select name="consultantRank">
                <option value='1'>1	</option>
                <option value='2'>2	</option>
                <option value='3'>3	</option>
           </select>

        </div>
        
        <!--------------------------------------------------------------------->
        
        <div class="pure-control-group">                                  
            <label>Consultant Expertise</label>
            <input type="text" name="consultantExpertise" placeholder="Consultant Expertise" class="pure-input-1-3"></input>
        </div>
        
		<!--------------------------------------------------------------------->
         
        <legend></legend></p></p> 
         
        <div class="pure-control-group">                                  
            <label>Image Upload</label>
            <input type="file" name="imageFileName" class="pure-input-1-3"></input>
        </div>    

        <!--------------------------------------------------------------------->    
           
        <legend></legend></p></p>
   
      	<!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label>Consultant Email</label>
            <input type="text" name="consultantEmail" placeholder="Consultant Email" class="pure-input-1-3"></input>
        </div>
        
      	<!--------------------------------------------------------------------->
        
        <div class="pure-control-group">                                  
            <label>Consultant Linkedin</label>
            <input type="text" name="consultantLinkedin" placeholder="Consultant Linkedin" class="pure-input-1-3"></input>
        </div>
        
      	<!--------------------------------------------------------------------->
        
        <div class="pure-control-group">                                  
            <label>Consultant Twitter</label>
            <input type="text" name="consultantTwitter" placeholder="Consultant Twitter" class="pure-input-1-3"></input>
        </div>

        <!--------------------------------------------------------------------->    
           
        <legend></legend></p></p>
   
      	<!--------------------------------------------------------------------->
        
        <div class="pure-control-group">                                  
            <label>Consultant Phone Mobile</label>
            <input type="text" name="consultantPhoneMobile" placeholder="Consultant Phone Mobile" class="pure-input-1-3"></input>
        </div>
        
        <!--------------------------------------------------------------------->
        
        <div class="pure-control-group">   
         
            <label>Office</label>

            <?php 
				
				$result = Office::get();
				DisplayOffice::asDropDown($result);
				
			?>

        </div>   
        
        <!--------------------------------------------------------------------->    
           
        <legend></legend></p></p>
   
        
        <!--------------------------------------------------------------------->
        
        <div class="pure-controls">
			<button type="submit" name="submit" class="pure-button pure-button-primary" value="add-consultant">Add</button>
        </div>
         
    </fieldset>
    
</form>


<?php
/*
	@oid 	office_id
	@fn 	first_name
	@mn 	middle_name
	@ln 	last_name
	@jt 	job_title
	@eml 	email
	@li 	linkedin
	@tw		twitter
	@po		phone_office - NOT NEEDED
	@pm		phone_mobile
	@im		image
	@rk		rank
	@pr		practices
	@tm		team  - NOT NEEDED
	@bl		language_id
	@bb		brand_id
	@bs		strapline
	@be		expertise
	@ba		about
*/	
?> 