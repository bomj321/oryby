<?php
 include('Connect.php');
$userAlert = '1';
 $sql="UPDATE products  SET userAlert='".$userAlert."'";
 mysqli_query($connection,$sql);
	 $stmt = $connection->prepare($sql);
     if($stmt === false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
	if($stmt->execute())
			{
				?>
                <script>
			
		window.location.href="manageSupplier.php";
				</script>
                <?php
			}
			else{
			
				}
		
	
 ?>