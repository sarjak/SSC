<?php
require 'access/dbaccess.php';

if(isset($_POST['cid'])){
	$cid = $_POST['cid'];
}

if(isset($_POST['type'])){
	$type = $_POST['type'];
}else{
	$type = NULL;
}

if(isset($_POST['mat_type'])){
	$mat_type = $_POST['mat_type'];
}else{
	$mat_type = NULL;
}

if($type == "add"){

	if($mat_type == "link"){

	for ($i=1; $i <= 20; $i++) { 
		if(isset($_POST['link'.$i])){
			$data = $_POST['link'.$i];
			$desc = $_POST['linkdesc'.$i];
			$row = $db->query("INSERT INTO manage_course_material (course_id,notes_category,notes_description,notes_path) VALUES ('$cid','link','$desc','$data')");

			if(!$row){
				die("Problem inserting data into Database.");
			}else{
				//echo "<br/>Done with ". $_POST['link'.$i]; 
			}

		}else{
			//echo "<br/>No data for" . $i;
		}
	}
	}else if($mat_type == "notes"){

		if(isset($_POST['notes_name'])){
			$notes_name = $_POST['notes_name'];
		}else{
			$notes_name = NULL;
		}

		if(isset($_POST['notes_desc'])){
			$notes_desc = $_POST['notes_desc'];
		}else{
			$notes_desc = NULL;
		}
$path = NULL;
	if(! empty($_FILES['Uploadfiles']['name'])){

		$extension=array("jpeg","jpg","png","gif","pdf");
		$file_name=$_FILES["Uploadfiles"]["name"];
    	$file_tmp=$_FILES["Uploadfiles"]["tmp_name"];
    	$ext=pathinfo($file_name,PATHINFO_EXTENSION);
    	if(in_array($ext,$extension))
     	{
          	if(!file_exists("notes/".$file_name))
                    	{
	                        $file_tmp=$_FILES["Uploadfiles"]["tmp_name"];
    	                    move_uploaded_file($file_tmp,"notes/".$file_name);
                        	$fileename = $file_name;
	                        $path = "notes/".$file_name;
                    	}
                    	else
                    	{	
	                        $filename=basename($file_name,$ext);
                        	$newFileName=$filename.time().".".$ext;
                        	$path = "notes/".$newFileName;
                        	move_uploaded_file($file_tmp=$_FILES["Uploadfiles"]["tmp_name"],"notes/".$newFileName);
                    	}
                	}	
                	else
                	{
	                    die("Only 'jpeg, jpg, png, gif, pdf' file extensions are allowed");
                	}
                	if ($_FILES['Uploadfiles']['error'] !== UPLOAD_ERR_OK) {
    					die("Upload failed with error " . $_FILES['Uploadfiles']['error']);
					}
		}
		$row = $db->query("INSERT INTO manage_course_material (course_id,notes_category,notes_title,notes_description,notes_path) VALUES ('$cid','notes','$notes_name','$notes_desc','$path')");

	}
}else{

	for ($i=1; $i <= 20; $i++) { 
		if(isset($_POST['link'.$i])){
			$data = $_POST['link'.$i];
			$desc = $_POST['linkdesc'.$i];
			$notes = $_POST['id'.$i];
			echo "Notes:".$notes;
			$row = $db->query("UPDATE manage_course_material SET notes_description = '$desc', notes_path = '$data' WHERE notes_id = '$notes'");

			if(!$row){
				die("Problem inserting data into Database.");
			}else{
				echo "<br/>Update Done with ". $_POST['link'.$i]; 
			}

		}else{
			echo "<br/>Update No data for" . $i;
		}
	}	

}
?>

<script type="text/javascript">
	
</script>