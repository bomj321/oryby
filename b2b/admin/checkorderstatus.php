<?php session_start();
 if (!($_SESSION["loggedin"])) {
        header("Location: login.php?status=Unauthorized Access Attempt!");
    }

    if($_SESSION["loggedin"]=="F")
    {
    	   header("Location: login.php?status=Unauthorized Access Attempt!");
   
    }
include 'Connect.php';
 $order_id=$_POST['order_id'];
$domain_name = $_POST['catid'];
 $sql="Update orders SET orderstatus='".$domain_name."' WHERE order_id='$order_id'";
				$result=mysqli_query($connection,$sql);
						
					?>
					  <script>
window.location.href="manageOrder.php";
					  </script>
					  ?>
			