<?php
require 'access/dbaccess.php';

if(isset($_POST['name'])){
	$name = $_POST['name'];
}else{
	$name = NULL;
}

if(isset($_POST['address'])){
	$address = $_POST['address'];
}else{
	$address = NULL;
}

if(isset($_POST['state'])){
	$state = $_POST['state'];
}else{
	$state = NULL;
}

if(isset($_POST['country'])){
	$country = $_POST['country'];
}else{
	$country = NULL;
}

if(isset($_POST['mobile'])){
	$mobile = $_POST['mobile'];
}else{
	$mobile = NULL;
}

if(isset($_POST['office'])){
	$office = $_POST['office'];
}else{
	$office = NULL;
}

if(isset($_POST['email'])){
	$email = $_POST['email'];
}else{
	$email = NULL;
}

if(isset($_POST['time'])){
	$time = $_POST['time'];
}else{
	$time = NULL;
}

if(isset($_POST['description'])){
	$desc = $_POST['description'];
}else{
	$desc = NULL;
}

if(isset($_POST['image_path'])){
	$image_path = $_POST['image_path'];
}else{
	$image_path = NULL;
}

if(! empty($_FILES['Uploadfiles']['name'])){

	$extension=array("jpeg","jpg","png","gif");
	$file_name=$_FILES["Uploadfiles"]["name"];
    $file_tmp=$_FILES["Uploadfiles"]["tmp_name"];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
    if(in_array($ext,$extension))
     {
          if(!file_exists("images/profile/".$file_name))
                    {
                        $file_tmp=$_FILES["Uploadfiles"]["tmp_name"];
                        move_uploaded_file($file_tmp,"images/profile/".$file_name);
                        $filename = $file_name;
                        $path = "images/profile/".$file_name;
                    }
                    else
                    {
                        $filename=basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        $path = "images/profile/".$newFileName;
                        move_uploaded_file($file_tmp=$_FILES["Uploadfiles"]["tmp_name"],"images/profile/".$newFileName);
                    }
                }
                else
                {
                    die("Only 'jpeg, jpg, png, gif' file extensions are allowed");
                }
}else{
	$path = $image_path;
}

$row = $db->query("UPDATE manage_aboutus SET name = '$name', address = '$address', state = '$state', mobile = '$mobile', office = '$office', email = '$email', time = '$time', image = '$path', descr = '$desc' WHERE id = 1 ");

if(!$row){
	?>
	<script>
		window.location = 'manage_about_us.php?status=failure';
	</script>
	<?php
}else{
	?>
	<script>
		window.location = 'manage_about_us.php?status=success';
	</script>
	<?php
}

?>