
<?php
require 'access/dbaccess.php';

if(isset($_POST['fname'])){
	$fname = $_POST['fname'];
}else{
	$fname = NULL;
}

if(isset($_POST['middle'])){
	$middle = $_POST['middle'];
}else{
	$middle = NULL;
}

if(isset($_POST['lname'])){
	$lname = $_POST['lname'];
}else{
	$lname = NULL;
}

if(isset($_POST['gender'])){
	$gender = $_POST['gender'];
}else{
	$gender = NULL;
}

if(isset($_POST['dob'])){
	$dob = $_POST['dob'];
}else{
	$dob = NULL;
}

if(isset($_POST['address'])){
	$address = $_POST['address'];
}else{
	$address = NULL;
}

if(isset($_POST['pin'])){
	$pin = $_POST['pin'];
}else{
	$pin = NULL;
}

if(isset($_POST['country'])){
	$country = $_POST['country'];
}else{
	$country = NULL;
}

if(isset($_POST['email'])){
	$email = $_POST['email'];
}else{
	$email = NULL;
}

if(isset($_POST['contact_m'])){
	$contact_m = $_POST['contact_m'];
}else{
	$contact_m = NULL;
}

if(isset($_POST['contact_r'])){
	$contact_r = $_POST['contact_r'];
}else{
	$contact_r = NULL;
}

if(isset($_POST['username'])){
	$username = $_POST['username'];
}else{
	$username = NULL;
}

if(isset($_POST['password'])){
	$password = $_POST['password'];
}else{
	$password = NULL;
}

if(isset($_POST['student'])){
	$student = $_POST['student'];
}else{
	$student = NULL;
}

if(isset($_POST['newsletter'])){
	$newsletter = $_POST['newsletter'];
}else{
	$newsletter = 0;
}

$users = $db->query("SELECT username FROM manage_students WHERE username = '$username'");
$row = $users->fetch(PDO::FETCH_ASSOC);
$salt = hash('sha256', $username);
$passwrd =  hash('sha512', $password);
$pass = $salt.$passwrd;

if(($row) && ($student == "update")){
	$retval = $db->query("UPDATE manage_students SET fname = '$fname', middle = '$middle', lname = '$lname', address = '$address', pin = '$pin', country = '$country', email = '$email', mobile = '$contact_m', landline = '$contact_r', dob = '$dob', gender = '$gender', newsletter = '$newsletter', password = '$pass' WHERE username = '$username' ");
	if($retval){	
		?>
		<script >
			window.location = 'update_student.php?stdnt=<?= $row['username'] ?>&status=success';
		</script>
		<?php
	}else{
		?>
		<script >
			window.location = 'update_student.php?status=failure';
		</script>
		<?php
	}

}else if((!$row) && ($student == "add")){
	
	$retval = $db->query("INSERT INTO manage_students (username, password, fname, middle, lname, address, pin, country, newsletter, email, mobile, landline, gender, dob) VALUES ('$username', '$pass', '$fname', '$middle', '$lname', '$address', '$pin', '$country', 0, '$email', '$contact_m', '$contact_r', '$gender', '$dob')");	

	if($retval){
		
		?>

		<script >
			window.location = 'add_student.php?stdnt=<?= $row['username'] ?>&status=success';
		</script>
		<?php
	}else{
		?>
		<script >
			window.location = 'add_student.php?status=failure';
		</script>
		<?php
	}
}else{
	die("User Already Exists.");
}
?>