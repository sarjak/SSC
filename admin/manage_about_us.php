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
    
    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet" >
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
 
    <script src="ckedito2/ckeditor.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript">
   $(document).ready(function(){
    $('#mytable').DataTable();
   
});
</script>
</head>
<body>
	<?php 
    require 'access/dbaccess.php';
	$id = 9;

	include("header.php"); 
        ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-edit"></i>
                            Manage About Us
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Manage About Us
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
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Great...! The <b>About Us</b> Details were updated Successfully.
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

                $row = $db->query("SELECT * FROM manage_aboutus WHERE id = 1");
                $row1 = $row->fetch(PDO::FETCH_ASSOC);

            ?>

            <form method="post" action="update_aboutUs.php" enctype="multipart/form-data">
                <input type="hidden" name="image_path" value="<?= $row1['image'] ?>" />
                <div class="row">
                    <div class="col-lg-2">
                        <h4>Name:</h4>
                    </div>
                        <div class="col-lg-3">
                            <input type="text" name="name" class="form-control" value="<?= $row1['name'] ?>" />
                        </div>
                    <div class="col-lg-2">
                        <h4>Address:</h4>
                    </div>
                    <div class="col-lg-3">
                        <textarea type="text" name="address" class="form-control"><?= $row1['address'] ?></textarea>
                    </div>
                    </div><br/>
                    <div class="row">
                        <div class="col-lg-2">
                            <h4>Contact (M):</h4>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" name="mobile" class="form-control" value="<?= $row1['mobile'] ?>" />
                        </div>
                        <div class="col-lg-2">
                            <h4>State:</h4>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" name="state" class="form-control" value="<?= $row1['state'] ?>" />
                        </div>
                    </div><br/>
                    <div class="row">
                        <div class="col-lg-2">
                            <h4>Contact (O):</h4>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" name="office" class="form-control" value="<?= $row1['office'] ?>" />
                        </div>
                        <div class="col-lg-2">
                            <h4>Country:</h4>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" name="country" class="form-control" value="<?= $row1['country'] ?>"  readonly />
                        </div>
                    </div><br/>
                    <div class="row">
                        <div class="col-lg-2">
                            <h4>E-mail:</h4>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" name="email" class="form-control" value="<?= $row1['email'] ?>" />
                        </div>
                        <div class="col-lg-2">
                            <h4>Time:</h4>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" name="time" class="form-control" value="<?= $row1['time'] ?>" />
                        </div>
                    </div><br/>
                    <div class="row">
                        <div class="col-lg-2">
                            <h4>Image:</h4>
                        </div>
                        <div class="col-lg-3">
                            <input type="file" name="Uploadfiles" />
                        </div>
                    </div><br/>
                    <div class="row">
                        <div class="col-lg-2">
                            <h4>Description/History:</h4>
                        </div>
                        <div class="col-lg-10">
                        <textarea name="description" class="ckeditor" type="text"><?= $row1['descr'] ?></textarea>
                        </div>
                    </div><hr>
                    <div class="row">
                        <div class="col-lg-12" align="center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Details</button>
                        </div>
                    </div>
                    <hr>
            </form>
                </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    <?php include("footer.php"); ?>
</body>

</html>
