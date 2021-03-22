<?php
session_start();
if (!isset($_SESSION['loguser'])) {
header('Location: login.php');
}
include("config.php");
require('header.php'); 

?>
 
 <script>
 
 
 function getdate(str1) {
//var rtype=document.getElementById('roomtype').value;
   if (str1 == "select") { 
        //document.getElementById("name").innerHTML= "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
{
str1=xmlhttp.responseText;

//alert(str1);
var str2=str1.split('@@');
document.getElementsByName('date1')[0].innerHTML=str2[0];
document.getElementsByName('date2')[0].innerHTML=str2[1];



           

}
        }
        xmlhttp.open("GET","getdate.php?val="+str1, true);
        xmlhttp.send();
    }
}
    
	
function prt()
{

 var x;
    if (confirm("Do you want to Print?!") == true) {
       
           var t1 = document.getElementById('tab1');
			
				//alert(t1);
				
							var printWindow = window.open('', '', 'height=768,width=1000');
							printWindow.document.write('<html><head><title> Date Wise Reports (Order Base)</title><style>input{border:none;} table{width:1000px !important;}table tr th{border-bottom:1px solid black;} table tr td{text-align:center;}table tr #th1,#th2{border-top:1px solid black;}#but1{display:none;}</style>');
							printWindow.document.write('</head><body >');
							
							printWindow.document.write('<div style="text-align:center;border:1px dashed #eee;padding:10px;">')
							printWindow.document.write('<div style="font-size:36px;text-align:center;font-family:brush script;">Bites</div>');
							
						    printWindow.document.write('<div style="font-size:13px;text-align:center;bookman old style;"><i>597, 598, C.V. Tower, Sabji Mandi Road,<br> Mahaveer Nagar II, Kota,(Raj.)</i></div>');
							printWindow.document.write('<div style="font-size:12px;text-align:center;bookman old style;margin-bottom:3px;"><i>Contact - 0744-2405484</i><br><i>grabneatkota@gmail.com, www.grabneat.in</i></div>');
							
							
							printWindow.document.write('<div style="font-size:24px;text-align:center;font-weight:bold;border-bottom:1px dashed;border-top:1px dashed;"> Date Wise Reports (Order Base)</div>');
							

						

							printWindow.document.write('<div style="clear:both;font-size:11px;" align="center">');
							printWindow.document.write(t1.outerHTML);
							printWindow.document.write('</div>');
							
						
							
							//printWindow.document.write('<div style="clear:both;border-bottom:1px solid #000;margin-top:300px"></div>');
							

							printWindow.document.write('</div>')					
						
				printWindow.document.write('</body></html>');
				 printWindow.print();
				 printWindow.close();
     
		return true
    } else {
	alert("Are you sure!!");
        return true;
    }
}
	
 
 function chk()
 {
 if(document.form1.group1.value=="")
 {
 alert("Please Select Any Order");
 document.form1.group1.focus();
 return false;
 }
  else if(document.form1.date1.value=="")
{
   alert("Please Select From Date");
  document.form1.date1.focus();
  return false;
}
 else if(document.form1.date2.value=="")
{
   alert("Please Select To Date");
  document.form1.date2.focus();
  return false;
}

else
{
return true;
}

 }
 
 
  function chk1()
 {
 if(document.form1.group2.value=="")
 {
 alert("Please Select Any Order");
 document.form1.group2.focus();
 return false;
 }
  else if(document.form1.month1.value=="")
{
   alert("Please Select Month");
  document.form1.month1.focus();
  return false;
}
 else if(document.form1.year1.value=="")
{
   alert("Please Select Year");
  document.form1.year1.focus();
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
            <a href="#"> Date Wise Reports (Order Base)</a>
        </li>
    </ul>
</div>


<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Date Wise Reports (Order Base)</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content row" >
                <div class="row" style="margin-left:10px;margin-right:10px;">
    <div class="col-md-12 col-sm-3 col-xs-12" >
   <form action='typebasereport.php' method='post' name='form1'>   
<table  class="table table-striped table-bordered bootstrap-datatable datatable responsive">
<tr>
<th>Select Order Type</th>
<th><select name='group1' class="form-control">
<option value="">Select</option>
<option value="Take Away">Take Away</option>
<option value="Home Delivery">Home Delivery</option>
</select>
</th>
<th>From Date</th><th><select name='date1' class="form-control">
<option value="">Select</option>
		<?php
		$sql1=mysql_query("select distinct(date1) from order_details");
		while($arr=mysql_fetch_array($sql1))
		{
		$dt1=explode('-',$arr['date1']);
		$dt2=$dt1[2].'/'.$dt1[1].'/'.$dt1[0];
		echo "<option value='$arr[date1]'>$dt2</option>";

		}
		?>
</select></th>
<th>To Date</th><th><select name='date2' class="form-control">
<option value="">Select Date</option>
		<?php
		$sql1=mysql_query("select distinct(date1) from order_details");
		while($arr=mysql_fetch_array($sql1))
		{
		$dt1=explode('-',$arr['date1']);
		$dt2=$dt1[2].'/'.$dt1[1].'/'.$dt1[0];
		echo "<option value='$arr[date1]'>$dt2</option>";

		}
		?>
</select>
</th>
<td><input type='submit' name='sub1' onclick="return chk();" value="View" class="btn btn-info"></td>

</tr>
</table>
<div style="text-align:center;"><h3>OR</h3></div>
<table  class="table table-striped table-bordered bootstrap-datatable datatable responsive">
<tr>
<th>Select Order Type</th>
<th><select name='group2' class="form-control">
<option value="">Select</option>
<option value="Take Away">Take Away</option>
<option value="Home Delivery">Home Delivery</option>
</select>
</th>
<th>Month</th><th><select name='month1' class="form-control">
<option value="">Select Month</option>
<option value="01">January</option>
<option value="02">February</option>
<option value="03">March</option>
<option value="04">April</option>
<option value="05">May</option>
<option value="06">June</option>
<option value="07">July</option>
<option value="08">August</option>
<option value="09">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select></th>
<th>Year</th><th><select name='year1' class="form-control">
<option value="">Select Year</option>
<option value="2016">2016</option>
<option value="2017">2017</option>
<option value="2018">2018</option>
<option value="2019">2019</option>
<option value="2020">2020</option>
</select>
</th>
<td><input type='submit' name='sub2'  onclick="return chk1();"  value="View" class="btn btn-info"></td>

</tr>
</table>

</form>
	  <div id="tab1">
	  <table  class="table table-striped table-bordered bootstrap-datatable datatable responsive">
	  
      <?php 
	  if(isset($_POST['sub1']) || isset($_POST['sub2']))
	  {
	 $grp="";	  
	  if(isset($_POST['sub1']))	  
	  { 
	  if($_POST['group1']=='Home Delivery')
	  {
	  $sql2=mysql_query("select * from order_details where date1 between '$_POST[date1]' and '$_POST[date2]' and otype='Home Delivery'");
	  }
	  else
	  {
	  $sql2=mysql_query("select * from order_details where date1 between '$_POST[date1]' and '$_POST[date2]' and otype='Take Away'");
	  }
	  
	 $i=1;
	 $q1=0;
     $sum=0;
	
		$frdate=explode('-',$_POST['date1']);
        $frdate1=$frdate[2].'/'.$frdate[1].'/'.$frdate[0];
		
		$todate=explode('-',$_POST['date2']);
        $todate1=$todate[2].'/'.$todate[1].'/'.$todate[0];
		
		$grp=$_POST['group1'];
	  }
	  else
	  {
	  if($_POST['group2']=='Take Away')
	  {
	  $sql2=mysql_query("select * from order_details where otype='Take Away' and (EXTRACT(MONTH from date1)='$_POST[month1]' and EXTRACT(YEAR from date1)='$_POST[year1]') order by sno desc") or die(mysql_error());
	  }
	  else
	  {
	  $sql2=mysql_query("select * from order_details where otype='Home Delivery' and (EXTRACT(MONTH from date1)='$_POST[month1]' and EXTRACT(YEAR from date1)='$_POST[year1]') order by sno desc") or die(mysql_error());
	  }
	  
	 $i=1;
	 $q1=0;
     $sum=0;
	
			$grp=$_POST['group2'];	  
	  }
	  
	  
	  
	 
	echo "<tr><th style='width:200px !important;'>Order </th><th style='text-align:left;'>$grp Order</th></tr>";	
		if(isset($_POST['sub1']))
		{
		echo "<tr><th>From Date  </th><th style='text-align:left;'>$frdate1</th></tr>";	
		echo "<tr><th>To Date </th><th style='text-align:left;'>$todate1</th></tr>";	
		}
		else
		{
		echo "<tr><th>Month </th><th style='text-align:left;'>$_POST[month1]</th></tr>";	
		echo "<tr><th>Year </th><th style='text-align:left;'>$_POST[year1]</th></tr>";				
		}
    echo "</table>";
	 echo '<table  class="table table-striped table-bordered bootstrap-datatable datatable responsive">';
	echo "<tr style='line-height:50px !important;'><th>S.No.</th><th>Product Name</th><th>Qty.</th><th>Tax</th><th>Cost</th><th>Total Tax</th><th>Total Cost</th><th>Total Amount</th></tr>";	
	 while($row=mysql_fetch_array($sql2))
	  {
	    	  
			   $tax=($row['cost1']*$row['tax1'])/100;
			   $totaltax=$row['qty']*$tax;
			   $totalcost=$row['cost1']*$row['qty'];
			   $totalrt=$totaltax+$totalcost;
			  $sum=$sum+$totalrt;
	  	  
	  echo "<tr><td>$i</td><td>$row[pname]</td><td>$row[qty]</td><td>$tax</td><td>$row[cost1]</td><td>$totaltax</td><td>$totalcost</td><td>$totalrt</td></tr>";
	  
	 
	  
	  
	  $i++;
	  }
	   echo "<tr><th colspan='7' style='text-align:center;' id='th1'>Total</th><th id='th2'>$sum</th></tr>";
	 
	  }
	  
	  ?>	  
	  
	  <tr><td colspan="8" style='text-align:center;'><input type='button' value="Print" id="but1" onclick="prt();" class="btn btn-info"></td></tr>
	  </table>
	  
    </div>
	</div>

    
    
	
	
   
                <!-- Ads, you can remove these -->
                
                <!-- Ads end -->

            </div>
        </div>
    </div>
</div>
</div>



<?php require('footer.php'); ?>
