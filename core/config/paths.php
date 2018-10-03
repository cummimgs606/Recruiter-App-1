<?php 

	$basePath = dirname($_SERVER['REQUEST_URI']);
	
	function getTP(){
		
		if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']),array('off','no'))) {
			return 'https'; 
		}else{ 
			return 'http';
		};
	}
	define('PATH_ROOT', 			getTP().'://'.$_SERVER['HTTP_HOST'].'/');			// PATH TO IMAGE LIBRYARY
	define('PATH_BASE' , 		dirname($basePath).'/'); 							// INCLUDES PATH FOR WEB - CSS JS HTML
	define('PATH_LOCALISED' , 	$basePath); 											// LINK PATH FOR RELATIVE FILES - PHP
	define('PATH_SERVER' ,		$_SERVER['DOCUMENT_ROOT'].dirname($basePath).'/'); 	// INCLUDE PATHS FOR SEVER - PHP CLASSES
	define('URL_BASE', 			getTP().'://'.$_SERVER['HTTP_HOST'].PATH_BASE); 		// NOT USED
	define('URL_LOCALISED', 		getTP().'://'.$_SERVER['HTTP_HOST'].PATH_LOCALISED); // LINKS PATH ABSOLUTE FOR WEB - EMAIL RESPONDERS EXTERNAL LINKS
	
	
	
	/*
	echo 'PATH_BASE : 		'.PATH_BASE.'</p>';
	echo 'PATH_LOCALISED : 	'.PATH_LOCALISED.'</p>';
	echo 'PATH_SERVER : 	'.PATH_SERVER.'</p>';
	echo 'PATH_SERVER : 	'.PATH_SERVER.'</p>';
	echo 'URL_BASE : 		'.URL_BASE.'</p>';
	echo 'URL_LOCALISED : 	'.URL_LOCALISED.'</p>';
	*/
	/*
	PATH_BASE : /mark/jobs-api-v16/
	PATH_LOCALISED : /mark/jobs-api-v16/uk
	PATH_SERVER : /var/www/webroot/mark/jobs-api-v16/
	PATH_SERVER : /var/www/webroot/mark/jobs-api-v16/
	URL_BASE : http://10.3.5.56/mark/jobs-api-v16/
	URL_LOCALISED : http://10.3.5.56/mark/jobs-api-v16/uk
	*/
		
	set_include_path(PATH_SERVER);
?>
