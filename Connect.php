<?php
$currency = '$'; //Currency Character or code

$PayPalMode 			= 'sandbox'; // sandbox or live
$PayPalApiUsername 		= 'mjunaidjunaid786_api1.gmail.com'; //PayPal API Username
$PayPalApiPassword 		= 'P3JL7DARFTCSYJV7'; //Paypal API password
$PayPalApiSignature 	= 'AXk2ddI5aaxDDi4zyd8-1y4hzkd7A7EoQufOL3lVWohWpGlnS4jaTpTN'; //Paypal API Signature
$PayPalCurrencyCode 	= 'USD'; //Paypal Currency Code
$PayPalReturnURL 		= 'http://anitsolutions.com/Projects/b2b/confirmpayment.php'; //Point to paypal-express-checkout page
$PayPalCancelURL 		= 'http://anitsolutions.com/Projects/b2b/checkout.php'; //Cancel URL if user clicks cancel

 //$HandalingCost 		= 0.00;  //Handling cost for the order.
//$InsuranceCost 		= 0.00;  //shipping insurance cost for the order.
//$shipping_cost      = 1.50; //shipping cost
//$ShippinDiscount 	= 0.00; //Shipping discount for this order. Specify this as negative number (eg -1.00)
//$taxes              = array( //List your Taxes percent here.
   //                         'VAT' => 12,
      //                      'Service Tax' => 5
         //                   );




   $connection = mysqli_connect('localhost','root','','adminhtt_btb');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'adminhtt_btb');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
?>
