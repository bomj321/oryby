
<?php session_start();
include('Connect.php');
$email= $_SESSION['confemail'];
$confirmcode=$_SESSION['code'];
$message =
		"
		Confirm Your Email
		Click the link below to verify your account
		http://mauricio1314.000webhostapp.com/b2b/emailconfirm.php?email=$email&code=$confirmcode		
		";
		
		mail($email,"EMAIL SUBJECT",$message,"From: AN-EMAIL-ADDRESS");		
		echo "<script>
                alert('Registration Complete! Please confirm your email address');
                window.location= 'index.php'
        </script>";
?>








