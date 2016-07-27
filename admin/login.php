<html>
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <script src="js/jquery.js"></script>
 <script type="text/javascript">
     $(document).ready(function(){
        $('#username').focus();
     });
 </script>

</head>
<body style="background-image:url(login.jpg)" >
    <div style="padding-top:180px; padding-left:350px; padding-right: 350px; opacity:0.8">
    <div style="border:5px solid;border-radius:100px 0px 100px 0px;text-align:center;padding:20px;background:rgba(255,255,255,0.5);" >
        <h2 style="font-family:verdana">Login Panel</h2>
        <br/>
        <div align="center">
        <?php
            if((isset($_GET['status'])) && ($_GET['status'] == "failure")){
                ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <b>Either Username or Password was Incorrect.</b>
                        </div>
                    </div>
                </div>
                <?php
            }
        ?>
        <form method="post" action="validate_admin.php" name="myform">
            <table width="70%">
                <tr>
                    <td>
                        <span style="font-size:20px;padding-right:20px">Username:</span>
                    </td>
                    <td>
                        <input type="text" name="username" class="form-control" id="username" />
                    </td>
                </tr>

                <tr>
                    <td>
                        <span style="font-size:20px;padding-right:20px">Password:</span>
                    </td>
                    <td>
                        <input type="password" name="password" class="form-control" />
                    </td>
                </tr>
            </table>
            <br/><br/>
            <div align="center" width="100%">
                <button style="height:40px;width:120px" type="submit" class="btn btn-primary" ><span style="font-size:20px"><i class="fa fa-sign-in">  Log In </i></span></button>
                <button style="height:40px;width:120px" type="reset" class="btn btn-danger" ><span style="font-size:20px"><i class="fa fa-sign-in">  Reset </i></span></button>
            </div>
        </form>
        </div>
    </div>
</body>
</html>