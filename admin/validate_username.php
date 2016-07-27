<?php
require 'access/dbaccess.php';

if(isset($_GET['user'])){
	$user = $_GET['user'];
}else{
	$user = NULL;
}

$row = $db->query("SELECT username FROM manage_students WHERE username = '$user' ");
$cnt = 0;
while($row1 = $row->fetch(PDO::FETCH_ASSOC)){
	$cnt++;
}
if($cnt != 0){
	echo $cnt;
}

?>