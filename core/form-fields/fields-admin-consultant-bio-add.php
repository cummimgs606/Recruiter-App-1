<form 	id		= "form" 
		class	= "pure-form pure-form-aligned" 
        enctype	= "multipart/form-data"
		method	= "post" 
		action	= "<?php echo $_SERVER['PHP_SELF'].'?menu=add'?>">

    <fieldset>

        <!--------------------------------------------------------------------->    
           
       <legend></legend></p></p>
   
      	<!--------------------------------------------------------------------->
        
        <?php 
       		DisplayConsultantBios::asForms();
        ?>
 
        <legend></legend></p></p>
   
        <!--------------------------------------------------------------------->
        
        <div class="pure-controls">
			<button type="submit" name="submit" class="pure-button pure-button-primary" value="add-bio">Add Bio</button>
        </div>
         
    </fieldset>
    
</form>
