<?php
require 'access/dbaccess.php';
extract($_POST);
    $error=array();
    $extension=array("jpeg","jpg","png","gif");
    $path = NULL;
    $fileName = NULL;
    foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name)
            {
                $file_name=$_FILES["files"]["name"][$key];
                $file_tmp=$_FILES["files"]["tmp_name"][$key];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                if(in_array($ext,$extension))
                {
                    if(!file_exists("images/".$file_name))
                    {
                        $file_tmp=$_FILES["files"]["tmp_name"][$key];
                        move_uploaded_file($file_tmp,"images/".$file_name);
                        $filename = $file_name;
                        $path = "images/".$file_name;
                    }
                    else
                    {
                        $filename=basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        $path = "images/".$filename;
                        move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"images/".$newFileName);
                    }
                }
                else
                {
                    array_push($error,"$file_name, ");
                }
                $retval = $db->query("INSERT INTO manage_images (image_name, image_path, image_category, flag) VALUES ('$filename', '$path', 'None', 0)");
            }
 //           $filename=basename($file_name,pathinfo(,PATHINFO_EXTENSION));

            //$path = "images/".$filename.$ext;
            //echo $path;

//$stmt = $db->query("SELECT * FROM manage_images");
//$row1 = $stmt->fetch(PDO::FETCH_ASSOC);


if(! $retval )
    {
        ?>
<script>
    window.location = "manage_gallery.php?status=failure";
</script> 
<?php   
    }else{
        ?>
<script>
    window.location = "manage_gallery.php?status=success";
</script> 
<?php       
        }

?>
