<?php
require 'access/dbaccess.php';

if (isset($_POST['cid'])) {
	$cid = $_POST['cid'];
}else{
	$cid = NULL;
}
if($_FILES['Uploadfile']['name']){


     $fname = $_FILES['Uploadfile']['name'];
     
     $chk_ext = explode(".",$fname);
     
     if(strtolower($chk_ext[1]) == "csv")
     {
     
         $filename = $_FILES['Uploadfile']['tmp_name'];
         $handle = fopen($filename, "r");
    	$rows = 1;
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
        {
        	if($rows == 1){
        		$rows++;
        	}else{
        		$row = $db->query("INSERT INTO manage_questions (course_id,question,opt1,opt2,opt3,opt4,opt5,answer) VALUES ('$cid','$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]')");	
        		$rows++;
        	}
   	 	}

     fclose($handle);
     ?>
     <script>
     	window.location = 'manage_question.php?courseid=<?= $cid ?>&state=success';
     </script>
     <?php
     }else
     {
        die("Only .csv files are allowed.");
     }    

   }else{
   		die("File not found.".$cid);
   }
?>
