<?php
date_default_timezone_set("America/Mexico_City");
$con=mysql_connect('localhost','root','');
if($con)
{
mysql_select_db('restro',$con);
}

?>