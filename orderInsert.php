<?php session_start();
error_reporting(0);
include("Connect.php");
$error=false;
$email=$_SESSION['uemail'];
$subtotal = $_SESSION['toatl'];
//$GrandTotal=$_SESSION['grandtotal'];



if (!$error)
{
$sql ="INSERT INTO `orders`(`email`, `tota_price`,`orderstatus`) VALUES ('$email','$subtotal','Incomplete')";
$result=mysqli_query($connection,$sql);




}


$query= "SELECT * FROM orders where email = '$email' ORDER BY order_id DESC LIMIT 1 ";
$queryresult=mysqli_query($connection,$query);

$row=mysqli_fetch_array($queryresult);
$orderid= $row['order_id'];
$date = date('d-m-Y');

foreach ($_SESSION['cart'] as $cartitem)
{	

$productcode =$cartitem['pid']; 
$productquantity=$cartitem['p_qty'];
$queryorderdetail= "INSERT INTO  orderDetail (order_id,pid,orderdate,orderquantity) VALUES ('$orderid','$productcode','$date','$productquantity')";
$result=mysqli_query($connection,$queryorderdetail);

}


?>
<script>
window.location.href="paypal-express-checkout/index.php";
</script>