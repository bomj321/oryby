<?php

//url aquispe
define('URL_SITIO', 'http://www.orybu.com/spanish/b2b/');

require 'paypal/autoload.php';

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AcNchhTrWFNaBmNRibJKl1rbvp7fNOnJ6g-UGa4w06uuDr889f9XKbYfwgCJ_mWxx2hTKeiJizdHsW2L',     // ClientID
        'EKeTyKfE8-IfBvmqZOkI4ZZJfxBmnS2fOh3rXOky53VVhUWd9wTvWpcvpd9oQPTcxXDAJewYt7MpPh56'      // ClientSecret
    )
);

$apiContext->setConfig(
    array(
        'log.LogEnabled' => true,
        'log.FileName' => 'PayPal.log',
        'log.LogLevel' => 'FINE',
        'mode' => 'live',
    )
);

?>