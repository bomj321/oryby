<?php session_start();
include('Connect.php');
$email= $_SESSION['confemail'];
$confirmcode=$_SESSION['code'];
$userStatus = $_GET['userStatus'];

if (isset($userStatus)) {
	$message =
		"
		Confirm Your Email
		Click the link below to verify your account
		http://www.orybu.com/freelancer/emailconfirm.php?email=$email&code=$confirmcode&userStatus=1		
		";
		
		mail($email,"MY ORYBU",$message,"From: info@orybu.com");	
			
		echo "<script>
                alert('Registration Complete! Please confirm your email address');
                window.location= 'index.php'
        </script>";


}else{
	$message =
		"
		Confirm Your Email
		Click the link below to verify your account
		http://www.orybu.com/freelancer/emailconfirm.php?email=$email&code=$confirmcode	
		";
		
		mail($email,"MY ORYBU",$message,"From: info@orybu.com");	
			
		echo "<script>
                alert('Registration Complete! Please confirm your email address');
                window.location= 'index.php'
        </script>";
}

?>








