<?php
session_start();
function isLoginSessionExpired() {
	$login_session_duration = 900; 
	$current_time = time(); 
	if(isset($_SESSION['loggedin_time']) && isset($_SESSION["sid"])){  
		if(((time() - $_SESSION['loggedin_time']) > $login_session_duration)){ 
			return true; 
		} 
	}
	return false;
}

if(!isset($_SESSION['username']) || (isLoginSessionExpired()))
{
?>
   <script type="text/javascript">
		location.href = 'login.php';
	</script>
   <?php
   exit;
}
?>