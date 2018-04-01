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
	 $message =
    "
    <html>
            <head>
              <title>User Status</title>
              
            </head>
            <body>
            <div style='margin-left:21.875em;'>
            <img style='width:12.5em; height:6.25em;' src='http://www.orybu.com/img/oryLogo.png'>
            </div>
              <p>
             Thanx for Contact us Please do not reply to this mail.
              </p>
               

              

            </body>
        </html>   
      
    ";
	 
	?>
	</br>
	<?php
   	$email_body = "You have received a new message. ".
	" Here are the details:\n You Product : $name   \n $message"; 
	$email_body=wordwrap($email_body, 70);
	$emailfrom=$_SESSION["email"];
	

	
	// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= "Organization: Orybu.com\r\n";
$cabeceras .= "X-Priority: 3\r\n";
$cabeceras .= "X-Mailer: PHP". phpversion(7.0) ."\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Cabeceras adicionales
$cabeceras .= 'From:<admin@orybu.com>' . "\r\n";
$cabeceras .= "Reply-To: <admin@orybu.com>\r\n";
$cabeceras .= "Return-Path: <admin@orybu.com>\r\n";	
	
	?>
	</br>
	<?php
?>
	</br>
	<?php
	 $result =mail($to,$email_subject,$email_body,$cabeceras);
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
