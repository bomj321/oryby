<?php session_start();
  
include 'Connect.php';

        $pid = $_REQUEST['pid'];
		 $productaction = $_REQUEST['productaction'];
		if($productaction==0)
		{
		   $sql = "UPDATE products SET productaction  ='2'  WHERE pid ='$pid'";
		}
		else if($productaction==1)
		{
		   $sql = "UPDATE products SET productaction  ='2' WHERE pid ='$pid' ";
		}
		else if($productaction==2)
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
			alert("Show Case Changed");
			window.location.href ="suppliers.php";
			</script>
			<?php
			}
			else
			{
			?>
			<script>
			alert("Error In Changing");
			window.location.href ="suppliers.php";
			</script>
			<?php
			}


  

?>