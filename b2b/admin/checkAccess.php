<?php session_start();
 if (!($_SESSION["loggedin"])) {
        header("Location: login.php?status=Unauthorized Access Attempt!");
    }

    if($_SESSION["loggedin"]=="F")
    {
    	   header("Location: login.php?status=Unauthorized Access Attempt!");
   
    }
include 'Connect.php';


      $user_id = $_REQUEST['user_id'];
	  
		 $userStatus = $_REQUEST['userStatus'];
		  $pageId = $_REQUEST['pageId'];
		 
		 
		 
		if($userStatus==0)
		{
		$userStatus='1';
		   $sql = "UPDATE access SET status  ='1'  WHERE user_id ='$user_id'  AND pageId ='$pageId'";
		}
		else if($userStatus==1)
		{
		$userStatus='0';
		   $sql = "UPDATE access SET status  ='0' WHERE user_id ='$user_id' AND pageId ='$pageId'";
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
			alert("Access Control Changed");
			window.location.href ="manageAccess.php";
			</script>
			<?php
			}
			else
			{
			?>
			<script>
			alert("ERROR !");
				window.location.href ="manageAccess.php";
			</script>
			<?php
			}


  

?>