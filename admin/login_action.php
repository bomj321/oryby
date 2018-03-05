<?php       
session_start(); 
require("Connect.php");
$email=$_POST["email"];
$password=$_POST["password"];

 $sql="SELECT * FROM users WHERE email= '$email' AND password='$password'";
$result=mysqli_query($connection,$sql);
 if($result == false) { 
 trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $connection->error, E_USER_ERROR); 
 } 

$nr= mysqli_num_rows($result);
$loginsucceful=False;
if($nr > 0)
{
$_SESSION["loggedin"]="T";
while ($row=mysqli_fetch_array($result)) {
$userType =$row['userType'];
$name =$row['firstName'];
$email = $row['email'];
$_SESSION["userType"]=$userType;
$_SESSION["email"]=$email;
 $userid= $row['user_id'];
$_SESSION["user_id"]= $userid;
}
$loginsucceful=True;
  $_SESSION['firstName']=$name;
	  $now= date("Y-m-d h:i:s");

	 $updatequery="update `users` set `status`='online', `lastactiveon`='$now' where `email`='$email' ";
	mysqli_query($connection,$updatequery);
   

}
else
{
$loginsucceful=False;
}



if($loginsucceful){

?><script>
	
				window.location.href='index.php';
				</script>
  <?php 	
}    
else{
	$_SESSION["loggedin"]="F";

$sql="SELECT * FROM users";
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
while($row = mysqli_fetch_array($stmt))
{
  $emaill=$row['email'];
 $password=$row['password'];

	 if($email==$emaill)
		{
						?>
		
			    <script>
		     	alert('Incorrect Email! Please Retype');
				window.location.href='login.php';
				</script>
  <?php 
		}
		else if($password==$password)
		{
						?>
		
			    <script>
		     	alert('Incorrect Password! Please Retype');
				window.location.href='login.php';
				</script>
  <?php 
		}
	}
	
			?>
		
			    <script>
		     	alert('Your Are Not Registered User! Please Sign Up');
				window.location.href='login.php';
				</script>
  <?php 

}




?> 


