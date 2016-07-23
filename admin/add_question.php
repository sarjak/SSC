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
    

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="ckedito2/ckeditor.js"></script>
 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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

    if(isset($_GET['qid'])){
        $qid = $_GET['qid'];   
    }else{
        $qid = NULL;
    }
	include("header.php"); 
    $row = $db->query("SELECT * FROM manage_courses WHERE course_id = '$cid'");
    $row1 = $row->fetch(PDO::FETCH_ASSOC);

	?>
	
	        <div id="page-wrapper">

            <div class="container-fluid">
<?php
    if($qid == NULL){
?>
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-pencil"></i>
                            Add Questions 
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-table"></i>  <a href="manage_courses.php">Manage Courses</a>
                            </li>
                            <li>
                                <i class="fa fa-list-alt"></i>  <a href="manage_question.php?courseid=<?= $cid ?>">Manage Questions</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-pencil"></i> Add Questions
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <h3 style="margin-top:-50px; padding-bottom:20px">Course: <?= $row1['course_name'] ?></h3>
                <form method="post" action="add_quest.php">
                    <input type="hidden" name="type" value="add" />
                    <input type="hidden" name="courseid" value="<?= $cid ?>" />
                    <div class="row">
                        <div class="col-xs-1">
                            <h4>Question:</h4>
                        </div>
                        <div class="col-xs-5">
                            <textarea name="question" class="ckeditor"></textarea>
                        </div>
                        <div class="col-xs-1">
                            <h4>Answer:</h4>
                        </div>
                        <div class="col-xs-5">
                            <input type="text" name="answer" /><br/>
                            <small>Eg: A or B or C or D or E.</small>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-xs-1">
                            <h4>A) </h4>
                        </div>
                        <div class="col-xs-5">
                            <textarea name="opt1" class="ckeditor"></textarea>
                        </div>
                        <div class="col-xs-1">
                            <h4>B) </h4>
                        </div>
                        <div class="col-xs-5">
                            <textarea name="opt2" class="ckeditor"></textarea>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-xs-1">
                            <h4>C) <small>(OPTIONAL)</small></h4>
                        </div>
                        <div class="col-xs-5">
                            <textarea name="opt3" class="ckeditor"></textarea>
                        </div>
                        <div class="col-xs-1">
                            <h4>D) <small>(OPTIONAL)</small></h4>
                        </div>
                        <div class="col-xs-5">
                            <textarea name="opt4" class="ckeditor"></textarea>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-xs-1">
                            <h4>E) <small>(OPTIONAL)</small></h4>
                        </div>
                        <div class="col-xs-5">
                            <textarea name="opt5" class="ckeditor"></textarea>
                        </div>
                        <div class="col-xs-6">
                            
                        </div>
                    </div>
                    <hr>
                    <div align="center" class="row">
                        <button type="submit" class="btn btn-primary">Add Question</button>
                    </div>
                    </form>

        <?php
}else{
        $question = $db->query("SELECT * FROM manage_questions WHERE question_id = '$qid'");
        $quest = $question->fetch(PDO::FETCH_ASSOC);
    ?>
                        <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-edit"></i>
                            Update Question
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-table"></i>  <a href="manage_courses.php">Manage Courses</a>
                            </li>
                            <li>
                                <i class="fa fa-list-alt"></i>  <a href="manage_question.php?courseid=<?= $quest['course_id'] ?>">Manage Questions</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-edit"></i> Update Question
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <h3 style="margin-top:-50px; padding-bottom:20px">Course: <?= $row1['course_name'] ?></h3>

            <?php
            if((isset($_GET['status'])) && ($_GET['status'] == "success")){
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Great! The Question was updated Successfully.
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

                <form method="post" action="add_quest.php">
                    <input type="hidden" name="type" value="update" />
                    <input type="hidden" name="questionid" value="<?= $qid ?>" />
                    <div class="row">
                        <div class="col-xs-1">
                            <h4>Question:</h4>
                        </div>
                        <div class="col-xs-5">
                            <textarea name="question" class="ckeditor"><?php echo $quest['question'] ?></textarea>
                        </div>
                        <div class="col-xs-1">
                            <h4>Answer:</h4>
                        </div>
                        <div class="col-xs-5">
                        <?php
                            switch ($quest['answer']) {
                                case $quest['opt1']:
                                    $ans = 'A';
                                    break;
                                
                                case $quest['opt2']:
                                    $ans = 'B';
                                    break;

                                case $quest['opt3']:
                                    $ans = 'C';
                                    break;

                                case $quest['opt4']:
                                    $ans = 'D';
                                    break;

                                case $quest['opt5']:
                                    $ans = 'E';
                                    break;

                                default:
                                    $ans = NULL;
                                    break;
                            }
                        ?>
                            <input type="text" name="answer" value="<?= $ans ?>" /><br/>
                            <small>Eg: A or B or C or D or E.</small>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-xs-1">
                            <h4>A) </h4>
                        </div>
                        <div class="col-xs-5">
                            <textarea name="opt1" class="ckeditor"><?php echo $quest['opt1'] ?></textarea>
                        </div>
                        <div class="col-xs-1">
                            <h4>B) </h4>
                        </div>
                        <div class="col-xs-5">
                            <textarea name="opt2" class="ckeditor"><?php echo $quest['opt2'] ?></textarea>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-xs-1">
                            <h4>C) <small>(OPTIONAL)</small></h4>
                        </div>
                        <div class="col-xs-5">
                            <textarea name="opt3" class="ckeditor"><?php echo $quest['opt3'] ?></textarea>
                        </div>
                        <div class="col-xs-1">
                            <h4>D) <small>(OPTIONAL)</small></h4>
                        </div>
                        <div class="col-xs-5">
                            <textarea name="opt4" class="ckeditor"><?php echo $quest['opt4'] ?></textarea>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-xs-1">
                            <h4>E) <small>(OPTIONAL)</small></h4>
                        </div>
                        <div class="col-xs-5">
                            <textarea name="opt5" class="ckeditor"><?php echo $quest['opt5'] ?></textarea>
                        </div>
                        <div class="col-xs-6">
                            
                        </div>
                    </div>
                    <hr>
                    <div align="center" class="row">
                        <button type="submit" class="btn btn-primary">Update Question</button>
                    </div>
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