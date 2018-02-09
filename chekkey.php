<?php session_start();
require 'Connect.php';
  $keyid=$_GET['keyid'];
 $_SESSION['keylogin']=$keyid;
//$chekkeymail=$_SESSION['confemail']
 $chkqury="SELECT * FROM confirm WHERE keyd = '$keyid' ";
$rsl=mysqli_query($connection,$chkqury);
$row =mysqli_fetch_array($rsl);
 $nr=mysqli_num_rows($rsl);
 $k=$row['keyd'];
 
if($keyid==$k){
echo 'Succfully verfied';
$updatequery="UPDATE confirm SET chkstatus=1 where keyd='$k'";
mysqli_query($connection,$updatequery);	

?>
<script>window.location.href="index.php";  </script>
<?php
}
else{
echo 'Failed verification';	
$upatequery="UPDATE confirm SET chkstatus=0 where keyd='$k'";
mysqli_query($connection,$upatequery);		
}



?>