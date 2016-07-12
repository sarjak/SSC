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
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	<?php 
	$id = 2;
	include("header.php"); 
	
	?>
	
	        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-group"></i>
                            Manage Students
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-group"></i> Manage Students
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

    <div class="row">
        <div align="center">
            <button class="btn btn-primary" onClick="window.location='add_student.php'">Add Student</button>
            <button class="btn btn-primary" onClick="window.print()">Print Data</button>
        </div>
    </div>

                <div class="table-responsive">
                <table class="table table-striped" id="myTable">
  <thead>
    <tr>
      <th>#</th>
      <th>First Name</th>
      
      <th>Last Name</th>
      <th>Username</th>
      
      
      
      
      <th>Email</th>
      <th>Mobile No.</th>
      <th>Landline</th>
    </tr>
  </thead>
  <tbody>
  
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    <tr onclick="document.location='index.php?std=<?php echo "studntid" ?>'" style="cursor:hand">
    
      <th scope="row">1</th>
      <td>Sarjak</td>
      
      <td>Gandhi</td>
      <td>sarjakqww21</td>
      
      
      
      <td>sarjak_29@yahoo.com</td>
      <td>8690999608</td>
      <td>079-22740611</td>

    </tr>
    
  </tbody>
</table>
</div>

    

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