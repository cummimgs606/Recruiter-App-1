<?php 
	session_start();

	require_once (dirname(dirname(__FILE__)) .'/core/config/paths.php');
	require_once (dirname(dirname(__FILE__)) .'/core/library/login/login.php');
		
	login::status();
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
        
	<?php 
			
		require_once ('../web-templates/template-header-menu-admin.php'); 
	?>

	<div class="main">
            
           <?php
		   
		   // ------------------------------------------------
		   // SET UP MENU
		   
		   	if(isset($_GET['header-menu'])){
				
				$_SESSION['header-menu'] = $_GET['header-menu'];
				
			}
			
			if(!isset($_GET['menu'])){
				
				$_GET['menu'] = 'get';
			}
			
			// ------------------------------------------------
			
			
		   if(isset($_SESSION['header-menu'])){
			   
			   if($_SESSION['header-menu'] == 'Candidate'){
            		require_once ('../core/form-logic/logic-admin-candidate.php');
           			CandidateAdmin::init(); 
				}
				
				if($_SESSION['header-menu'] == 'Brand'){
					require_once ('../core/form-logic/logic-admin-brand.php');
                	BrandAdmin::init();
				}
				
				if($_SESSION['header-menu'] == 'Office'){
					require_once ('../core/form-logic/logic-admin-office.php');
           			OfficeAdmin::init();   
				}
				
				if($_SESSION['header-menu'] == 'Practice'){
            		require_once ('../core/form-logic/logic-admin-practice.php');
           			PracticeAdmin::init();  ;
				}
				
				if($_SESSION['header-menu'] == 'Team'){
            		require_once ('../core/form-logic/logic-admin-team.php');
           			TeamAdmin::init(); 
				}
				
				if($_SESSION['header-menu'] == 'Team-Consultant'){
            		require_once ('../core/form-logic/logic-admin-team-consultant.php');
           			TeamConsultantAdmin::init(); 
				}
				
				if($_SESSION['header-menu'] == 'User'){
            		require_once ('../core/form-logic/logic-admin-user.php');
           			UserAdmin::init(); 
				}
				
				if($_SESSION['header-menu'] == 'Consultant'){
            		require_once ('../core/form-logic/logic-admin-consultant.php');
           			ConsultantAdmin::init(); 
				}
				
				if($_SESSION['header-menu'] == 'Consultant-Bio'){
            		require_once ('../core/form-logic/logic-admin-consultant-bio.php');
           			ConsultantBioAdmin::init(); 
				}
				
				if($_SESSION['header-menu'] == 'Consultant-Practice'){
            		require_once ('../core/form-logic/logic-admin-consultant-practice.php');
           			ConsultantPracticeAdmin::init(); 
				}
				
				if($_SESSION['header-menu'] == 'Practice-Linked'){
            		require_once ('../core/form-logic/logic-admin-practice-linked.php');
           			PracticeLinkedAdmin::init(); 
				}
				
				if($_SESSION['header-menu'] == 'Job'){
            		require_once ('../core/form-logic/logic-admin-job.php');
           			JobAdmin::init(); 
				}
				
				if($_SESSION['header-menu'] == 'Log-out'){
           			 Login::out();
				}
			}    
            ?>

		</div>

	</body>
    
</html>
