<?php 
include('Connect.php');
require 'config.php';

if(!isset($_POST ['precio'])):
    header('Location: index.php');
    exit;
endif;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

$precio = htmlspecialchars($_POST['precio']);
session_start();
$email=$_SESSION['uemail'];

$envio = 0;
$total = $precio + $envio;
$date = date('d-m-Y');

//Inserción a las bases de datos
$sql ="INSERT INTO `orders`(`email`, `tota_price`,`orderstatus`) VALUES ('$email','$total','Incomplete')";
$result=mysqli_query($connection,$sql);

//obteniendo el id
$query= "SELECT * FROM orders where email = '$email' ORDER BY order_id DESC LIMIT 1 ";
$queryresult=mysqli_query($connection,$query);
$row=mysqli_fetch_array($queryresult);
$orderid= $row['order_id'];

//Configuración de Paypal
$compra = new Payer();
$compra->setPaymentMethod('paypal');

$item = "SELECT * FROM cart2 WHERE email = '$email'";
$resultado = $connection->query($item);

//Guarda todos los items para enviarlos a paypal
$i= 0;
$arreglo_producto = array();

while ($productos = $resultado->fetch_all(MYSQLI_ASSOC) ) {
    foreach($productos as $producto):
        ${"articulo$i"} = new Item();
        $arreglo_producto[] = ${"articulo$i"};
        ${"articulo$i"}->setName($producto['title'])
              ->setCurrency('USD')
              ->setQuantity($producto['quantity'])
              ->setPrice($producto['price']);
        $i++;
    endforeach;
}

$listaArticulos = new ItemList();
$listaArticulos->setItems( $arreglo_producto );


$detalles = new Details();
$detalles->setShipping($envio)
          ->setSubtotal($precio);


$cantidad = new Amount();
$cantidad->setCurrency('USD')
        ->setTotal($precio)
        ->setDetails($detalles);;

$transaccion = new Transaction();
$transaccion->setAmount($cantidad)
               ->setItemList($listaArticulos)
               ->setDescription('Pago Orybu')
               ->setInvoiceNumber($orderid);

$redireccionar = new RedirectUrls();
$redireccionar->setReturnUrl(URL_SITIO . "/pago_finalizado.php?exito=true&id=$orderid")
              ->setCancelUrl(URL_SITIO . "/pago_finalizado.php?exito=false");

$pago = new Payment();
$pago->setIntent("sale")
     ->setPayer($compra)
     ->setRedirectUrls($redireccionar)
     ->setTransactions(array($transaccion));

try {
    $pago->create($apiContext);
} catch (PayPal\Exception\PayPalConnectionException $pce) {
// Don't spit out errors or use "exit" like this in production code
echo '<pre>';print_r(json_decode($pce->getData()));exit;
}

$aprobado = $pago->getApprovalLink();
header("Location: {$aprobado}");            
?>