<?php session_start();
 if (!($_SESSION["loggedin"])) {
        header("Location: login.php?status=Unauthorized Access Attempt!");
    }

    if($_SESSION["loggedin"]=="F")
    {
    	   header("Location: login.php?status=Unauthorized Access Attempt!");
   
    }
include 'Connect.php';
  $email = $_REQUEST['email'];
	  
        echo $pid = $_REQUEST['pid'];
		 $productstatus = $_REQUEST['productstatus'];
		if($productstatus==0)
		{
		   $sql = "UPDATE products SET productstatus  ='1'  WHERE pid ='$pid'";
		}
		else if($productstatus==1)
		{
		   $sql = "UPDATE products SET productstatus  ='0' WHERE pid ='$pid' ";
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
			window.location.href ="sendProductStatus.php?email=<?php echo $email ?> & productstatus=<?php echo $productstatus?>";
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