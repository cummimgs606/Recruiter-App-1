<form 	id		= "form" 
		class	= "pure-form pure-form-aligned" 
		enctype	= "multipart/form-data" 
        method	= "post" 
        action	= "<?php $_SERVER["PHP_SELF"] ?>">

    <fieldset>
    
        <legend><h3><?php echo TITLE_APPLY ?></h3></legend>
 
        <!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label><?php echo FORM_FIRST_NAME ?></label>
            <input type="text" name="candidateFirstName" placeholder="" class="pure-input-1-4"></input>
        </div>
        

        <!--------------------------------------------------------------------->
                                
        <div class="pure-control-group">                                  
            <label><?php echo FORM_MIDDLE_NAME ?></label>
            <input type="text" name="candidateMiddleName" class="pure-input-1-4"></input>
    
        </div>

        <!--------------------------------------------------------------------->
    
        <div class="pure-control-group">                                  
            <label><?php echo FORM_LAST_NAME ?></label>
            <input type="text" name="candidateLastName" class="pure-input-1-4"></input>

        </div>

        <!--------------------------------------------------------------------->
    
        <div class="pure-control-group">                                  
            <label><?php echo FORM_SALUTATION ?></label>
            <input type="text" name="candidateSalutation" class="pure-input-1-4"></input>
        </div>
        
        <!--------------------------------------------------------------------->
    
        <div class="pure-control-group">                                  
            <label><?php echo FORM_EMAIL_ADDRESS ?></label>
            <input type="text" name="candidateEmailAddress" class="pure-input-1-4" required></input>
        </div>

        <!--------------------------------------------------------------------->
    
        <div class="pure-control-group">                                  
            <label><?php echo FORM_PHONE_HOME ?></label>
            <input type="text" name="candidatePhoneHome" class="pure-input-1-4"></input>
        </div>
    
        <!--------------------------------------------------------------------->
    
        <div class="pure-control-group">                                  
            <label><?php echo FORM_PHONE_MOBILE ?></label>
            <input type="text" name="candidatePhoneMobile" class="pure-input-1-4"></input>
        </div>

        <!--------------------------------------------------------------------->
    
        <div class="pure-control-group">                                  
            <label><?php echo FORM_CV_FILE_NAME ?></label>
            <input type="file" name="CVFileName" class="pure-input-1-4"></input>
        </div>
 
        <!--------------------------------------------------------------------->
    
        <div class="pure-control-group">                                  
            <!---<label>Candidate CV</label>--->
            <input type="hidden" name="candidateCV" class="pure-input-1-4"></input>
        </div>

        <!--------------------------------------------------------------------->
    
        <div class="pure-control-group">                                  
            <!---<label>Job Appication Campaign</label>--->
            <input type="hidden" name="jobAppicationCampaign" class="pure-input-1-4"></input>
        </div>
        
        <!--------------------------------------------------------------------->
    
        <div class="pure-control-group">                                  
            <!---<label>Job Appication Keyword</label>--->
            <input type="hidden" name="jobAppicationKeyword" class="pure-input-1-4"></input>
        </div>

        <!--------------------------------------------------------------------->
    
        <div class="pure-control-group">                                  
            <!---<label>Job Appication Location</label>--->
            <input type="hidden" name="jobAppicationLocation" class="pure-input-1-4"></input>
        </div>

        <!--------------------------------------------------------------------->
    
        <div class="pure-control-group">                                  
            <!---<label>Job ID</label>--->
            <input type="hidden" name="jobID" class="pure-input-1-4"></input>
        </div>

        <!--------------------------------------------------------------------->
    
        <div class="pure-control-group">                                  
            <!---<label>Job Title</label>--->
            <input type="hidden" name="jobTitle" class="pure-input-1-4"></input>
        </div>

        <!--------------------------------------------------------------------->
    
        <div class="pure-control-group">                                  
            <!---<label>Job Type ID</label>--->
            <input type="hidden" name="jobTypeID" class="pure-input-1-4"></input>
        </div>

        <!--------------------------------------------------------------------->
        
        <div class="pure-controls">
            <button type="submit" name="submit" class="pure-button pure-button-primary"><?php echo BUTTON_SUBMIT ?></button>
        </div>

    </fieldset>
    
</form> 





						
								
							
							
							
							
							
								
							
	