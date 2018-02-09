<?php session_start();
include('Connect.php');

////////////////////////////GET Site Link ///////////////////////////
$sqlsite="SELECT * FROM aboutus WHERE elementname= 'sitelink'";
$resultsite=mysqli_query($connection,$sqlsite);
 if($resultsite == false) { 
 trigger_error('Wrong SQL: ' . $sqlsite. ' Error: ' . $connection->error, E_USER_ERROR); 
 } /* Bind parameters. Types: s=string, i=integer, d=double,  b=blob */ 

$nrsite= mysqli_num_rows($resultsite);
$rowsite =mysqli_fetch_array($resultsite);
 $hreflink = $rowsite['hreflink'];


 
$errors = '';
$key = $_SESSION['mykey'];
$email = $_SESSION['confemail']; //$_REQUEST['email'];	 
		 
 $sql="SELECT * FROM users WHERE userType= 'Admin'";
$result=mysqli_query($connection,$sql);
 if($result == false) { 
 trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $connection->error, E_USER_ERROR); 
 } /* Bind parameters. Types: s=string, i=integer, d=double,  b=blob */ 

$nr= mysqli_num_rows($result);
$row =mysqli_fetch_array($result);
$emailfrom =$row['email'];
		
 $email_address = $email; 
 $message = $key; 
$link=$hreflink.'?keyid='.$key;

if(empty($errors))
{
	  $to = "$email"; 
	 $email_subject = "Account Confirmation ";
	?>
	</br>
	<?php
   $email_body = "You have received a new message Here are the details: \n Account Confirmation Key \n $link"; 
	$email_body=wordwrap($email_body, 70);
	
 	$headers = 'From: '.$emailfrom.'' . "\r\n" .
   'Reply-To: '.$to.'' ."\r\n".
   'X-Mailer: PHP/' . phpversion();
	?>
	</br>
	<?php
?>
	</br>
	<?php
	 $result =mail($to,$email_subject,$email_body,$headers);
	 $result;
	if(!$result) {   
     "Error";   
} else {
     "Success";
}
	//redirect to the 'thank you' page
	?>
			<script>
			alert("Check your mail for Confirmation");
			window.location.href="index.php";
		
			</script>
			<?php
} 
else
{
//header('Location: ../about.php');
}
?>
