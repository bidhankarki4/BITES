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
$sqld="delete from addparty where sno='$_GET[dt]'";
if(!mysql_query($sqld))
{
die('Error:'.mysql_error());
} 
}


if(isset($_POST['sub1']))
 {
   
 $sql="insert into addparty(ptype,user) values('$_POST[ptype]','$_SESSION[loguser]')";
 
  
if(!mysql_query($sql))
{
die('Error:'.mysql_error());
} 

}
 
 if(isset($_POST['update']))
 {
 
 $sql2="update addparty set ptype='$_POST[ptype]' where sno='$_POST[sno]'";
 
if(!mysql_query($sql2))
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
   document.val.ptype.focus();
   }
    
	function check()
	{   
	  if(document.val.ptype.value=="")
	  {
	    alert("Party type must be filled out");
		document.val.ptype.focus();
		return false;
	  }
  else
 {
	  
 return true; 
}
	
	}
  </script>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#"> Add Party Type</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-star-empty"></i> Add Party Type</h2>

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
                <form name="val" action="addpartytype.php" role="form" onsubmit="return check()" method="POST">
					<table class="table table-striped table-bordered bootstrap-datatable datatable responsive" >
					
					<tr>
					<th>Party Type</th>
					<td><input type="text" class="form-control" placeholder="Party Type" name="ptype"></td>
					</tr>
					
					
				
						<tr><td colspan='2' style='text-align:center;'><button type="submit" name="sub1" class="btn btn-info">Submit</button></td></tr>
					</table>

                  
                </form>

            </div>
			
			
			          
              <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <tr><th>S.No.</th><th>Party Type</th><th>Update</th><th>Delete</th></tr>
	
	<?php
	$sql1=mysql_query("select * from addparty order by sno desc");
	$i=1;
	while($arr=mysql_fetch_array($sql1))
	{
	
	echo "<form action='addpartytype.php' method='post'>";
	echo "<tr><td>$i</td><td><input type='text' name='ptype' value='$arr[ptype]' class='form-control'></td><td><input type='submit' name='update' value='Update' class='btn btn-info' ></td><td><a href='addpartytype.php?dt=$arr[sno]' class='btn btn-danger' onclick='return check1();'>Delete</a></td></tr>";
	echo "<input type='hidden' value='$arr[sno]' name='sno'>";
	echo "</form>";
	$i++;
	}
	
	?>
	
	
</table>
          
        </div>
    </div>
</div><!--/row-->


<?php include('footer.php'); ?>
