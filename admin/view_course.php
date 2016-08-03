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
<style>

</style>
</head>
<body>
	<?php 
    require 'access/dbaccess.php';
    
	$id = 3;
    if(isset($_GET['courseid'])){
        $cid = $_GET['courseid'];
    }else{
        $cid = NULL;
    }
	include("header.php"); 

    $row = $db->query("SELECT * FROM manage_courses WHERE course_id = '$cid'");
	$row1 = $row->fetch(PDO::FETCH_ASSOC);

    $result = $db->query("SELECT * FROM manage_category WHERE  category_id = '$row1[course_cat_id]' ");
    $result1 = $result->fetch(PDO::FETCH_ASSOC);

    $inst = $db->query("SELECT * FROM manage_institute WHERE  institute_id = '$row1[institute_id]' ");
    $inst1 = $inst->fetch(PDO::FETCH_ASSOC);

    $exam = $db->query("SELECT * FROM manage_exam WHERE exam_id = '$cid' ");
    $exam1 = $exam->fetch(PDO::FETCH_ASSOC);

	?>
	
	        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-tasks"></i>
                            Course Details
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li >
                                <i class="fa fa-table"></i> <a href="manage_courses.php">Manage Courses</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-tasks"></i> Course Details
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
                            Nice! The Exam was created Successfully.
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

                <div class="row jumbotron">
                <table style="margin-top:-40px">
                <tr>
                    <td>
                        <h3 >Course:&nbsp;&nbsp;&nbsp;&nbsp;</h3>
                    </td>
                    <td >
                        <h3><b><?= $row1['course_name'] ?></b></h3>
                    </td>
                </tr>
            </table><br/>
                    <div class="col-xs-6 col-md-3">
                        <a href="#" class="thumbnail">
                            <img src="<?= $row1['image'] ?>" alt="...">
                        </a>
                    </div>
                    <div class="col-xs-6 col-md-4">
            <table width="100%">
                <tr>
                <td>
                <h4>Course: </h4>
                </td>
                <td>
                <b><?= $row1['course_name'] ?></b>
                </td>
                </tr>

                <tr>
                <td>
                <h4>Category: </h4>
                </td>
                <td>
                <b><?= $result1['category_name'] ?></b>
                </td>
                </tr>

                <tr>
                <td>
                <h4>Duration: </h4>
                </td>
                <td>
                <b><?= $row1['course_duration'] ?></b> (Days)
                </td>
                </tr>

                <tr>
                <td>
                <h4>Institute: </h4>
                </td>
                <td>
                <b><?= $inst1['institute_name'] ?></b>
                </td>
                </tr>
            </table>
            </div>

            <div class="col-xs-6 col-md-4">
            <table width="100%">
                <tr>
                <td>
                <h4>Course Fees: </h4>
                </td>
                <td>
                <b><?= $row1['course_fees'] ?></b>
                </td>
                </tr>

                <tr>
                <td>
                <h4>Re-Exam Fees: </h4>
                </td>
                <td>
                <b><?= $row1['re_exam_fees'] ?></b>
                </td>
                </tr>

                <tr>
                <td>
                <h4>Status: </h4>
                </td>
                <td>
                <b><?= $row1['status'] ?></b>
                </td>
                </tr>
            </table>
            </div>
                </div>
            
                <h4>Course Description: </h4>
                <div class="jumbotron">
                <?= $row1['course_desc'] ?>
                </div>

    <div class="row">
        <div class="col-lg-12" align="center">
            <button class="btn btn-primary" onclick="window.location='update_course.php?courseid=<?= $row1['course_id'] ?>'"><i class="fa fa-edit"></i> Edit</button>
            
            <button class="btn btn-warning" onclick="window.print()"><i class="fa fa-print"></i> Print</button>
        </div>
    </div>

    <h3 ><b>Exam Details</b></h3><hr>
    <div class="jumbotron">
