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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
	.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
</style>
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
                        <h1 class="page-header">
                            Manage Gallery
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-photo"></i> Manage Gallery
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
            <form action="upload_image.php" method="post" enctype="multipart/form-data">
                <div class="row">
                	<div class="col-sm-2">
						<h5>Upload Image here...</h5>
					</div>
					<div class="col-sm-2">
				<span class="btn btn-primary btn-file">
    				Browse... <input type="file" name="files[]" multiple />
				</span>
					</div>
					<div class="col-sm-2">
				<input type="submit" value="Upload" name="submit" class="btn btn-primary" />
					</div>
				</div>
			</form>


			<?php
			if((isset($_GET['status'])) && ($_GET['status'] == "success")){
				?>
 				<div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            Excellent! The Files have been uploaded Successfully.
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
			<?php
				$stmt = $db->query("SELECT * FROM manage_images");
				
				while($row1 = $stmt->fetch(PDO::FETCH_ASSOC)){
					?>
					<div class="col-md-3" >
    				<a href="#" class="thumbnail">
      				<img src="<?= $row1['image_path'] ?>" >
    				</a>
  				</div>	
					<?php
					
				}
			?>
  				
			</div>
<!--
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  <strong>Like SB Admin?</strong> Try out <a href="http://startbootstrap.com/template-overviews/sb-admin-2" class="alert-link">SB Admin 2</a> for additional features!
                        </div>
                    </div>
                </div>
    -->


            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

	<?php include("footer.php"); ?>
</body>
</html>