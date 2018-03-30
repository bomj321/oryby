<?php 
include 'Connect.php'; 

$accept = $_GET['accept'];
$email = $_GET['email'];
$productType = $_GET['type'];
$pid = $_GET['pid'];
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
if ($accept == 'yes') {	

	//ACTUALIZACION 1

	$sql3 = "UPDATE products SET productType='$productType' WHERE pid='$pid'";
        if(!mysqli_query($connection, $sql3)){
    echo "ERROR: Could not able to execute $sql3. " . mysqli_error($connection);     
}

	//ACTUALIZACION 2

 $sql = "UPDATE products SET productType2=' ' WHERE pid='$pid'";
        if(!mysqli_query($connection, $sql)){
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);

}

	//SEND EMAIL
	
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
              <p>Congratulations, your product has been accepted. 
              </p>

              

            </body>
        </html>   		
		";
		
		mail($email,"MY ORYBU",$message,$cabeceras);	
			
		echo "<script>
                alert('This Product has been accepted');
                window.location= 'acceptProduct.php'
        </script>";

}elseif ($accept == 'no') {

	//ACTUALIZACION 1
	$sql4 = "UPDATE products SET productType2=' ' WHERE pid='$pid'";
        if(!mysqli_query($connection, $sql4)){
    echo "ERROR: Could not able to execute $sql4. " . mysqli_error($connection);
        
}

	//SEND EMAIL
	
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
              <p>		Sorry, your product has no been accepted. </p>
            </body>
        </html>  
		";
		
		mail($email,"MY ORYBU",$message,$cabeceras);	
			
		echo "<script>
                alert('This product has no been accepted');
                window.location= 'acceptProduct.php'
        </script>";


}




mysqli_close($connection);
 ?>