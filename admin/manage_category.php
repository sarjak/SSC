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
    
	$id = 3;
	include("header.php"); 
    $row = $db->query("SELECT * FROM manage_category");
    
	?>
	
	        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-tags"></i>
                            Manage Categories
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li >
                                <i class="fa fa-table"></i> <a href="manage_courses.php">Manage Courses</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-tags"></i> Manage Categories
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
                            Congratulations! The Category was added Successfully.
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

      <table id="mytable">
      <thead>
        <tr>
          <th>Sr.No.</th>
          <th>Category</th>
          <th>Action</th>
          </tr>
      </thead>
      <tbody>
      <?php
      $cnt = 1;
        while($row1 = $row->fetch(PDO::FETCH_ASSOC)){
            ?>
                <tr>
                <th >
                    <?php echo $cnt++ ?>
                </th>
                <td>
            <div class="media">
            <div class="media-left media-top">
                <img class="thumbnail" src="<?= $row1['cat_image'] ?>" alt="Image Not Available" height="110px" width="110px" />
            </div>
            <div class="media-body">
                <h4 class="media-heading"><?= $row1['category_name'] ?></h4>
                <?= $row1['category_desc'] ?>
            </div>
            </div>
            </td>
            <td>
                <button class="btn btn-info" onClick="window.location='add_category.php?id=<?= $row1['category_id'] ?>'"><i class="fa fa-edit"></i> Update Category</button>
            </td>
            </tr>      
            <?php
        }
      ?>
</tbody>
</table>
 <div class="row">
        <div align="center">
            <button class="btn btn-primary" onClick="window.location='add_category.php'"><i class="fa fa-pencil"></i> Add Category</button>
            <button class="btn btn-warning" onClick="window.print()"><i class="fa fa-print"></i> Print Data</button>
        </div>
    </div>
    <hr>

                </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    <?php include("footer.php"); ?>
</body>

</html>