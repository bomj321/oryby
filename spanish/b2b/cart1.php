<?php
session_start();
include('Connect.php');
if(isset($_POST['btn_save_updates']))
	{

	
    $pid=$_GET['pid'];
    $price=$_GET['price'];
    $qty=$_POST['qty'];

//UPDATE 1
 $sql3 = "UPDATE cart2 SET quantity='$qty' WHERE id = '$pid'";
        if(!mysqli_query($connection, $sql3)){
    echo "ERROR: Could not able to execute $sql3. " . mysqli_error($connection);
        
}

//UPDATE 1
$total_price = $price * $qty;

//UPDATE 2
 $sql3 = "UPDATE cart2 SET totalprice='$total_price' WHERE id = '$pid'";
        if(!mysqli_query($connection, $sql3)){
    echo "ERROR: Could not able to execute $sql3. " . mysqli_error($connection);
        
}

//UPDATE 2

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

?>
<script>
window.location.href="cart.php";  </script>
<?php


}

?>
