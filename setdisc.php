<?php
include('config.php');

$inv1=$_GET['inv1'];

$chkouttim1=$_GET['chkouttim1'];
$disc1=$_GET['disc1'];
$days1=$_GET['days1'];
$tax1=$_GET['tax1'];
$excharge1=$_GET['excharge1'];
$charges1=$_GET['charges1'];
$rd1=$_GET['rd1'];
$modepay=$_GET['mode1'];


$datenew1=explode('/',$_GET['chkout1']);
$chkout1=$datenew1[2].'-'.$datenew1[1].'-'.$datenew1[0];
	 
//echo "update roombook set discount='$val',checkouttim='$checkouttim',modepay='$modepay' where inv_no='$inv1'";
$sql="update roombook set discount='$disc1',checkouttim='$chkouttim1',modepay='$modepay',checkout='$chkout1',days='$days1',tax='$tax1',excharge='$excharge1',charge='$charges1',finaltot='$rd1' where inv_no='$inv1'";

if(!mysql_query($sql))
{
die('Error'.mysql_error());
}
?>

