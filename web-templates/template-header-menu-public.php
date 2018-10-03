<?php
	ini_set('display_errors', 'On');
	require_once ('../core/library/display/display-menu.php');
	
	DisplayMenu::sessionReset(['Job Search', 'Job Get', 'Job Apply']);
	DisplayMenu::asPrimryMenu('PUBLIC',['Job Search', 'Job Get', 'Job Apply', 'Job Alert Subscribe', 'Job Alert Unsubscribe', 'Job Alert Email']);
	DisplayMenu::asPrimryMenu('PUBLIC',['Consultants Brands', 'Consultants Offices', 'Consultants Teams', 'Consultants Practices']);	
?>

<script>
	(function (window, document) {
	document.getElementById('toggle').addEventListener('click', function (e) {
		document.getElementById('tuckedMenu').classList.toggle('custom-menu-tucked');
		document.getElementById('toggle').classList.toggle('x');
	});
	})(this, this.document);
</script>

