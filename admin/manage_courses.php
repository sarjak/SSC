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
	$id = 3;
	include("header.php"); 
	?>
	        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-table"></i>
                            Manage Courses
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Manage Courses
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
        <table class="table table-striped" id="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Course</th>
      <th>Category</th>
      <th>Duration</th>    
      <th>Fees</th>
      <th>Re-Exam Fees</th>
      
      <th>Status</th>
      
    </tr>
  </thead>
  <tbody>
  <?php
    $cnt = 0;
    $data = $db->query("SELECT * FROM manage_courses as course JOIN manage_category as cat WHERE course_cat_id = category_id");
    while($row1 = $data->fetch(PDO::FETCH_ASSOC)){
      $cnt++;
      ?>
      <tr onclick="document.location='view_course.php?courseid=<?= $row1['course_id'] ?>'" style="cursor:hand">
    
      <th scope="row"><?= $cnt ?></th>
      <td><?= $row1['course_name'] ?></td>
      
      <td><?= $row1['category_name'] ?></td>
      <td><?= $row1['course_duration'] ?></td>
      <td><?= $row1['course_fees'] ?></td>
      <td><?= $row1['re_exam_fees'] ?></td>
      
      <td><?= $row1['status'] ?></td>

      </tr>  
      <?php
    }
  ?>
  </tbody>
</table>

 <div class="row">
        <div align="center">
            <button class="btn btn-primary" onClick="window.location='add_course.php'"><i class="fa fa-pencil"></i> Add Course</button>
            <button class="btn btn-primary" onClick="window.location='manage_category.php'"><i class="fa fa-tags"></i> Manage Categories</button>
            <button class="btn btn-primary" onClick="window.location='manage_course_material.php'"><i class="fa fa-book"></i> Manage Course Material</button>
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