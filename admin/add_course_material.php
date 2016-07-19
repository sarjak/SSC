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
$("document").ready(function(){
    var links = $("#links");
    var cnt = 1;
    $("#addlink").click(function(){
        cnt++;
        $(links).append('<div class="row"><br/><div class="col-lg-1"><h4>Link:</h4></div> <div class="col-lg-4"><input ype="text" class="form-control" name="link'+cnt+'" required /></div><div class="col-lg-2"><h4>Description:</h4></div><div class="col-lg-4"> <textarea type="text" class="form-control" name="linkdesc'+cnt+'" required ></textarea> </div><div class="col-lg-1"><a href="#" class="remove_field"><i class="fa fa-times"></a></div></div>'
        );    
    });

    $(links).on("click",".remove_field", function(e){
        e.preventDefault(); $(this).parent('div').parent('div').remove();
    });
    
});
    </script>
</head>
<body>
	<?php 
    require 'access/dbaccess.php';
	$id = 3;
    if(isset($_GET['id'])){
        $cid = $_GET['id'];
    }else{
        $cid = NULL;
    }
    $row = $db->query("SELECT * FROM manage_course_material WHERE course_id = '$cid'");
    $row1 = $row->fetch(PDO::FETCH_ASSOC);
    

	include("header.php"); 
	?>
	        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-pencil"></i>
                            Add Course Material
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php"> Dashboard</a>
                            </li>
                            <li>
                                <i class="fa fa-table"></i> <a href="manage_courses.php"> Manage Courses</a>
                            </li>
                            <li>
                                <i class="fa fa-book"></i> <a href="manage_course_material.php"> Manage Course Material</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-pencil"></i> Add Course Material
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

            <div class="panel panel-primary">
            <div class="panel-heading">
                Add Reference Links
            </div>
            <div class="panel-body">
            <form method="post" action="add_material.php">
                <input type="hidden" name="cid" value="<?= $cid ?>" />
                <input type="hidden" name="type" value="add" />
                <input type="hidden" name="mat_type" value="link" />
                <div class="link" id="links">
                    <div class="row">
                        <div class="col-lg-1">
                            <h4>Link:</h4>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" name="link1" required />
                        </div>

                        <div class="col-lg-2">
                            <h4>Description:</h4>
                        </div>
                        <div class="col-lg-4">
                            <textarea type="text" rows="1" class="form-control" name="linkdesc1" required ></textarea>
                        </div>
                        <div class="col-lg-1">
                            <a href="#" class="remove_field"><i class="fa fa-times"></i></a>
                        </div>

                    </div>
                </div>
                <br/>
                <div class="row">
                    <div align="center" class="col-lg-12">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"> Save</i></button>
                        <button class="btn btn-primary" id="addlink" ><i class="fa fa-plus"> New Link</i></button>
                    </div>
                </div>
            </form>
            </div>
            </div>
            <div class="panel panel-primary">
                <form method="post" action="add_material.php" enctype="multipart/form-data">
                <div class="panel-heading">
                    Add Reference Notes
                </div>
                <div class="panel-body">
                <input type="hidden" name="cid" value="<?= $cid ?>" />
                <input type="hidden" name="type" value="add" />
                <input type="hidden" name="mat_type" value="notes" />
                    <div class="row">
                        <div class="col-lg-1">
                            <h4>Title:</h4>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" name="notes_name" required />
                        </div>

                        <div class="col-lg-2">
                            <h4>Description:</h4>
                        </div>
                        <div class="col-lg-4">
                            <textarea type="text" rows="1" class="form-control" name="notes_desc" required ></textarea>
                        </div> 
                    </div><br/>
                    <div align="center" class="row">
                        <div class="col-lg-12">
                            <input type="file" name="Uploadfiles" required />
                        </div>
                    </div>
                <br/>
                <div align="center" class="col-lg-12">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"> Save</i></button>
                </div>
                </div>
                    </form>
            </div>
                <hr>

                </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    <?php include("footer.php"); ?>
</body>
</html>