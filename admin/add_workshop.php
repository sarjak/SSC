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

    <!-- Pop-Up CSS -->
    <link href="css/welcome.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="welcome.css" rel="stylesheet" type="text/css">

    <link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet" >
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript">
   $(document).ready(function(){
    $('#table').DataTable();
   
});
</script>
</head>
<body>
	<?php 
  require 'access/dbaccess.php';
	$id = 10;
  if(isset($_GET['wid'])){
      $wid = $_GET['wid'];
  }
	include("header.php");
  if($wid){
    $row = $db->query("SELECT * FROM manage_workshops WHERE id = '$wid' ");
    $row1 = $row->fetch(PDO::FETCH_ASSOC);
	?>
	        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-edit"></i>
                            Update Workshops &amp; Sessions
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="manage_workshop.php">Manage Workshops &amp; Sessions</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Update Workshops &amp; Sessions
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
                            Excellent! The Workshop / Session has been Updated Successfully.
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
    
                <form action="add_workshops.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="type" value="update">
                    <input type="hidden" name="id" value="<?= $wid ?>">
                    <div class="row">
                        <div class="col-sm-2">
                            <h4>Title:<span style="color:red">*</span></h4>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="name" class="form-control" required value="<?= $row1['name'] ?>" />
                        </div>
                        <div class="col-sm-2">
                            <h4>Date:<span style="color:red">*</span></h4>
                        </div>
                        <div class="col-sm-3">
                            <input type="date" name="date" class="form-control" required value="<?= $row1['date'] ?>" />
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-sm-2">
                            <h4>Description:<span style="color:red">*</span></h4>
                        </div>
                        <div class="col-sm-3">
                            <textarea name="description" class="form-control" required><?= $row1['description'] ?></textarea>
                        </div>
                        <div class="col-sm-2">
                            <h4>Time:<span style="color:red">*</span></h4>
                        </div>
                        <div class="col-sm-3">
                            <input type="time" name="time" class="form-control" required value="<?= $row1['time'] ?>" />
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-sm-2">
                            <h4>Venue:<span style="color:red">*</span></h4>
                        </div>
                        <div class="col-sm-3">
                            <textarea name="venue" class="form-control" required><?= $row1['venue'] ?></textarea>
                        </div>
                        <div class="col-sm-2">
                            <h4>Duration:<span style="color:red">*</span><small> <br/>( In Minutes )</small></h4>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="duration" class="form-control" required value="<?= $row1['duration'] ?>"/>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-sm-2">
                            <h4>Price:<span style="color:red">*</span></h4>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="price" class="form-control" required value="<?= $row1['price'] ?>"/>
                            <h4><small>If Workshop is Free, enter 0 (Zero)</small></h4>
                        </div>
                        <div class="col-sm-2">
                            <h4>Status:<span style="color:red">*</span></h4>
                        </div>
                        <div style="padding-top:9px" class="col-sm-3">
                        <?php
                        if($row1['active'] == "Active"){
                            ?>
                            <input type="radio" name="active" value="Active" checked="true" required /> Active
                            <input type="radio" name="active" value="InActive" required /> InActive
                            <?php
                        }else{
                            ?>
                            <input type="radio" name="active" value="Active" required /> Active
                            <input type="radio" name="active" value="InActive" checked="true" required /> InActive
                            <?php
                        }
                        ?>
                            
                        </div>
                    </div><hr>
                    <div class="row">
                      <div align="center">
                        <button class="btn btn-primary" onClick="window.location='add_workshop_data.php'"><i class="fa fa-edit"></i> Save Details</button>
                      </div>
                    </div><hr>
                </form>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

       <?php 
}else{
        ?>

          <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-pencil"></i>
                            Add Workshops &amp; Sessions
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="manage_workshop.php">Manage Workshops &amp; Sessions</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-pencil"></i> Add Workshops &amp; Sessions
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
                            Excellent! The Workshop / Award has been added Successfully.
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
    
                <form action="add_workshops.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="type" value="add">
                    <div class="row">
                        <div class="col-sm-2">
                            <h4>Title:<span style="color:red">*</span></h4>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="name" class="form-control" required />
                        </div>
                        <div class="col-sm-2">
                            <h4>Date:<span style="color:red">*</span></h4>
                        </div>
                        <div class="col-sm-3">
                            <input type="date" name="date" class="form-control" required />
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-sm-2">
                            <h4>Description:<span style="color:red">*</span></h4>
                        </div>
                        <div class="col-sm-3">
                            <textarea name="description" class="form-control" required></textarea>
                        </div>
                        <div class="col-sm-2">
                            <h4>Time:<span style="color:red">*</span></h4>
                        </div>
                        <div class="col-sm-3">
                            <input type="time" name="time" class="form-control" />
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-sm-2">
                            <h4>Venue:<span style="color:red">*</span></h4>
                        </div>
                        <div class="col-sm-3">
                            <textarea name="venue" class="form-control" required></textarea>
                        </div>
                        <div class="col-sm-2">
                            <h4>Duration:<span style="color:red">*</span><small> <br/>( In Minutes )</small></h4>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="duration" class="form-control" />
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-sm-2">
                            <h4>Price:<span style="color:red">*</span></h4>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="price" class="form-control" />
                            <h4><small>If Workshop is Free, enter 0 (Zero)</small></h4>
                        </div>
                    </div><hr>
                    <div class="row">
                      <div align="center">
                        <button class="btn btn-primary" onClick="window.location='add_workshop_data.php'"><i class="fa fa-edit"></i> Save Details</button>
                      </div>
                    </div><hr>
                </form>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

        <?php
       }
       ?> 
	<?php include("footer.php"); ?>
</body>
</html>