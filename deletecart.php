<?php 
session_start();
if(!isset($_SESSION['user_id']))
{
  echo "<script>
                alert('Please Log In!!!');
                window.location= 'singlelogin.php'
        </script>";
}

include('Connect.php');
$pid = $_GET['pid'];
$email=$_SESSION['uemail'];




$aside1 = "DELETE FROM cart2 WHERE id ='$pid' AND email='$email'";
$asideres1 = $connection->query($aside1);

echo "<script>
                window.location= 'cart.php'
        </script>";

mysqli_close($connection);
?>