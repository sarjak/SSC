<?php
session_start();
require 'access/dbaccess.php';

$user = $_POST['username'];
$password = $_POST['password'];

$row = $db->query("SELECT * FROM administrator WHERE username = '$user' ");
$row1 = $row->fetch(PDO::FETCH_ASSOC);

if($row1){
	if($password == $row1['password']){
		$_SESSION['sid']=session_id();
		$_SESSION['username'] = $user;
		$_SESSION['loggedin_time'] = time();
		?>
		<script>
			
			
        	//$_SESSION['loggedin_time'] = time();  
			window.location = 'index.php';
		</script>
		<?php
	}else{
		?>
		<script>
			window.location = 'login.php?status=failure';
		</script>
		<?php
	}
}else{
	?>
	<script>
		window.location = 'login.php?status=failure';
	</script>
	<?php
}

?>