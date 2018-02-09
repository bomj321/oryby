<?php 
session_start();
include('Connect.php');
$errors = '';
 $userStatus = $_REQUEST['userStatus'];
		  $email = $_REQUEST['email'];
		 
	
		 
		if($userStatus==0)
		{
		  $status = "De-Activated";
		}
		else if($userStatus==1)
		{
		  $status = "Activated";
		}


 $name = $status; 
 $email_address = $email; 

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
 
if(empty($errors))
{
	  $to = $email;
	 $email_subject = "Contact form submission: $name";
?>
	</br>
	<?php
	
 
   	$email_body = "You have received a new message. ".
	" Here are the details:\n Status: $name  \n  $defaultPath \nMessage \n $message"; 
	$email_body=wordwrap($email_body, 70);
	$emailfrom=$_SESSION["email"];
	// Always set content-type when sending HTML email
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
 $emailfrom;
     "Success";
}
	//redirect to the 'thank you' page
	?>
			<script>
			alert("Notification Send to User");
			window.location.href="manageSupplier.php";
			
			
			</script>
			<?php
} 
else
{
//header('Location: ../about.php');
}
?>
