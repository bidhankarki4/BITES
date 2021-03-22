<?php
session_start();
if (!isset($_SESSION['loguser'])) {
header('Location: login.php');
}

if(empty($_GET['billno']))
{
header("location:dailyreport.php");
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



</script> 
<style>
#tab1 tr td,#tab1 tr th{
font-weight:bold !important;
padding:8px;
}
</style>

<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">View Bill Details</a>
        </li>
    </ul>
</div>


<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i>View Bill Details</h2>

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
       
<table  class="table table-striped table-bordered bootstrap-datatable datatable responsive">
<tr><th colspan='4' style='text-align:center;'><h4><?php echo $_GET['billno'];?> Bill Details</h4></th></tr>
<tr><th>Item</th><th>Qty</th><th>Rate</th><th>Amount</th></tr>
<?php
include("config.php");

$billno="";
$sql01=mysql_query("select * from order_details where billno='$_GET[billno]'");
if(mysql_num_rows($sql01)>0)
{
			
		     $sum=0;
             $taxsum=0;
			 $costsum=0;
			 $i=0;
			$disc1=0;
			 while($row2=mysql_fetch_array($sql01))
             {
				 $c="";
				 if($row2['kslip']==1){$c="checked";}
             
			   $tax=($row2['cost1']*$row2['tax1'])/100;
			   $totaltax=$row2['qty']*$tax;
			   $totalcost=$row2['cost1']*$row2['qty'];
			   $totalrt=$totaltax+$totalcost;
			  $sum=$sum+$totalrt;
			  $costsum=$costsum+$totalcost;
			  $taxsum=$taxsum+$totaltax;
			
			  echo "<tr><td>$row2[pname]</td><td>$row2[qty]</td><td>$row2[cost1]</td><td>$totalcost</td></tr>";
			  $i++;
			  $billno=$row2['billno'];
			  $disc1=$row2['disc1'];
             }
			 
			
			  $taxsum1=round($taxsum,2);
			  $sum1=round($sum,2);
			  $costsum1=round($costsum,2);
				
				$sum1=$sum1-$disc1;
				$costsum=$costsum-$disc1;
				
			  echo "<tr><th colspan='3'>Sub Total</th><th>$costsum1</th></tr>";
			  echo "<tr><th colspan='3'>Discount</th><th>$disc1</th></tr>";
			  echo "<tr><th colspan='3'>Total</th><th>$costsum</th></tr>";			  
			  echo " <tr><th colspan='3'>Tax @</th><th>$taxsum1</th></tr>";
			  echo " <tr><th colspan='3'>Grand Total</th><th>$sum1</th></tr></table>";
			 
			  
			  ?>
			 
			 
			  
			   
<?php } ?>
	
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
