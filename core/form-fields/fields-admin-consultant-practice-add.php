<form 	id		= "form" 
		class	= "pure-form pure-form-aligned" 
        enctype	= "multipart/form-data"
		method	= "post" 
		action	= "<?php echo $_SERVER['PHP_SELF'].'?menu=add'?>">

    <fieldset>
    
    	<?php 
			$maxRecordsAsRank = ConsultantPractice::getByConsultantRowCount($_SESSION['consultantID'], $_SESSION['consultantPracticeDeleted']);
		?>
        
        
        

        <!--------------------------------------------------------------------->    
           
       <legend></legend></p></p>
   
      	<!--------------------------------------------------------------------->
        
        <?php 
       		DisplayConsultantPractices::asForm(1,'',$maxRecordsAsRank);
        ?>
 
        <legend></legend></p></p>
   
        <!--------------------------------------------------------------------->
        
        <div class="pure-controls">
			<button type="submit" name="submit" class="pure-button pure-button-primary" value="add-consultant-practice">Add Practice</button>
        </div>
         
    </fieldset>
    
</form>
