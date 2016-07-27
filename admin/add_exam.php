<?php
require 'access/dbaccess.php';
//$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
if(isset($_POST['courseid'])){
    $cid = $_POST['courseid'];
}else{
    $cid = NULL;
}

if(isset($_POST['duration'])){
    $duration = $_POST['duration'];
}else{
    $duration = NULL;
}

if(isset($_POST['questions'])){
    $questions = $_POST['questions'];
}else{
    $questions = NULL;
}

if(isset($_POST['marks_per_question'])){
    $marks_per_question = $_POST['marks_per_question'];
}else{
    $marks_per_question = NULL;
}

if(isset($_POST['negative_marks'])){
    $negative_marks = $_POST['negative_marks'];
}else{
	$neg_marking = 0;
    $negative_marks = NULL;
}

if(isset($_POST['total_marks'])){
    $total_marks = $_POST['total_marks'];
}else{
    $total_marks = NULL;
}

if(isset($_POST['passing_marks'])){
    $passing_marks = $_POST['passing_marks'];
}else{
    $passing_marks = NULL;
}

if(isset($_POST['type'])){
    $type = $_POST['type'];
}else{
    $type = NULL;
}

if($type == "add"){
	$row = $db->query("INSERT INTO manage_exam (exam_id,duration,no_of_ques,marks_per_ques,neg_marking,neg_marks_per_ques,pass_marks) VALUES ('$cid', '$duration', '$questions', '$marks_per_question', '$neg_marking', '$negative_marks', '$passing_marks')");
	if(!$row){
		?>
		<script>
			window.location = 'view_course.php?courseid=<?= $cid ?>&status=failure';
		</script>
		<?php
	}else{
		?>
		<script>
			window.location = 'view_course.php?courseid=<?= $cid ?>&status=success';
		</script>
		<?php
	}
}elseif($type == "update"){
	$row = $db->query("UPDATE manage_exam SET duration = '$duration', no_of_ques = '$questions', marks_per_ques = '$marks_per_question', neg_marking = '$neg_marking', neg_marks_per_ques = '$negative_marks', pass_marks = '$passing_marks' WHERE exam_id = '$cid' ");
	if(!$row){
		?>
		<script>
			window.location = 'create_exam.php?courseid=<?= $cid ?>&status=failure';
		</script>
		<?php
	}else{
		?>
		<script>
			window.location = 'create_exam.php?courseid=<?= $cid ?>&status=success';
		</script>
		<?php
	}

}

?>