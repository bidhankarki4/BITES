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
							
							var cdate = document.getElementsByName('cdate')[0].value;
							 var date1 = document.getElementsByName('date1[]')[str].value;
							 var billno = document.getElementsByName('billno[]')[str].value;
							 var orgby = document.getElementsByName('orgby[]')[str].value;
							 var time1 = document.getElementsByName('time1[]')[str].value;
							 var totalamt = document.getElementsByName('totalamt[]')[str].value;
							 var advamt = document.getElementsByName('advamt[]')[str].value;
							 var totaldueamt = document.getElementsByName('totaldueamt[]')[str].value;
							 
							var charge1 = document.getElementsByName('charge1[]')[str].value;
							var charge2 = document.getElementsByName('charge2[]')[str].value;
							var charge3 = document.getElementsByName('charge3[]')[str].value;
							var charge4 = document.getElementsByName('charge4[]')[str].value;

							
							var printWindow = window.open('', '', 'height=768,width=1000');
							printWindow.document.write('<html><head><title>Invoice</title><style>input{border:none;} a{display:none;} table tr th{display:none;} #tdup{display:none;}table{width:270px !important;}#tab1{font-size:11px;}</style>');
							printWindow.document.write('</head><body >');
							
							printWindow.document.write('<div style="text-align:center;width:270px;border:1px dashed #eee;padding:10px;">')
							printWindow.document.write('<div style="font-size:18px;text-align:center;font-family:bookman old style;">Bites</div>');
							printWindow.document.write('<div style="font-size:13px;text-align:center;bookman old style;"><i>597, 598, C.V. Tower, Sabji Mandi Road,<br> Mahaveer Nagar II, Kota,(Raj.)</i></div>');
							printWindow.document.write('<div style="font-size:12px;text-align:center;bookman old style;margin-bottom:3px;"><i>Contact - 0744-2405484</i><br><i>grabneatkota@gmail.com, www.grabneat.in</i></div>');
							printWindow.document.write('<div style="font-size:14px;text-align:center;font-weight:bold;border-bottom:1px dashed;border-top:1px dashed;">INVOICE</div>');
							printWindow.document.write('<div style="font-size:11px;text-align:center;font-weight:bold;margin-top:5px;">Cash Bill</div>');							
							
						 //  printWindow.document.write('<table style="font-size:11px;"><tr><td style="text-align:left;">Organised By - &nbsp; '+orgby+'</td></tr><tr><td style="text-align:left;">Date  - <span style="margin-left:45px;">'+date1+'</span></td></tr></table>');	
						   
						   //<tr><td style="text-align:left;">Time - <span style="margin-left:43px;">'+time1+'</span></td></tr><tr><td style="text-align:left;"></td></tr>

						   printWindow.document.write('<table style="font-size:11px;"><tr><td style="text-align:left;">Bill No.- &nbsp;'+billno+'</td><td style="text-align:right;"></td></tr><tr><td style="text-align:left;">Date  - &nbsp;'+cdate+'</td><td style="text-align:right;">Time - &nbsp;'+result+'</td></tr></table>');
						   
						   
						   printWindow.document.write('<div style="clear:both;font-size:11px;margin-top:10px;border-top:1px solid black;" align="center">');
						   
						    printWindow.document.write('<table style="font-size:11px;">');  
							
							if(charge1!="" && charge1!=0)
							{
							printWindow.document.write('<tr><td style="text-align:left;"> Balloon Decoration: - &nbsp;'+charge1+'</td></tr>');
							}
							
							if(charge2!="" && charge2!=0)
							{
							printWindow.document.write('<tr><td style="text-align:left;"> Cake: - &nbsp;<span style="margin-left:67px;">'+charge2+'</span></td></tr>');
							}
							
							if(charge3!="" && charge3!=0)
							{							
							printWindow.document.write('<tr><td style="text-align:left;":> Party Hall Charges: - &nbsp;'+charge3+'</td></tr>');
							}
							
							if(charge4!="" && charge4!=0)
							{							
							printWindow.document.write('<tr><td style="text-align:left;":> Total Amount: - &nbsp;<span style="margin-left:22px;">'+charge4+'</span></td></tr>');
							}
							
						
							
							printWindow.document.write('</table>'); 
							
							printWindow.document.write('<div style="clear:both;font-size:11px;margin-top:10px;border-top:1px solid black;" align="center">');
							printWindow.document.write('<table style="font-size:11px;margin-left:115px;width:150px !important;"><tr><td style="text-align:left;">Total Amount - &nbsp;<span style="margin-left:22px;"> '+totalamt+'</span></td></tr><tr><td style="text-align:left;">Paid Amount - &nbsp;<span style="margin-left:26px;"> '+advamt+'</span></td></tr><tr><td style="text-align:left;">Total Due Amount - &nbsp; '+totaldueamt+'</td></tr></table>');
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
if(document.form1.orddate.value=="")
{
alert("Please Select Date");
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
            <a href="#">Get Party Bill</a>
        </li>
    </ul>
</div>


<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i>Get Party Bill</h2>

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
       
	   
	   
	<form action="partybillprint.php" method="post" name="form1">   
		<table class="table table-striped table-bordered bootstrap-datatable datatable responsive" style='font-size:12px;'>   
		<tr><th style="text-align:center">Party Date</th><th><select name="orddate" id="orddate" class="form-control" >
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
	
		
		
		</select></th><td><input type="submit" name="view" onclick="return valid();" class="btn btn-info" value="View"></td></tr>
		
		</table>
	 </form>
	 
	 <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" style='font-size:14px;'>   
	 
	 <?php 
	 if(!empty($_POST['orddate']))
	 {
		 
	 $dt3=explode('-',$_POST['orddate']);
     $dt4=$dt1[2].'/'.$dt1[1].'/'.$dt1[0];	 
	 echo "<tr><th colspan='6' style='text-align:center;font-size:20px;'>$dt4</th></tr>";
	 echo "<tr><th>S.No.</th><th>Bill No.</th><th>Date</th><th>Time</th><th>Organised By</th><th>Print</th></tr>";
	 
	 $sqlord=mysql_query("select distinct(billno),ptype1,date1,time1,orgby,totalamt,advamt,totaldueamt,charge1,charge2,charge3  from bookparty where date1='$_POST[orddate]' order by sno desc");
	
	 $kp=1;
	 while($arrord=mysql_fetch_array($sqlord))
	 {
	 
	  $dt1=explode('-',$arrord['date1']);
      $dt2=$dt1[2].'/'.$dt1[1].'/'.$dt1[0];
	 
	 
	 echo "<tr><td>$kp</td><td>$arrord[billno]</td><td>$dt2</td><td>$arrord[time1]</td><td>$arrord[orgby]</td><td><input type='button'  value='Print' name='print' class='btn btn-info' onclick=prt3('$kp');></td></tr>";
	 
	 $totalamt11=$arrord['charge1']+$arrord['charge2']+$arrord['charge3']+$arrord['totalamt'];
	 
	 echo "<input type='hidden' value='$arrord[charge1]' name='charge1[]'>";
	 echo "<input type='hidden' value='$arrord[charge2]' name='charge2[]'>";
	 echo "<input type='hidden' value='$arrord[charge3]' name='charge3[]'>";
	 echo "<input type='hidden' value='$arrord[totalamt]' name='charge4[]'>";
	 
	 echo "<input type='hidden' value='$arrord[billno]' name='billno[]'>";
	 echo "<input type='hidden' value='$arrord[date1]' name='date1[]'>";
	 echo "<input type='hidden' name='orgby[]' value='$arrord[orgby]'>";
	 echo "<input type='hidden' name='time1[]' value='$arrord[time1]'>";
	 echo "<input type='hidden' name='totalamt[]' value='$totalamt11'>";
	 echo "<input type='hidden' name='advamt[]' value='$arrord[advamt]'>";
	 echo "<input type='hidden' name='totaldueamt[]' value='$arrord[totaldueamt]'>";
	  $cdt=date("d/m/Y");
	  echo "<input type='hidden' name='cdate' value='$cdt'>";
	 ?>
   
	   
	 
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
