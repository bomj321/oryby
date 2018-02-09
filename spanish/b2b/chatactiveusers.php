<?php
error_reporting(0);
include 'Connect.php';
$now= date("Y-m-d h:i:s");
$query="select * from `users` where `status`='online'";
$result=mysqli_query($connection,$query);
while($row=mysqli_fetch_array($result)){
	
	$last=$row['lastactiveon'];
	 $to_time = strtotime($now);
	 $from_time = strtotime($last);
 $value=abs($to_time - $from_time) / 60;

if($value>30)
{
 $updatequery="update `users` set `status`='offline' where `user_id`='$row[0]'";
	mysqli_query($connection,$updatequery);
	session_destroy();
	
	
}else{
	if($_SESSION['firstName']==$row['firstName']){
		$name=$_SESSION['firstName'];
	$updatetime="update `users` set `lastactiveon`='$now' where `firstName`='$name'";
		mysqli_query($connection,$updatetime);
		
	}
	
}
}
?>