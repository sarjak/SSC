<?php
session_start();

session_unset($_SESSION['username']);
session_destroy();
//$msg = "Logged out";
echo "
	<script>
		window.location = 'login.php';
	</script>";

?>

