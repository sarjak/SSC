<?php
require 'access/dbaccess.php';

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
                try{
                $salt = hash('sha256', $data[0]);
                $passwrd =  hash('sha512', $data[1]);
                $password = $salt.$passwrd;
                
                $dateUS = DateTime::createFromFormat("d/m/Y", $data[6])->format("Y/m/d");
                
        		$row = $db->query("INSERT INTO manage_students (username,password,fname,middle,lname,gender,dob,address,pin,country,newsletter,email,mobile,landline) VALUES ('$data[0]','$password','$data[2]','$data[3]','$data[4]','$data[5]','$dateUS','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]','$data[12]','$data[13]')");	
                
        		$rows++;
            }catch(Exception $e){
                die("Error".$e);
            }
        	}
   	 	}

     fclose($handle);
     ?>
     <script>
     	window.location = 'manage_students.php?state=success';
     </script>
     <?php
     }else
     {
        $msg = "Only .csv Files are Allowed."
        ?>
     <script>
        window.location = 'manage_students.php?state=failure&message='<?= $msg ?>;
     </script>
     <?php
     }    

   }else{
   		die("File not found.");
   }
?>
