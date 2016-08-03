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
    $("#form").on("click", ".delo", function(){
        var id = $(this).attr('id');
        
        if(confirm("Are you sure you want to delete?")){
            alert(id);
            $.ajax({
            type: "GET",
            url: 'delete_code.php',
            data: "type=material&id="+id,
            success: function(response) {
                alert("Course Material Deleted Successfully.");
                //window.location = 'update_course_material.php?state=success&id='+this.value;
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
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$id = 3;
    if(isset($_GET['id'])){
        $cid = $_GET['id'];
    }else{
        $cid = NULL;
    }
    
	include("header.php"); 
	?>
	        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-edit"></i>
                            Update Course Material
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
                                <i class="fa fa-edit"></i> Update Course Material
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
            <div class="panel panel-primary">
            <div class="panel-heading">
                Update Reference Links
            </div>
            <form method="post" action="add_material.php" style="padding:30px" id="form">
                <input type="hidden" name="cid" value="<?= $cid ?>" />
                <?php
                $row = $db->query("SELECT * FROM manage_course_material WHERE course_id = '$cid' AND notes_category = 'link' AND flag = 1 ");
                    $cnt=0;
                    while($row1 = $row->fetch(PDO::FETCH_ASSOC)){
                        $cnt++;
                ?>

                <input type="hidden" name="id<?= $cnt ?>" value="<?= $row1['notes_id'] ?>" />
                <input type="hidden" name="type" value="update" />
                <div class="link" id="links">
                    <div class="row">
                        <div class="col-lg-1">
                            <h4>Link:</h4>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" name="link<?= $cnt ?>" value="<?= $row1['notes_path'] ?>" required />
                        </div>
                        <div class="col-lg-2">
                            <h4>Description:</h4>
                        </div>
                        <div class="col-lg-4">
                            <textarea type="text" rows="1" class="form-control" name="linkdesc<?= $cnt ?>" required ><?= $row1['notes_description'] ?></textarea>
                        </div>
                        <div class="col-lg-1">
                            <a href="" class="delo" id="<?= $row1['notes_id'] ?>" ><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                </div>
                    <?php
                }
                    ?>
                    <br/>
            <div align="center">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"> Save</i></button>
            </div>
            </form>
            </div>

<?php
    $rows = $db->query("SELECT * FROM manage_course_material WHERE course_id = '$cid' AND notes_category = 'notes' AND flag = 1     ");
?>                        
            <div class="panel panel-primary">
            <div class="panel-heading">
                Update Reference Notes
            </div>
            <form method="post" action="add_material.php" style="padding:30px">
                <input type="hidden" name="cid" value="<?= $cid ?>" />
                <?php
                    $cnt=0;
                    while ($row1 = $rows->fetch(PDO::FETCH_ASSOC)) {
                        $cnt++;
                ?>
                <input type="hidden" name="id<?= $cnt ?>" value="<?= $row1['notes_id'] ?>" />
                <input type="hidden" name="type" value="update" />
                <div class="link" id="links">
                    <div class="row">
                        <div class="col-lg-1">
                            <h4>Link:</h4>
                        </div>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" name="link<?= $cnt ?>" value="<?= $row1['notes_path'] ?>" required />
                        </div>

                        <div class="col-lg-2">
                            <h4>Description:</h4>
                        </div>
                        <div class="col-lg-4">
                            <textarea type="text" rows="1" class="form-control" name="linkdesc<?= $cnt ?>" required ><?= $row1['notes_description'] ?></textarea>
                        </div>
                        <div class="col-lg-1">
                            <a href="" class="remove_field" ><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                </div>
                    <?php
                }
                    ?>
                    <br/>
            <div align="center">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"> Save</i></button>
            </div>
            </form>
            </div>

                </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    <?php include("footer.php"); ?>
</body>
</html>