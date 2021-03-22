<?php
session_start();
date_default_timezone_set("Asia/Kolkata");
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
    var x;
    if (confirm("Do you want to Print?!") == true) {
       setval();
           var t1 = document.getElementById('tab1');
			

			
				//alert(t1);
				var disc1=document.getElementById("disc1").value;
				document.getElementById("mdisc").innerHTML=disc1;
				
				             var date1 = document.getElementsByName('date1')[0].value;
							
							 //var date2=date1.split('-');
							 //date1=date2[2]+'/'+date2[1]+'/'+date2[0];
							 
							 
							 var billno = document.getElementsByName('billno')[0].value;
							var printWindow = window.open('', '', 'height=768,width=1000');
							printWindow.document.write('<html><head><title>Invoice</title><style>input{border:none;} a{display:none;} table tr th{display:none;} #tdup{display:none;}table{width:270px !important;}#tab1{font-size:11px;}.myclass{text-align:center;border-bottom:1px solid black;border-top:0px solid black;font-weight:bold;}#tr1 td{border-top:1px solid black !important;}input[type="button"]{display:none;}input[type="checkbox"]{display:none;}</style>');
							printWindow.document.write('</head><body >');
							
							printWindow.document.write('<div style="text-align:center;width:270px;border:1px dashed #eee;padding:10px;">')
							printWindow.document.write('<div style="font-size:18px;text-align:center;font-family:bookman old style;">Bites</div>');
							printWindow.document.write('<div style="font-size:13px;text-align:center;bookman old style;"><i>1300 Dallas Dr,<br> Denton, TX 76205, USA</i></div>');
							printWindow.document.write('<div style="font-size:12px;text-align:center;bookman old style;margin-bottom:3px;"><i>Contact - 9876543210</i><br><i>bites@gmail.com, www.bites.in</i></div>');
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
     window.location.reload();
		return true
    } else {
	alert("Are you sure!!");
        return true;
    }
}





function prt1()
{
	var x;
    if (confirm("Do you want to Print?!") == true) {
       
         	
	var tabno=1;		
			for(var i=1;i<=20;i++)
	{
		if(document.getElementById("divid"+i).style.backgroundColor=="gray")
		{
		tabno=i;
		}
	}
			setkslip(tabno);	
			
				             var date1 = document.getElementsByName('date1')[0].value;
							 
							 
						
							var printWindow = window.open('', '', 'height=768,width=1000');
							printWindow.document.write('<html><head><title>Kitchen Slip</title><style>input{border:none;} a{display:none;} table tr th{display:none;} #tdup{display:none;}table{width:270px !important;}#tab1{font-size:11px;}.myclass{text-align:center;border-bottom:1px solid black;border-top:0px solid black;font-weight:bold;}#tr1 td{border-top:1px solid black !important; }</style>');
							printWindow.document.write('</head><body >');
							
							printWindow.document.write('<div style="text-align:center;width:270px;border:1px dashed #eee;padding:10px;">')
							printWindow.document.write('<div style="font-size:18px;text-align:center;font-family:bookman old style;">Bites</div>');
							
							printWindow.document.write('<div style="font-size:14px;text-align:center;font-weight:bold;border-bottom:1px dashed;border-top:1px dashed;">Kitchen Slip</div>');
										
						  

						   printWindow.document.write('<table style="font-size:11px;"><tr><td style="text-align:left;">Table No.- &nbsp;'+tabno+'</td><td style="text-align:right;"></td></tr><tr><td style="text-align:left;">Date  - &nbsp;'+date1+'</td><td style="text-align:right;">Time - &nbsp;'+result+'</td></tr></table>');
						    
							 printWindow.document.write('<table style="font-size:11px;margin-top:10px;"><tr><td style="border-top:1px dashed black;border-bottom:1px dashed black;">Product Name</td><td style="border-top:1px dashed black;border-bottom:1px dashed black;">Quantity</td></tr>');
							 
							 var pname1=document.getElementsByName("pname1[]");
							 var pqty=document.getElementsByName("pqty[]");
							var chk=document.getElementsByName("chk[]");
							 
												 
							for(var i=0;i<chk.length;i++)
							{
							if(chk[i].checked==true)
							{
							printWindow.document.write('<tr><td>'+pname1[i].value+'</td><td>'+pqty[i].value+'</td></tr>');
							}
	
							}
							 


							printWindow.document.write('</table><div style="clear:both;font-size:11px;margin-top:10px;border-top:1px solid black;" align="center">');
						
							printWindow.document.write('</div>');
							
						
							

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
var sum1=document.getElementById('sum1').innerHTML;
var tabno=0;
	for(var i=1;i<=20;i++)
	{
		if(document.getElementById("divid"+i).style.backgroundColor=="gray")
		{
		tabno=i;
		}
	}

if(tabno!=0)
{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
{
str1=xmlhttp.responseText;


}
        }
        xmlhttp.open("GET","setval1.php?billno="+billno+'&disc1='+disc1+'&tabno='+tabno+'&sum1='+sum1, true);
        xmlhttp.send();
    
}
}

