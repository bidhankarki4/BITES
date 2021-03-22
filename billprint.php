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


 function prt3(str1)
{


str=Number(str1)-1;
 var x;
    if (confirm("Do you want to Print?!") == true) {
       
           var t1 = document.getElementById('tab'+str1);
			
				//alert(t1);
				
							 var date1 = document.getElementsByName('date1[]')[str].value;
							 var billno = document.getElementsByName('billno[]')[str].value;
							
								if(document.getElementById('th1').innerHTML=="Direct Order")
								{									
							var name = document.getElementsByName('name[]')[str].value;
							 var contact = document.getElementsByName('contact[]')[str].value;
							 var address = document.getElementsByName('address[]')[str].value;
							 var otype = document.getElementsByName('otype[]')[str].value;
								}
							var printWindow = window.open('', '', 'height=768,width=1000');
							printWindow.document.write('<html><head><title>Invoice</title><style>input{border:none;} a{display:none;} table tr th{display:none;} #tdup{display:none;}table{width:270px !important;}#tab1{font-size:11px;}</style>');
							printWindow.document.write('</head><body >');
							
							printWindow.document.write('<div style="text-align:center;width:270px;border:1px dashed #eee;padding:10px;">')
							printWindow.document.write('<div style="font-size:18px;text-align:center;font-family:bookman old style;">Bites</div>');
							printWindow.document.write('<div style="font-size:13px;text-align:center;bookman old style;"><i>1300 Dallas Dr,<br> Denton, TX 76205, USA</i></div>');
							printWindow.document.write('<div style="font-size:12px;text-align:center;bookman old style;margin-bottom:3px;"><i>Contact - 9876543210</i><br><i>bites@gmail.com, www.bites.in</i></div>');
							printWindow.document.write('<div style="font-size:14px;text-align:center;font-weight:bold;border-bottom:1px dashed;border-top:1px dashed;">INVOICE</div>');
							printWindow.document.write('<div style="font-size:11px;text-align:center;font-weight:bold;margin-top:5px;">Cash Bill</div>');	
							
							if(document.getElementById('th1').innerHTML=="Direct Order")
							{
							printWindow.document.write('<table style="font-size:11px;"><tr><td style="text-align:left;">Bill No.- &nbsp;'+billno+'</td><td style="text-align:right;">Date  - &nbsp;'+date1+'</td></tr><tr><td style="text-align:left;">Name - &nbsp; '+name+'</td><td style="text-align:right;">Time - &nbsp;'+result+'</td></tr></table>');	
							if(otype=="Home Delivery")
							{
								
							printWindow.document.write('<table style="font-size:11px;"><tr><td style="text-align:left;">Contact  - &nbsp;'+contact+'</td></tr><tr><td style="text-align:left;">Address - &nbsp;'+address+'</td></tr></table>');	
							}
							}
							else
							{
							printWindow.document.write('<table style="font-size:11px;"><tr><td style="text-align:left;">Bill No.- &nbsp;'+billno+'</td><td style="text-align:right;"></td></tr><tr><td style="text-align:left;">Date  - &nbsp;'+date1+'</td><td style="text-align:right;">Time - &nbsp;'+result+'</td></tr></table>');
							}
								
							printWindow.document.write('<div style="clear:both;font-size:11px;margin-top:10px;border-top:1px solid black;" align="center">');
							printWindow.document.write(t1.outerHTML);
							printWindow.document.write('</div>');
							printWindow.document.write('<div style="clear:both;font-size:11px;margin-top:10px;" align="center">Thank You Visit Again</div>');
							printWindow.document.write('<div style="clear:both;font-size:11px;" align="center">Have A Sweet Day</div>');
							
					
							
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
if(document.form1.order1.value=="select")
{
alert("Please Select An Order");
document.form1.order1.focus();
return false;
}
else if(document.form1.orddate.value=="")
{
alert("Please Enter Order Date");
document.form1.orddate.focus();
return false;
}
else
return true;

}

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
document.getElementsByName('orddate')[0].innerHTML=str2[0];
//document.getElementsByName('date2')[0].innerHTML=str2[1];



           

}
        }
        xmlhttp.open("GET","getdate.php?val="+str1, true);
        xmlhttp.send();
    }
}

</script> 



<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Get Bill</a>
        </li>
    </ul>
</div>


