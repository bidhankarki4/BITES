<?php
include("config.php");

$allsno=explode(",",$_GET['allsno']);

for($i=0;$i<count($allsno);$i++)
{
mysql_query("update order_details set kslip='0' where sno='$allsno[$i]'");	
}




