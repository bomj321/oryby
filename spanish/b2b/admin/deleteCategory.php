<?php session_start();
 if (!($_SESSION["loggedin"])) {
        header("Location: login.php?status=Unauthorized Access Attempt!");
    }

    if($_SESSION["loggedin"]=="F")
    {
    	   header("Location: login.php?status=Unauthorized Access Attempt!");
   
    }
    require("Connect.php");

 
  
  $sql="DELETE FROM categories WHERE (catid=".$_GET["catid"].")";
    mysqli_query($connection,$sql);
	 $stmt = $connection->prepare($sql);
     if($stmt === false) {
    trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
    }
 
	
			if($stmt->execute())
			{
		 $sqll="DELETE FROM subcategories WHERE (catid=".$_GET["catid"].")";
			mysqli_query($connection,$sqll);
	 $stmt = $connection->prepare($sqll);
     if($stmt === false) {
    trigger_error('Wrong SQL: ' . $sqll . ' Error: ' . $connection->error, E_USER_ERROR);
    }
	$stmt->execute();
				?>
				
                <script>
				window.location.href='manageCategories.php';
				</script>
                <?php
			}
			else{
		?>
                <script>
				window.location.href='manageCategories.php';
				</script>
                <?php		}
		


$conn->close();		
			
?>