<?php
	ini_set('display_errors', 'On');
	require_once ('../core/library/display/display-menu.php');
	/*
	DisplayMenu::asPrimryMenu('ADMIN',['Brand','Office','User','Job']);
	DisplayMenu::asPrimryMenu('&#160 &#160 &#160 &#160 &#160 &#160 &#160 ',['Candidate' ]);	
	DisplayMenu::asPrimryMenu('&#160 &#160 &#160 &#160 &#160 &#160 &#160 ',['Consultant','Consultant-Bio','Consultant-Practice' ]);	
	DisplayMenu::asPrimryMenu('&#160 &#160 &#160 &#160 &#160 &#160 &#160 ',['Team','Team-Consultant']);
	DisplayMenu::asPrimryMenu('&#160 &#160 &#160 &#160 &#160 &#160 &#160 ',['Practice','Practice-Linked']);
	*/
	
	DisplayMenu::asPrimryMenu('ADMIN',[	'Brand',
										'Office',
										'User',
										'Job',
										'Candidate', 
										'Consultant',
										'Consultant-Bio',
										'Consultant-Practice',
										'Team',
										'Team-Consultant',
										'Practice',
										'Practice-Linked',
										'Log-out']);
?>

<script>
	(function (window, document) {
	document.getElementById('toggle').addEventListener('click', function (e) {
		document.getElementById('tuckedMenu').classList.toggle('custom-menu-tucked');
		document.getElementById('toggle').classList.toggle('x');
	});
	})(this, this.document);
</script>

