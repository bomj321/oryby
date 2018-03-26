<?php

//url aquispe
define('URL_SITIO', 'http://127.0.0.1/ORYBy/spanish/b2b/');

require 'paypal/autoload.php';

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AfksIxIW8bLOYEoBzMoY16Z3nhPxE3-xhR-rpS-gG9KlFB9xSfNY_QooOOGUVehBhoKn0C-qgwCUetsx',     // ClientID
        'EBNbmZ4ndQL2J1RQKvswFdt5qkaO0VL1w1-mXtwOU3jSYercv00Fc2zmYJ0S4NL0hHVZZ1GJOzoABJZr'      // ClientSecret
    )
);
?>