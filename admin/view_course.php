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
 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>

</style>
</head>
<body>
	<?php 
    require 'access/dbaccess.php';
	$id = 3;
    if(isset($_GET['courseid'])){
        $id = $_GET['courseid'];
    }else{
        $id = NULL;
    }
	include("header.php"); 

    $row = $db->query("SELECT * FROM manage_courses WHERE course_id = '$id'");
	$row1 = $row->fetch(PDO::FETCH_ASSOC);

    $result = $db->query("SELECT * FROM manage_category WHERE  category_id = '$row1[course_cat_id]' ");
    $result1 = $result->fetch(PDO::FETCH_ASSOC);
	?>
	
	        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-tasks"></i>
                            Course Details
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li >
                                <i class="fa fa-table"></i> <a href="manage_courses.php">Manage Courses</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-tasks"></i> Course Details
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
                            Nice! The Course was added Successfully.
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

            
                <div class="row">
                    <div class="col-xs-6 col-md-3">
                        <a href="#" class="thumbnail">
                            <img src="<?= $row1['image'] ?>" alt="...">
                        </a>
                    </div>
                    <div class="col-xs-6 col-md-4">
            <table width="100%">
                <tr>
                <td>
                <h4>Course: </h4>
                </td>
                <td>
                <b><?= $row1['course_name'] ?></b>
                </td>
                </tr>

                <tr>
                <td>
                <h4>Category: </h4>
                </td>
                <td>
                <b><?= $result1['category_name'] ?></b>
                </td>
                </tr>

                <tr>
                <td>
                <h4>Duration: </h4>
                </td>
                <td>
                <b><?= $row1['course_duration'] ?></b> (Days)
                </td>
                </tr>
            </table>
            </div>

            <div class="col-xs-6 col-md-4">
            <table width="100%">
                <tr>
                <td>
                <h4>Course Fees: </h4>
                </td>
                <td>
                <b><?= $row1['course_fees'] ?></b>
                </td>
                </tr>

                <tr>
                <td>
                <h4>Re-Exam Fees: </h4>
                </td>
                <td>
                <b><?= $row1['re_exam_fees'] ?></b>
                </td>
                </tr>

                <tr>
                <td>
                <h4>Status: </h4>
                </td>
                <td>
                <b><?= $row1['status'] ?></b>
                </td>
                </tr>
            </table>
            </div>
                </div>
            
                <h4>Course Description: </h4>
                <?= $row1['course_desc'] ?>

    <div class="row">
        <div class="col-lg-12" align="center">
            <button class="btn btn-primary" onclick="window.location='update_course.php?courseid=<?= $row1['course_id'] ?>'"><i class="fa fa-edit"></i> Edit</button>
            <button class="btn btn-warning" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
        </div>
    </div>
    <hr>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    <?php include("footer.php"); ?>
</body>
<script type="text/javascript">

</script>
</html>