<?php session_start();
include('Connect.php');
$errors = '';
$id =$_REQUEST['id'];
////////////////////////////GET Site Link ///////////////////////////
$sqlsite="SELECT * FROM aboutus WHERE elementname= 'sitelink'";
$resultsite=mysqli_query($connection,$sqlsite);
 if($resultsite == false) { 
 trigger_error('Wrong SQL: ' . $sqlsite. ' Error: ' . $connection->error, E_USER_ERROR); 
 } /* Bind parameters. Types: s=string, i=integer, d=double,  b=blob */ 

$nrsite= mysqli_num_rows($resultsite);
$rowsite =mysqli_fetch_array($resultsite);
 $hreflink = $rowsite['hreflink'];


///////////////////////////Get Key and Email of Reciver //////////////////////////
$sqlconfirm="SELECT * FROM confirm WHERE confirmid= '$id'";
$resultconfirm=mysqli_query($connection,$sqlconfirm);
 if($resultconfirm == false) { 
 trigger_error('Wrong SQL: ' . $sqlconfirm. ' Error: ' . $connection->error, E_USER_ERROR); 
 } /* Bind parameters. Types: s=string, i=integer, d=double,  b=blob */ 

$nrconfirm= mysqli_num_rows($resultconfirm);
$rowconfirm =mysqli_fetch_array($resultconfirm);
 $key = $rowconfirm['keyd'];
 $email = $rowconfirm['email']; //$_REQUEST['email'];	 
		 
		 
/////////////////////////////GEt Email of Admin //////////////////////////		 
 $sql="SELECT * FROM users WHERE userType= 'Admin'";
$result=mysqli_query($connection,$sql);
 if($result == false) { 
 trigger_error('Wrong SQL: ' . $sql. ' Error: ' . $connection->error, E_USER_ERROR); 
 } /* Bind parameters. Types: s=string, i=integer, d=double,  b=blob */ 

$nr= mysqli_num_rows($result);
$row =mysqli_fetch_array($result);
 $emailfrom =$row['email'];
	?>	</br>
 <?php
 $email_address = $email; 
 $message = $key; 
 $link=$hreflink.'?keyid='.$key;

if(empty($errors))
{
	  $to = $email; 
	 $email_subject = "Resend Account Confirmation ";
	  $message = '<html><body>';
					$message .= '';
				
					$message .= ' <img src="http://admin.contents.management/btb/orybue/b2b/images/oryLogo.png" alt="" width="150px" height="100px" /></a></h1>';
					// add body 
				
					// add footer
					$message .= '<table rules="all" width="600px">';
				//	$message .= '$text';
					$message .= '<tr><td><br><br><hr>Thanx for Contact Us <b>Please do not reply to this mail.</b></td></tr>';

					$message .= "</table>";
					$message .= "</body></html>";
	?>
	</br>
	<?php
   $email_body = "You have received a new message Here are the details: \n Account Confirmation Key \n $link"; 
	$email_body=wordwrap($email_body, 70);
	
	$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	$headers .= 'From: '.$emailfrom.'' . "\r\n" .
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
			window.location.href="resendEmail.php";
		
			</script>
			<?php
} 
else
{
//header('Location: ../about.php');
}
?>
