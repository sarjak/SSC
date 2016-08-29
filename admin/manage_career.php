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

    <script type="text/javascript" src="ckeditor/ckeditor/ckeditor.js"></script>
 
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
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$id = 14;
	include("header.php"); 

  if(isset($_POST['advice'])){
    $advice = $_POST['advice'];
    $date = date('Y-m-d H:i:s');
    $row = $db->query("UPDATE manage_career SET advice = '$advice', date = '$date' WHERE id = 1");
    if(! $row){
      ?>
      <script>
        window.location = 'manage_career.php?status=failure';
      </script>
      <?php
    }else{
      ?>
      <script>
        window.location = 'manage_career.php?status=success';
      </script>
      <?php
    }
  }

  $adv = $db->query("SELECT * FROM manage_career WHERE id = 1");
  $advice = $adv->fetch(PDO::FETCH_ASSOC);

	?>
	        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-bookmark"></i>
                            Career Advice
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-bookmark"></i> Career Advice
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
                            Great..! The Career Advice was Updated Successfully.
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
        <form method="post" action="manage_career.php">
            <h4>Last Modified On: <small> <?= date_format(date_create($advice['date']),"D, d - M - Y") ?></small></h4>
            <textarea name="advice" class="ckeditor"><?= $advice['advice'] ?></textarea>
            <br/>
            <div align="center">
              <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
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