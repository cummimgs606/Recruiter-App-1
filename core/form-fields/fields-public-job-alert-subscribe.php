<form 	id		= "form" 
		class	= "pure-form pure-form-aligned" 
		enctype	= "multipart/form-data" 
        method	= "post" 
        action	= "<?php $_SERVER["PHP_SELF"] ?>">
<!--
$_POST['$candidateFirstName'],
$_POST['$candidateMiddleName'],
$_POST['$candidateLastName'],
$_POST['$candidateSalutation'],
$_POST['$candidateEmail'],
$_POST['$candidatePhoneHome'],
$_POST['$candidatePhoneMobile'],
$_POST['$jobAlertSubscribeKeyword'],
$_POST['$jobAlertSubscribeKocation'],
$_POST['$jobTypeID'],
$_POST['$brandID'],
$_POST['$countryID'],
$_POST['$languageID']
-->
    <fieldset>
    
        <legend><h3><?php echo TITLE_JOB_ALERT_SUBSCRIBE ?></h3></legend>
      
        <!--------------------------------------------------------------------->
        
        <legend><?php echo '<h5>'.LEGEND_NAME.'</h5>'; ?></legend>
    
        <div class="pure-control-group">                                  
            <label><?php echo FORM_SALUTATION ?></label>
            <input type="text" name="candidateSalutation" class="pure-input-1-4"></input>
        </div>
                
        
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
           
        <legend><?php echo '<h5>'.LEGEND_CONTACT.'</h5>'; ?></legend></p></p>
       

     	<!--------------------------------------------------------------------->
    
        <div class="pure-control-group">                                  
            <label><?php echo FORM_EMAIL_ADDRESS ?></label>
            <input type="text" name="candidateEmail" class="pure-input-1-4" required></input>
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
           
        <legend><?php echo '<h5>'.LEGEND_SEARCH_CRITERIA.'</h5>'; ?></legend></p></p>
       

     	<!--------------------------------------------------------------------->       
        
         <div class="pure-control-group">                                  
            <label><?php echo FORM_KEYWORD ?></label>
            <input type="text" name="jobAlertSubscribeKeyword" placeholder="Keyword" class="pure-input-1-4"></input>
        </div>
        
      	<!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label><?php echo FORM_LOCATION ?></label>
            <input type="text" name="jobAlertSubscribeKocation" placeholder="Location" class="pure-input-1-4"></input>
        </div> 
        
  		<!---------------------------------------------------------------------> 

        <div class="pure-control-group">   
         
            <label><?php echo JOB_TYPE ?></label>

            	<?php 
				
					$result = JobType::get('NULL');
					DisplayJobType::asDropDown($result);
				
				?>

        </div>
        
        <!--------------------------------------------------------------------->    
           
        <legend><?php echo '<h5>'.LEGEND_ADMIN.'</h5>'; ?></legend></p></p>
       

     	<!--------------------------------------------------------------------->

        <div class="pure-control-group">   
         
            <label><?php echo DROPDOWN_BRAND ?></label>

            	<?php 
				
					$result = Brand::get('NULL');
					DisplayBrand::asDropDown($result);
				
				?>

        </div>  
        
        <!---------------------------------------------------------------------> 

        <div class="pure-control-group">   
         
             <label><?php echo DROPDOWN_COUNTRY ?></label>

            	<?php 
				
					$result = Country::get('NULL');
					DisplayCountry::asDropDown($result);
				
				?>

        </div>
        
        <!---------------------------------------------------------------------> 

        <div class="pure-control-group">   
         
             <label><?php echo DROPDOWN_LANGUAGE ?></label>

            	<?php 
				
					$result = Language::get('NULL');
					DisplayLanguage::asDropDown($result);
				
				?>

        </div>       
        
       
        <!--------------------------------------------------------------------->
     	<!--
        <div class="pure-control-group">                                  
         	 <label><?php //echo '--- Brand' ?></label>
            <input type="text" name="brandID" class="pure-input-1-4" required></input>
        </div>       
        -->
        
        <!---------------------------------------------------------------------> 
         <!--      
        <div class="pure-control-group">                                  
            <label><?php //echo '--- Country ID' ?></label>
            <input type="text" name="countryID" class="pure-input-1-4"></input>
        </div>        
        -->
        <!--------------------------------------------------------------------->        
        <!--
        <div class="pure-control-group">                                  
           <label><?php //echo '--- Language'?></label>
            <input type="text" name="languageID" class="pure-input-1-4"></input>
        </div>
        -->
        <!--------------------------------------------------------------------->  
             
        <div class="pure-controls">
            <button type="submit" name="submit" class="pure-button pure-button-primary"><?php echo BUTTON_SUBSCRIBE ?></button>
        </div>

    </fieldset>
    
</form> 
  





						
								
							
							
							
							
							
								
							
	