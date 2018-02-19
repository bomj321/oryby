<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Email Confirmation Tutorial</title>
</head>

<body>
<form action="register.php" method="POST">
	<input type="text" name="username" placeholder="Enter A Username..."><br />
    <input type="email" name="email" placeholder="Enter An Email Address..."><br />
    <input type="password" name="password" placeholder="Enter A Password..."><br />
	<input type="submit" name="submit" value="Register">
</form>
<?php

if(isset($_POST['submit']))
{
	require "dbc.php";
	
	$username = mysqli_real_escape_string($_POST['username']);
	$email = mysqli_real_escape_string($_POST['email']);
	$password = mysqli_real_escape_string($_POST['password']);
	
	$enc_password = md5($password);
	
	if($username && $email && $password)
	{
		$confirmcode = rand();
		$query = mysqli_query("INSERT INTO `tutorial` VALUES('','$username','$enc_password','$email','0','$confirmcode')");
		
		$message =
		"
		Confirm Your Email
		Click the link below to verify your account
		http://www.DOMAIN.com/emailconfirm.php?username=$username&code=$confirmcode
		";
		
		mail($email,"EMAIL SUBJECT",$message,"From: AN-EMAIL-ADDRESS");
		
		echo "Registration Complete! Please confirm your email address";
	}
}
?>
</body>
</html>
