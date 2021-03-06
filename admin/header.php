<?php
require 'access/dbaccess.php';
require 'access/session.php';
$user = $_SESSION['username'];
if($_SESSION['sid'] == session_id()){
    $row = $db->query("SELECT * FROM administrator WHERE username = '$user' ");
    $row1 = $row->fetch(PDO::FETCH_ASSOC);

$nRows = $db->query('select count(*) from manage_notification WHERE seen = 0')->fetchColumn(); 
//echo $nRows;
    $notification = $db->query("SELECT * FROM manage_notification WHERE seen = 0 ");
    
}
?>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"> Admin Panel </a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge"><?= $nRows ?></span><b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                    <?php
                        while($notify = $notification->fetch(PDO::FETCH_ASSOC)){
                            if($notify['type'] == "Registration"){
                                $stdnt = $db->query("SELECT * FROM manage_students WHERE username = '$notify[fk]'");
                                $std = $stdnt->fetch(PDO::FETCH_ASSOC);
                        
                    ?>
                        <li class="message-preview">
                            <a href="view_student.php?notify=<?= $notify['id'] ?>&amp;stdnt=<?= $std['username'] ?>" >
                                <div style="color:blue" class="media">
                                    <span class="pull-left">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>New Registration</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> <?= date_format(date_create($std['reg_date']),"D d-M-Y h:i A") ?></p>
                                        <b>Name:</b> <?= $std['fname'] ." ". $std['lname'] ?>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <?php
                                }elseif($notify['type'] == "Enrol"){
                                    $stdnt = $db->query("SELECT * FROM manage_students WHERE username = '$notify[fk]'");
                                    $std = $stdnt->fetch(PDO::FETCH_ASSOC);

                                    $enrol = $db->query("SELECT * FROM manage_enrol  as enrol NATURAL JOIN manage_courses as course WHERE enrol.course_id = course.course_id AND username = '$notify[fk]' ");
                                    $enrol1 = $enrol->fetch(PDO::FETCH_ASSOC);

                                    //$course = $db->query("");
                                ?>
                        <li class="message-preview">
                            <a href="index.php?id=<?= $notify['id'] ?>&amp;username=<?= $notify['fk'] ?>">
                                <div style="color:darkorange" class="media">
                                    <span class="pull-left">
                                        <i class="fa fa-table"></i>
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>Course Enrolment</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> <?= date_format(date_create($std['reg_date']),"D d-M-Y h:i A") ?></p>
                                        <b>Name:</b> <?= $std['fname'] ." ". $std['lname'] ?><br/>
                                        <b>Course:</b> <?= $enrol1['course_name'] ?>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <?php
                                }elseif ($notify['type'] == "Pass") {
                                    $result = $db->query("SELECT * FROM manage_result NATURAL JOIN manage_courses WHERE exam_id = course_id AND id = $notify[fk]");
                                    $res = $result->fetch(PDO::FETCH_ASSOC);

                                    $stdnt = $db->query("SELECT * FROM manage_students WHERE username = '$res[username]'");
                                    $std = $stdnt->fetch(PDO::FETCH_ASSOC);
                                    ?>
                        <li class="message-preview">
                            <a href="#">
                                <div style="color:green" class="media">
                                    <span class="pull-left">
                                        <i class="fa fa-trophy"></i>
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>Course Cleared </strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> <?= date_format(date_create($res['date']),"D d-M-Y h:i A") ?></p>
                                        <b>Name:</b> <?= $std['fname'] ." ". $std['lname'] ?><br/>
                                        <b>Course:</b> <?= $res['course_name'] ?>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <?php
                                }
                            }
                        ?>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $row1['fname'] ." ". $row1['lname'] ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="manage_about_us.php"><i class="fa fa-fw fa-user"></i> My Profile</a>
                        </li>
                        <li>
                            <a href="manage_t&c.php"><i class="fa fa-fw fa-check"></i> Manage T&amp;C.</a>
                        </li>
                        <li>
                            <a href="manage_faq.php"><i class="fa fa-fw fa-question"></i> Manage FAQs</a>
                        </li>
                        <li>
                            <a href="manage_career.php"><i class="fa fa-fw fa-bookmark"></i> Career Advice</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                <?php
              		if($id == 1){
              			?>
              			<li class="active">
                        	<a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard </a>
                    	</li>	
              			<?php
              		}else{
              			?>
              			<li>
                        	<a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    	</li>
              			<?php
              		}
					
              		if($id == 2){
              			?>
              			<li class="active">
                        	<a href="manage_students.php"><i class="fa fa-fw fa-group"></i> Manage Students </a>
                    	</li>	
              			<?php
              		}else{
              			?>
              			<li>
                        	<a href="manage_students.php"><i class="fa fa-fw fa-group"></i> Manage Students </a>
                    	</li>
              			<?php
              		}
					?>
                    
                <?php
                                        
                    if($id == 4){
                        ?>
                        <li class="active">
                            <a href="manage_category.php"><i class="fa fa-fw fa-tags"></i> Manage Categories </a>
                        </li>
                        <?php
                    }else{
                        ?>
                        <li>
                            <a href="manage_category.php"><i class="fa fa-fw fa-tags"></i> Manage Categories </a>
                        </li>
                        <?php
                    }
                    ?>

                    <?php
                                        
                    if($id == 3){
                        ?>
                        <li class="active">
                            <a href="manage_courses.php"><i class="fa fa-fw fa-table"></i> Manage Courses </a>
                        </li>
                        <?php
                    }else{
                        ?>
                        <li>
                            <a href="manage_courses.php"><i class="fa fa-fw fa-table"></i> Manage Courses </a>
                        </li>
                        <?php
                    }
                    ?>

              		<?php
              		if($id == 6){
              			?>
              			<li class="active">
                        	<a href="manage_gallery.php"><i class="fa fa-fw fa-photo"></i> Manage Gallery </a>
                    	</li>	
              			<?php
              		}else{
              			?>
              			<li>
                        	<a href="manage_gallery.php"><i class="fa fa-fw fa-photo"></i> Manage Gallery </a>
                    	</li>
              			<?php
              		}
					?>

                    <?php
                    if($id == 7){
                        ?>
                        <li class="active">
                            <a href="manage_institute.php"><i class="fa fa-fw fa-bank"></i> Manage Institutions </a>
                        </li>   
                        <?php
                    }else{
                        ?>
                        <li>
                            <a href="manage_institute.php"><i class="fa fa-fw fa-bank"></i> Manage Institutions </a>
                        </li>
                        <?php
                    }
                    ?>
                    
                    <?php
                    if($id == 5){
                        ?>
                        <li class="active">
                            <a href="manage_awards.php"><i class="fa fa-fw fa-trophy"></i> Manage Achievements &amp; Awards</a>
                        </li>
                        <?php
                    }else{
                        ?>
                        <li>
                            <a href="manage_awards.php"><i class="fa fa-fw fa-trophy"></i> Manage Achievements &amp; Awards</a>
                        </li>
                        <?php
                    }
                    ?>
