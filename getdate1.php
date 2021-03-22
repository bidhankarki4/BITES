<?php

include("config.php");
$val=$_GET['val'];


if($val=="Room")
{

$sql1=mysql_query("select distinct(date1) from roomorder");
echo "<option value='select'>Select</option>";
while($arr=mysql_fetch_array($sql1))
{
 $dt1=explode('-',$arr['date1']);
 $dt2=$dt1[2].'/'.$dt1[1].'/'.$dt1[0];
 
 echo "<option value='$arr[date1]'>$dt2</option>";

}

}
else
{

$sql3=mysql_query("select distinct(date1) from order_details");
echo "<option value='select'>Select</option>";
while($arr=mysql_fetch_array($sql3))
{
 $dt1=explode('-',$arr['date1']);
 $dt2=$dt1[2].'/'.$dt1[1].'/'.$dt1[0];
 
 echo "<option value='$arr[date1]'>$dt2</option>";

}


}

?>