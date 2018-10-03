<?php 
	session_start();
?>

<!doctype html>

	<html lang="en">

        <head>
            <style><?php require_once ('../css/pure-css-horizontal-menu.css'); ?></style>
            <style><?php require_once ('../css/pure-css-overwrite.css'); ?></style>
            <style><?php require_once ('../css/main.css'); ?></style>
            
            <?php require_once ('../web-templates/template-includes-header.php'); ?>
            
        </head>
        
        <body>
            
            <?php require_once ('../web-templates/template-header-menu-login.php'); ?>
             
    
            <div class="main">
                
               <?php
			   
					if(isset($_GET['header-menu'])){
						
						$_SESSION['header-menu'] = $_GET['header-menu'];
					}
				   
				   if(isset($_SESSION['header-menu'])){
					   
					   if($_SESSION['header-menu'] == 'User-Login'){
							require_once ('../core/form-logic/logic-admin-user-login.php');
							UserAdminLogin::init(); 
						}
					} 
				   
                ?>
    
            </div>
            
        </body>
    
	</html>
