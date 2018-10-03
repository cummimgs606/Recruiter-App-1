<?php 
	//echo '*** logic-public-ajax-return.php</p>';
	
	session_start();
	require_once ('../library/session/session-variables.php');

	if (isset($_POST)) { 
		copyPostToSession($_POST);
	}
	
	if (isset($_GET)) { 
		copyPostToSession($_GET);
	}
?>


