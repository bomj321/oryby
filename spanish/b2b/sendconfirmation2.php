
<?php session_start();
include('Connect.php');
$email= $_SESSION['confemail'];
$confirmcode=$_SESSION['code'];
$userStatus = $_GET['userStatus'];
/// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= "Organization: Orybu.com\r\n";
$cabeceras .= "X-Priority: 3\r\n";
$cabeceras .= "X-Mailer: PHP". phpversion(7.0) ."\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Cabeceras adicionales
$cabeceras .= 'From:<admin@orybu.com>' . "\r\n";
$cabeceras .= "Reply-To: <admin@orybu.com>\r\n";
$cabeceras .= "Return-Path: <admin@orybu.com>\r\n";
if (isset($userStatus)) {
	$message =
		"
		
		<html>
            <head>
              <title>Confirmacion de Email</title>
              
            </head>
            <body>
            <div style='margin-left:400px;'>
            <img style='width:200px; height:100px;' src='http://www.orybu.com/freelancer/img/oryLogo.png'>
            </div>
             <p>Thank you for registering, please confirm your email by <a href='http://www.orybu.com/freelancer/emailconfirm.php?email=$email&code=$confirmcode&userStatus=1'> clicking here</a>. 
              </p>

              <p>Gracias por registrarte, porfavor confirma tu email haciendo <a href='http://www.orybu.com/freelancer/emailconfirm.php?email=$email&code=$confirmcode&userStatus=1'>click aqui</a>.  
              </p>
            </body>
        </html>		
			
		";
		
		mail($email,"MY ORYBU",$message,$cabeceras);	
			
		echo "<script>
                alert('Registro Completo! Por favor confirma tu email');
                window.location= 'index.php'
        </script>";


}else{
	$message =
		"

	<html>
            <head>
              <title>Confirmacion de Email</title>
              
            </head>
            <body>
             <div style='margin-left:400px;'>
            <img style='width:200px; height:100px;' src='http://www.orybu.com/freelancer/img/oryLogo.png'>
            </div>
             <p>
                Thank you for registering, please confirm your email by<a href='http://www.orybu.com/freelancer/emailconfirm.php?email=$email&code=$confirmcode'>clicking here</a>.
              </p>

              <p>Gracias por registrarte, porfavor confirma tu email haciendo <a href='http://www.orybu.com/freelancer/emailconfirm.php?email=$email&code=$confirmcode&userStatus=1'> click aqui</a>.
              </p>
            </body>
        </html>			
		";
		
		mail($email,"MY ORYBU",$message,$cabeceras);	
			
		echo "<script>
                alert('Registro Completo!. Por favor Confirma tu email');
                window.location= 'index.php'
        </script>";
}

?>









