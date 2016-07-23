<?php
require 'access/dbaccess.php';

if(isset($_GET['qid'])){
	$qid = $_GET['qid'];
}else{
	$qid = NULL;
}

$row = $db->query("DELETE FROM manage_questions WHERE question_id = '$qid'");

?>