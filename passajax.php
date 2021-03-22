<?php
if (isset($_REQUEST['queryString1'])) {

    include ('config.php');
    $inputString = $_GET['queryString1'];
	//echo $inputString; 
	$q2=$_GET['query1'];
	?>
  <?php  
  
  $sql3 = "SELECT * FROM login_details WHERE pswrd='$inputString' and username='$q2'" ;
		$result=mysql_query($sql3);
	$tot=mysql_num_rows($result);
if($tot==1)
{
echo "<span style='color:green'>Password Matched</span>";
}

else
{
echo "<span style='color:red'>Please enter old password correctly</span>";
}	
				
				}?>

