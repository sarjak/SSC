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
    $('#table').DataTable();
   
});
</script>
</head>
<body>
	<?php 
    require 'access/dbaccess.php';
	$id = 4;
    if(isset($_GET['id'])){
        $cat_id = $_GET['id'];
    }else{
        $cat_id = NULL;
    }

    

	include("header.php"); 

    if($cat_id){
        $result = $db->query("SELECT * FROM manage_category WHERE category_id = '$cat_id'");
        $result1 = $result->fetch(PDO::FETCH_ASSOC);

	?>
	        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-edit"></i>
                            Update Category
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-tags"></i>  <a href="manage_category.php">Manage Categories</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Update Category
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="well">
                    Note:- Fields marked with <span style="color:red">*</span> are mandatory.
                </div>
                <?php
            if((isset($_GET['status'])) && ($_GET['status'] == "success")){
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Nice! The Category was updated Successfully.
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
                <form action="add_cat.php" method="post" enctype="multipart/form-data" >
                    <input type="hidden" name="type" value="update" />
                    <input type="hidden" name="id" value="<?= $cat_id ?>" />
                    <input type="hidden" name="image_path" value="<?= $result1['cat_image'] ?>" />
                    <div class="row">
                        <div class="col-lg-2">
                            Category Name:<span style="color:red">*</span>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" name="cat_name" class="form-control" value="<?= $result1['category_name'] ?>" required />
                        </div>
                        <div class="col-lg-2">
                            Upload Image:
                        </div>
                        <div class="col-lg-3">
                            <input type="file" name="Uploadfiles" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            Category Description:<span style="color:red">*</span>
                        </div>
                        <div class="col-lg-3">
                            <textarea type="text" name="cat_desc" class="form-control" required><?= $result1['category_desc'] ?></textarea>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div align="center" class="col-lg-12">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                            <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>
                        </div>
                    </div>
                    <hr>
                </form>
<?php  
    }else{
       ?>

            <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-pencil"></i>
                            Add Category
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-table"></i>  <a href="manage_courses.php">Manage Courses</a>
                            </li>
                            <li>
                                <i class="fa fa-tags"></i>  <a href="manage_category.php">Manage Categories</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-pencil"></i> Add Category
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="well">
                    Note:- Fields marked with <span style="color:red">*</span> are mandatory.
                </div>
                <?php
            if((isset($_GET['status'])) && ($_GET['status'] == "success")){
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Nice! The Category was updated Successfully.
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
                <form action="add_cat.php" method="post" enctype="multipart/form-data" >
                    <input type="hidden" name="type" value="add" />
                    
                    <div class="row">
                        <div class="col-lg-2">
                            Category Name:<span style="color:red">*</span>
                        </div>
                        <div class="col-lg-3">
                            <input type="text" name="cat_name" class="form-control" required />
                        </div>
                        <div class="col-lg-2">
                            Upload Image:
                        </div>
                        <div class="col-lg-3">
                            <input type="file" name="Uploadfiles" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                            Category Description:<span style="color:red">*</span>
                        </div>
                        <div class="col-lg-3">
                            <textarea type="text" name="cat_desc" class="form-control" required ></textarea>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div align="center" class="col-lg-12">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                            <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</button>
                        </div>
                    </div>
                    <hr>
                </form>
       <?php 
    }
?>
                </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    <?php include("footer.php"); ?>
</body>
</html>