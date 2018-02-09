<?php session_start();
 if (!($_SESSION["loggedin"])) {
        header("Location: login.php?status=Unauthorized Access Attempt!");
    }

    if($_SESSION["loggedin"]=="F")
    {
    	   header("Location: login.php?status=Unauthorized Access Attempt!");
   
    }
    require("Connect.php");

 
  
  $sql="DELETE FROM aboutus WHERE (id=".$_GET["aboutid"].")";
    mysqli_query($connection,$sql);
	 $stmt = $connection->prepare($sql);
     if($stmt === false) {
    trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
    }
 
	
			if($stmt->execute())
			{
		?>        <script>
				window.location.href='manageAboutus.php';
				</script>
                <?php
			}
			else{
		?>
                <script>
				window.location.href='manageAboutus.php';
				</script>
                <?php		}
		


$conn->close();		
			
?>