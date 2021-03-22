<?php
session_start();
if (!isset($_SESSION['loguser'])) {
header('Location: login.php');
}
require('header.php'); 
include("config.php");
?>
<script>

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


	
function prt()
{

 var x;
    if (confirm("Do you want to Print?!") == true) {
       
           var t1 = document.getElementById('tab1');
		   
		   
		   document.getElementById('tab1').style.marginTop="20px;";
			
				//alert(t1);
				
							var printWindow = window.open('', '', 'height=768,width=1000');
							printWindow.document.write('<html><head><title>Daily Sales Report</title><style>input{border:none;} table{width:1000px !important;}table tr th{border-bottom:1px solid black;} table tr td{text-align:center;}#but1{display:none;}#tr1 th{border-top:1px dashed black;}#th1,#th2{text-align:left !important;padding-left:20px !Important;}</style>');
							printWindow.document.write('</head><body >');
							
							printWindow.document.write('<div style="text-align:center;border:1px dashed #eee;padding:10px;">')
							printWindow.document.write('<div style="font-size:36px;text-align:center;font-family:brush script;">Bites</div>');
							printWindow.document.write('<div style="font-size:13px;text-align:center;bookman old style;"><i>1300 Dallas Dr,<br> Denton, TX 76205, USA</i></div>');
							printWindow.document.write('<div style="font-size:12px;text-align:center;bookman old style;margin-bottom:3px;"><i>Contact - 9876543210</i><br><i>bites@gmail.com, www.bites.in</i></div>');
							printWindow.document.write('<div style="font-size:24px;text-align:center;font-weight:bold;border-bottom:1px dashed;border-top:1px dashed;">Daily Sales Report</div>');
							

						

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
	
function valid()
{
if(document.form1.orddate.value=="")
{
alert("Please Select Order Date");
document.form1.orddate.focus();
return false;
}
else
return true;
}


</script> 
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Daily Sales Report</a>
        </li>
    </ul>
</div>


<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i>Daily Sales Report</h2>

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
    <div class="col-md-12 col-sm-3 col-xs-12" style='text-align:center;'>
       
	   
	   
	<form action="dailyreport.php" method="post" name="form1">   
		<table class="table table-striped table-bordered bootstrap-datatable datatable responsive" style='font-size:12px;'>   
		<tr><th>Select Date</th><th><select name="orddate" id="orddate" class="form-control" >
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
	
		
		
		</select></th><th style="text-align:center;">Select Order</th><th><select name="order1" class="form-control" ><option value="">Select</option><option value="Table">Table Order</option><option value="Direct">Direct Order</option></select></th><td><input type="submit" name="view" onclick="return valid();" class="btn btn-info" value="View"></td></tr>
		
		</table>
	 </form>
	 
	 <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" style='font-size:14px;' id="tab1" >   
	 
	 <?php 
	 if(isset($_POST['view']))
	 {

	 echo "<tr><th colspan='11' style='text-align:center;font-size:20px;' id='th1'>$_POST[order1] Order</th></tr>";
	 echo "<tr><th colspan='11' style='text-align:center;font-size:20px;' id='th1'>$_POST[orddate]</th></tr>";
	 echo "<tr><th>S.No.</th><th>Time</th><th>Bill No.</th><th>Order Type</th><th>Sub Total</th><th>Discount</th><th>Total</th><th>Tax</th><!--th>All Total</th--><th>Packing Amount</th><th>Total Amount</th></tr>";
	 if(!empty($_POST['order1']) && !empty($_POST['orddate']))
	 {
	 if($_POST['order1']=="Table")
	 {
	 $sqlord=mysql_query("select distinct(billno),date1,name,address,contact,dob,otype,disc1,time1  from order_details where date1='$_POST[orddate]' and type1='table' order by sno desc");
	 }
	 else
	 {
	 $sqlord=mysql_query("select distinct(billno),date1,name,address,contact,dob,otype,disc1,time1  from order_details where date1='$_POST[orddate]' and type1='direct' order by sno desc");
	 }
	 }
	 else if(!empty($_POST['orddate']))
	 {
	 $sqlord=mysql_query("select distinct(billno),date1,name,address,contact,dob,otype,disc1,time1  from order_details where date1='$_POST[orddate]' order by sno desc");		 
	 }
	
	 
	 $kp=1;
	 $ftax=0;
	 $allsum=0;
	 $packsum=0;
	 $allcost=0;
	 $alltotal=0;
	 $alldisc=0;
	 $grandsum=0;
	 while($arrord=mysql_fetch_array($sqlord))
	 {
	 
	  $dt1=explode('-',$arrord['date1']);
      $dt2=$dt1[2].'/'.$dt1[1].'/'.$dt1[0];
	 
	
	 $sm=0;
	 $totsm=0;
	 $otype="Table";
	 if($arrord["otype"]=="Take Away")
	 {
		 $otype="Take Away";
		 $sm=10;
	 } else if($arrord['otype']=="Home Delivery")
	 {
		  $sm=10;
		  $otype="Home Delivery";
		 
	 }
	 
	 echo "<tr><td>$kp</td><td>$arrord[time1]</td><td><a href='viewbill.php?billno=$arrord[billno]' target='_blank'>$arrord[billno]</a></td><td>$otype</td>";
	 
	 
	  
	 ?>
   
	   
	
			<?php
			
			 if($_POST['order1']=="Table")
	 {
	       $sql1 = "select * from order_details where billno='$arrord[billno]'";
	 }
	 else
	 {
	  $sql1 = "select * from order_details where billno='$arrord[billno]'";
	 }
			
			
			
			
			 
			$row1=mysql_query($sql1);
                          	
		    $i=1;
			$q1=0;
             $sum=0;
             $taxsum=0;
			 $costsum=0;
		
			 while($row2=mysql_fetch_array($row1))
             {
             
			
			
			   $tax=($row2['cost1']*$row2['tax1'])/100;
			   $totaltax=$row2['qty']*$tax;
			   $totalcost=$row2['cost1']*$row2['qty'];
			   $totalrt=$totaltax+$totalcost;
			  $sum=$sum+$totalrt;
			  $costsum=$costsum+$totalcost;
			  $taxsum=$taxsum+$totaltax;
			 
			 }
			 

			 $subamt=$costsum-$arrord['disc1'];
			 $sum1=$sum-$arrord['disc1'];
			  $fsum=$sm+$sum1;
			
			
			
			
			 
			 $alldisc=$alldisc+$arrord['disc1'];
			 $allcost=$allcost+$costsum;
			  $allsum=$allsum+$subamt;
			  $ftax=$ftax+$taxsum;
			  $alltotal=$alltotal+$sum1;
			   $packsum=$sm+$packsum;
			   $grandsum=$grandsum+$fsum;
			 
			 
			 
			 
			 $stc=round($sum1,2);
			 $stc1=round($taxsum,2);
			 $stc2=round($fsum,2);
				echo "<td>$costsum</td><td>$arrord[disc1]</td><td>$subamt</td><td>$stc1</td><!--td>$stc</td--><td>$sm</td><td>$stc2</td>";
			?>
			   

			   </tr>
<?php
$kp++;		
}
$f1=round($allcost,2);
$f2=round($alldisc,2);
$f3=round($allsum,2);
$f4=round($ftax,2);
$f5=round($alltotal,2);
$f6=round($packsum,2);
$f7=round($grandsum,2);


echo "<tr id='tr1'><th colspan='4' style='text-align:center;font-weight:bold;'>All Total</th><th>$f1</th><th>$f2</th><th>$f3</th><th>$f4</th><!--th>$f5</th--><th>$f6</th><th>$f7</th></tr>";
}
	 
?>
</table>

<div style="text-align:center"><input type="button" value="Print" class="btn btn-info" onclick="prt();"></div>

	   </div>

    
    
	
	
   
                <!-- Ads, you can remove these -->
                
                <!-- Ads end -->

            </div>
        </div>
    </div>
</div>
</div>



<?php require('footer.php'); ?>
