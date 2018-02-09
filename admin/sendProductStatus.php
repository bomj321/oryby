<?php 
session_start();
$errors = '';
 $productstatus = $_REQUEST['productstatus'];
		  $email = $_REQUEST['email'];
		 
		 include('Connect.php');
 
		 
		if($productstatus==0)
		{
		  $status = "Refuse";
		}
		else if($productstatus==1)
		{
		  $status = "Accept";
		}


 $name = $status; 
 $email_address = $email; 
 $message = "If you have any Query Contact Us"; 


if(empty($errors))
{
	  $to = $email; 
	 $email_subject = "Contact form submission: $name";
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
   	$email_body = "You have received a new message. ".
	" Here are the details:\n You Product : $name   \n $message"; 
	$email_body=wordwrap($email_body, 70);
	$emailfrom=$_SESSION["email"];
	

	
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
			alert("Notification Send to Supplier");
			window.location.href ="viewProduct.php";
			</script>
			<?php
} 
else
{
//header('Location: ../about.php');
}
?>
