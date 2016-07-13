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

</head>
<body>
	<?php 
    require 'access/dbaccess.php';
    if(isset($_GET['stdnt'])){
        $username = $_GET['stdnt'];
    }else{
        $username = NULL;
    }
	$id = 2;
	include("header.php"); 
	
    $data = $db->query("SELECT * FROM manage_students WHERE username='$username'");
    $row = $data->fetch(PDO::FETCH_ASSOC);
	?>
	
	        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-user"></i>
                            Student Details
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li >
                                <i class="fa fa-group"></i> <a href="manage_students.php">Manage Students</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-user"></i> Student Details
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
                            Great! The Student was added Successfully.
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
    <h3> <i class="fa fa-user"></i> Personal Details</h3>
    <hr>
        <div class="row">
        <div class="col-sm-2">
            <h4>First Name:</h4>
        </div>
        <div class="col-md-3">
            <h4><?= $row['fname'] ?></h4>
        </div>
        <div class="col-sm-2" >
            <h4>Gender:</h4>
        </div>
        <div class="col-md-3">
            <h4><?= $row['gender'] ?></h4>
        </div>
        </div>

        <div class="row">
        <div class="col-md-2">
            <h4>Middle Name:</h4>
        </div>
        <div class="col-md-3">
            <h4><?= $row['middle'] ?></h4>
        </div>
        <div class="col-sm-2" >
            <h4>Date of Birth:</h4>
        </div>
            <h4><?= $row['dob'] ?></h4>
        </div>

        <div class="row">
        <div class="col-md-2">
            <h4>Last Name:</h4>
        </div>
        <div class="col-md-3">
            <h4><?= $row['lname'] ?></h4>
        </div>
        <div class="col-sm-2" >
            <h4>Username:</h4>
        </div>
        <div class="col-md-3">
            <h4><?= $row['username'] ?></h4>
        </div>
        </div>

        <div class="row">
        <div class="col-md-2">
            <h4>Address:</h4>
        </div>
        <div class="col-md-3">
            <h4><?= $row['address'] ?></h4>
        </div>
        <div class="col-sm-2" >
            <h4>Pin:</h4>
        </div>
        <div class="col-md-3">
            <h4><?= $row['pin'] ?></h4>
        </div>
        </div><br/>

        <div class="row">
        <div class="col-md-2">
            <h4>Country:</h4>
        </div>
        <div class="col-md-3">
            <h4><?= $row['country'] ?></h4>
        </div>
        <div class="col-md-2">
            <h4>Contact No (M):</h4>
        </div>
        <div class="col-md-3">
            <h4><?= $row['mobile'] ?></h4>
        </div>
        </div>

        <div class="row">
        <div class="col-md-2">
            <h4>E-mail ID:</h4>
        </div>
        <div class="col-md-3">
            <h4><?= $row['email'] ?></h4>
        </div>
        <div class="col-md-2">
            <h4>Contact No (R):</h4>
        </div>
        <div class="col-md-3">
            <h4><?= $row['landline'] ?></h4>
        </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <h4>NewsLetter:</h4>
            </div>
            <div class="col-lg-4">
            <?php 
            if($row['newsletter'] == 1){
                echo "<h4 style='color:green'>Subscribed</h4>";
            }else{
                echo "<h4 style='color:red'>Not Subscribed</h4>";
            }
            ?>
            </div>
        </div>

        <hr>
        <h3> <i class="fa fa-table"></i> Courses Enroled</h3>
        <hr>

        <br/>
        <div class="row">
        <div class="col-lg-12" align="center">
        <button class="btn btn-primary" onclick="window.location='update_student.php?stdnt=<?= $row['username'] ?>'"><i class="fa fa-edit"></i> Edit</button>
        <button class="btn btn-warning" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
        </div>
        </div>


                </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    <?php include("footer.php"); ?>
</body>
</html>