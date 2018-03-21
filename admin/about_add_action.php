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
		    $hreflink = $_POST['hreflink'];// item name
		    $titlemission = $_POST['titlemission'];// item name
		    $descriptionmission = $_POST['descriptionmission'];// item name
		    $subtitlemission = $_POST['subtitlemission'];// item name
		    $subtitles = $_POST['subtitles'];// item name

			$target_dir = "../images/";
	
		 		$target_file = $target_dir . basename($_FILES["file1"]["name"]);
				$image=$_FILES['file1']['name'];
			$filelocation = $target_dir.$image;
        $temp = $_FILES['file1']['tmp_name'];
		 move_uploaded_file($temp, $filelocation);

		 
		 $query="INSERT INTO aboutus(elementname,title,picture,hreflink,description,titlemission,descriptionmission,subtitlemission,subtitles) VALUES ('$elementname','$title','$image','$hreflink','$description','$titlemission','$descriptionmission','$subtitlemission','$subtitles')";
			
		$result = $connection->prepare($query);
			if($result === false) {
		trigger_error('Wrong SQL: ' . $query . ' Error: ' . $connection->error, E_USER_ERROR);
	}
	
		

			if($result->execute())
			{
			?>
			  <script >;
                alert("Inserted !");  //not showing an alert box.
		       window.location.href="manageAboutus.php";
         </script>
			<?php

			}
	
			else
			{
			?>
			 <script >;
                alert("Error in Insertion !");  //not showing an alert box.
		       window.location.href="manageAboutus.php";
         </script>
		<?php	}
		}
	
	?>