<?php

error_reporting(E_ALL);

require_once ('core/library/connections/connector.php');
require_once ('core/library/display/display-table.php');

class User extends Connector {
	
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	//----------------------------------------------------------------------------------------------//
	
	public static function get(	$userID = 'NULL', 
								$activeUserDirectory='NULL') {	
							
		//echo '*** User::Connector::get()</p>';
		$result = Connector::callProcedure("CALL pr_user_get(".$userID.",
															".$activeUserDirectory.")");
		return $result;
	}
	
	public static function getByUserName($userName = 'NULL') {	
							
		//echo '*** User::Connector::getByUserName()</p>';
		$result = Connector::callProcedure("CALL pr_user_get_by_user_name('".$userName."')");
		return $result;
	}
	
	public static function add(	$userName,
								$userFirstName,
								$userLastName,
								$userEmail,
								$userActiveDirectory,
								$userAdmin,
								$brandID) {	
								
		//echo '*** User::Connector::add()</p>';
		$result = Connector::callProcedure("CALL pr_user_add('".$userName."', 
															'".$userFirstName."', 
															'".$userLastName."', 
															'".$userEmail."', 
															'".$userActiveDirectory."', 
															".$userAdmin.",
															".$brandID.")");
		return $result;	
	}

	public static function amend($userID,
								$userName,
								$userFirstName,
								$userLastName,
								$userEmail,
								$userActiveDirectory,
								$userAdmin,
								$brandID) {	
							
		//echo '*** User::Connector::amend()</p>';
		$result = Connector::callProcedure("CALL pr_user_amend(	".$userID.",
																'".$userName."',
																'".$userFirstName."', 
																'".$userLastName."', 
																'".$userEmail."',  
																'".$userActiveDirectory."', 
																".$userAdmin.",
																".$brandID.")");
		return $result;
	}	
	
	public static function delete($userID) {	
		
		//echo '*** User::Connector::delete()</p>';
		$result = Connector::callProcedure("CALL pr_user_delete(".$userID.")");		
		return $result;
	}
	
	public static function login($userName) {	
		
		//echo '*** User::Connector::login()</p>';
		$result = Connector::callProcedure("CALL pr_user_login('".$userName."')");	
															   
		if(!empty($result)){
			
			foreach ($result as $currentRow){
				
					$returnValue = $currentRow['@user_status'];
			}
			
			return $returnValue ;
		}
	}
	
	public static function register($userName,
									$userPassword) {	
		
		//echo '*** User::Connector::register()</p>';
		$result = Connector::callProcedure("CALL pr_user_register('".$userName."', 
																 '".$userPassword."')");														
																				
		if(!empty($result)){
			
			foreach ($result as $currentRow){
				
					$returnValue = $currentRow['@user_status'];
			}
			
			return $returnValue ;
		}
	}
	
	public static function password($userName) {	
		
		//echo '*** User::Connector::password()</p>';
		$result = Connector::callProcedure("CALL pr_user_password('".$userName."')");														
																				
		if(!empty($result)){
			
			foreach ($result as $currentRow){
				
					$returnValue = $currentRow['user_password'];
			}
			
			return $returnValue ;
		}
	}
	
}










	
