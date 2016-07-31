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

    <!-- Custom Fonts -->.
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <script src="js/jquery.js"></script>
 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript">
    $(document).ready(function(){
        $('#username').on('blur',function(){
            $.ajax({
                type: "GET",
                url: 'validate_username.php',
                data: "user="+ this.value,
                success: function(response){
                    if(response >= "1"){
                        alert("Username already exists. Please enter a different username")
                        $('#username').focus();
                    }
                }
            });
        });

        $("#marks").change(function(){
            var ques = $("#ques").val();
            if(ques != ""){
                var total = $("#marks").val() * $("#ques").val(); 
                $("#total").val(total);
            }
        });

        $("#ques").change(function(){
            var ques = $("#marks").val();
            if(marks != ""){
                var total = $("#marks").val() * $("#ques").val(); 
                $("#total").val(total);
            }
        });

    $("#negative").change(function() {
        //alert("aaa");
        if(this.checked) {
                $("#negative_marks").attr("disabled",false);
            }else{
                $("#negative_marks").val("");
                $("#negative_marks").attr("disabled",true);
            }
        });
    });
</script>
</head>
<body>
	<?php 
    require 'access/dbaccess.php';

    if(isset($_GET['courseid'])){
        $cid = $_GET['courseid'];
    }else{
        $cid = NULL;
    }

	$id = 3;
	include("header.php"); 

    $row = $db->query("SELECT * FROM manage_courses WHERE course_id = $cid" );
    $row1 = $row->fetch(PDO::FETCH_ASSOC);
	
    $exam = $db->query("SELECT * FROM manage_exam WHERE exam_id = '$cid' ");
    $exam1 = $exam->fetch(PDO::FETCH_ASSOC);

    if(!$exam1){
	?>
	
	        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-pencil"></i>
                            Create Exam
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php"> Dashboard</a>
                            </li>
                            <li >
                                <i class="fa fa-table"></i> <a href="manage_courses.php"> Manage Courses</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-pencil"></i> Create Exam
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

    <form action="add_exam.php" method="post" >
        <input type="hidden" name="courseid" value="<?= $cid ?>" />
        <input type="hidden" name="type" value="add" />
        <div >
            <strong>NOTE:</strong> Fields marked with <span style="color:red">*</span> are mandatory.
        </div><br/>

        <div class="row">
        <div class="col-sm-3">
            <h4>Exam Name:<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <input type="text" name="name" class="form-control" value="<?= $row1['course_name'] ?>" required readonly />
        </div>
        <div class="col-sm-2" >
            <h4>Duration:<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <input type="text" name="duration" class="form-control" required />
        </div>
        </div>

        <div class="row">
        <div class="col-md-3">
            <h4>No. of Questions:<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <input type="text" name="questions" class="form-control" id="ques" required />
        </div>
        <div class="col-sm-2" >
            <h4>Negative Marking:<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-2">
        <br/>
            <input type="checkbox" name="negative" id="negative" />
        </div>
        </div>

        <div class="row">
        <div class="col-md-3">
            <h4>Marks Per Question:<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <input type="text" name="marks_per_question" class="form-control" id="marks" required />
        </div>
        <div class="col-sm-2" >
            <h4>Negative Marks:<span style="color:red">*</span><small> (Per Question) </small> </h4>
        </div>
        <div class="col-md-3">
            <input type="text" name="negative_marks" id="negative_marks" class="form-control" required disabled="disabled" />
        </div>
        </div>

        <div class="row">
        <div class="col-md-3">
            <h4>Total Marks:<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <input type="text" name="total_marks" class="form-control" id="total" required readonly />
        </div>
        <div class="col-sm-2" >
            <h4>Passing Marks:<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <input type="text" name="passing_marks" class="form-control" required />
        </div>
        </div><br/>

        <br/>
        <div class="row">
        <div class="col-lg-12" align="center">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save </button>
            <button type="reset" class="btn btn-danger" ><i class="fa fa-refresh"></i> Reset </button>
        </div>
        </div>
    </form>
    <hr>
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
                            Update Exam
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php"> Dashboard</a>
                            </li>
                            <li >
                                <i class="fa fa-table"></i> <a href="manage_courses.php"> Manage Courses</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Update Exam
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

    <form action="add_exam.php" method="post" >
        <input type="hidden" name="courseid" value="<?= $cid ?>" />
        <input type="hidden" name="type" value="update" />
        <div >
            <strong>NOTE:</strong> Fields marked with <span style="color:red">*</span> are mandatory.
        </div><br/>

        <?php
            if((isset($_GET['status'])) && ($_GET['status'] == "success")){
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Great! The Exam was updated Successfully.
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

        <div class="row">
        <div class="col-sm-3">
            <h4>Exam Name:<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <input type="text" name="name" class="form-control" value="<?= $row1['course_name'] ?>" required readonly />
        </div>
        <div class="col-sm-2" >
            <h4>Duration:<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <input type="text" name="duration" value="<?= $exam1['duration'] ?>" class="form-control" required />
        </div>
        </div>

        <div class="row">
        <div class="col-md-3">
            <h4>No. of Questions:<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <input type="text" name="questions" value="<?= $exam1['no_of_ques'] ?>" class="form-control" required />
        </div>
        <div class="col-sm-2" >
            <h4>Negative Marking:</h4>
        </div>
        <div class="col-md-2">
        <br/>
        <?php 
            if($exam1['neg_marking'] == 1){
                echo "<input type='checkbox' name='negative' checked id='negative' />";
            }else{
                echo "<input type='checkbox' name='negative' id='negative' />";
            }
        ?>
            
        </div>
        </div>

        <div class="row">
        <div class="col-md-3">
            <h4>Marks Per Question:<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <input type="text" name="marks_per_question" value="<?= $exam1['marks_per_ques'] ?>" class="form-control" required />
        </div>
        <div class="col-sm-2" >
            <h4>Negative Marks:<small> (Per Question) </small> </h4>
        </div>
        <div class="col-md-3">
        <?php 
            if($exam1['neg_marking'] == 1){
                echo "<input type='text' name='negative_marks' id='negative_marks' value='$exam1[neg_marks_per_ques]' class='form-control' required />";
            }else{
                echo "<input type='text' name='negative_marks' id='negative_marks' class='form-control' required disabled='disabled' />";
            }
        ?>
            
        </div>
        </div>

        <div class="row">
        <div class="col-md-3">
            <h4>Total Marks:</h4>
        </div>
        <div class="col-md-3">
            <input type="text" name="total_marks" value="<?= $exam1['marks_per_ques'] * $exam1['no_of_ques'] ?>" class="form-control" required readonly />
        </div>
        <div class="col-sm-2" >
            <h4>Passing Marks:<span style="color:red">*</span></h4>
        </div>
        <div class="col-md-3">
            <input type="text" name="passing_marks" value="<?= $exam1['pass_marks'] ?>" class="form-control" required />
        </div>
        </div><br/>

        <br/>
        <div class="row">
        <div class="col-lg-12" align="center">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save </button>
            <button type="reset" class="btn btn-danger" ><i class="fa fa-refresh"></i> Reset </button>
        </div>
        </div>
    </form>
    <hr>

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