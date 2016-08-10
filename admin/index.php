<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

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
    $id = 1;
    include("header.php"); 
    ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Student Enrolment
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
<!--
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">26</div>
                                        <div>New Comments!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
-->
                <!-- /.row -->
    <div class="row">
        <div align="center">
            <button class="btn btn-primary" onClick="window.location='add_faq.php'"><i class="fa fa-user"></i> Enrol Students</button>
            <button class="btn btn-warning" onClick="window.print()"><i class="fa fa-print"></i> Print Data</button>
        </div>
    </div>
      <table id="mytable">
      <thead>
        <tr>
          <th>#</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Userame</th>
          <th>Course</th>
          <th>Enrol Date</th>
          <th>Status</th>
          <th>Action</th>
          </tr>
      </thead>
      <tbody>
      <?php
      $cnt = 1;
      $row = $db->query("SELECT * FROM manage_enrol WHERE flag = 1");

        while($row1 = $row->fetch(PDO::FETCH_ASSOC)){
            $courses = $db->query("SELECT * FROM manage_courses WHERE course_id = '$row1[course_id]'");
            $course = $courses->fetch(PDO::FETCH_ASSOC);

            $std = $db->query("SELECT * FROM manage_students WHERE username = '$row1[username]'");
            $stdnt = $std->fetch(PDO::FETCH_ASSOC);
            ?>
                <tr>
                <th>
                   <?= $cnt++ ?>  
                </th>
                <td>
                   <?= $stdnt['fname'] ?> 
                </td>
                <td>
                   <?= $stdnt['lname'] ?> 
                </td>
                <td>
                   <?= $row1['username'] ?> 
                </td>
                <td>
                   <?= $course['course_name'] ?> 
                </td>
                <td>
                   <?= $row1['date'] ?> 
                </td>
                <td style="font-weight:bold">
                   <?= $row1['status'] ?> 
                </td>
            
            <td style="width:200px">
                <?php
                if($row1['status'] == "Active"){
                ?>
                    <button value="<?= $row1['id'] ?>" class="btn btn-danger delo" ><i class="fa fa-remove"></i> Disable</button>
                <?php
                }elseif($row1['status'] == "Pending"){
                ?>
                    <button class="btn btn-success" onClick="window.location='add_faq.php?id=<?= $row1['id'] ?>'"><i class="fa fa-check"></i> Accept</button>
                    <button value="<?= $row1['id'] ?>" class="btn btn-danger delo" ><i class="fa fa-remove"></i> Reject</button>
                <?php    
                }elseif($row1['status'] == "Completed"){
                    echo "No Action";
                }elseif ($row1['status'] == "Failed") {
                ?>
                    <button value="<?= $row1['id'] ?>" class="btn btn-danger delo" ><i class="fa fa-remove"></i> Disable</button>
                <?php
                }elseif ($row1['status'] == "Re-Test") {
                ?>
                    <button class="btn btn-success" onClick="window.location='add_faq.php?id=<?= $row1['id'] ?>'"><i class="fa fa-check"></i> Accept</button>
                    <button value="<?= $row1['id'] ?>" class="btn btn-danger delo" ><i class="fa fa-remove"></i> Reject</button>
                <?php    
                }
                ?>

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

    </div>
    <!-- /#wrapper -->

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
