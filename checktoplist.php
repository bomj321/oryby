<?php session_start();
  
include 'Connect.php';

        $pid = $_REQUEST['pid'];
		 $producttoplist = $_REQUEST['producttoplist'];
		if($producttoplist==0)
		{
		   $sql = "UPDATE products SET producttoplist  ='1'  WHERE pid ='$pid'";
		}
		else if($producttoplist==1)
		{
		   $sql = "UPDATE products SET producttoplist  ='0' WHERE pid ='$pid' ";
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
			alert("Top List Changed");
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