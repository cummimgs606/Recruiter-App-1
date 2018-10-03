<?php

error_reporting(E_ALL);

class BrandAdmin {

	public static function init() {
		
		require_once (dirname(dirname(__FILE__)) .'/config/paths.php');
		require_once (PATH_SERVER.'core/form-logic/logic-admin-ajax-control.php');
		require_once (PATH_SERVER.'core/library/display/display-brand.php');
		require_once (PATH_SERVER.'core/library/display/display-country.php');
		require_once (PATH_SERVER.'core/library/display/display-menu.php');
		require_once (PATH_SERVER.'core/library/display/display-update-form-fields.php');
		require_once (PATH_SERVER.'core/library/display/display-vars.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/country/country.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/brand/brand.php');
		require_once (PATH_SERVER.'core/library/session/session-variables.php');
		
		// ---------------------------------------------------------------------------
		// SET SESSION VARS BY GET
		// ---------------------------------------------------------------------------
		
		setSessionWithGet('menu', 'get');
		setSessionWithGet('brandID', 1);
		
		// ---------------------------------------------------------------------------
		// DRAW HORIZONTAL MENU / ADD / GET / AMEND / DELETE
		// ---------------------------------------------------------------------------

		DisplayMenu::asHorizontalMenu('BRAND',['add','get','amend','delete']);		
	
		// ---------------------------------------------------------------------------
		// SUBMIT DATA TO DATABASE / ADD / AMEND / DELETE
		// ---------------------------------------------------------------------------
		
		if(Ajaxcontrol::deleteRow('brandID', 'delete-brand', 'do-not-delete-brand')){
				
			Brand::delete($_POST['brandID']);	
				
			$_POST['brandID'] = null;	
		}
		
		if(isset($_POST['submit'])){
			
			if($_POST['submit'] == 'add-brand'){
				
			 	Brand::add(		$_POST['brandName'], 
								$_POST['brandDescription'], 
								$_POST['countryID']);
			}
		
			if($_POST['submit'] == 'amend-brand'){

				Brand::amend(	$_POST['brandID'],
								$_POST['brandName'],
								$_POST['brandDescription'],
								$_POST['countryID']);
			}
		}
		
		// DISPLAY : GENERATE ADMIN FORMS ACORDING TO MENU SELECTION
			
		if(isset($_SESSION['menu'])){
			
			// ---------------------------------------------------------------------------
			
			if($_SESSION['menu'] == 'get'){
				
				echo '<div class="pure-g">
    					<div class="pure-u-1-2">
							<p>';
								$result = Brand::get('NULL');
								DisplayBrand::asScrollList($result, $_SESSION['menu']);
				echo 	    '</p>
						</div>
				
						<div class="pure-u-1-2">
							<p>';
								$result = Brand::get($_SESSION['brandID']);
								DisplayBrand::asTextList($result);
				echo		'</p>
						</div>
					</div>';	
			}
			
			// ---------------------------------------------------------------------------	
			
			if($_SESSION['menu'] == 'add'){
				
				echo '<div class="pure-g">
    					<div class="pure-u-1-2">
							<p>'; 
								require_once (PATH_SERVER.'core/form-fields/fields-admin-brand-add.php');
				echo 	    '</p>
						</div>
				
						<div class="pure-u-1-2">
							<p>
							</p>
						</div>
					</div>';	
			}
			
			// ---------------------------------------------------------------------------	

			if($_SESSION['menu'] == 'amend'){
				
				echo '<div class="pure-g">
						<div class="pure-u-1-2">
							<p>';
								$result = Brand::get('NULL');
								DisplayBrand::asScrollList($result, $_SESSION['menu']);
				echo 	    '</p>
						</div>
						
						<div class="pure-u-1-2">
							<p>';
								require_once (PATH_SERVER.'core/form-fields/fields-admin-brand-amend.php');
				echo 		'</p>
						</div>
					</div>';			
			}
			
			// ---------------------------------------------------------------------------	
			
			if($_SESSION['menu'] == 'delete'){
				
				echo '<div class="pure-g">
						<div class="pure-u-1-2">
							<p>';
								$result = Brand::get('NULL');
								DisplayBrand::asScrollList($result, $_SESSION['menu']);
				echo 	    '</p>
						</div>
						
						<div class="pure-u-1-2">
							<p>';
								require_once (PATH_SERVER.'core/form-fields/fields-admin-brand-delete.php');
				echo 		'</p>
						</div>
					</div>';			
			}
	
		}
	
		// ----------------------------------------------------------------------------	
		// POST DATA : ADD OFFICE DATA RESULT
		
		if(isset($_SESSION['brandID'])){
			
			$brand = Brand::get($_SESSION['brandID']);	
			
			if(!empty($brand)){
			
				foreach ($brand as $currentRow){
					
					$_POST['brandID'] 			= $currentRow['brand_id'];
					$_POST['brandName'] 			= $currentRow['brand_name'];
					$_POST['brandDescription'] 	= $currentRow['brand_description'];
					$_POST['countryID'] 			= $currentRow['country_id'];
				}
			}
		}
		
		// DISPLAY : WRITE POST VARS INTO FORMS
		
	
		if($_SESSION['menu'] == 'add'){
				$_POST = array();
		}
		
		
		require_once (PATH_SERVER.'/web-templates/template-includes-javascript.php');

		
		if($_SESSION['menu'] == 'delete'){
			
			?>
            
			<script 	src="<?php echo PATH_BASE?>/js/jquery-dialoge-confirm/dialoge-confirm.js"></script>
            
            <?PHP
		}
		
		
		DisplayVars::show($_POST);
		DisplayVars::show($_SESSION);

		DisplayUpdateTextFields::update($_POST);
	}
}

?>
