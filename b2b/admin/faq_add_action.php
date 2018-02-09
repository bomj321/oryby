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
		    $question = $_POST['question'];// item name
			  $answer = $_POST['answer'];// item name
		  $elementName = $_POST['elementName'];// item name
		
		 
		 $query="INSERT INTO faq(elementName,question,answer) VALUES ('$elementName','$question','$answer')";
			
		$result = $connection->prepare($query);
			if($result === false) {
		trigger_error('Wrong SQL: ' . $query . ' Error: ' . $connection->error, E_USER_ERROR);
	}
	
		

			if($result->execute())
			{
			?>
			  <script >;
                alert("Inserted !");  //not showing an alert box.
		       window.location.href="manageFaq.php";
         </script>
			<?php

			}
	
			else
			{
			?>
			 <script >;
                alert("Error in Insertion !");  //not showing an alert box.
		       window.location.href="manageFaq.php";
         </script>
		<?php	}
		}
	
	?>