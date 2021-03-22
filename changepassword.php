<?php
session_start();
// Check, if user is already login, then jump to secured page
if (!isset($_SESSION['loguser'])) {
header('Location: login.php');
}
?>
<?php include("config.php"); ?>
<?php
if(!empty($_POST['oldpass']) && !empty($_POST['newpass']) && !empty($_POST['cnewpass']))
{
if($_POST['newpass']==$_POST['cnewpass'])
{
$sql="update login_details set pass='$_POST[newpass]' where pass='".$_POST['oldpass']."' and user='".$_SESSION['loguser']."'";
echo $sql;
$result=mysql_query($sql);
if(mysql_affected_rows()==1)
{
$error= "<span style='color:green;font-weight:bold;'>Password Successfully Changed</span>";
}
else
{
$error= "<span style='color:red;font-weight:bold;'>Be sure: </span> 1) your Old Password is correct <br> 2) New Password and Confirm New Password is same";
}
}
else 
$error= "<span style='color:red;font-weight:bold;'>New Password and Confirm New Password din not matched</span> ";
header('Location:changepassword.php?n='.$error);
}
else
$error= "Please enter correctly";

?>
<?php include("header.php"); ?>
<link rel="stylesheet" href="css/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" href="css/multiple-select.css" />
<link href="css/body-A.css" rel="stylesheet" type="text/css" />
<script src="js/validation-A.js"></script>
<script type="text/javascript"src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type="text/javascript">
var st = "<?php echo $_SESSION['logadmin'];?>";
//alert(st );
$(document).ready(function () {
	$('#oldpass').blur(function (e1) {
	//alert();
        Fun1($(this).val());
    });
	
	function Fun1(inputString1) {
	
        $.ajax({

            url: "passajax.php",
//The inputString will contain the value of your DropDown, you will give this parameter in the querystring
            data: 'queryString1=' + inputString1 + '&query1=' + st,
            success: function (msg) {
//MSG will be the "message" from the query
//As you see you'll put the MSG in your HTML of your #yourFormTag
//This message can contain everything you want
                if (msg.length > 0) {
                    $('#result').html(msg);

                }
            }
        });
} });
</script>
<script>
$(document).ready(function() {
$('#confirm_password').keyup(function(){
if($('#password').val()==$('#confirm_password').val()){
$('#pass_check').css('color','green');
$('#pass_check').html('Matched');}
else{
$('#pass_check').css('color','red');
$('#pass_check').html('Not Matched');
}});});
</script>

</head>
<body>
   
<?php 
if(!empty($_GET['n']))
{
echo $_GET['n'];
}
?>
    <div class="row">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Change Password</h2>

        <div class="box-icon">
            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </div>
    <div class="box-content">
	<form action="changepassword.php" method="post">
<table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    
    <tbody>
	
    <tr><td class="center" style="font-weight:bold;">Old Password</td><td class="center"><input type="text" name="oldpass" id="oldpass"><div style="width:200px;" id="result"></div></td></tr>
    <tr><td class="center" style="font-weight:bold;">New Password</td><td class="center"><input type="text" name="newpass" id="password"><div style="width:200px;" id="pass_check"></div></td></tr>
    <tr><td class="center" style="font-weight:bold;">Confirm New Password</td><td class="center"><input type="text" name="cnewpass" id="confirm_password"></td></tr>
    <tr><td class="center"></td><td class="center"><input type="submit" name="update" value="UPDATE" class="btn btn-info"></td></tr>
   
    
 </table>
 </form>
	</div></div>

    </div>
    </div>
    </div>
    <!--/span-->

    </div><!--/row-->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->
    <hr>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                </div>
            </div>
        </div>
    </div>

<script src="js/jquery.min.js"></script>
<script src="js/jquery.multiple.select.js"></script>

    <?php include('footer.php'); ?>

</body>
</html>
