<?php
session_start();
if (!isset($_SESSION['loguser'])) {
header('Location: login.php');
}
require('header.php'); 

?>
<head>


<style>
.center{text-align:center;}

</style>

</head> 
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Dashboard</a>
        </li>
    </ul>
</div>


<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Introduction</h2>

                <!--div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div-->
            </div>
            <div class="box-content row" >
                <div class="row" style="margin-left:10px;margin-right:10px;">
    <!---div class="col-md-12 col-sm-3 col-xs-12" style='text-align:center;'>
       <h1>Welcome To Hotel Saraswati</h1>
	</div--->
	<div style="text-align:center;">
	<div style="background: black;color: white;font-size: 30px;padding: 10px;">Welcome to Bites</div>
	<img src="img/banner.jpg" style="width: 100%;height:400px;"></img>
	</div>
            <!-- Ads, you can remove these -->
                
                <!-- Ads end -->

            </div>
        </div>
    </div>
</div>
</div>



<?php require('footer.php'); ?>
