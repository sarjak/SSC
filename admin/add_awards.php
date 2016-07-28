<?php
require 'access/dbaccess.php';

if(isset($_POST['name'])){
	$name = $_POST['name'];
}else{
	$name = NULL;
}

if(isset($_POST['detail'])){
	$details = $_POST['detail'];
}else{
	$details = NULL;
}

if(isset($_POST['date'])){
	$date = $_POST['date'];
}else{
	$date = NULL;
}

if(isset($_POST['image_path'])){
    $image_path = $_POST['image_path'];
}else{
    $image_path = NULL;
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

if(! empty($_FILES['Uploadfiles']['name'])){

	$extension=array("jpeg","jpg","png","gif");
	$file_name=$_FILES["Uploadfiles"]["name"];
    $file_tmp=$_FILES["Uploadfiles"]["tmp_name"];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
    if(in_array($ext,$extension))
     {
          if(!file_exists("images/awards/".$file_name))
                    {
                        $file_tmp=$_FILES["Uploadfiles"]["tmp_name"];
                        move_uploaded_file($file_tmp,"images/awards/".$file_name);
                        $filename = $file_name;
                        $path = "images/awards/".$file_name;
                    }
                    else
                    {
                        $filename=basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        $path = "images/awards/".$newFileName;
                        move_uploaded_file($file_tmp=$_FILES["Uploadfiles"]["tmp_name"],"images/awards/".$newFileName);
                    }
                }
                else
                {
                    die("Only 'jpeg, jpg, png, gif' file extensions are allowed");
                }
}else{
	$path = $image_path;
}	

if($type == "add"){
	$row = $db->query("INSERT INTO manage_awards (name, detail, date, image) VALUES ('$name', '$details', '$date', '$path')");

	if(! $row){
		?>
		<script>
			window.location = 'manage_awards.php?status=failure';
		</script>
		<?php
	}else{
		?>
		<script>
			window.location = 'manage_awards.php?status=success';
		</script>
		<?php
	}

}elseif($type == "update"){
	$row = $db->query("UPDATE manage_awards SET name = '$name', detail = '$details', date = '$date', image = '$path' WHERE id = '$id' ");

	if(! $row){
		?>
		<script>
			window.location = 'add_award.php?id=<?= $id ?>&status=failure';
		</script>
		<?php
	}else{
		?>
		<script>
			window.location = 'add_award.php?id=<?= $id ?>&status=success';
		</script>
		<?php
	}

}

?>