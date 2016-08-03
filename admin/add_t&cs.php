<?php
require 'access/dbaccess.php';

if(isset($_POST['terms'])){
	$terms = $_POST['terms'];
}else{
	$terms = NULL;
}

if(isset($_POST['id'])){
	$id = $_POST['id'];
}else{
	$id = NULL;
}

if(isset($_POST['type'])){
	$type = $_POST['type'];
}

if($type == "add"){

	$row = $db->query("INSERT INTO manage_terms (terms,flag) VALUES ('$terms',1)");

	if(!$row){
		?>
		<script>
			window.location = 'add_t&c.php?status=failure';
		</script>
		<?php
	}else{
		?>
		<script>
			window.location = 'add_t&c.php?status=success';
		</script>
		<?php
	}

}elseif($type == "update"){

	$row = $db->query("UPDATE manage_terms SET terms = '$terms' WHERE id = '$id'");

	if(!$row){
		?>
		<script>
			window.location = 'add_t&c.php?id=<?= $id ?>&status=failure';
		</script>
		<?php
	}else{
		?>
		<script>
			window.location = 'add_t&c.php?id=<?= $id ?>&status=success';
		</script>
		<?php
	}

}

?>