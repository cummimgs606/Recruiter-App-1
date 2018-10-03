<?php

error_reporting(E_ALL);

class UserAdminLogin {

	public static function init() {
		
		require_once (dirname(dirname(__FILE__)) .'/config/paths.php');
		require_once (PATH_SERVER.'core/library/display/display-menu.php');
		require_once (PATH_SERVER.'core/library/display/display-user.php');
		require_once (PATH_SERVER.'core/library/display/display-update-form-fields.php');
		require_once (PATH_SERVER.'core/library/display/display-vars.php');
		require_once (PATH_SERVER.'core/library/login/login.php');
		require_once (PATH_SERVER.'core/library/procedures-admin/user/user.php');
		require_once (PATH_SERVER.'core/library/session/session-variables.php');	
		require_once (PATH_SERVER.'core/library/mail/mail.php');
		
		// ---------------------------------------------------------------------------
		// SET GET AND POST VARS
		// ---------------------------------------------------------------------------

		if(!isset($_GET['menu'])){
			$_GET['menu'] = 'login';	
		}		
		
		setSessionWithGet('menu', 'login');
		setSessionWithGet('header-menu', 'User-Login');
		
		$_SESSION['login_message'] 	= '';
		
		// ---------------------------------------------------------------------------
		// SET GET AND POST VARS
		// ---------------------------------------------------------------------------
		
		function setVars($value, $login_message){
			
			$_SESSION['menu'] 			= $value;
			$_GET['menu']				= $value;
			$_SESSION['login_message'] 	= $login_message;
		}
		
		if(isset($_POST['submit'])){
				
			if($_POST['submit'] == 'register-user'){
				
				
				$hash 	= password_hash($_POST['userPassword'], PASSWORD_BCRYPT, array("cost" => 10));
				$result = User::register(	$_POST['userName'], $hash);
							
				switch ($result) {
					
					case 1:
						
						setVars('login', 		'Please login');
				
						$_POST['userPassword'] 	= '';
						$_POST['userName'] 		= '';
						$_POST['submit'] 		= 'login-user';
						
						break;
						
					case 2:
					
						setVars('register', 	'To register please contact your administrator.')	;
					
						break;				
	
				}
			}
			
			
			if($_POST['submit'] == 'login-user'){
				
			
				if($_POST['userPassword'] == '' AND $_POST['userName'] == ''){
					
					$result = 0 ;	
					
				}else{
					
					$result = User::login($_POST['userName']);
				}
								
				switch ($result) {
					
					case 1:
					
						setVars('login', 	'Incorrect username or password ');
						
						break;
					case 2:
					
						setVars('register', 'Enter your new password');
						
						$_POST['submit'] = 'register-user';
						$_POST['userPassword'] 	= '';
						
						break;
					case 3:
						
						$hash = User::password($_POST['userName']);
						
						if (password_verify($_POST['userPassword'], $hash)) {
							
							
							$user = User::getByUserName($_POST['userName']);
							
							if(!empty($user)){
			
								foreach ($user as $currentRow){
				
									$userID				= $currentRow['user_id'];
									$userName			= $currentRow['user_name'];
									$userFirstName		= $currentRow['user_first_name']; 
									$userLastName		= $currentRow['user_last_name'];
									$userEmail			= $currentRow['user_email'];
	
								}
							}
							
													
							$messageSubject 	= 'HNCOM ADMIN Login';
							$messageFrom 		= 'admin@harveynash.com';
							$messageTo 			= 'mark.cummings@harveynash.com';
							$messageBody 		= '<b>'.$userFirstName.' '.$userLastName.'</b> logged in at '.date('l jS \of F Y h:i:s A').'</p> contact: '.$userEmail.'</p> user id: '.$userID;
							$messageAttach 		= '';
							
							Mail::send($messageSubject, $messageFrom, $messageTo, $messageBody, $messageAttach);
					
							Login::in();
							
						} else {
							
							setVars('login', 'Incorrect username or password ');
							
						}
						
						break;
				}
			}
		}
		
		
		// ---------------------------------------------------------------------------
		// DRAW HORIZONTAL MENU / ADD / GET / AMEND / DELETE
		// ---------------------------------------------------------------------------

		DisplayMenu::asHorizontalMenu('USER',['login','register']);	
	
		// ---------------------------------------------------------------------------	
		
		if(isset($_SESSION['menu'])){
			
			// ---------------------------------------------------------------------------

			if($_SESSION['menu'] == 'login'){
				
				echo '<div class="pure-g">
    					<div class="pure-u-1-2">
							<p>'; 
								require_once (PATH_SERVER.'core/form-fields/fields-admin-user-login.php');
				echo 	   	'</p>
						</div>
					</div>';	
			}
			
			// ---------------------------------------------------------------------------	

			if($_SESSION['menu'] == 'register'){
				
				echo '<div class="pure-g">
    					<div class="pure-u-1-2">
							<p>'; 
								require_once (PATH_SERVER.'core/form-fields/fields-admin-user-register.php');
				echo 	   	'</p>
						</div>
					</div>';	
			}
			
		}
		
		require_once (PATH_SERVER.'/web-templates/template-includes-javascript.php');
		
		DisplayVars::show($_POST);
		DisplayVars::show($_SESSION);

		DisplayUpdateTextFields::update($_POST);
	}
}

?>
