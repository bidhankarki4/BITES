<?php 
session_start();
include('header.php');
// Check, if user is already login, then jump to secured page
if (!isset($_SESSION['loguser'])) {
header('Location: login.php');
}

 ?>
<?php include("config.php");

if(empty($_GET['d']))
{
	header("location:allparty.php");
}

if(isset($_POST['sub1']))
 {
   
 $date1=explode('/',$_POST['date1']);
 $date2=$date1[2].'-'.$date1[1].'-'.$date1[0]; 
 
 				
$balloon="No";	
$charge1=0;
if(!empty($_POST['ch1']))
{
$balloon=$_POST["ch1"];
$charge1=$_POST["balloon"];
}

$cake="No";	
$charge2=0;
if(!empty($_POST['ch2']))
{
$cake=$_POST["ch2"];
$charge2=$_POST["cake"];
}
	
$partycharges="No";	
$charge3=0;
if(!empty($_POST['ch3']))
{
$partycharges=$_POST["ch3"];
$charge3=$_POST["partycharges"];
}

$menu1="";
if(!empty($_POST['menu1']))   
{
$menu1=$_POST["menu1"];
}	
   
 $sql="update  bookparty set ptype1='$_POST[ptype]',date1='$date2',time1='$_POST[time1]',orgby='$_POST[orgby]',address='$_POST[address]',contact='$_POST[contact]',email='$_POST[email]',member1='$_POST[members]',spinst='$_POST[spinst]',totalamt='$_POST[totalamt]',advamt='$_POST[advamt]',totaldueamt='$_POST[dueamt]',balloon1='$balloon',charge1='$charge1',cake1='$cake',charge2='$charge2',partyhall='$partycharges',charge3='$charge3',menu1='$menu1' where sno='$_GET[d]'";
 
  
if(!mysql_query($sql))
{
die('Error:'.mysql_error());
} 

}

 
?>

<link href="custcss/typeahead.tagging.css" rel="stylesheet" type="text/css">
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
	  if(document.val.date1.value=="")
	  {
	    alert("On date must be filled out");
		document.val.date1.focus();
		return false;
	  }
	  
	    else if(document.val.contact.value=="")
	  {
	    alert("Contact no must be filled out");
		document.val.contact.focus();
		return false;
	  }
  else
 {
	  
 return true; 
}
	
}
	
	
function calc()
	{
	
		var tot=Number(document.getElementsByName("totalamt")[0].value)-Number(document.getElementsByName("advamt")[0].value);
		
		if(document.getElementsByName("ch1")[0].checked==true)
		{
		tot=Number(tot)+Number(document.getElementsByName("balloon")[0].value);
		}
		
		if(document.getElementsByName("ch2")[0].checked==true)
		{
		tot=Number(tot)+Number(document.getElementsByName("cake")[0].value);
		}
		
		if(document.getElementsByName("ch3")[0].checked==true)
		{
		tot=Number(tot)+Number(document.getElementsByName("partycharges")[0].value);
		}
		
		document.getElementsByName("dueamt")[0].value=tot;
		
	}
	
	function m1(m)
	{
	if(m==1)
	{
	if(document.getElementsByName("ch1")[0].checked==true)
	{document.getElementsByName("balloon")[0].readOnly=false;}
	else{document.getElementsByName("balloon")[0].readOnly=true;}
	}
	else if(m==2)
	{
	if(document.getElementsByName("ch2")[0].checked==true)
	{document.getElementsByName("cake")[0].readOnly=false;}
	else{document.getElementsByName("cake")[0].readOnly=true;}
	}
	else if(m==3)
	{
	if(document.getElementsByName("ch3")[0].checked==true)
	{document.getElementsByName("partycharges")[0].readOnly=false;}
	else{document.getElementsByName("partycharges")[0].readOnly=true;}
	}	
	calc();
	}
  </script>
  
