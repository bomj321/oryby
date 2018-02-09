<?php
session_start();
 if (!($_SESSION["loggedin"])) {
        header("Location: login.php?status=Unauthorized Access Attempt!");
    }

    if($_SESSION["loggedin"]=="F")
    {
    	   header("Location: login.php?status=Unauthorized Access Attempt!");
   
    }
include('Connect.php');

if(isset($_POST['save']))
	{
	   /////////////////////////////
		    $pageName = $_POST['pageName'];// item name
			   $pageLink = $_POST['pageLink'];// item name
		
		
		 
		 $query="INSERT INTO page(pageName,pageLink) VALUES ('$pageName','$pageLink')";
			
		$result = $connection->prepare($query);
			if($result === false) {
		trigger_error('Wrong SQL: ' . $query . ' Error: ' . $connection->error, E_USER_ERROR);
	}
	
		

			if($result->execute())
			{
			?>
			  <script >;
                alert("Inserted !");  //not showing an alert box.
		       window.location.href="managePage.php";
         </script>
			<?php

			}
	
			else
			{
			?>
			 <script >;
                alert("Error in Insertion !");  //not showing an alert box.
		       window.location.href="manageCategories.php";
         </script>
		<?php	}
		}
	
	?>