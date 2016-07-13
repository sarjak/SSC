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


?>
onclick="document.location='index.php?std=<?php echo "studntid" ?>'"