<script src="jquery-1.10.2.js"></script>
<script src="jquery-ui.js"></script>
<link rel="stylesheet" href="jquery-ui.css">
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
            <a href="#">Edit Book Party </a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-star-empty"></i>Edit Book Party</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
			
			<?php
			$sql=mysql_query("select * from bookparty where sno='$_GET[d]'");
			$arrall=mysql_fetch_array($sql);
			?>
			
			
            <div class="box-content" id="d1">
                <form name="val" role="form" onsubmit="return check()" method="POST">
					<table class="table table-striped table-bordered bootstrap-datatable datatable responsive" >
					
					<tr>
					<th>Party Type</th>
					<td colspan="2"><select class="form-control" name="ptype">
					<option value="">Select</option>
						<?php
						
						$s1=mysql_query("select * from addparty order by ptype asc");
						while($arr=mysql_fetch_array($s1))
						{
							$s="";
							if($arrall['ptype1']==$arr['ptype']){$s="selected";}
							echo "<option value='$arr[ptype]' $s>$arr[ptype]</option>";
							
						}	
					?>
					</select></td>
					<th>On Date </th>
					<td colspan="2"><input type="text" class="form-control" placeholder="dd/mm/yy" name="date1" id="date1" value="<?php  $date1=explode('-',$arrall['date1']);
							 echo $date1[2].'/'.$date1[1].'/'.$date1[0]; 	?>"></td>
					</tr>
					
					<tr>
					<th>Time</th>
					<td colspan="2"><input type="text" class="form-control" value="<?php echo $arrall['time1'];?>" placeholder="Ex: 1 PM"  name="time1"></td>
					<th>Organised By </th>
					<td colspan="2"><input type="text" class="form-control" value="<?php echo $arrall['orgby'];?>" placeholder="Person Name" name="orgby"></td>
					</tr>
					
					<tr>
					<th>Address</th>
					<td colspan="2"><textarea class="form-control" placeholder="Address" name="address"><?php echo $arrall['address'];?></textarea></td>
					<th>Contact No</th>
					<td colspan="2"><input type="text" value="<?php echo $arrall['contact'];?>" class="form-control" placeholder="Contact No" name="contact"></td>
					</tr>
					
					<tr>
					<th>Email</th>
					<td colspan="2"><input type="email" class="form-control" value="<?php echo $arrall['email'];?>" placeholder="Email" name="email"></td>
					<!--th>Organised For</th>
					<td><input type="text" class="form-control" placeholder="Person Name" name="orgfor"></td-->
					<th>Total Members</th>
					<td colspan="2"><input type="text" value="<?php echo $arrall['member1'];?>" class="form-control" placeholder="Total Memebers" name="members"></td>
					<!--th>Managed By</th-->
					</tr>
			
			<?php /*
					<tr>
				    <th>Contact No</th>
					<td><input type="text" value="<?php echo $arrall['contact1'];?>" class="form-control" placeholder="Contact No" name="contact2"></td>
					<th>Email</th>
					<td><input type="email" class="form-control" value="<?php echo $arrall['email1'];?>" placeholder="Email" name="email1"></td>
					</tr>
					
					<tr>
				    <th>No of Members</th>
					<td><input type="text" value="<?php echo $arrall['member1'];?>" class="form-control" placeholder="No of Memebers" name="members"></td>
					<th>Managed By</th>
					<td><input type="text" class="form-control" placeholder="Managed By" value="<?php echo $arrall['manageby'];?>" name="manageby"></td>
					</tr>
					*/ ?>
					<tr>
				    <th>Special Instructions *</th>
					<td colspan="5"><textarea class="form-control" placeholder="Special Instructions" name="spinst"><?php echo $arrall['spinst'];?></textarea></td>
					</tr>
					
					<tr>
				    <th>Menu</th>
					<td colspan="6"><input id="menu1" name="menu1" class="tags-input" value="<?php echo $arrall['menu1'];?>"></td>  
					</tr>
					
					<tr>
					<th style="text-align:center;"> <input type="checkbox" value="Yes" style="width:30px;height:40px;" onclick="m1(1);" name="ch1" <?php if(!empty($arrall['balloon1']))if($arrall['balloon1']=="Yes"){echo "checked";}?>> <br>Balloon Decoration</th>
					<td style="padding-top:20px;"><input type="text" onblur="calc();" value="<?php echo $arrall['charge1'];?>" class="form-control" placeholder="Balloon Decoration Charge" name="balloon" <?php if(!empty($arrall['balloon1']))if($arrall['balloon1']=="No"){echo "readonly";}?>></td> <th style="text-align:center;"> <input type="checkbox" value="Yes" style="width:30px;height:40px;" onclick="m1(2);" name="ch2" <?php if(!empty($arrall['cake1']))if($arrall['cake1']=="Yes"){echo "checked";}?>> <br>Cake</th>
					<td style="padding-top:20px;"><input type="text" onblur="calc();"value="<?php echo $arrall['charge2'];?>" class="form-control" placeholder="Cake Charges" name="cake" <?php if(!empty($arrall['cake1']))if($arrall['cake1']=="No"){echo "readonly";}?>></td><th style="text-align:center;"> <input type="checkbox" value="Yes" style="width:30px;height:40px;" onclick="m1(3);" name="ch3" <?php if(!empty($arrall['partyhall']))if($arrall['partyhall']=="Yes"){echo "checked";}?>> <br>Party Hall</th> 
					<td style="padding-top:20px;"><input value="<?php echo $arrall['charge3'];?>" type="text" onblur="calc();" class="form-control" placeholder="Party Hall Charges"  name="partycharges" <?php if(!empty($arrall['partyhall']))if($arrall['partyhall']=="No"){echo "readonly";}?>></td>
					</tr>
					
					<tr>
					<th>Total Amount</th>
					<td><input type="text" onblur="calc();" value="<?php echo $arrall['totalamt'];?>" class="form-control" placeholder="Total Amount" name="totalamt"></td> <th>Advance Amount</th>
					<td><input type="text" onblur="calc();" value="<?php echo $arrall['advamt'];?>" class="form-control" placeholder="Advance Amount" name="advamt"></td>   <th>Total Due Amount</th> 
					<td><input value="<?php echo $arrall['totaldueamt'];?>" type="text" class="form-control" placeholder="Total Due Amount" name="dueamt"></td>
					</tr>
					
					<tr><td colspan='6' style='text-align:center;'><button type="submit" name="sub1" class="btn btn-info">Update</button></td></tr>
					</table>

                  
                </form>

            </div>
			
			
			          
                     </div>
    </div>
</div><!--/row-->


<?php include('footer.php'); ?>


<script src="custjs/libs/typeahead.bundle.min.js"></script>
<script src="custjs/typeahead.tagging.js"></script>
<?php 
$sel=mysql_query("select DISTINCT pname from product_details order by pname");
echo "<script> var";

while($row=mysql_fetch_array($sel))
{

}
echo "</script>";
?>

<script type='text/javascript'>
    <?php
	$sel=mysql_query("select DISTINCT pname from product_details order by pname");
	$menuarray=array();
	$i=0;
	while($row=mysql_fetch_array($sel))
	{
	$menuarray[$i]=$row['pname'];
	$i++;
	}
    ?>
    var menuarray = [<?php echo '"'.implode('","', $menuarray).'"' ?>];
	
	$('#menu1').tagging(menuarray);
</script>