<?php

//session_start(); //started in menu;
//session_unset(); 
//session_destroy(); 

error_reporting(E_ALL);

class ConsultantBrandPublic{

	public static function init($language, $brand) {
		
		require_once (dirname(dirname(__FILE__)) .'/config/paths.php');
		
		require_once (PATH_SERVER.'core/form-languages/language-'.$language.'.php');
		
		require_once (PATH_SERVER.'core/library/display/display-back-button.php');
		require_once (PATH_SERVER.'core/library/display/display-brand.php');
		require_once (PATH_SERVER.'core/library/display/display-bio.php');
		require_once (PATH_SERVER.'core/library/display/display-consultant.php');
		require_once (PATH_SERVER.'core/library/display/display-consultant-practice.php');
		require_once (PATH_SERVER.'core/library/display/display-consultant-brand.php');
		require_once (PATH_SERVER.'core/library/display/display-menu.php');
		require_once (PATH_SERVER.'core/library/display/display-vars.php');
		
		require_once (PATH_SERVER.'core/library/procedures-public/bio/bio.php');
		require_once (PATH_SERVER.'core/library/procedures-public/brand/brand.php');
		require_once (PATH_SERVER.'core/library/procedures-public/consultant/consultant.php');
		require_once (PATH_SERVER.'core/library/procedures-public/consultant-practice/consultant-practice.php');	
		require_once (PATH_SERVER.'core/library/session/session-variables.php');
		
		// ---------------------------------------------------------------------------
		// SET SESSION VARS BY GET
		// ---------------------------------------------------------------------------	
		
		clearSessionIndex('menu', ['gallery', 'gallery-item']);
		
		setSessionWithGet('menu', 'gallery');
		setSessionWithGet('brandID', 1);
		setSessionWithGet('consultantID', NULL);
		
		$_SESSION['brandID'] = $_SESSION['brandID'] == 0 ? $_SESSION['brandID'] = 1: $_SESSION['brandID'];
		
		$deleted = 0;
	
		// ---------------------------------------------------------------------------
		// DISPLAY : GENERATE ADMIN FORMS ACORDING TO MENU SELECTION
		// ---------------------------------------------------------------------------	
		
		if(isset($_SESSION['menu'])){
	
			if($_SESSION['menu'] == 'gallery-item'){
				
				
				echo '<div class="pure-g">
				
						<div class="pure-u-1-4">
							<p>';
	
								$result = Brand::get('NULL');
								DisplayBrand::asScrollList($result, 'gallery');
	
				echo 		'</p>
						</div>
			
						<div class="pure-u-1-2">';
						
								DisplayBackButton::render('gallery');	
													
								$result = Brand::get($_SESSION['brandID']);
								DisplayBrand::asTitle($result);
								
								$result = Consultant::get($_SESSION['consultantID']);
								DisplayConsultant::asGalleryItem($result, $_SESSION['brandID'], 'gallery', $deleted);
			
				echo 	    '</p>
						</div>
						
					</div>';	
			}
			
			if($_SESSION['menu'] == 'gallery'){
				
				echo '<div class="pure-g">
				
						<div class="pure-u-1-4">
							<p>';

								$result = Brand::get('NULL');
								DisplayBrand::asScrollList($result, 'gallery');
								
				echo 		'</p>
						</div>
			
						<div class="pure-u-1-2">';
						
								$getVars = '&brandID='.$_SESSION['brandID'].'&menu=gallery';
								DisplayBackButton::setURL('gallery',$getVars );

								$result = Brand::get($_SESSION['brandID']);
								DisplayBrand::asTitle($result);
							
								$result = Consultant::getByBrand($_SESSION['brandID']);
								DisplayConsultantBrand::asGallery($result, 'gallery-item');
								
				echo 	    '</p>
						</div>
						
					</div>';	
			}
			
		}

		DisplayVars::show($_SESSION);
	}
}
?>
