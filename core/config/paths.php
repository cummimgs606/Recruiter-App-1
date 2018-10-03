<?php 

	$basePath = dirname($_SERVER['REQUEST_URI']);
	
	function getTP(){
		
		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) {
			return 'https'; 
		}else{ 
			return 'http';
		};
	}
	define('PATH_ROOT', 		getTP().'://'.$_SERVER['HTTP_HOST'].'/');			// PATH TO IMAGE LIBRYARY
	define('PATH_BASE' , 		dirname($basePath).'/'); 							// INCLUDES PATH FOR WEB - CSS JS HTML
	define('PATH_LOCALISED' , 	$basePath); 											// LINK PATH FOR RELATIVE FILES - PHP
	define('PATH_SERVER' ,		$_SERVER['DOCUMENT_ROOT'].dirname($basePath).'/'); 	// INCLUDE PATHS FOR SEVER - PHP CLASSES
	define('URL_BASE', 		getTP().'://'.$_SERVER['HTTP_HOST'].PATH_BASE); 		// NOT USED
	define('URL_LOCALISED', 	getTP().'://'.$_SERVER['HTTP_HOST'].PATH_LOCALISED); // LINKS PATH ABSOLUTE FOR WEB - EMAIL RESPONDERS EXTERNAL LINKS
	
	set_include_path(PATH_SERVER);
?>