function setkslip(tabno) {

var allsno="";
var chk=document.getElementsByName("chk[]");
var sno1=document.getElementsByName("sno1[]");
for(var i=0;i<chk.length;i++)
{
	if(chk[i].checked==true)
	{
		allsno=allsno+sno1[i].value+',';
	}
	
}

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
{
str1=xmlhttp.responseText;
getval(tabno);

}
        }
        xmlhttp.open("GET","setkslip.php?allsno="+allsno, true);
        xmlhttp.send();
    
}





function addval() {


var date1=document.getElementById("date1").value;
var time1=document.getElementById("time1").value;
var waiter1=document.getElementById("waiter1").value;
var tabno=0;
var date2="";
var pname=document.getElementsByName("pname")[0].value;
var qty=document.getElementsByName("qty")[0].value;

	for(var i=1;i<=20;i++)
	{
		if(document.getElementById("divid"+i).style.backgroundColor=="gray")
		{
		tabno=i;
		}
	}
		
	var stp=0;	
	if(date1=="")
	{
		alert("Please Enter Date");
		stp=1;
		document.getElementById("date1").focus();
	}
	else if(date1!="")
	{
    var data = date1.split("/");
    if (isNaN(Date.parse(data[2] + "-" + data[1] + "-" + data[0]))) {
    alert("Please Enter DD/MM/YYYY Format");
	stp=1;
	document.getElementById("date1").focus();
    }
	}
	
	if(stp==0)
	{
	if(tabno==0)
	{
		alert("Please Select Any Table");
		document.getElementById("divid1").focus();
	}
	else if(pname=="")
	{
		alert("Please Select Any Product");
		document.getElementsByName("pname")[0].focus();
	}
	else if(qty=="" || qty==0)
	{
		alert("Please Ener Quantity");
		document.getElementsByName("qty")[0].focus();
	}
	else
	{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
			{
			str1=xmlhttp.responseText;
			document.getElementById("viewdiv").innerHTML=str1;
			//document.getElementById("span1").innerHTML=tabno;
			document.getElementsByName("pname")[0].focus();
			}
        }
        xmlhttp.open("GET","addval.php?date1="+date1+"&time1="+time1+"&tabno="+tabno+"&pname="+pname+"&qty="+qty+'&waiter1='+waiter1, true);
        xmlhttp.send();
    
	
}

}
}
function getval(tabno) {


        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
			{
			str1=xmlhttp.responseText;
			document.getElementById("viewdiv").innerHTML=str1;
			//document.getElementById("span1").innerHTML=tabno;
			}
        }
        xmlhttp.open("GET","getval.php?tabno="+tabno, true);
        xmlhttp.send();
    
}


function upval(sno,j,type1) {
		
	var nt="";	
	if(type1=="del")	
	{
		var r=confirm("Do You Want To Delete");
		if(r==true)
		{
			nt="1";
		}
	} 
	else if(type1=="up")
	{
		nt="1";
	}
		
		if(nt==1)
		{
	var tabno=0;
	for(var i=1;i<=20;i++)
	{
		if(document.getElementById("divid"+i).style.backgroundColor=="gray")
		{
		tabno=i;
		}
	}

var qty=document.getElementsByName("pqty[]")[j].value;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
{
str1=xmlhttp.responseText;


document.getElementById("viewdiv").innerHTML=str1;
}
        }
        xmlhttp.open("GET","upval.php?sno="+sno+'&qty='+qty+'&tabno='+tabno+'&type1='+type1, true);
        xmlhttp.send();
    
}
}

