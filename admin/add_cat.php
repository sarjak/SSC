<?php
require 'access/dbaccess.php';

if(isset($_POST['cat_name'])){
	$name = $_POST['cat_name'];
}else{
	$name = NULL;
}

if(isset($_POST['cat_desc'])){
	$desc = $_POST['cat_desc'];
}else{
	$desc = NULL;
}

if(isset($_POST['type'])){
	$type = $_POST['type'];
}else{
	$type = NULL;
}

if(isset($_POST['image_path'])){
	$image_path = $_POST['image_path'];
}else{
	$image_path = NULL;
}

if(isset($_POST['id'])){
	$cat_id = $_POST['id'];
}else{
	$cat_id = NULL;
}

if(! empty($_FILES['Uploadfiles']['name'])){

	$extension=array("jpeg","jpg","png","gif");
	$file_name=$_FILES["Uploadfiles"]["name"];
    $file_tmp=$_FILES["Uploadfiles"]["tmp_name"];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
    if(in_array($ext,$extension))
     {
          if(!file_exists("images/".$file_name))
                    {
                        $file_tmp=$_FILES["Uploadfiles"]["tmp_name"];
                        move_uploaded_file($file_tmp,"images/".$file_name);
                        $filename = $file_name;
                        $path = "images/".$file_name;
                    }
                    else
                    {
                        $filename=basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        $path = "images/".$newFileName;
                        move_uploaded_file($file_tmp=$_FILES["Uploadfiles"]["tmp_name"],"images/".$newFileName);
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

    $result = $db->query("INSERT INTO manage_category (category_name, category_desc, cat_image) VALUES ('$name', '$desc', '$path')");
    if(!$result){
            ?>
    <script>
        window.location = "manage_category.php?status=failure";
    </script> 
    <?php
        }else{
            ?>
    <script>
        window.location = "manage_category.php?status=success";
    </script> 
    <?php       
        }

}else if($type == "update"){

    $result = $db->query("UPDATE manage_category SET category_name = '$name', category_desc = '$desc', cat_image = '$path'WHERE category_id = '$cat_id'");
    
    if(!$result){
        ?>
    <script>
        window.location = "add_category.php?id=<?= $cat_id ?>&status=failure";
    </script> 
    <?php   
        }else{
            ?>
    <script>
        window.location = "add_category.php?id=<?= $cat_id ?>&status=success";
    </script> 
    <?php       
    }
}


?>