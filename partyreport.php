<?php
session_start();
if (!isset($_SESSION['loguser'])) {
header('Location: login.php');
}
include("config.php");
require('header.php'); 

?>
 
 <script>
 
 
function prt()
{

 var x;
    if (confirm("Do you want to Print?!") == true) {
       
           var t1 = document.getElementById('tab1');
			
				//alert(t1);
				
							var printWindow = window.open('', '', 'height=768,width=1000');
							printWindow.document.write('<html><head><title>Date Wise Party Report</title><style>input{border:none;} table{width:1000px !important;}table tr th{border-bottom:1px solid black;} table tr td{text-align:center;}table tr #th1,#th2{border-top:1px solid black;}#but1{display:none;}</style>');
							printWindow.document.write('</head><body >');
							
							printWindow.document.write('<div style="text-align:center;border:1px dashed #eee;padding:10px;">')
							printWindow.document.write('<div style="font-size:36px;text-align:center;font-family:brush script;">Bites</div>');
							
							printWindow.document.write('<div style="font-size:13px;text-align:center;bookman old style;"><i>597, 598, C.V. Tower, Sabji Mandi Road,<br> Mahaveer Nagar II, Kota,(Raj.)</i></div>');
							printWindow.document.write('<div style="font-size:12px;text-align:center;bookman old style;margin-bottom:3px;"><i>Contact - 0744-2405484</i><br><i>grabneatkota@gmail.com, www.grabneat.in</i></div>');
							
							printWindow.document.write('<div style="font-size:24px;text-align:center;font-weight:bold;border-bottom:1px dashed;border-top:1px dashed;">Date Wise Party Report</div>');
							

						

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
if(document.form1.date1.value=="")
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
if(document.form1.month1.value=="")
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
            <a href="#"> Date Wise Party Reports</a>
        </li>
    </ul>
</div>


<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Date Wise Party Reports</h2>

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
   <form action='partyreport.php' method='post' name='form1'>   
<table  class="table table-striped table-bordered bootstrap-datatable datatable responsive">
<tr>
<th>From Date</th><th><select name='date1' class="form-control">
<option value="">Select</option>
		<?php
		$sql1=mysql_query("select distinct(date1) from bookparty order by date1 asc");
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
		$sql1=mysql_query("select distinct(date1) from bookparty order by date1 asc");
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
      $i=1;
	  $sum1=0; 
	  $sum2=0;
	  $sum3=0; 
	  $gtotal=0;	  
	  if(isset($_POST['sub1']))	  
	  { 
	  $sql2=mysql_query("select * from bookparty where date1 between '$_POST[date1]' and '$_POST[date2]' order by sno desc") or die(mysql_error());
	  }
	  else
	  {
	  $sql2=mysql_query("select * from bookparty where (EXTRACT(MONTH from date1)='$_POST[month1]' and EXTRACT(YEAR from date1)='$_POST[year1]') order by sno desc") or die(mysql_error());
	  }
	  	 
     	if(isset($_POST['sub1']))
		{
		echo "<tr><th>From Date  </th><th style='text-align:left;'>$_POST[date1]</th></tr>";	
		echo "<tr><th>To Date </th><th style='text-align:left;'>$_POST[date2]</th></tr>";	
		}
		else
		{
		echo "<tr><th>Month </th><th style='text-align:left;'>$_POST[month1]</th></tr>";	
		echo "<tr><th>Year </th><th style='text-align:left;'>$_POST[year1]</th></tr>";				
		}
    echo "</table>";
	 echo '<table  class="table table-striped table-bordered bootstrap-datatable datatable responsive">';
	echo "<tr style='line-height:50px !important;'><th>S.No.</th><th>Party Type</th><th>Date</th><th>Time</th><th>Organised By</th><th>Total Amt.</th><th>Advance Amt.</th><th>Total Due Amt.</th></tr>";	
	 while($row=mysql_fetch_array($sql2))
	  {
	 
    	 echo "<tr><td>$i</td><td>$row[ptype1]</td><td>$row[date1]</td><td>$row[time1]</td><td>$row[orgby]</td><td>$row[totalamt]</td><td>$row[advamt]</td><td>$row[totaldueamt]</td></tr>";
	 
	  $sum1=$sum1+$row['totalamt'];
	  $sum2=$sum2+$row['advamt'];
	  $sum3=$sum3+$row['totaldueamt'];
	  
	 
	  $i++;
	  }
	   $gtotal=$sum1+$sum2+$sum3;
	echo "<tr><th colspan='5'></th><th>$sum1</th><th>$sum2</th><th>$sum3</th></tr>";	 
	 echo "<tr><th colspan='7' style='text-align:center;'>Grand Total</th><th>$gtotal</th></tr>";
	 
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
