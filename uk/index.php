<?php 
session_start();
//session_unset(); 
//session_destroy();
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
        
		<?php require_once ('../web-templates/template-header-menu-public.php'); ?>
  
		<div class="main">
            
           <?php
		   
		   /*
		   if(isset($_GET['jobID'])){
				
				if(isset($_GET['header-menu'])){
					
					if($_GET['header-menu'] == ''){

						$_SESSION['header-menu'] = 'Job Get';
					}
				}
				
			}
			*/
			
		   if(isset($_SESSION['header-menu'])){
				
				if($_SESSION['header-menu'] == 'Job Search'){
					require_once ('../core/form-logic/logic-public-job-search.php');
                	JobSearch::init('EN',1);
				}
				
				if($_SESSION['header-menu'] == 'Job Get'){
					require_once ('../core/form-logic/logic-public-job-get.php');
                	JobGet::init('EN',1);
				}
				
				if($_SESSION['header-menu'] == 'Job Apply'){
					require_once ('../core/form-logic/logic-public-job-apply.php');
                	JobApply::init('EN',1);
				}
				
				if($_SESSION['header-menu'] == 'Job Alert Subscribe'){
					require_once ('../core/form-logic/logic-public-job-alert-subscribe.php');
                	JobAlertSubscribe::init('EN',1);
				}
				
				if($_SESSION['header-menu'] == 'Job Alert Unsubscribe'){
					require_once ('../core/form-logic/logic-public-job-alert-unsubscribe.php');
                	JobAlertUnsubscribe::init('EN',1);
				}
				
				if($_SESSION['header-menu'] == 'Job Alert Email'){
					require_once ('../core/form-logic/logic-public-job-alert-email.php');
                	JobAlertEmail::init('EN',1);
				}
				
				if($_SESSION['header-menu'] == 'Consultants Teams'){
					require_once ('../core/form-logic/logic-public-consultant-team.php');
                	ConsultantTeamPublic::init('EN',1);
				}
				
				if($_SESSION['header-menu'] == 'Consultants Brands'){
					require_once ('../core/form-logic/logic-public-consultant-brand.php');
                	ConsultantBrandPublic::init('EN',1);
				}
				
				if($_SESSION['header-menu'] == 'Consultants Offices'){
					require_once ('../core/form-logic/logic-public-consultant-office.php');
                	ConsultantOfficePublic::init('EN',1);
				}
				
				if($_SESSION['header-menu'] == 'Consultants Practices'){
					require_once ('../core/form-logic/logic-public-consultant-practice.php');
                	PracticeLinkedPublic::init('EN',1);
				}				
			} 
            ?>

		</div>
       
	</body>
    
</html>