<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Get Bill</h2>

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
       
	   
	   
	<form action="billprint.php" method="post" name="form1">   
		<table class="table table-striped table-bordered bootstrap-datatable datatable responsive" style='font-size:12px;'>   
		<tr><th style="text-align:center;">Select Order</th><th><select name="order1" class="form-control" ><option value="select">Select</option><option value="Table">Table Order</option><option value="Direct">Direct Order</option></select></th><th>Select Date</th><th><select name="orddate" id="orddate" class="form-control" >
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
	
		
		
		</select></th><td><input type="submit" name="view" onclick="return valid();" class="btn btn-info" value="View"></td></tr>
		
		</table>
	 </form>
	 
	 <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" style='font-size:14px;'>   
	 
	 <?php 
	 if(isset($_POST['view']))
	 {
	 echo "<tr><th colspan='4' style='text-align:center;font-size:20px;' id='th1'>$_POST[order1] Order</th></tr>";
	 echo "<tr><th colspan='4' style='text-align:center;font-size:20px;'>$_POST[orddate]</th></tr>";
	 echo "<tr><th>S.No.</th><th>Bill No.</th><th>Date</th><th>Print</th></tr>";
	 if($_POST['order1']=="Table")
	 {
	 $sqlord=mysql_query("select distinct(billno),date1,name,address,contact,dob,otype  from order_details where date1='$_POST[orddate]' and type1='table' order by sno desc");
	 }
	 else
	 {
	 $sqlord=mysql_query("select distinct(billno),date1,name,address,contact,dob,otype  from order_details where date1='$_POST[orddate]' and type1='direct' order by sno desc");
	 }
	 $kp=1;
	 while($arrord=mysql_fetch_array($sqlord))
	 {
	 
	  $dt1=explode('-',$arrord['date1']);
      $dt2=$dt1[2].'/'.$dt1[1].'/'.$dt1[0];
	 
	 
	 echo "<tr><td>$kp</td><td>$arrord[billno]</td><td>$dt2</td><td><input type='button'  value='Final Bill' name='print' class='btn btn-info' onclick=prt3('$kp');></td></tr>";
	 
	 echo "<input type='hidden' value='$arrord[billno]' name='billno[]'>";
	 echo "<input type='hidden' value='$arrord[date1]' name='date1[]'>";
	 echo "<input type='hidden' name='name[]' value='$arrord[name]'>";
	 echo "<input type='hidden' name='contact[]' value='$arrord[contact]'>";
	 echo "<input type='hidden' name='dob[]' value='$arrord[dob]'>";
	 echo "<input type='hidden' name='address[]' value='$arrord[address]'>";
	  echo "<input type='hidden' name='otype[]' value='$arrord[otype]'>";
	 
	 
	 
	 ?>
   
	   
	  <tr><td style="display:none;" colspan="3">
              <table  id="tab<?php echo $kp;?>" class="table table-striped table-bordered bootstrap-datatable datatable responsive" style='width:440px;font-size:12px;'>
					              
           <tr>
          <td style='border-bottom:1px solid black !important;'><b>Item</b></td><td style='border-bottom:1px solid black !important;text-align:left;'><b>Qty.</b></td><td style='border-bottom:1px solid black !important;'><b>Rate</b></td><td style='border-bottom:1px solid black !important;'><b>Amount</b></td><th>Update</th><th>Delete</th>
		   </tr>
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
			 $disc1=0;
			 while($row2=mysql_fetch_array($row1))
             {
             
			  $disc1=$row2['disc1'];
			   $tax=($row2['cost1']*$row2['tax1'])/100;
			   $totaltax=$row2['qty']*$tax;
			   $totalcost=$row2['cost1']*$row2['qty'];
			   $totalrt=$totaltax+$totalcost;
			  $sum=$sum+$totalrt;
			  $costsum=$costsum+$totalcost;
			  $taxsum=$taxsum+$totaltax;

			  echo "<tr><td>$row2[pname]</td><td><input type='text' value='$row2[qty]' name='pqty' style='width:50px;font-size:11px;' class='form-control'></td><td><input type='text' style='width:40px;font-size:11px;' class='form-control' value='$row2[cost1]' readonly></td><td><input type='text' value='$totalcost' name='total' style='width:80px;font-size:11px;' class='form-control' readonly></td>";
			   echo "</tr>";
			   
          	  }
			  echo "<tr><td colspan='3' style='text-align:center;border-top:1px solid black;'><b>Total</b></td><td  style='border-top:1px solid black;'><b>".round($costsum, 2)."</b></td></tr>";
			  echo " <tr><td colspan='3' style='text-align:center;border-top:1px solid black;'><b>Discount</b></td><td style='border-top:1px solid black;'><b>".round($disc1, 2)."</b></td></tr>";
			  $subtotal=$costsum-$disc1;
			  echo " <tr><td colspan='3' style='text-align:center;border-top:1px solid black;'><b>Sub Total</b></td><td style='border-top:1px solid black;'><b>".round($subtotal, 2)."</b></td></tr>";
			  echo " <tr><td colspan='3' style='text-align:center;border-top:1px solid black;'><b>Tax</b></td><td style='border-top:1px solid black;'><b>".round($taxsum, 2)."</b></td></tr>";
			  
			  $sum=$sum-$disc1;
			  
			  echo " <tr><td colspan='3' style='text-align:center;border-top:1px solid black;border-bottom:1px solid black;'><b>Total</b></td><td style='border-top:1px solid black;border-bottom:1px solid black;'><b>".round($sum, 2)."</b></td></tr>";
			  
			  ?>
			  </table>
			 
			   

			   </td></tr>
<?php
$kp++;		
}
}
?>
</table>
	   </div>

    
    
	
	
   
                <!-- Ads, you can remove these -->
                
                <!-- Ads end -->

            </div>
        </div>
    </div>
</div>
</div>



<?php require('footer.php'); ?>
