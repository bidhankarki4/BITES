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
document.getElementsByName('date1')[0].innerHTML=str1;




           

}
        }
        xmlhttp.open("GET","getdate1.php?val="+str1, true);
        xmlhttp.send();
    }
}
    
	
 function chk()
 {
 
 if(document.form1.group1.value=="select")
 {
 alert("Please Select Any Order");
 document.form1.group1.focus();
 return false;
 }
 else if(document.form1.date1.value=="")
 {
 alert("Please Select Date");
 document.form1.date1.focus();
 return false;
 }
 else
 {
 return true;
 }
 
 
 }
 
 
 
 function prt()
{

 var x;
    if (confirm("Do you want to Print?!") == true) {
       
           var t1 = document.getElementById('tab1');
			
				//alert(t1);
				
							var printWindow = window.open('', '', 'height=768,width=1000');
							printWindow.document.write('<html><head><title>Product Wise Report</title><style>input{border:none;} table{width:1000px !important;}table tr th{border-bottom:1px solid black;} table tr td{text-align:center;}table tr #th1,#th2{border-top:1px solid black;}#but1{display:none;}</style>');
							printWindow.document.write('</head><body >');
							
							printWindow.document.write('<div style="text-align:center;border:1px dashed #eee;padding:10px;">')
							printWindow.document.write('<div style="font-size:36px;text-align:center;font-family:brush script;">Bites</div>');
							
							printWindow.document.write('<div style="font-size:13px;text-align:center;bookman old style;"><i>597, 598, C.V. Tower, Sabji Mandi Road,<br> Mahaveer Nagar II, Kota,(Raj.)</i></div>');
							printWindow.document.write('<div style="font-size:12px;text-align:center;bookman old style;margin-bottom:3px;"><i>Contact - 0744-2405484</i><br><i>grabneatkota@gmail.com, www.grabneat.in</i></div>');
							printWindow.document.write('<div style="font-size:24px;text-align:center;font-weight:bold;border-bottom:1px dashed;border-top:1px dashed;">Product Wise Report</div>');
								

						

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
	
 
 
 </script>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Product Wise Reports</a>
        </li>
    </ul>
</div>


<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Product Wise Reports</h2>

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
   <form action='productwise.php' method='post' name='form1'>   
<table  class="table table-striped table-bordered bootstrap-datatable datatable responsive">
<tr>

<th>Order<select name='group1' class="form-control">
<option value="select">Select</option>
<option value="Table">Table</option>
<option value="Direct">Direct</option>
</select>
</th>
<th>Date<select name='date1' class="form-control">
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
<td><input type='submit' name='sub1' value="View" onclick="return chk();"  class="btn btn-info"></td>

</tr>

</table>
</form>
	  <div id="tab1">
	  <table  class="table table-striped table-bordered bootstrap-datatable datatable responsive">
	  <?php 
	  $sum=0;
	  if(isset($_POST['sub1']))
	  {
	   $frdate=explode('-',$_POST['date1']);
        $frdate1=$frdate[2].'/'.$frdate[1].'/'.$frdate[0];
	  
	  echo "<tr><th>Order </th><th style='text-align:left;'>$_POST[group1] Order</th></tr>";	
		echo "<tr><th>Date  </th><th style='text-align:left;'>$frdate1</th></tr>";	
		
	echo "</table>";
	echo '<table  class="table table-striped table-bordered bootstrap-datatable datatable responsive" >';	 
	 echo "<tr style='line-height:50px !important;'><th>Product Name</th><th>Qty.</th><th>Tax (Per Item)</th><th>Cost (Per Item)</th><th>Total Tax</th><th>Total Cost</th><th>Total Amount</th></tr>";
	  $pname=array();
	$allsum=0;
	$s11=mysql_query("select distinct(pname),cost1,tax1 from order_details where date1 ='$_POST[date1]'");
	while($a11=mysql_fetch_array($s11))
	{
	
	 if($_POST['group1']=='Table')
	 {
	 $sql2=mysql_query("select * from order_details where date1 ='$_POST[date1]' and type1='table' and pname='$a11[pname]' and cost1='$a11[cost1]' and tax1='$a11[tax1]' order by sno desc");
	 }
     else
      {
	  	 $sql2=mysql_query("select * from order_details where date1 ='$_POST[date1]' and type1='direct' and pname='$a11[pname]' and cost1='$a11[cost1]' and tax1='$a11[tax1]' order by sno desc");
	  }	 
   	  
 	$q1=0;
    $alltaxtoat=0;
	$allcost=0;
	$sum=0;
	$allqty=0;
	$tax=0;
	if(mysql_num_rows($sql2)>0)
		{
	 while($row=mysql_fetch_array($sql2))
	  {
	    	  
			   $tax=($row['cost1']*$row['tax1'])/100;
			   $totaltax=$row['qty']*$tax;
			   $totalcost=$row['cost1']*$row['qty'];
			   $totalrt=$totaltax+$totalcost;
			   $sum=$sum+$totalrt;
			   $alltaxtoat=$alltaxtoat+$totaltax;
			   $allcost=$allcost+$totalcost;
			   $allqty=$allqty+$row['qty'];
	  }
	  
	  $r1=(round($tax,2));
	  $r2=(round($alltaxtoat,2));
	  $r3=(round($sum,2));
	  
	    echo "<tr><td>$a11[pname]</td><td>$allqty</td><td>$r1</td><td>$a11[cost1]</td><td>$r2</td><td>$allcost</td><td>$r3</td></tr>";
		$allsum=$allsum+$sum;
	
	}
	}
	$r4=(round($allsum,2));
	  echo "<tr><th colspan='6' style='text-align:center;' id='th1'>Total</th><th id='th2'>$r4</th></tr>";
	 
	  

	  ?>	  

	  <tr><td colspan="8" style='text-align:center;'><input type='button' value="Print" id="but1" onclick="prt();" class="btn btn-info"></td></tr>
	  
	  <?php } ?>
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
