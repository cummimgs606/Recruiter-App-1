<?php


class Login{
	
	static function status(){	
	
		if(!isset($_SESSION['login_satus'] )){
		
			exit();
			
		}else{
			
			if($_SESSION['login_satus'] != 1){
				
				exit();
			}
		}
	}
	
	static function in(){	
	
		//echo '*** Login::in()</p>';
		
		$_SESSION['login_satus'] = 1;
		
		echo "<script type='text/javascript'>
				window.location.href = '".URL_BASE."web-admin/';
			  </script>";
	}
	
	 static function out(){	
	
	
		//echo '*** Login::out()</p>';
	
		$_SESSION['login_satus'] = 0;

		echo "<script type='text/javascript'>
						window.location.href = '".URL_BASE."web-admin-login/index.php?header-menu=User-Login';
					  </script>";
	}
}
?>



