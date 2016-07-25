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
    <link href="welcome.css" rel="stylesheet" type="text/css">

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
   
    $("#mytable").on("click", ".delo", function(){
        if(confirm("Are you sure you want to delete?")){

            $.ajax({
            type: "GET",
            url: 'delete_code.php',
            data: "type=question&id="+ this.value,
            success: function(response) {
                alert("Question Deleted Successfully. Click on REFRESH button.");
                
                //window.location = 'manage_question.php';
            }
            });
        }
    });

    $('a.login-window').click(function() {
        
        // Getting the variable's value from a link 
        var loginBox = $(this).attr('href');

        //Fade in the Popup and add close button
        $(loginBox).fadeIn(300);
        
        //Set the center alignment padding + border
        var popMargTop = ($(loginBox).height() + 24) / 2; 
        var popMargLeft = ($(loginBox).width() + 24) / 2; 
        
        $(loginBox).css({ 
            'margin-top' : -popMargTop,
            'margin-left' : -popMargLeft
        });
        
        // Add the mask to body
        $('body').append('<div id="mask"></div>');
        $('#mask').fadeIn(300);
        
        return false;
    });

    $('a.close').on('click', null, function() { 
        $('#mask , .login-popup').fadeOut(300 , function() {
            $('#mask').remove();  
        }); 
        return false;
    });

});
</script>
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
    $row = $db->query("SELECT * FROM manage_questions WHERE course_id = '$cid'");
    $course = $db->query("SELECT * FROM manage_courses WHERE course_id = '$cid'");
    $course1 = $course->fetch(PDO::FETCH_ASSOC);

	?>
    <div id="btech" class="login-popup">
        <a href="#" class="close"><img src="./img/close_pop.png" class="btn_close" title="Close Window" alt="Close"></a>
          <form method="post" class="signin" action="import_questions.php" enctype="multipart/form-data">
            <input type="hidden" name="cid" value="<?= $cid ?>" />
            <fieldset class="textbox">
            <div align="center">
                <span style="color:white;height:20px;width:100%">Import Questions</span>
            </div>
            <hr>
            <div align="center">
            <label class="username">
                <span>Upload File: </span>
                <input type="file" name="Uploadfile" />
            </label>

            </div>
            <br/>
            <div align="center">
                <button style="width:160px" class="btn btn-primary" type="submit" >Submit</button>
            </div><br/><hr>
            <div style="color:white;text-align:center;width:100%">Please Note:- Only .csv file extensions are allowed.</div>
            </fieldset>
          </form>
        </div>
	        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-list-alt"></i>
                            Manage Questions 
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-table"></i>  <a href="manage_courses.php">Manage Courses</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-list-alt"></i> Manage Questions
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <h3 style="margin-top:-50px; padding-bottom:20px">Course: <?= $course1['course_name'] ?></h3>
        <?php
            if((isset($_GET['state'])) && ($_GET['state'] == "success")){
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Good Job! The Questions were imported Successfully.
                        </div>
                    </div>
                </div>
                <?php
            }
            if((isset($_GET['status'])) && ($_GET['status'] == "success")){
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Congratulations! The Question was added Successfully.
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
          <th style="width:10px">Sr.No.</th>
          <th>Question</th>
          <th>Answer</th>
          <th >Action</th>
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
           
                <td><?php echo $row1['question'] ?></td>
          
                <td><?php echo $row1['answer'] ?></td>
                <td>
                    <button class="btn btn-info" onClick="window.location='add_question.php?courseid=<?= $cid ?>&amp;qid=<?= $row1['question_id'] ?>'"><i class="fa fa-edit"></i> Update</button>
                    <button value="<?= $row1['question_id'] ?>" class="btn btn-danger delo"><i class="fa fa-remove"></i> Delete</button>
                    
                </td>
                </tr>      
            <?php
        }
      ?>
</tbody>
</table>
 <div class="row">
        <div align="center">
            <button class="btn btn-primary" onClick="window.location='manage_question.php?courseid=<?= $cid ?>'"><i class="fa fa-refresh"></i> Refresh</button>
            <button class="btn btn-primary" onClick="window.location='add_question.php?courseid=<?= $cid ?>'"><i class="fa fa-pencil"></i> Add Question</button>
            <button class="btn btn-warning" onClick="window.print()"><i class="fa fa-print"></i> Print Data</button>
            <a href="#btech" class="login-window btn btn-primary">Import Questions</a>
        </div>
    </div>
    <br/>
    <a href="Questions.csv" download>
    <div class="alert alert-info" style="cursor:hand;text-align:center">
        <b>Click here to download the Format for Importing Questions.</b>
    </div></a>
    <hr>

                </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    <?php include("footer.php"); ?>
</body>

</html>