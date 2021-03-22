<?php
include('config.php');
$q=$_GET['q'];

$res1=mysql_query("select * from order_details where billno='$q'");
while($row1=mysql_fetch_array($res1))
{
	echo "<option value='$row1[block]'>$row1[block]</option>";
	
}	
?>