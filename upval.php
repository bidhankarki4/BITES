<?php
session_start();
include("config.php");

if($_GET['type1']=="up")
{
mysql_query("update order_details set qty='$_GET[qty]' where sno='$_GET[sno]'");
}
else if($_GET['type1']=="del")
{
mysql_query("delete from order_details  where sno='$_GET[sno]'");
}


?><table  id="tab1" class="table table-striped table-bordered bootstrap-datatable datatable responsive" style='width:600px;font-size:12px;'>
<tr><th colspan='6' style='text-align:center;'><h4>Table <span id="span1"></span> Bill Details</h4></th></tr>
<tr>
<td style='border-bottom:1px solid black !important;'><b>Item</b></td><td style='border-bottom:1px solid black !important;text-align:left;'><b>Qty</b></td><td style='border-bottom:1px solid black !important;'><b>Rate</b></td><td style='border-bottom:1px solid black !important;'><b>Amount</b></td><th>Update</th><th>Delete</th>
</tr>

<?php
include("config.php");

$tabno=$_GET['tabno'];
 $billno="";
$sql01=mysql_query("select * from order_details where tableno='$tabno' and status1='unpaid'");
if(mysql_num_rows($sql01)>0)
{
	
	
	
			
		     $sum=0;
             $taxsum=0;
			 $costsum=0;
			 $i=0;
			
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
				echo "<input type='hidden' value='$row2[sno]' name='sno1[]'>";			 
			     echo "<input type='hidden' value='$row2[pname]' name='pname1[]'>";
			  echo "<tr><td><label><input type='checkbox' name='chk[]' $c> $row2[pname]</label></td><td><input type='text' value='$row2[qty]' name='pqty[]' style='width:50px;font-size:11px;' class='form-control'></td><td><input type='text' style='width:50px;font-size:11px;' class='form-control' value='$row2[cost1]' readonly></td><td><input type='text' value='$totalcost' name='total' style='width:50px;font-size:11px;' class='form-control' readonly></td><th id='tdup'><input type='button' name='update' value='Update' class='btn btn-info' style='padding:5px !important;' onclick=upval('$row2[sno]','$i','up');></th><th><input type='button' name='update' value='Delete' class='btn btn-danger' style='padding:5px !important;' onclick=upval('$row2[sno]','$i','del');></th></tr>";
			  $i++;
			  $billno=$row2['billno'];
             }
			 
			
			  $taxsum1=round($taxsum,2);
			  $sum1=round($sum,2);
			  $costsum1=round($costsum,2);
			  echo "<tr id='tr1'><td colspan='3' class='myclass' style='border-top:1px solid balck;'><b>Sub Total</b></td><td id='costsum1' style='font-weight:bold;text-align:left;' class='myclass'>$costsum1</td></tr>";
			  echo "<tr><td colspan='3' class='myclass'><b>Discount</b></td><td class='myclass' id='mdisc' style='text-align:left;'><input type='text' value='0' class='form-control' id='disc1' style='width:50px !important;' onblur='fcalc(this.value);'></td></tr>";
			  echo "<tr><td colspan='3' class='myclass'><b>Total</b></td><td style='font-weight:bold;text-align:left;' id='subtotal' class='myclass'>$costsum</td></tr>";			  
			  echo " <tr><td colspan='3' class='myclass'><b>Tax</b></td><td class='myclass' id='tax1' style='text-align:left;'>$taxsum1</td></tr>";
			  echo " <tr><td colspan='3' class='myclass'><b>Grand Total</b></td><td class='myclass' id='sum1' style='text-align:left;'>$sum1</td></tr></table>";
			  echo " <table style='width:100%;'><tr><td colspan='3' class='myclass'><b>Deposited Amount</b></td><td class='myclass' style='text-align:left;'><input type='text' id='damt' value='0' class='form-control' onblur='calc();'></td></tr>";
			  echo " <tr><td colspan='3' class='myclass'><b>Return Amount</b></td><td class='myclass' ><input type='text'  value='0' class='form-control' id='ramt'></td></tr><input type='hidden' id='hide1' value='$sum'> </table>";
			  echo "<input type='hidden' value='$billno' id='billno' name='billno'>";
			  
			  ?>
			 
			  <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
			   <tr><td  style='text-align:center;'><input type="button"  value="kitchen Slip" name="print" class="btn btn-info" onclick="prt1();"></td><td colspan='5' style='text-align:center;'><input type="button"  value="Final Bill" name="print" class="btn btn-info" onclick="prt3();"></td></tr>
			   </table>
			   
<?php } ?>