<?php
	ini_set('display_errors', 'On');
	require_once ('../core/library/display/display-menu.php');
	
	DisplayMenu::asPrimryMenu('ADMIN',['User-Login']);
?>

<script>
	(function (window, document) {
	document.getElementById('toggle').addEventListener('click', function (e) {
		document.getElementById('tuckedMenu').classList.toggle('custom-menu-tucked');
		document.getElementById('toggle').classList.toggle('x');
	});
	})(this, this.document);
</script>

