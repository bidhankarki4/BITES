<?php include("config.php");

 if(!empty($_POST['rtype']))
 {
 
 $sql="update rconfig SET rtype='$_POST[rtype]',roomno='$_POST[rno]',nobed='$_POST[nofbed]',pdayc='$_POST[roomchg]',tax='$_POST[tax]',exbed='$_POST[extrabed]',exbedc='$_POST[exchg]' where sno='$_POST[hide]'";
 
 if(!mysql_query($sql))
 {
 die('Error:'.mysql_error());
 } 	
 //echo $sql; 
 header('location:rconfig.php'); 
 } 
 

  
?>