<?php
session_start();
include('Connect.php');
if(isset($_POST['btn_save_updates']))
	{
	 $item=$_POST['item'];

	while (list ($key1,$val1) = @each ($item)) {
			unset($_SESSION['cart'][$val1]);
		}


	  $pid=$_GET['pid'];
	 $qty=$_POST['qty'];
	 

 $query="SELECT * from products where pid=$pid";
$res=mysqli_query($connection,$query);
$row=mysqli_fetch_array($res);
$myString = $row['image'];
$cl = explode(',', $myString);
 //$row['price'];
 //$row['ntitle'];
 $_SESSION['pid']=$pid;
 
 $_SESSION['image']=$cl[0];
 $_SESSION['qty'] =$qty;
 $_SESSION['ntitle']=$row['ntitle']; 
 $_SESSION['price']=$row['price'];
 $_SESSION['fulldesc']=$row['fulldescription'];
 
$cart = array (
    'pid'  =>$_SESSION['pid'],
    'p_image' => $_SESSION['image'],
    'p_title' => $_SESSION['ntitle'],
	'p_fulldesc' => $_SESSION['fulldesc'],
	'p_price' => $_SESSION['price'],
	'p_qty' => $_SESSION['qty']
);
 $item=$_POST['item'];
	while (list ($key1,$val1) = @each ($item)) {


$_SESSION['cart'][$val]=$cart;
?>
<script> 
window.location.href="cart.php";  </script>
<?php
}

}
  
?>