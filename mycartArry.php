<?php session_start();
include('Connect.php');
$pid=$_GET['pid']; 
$email=$_SESSION['uemail'];


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

//Variables
$email = $_SESSION['uemail'];
$pid = $_SESSION['pid'];
$image = $cl[0];
$title = $_SESSION['ntitle'];
$price = $_SESSION['price'];
$description = $_SESSION['fulldesc'];
$orderstatus = 'Incomplete';
//Variables


//INSERT INTO
 $insert2 = "INSERT INTO cart2(pid,image,title,price,description,email,orderstatus) VALUES(".$pid.", '".$image."','".$title."', ".$price.", '".$description."','".$email."','".$orderstatus."');";
         $resultado3 = $connection->query($insert2);

         if(!$resultado3){
            echo "NO INSERTO NADA";
           }

//INSERT INTO

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