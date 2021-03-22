<?php
include("config.php");


$sql01=mysql_query("select * from order_details where billno='$_GET[billno]'");
if(mysql_num_rows($sql01)>0)
{
mysql_query("update order_details set disc1='$_GET[disc1]',total1='$_GET[sum1]' where tableno='$_GET[tabno]' and status1='unpaid'");
mysql_query("update order_details set status1='paid' where tableno='$_GET[tabno]'");

}

?>