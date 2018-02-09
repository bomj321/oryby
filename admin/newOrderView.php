<?php
 include('Connect.php');
$orderAlert = '1';
 $sql="UPDATE orders  SET orderAlert='".$orderAlert."'";
 mysqli_query($connection,$sql);
	 $stmt = $connection->prepare($sql);
     if($stmt === false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
	if($stmt->execute())
			{
				?>
                <script>
			
		window.location.href="manageOrder.php";
				</script>
                <?php
			}
			else{
			
				}
		
	
 ?>