<?php
require 'access/dbaccess.php';

if(isset($_POST['name'])){
	$course_name = $_POST['name'];
}else{
	//die("course");
	$course_name = NULL;
}

if(isset($_POST['duration'])){
	$course_duration = $_POST['duration'];
}else{
	$course_duration = NULL;
}

if(isset($_POST['fees'])){
	$course_fees = $_POST['fees'];
}else{
	$course_fees = NULL;
}

if(isset($_POST['re-exam'])){
	$course_re_exam = $_POST['re-exam'];
}else{
	$course_re_exam = NULL;
}

if(isset($_POST['description'])){
	$course_desc = $_POST['description'];
	//die($course_desc."ccccc");
}else{
	$course_desc = NULL;
	//die($course_desc."cccccd");
}

if(isset($_POST['category'])){
	$course_cat_id = $_POST['category'];
}else{
	$course_cat_id = NULL;
}

if(isset($_POST['type'])){
    $type = $_POST['type'];
}else{
    $type = NULL;
}

if(isset($_POST['cid'])){
    $cid = $_POST['cid'];
}else{
    $cid = NULL;
}

if(isset($_POST['fileUpload'])){
    $image_path = $_POST['fileUpload'];
}else{
    $image_path = NULL;
}

if(isset($_POST['institute'])){
    $inst_id = $_POST['institute'];

}else{
    $inst_id = NULL;
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

    $result = $db->query("INSERT INTO manage_courses (course_name, course_desc, course_cat_id, course_duration, course_fees, re_exam_fees, image, status, institute_id, flag ) VALUES ('$course_name', '$course_desc', '$course_cat_id' , '$course_duration', '$course_fees', '$course_re_exam', '$path', 'Active', $inst_id, 1 )");
    if(!$result){

            ?>
    <script>
        window.location = "manage_course.php?status=failure";
    </script> 
    <?php
        }else{
            ?>
    <script>
        window.location = "manage_course.php?status=success";
    </script> 
    <?php       
        }

}else if($type == "update"){

    $result = $db->query("UPDATE manage_courses SET course_name = '$course_name', course_desc = '$course_desc', course_cat_id = '$course_cat_id', course_duration = '$course_duration' , course_fees = '$course_fees', re_exam_fees = '$course_re_exam', image = '$path', status = 'Active', institute_id = '$inst_id' WHERE course_id = '$cid'");
    
    if(!$result){
        ?>
    <script>
        window.location = "update_course.php?courseid=<?= $cid ?>&status=failure";
    </script> 
    <?php   
        }else{
            ?>
    <script>
        window.location = "update_course.php?courseid=<?= $cid ?>&status=success";
    </script> 
    <?php       
    }
}


