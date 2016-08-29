<html>
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <script src="js/jquery.js"></script>
    <script src="ckeditor/ckeditor/ckeditor.js" ></script>
 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	<?php 
    require 'access/dbaccess.php';
    if(isset($_GET['courseid'])){
        $cid = $_GET['courseid'];
    }else{
        $cid = NULL;
    }
	$id = 3;
	include("header.php"); 

    
	?>
	
	        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-edit"></i>
                            Update Course
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li >
                                <i class="fa fa-table"></i> <a href="manage_courses.php">Manage Courses</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Update Course
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
<?php
            if((isset($_GET['status'])) && ($_GET['status'] == "success")){
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Nice! The Course was updated Successfully.
                        </div>
                    </div>
                </div>
                <?php
            }else if((isset($_GET['status'])) && ($_GET['status'] == "failure")){
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Oops! Something went Wrong.
                        </div>
                    </div>
                </div>
                <?php
            }
            
            ?>
<?php 
    $row = $db->query("SELECT * FROM manage_courses WHERE course_id = '$cid' ");
    $row1 = $row->fetch(PDO::FETCH_ASSOC);

    $inst = $db->query("SELECT * FROM manage_institute ");
    
?>
        <form action="add_courses.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="type" value="update" />
        <input type="hidden" name="cid" value="<?= $row1['course_id'] ?>" />
        <div >
            <strong>NOTE:</strong> Fields marked with <span style="color:red">*</span> are mandatory.
        </div><br/>

        <div class="row">
        <table width="95%" align="center">
            <tbody>
                <tr align="center">
                    <td>
                        <h4>Course Title:<span style="color:red">*</span></h4>        
                    </td>
                    <td width="30%">
                        <input type="text" name="name" class="form-control" value="<?= $row1['course_name'] ?>" required />
                    </td>
                    <td>
                        <h4>Category:<span style="color:red">*</span></h4>        
                    </td>
                    <td>
                        <select class="form-control" name="category" id="category" required>
                            <option value="0">-- Select --</option>
                        <?php
                        $category = $db->query("SELECT * FROM manage_category");
                            while ($cat = $category->fetch(PDO::FETCH_ASSOC)) {
                                if($cat['category_id'] == $row1['course_cat_id']){
                                    ?>
                                    <option value="<?= $cat['category_id'] ?>" selected><?= $cat['category_name'] ?></option>
                                    <?php    
                                }else{
                                ?>
                                <option value="<?= $cat['category_id'] ?>" ><?= $cat['category_name'] ?></option>
                                <?php
                                }
                            }
                        ?>
                        </select>
                    </td>
                </tr>

                <tr align="center">
                    <td>
                        <h4>Duration:<span style="color:red">*</span></h4>            
                    </td>
                    <td>
                        <input type="text" name="duration" class="form-control" value="<?= $row1['course_duration'] ?>" required />
                    </td>
                    <td>
                        <h4>Fees:<span style="color:red">*</span></h4>            
                    </td>
                    <td>
                        <input type="text" name="fees" class="form-control" value="<?= $row1['course_fees'] ?>" required />
                    </td>
                </tr>

                <tr align="center">
                    <td>
                        <h4>Re-Exam Fees:<span style="color:red">*</span></h4>            
                    </td>
                    <td>
                        <input type="text" name="re-exam" class="form-control" value="<?= $row1['re_exam_fees'] ?>" required />
                    </td>
                    <td>
                        <h4>Upload Image:</h4>            
                    </td>
                    <td>
                        <input type="file" name="Uploadfiles" id="Uploadfiles" />
                        <input type="hidden" name="fileUpload" value="<?= $row1['image'] ?>" />
                    </td>
                </tr>

                <tr align="center">
                    <td>
                        <h4>Institute:<span style="color:red">*</span></h4>
                    </td>
                    <td><select name="institute" class="form-control" required>
                        <option value="">-- Select --</option>
                    <?php
                        while ($inst1 = $inst->fetch(PDO::FETCH_ASSOC)) {
                            if($row1['institute_id'] == $inst1['institute_id']){
                            ?>
                                <option value="<?= $inst1['institute_id'] ?>" selected><?= $inst1['institute_name'] ?></option>
                            <?php    }else{
                                 ?>
                                <option value="<?= $inst1['institute_id'] ?>" ><?= $inst1['institute_name'] ?></option>
                            <?php

                            }

                        }                    
                    ?>
                        </select>
                    </td>
                    <td>
                        <h4>Short Description:<span style="color:red">*</span></h4>            
                    </td>
                    <td>
                        <textarea type="text" name="short_desc" class="form-control"><?= $row1['course_short_desc'] ?></textarea>
                    </td>
                </tr>
            </tbody>
        </table>
        <div style="margin:20 0 20 20">
            <h4>Course Description:<span style="color:red">*</span></h4>
            <textarea name="description" class="form-control ckeditor" rows="15" placeholder="Begin from here..." required><?= $row1['course_desc'] ?></textarea>
        </div>
        <br/>
        <div class="row">
        <div class="col-lg-12" align="center">
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
        
        </div>
        </div>
    </form>
    <hr>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    <?php include("footer.php"); ?>
</body>

</html>