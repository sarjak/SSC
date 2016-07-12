<?php
$db = new PDO('mysql:host=localhost;dbname=ssc;charset=utf8mb4', 'student_icard', 'student_icard');
if(! $db)
{
	die('Could not connect to database');
}else{
	//die('connect to database');
}
?>