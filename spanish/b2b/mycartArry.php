<?php session_start();
include('Connect.php');
$pid=$_GET['pid']; 


$_SESSION['pid']=$pid;

$query="SELECT * from products where pid=$pid";
$res=mysqli_query($connection,$query);
$row=mysqli_fetch_array($res);
$myString = $row['image'];
$cl = explode(',', $myString);
$_SESSION['pid']=$pid; 
$_SESSION['image']=$cl[0];

$_SESSION['ntitle']=$row['ntitle']; 
$_SESSION['price']=$row['price'];
$_SESSION['fulldesc']=$row['fulldescription'];

$cart = array (
'pid'  =>$_SESSION['pid'],
'p_image' => $_SESSION['image'],
'p_title' => $_SESSION['ntitle'],
'p_fulldesc' => $_SESSION['fulldesc'],
'p_price' => $_SESSION['price']
);

$_SESSION['cart'][] = $cart;

?>
<script> 
window.location.href="index.php";  </script>