<!--
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-home"></i> Manage HomePage <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#"> Manage SlideShow </a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li>
                    -->

                    <?php
                    if($id == 10){
                        ?>
                        <li class="active">
                            <a href="manage_workshop.php"><i class="fa fa-fw fa-cog"></i> Manage Workshops / Sessions </a>
                        </li>   
                        <?php
                    }else{
                        ?>
                        <li>
                            <a href="manage_workshop.php"><i class="fa fa-fw fa-cog"></i> Manage Workshops / Sessions </a>
                        </li>
                        <?php
                    }
                    ?>

                    <?php
                    if($id == 8){
                        ?>
                        <li class="active">
                            <a href="newsletter.php"><i class="fa fa-fw fa-envelope"></i> Send NewsLetters/Mail </a>
                        </li>   
                        <?php
                    }else{
                        ?>
                        <li>
                            <a href="newsletter.php"><i class="fa fa-fw fa-envelope"></i> Send NewsLetters/Mail </a>
                        </li>
                        <?php
                    }
                    ?>

                    <?php
                    if($id == 15){
                        ?>
                        <li class="active">
                            <a href="manage_news_feed.php"><i class="fa fa-fw fa-list-alt"></i> Manage News Feed </a>
                        </li>   
                        <?php
                    }else{
                        ?>
                        <li>
                            <a href="manage_news_feed.php"><i class="fa fa-fw fa-list-alt"></i> Manage News Feed </a>
                        </li>
                        <?php
                    }
                    ?>

                          <?php
                    if($id == 9){
                        ?>
                        <li class="active">
                            <a href="manage_about_us.php"><i class="fa fa-fw fa-info"></i> Manage About Us </a>
                        </li>   
                        <?php
                    }else{
                        ?>
                        <li>
                            <a href="manage_about_us.php"><i class="fa fa-fw fa-info"></i> Manage About Us </a>
                        </li>
                        <?php
                    }
                    ?>

              
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>