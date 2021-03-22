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
$sqld="delete from product_details where sno='$_GET[dt]'";
if(!mysql_query($sqld))
{
die('Error:'.mysql_error());
} 
}

if(!empty($_GET['page']))
{
	$smt=explode('.',$_GET['page']);
	if(count($smt)>1)
	{
		header("location:pconfig.php?page=1");
	}
}


if(isset($_GET['page']))
{
if (!is_numeric($_GET['page'])) {
header("location:pconfig.php?page=1");
}
else if($_GET['page']=='0' || $_GET['page']<0)
{
	header("location:pconfig.php?page=1");
}
}

if(isset($_POST['sub1']))
 {
  
$pname=mysql_real_escape_string($_POST['pname']);
  
 $sql="insert into product_details(pname,ptype,pcost,tax,user,catname) values('$pname','$_POST[ptype]','$_POST[pcost]','$_POST[tax]','$_SESSION[loguser]','$_POST[cat]')";
 
  
if(!mysql_query($sql))
{
die('Error:'.mysql_error());
} 

}
 
 if(isset($_POST['update']))
 {
 
 $pname=mysql_real_escape_string($_POST['pname']);
 
 $sql2="update product_details set pname='$pname',ptype='$_POST[ptype]',pcost='$_POST[pcost]',tax='$_POST[tax]',catname='$_POST[cat]' where sno='$_POST[sno]'";
 
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
   document.val.cat.focus();
   }
    
	function check()
	{
	   
	  if(document.val.pname.value=="")
	  {
	    alert("Product name must be filled out");
		document.val.pname.focus();
		return false;
	  }
       else if(document.val.ptype.value=="")
	   {
	   alert("select product type");
        document.val.ptype.focus();
		return false;
	   }
	  else if(document.val.pcost.value=="")
	  {
	    alert("Product Cost must be filled out");
		document.val.pcost.focus();
        return false;
	  }
	  else if(document.val.tax.value=="")
	  {
	    alert("Tax must be fill out");
		document.val.tax.focus();
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
            <a href="#"> Product Configuration</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-star-empty"></i> Product Configuration</h2>

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
                <form name="val" action="pconfig.php" role="form" onsubmit="return check()" method="POST">
					<table class="table table-striped table-bordered bootstrap-datatable datatable responsive" >
					
					<tr>
					<td><div class="form-group">
                        <label for="name">Select Category</label>
						</div></td>
					<td><div class="form-group">
                    <select name="cat" class="form-control">
					<option value="">Select</option>
					<?php
						
						$s=mysql_query("select * from addcat order by catname asc");
						while($arr=mysql_fetch_array($s))
						{
							echo "<option value='$arr[catname]'>$arr[catname]</option>";
							
						}	
					?>
					</select>
                    </div></td>
					</tr>
					
					<tr>
					<td><div class="form-group">
                        <label for="name">Product Name</label>
						</div></td>
					<td><div class="form-group">
                        <input type="text" class="form-control" name="pname">
                    </div></td>
					</tr>
					
					<tr>

					<td><div class="form-group">
                        <label for="name">Product Type</label>
						 </div></td>
					<td><div class="form-group">
					
						 <select name="ptype" class="form-control">
                          <option value="">Select</option>
                            <option value="Food">Food</option>
                            <option value="Beverage">Beverage</option>
                          </select>
						  </div></td>
					                    
					 </tr>
					

					<tr><td><div class="form-group">
                        <label for="name">Product Cost</label></div></td>
						<td><div class="form-group">
                        <input type="text" class="form-control" id="topic" name="pcost">
                   </div></td>
					</tr>
					
					<tr><td><div class="form-group">
                        <label for="name">Tax (%)</label></div></td>
						<td><div class="form-group">
                        <input type="text" class="form-control" id="topic" value="0" name="tax"></div></td>
						</tr>
						<tr><td colspan='2' style='text-align:center;'><button type="submit" name="sub1" class="btn btn-info">Submit</button></td></tr>
					</table>

                  
                </form>

            </div>
			
			
			          
              <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <tr><th>S.No.</th><th>Category</th><th>Product Name</th><th>Type</th><th>Cost</th><th>Tax</th><th>Update</th><th>Delete</th></tr>
	
	<?php 
$num_rec_per_page=10;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
if (isset($_GET["page"])) {if($_GET['page']==0 || $_GET['page']<0) $page=1;} 
$sqlckk = mysql_query("select * from product_details");
if(mysql_num_rows($sqlckk)<=10)
{
	$page=1;
}

$start_from = ($page-1) * $num_rec_per_page; 
$sql = "select * from product_details LIMIT $start_from, $num_rec_per_page"; 
$rs_result = mysql_query ($sql); //run the query

$i=1;
$p=$page-1;
while($row=mysql_fetch_array($rs_result))
{
	$s="";
	$p1="";
	if($row['ptype']=='Food')
    {
	$s="selected";
	}
	else
	{
	$p1="selected";
	}
	$sp=$i+$p*10;
	echo "<form method='post'>";
	echo "<tr><td>$sp</td><td>";
	?>

	 <select name="cat" class="form-control">
					<option value="">Select</option>
					<?php
						
						$s1=mysql_query("select * from addcat");
						while($arr1=mysql_fetch_array($s1))
						{
							$c="";
							if($arr1['catname']==$row['catname']){$c="selected";}
							echo "<option value='$arr1[catname]' $c>$arr1[catname]</option>";
							
						}	
					?>
					</select>
	<?php
	echo "</td><td><input type='text' name='pname' value='$row[pname]' class='form-control'></td><td>
	<select name='ptype' class='form-control'><option value='Food' $s>Food</option>
	<option value='Beverage' $p1>Beverage</option></select></td><td><input type='text' name='pcost' value='$row[pcost]' class='form-control'></td><td><input type='text' name='tax' value='$row[tax]' class='form-control'></td><td><input type='submit' name='update' value='Update' class='btn btn-info' ></td><td><a href='pconfig.php?dt=$row[sno]&&page=$page' class='btn btn-danger' onclick='return check1();'>Delete</a></td></tr>";
	echo "<input type='hidden' value='$row[sno]' name='sno'>";
	echo "</form>";
	$i++;
	}
	
	?>
	
	
</table>
   

   
<?php 
$sql = "select * from  product_details"; 
$rs_result = mysql_query($sql); //run the query
$total_records = mysql_num_rows($rs_result);  //count number of records
if($total_records>10)
{
$total_pages = ceil($total_records / $num_rec_per_page); 

$l=1;

if($total_pages<$page)
{
header("location:pconfig.php?page=$total_pages");
}


echo "<center><div style='margin-top:50px;text-align:center;width:600px;clear:both;margin-left:200px;'>";
$page1=1;
$page2=10;
echo "<div style='padding:5px;border:1px solid black;float:left;margin-right:3px;background:#c71c22;'><a href='pconfig.php?page=1' style='color:white;'>First</a></div>";

if($page>0 && $page!=1)
{
$page1=$page-1;	
echo "<div style='padding:5px;border:1px solid black;float:left;margin-right:3px;background:#c71c22;'><a href='pconfig.php?page=$page1' style='color:white;'>Prev</a></div>";
}

if($page1==0)
{
	$page1=1;
}

if($page>$total_pages)
{
	$page2=$total_pages;
}
if($page<=$total_pages)
{
if($page1>$total_pages-10)	
{
	$page1=$total_pages-9;
}
if($total_pages<=10)
{
	$page1=1;
	$page2=$total_pages;
}
	
for ($i=$page1; $i<=$total_pages; $i++) {
$p="";
if($page==$i){$p="background:#04519b;color:white;";}
if($l<11)
{
echo "<div style='padding:5px;border:1px solid black;float:left;margin-right:3px;$p'><a href='pconfig.php?page=$i' style='$p'>$i</a></div> "; 
$nxt=$i+1;
}
$l++;
}
} 
if($page < $total_pages)
{
$page2=$page+1;
echo "<div style='padding:5px;border:1px solid black;float:left;margin-right:3px;background:#c71c22;'><a href='pconfig.php?page=$page2' style='color:white;'>Next</a></div>";
}
echo "<div style='padding:5px;border:1px solid black;float:left;margin-right:3px;background:#c71c22;'><a href='pconfig.php?page=$total_pages' style='color:white;'>Last</a></div>";


echo "</div></center>";
}
?>  
        </div>
    </div>
</div><!--/row-->


<?php include('footer.php'); ?>
