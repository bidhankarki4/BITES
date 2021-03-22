<?php
session_start();
if(!isset($_SESSION['loguser'])) {
header('Location:login.php');
}

 include('header.php'); 

include("config.php");

if(!empty($_GET['dt']))
{
mysql_query("delete from order_details where sno='$_GET[dt]'");
}

if(isset($_POST['add']))
 {
   
  $str=explode('-',$_POST['billno']);
  //echo $str[1];
 
 $date1=explode('/',$_POST['date']);
 
 $date2=$date1[2].'-'.$date1[1].'-'.$date1[0];
 
  $time=date("H:i:s a");
 
 
  $pname=mysql_real_escape_string($_POST['pname']);
  
 $sql="insert into order_details(tableno,billno,date1,time1,type1,pname,qty,val,user,disc1) values('$_POST[tablenos]','$_POST[billno]','$date2','$time','table','$pname','$_POST[qty]','$str[1]','$_SESSION[loguser]','0')";

// echo $sql;
  
if(!mysql_query($sql))
{
die('Error:'.mysql_error());
} 
 
}


if(isset($_POST['update']))
{


$sql2=mysql_query("update order_details set qty='$_POST[pqty]' where sno='$_POST[sno]'");

header("location:table.php?billno=$_POST[billno]&&date=$_REQUEST[date]&&tablenos=$_REQUEST[tablenos]");
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
 
window.onload = function(){
 document.val.pname.focus();
 
}


var date_format = '12'; /* FORMAT CAN BE 12 hour (12) OR 24 hour (24)*/


var d       = new Date();
var hour    = d.getHours();  /* Returns the hour (from 0-23) */
var minutes     = d.getMinutes();  /* Returns the minutes (from 0-59) */
var result  = hour;
var ext     = '';

if(date_format == '12'){
    if(hour > 12){
        ext = 'PM';
        hour = (hour - 12);

        if(hour < 10){
            result = "0" + hour;
        }else if(hour == 12){
            hour = "00";
            ext = 'AM';
        }
    }
    else if(hour < 12){
        result = ((hour < 10) ? "0" + hour : hour);
        ext = 'AM';
    }else if(hour == 12){
        ext = 'PM';
    }
}

if(minutes < 10){
    minutes = "0" + minutes; 
}

result = result + ":" + minutes + ' ' + ext; 





 function prt3()
{
	
setval();

 var x;
    if (confirm("Do you want to Print?!") == true) {
       
           var t1 = document.getElementById('tab1');
			
				//alert(t1);
				var disc1=document.getElementById("disc1").value;
				document.getElementById("mdisc").innerHTML=disc1;
				
				             var date1 = document.getElementsByName('date')[0].value;
							
							 //var date2=date1.split('-');
							 //date1=date2[2]+'/'+date2[1]+'/'+date2[0];
							 
							 
							 var billno = document.getElementsByName('billno')[0].value;
							var printWindow = window.open('', '', 'height=768,width=1000');
							printWindow.document.write('<html><head><title>Invoice</title><style>input{border:none;} a{display:none;} table tr th{display:none;} #tdup{display:none;}table{width:270px !important;}#tab1{font-size:11px;}.myclass{text-align:center;border-bottom:1px solid black;border-top:0px solid black;font-weight:bold;}#tr1 td{border-top:1px solid black !important; }</style>');
							printWindow.document.write('</head><body >');
							
							printWindow.document.write('<div style="text-align:center;width:270px;border:1px dashed #eee;padding:10px;">')
							printWindow.document.write('<div style="font-size:18px;text-align:center;font-family:bookman old style;">Bites</div>');
							printWindow.document.write('<div style="font-size:13px;text-align:center;bookman old style;"><i>597, 598, C.V. Tower, Sabji Mandi Road,<br> Mahaveer Nagar II, Kota,(Raj.)</i></div>');
							printWindow.document.write('<div style="font-size:12px;text-align:center;bookman old style;margin-bottom:3px;"><i>Contact - 0744-2405484</i><br><i>grabneatkota@gmail.com, www.grabneat.in</i></div>');
							printWindow.document.write('<div style="font-size:14px;text-align:center;font-weight:bold;border-bottom:1px dashed;border-top:1px dashed;">INVOICE</div>');
							printWindow.document.write('<div style="font-size:11px;text-align:center;font-weight:bold;margin-top:5px;">Cash Bill</div>');							
							
						  

						   printWindow.document.write('<table style="font-size:11px;"><tr><td style="text-align:left;">Bill No.- &nbsp;'+billno+'</td><td style="text-align:right;"></td></tr><tr><td style="text-align:left;">Date  - &nbsp;'+date1+'</td><td style="text-align:right;">Time - &nbsp;'+result+'</td></tr></table>');
						    
							

							printWindow.document.write('<div style="clear:both;font-size:11px;margin-top:10px;border-top:1px solid black;" align="center">');
							printWindow.document.write(t1.outerHTML);
							printWindow.document.write('</div>');
							printWindow.document.write('<div style="clear:both;font-size:11px;margin-top:10px;" align="center">Thank You Visit Again</div>');
							printWindow.document.write('<div style="clear:both;font-size:11px;" align="center">Have A Sweet Day</div>');
						
							

							printWindow.document.write('</div>')					
						
						document.getElementById("mdisc").innerHTML="<input type='text' value='"+disc1+"' class='form-control' id='disc1' style='width:50px !important;' onblur='fcalc(this.value);'>";
						
				printWindow.document.write('</body></html>');
				 printWindow.print();
				 printWindow.close();
     
		return true
    } else {
	alert("Are you sure!!");
        return true;
    }
}

   
    
	function check()
	{
	   
	   if(document.val.date.value=="")
	  {
	    alert("Please Select Date");
		document.val.date.focus();
		return false;
	  }
	 
	else if(document.val.name.value=="")
	  {
	    alert("Please Enter Name");
		document.val.name.focus();
		return false;
	  }	 
	
	else if(document.val.tablenos.value=="")
	  {
	    alert("Please Select Table No");
		document.val.tablenos.focus();
		return false;
	  }
  
	  else if(document.val.pname.value=="")
	  {
	    alert("Please Select Product");
		document.val.pname.focus();
		return false;
	  }
	  else if(document.val.qty.value=="" || document.val.qty.value<=0)
	  {
	    alert("Please Enter Correct Quantity");
		document.val.qty.focus();
		return false;
	  }
	  else
	  {	 
		
  
	 return true; 
	}
	
	}
	
	function calc()
	{
		var str=document.getElementById('damt').value;
		document.getElementById('ramt').value=0;
		
	if((Number(str)-Number(document.getElementById('sum1').innerHTML))>0)
	{
		
		var rst=Number(str)-Number(document.getElementById('sum1').innerHTML);
		document.getElementById('ramt').value=rst.toFixed(2);
	
		
	
	}
	}
	
	
		
			function chkbill() {

		var q=document.getElementsByName("billno")[0].value;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
	{
	var str1=xmlhttp.responseText;
	if(str1=="Yes")
	{
		alert("This bill no. already exist.");
		document.location.href="table.php";
	}
				   

	}
			}
			xmlhttp.open("GET","chkbill.php?q="+q, true);
			xmlhttp.send();
		
	}
	
	
	function fcalc(val)
	{
		document.getElementById("disc1").value=val;
	
		
		var stp=Number(document.getElementById("costsum1").innerHTML)-Number(document.getElementById("disc1").value);
		document.getElementById("subtotal").innerHTML=stp.toFixed(2);
	
		
		var stp1=Number(document.getElementById("subtotal").innerHTML)+Number(document.getElementById("tax1").innerHTML);
		document.getElementById("sum1").innerHTML=stp1.toFixed(2);
		
		calc();
		
	}
	

