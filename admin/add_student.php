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
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	<?php 
	$id = 2;
	include("header.php"); 
	
	?>
	
	        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-user"></i>
                            Add Student
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li >
                                <i class="fa fa-group"></i> <a href="manage_students.php">Manage Students</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-user"></i> Add Student
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

    <form action="add_stud.php" method="post" >
        <div class="well">
            <strong>NOTE:</strong> Fields marked with <span style="color:red">*</span> are mandatory.
        </div>
        <div class="row">
        <div class="col-sm-3">
            <h4>First Name:<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" required />
        </div>
        <div class="col-sm-2" align="right">
            <h4>Username:<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" required />
        </div>
        </div>

        <div class="row">
        <div class="col-md-3">
            <h4>Middle Name:<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" required />
        </div>
        <div class="col-sm-2" align="right">
            <h4>Password:<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <input type="password" class="form-control" required />
        </div>
        </div>

        <div class="row">
        <div class="col-md-3">
            <h4>Last Name:<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" required />
        </div>
        </div>

        <div class="row">
        <div class="col-md-3">
            <h4>Address:<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <textarea class="form-control" required></textarea>
        </div>
        </div><br/>

        <div class="row">
        <div class="col-md-3">
            <h4>Pin:</h4>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" />
        </div>
        </div>

        <div class="row">
        <div class="col-md-3">
            <h4>Country:<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" value="India" readonly />
        </div>
        </div>

        <div class="row">
        <div class="col-md-3">
            <h4>E-mail ID:</h4>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" />
        </div>
        </div>

        <div class="row">
        <div class="col-md-3">
            <h4>Contact No (M):<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" required />
        </div>
        </div>

        <div class="row">
        <div class="col-md-3">
            <h4>Contact No (R):</h4>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" />
        </div>
        </div>

        <br/>
        <div class="row">
        <div class="col-lg-6" align="center">
        <input type="submit" class="btn btn-primary" />
        <input type="submit" class="btn btn-danger" value="Reset" />
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