function selchk(id)
{
	
	
	for(var i=1;i<=20;i++)
	{
		if(i==id)
		{
		document.getElementById("divid"+i).style.backgroundColor="gray";
		document.getElementById("divid"+i).style.color="white";
		getval(i);
		
		}
		else
		{
		document.getElementById("divid"+i).style.backgroundColor="white";
		document.getElementById("divid"+i).style.color="black";
		}
	}
		
			
	
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
			 <form name="val" role="form" method="POST">
					 
    <table><tr><td valign='top'> 
		  <div>
			  
					
							
					
					<div style="clear:both;"></div>
					<table id="dataTable" class="table table-striped table-bordered bootstrap-datatable datatable responsive" style='width:380px;font-size:12px;' >
					<tr><th colspan='2' style='text-align:center;'><h4>Add Bill Details</h4></th></tr>
					

							
					<tr>
						<td><div class="form-group">
					     <label for="name">Date <br>(dd/mm/yyyy)</label>
						 </div>
						  <input type="text" class="form-control" value="<?php if(!empty($_REQUEST['date'])){echo $_REQUEST['date'];}else{echo date('d/m/Y');}?>" id='date1' name="date1">
						 </td>
					 <td><div class="form-group">
					     <label for="name">Time <br>(H:M:S)</label>
						 </div>
						 <input type="text" class="form-control" value="<?php if(!empty($_REQUEST['time1'])){echo $_REQUEST['time1'];}else{echo date("h:i:s a");}?>" id='time1' name="time1">
						 </td>
						 
						 
					 </tr>
					
					    <tr>
					<td><div class="form-group">
                        <label for="name">Table No</label>
						</div></td>
						<td colspan="4"><div class="form-group" style="padding-left:10px;">
					    <?php
						for($i=1;$i<=20;$i++)
						{
							echo "<div  id='divid$i' style='width:30px;height:30px;float:left;border:1px solid black;text-align:center;margin-left:5px;margin-top:5px;padding-top:7px;cursor:pointer;' onclick=selchk('$i');>$i</div>";
							
							if($i%4==0 )
							{
								echo "<div style=clear:both;'></div>";
							}
						}
						?>
                    </div></td>
					</tr>
					
					
					<tr><td><div class="form-group">
                        <label for="name">Waiter Name</label></div></td>
						<td><div class="form-group">
						<input type="text" class="form-control" value="<?php if(!empty($_REQUEST['waiter1'])){echo $_REQUEST['waiter1'];}?>" id='waiter1' name="waiter1">
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
																
						<tr><td colspan="2" style="text-align:center;"> <button type="button" onclick="addval();" class="btn btn-info" name="add">Add</button><!--button type="submit" class="btn btn-default" name="sub" style="margin-left:100px;">Final Submit</button--></td></tr>
						
					</table>

                   
					
               
               </div>
			    </form>
            </td>
			<td valign='top'>
			
			
			            <div style='margin-left:10px;' id="viewdiv">
			          <table  id="tab1" class="table table-striped table-bordered bootstrap-datatable datatable responsive" style='width:600px;font-size:12px;'>
<tr><th colspan='6' style='text-align:center;'><h4>Table <span id="span1"></span> Bill Details</h4></th></tr>
<tr>
<td style='border-bottom:1px solid black !important;'><b>Item</b></td><td style='border-bottom:1px solid black !important;text-align:left;'><b>Qty</b></td><td style='border-bottom:1px solid black !important;'><b>Rate</b></td><td style='border-bottom:1px solid black !important;'><b>Amount</b></td><th>Update</th><th>Delete</th>
</tr>
			             </div>
			  </td></tr></table>
           </div>
        </div>
    </div>
</div><!--/row-->


<?php include('footer.php'); ?>
