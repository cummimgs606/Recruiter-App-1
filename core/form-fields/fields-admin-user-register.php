<form 	class	= "pure-form pure-form-aligned" 
		method	= "post" 
		action	= "<?php echo $_SERVER['PHP_SELF'].'?menu=register'?>">

    <fieldset>
    
        <!--<legend><h3>User Register</h3></legend>-->
            
      	<!--------------------------------------------------------------------->

        <div class="pure-control-group">                                  
            <label>User Name</label>
            <input name="userName" type="text" placeholder="User Name" class="pure-input-1-3"></input>
        </div>
        
        <!--------------------------------------------------------------------->

   		<div class="pure-control-group">                                  
            <label>User Password</label>
            <input name="userPassword" type="password" placeholder="User Password" class="pure-input-1-3"></input>

        </div> 
         
       <!--------------------------------------------------------------------->  
       
        <div class="pure-controls">
       		<?php echo $_SESSION['login_message'] ?></p>
        </div> 
        
        <!--------------------------------------------------------------------->    

        <div class="pure-controls">
			<button name="submit" type="submit" class="pure-button pure-button-primary" value="register-user">Register</button>
        </div>
        
        
        
    </fieldset>
    
</form>


