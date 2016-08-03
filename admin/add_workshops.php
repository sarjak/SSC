<?php
require 'access/dbaccess.php';

if(isset($_POST['name'])){
	$name = $_POST['name'];
}else{
	$name = NULL;
}

if(isset($_POST['description'])){
	$description = $_POST['description'];
}else{
	$description = NULL;
}

if(isset($_POST['date'])){
	$date = $_POST['date'];
}else{
	$date = NULL;
}

if(isset($_POST['time'])){
	$time = $_POST['time'];
}else{
	$time = NULL;
}

if(isset($_POST['venue'])){
	$venue = $_POST['venue'];
}else{
	$venue = NULL;
}

if(isset($_POST['duration'])){
	$duration = $_POST['duration'];
}else{
	$duration = NULL;
}

if(isset($_POST['price'])){
	$price = $_POST['price'];
}else{
	$price = NULL;
}

if(isset($_POST['type'])){
	$type = $_POST['type'];
}else{
	$type = NULL;
}

if(isset($_POST['id'])){
	$id = $_POST['id'];
}else{
	$id = NULL;
}

if($type == "add"){
	$row = $db->query("INSERT INTO manage_workshops (name, description, time, duration, date, venue, price, active, flag) VALUES ('$name','$description','$time','$duration','$date','$venue','$price','Active','1') ");
	if(!$row){
		?>
		<script>
			window.location = 'manage_workshop.php?status=failure';
		</script>
		<?php
	}else{
		?>
		<script>
			window.location = 'manage_workshop.php?status=success';
		</script>
		<?php
	}
}elseif ($type == "update"){
	$row = $db->query("UPDATE manage_workshops SET name = '$name', description = '$description', time = '$time', duration = '$duration', date = '$date', venue = '$venue', price = '$price' WHERE id = '$id' ");
	if(!$row){
		?>
		<script>
			window.location = 'add_workshop.php?wid=<?= $id ?>&status=failure';
		</script>
		<?php
	}else{
		?>
		<script>
			window.location = 'add_workshop.php?wid=<?= $id ?>&status=success';
		</script>
		<?php
	}
}

?>