function setval() {

var billno=document.getElementsByName('billno')[0].value;
var disc1=document.getElementById('disc1').value;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
{
str1=xmlhttp.responseText;


}
        }
        xmlhttp.open("GET","setval1.php?billno="+billno+'&disc1='+disc1, true);
        xmlhttp.send();
    
}

	
	
	
  </script>

 <script src="jquery-1.10.2.js"></script>
<script src="jquery-ui.js"></script>
<link rel="stylesheet" href="jquery-ui.css">
<!-- jQuery Code executes on Date Format option ----->
<script>


$(function() {
$("#date1").datepicker({dateFormat: "dd/mm/yy"});
$("#dob").datepicker({dateFormat: "dd/mm/yy"});

});

</script>

<style>
.myclass{text-align:center;border-bottom:1px solid black;border-top:0px solid black;}
</style>

<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Add Table Bill</a>
        </li>
    </ul>
</div>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-star-empty"></i> Add Table Bill</h2>

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
			 <form name="val" action="table.php" role="form" onsubmit="return check()" method="POST">
					 
    <table><tr><td valign='top'> 
		  <div>
			  
					
							
					
					<div style="clear:both;"></div>
					<table id="dataTable" class="table table-striped table-bordered bootstrap-datatable datatable responsive" style='width:380px;font-size:12px;' >
					<tr><th colspan='2' style='text-align:center;'><h4>Add Bill Details</h4></th></tr>
					

					 
				<tr>
                    <?php
					$biollno='';
					if(!empty($_REQUEST['billno']))
					{
					$billno=$_REQUEST['billno'];
					}
					else
					{
					$sql1=mysql_query("select max(val) as valmax from order_details");
					if($arr1=mysql_fetch_array($sql1))
					{
					$val2=$arr1['valmax']+1;
					$billno='T-'.$val2;
					}
					else
					{
					$billno='T-1';
					}
					}
					?>
					 
					<td><div class="form-group">
                        <label for="name">Bill No</label>
						 </div></td>
						<td><div class="form-group">
					    <input type="text" value="<?php echo $billno;?>" class="form-control"  name="billno" readonly>
						</div></td> 
