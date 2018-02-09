<?php
 include('Connect.php');
$productAlert = '1';
 $sql="UPDATE products  SET productAlert='".$productAlert."'";
 mysqli_query($connection,$sql);
	 $stmt = $connection->prepare($sql);
     if($stmt === false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
	if($stmt->execute())
			{
				?>
                <script>
			
		window.location.href="viewProduct.php";
				</script>
                <?php
			}
			else{
			
				}
		
	
 ?>