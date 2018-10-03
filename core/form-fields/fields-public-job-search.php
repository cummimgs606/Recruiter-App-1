<form 	class	= "pure-form pure-form-aligned" 
		method	= "post" 
		action	= "<?php echo $_SERVER['PHP_SELF']?>">

    <fieldset>
    
        <legend><h3><?php echo TITLE_SEARCH ?></h3></legend>
    	
      	<!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label><?php echo FORM_KEYWORD ?></label>
            <input type="text" name="keyword" placeholder="keyword" class="pure-input-1-4"></input>
        </div>
        
        <!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label><?php echo FORM_LOCATION ?></label>
            <input type="text" name="location" placeholder="location" class="pure-input-1-4"></input>
        </div>
        

        <!--------------------------------------------------------------------->

         <div class="pure-control-group">   
         
            <label><?php echo FORM_JOB_TYPE ?></label>
            
				<?php 
				
					$result = JobType::get('NULL');
					DisplayJobType::asDropDown($result);
				
				?>
            
            <!---
            <select name="jobTypeID">
                <option value='1' 	>Full Time	</option>
                <option value='2'	>Part Time	</option>
                <option value='3' 	>Contract	</option>
                <option value='4' 	>Temporary	</option>
                <option value='5' 	>Permanent	</option>
            </select>
            --->
        
        </div>

        <div class="pure-control-group">
            <label><?php echo FORM_BRAND ?></label>
            
               <?php 
				
					$result = Brand::get('NULL');
					DisplayBrand::asDropDown($result);
				
				?>
                
            <!---
            <select name="brandID">
                <option value='0' 	>Group</option>
                <option value='1'	>Harvey Nash Professional Recruitment</option>
                <option value='2' 	>Harvey Nash Executive Search</option>
                <option value='3' 	>Alumni</option>
                <option value='4' 	>Mortimer Spinks</option>
                <option value='5'	>Nash Direct</option>
                <option value='6' 	>Impact Executives</option>
                <option value='7' 	>NashTech</option>
                <option value='8' 	>Nash Technologies</option>
                <option value='9'	>Talent-IT</option>
                <option value='10' 	>Team4Talent</option>
            </select>
            --->
        
        </div>

        <!--------------------------------------------------------------------->

        <div class="pure-controls">
            <button type="submit" name="submit" class="pure-button pure-button-primary" value="submit"><?php echo BUTTON_SUBMIT ?></button>
        </div>
        
    </fieldset>
    
</form>


