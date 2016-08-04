<?php
require 'access/dbaccess.php';

if(isset($_POST['question'])){
	$question = $_POST['question'];
}else{
	$question = NULL;
}

if(isset($_POST['answer'])){
	$answer = $_POST['answer'];
}else{
	$answer = NULL;
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
}else{
    $id = NULL;
}

if(isset($_POST['type'])){
	$type = $_POST['type'];
}else{
	$type = NULL;
}

if($type == "add"){
	$row = $db->query("INSERT INTO manage_faqs (question, answer, flag) VALUES ('$question', '$answer', 1)");

	if(! $row){
		?>
		<script>
			window.location = 'manage_faq.php?status=failure';
		</script>
		<?php
	}else{
		?>
		<script>
			window.location = 'manage_faq.php?status=success';
		</script>
		<?php
	}

}elseif($type == "update"){
	$row = $db->query("UPDATE manage_faqs SET question = '$question', answer = '$answer' WHERE id = '$id' ");

	if(! $row){
		?>
		<script>
			window.location = 'add_faq.php?id=<?= $id ?>&status=failure';
		</script>
		<?php
	}else{
		?>
		<script>
			window.location = 'add_faq.php?id=<?= $id ?>&status=success';
		</script>
		<?php
	}

}

?>