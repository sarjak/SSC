<?php
require 'access/dbaccess.php';

if(isset($_POST['question'])){
	$question = $_POST['question'];
}else{
	$question = NULL;
}

if(isset($_POST['opt1'])){
	$opt1 = $_POST['opt1'];
}else{
	$opt1 = NULL;
}

if(isset($_POST['opt2'])){
	$opt2 = $_POST['opt2'];
}else{
	$opt2 = NULL;
}

if(isset($_POST['opt3'])){
	$opt3 = $_POST['opt3'];
}else{
	$opt3 = NULL;
}

if(isset($_POST['opt4'])){
	$opt4 = $_POST['opt4'];
}else{
	$opt4 = NULL;
}

if(isset($_POST['opt5'])){
	$opt5 = $_POST['opt5'];
}else{
	$opt5 = NULL;
}

if(isset($_POST['answer'])){
	$answer = $_POST['answer'];
	switch ($answer) {
		case 'a':
		case 'A':
			$answer = $opt1;
			break;
			
		case 'b':
		case 'B':
			$answer = $opt2;
			break;

		case 'c':
		case 'C':
			$answer = $opt3;
			break;

		case 'd':
		case 'D':
			$answer = $opt4;
			break;

		case 'e':
		case 'E':
			$answer = $opt5;
			break;
		
		default:
			$answer = "Error";
			break;
	}
}else{
	$answer = NULL;
}

if(isset($_POST['type'])){
	$type = $_POST['type'];
}else{
	$type = NULL;
}

if(isset($_POST['courseid'])){
	$cid = $_POST['courseid'];
}else{
	$cid = NULL;
}

if($type == "add"){
	$result = $db->query("INSERT INTO manage_questions (course_id, question, opt1, opt2, opt3, opt4, opt5, answer) VALUES ('$cid','$question','$opt1','$opt2','$opt3','$opt4','$opt5','$answer')");

	if(!$result){
    ?>
    <script>
        window.location = "manage_question.php?courseid=<?= $cid ?>&status=failure";
    </script> 
    <?php
        }else{
            ?>
    <script>
        window.location = "manage_question.php?courseid=<?= $cid ?>&status=success";
    </script> 
    <?php       
	}
}else if ($type == "update") {
	if(isset($_POST['questionid'])){
		$qid = $_POST['questionid'];
	}else{
		$qid = NULL;
	}
	$result = $db->query("UPDATE manage_questions SET question = '$question', opt1 = '$opt1', opt2 = '$opt2', opt3 = '$opt3', opt4 = '$opt4', opt5 = '$opt5', answer = '$answer' WHERE question_id = '$qid' ");

	if(!$result){
	?>
    <script>
        window.location = "add_question.php?qid=<?= $qid ?>&status=failure";
    </script> 
    <?php
        }else{
            ?>
    <script>
        window.location = "add_question.php?qid=<?= $qid ?>&status=success";
    </script> 
    <?php
	}
}

?>