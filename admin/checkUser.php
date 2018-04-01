<?php session_start();
 if (!($_SESSION["loggedin"])) {
        header("Location: login.php?status=Unauthorized Access Attempt!");
    }

    if($_SESSION["loggedin"]=="F")
    {
    	   header("Location: login.php?status=Unauthorized Access Attempt!");
   
    }
include 'Connect.php';


      $user_id = $_GET['user_id'];
	  
		 $userStatus = $_GET['userStatus'];
		  $email = $_GET['email'];
		 
		 
		 
		if($userStatus==0)
		{
		$userStatus='1';
		   $sql = "UPDATE users SET userStatus  ='1'  WHERE user_id ='$user_id'";
		}
		else if($userStatus==1)
		{
		$userStatus=' ';
		   $sql = "UPDATE users SET userStatus  ='0' WHERE user_id ='$user_id' ";
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
			alert("USER STATUS CHANGED");
			window.location.href ="sendUserStatus.php?email=<?php echo $email ?>&userstatus=<?php echo $userStatus?>";
			</script>
			<?php
			}
			else
			{
			?>
			<script>
			alert("ERROR !");
			window.location.href ="manageSupplier.php";
			</script>
			<?php
			}


  

?>