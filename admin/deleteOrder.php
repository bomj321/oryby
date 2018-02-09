<?php session_start();
 if (!($_SESSION["loggedin"])) {
        header("Location: login.php?status=Unauthorized Access Attempt!");
    }

    if($_SESSION["loggedin"]=="F")
    {
    	   header("Location: login.php?status=Unauthorized Access Attempt!");
   
    }
    require("Connect.php");

 
  
  $sql="DELETE FROM orders WHERE (order_id=".$_GET["order_id"].")";
    mysqli_query($connection,$sql);
	 $stmt = $connection->prepare($sql);
     if($stmt === false) {
    trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
    }
 
	
			if($stmt->execute())
			{
		?>        <script>
				window.location.href='manageOrder.php';
				</script>
                <?php
			}
			else{
		?>
                <script>
				window.location.href='manageOrder.php';
				</script>
                <?php		}
		


$conn->close();		
			
?>