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
    
	$id = 5;
	include("header.php");
    if(isset($_GET['id'])){
        $aid = $_GET['id'];
    }else{
        $aid = NULL;
    }
    $row = $db->query("SELECT * FROM manage_awards WHERE id = '$aid' ");
    $row1 = $row->fetch(PDO::FETCH_ASSOC);

    if(!$row1){
    
	?>
	   <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-pencil"></i>
                            Add Awards &amp; Achievements
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-trophy"></i>  <a href="manage_awards.php">Manage Awards &amp; Achievement</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-pencil"></i> Add Awards &amp; Achievements
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <form action="add_awards.php" method="post" enctype="multipart/form-data">
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
                            <h4>Details:<span style="color:red">*</span></h4>
                        </div>
                        <div class="col-sm-3">
                            <textarea name="detail" class="form-control" required></textarea>
                        </div>
                        <div class="col-sm-2">
                            <h4>Image:</h4>
                        </div>
                        <div class="col-sm-3">
                            <input type="file" name="Uploadfiles" />
                        </div>
                    </div>
                    <hr>
                    
                    <div align="center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>
                    </div>
        
                    <hr>
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
                        <h1 class="page-header"><i class="fa fa-edit"></i>
                            Update Awards &amp; Achievements
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-trophy"></i>  <a href="manage_awards.php">Manage Awards &amp; Achievement</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Update Awards &amp; Achievements
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
                            Nice..! The Achievement was Updated Successfully.
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

                <form action="add_awards.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="type" value="update" />
                    <input type="hidden" name="image_path" value="<?= $row1['image'] ?>" />
                    <input type="hidden" name="id" value="<?= $row1['id'] ?>" />
                    <div class="row">
                        <div class="col-sm-2">
                            <h4>Title:<span style="color:red">*</span></h4>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" name="name" class="form-control" value="<?= $row1['name'] ?>" required />
                        </div>
                        <div class="col-sm-2">
                            <h4>Date:<span style="color:red">*</span></h4>
                        </div>
                        <div class="col-sm-3">
                            <input type="date" name="date" class="form-control" value="<?= $row1['date'] ?>" required />
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-sm-2">
                            <h4>Details:<span style="color:red">*</span></h4>
                        </div>
                        <div class="col-sm-3">
                            <textarea name="detail" class="form-control" required><?= $row1['detail'] ?></textarea>
                        </div>
                        <div class="col-sm-2">
                            <h4>Image:</h4>
                        </div>
                        <div class="col-sm-3">
                            <input type="file" name="Uploadfiles" />
                        </div>
                    </div>
                    <hr>
                    
                    <div align="center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                        <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>
                    </div>
        
                    <hr>
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