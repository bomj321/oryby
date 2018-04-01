<?php session_start();
include('Connect.php');
$errors = '';
$id =$_REQUEST['id'];
$userType = $_REQUEST['userType'];
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
$sqlconfirm="SELECT * FROM users WHERE user_id= '$id'";
$resultconfirm=mysqli_query($connection,$sqlconfirm);
 if($resultconfirm == false) { 
 trigger_error('Wrong SQL: ' . $sqlconfirm. ' Error: ' . $connection->error, E_USER_ERROR); 
 } /* Bind parameters. Types: s=string, i=integer, d=double,  b=blob */ 

$nrconfirm= mysqli_num_rows($resultconfirm);
$rowconfirm =mysqli_fetch_array($resultconfirm);
 $key = $rowconfirm['confirmcode'];
 $email = $rowconfirm['email']; //$_REQUEST['email'];	 

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

//LINK DE ENVIO
if ($userType =='buyer') {
  
$link=$hreflink.'?email='.$email.'&code='.$key.'&userStatus=1';	 
echo "<script>
                alert('$link');
                
        </script>";

if(empty($errors))
{
	 $message =
		"
		
		<html>
            <head>
              <title>Confirmacion de Email</title>
              
            </head>
            <body>
            <div style='margin-left:21.875em;'>
            <img style='width:12.5em; height:6.25em;' src='http://www.orybu.com/img/oryLogo.png'>
            </div>
             <p>Thank you for registering, please confirm your email by <a href='$link'> clicking here</a>. 
              </p>

              <p>Gracias por registrarte, porfavor confirma tu email haciendo <a href='$link'> click aqui</a>.  
              </p>
            </body>
        </html>		
			
		";
	?>
	
	<?php
	 $result =mail($email,"Resend Account Confirmation-MY ORYBU",$message,$cabeceras);
	 	if(!$result) {   
     echo "<script>
                alert('The email has not been sent, please contact with the Support');
                window.location= 'resendEmail.php'
        </script>";   
} else {
          echo "<script>
                alert('The email has been sent');
                window.location= 'resendEmail.php'
        </script>";   

}
	
	?>
						<?php
} 
else
{
echo "<script>
                alert('The email has not been sent, a fatal error has occurred');
                window.location= 'resendEmail.php'
        </script>"; 
}
} 
//SI NO ES BUYER HAZME ESTO
else
{
$link2=$hreflink.'?email='.$email.'&code='.$key;  
echo "<script>
                alert('$link2');
                
        </script>";

if(empty($errors))
{
   $message =
    "
    
    <html>
            <head>
              <title>Confirmacion de Email</title>
              
            </head>
            <body>
            <div style='margin-left:21.875em;'>
            <img style='width:12.5em; height:6.25em;' src='http://www.orybu.com/img/oryLogo.png'>
            </div>
             <p>Thank you for registering, please confirm your email by <a href='$link2'> clicking here</a>. 
              </p>

              <p>Gracias por registrarte, porfavor confirma tu email haciendo <a href='$link2'> click aqui</a>.  
              </p>
            </body>
        </html>   
      
    ";
  ?>
  
  <?php
   $result =mail($email,"Resend Account Confirmation-MY ORYBU",$message,$cabeceras);
    if(!$result) {   
     echo "<script>
                alert('The email has not been sent, please contact with the Support');
                window.location= 'resendEmail.php'
        </script>";   
} else {
          echo "<script>
                alert('The email has been sent');
                window.location= 'resendEmail.php'
        </script>";   

}
  
  ?>
            <?php
} 
else
{
echo "<script>
                alert('The email has not been sent, a fatal error has occurred');
                window.location= 'resendEmail.php'
        </script>"; 
}


}
?>

