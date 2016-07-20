<?php
require 'access/dbaccess.php';

if(isset($_POST['type'])){
	$type = $_POST['type'];
}else{
	$type = NULL;
}

if(isset($_POST['id'])){
	$inst_id = $_POST['id'];
}else{
	$inst_id = NULL;
}

if(isset($_POST['inst_name'])){
	$inst_name = $_POST['inst_name'];
}else{
	$inst_name = NULL;
}

if(isset($_POST['inst_desc'])){
	$inst_desc = $_POST['inst_desc'];
}else{
	$inst_desc = NULL;
}

if(isset($_POST['inst_image'])){
	$image_path = $_POST['inst_image'];
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
	
	$result = $db->query("INSERT INTO manage_institute (institute_name, institute_desc, institute_image) VALUES ('$inst_name', '$inst_desc', '$path')");
    if(!$result){
            ?>
    <script>
        window.location = "manage_institute.php?status=failure";
    </script> 
    <?php
        }else{
            ?>
    <script>
        window.location = "manage_institute.php?status=success";
    </script> 
    <?php       
        }
	

}else if($type == "update"){

	$result = $db->query("UPDATE manage_institute SET institute_name = '$inst_name', institute_desc = '$inst_desc', institute_image = '$path' WHERE institute_id = '$inst_id'");
    
    if(!$result){
        ?>
    <script>
        window.location = "add_institute.php?inst_id=<?= $inst_id ?>&status=failure";
    </script> 
    <?php   
        }else{
            ?>
    <script>
        window.location = "add_institute.php?inst_id=<?= $inst_id ?>&status=success";
    </script> 
    <?php       
    }

}

?>