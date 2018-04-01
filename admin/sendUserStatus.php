<?php 
session_start();
include('Connect.php');
$errors = '';
 $userStatus = $_GET['userstatus'];
 $email = $_GET['email'];
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
  
     
    if(empty($userStatus))
    {
      $status = "De-Activated";

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
              Your user has been desactivated please contact the administrator for more information. 
              </p>
               <p>
              Su usuario ha sido desactivado por favor contacta con el administrador para mas informacion.
              </p>

              

            </body>
        </html>   
      
    ";
    
    mail($email,"MY ORYBU-Account Desactivated",$message,$cabeceras);  
      
    echo "<script>
                alert('The email has been sent');
                window.location= 'manageSupplier.php'
        </script>";
    }




    else 
    {
      $status = "Activated";
      $message =
    "
    
    <html>
            <head>
              <title>Email Confirmation</title>
              
            </head>
            <body>
            <div style='margin-left:21.875em;'>
            <img style='width:12.5em; height:6.25em;' src='http://www.orybu.com/img/oryLogo.png'>
            </div>
               <p>
      Your user has been activated congratulations, now you can make use of our platform.              
        </p>
               <p>
              Su usuario ha sido activado felicitaciones, ahora puede hacer uso de nuestra plataforma.
              </p>

              

            </body>
        </html>   
      
    ";
    
    mail($email,"MY ORYBU-Account Activated",$message,$cabeceras);  
      
    echo "<script>
                alert('The email has been sent');
                window.location= 'manageSupplier.php'
        </script>";
    }


 ?>