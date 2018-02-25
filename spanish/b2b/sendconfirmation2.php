
<?php session_start();
include('Connect.php');
$email= $_SESSION['confemail'];
$confirmcode=$_SESSION['code'];
$userStatus = $_GET['userStatus'];
// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Cabeceras adicionales
$cabeceras .= 'From:< info@orybu.com>' . "\r\n";
if (isset($userStatus)) {
	$message =
		"
		
		<html>
            <head>
              <title>Confirmacion de Email</title>
              
            </head>
            <body'>
            <img style='width:300px; height:200px;' src='http://www.orybu.com/freelancer/img/oryLogo.png'>
              <p>
                <a href='http://www.orybu.com/freelancer/emailconfirm.php?email=$email&code=$confirmcode&userStatus=1'> Click Here</a>	
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
            <img style='width:300px; height:200px; ' src='http://www.orybu.com/freelancer/img/oryLogo.png'>
              <p>
                Confirm Your Email
		        <a href='http://www.orybu.com/freelancer/emailconfirm.php?email=$email&code=$confirmcode'>  Click Here</a>

	
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









