<?php

//url aquispe
define('URL_SITIO', '');

require 'paypal/autoload.php';

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        '',     // ClientID
        ''      // ClientSecret
    )
);



$connection = mysqli_connect('localhost', 'root', '','joryan_adminhtt_btb');
  
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'joryan_adminhtt_btb');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
    
}


?>