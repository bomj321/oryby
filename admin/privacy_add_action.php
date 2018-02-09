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
		    $title = $_POST['title'];// item name
		    $description = $_POST['description'];// item name
			 $elementname = $_POST['elementname'];// item name
		    $point1 = $_POST['point1'];
			$point2 = $_POST['point2'];
			$point3 = $_POST['point3'];
			$point4 = $_POST['point4'];
			$point5 = $_POST['point5'];
			$point6 = $_POST['point6'];

		 
		 $query="INSERT INTO aboutus(elementname,title,description,point1,point2,point3,point4,point5,point6) VALUES ('$elementname','$title','$description','$point1','$point2','$point3','$point4','$point5','$point6')";
			
		$result = $connection->prepare($query);
			if($result === false) {
		trigger_error('Wrong SQL: ' . $query . ' Error: ' . $connection->error, E_USER_ERROR);
	}
	
		

			if($result->execute())
			{
			?>
			  <script >;
                alert("Inserted !");  //not showing an alert box.
		       window.location.href="managePrivacyPolicy.php";
         </script>
			<?php

			}
	
			else
			{
			?>
			 <script >;
                alert("Error in Insertion !");  //not showing an alert box.
		       window.location.href="managePrivacyPolicy.php";
         </script>
		<?php	}
		}
	
	?>