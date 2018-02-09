<?php session_start();
 if (!($_SESSION["loggedin"])) {
        header("Location: login.php?status=Unauthorized Access Attempt!");
    }

    if($_SESSION["loggedin"]=="F")
    {
    	   header("Location: login.php?status=Unauthorized Access Attempt!");
   
    }
include 'Connect.php';

        $pid = $_REQUEST['pid'];
		 $productaction = $_REQUEST['productaction'];
		if($productaction==0)
		{
		   $sql = "UPDATE products SET productaction  ='1'  WHERE pid ='$pid'";
		}
		else if($productaction==1)
		{
		   $sql = "UPDATE products SET productaction  ='0' WHERE pid ='$pid' ";
		}
     
 	 mysqli_query($connection,$sql);
	 $stmt = $connection->prepare($sql);
     if($stmt === false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
 
	
			if($stmt->execute())
			{
			?>
			<script>
			alert("Product STATUS CHANGED");
			window.location.href ="viewProduct.php";
			</script>
			<?php
			}
			else
			{
			?>
			<script>
			alert("Error In Changing");
			window.location.href ="viewProduct.php";
			</script>
			<?php
			}


  

?>