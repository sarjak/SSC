
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
                <a class="navbar-brand" href="index.html"> Admin Panel </a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
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

                    <li>
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Manage Questions </a>
                    </li>
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
                    
                    <li>
                        <a href="bootstrap-grid.html"><i class="fa fa-fw fa-trophy"></i> Manage Achievements &amp; Awards</a>
                    </li>
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
              
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>