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
        <div >
            <strong>NOTE:</strong> Fields marked with <span style="color:red">*</span> are mandatory.
        </div><br/>

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

        <div class="row">
        <div class="col-sm-3">
            <h4>First Name:<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <input type="text" name="fname" class="form-control" required />
        </div>
        <div class="col-sm-2" >
            <h4>Gender:<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <input type="radio" name="gender" value="Male" required /> Male
            <input type="radio" name="gender" value="Female" required /> Female
        </div>
        </div>

        <div class="row">
        <div class="col-md-3">
            <h4>Middle Name:<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <input type="text" name="middle" class="form-control" required />
        </div>
        <div class="col-sm-2" >
            <h4>Date of Birth:<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <input type="date" name="dob" class="form-control" required />
        </div>
        </div>

        <div class="row">
        <div class="col-md-3">
            <h4>Last Name:<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <input type="text" name="lname" class="form-control" required />
        </div>
        <div class="col-sm-2" >
            <h4>Username:<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <input type="text" name="username" class="form-control" required />
        </div>
        </div>

        <div class="row">
        <div class="col-md-3">
            <h4>Address:<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <textarea name="address" class="form-control" required></textarea>
        </div>
        <div class="col-sm-2" >
            <h4>Password:<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <input type="password" name="password" class="form-control" required />
        </div>
        </div><br/>

        <div class="row">
        <div class="col-md-3">
            <h4>Pin:</h4>
        </div>
        <div class="col-md-3">
            <input type="text" name="pin" class="form-control" />
        </div>
        </div>

        <div class="row">
        <div class="col-md-3">
            <h4>Country:<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <input type="text" name="country" class="form-control" value="India" readonly />
        </div>
        </div>

        <div class="row">
        <div class="col-md-3">
            <h4>E-mail ID:</h4>
        </div>
        <div class="col-md-3">
            <input type="text" name="email" class="form-control" />
        </div>
        </div>

        <div class="row">
        <div class="col-md-3">
            <h4>Contact No (M):<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <input type="text" name="contact_m" class="form-control" required />
        </div>
        </div>

        <div class="row">
        <div class="col-md-3">
            <h4>Contact No (R):</h4>
        </div>
        <div class="col-md-3">
            <input type="text" name="contact_r" class="form-control" />
        </div>
        </div>

        <br/>
        <div class="row">
        <div class="col-lg-6" align="center">
        <input type="submit" class="btn btn-primary" />
        <input type="reset" class="btn btn-danger" value="Reset" />
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
<script type="text/javascript">
function disableAllFields(){
    window.location = 'add_student.php';
/*
    var f = document.getElementsByTagName('input');
    for(var i=0;i<f.length;i++){
        if(f[i].getAttribute('type')=='text'){
            f[i].setAttribute('value',"")
        }
        if(f[i].getAttribute('type')=='radio'){
            f[i].setAttribute('checked',false)
        }
    }
    var f = document.getElementsByTagName('textarea');
    for(var i=0;i<f.length;i++){
        if(f[i].getAttribute('type')=='text'){
            f[i].setAttribute('value',"")
        }
    }
    */
}

</script>
</html>