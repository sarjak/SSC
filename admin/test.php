<?php
$user1 = "sarjak";
//$user2 = "ronak";
$salt = hash('sha256', $user1);
$password = "SOMEPASSWORD";
//$salt = sha1(md5($password));
$pass =  hash('sha512', $password)."<br/>";
echo hash('sha512', $password)."<br/>";
//$password = md5($password.$salt);
echo $salt.$pass;
echo "<br />". $pass;
$date = "14:01";

//$dateUS = DateTime::createFromFormat("h:i", $date)->format("h/i/A");
echo $dateUS;

?>
<script type="text/javascript">
//$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
</script>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table>
	<tr>
		<td><input type="radio" name="gender"></td>
		<td>Hello World</td>
	</tr>
</table>
</body>
</html>