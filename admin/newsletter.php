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
<script>
function hid(data){
    if(data == 1){
        document.getElementById("ind").style.display="block";
        document.getElementById("grp").style.display="none";      
    }else{
        document.getElementById("ind").style.display="none";   
        document.getElementById("grp").style.display="block";   
    }
    
     
}

</script>
</head>
<body>
	<?php 
	$id = 8;
	include("header.php"); 
	
	?>
	        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-envelope"></i>
                            Send NewsLetter/Mail
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-envelope"></i> Send NewsLetter/Mail
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div align="center">
                    <button class="btn btn-primary" onclick="hid(1)">Mail To Individual</button>
                    <button class="btn btn-primary" onclick="hid(2)">Mail To Group</button>
                </div><br/>

                <div style="display:none" class="panel panel-primary" id="ind">
                    <div class="panel-heading">Individual Mail</div>
                    <div class="panel-body">
            <form method="POST" action="send_mail.php">
                <div class="row">
                    <div class="col-md-1" >From: 
                    </div>
                    <div class="col-md-6">
                    <input type="text" value="sscorporation-admin@gmail.com" class="form-control" readonly /><br/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-1" >To:
                    </div>
                    <div class="col-md-6">
                    <input type="text" class="form-control" required /><br/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-1" >Subject: 
                    </div>
                    <div class="col-md-6">
                    <textarea class="form-control" rows="10" required></textarea><br/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-7" align="center">
                        <input type="submit" class="btn btn-danger" name="mail" value="Send" />
                    </div>
                </div>

            </form>
            </div>
            </div>

                <div style="display:none" class="panel panel-primary" id="grp">
                    <div class="panel-heading">Group Mail</div>
                    <div class="panel-body">
            <form method="POST" action="send_mail.php">
                <div class="row">
                    <div class="col-md-1" >From: 
                    </div>
                    <div class="col-md-6">
                    <input type="text" value="sscorporation-admin@gmail.com" class="form-control" readonly /><br/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-1" >To:
                    </div>
                    <div class="col-md-6">
                    <input type="text" class="form-control" required /><br/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-1" >Subject: 
                    </div>
                    <div class="col-md-6">
                    <textarea class="form-control" rows="10" required></textarea><br/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-7" align="center">
                        <input type="submit" class="btn btn-danger" name="mail" value="Send" />
                    </div>
                </div>

            </form>
            </div>
            </div>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    <?php include("footer.php"); ?>
</body>
</html>