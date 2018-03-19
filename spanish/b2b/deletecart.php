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




$aside1 = "DELETE  FROM cart2 WHERE pid ='$pid' AND email='$email'";
$asideres1 = $connection->query($aside1);

if ($connection->query($aside1) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $connection->error;
}
echo "<script>
                window.location= 'cart.php'
        </script>";



   mysqli_close($connection);


 ?>