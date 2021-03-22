<?php 
session_start();
include('header.php');
// Check, if user is already login, then jump to secured page
if (!isset($_SESSION['loguser'])) {
header('Location: login.php');
}

 ?>
<?php include("config.php");

if(!empty($_GET['dt']))
{
$sqld="delete from bookparty where sno='$_GET[dt]'";
if(!mysql_query($sqld))
{
die('Error:'.mysql_error());
} 
}



 
?>
 <script>
 
 function check1(){
 var cr=confirm("Do You want To Delete");
 if(cr==true)
 {
 return true;
 }
 else
 {
 return false;
 }
 
 }
 
   window.onload=function fs(){
   document.val.cname.focus();
   }
    
	function check()
	{   
	  if(document.val.cname.value=="")
	  {
	    alert("Category name must be filled out");
		document.val.cname.focus();
		return false;
	  }
  else
 {
	  
 return true; 
}
	
	}
  </script>
  
   <script src="jquery-1.10.2.js"></script>
<script src="jquery-ui.js"></script>
<link rel="stylesheet" href="jquery-ui.css">
<!-- jQuery Code executes on Date Format option ----->
<script>


$(function() {
$("#date1").datepicker({dateFormat: "dd/mm/yy"});

});

</script>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#"> Book Party</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-star-empty"></i> Book Party</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content" id="d1">
                    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <tr><th>S.No.</th><th>Party Type</th><th>Date</th><th>Time</th><th>Organised By</th><th>Edit</th><th>Delete</th></tr>
	
	<?php
	$sql1=mysql_query("select * from bookparty order by sno desc");
	$i=1;
	while($arr=mysql_fetch_array($sql1))
	{
	
	echo "<tr><td>$i</td><td>$arr[ptype1]</td><td>$arr[date1]</td><td>$arr[time1]</td><td>$arr[orgby]</td><td><a href='allpartyu.php?d=$arr[sno]' class='btn btn-info'>Edit</a></td><td><a href='allparty.php?dt=$arr[sno]' class='btn btn-danger' onclick='return check1();'>Delete</a></td></tr>";
	
	$i++;
	}
	
	?>
	
	
</table>

            </div>
			
			
			          
         
          
        </div>
    </div>
</div><!--/row-->


<?php include('footer.php'); ?>
