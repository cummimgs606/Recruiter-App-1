<form 	id		= "form" 
		class	= "pure-form pure-form-aligned" 
        enctype	= "multipart/form-data"
		method	= "post" 
		action	= "<?php echo $_SERVER['PHP_SELF'].'?menu=amend'?>">

    <fieldset>

      	<!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label>Consultant ID</label>
            <input type="text" name="consultantID" placeholder="Consultant ID" class="pure-input-1-3" readonly></input>
        </div>  
              
        <!--------------------------------------------------------------------->    
           
        <legend></legend></p></p>
        
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
            <label>Consultant Image</label>
            <input 	type="text" 	name="consultantImage" placeholder="Consultant Image" class="pure-input-1-3" readonly></input>
        </div> 
        
        <!---------------------------------------------------------------------> 
         
        <div class="pure-control-group">                                  
            <input 	type="text" 	name="consultantImageJPG" placeholder="Consultant Image JPG" class="pure-input-1-3" hidden></input>
        </div> 
        
        <!--------------------------------------------------------------------->
        
       
        <div class="pure-control-group"> 
        	<label></label>
            <img src="" name="consultantImageIMG" class="pure-input-1-3" width="33%" height="33%"> 
        </div>
        
		<!--------------------------------------------------------------------->
               
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
 
        
           
        <legend></legend></p></p>
        
        <!--------------------------------------------------------------------->
        
        <div class="pure-controls">
			<button type="submit" name="submit" class="pure-button pure-button-primary" value="amend-consultant">Amend</button>
        </div>
         
    </fieldset>
    
</form>