</tr>						
<tr>
						<td><div class="form-group">
					     <label for="name">Date <br>(dd/mm/yyyy)</label>
						 </div></td>
					 <td><div class="form-group">
					     <input type="text" class="form-control" value="<?php if(!empty($_REQUEST['date'])){echo $_REQUEST['date'];}else{echo date('d/m/Y');}?>" id='date1' name="date">
						 </div></td>
					 </tr>
					
					    <tr>
					<td><div class="form-group">
                        <label for="name">Table No</label>
						</div></td>
						<td colspan="4"><div class="form-group">
					     <select name="tablenos" class="form-control">
						 <option value="">Select</option>
						 <option value="1" <?php if(!empty($_REQUEST['tablenos']))if($_REQUEST['tablenos']=='1'){echo 'selected';}?>>1</option>
						 <option value="2"  <?php if(!empty($_REQUEST['tablenos']))if($_REQUEST['tablenos']=='2'){echo 'selected';}?>>2</option>
						 <option value="3"  <?php if(!empty($_REQUEST['tablenos']))if($_REQUEST['tablenos']=='3'){echo 'selected';}?>>3</option>
						 <option value="4"  <?php if(!empty($_REQUEST['tablenos']))if($_REQUEST['tablenos']=='4'){echo 'selected';}?>>4</option>
						 <option value="5"  <?php if(!empty($_REQUEST['tablenos']))if($_REQUEST['tablenos']=='5'){echo 'selected';}?>>5</option>
						 <option value="6"  <?php if(!empty($_REQUEST['tablenos']))if($_REQUEST['tablenos']=='6'){echo 'selected';}?>>6</option>
						 <option value="7"  <?php if(!empty($_REQUEST['tablenos']))if($_REQUEST['tablenos']=='7'){echo 'selected';}?>>7</option>
						 <option value="8"  <?php if(!empty($_REQUEST['tablenos']))if($_REQUEST['tablenos']=='8'){echo 'selected';}?>>8</option>
						 <option value="9"  <?php if(!empty($_REQUEST['tablenos']))if($_REQUEST['tablenos']=='9'){echo 'selected';}?>>9</option>
						 <option value="10"  <?php if(!empty($_REQUEST['tablenos']))if($_REQUEST['tablenos']=='10'){echo 'selected';}?>>10</option>
					 </select>
                    </div></td>
					</tr>
					
					
					<tr><td><div class="form-group">
                        <label for="name">Product Name</label></div></td>
						<td><div class="form-group">
						<select name="pname" class="form-control">
						<option value="">Select</option>
						 <?php
						 	$sel=mysql_query("select DISTINCT pname from product_details order by pname");
	                                        while($row=mysql_fetch_array($sel))
	                        {
							 ?> 
						       <option value="<?php echo $row['pname']?>"><?php echo $row['pname']?></option>
							 <?php
							 }
							 ?>
							 </select>
							</div></td>	
						   </tr>
						
					
					<tr><td><div class="form-group">
                        <label for="name">Quantity</label></div></td>
						<td><div class="form-group">
                        <input type="number" class="form-control" name="qty"></div></td>
						</tr>
																
						<tr><td colspan="2" style="text-align:center;"> <button type="submit" class="btn btn-info" name="add">Add</button><!--button type="submit" class="btn btn-default" name="sub" style="margin-left:100px;">Final Submit</button--></td></tr>
						
					</table>

                   
					
               
               </div>
			    </form>
            </td>
			<td valign='top'>
			
			
			            <div style='margin-left:10px;'>
						<form name="val1" action="table.php" method="post" >
              <table  id="tab1" class="table table-striped table-bordered bootstrap-datatable datatable responsive" style='width:600px;font-size:12px;'>
			  <tr><th colspan='6' style='text-align:center;'><h4>View Bill Details</h4></th></tr>
			              
          <tr>
          <td style='border-bottom:1px solid black !important;'><b>Item</b></td><td style='border-bottom:1px solid black !important;text-align:left;'><b>Qty</b></td><td style='border-bottom:1px solid black !important;'><b>Rate</b></td><td style='border-bottom:1px solid black !important;'><b>Amount</b></td><th>Update</th><th>Delete</th>
		  </tr>
			<?php
			if(!empty($_REQUEST['billno']))
              {
              $sql1 = "select * from order_details where billno='$_REQUEST[billno]'";
			  $row1=mysql_query($sql1);
                          	
		    $i=1;
			$q1=0;
             $sum=0;
             $taxsum=0;
			 $costsum=0;
			 while($row2=mysql_fetch_array($row1))
             {
             
			   $s =mysql_query("select pcost,tax from product_details where pname='$row2[pname]'");
			   $s1=mysql_fetch_array($s);
			   //echo "$s1[pcost]";
			   $tax=($s1['pcost']*$s1['tax'])/100;
			   $totaltax=$row2['qty']*$tax;
			   $totalcost=$s1['pcost']*$row2['qty'];
			   $totalrt=$totaltax+$totalcost;
			  $sum=$sum+$totalrt;
			  $costsum=$costsum+$totalcost;
			  $taxsum=$taxsum+$totaltax;
			   echo "<form action='table.php' method='post'>";
			   
			      echo "<input type='hidden' value='$row2[pname]' name='pname'>";
			   
			  echo "<tr><td>$row2[pname]</td><td><input type='text' value='$row2[qty]' name='pqty' style='width:50px;font-size:11px;' class='form-control'></td><td><input type='text' style='width:50px;font-size:11px;' class='form-control' value='$s1[pcost]' readonly></td><td><input type='text' value='$totalcost' name='total' style='width:50px;font-size:11px;' class='form-control' readonly></td><td id='tdup'><input type='submit' name='update' value='Update' class='btn btn-info' style='padding:5px !important;'></td><td><a href='table.php?billno=$_REQUEST[billno]&&dt=$row2[sno]&&date=$_REQUEST[date]&&tablenos=$_REQUEST[tablenos]' class='btn btn-danger' onclick='return check1();' style='padding:5px !important;'>Delete</a></td>";
			  echo "</tr>";	  
              echo "<input type='hidden' value='$row2[sno]' name='sno'>";	
			  echo "<input type='hidden' name='billno' value='$_REQUEST[billno]'>";
			  echo "<input type='hidden' name='date' value='$_REQUEST[date]'>";
			  echo "<input type='hidden' name='tablenos' value='$_REQUEST[tablenos]'>";
			 
			  echo "</form>";
			  }
			 
			
			  $taxsum1=round($taxsum,2);
			  $sum1=round($sum,2);
			  $costsum1=round($costsum,2);
			  echo "<tr id='tr1'><td colspan='3' class='myclass' style='border-top:1px solid balck;'><b>Sub Total</b></td><td id='costsum1' style='font-weight:bold;' class='myclass' style='border-top:1px solid balck;'>$costsum1</td></tr>";
			  echo "<tr><td colspan='3' class='myclass'><b>Discount</b></td><td class='myclass' id='mdisc'><input type='text' value='0' class='form-control' id='disc1' style='width:50px !important;' onblur='fcalc(this.value);'></td></tr>";
			  echo "<tr><td colspan='3' class='myclass'><b>Total</b></td><td style='font-weight:bold;' id='subtotal' class='myclass'>$costsum</td></tr>";			  
			  echo " <tr><td colspan='3' class='myclass'><b>Tax</b></td><td class='myclass' id='tax1'>$taxsum1</td></tr>";
			  echo " <tr><td colspan='3' class='myclass'><b>Grand Total</b></td><td class='myclass' id='sum1'>$sum1</td></tr></table>";
			  echo " <table style='width:100%;'><tr><td colspan='3' class='myclass'><b>Deposited Amount</b></td><td class='myclass'><input type='text' id='damt' value='0' class='form-control' onblur='calc();'></td></tr>";
			  echo " <tr><td colspan='3' class='myclass'><b>Return Amount</b></td><td class='myclass' ><input type='text'  value='0' class='form-control' id='ramt'></td></tr><input type='hidden' id='hide1' value='$sum'>";
			  
			  }
			  ?>
			  </table>
			  <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
			   <tr><td colspan='5' style='text-align:center;'><input type="button"  value="Print" name="print" class="btn btn-info" onclick="prt3();"></td></tr>
			   </table>
              </form>
			  </div>
			  </td></tr></table>
           </div>
        </div>
    </div>
</div><!--/row-->


<?php include('footer.php'); ?>
