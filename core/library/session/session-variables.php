<?php

function clearSessionIndex($getIndex, $array){
	
	$flag = 0;

	foreach ($array as $value) {
		
		if(isset($_SESSION[$getIndex])){
			if($_SESSION[$getIndex] == $value){
				$flag = 1;
			}
		}
		
	}
	
	if(!$flag){
		
		$_SESSION[$getIndex] = NULL;
	}

}

function setSessionWithGet($getIndex, $defaultValue){
	
	
	
	if(!isset($_GET[$getIndex])){
			
		if(!isset($_SESSION[$getIndex])){
			
			$_SESSION[$getIndex] = $defaultValue;
		}
			
	}else{
		
			$_SESSION[$getIndex] = $_GET[$getIndex];
	}
}


function copySessionToPost($object){
	
	//echo ('*** copySessionToPost() </p>');
	
	foreach( $object as $item => $val ) {
		if( is_array( $item ) ) {
			foreach( $item as $arrayItem) {
				$_POST[$item] = $arrayItem;
			}
		} else {
			
			$_POST[$item] = $val;
		}
	}
}

function copyPostToSession($object){
	
	//echo ('*** copyPostToSession() </p>');
	
	foreach( $object as $item => $val ) {
		if( is_array( $item ) ) {
			foreach( $item as $arrayItem) {
				
				$_SESSION[$item] = $arrayItem;
			}
		} else {
			
			$_SESSION[$item] = $val;
		}
	}
}



/*
// SCAN TO SEE IF USED BELOW -- OTHERWISE DELETE

function copyPostToSession($object){
	
	//echo ('*** copyPostToSession() </p>');
	
	foreach( $object as $item => $val ) {
		if( is_array( $item ) ) {
			foreach( $item as $arrayItem) {
				
				$_SESSION[$item] = $arrayItem;
			}
		} else {
			
			$_SESSION[$item] = $val;
		}
	}
}



function varsToSession(){
	
	echo ('*** varsToSession() </p>');

	if(count($_GET)){
		echo ('$_GET COUNT > 1 </p>');
		copyPostToSession($_GET);
	}
		
	if(count($_POST)){	
		echo ('$_POST COUNT > 1 </p>');
		copyPostToSession($_POST);
	}
		
	//if(count($_SESSION)){
		//echo ('$_SESSION COUNT > 1 </p>');	
		//copySessionToPost($_SESSION);
	//}
}

function varsToSessionShow(){
	
	echo ('*** varsToSessionShow()</p>');
	
	if(isset($_GET)){
		//echo ('SET $_GET</p>');
		DisplayVars::show($_GET);
	}
		
	if(isset($_POST)){
		//echo ('SET $_POST</p>');
		DisplayVars::show($_POST);
	}
	
	if(isset($_SESSION)){
		//echo ('SET $_SESSION</p>');
		DisplayVars::show($_SESSION);
	}
}
*/
function varsClear(){
	
	unset($_POST);
	unset($_GET);
	
	session_unset(); 
	session_destroy();   
}

?>



