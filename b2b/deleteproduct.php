<?php
session_start();
    require("Connect.php");

  
  $sql="DELETE FROM products WHERE (pid=".$_GET["pid"].")";
    mysqli_query($connection,$sql);
	 $stmt = $connection->prepare($sql);
     if($stmt === false) {
    trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
    }
 
	
			if($stmt->execute())
			{
				?>
                <script>
				alert("Deleted !");
				window.location.href='suppliers.php';
				</script>
                <?php
			}
			else{
		?>
                <script>
				alert("Not Deleted !");
				window.location.href='product.php';
				</script>
                <?php		}
		


$conn->close();		
			
?>