<?php 
if($exam1){
?>
    <div class="row">
        <div class="col-sm-6">
            <table width="100%">
                <tr>
                    <th>
                       <h4> Exam Name:</h4>
                    </th>
                    <td>
                        <?= $row1['course_name'] ?>
                    </td>
                </tr>

                <tr>
                    <th>
                        <h4> No. of Questions:</h4>
                    </th>
                    <td>
                        <?= $exam1['no_of_ques'] ?> 
                    </td>
                </tr>

                <tr>
                    <th>
                        <h4> Marks Per Question: </h4>
                    </th>
                    <td>
                        <?= $exam1['marks_per_ques'] ?>
                    </td>
                </tr>

                <tr>
                    <th>
                        <h4> Total Marks </h4>
                    </th>
                    <td>
                        <?= $exam1['marks_per_ques'] * $exam1['no_of_ques']  ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-sm-6">
            <table width="100%">
                <tr>
                    <th>
                       <h4> Duration:</h4>
                    </th>
                    <td>
                        <?= $exam1['duration'] ?> <small>(Minutes)</small>
                    </td>
                </tr>

                <tr>
                    <th>
                        <h4> Negative Marking:</h4>
                    </th>
                    <td>
                        <?php 
                            if($exam1['neg_marking'] == 0){
                                echo "<b>No</b>";
                            }else{
                                echo "<b>Yes</b>";
                            }

                        ?>
                    </td>
                </tr>

                <tr>
                    <th>
                        <h4> Negative Marks: </h4>
                    </th>
                    <td>
                        <?= $exam1['neg_marks_per_ques'] ?>
                    </td>
                </tr>

                <tr>
                    <th>
                        <h4> Passing Marks </h4>
                    </th>
                    <td>
                        <?= $exam1['pass_marks'] ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <br/>
    <div align="center">
        <button class="btn btn-primary" onclick="window.location='create_exam.php?courseid=<?= $row1['course_id'] ?>'"><i class="fa fa-check"></i> Update Exam </button>
    </div>
<?php
}else{
?>
<div align="center">
<button class="btn btn-primary" onclick="window.location='create_exam.php?courseid=<?= $row1['course_id'] ?>'"><i class="fa fa-check"></i> Create Exam</button>
</div>
<?php
}
?>
</div>
<?php
    $link = $db->query("SELECT * FROM manage_course_material WHERE course_id = '$row1[course_id]' AND notes_category = 'link' AND flag = 1");
?>

    <h3 ><b>Study Material</b></h3><hr>
        <div class="panel panel-primary">
            <div class="panel-heading">
                Refernce Links
            </div>
            <div style="padding:30px">
                <ul>
                <?php 
                if($links = $link->fetch(PDO::FETCH_ASSOC)){
                    echo "<li><b><a href=$links[notes_path] target=_blank>$links[notes_path]</a></b><ul><li>$links[notes_description]</li></ul></li>";
                    while ($links = $link->fetch(PDO::FETCH_ASSOC)) {
                        echo "<li><b><a href=$links[notes_path] target=_blank>$links[notes_path]</a></b><ul><li>$links[notes_description]</li></ul></li>";
                    }
                }else{
                    echo "<h5>Sorry, You have not uploaded any reference links for this course.</h5>";
                }
                ?>
                
                </ul>
            </div>
            <div align="center" class="panel-footer">
                <button class="btn btn-primary" onclick="window.location='update_course.php?courseid=<?= $row1['course_id'] ?>'"><i class="fa fa-edit"></i> Edit</button>
            </div>
        </div><hr>
<?php
    $link = $db->query("SELECT * FROM manage_course_material WHERE course_id = '$row1[course_id]' and notes_category = 'notes' AND flag = 1");
?>

                <div class="panel panel-primary">
            <div class="panel-heading">
                Refernce Notes
            </div>
            <div style="padding:30px">
                <ul>
                <?php 
                if($links = $link->fetch(PDO::FETCH_ASSOC)){
                    echo "<li><b><a href=$links[notes_path] target=_blank>$links[notes_title]</a></b><ul><li>$links[notes_description]</li></ul></li>";
                    while ($links = $link->fetch(PDO::FETCH_ASSOC)) {
                        echo "<li><b><a href=$links[notes_path] target=_blank>$links[notes_title]</a></b><ul><li>$links[notes_description]</li></ul></li>";
                    }
                }else{
                    echo "<h5>Sorry, You have not uploaded any reference notes for this course.</h5>";
                }
                ?>
                
                </ul>
            </div>
            <div align="center" class="panel-footer">
                <button class="btn btn-primary" onclick="window.location='update_course.php?courseid=<?= $row1['course_id'] ?>'"><i class="fa fa-edit"></i> Edit</button>
            </div>
        </div>
    <hr>


            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    <?php include("footer.php"); ?>
</body>
<script type="text/javascript">

</script>
</html>