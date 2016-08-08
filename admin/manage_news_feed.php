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
   
        $("#table").on("click", ".delo", function(){
        if(confirm("Are you sure you want to delete?")){

            $.ajax({
            type: "GET",
            url: 'delete_code.php',
            data: "type=news&id="+ this.value,
            success: function(response) {
                window.location = 'manage_news_feed.php?status=success';
            }
            });
        }
    });

});
</script>
</head>
<body>
	<?php 
    require 'access/dbaccess.php';
	$id = 15;
	include("header.php"); 
	?>
	        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-list-alt"></i>
                            Manage News Feed
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-list-alt"></i> Manage News Feed
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
                            Good..! The News was deleted Successfully.
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

  <table class="table table-striped" id="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Type</th>
      <th>Details</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $cnt = 0;
    $data = $db->query("SELECT * FROM manage_news_feed WHERE flag = 1");

    while($row1 = $data->fetch(PDO::FETCH_ASSOC)){
      $cnt++;
      ?>
      <tr style="cursor:hand">
    
      <th onclick="document.location='view_course.php?courseid=<?= $row1['id'] ?>'" scope="row"><?= $cnt ?></th>
      <td onclick="document.location='view_course.php?courseid=<?= $row1['id'] ?>'" ><?= $row1['type'] ?></td>
      
      <td onclick="document.location='view_course.php?courseid=<?= $row1['id'] ?>'" >
        <?php
          if($row1['type'] == "Course"){
            $inst = $db->query("SELECT course_name FROM manage_courses WHERE course_id = '$row1[pk]' ");
            $inst1 = $inst->fetch(PDO::FETCH_ASSOC);
            echo "Introducing New Course:<b> $inst1[course_name] </b>";
          }elseif ($row1['type'] == "Achievement") {
            $inst = $db->query("SELECT name FROM manage_awards WHERE id = '$row1[pk]' ");
            $inst1 = $inst->fetch(PDO::FETCH_ASSOC);
            echo "Achieved:<b> $inst1[name] </b>";
          }elseif ($row1['type'] == "Workshop") {
            $inst = $db->query("SELECT name FROM manage_workshops WHERE id = '$row1[pk]' ");
            $inst1 = $inst->fetch(PDO::FETCH_ASSOC);
            echo "Introducing Workshop on:<b> $inst1[name] </b>";
          }
          ?>
      </td>

      <td onclick="document.location='view_course.php?courseid=<?= $row1[id] ?>'" >
      <?php
        if($row1['new'] == "1"){
          echo "New";
        }else{
          echo "Old";
        }
      ?>
      </td>
     
      <td style="width:100px" >
      <button class="btn btn-danger delo" value="<?= $row1['idate(format)'] ?>"><i class="fa fa-remove"></i> Delete</button>
      </td>
      </tr>  
      <?php
    }
  ?>
  </tbody>
</table>
    <hr>
                </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    <?php include("footer.php"); ?>
</body>
</html>