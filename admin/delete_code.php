<?php
require 'access/dbaccess.php';

if(isset($_GET['type'])){
	$type = $_GET['type'];

}else{
	$type = NULL;
}

if(isset($_GET['id'])){
	$id = $_GET['id'];
}else{
	$id = NULL;
}

if($type == "question"){
	$row = $db->query("DELETE FROM manage_questions WHERE question_id = '$id'");	
}elseif ($type == "student") {
	$row = $db->query("UPDATE manage_students SET active = 0 WHERE username = '$id'");
}elseif ($type == "image") {
	$row = $db->query("UPDATE manage_images SET flag = 0 WHERE sr_no = '$id'");
}elseif ($type == "institute"){
	
	$row = $db->query("SELECT * FROM manage_courses WHERE institute_id = '$id' AND status = 'Active' ");
	//$rows = $row->fetch(PDO::FETCH_ASSOC);
	$cnt=0;
	while($rows = $row->fetch(PDO::FETCH_ASSOC)){
		$cnt++;
	}
	if($cnt == 0){
		$row = $db->query("UPDATE manage_institute SET flag = 0 WHERE institute_id = '$id'");
	}else{
		echo $cnt;
	}
	
}elseif ($type == "category") {
	$row = $db->query("SELECT * FROM manage_courses WHERE course_cat_id = '$id' AND flag = 1 ");
	
	$cnt=0;

	while($rows = $row->fetch(PDO::FETCH_ASSOC)){
		$cnt++;
	}
	if($cnt == 0){
		$row = $db->query("UPDATE manage_category SET flag = 0 WHERE category_id = '$id'");
	}else{
		echo $cnt;
	}
}elseif ($type == "awards") {
	$row = $db->query("UPDATE manage_awards SET flag = 0 WHERE id = '$id'");
}elseif ($type == "workshop") {
	$row = $db->query("UPDATE manage_workshops SET flag = 0 WHERE id = '$id'");
}elseif ($type == "material") {
die("");
	$row = $db->query("UPDATE manage_course_material SET flag = 0 WHERE id = '$id'");
}elseif ($type == "terms") {
	$row = $db->query("UPDATE manage_terms SET flag = 0 WHERE id = '$id'");
}elseif ($type == "faq") {
	$row = $db->query("UPDATE manage_faqs SET flag = 0 WHERE id = '$id'");
}


?>