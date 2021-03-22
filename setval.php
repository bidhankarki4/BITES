<?php
include("config.php");


$sql01=mysql_query("select * from order_details where billno='$_GET[billno]'");
if(mysql_num_rows($sql01)>0)
{
mysql_query("update order_details set otype='$_GET[otype]' where billno='$_GET[billno]'");
echo "success";
}

?>