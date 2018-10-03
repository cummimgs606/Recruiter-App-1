<form 	id		= "form" 
		class	= "pure-form pure-form-aligned" 
		enctype	= "multipart/form-data" 
        method	= "post" 
        action	= "<?php $_SERVER["PHP_SELF"] ?>">
        
        

    <fieldset>
        
        
        <div class="pure-control-group">                                  
       		<!--<label><?php echo 'Practice List'?></label>-->
			<input type="hidden" name="userList" class="pure-input-1-5"></input>
       	</div>
        
   		<div class="pure-controls">
            <button type="submit" name="submit" value="reset" class="pure-button pure-button-primary"><?php echo BUTTON_START_OVER ?></button>
        </div>

        <div class="pure-g">
        
        	<?php

            	$indexes = DisplayPracticeLinked::columnsIndex(DisplayPracticeLinked::columnsCreate(3, count($genericList)));
				DisplayPracticeLinked::columnsDraw($indexes, $genericList, $severList, $userList);
			
			?>
        
        </div>
        

    </fieldset>
    
</form> 
  





						
								
							
							
							
							
							
								
							
	