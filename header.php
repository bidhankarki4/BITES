<?php include 'config.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>   
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">  

    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <!--link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'-->
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">
	<style>
	input[type=text]{   
		padding: 2px 5px !important;
	}
	</style>
</head>

<body>
<?php
/* if (!isset($no_visible_elements) || !$no_visible_elements) { */?>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"> <img alt="Charisma Logo" src="img/logo20.png" class="hidden-xs"/>
                <span>Bites</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right theme-container animated tada">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> Hello Admin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
          
        </div>
    </div>
    <!-- topbar ends -->
<?php /* } */ ?>
<div class="ch-container">
    <div class="row">
        <?php /* if (!isset($no_visible_elements) || !$no_visible_elements) { */ ?>

        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li><a class="ajax-link" href="index.php"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                        </li>
						
						  <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-plus"></i> <span>Configuration</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="addcat.php"> Add Category</a></li>		
								<li><a href="addpartytype.php"> Add Party Type</a></li>	
								<li><a href="pconfig.php"> Add / Edit Product</a></li>
                               
                            </ul>
                        </li>
						
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-plus"></i> <span>Order</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="tablenew.php"> Table</a></li>
								<li><a href="direct.php"> Direct</a></li>
                               
                            </ul>
                        </li>		

						 <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-plus"></i><span> Parties</span></a>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="bookparty.php"> Book Party</a></li>
								<li><a href="allparty.php"> Edit/Update Party</a></li>
                               
                            </ul>
                        </li>
						
						
						<li><a href="billprint.php"><i class="glyphicon glyphicon-edit"></i> <span>Get Order Bill</span></a>
                        </li>			
					
						<li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-plus"></i> <span>All Reports</span></a>
                            <ul class="nav nav-pills nav-stacked">
							 <li><a href="dailyreport.php">Daily Sales Report</a></li>
                                <li><a href="mreport.php">Date Wise Reports</a></li>								
                            </ul>
                        </li>
						
                        <li><a href="changepassword.php"><i class="glyphicon glyphicon-ban-circle"></i><span> Change Password</span></a>
                        </li>
                        <li><a href="logout.php"><i class="glyphicon glyphicon-lock"></i><span> Logout</span></a>
                        </li>
                    </ul>
                    
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <?php /* } */ ?>
