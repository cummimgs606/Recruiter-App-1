<form 	class	= "pure-form pure-form-aligned" 
		method	= "post"
        name 	= "submitDelete"
		action	= "<?php echo PATH_BASE.'core/form-logic/logic-admin-ajax-return.php'?>">

    <fieldset>
    
        <!--<legend><h3>Office Amend</h3></legend>-->
        
      	<!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label>User ID</label>
            <input name="userID" type="text" placeholder="User ID" class="pure-input-1-3" readonly></input>
        </div>  
              
      	<!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label>User Name</label>
            <input name="userName" type="text" placeholder="User Name" class="pure-input-1-3" readonly></input>
        </div>
        
         <!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label>User First Name</label>
            <input name="userFirstName" type="text" placeholder="User First Name" class="pure-input-1-3" readonly></input>
        </div>
        
        <!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label>User Last Name</label>
            <input name="userLastName" type="text" placeholder="User Last Name" class="pure-input-1-3" readonly></input>
        </div>
        
        <!--------------------------------------------------------------------->
      
        <div class="pure-control-group">                                  
            <label>User Email</label>
            <input name="userEmail" type="text" placeholder="User Email" class="pure-input-1-3" readonly></input>
        </div>
        
        <!--------------------------------------------------------------------->

   		<div class="pure-control-group">                                  
            <label>User Admin</label>
            
           <select name="userAdmin" disabled>
                <option value='0' selected	>No		</option>
                <option value='1'			>Yes	</option>
           </select>

        </div> 
        
        <!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label>User Active Directory</label>
            <input name="userActiveDirectory" type="text" placeholder="User Active Directory" class="pure-input-1-3" readonly></input>
        </div> 
        
                
        <!--------------------------------------------------------------------->
        
        <div class="pure-control-group">   
         
            <label>Brand</label>

            	<?php 
				
					$result = Brand::get('NULL');
					DisplayBrand::asDropDown($result, 'disabled');
				
				?>

        </div>
         
       <!--------------------------------------------------------------------->     

        <div class="pure-controls">
			<button name="submit" type="submit" class="pure-button pure-button-primary" value="delete-user">Delete</button>
        </div>
        
    </fieldset>
    
</form>


