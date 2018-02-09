<?php       
session_start(); 
require("Connect.php");
    $error =false;
  $sql='SELECT * FROM `users` WHERE  NOT userType ="both" AND NOT  userType ="supplier" AND NOT userType ="buyer" AND NOT userType ="Admin" ';
            $result = mysqli_query($connection,$sql);
             echo  $count = mysqli_num_rows($result);
			 $row = mysqli_fetch_array($result);
            if ($count >10) {
                ?>
				<script>
				alert("Account Creations Limit Exceeds");
				window.location.href ="manageEmployees.php";
				</script>
			<?php
                      }
					 

	    $fname = $_POST['firstname'];
		 $lname=$_POST['lastname'];
	
	    $email = $_POST['email'];
	
        $password = $_POST['password'];
	
        $userType=$_POST['role'];
		$countryName=$_POST['countryName'];
		
   if (!$error) {
			  $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($connection,$sql);
              $count = mysqli_num_rows($result);
			 $row = mysqli_fetch_array($result);
            //echo $count;
			
			 if ($count > 0) {
                ?>
				<script>
				alert("Email Already Exit");
		window.location.href ="createaccount.php";
				</script>
				<?php
                      }
					  
			 else {
			$sql = "INSERT INTO users (firstName,lastName,email,password,userType,countryName) VALUES ('$fname', '$lname','$email', '$password','$userType','$countryName')";
		 
		   $stmt = $connection->prepare($sql);
					if($stmt === false) {
						trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
					}
	
		 
		 if($stmt->execute())
			{  
		
			 $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($connection,$sql);
              $count = mysqli_num_rows($result);
			 $row = mysqli_fetch_array($result);
			 $user_id =$row['user_id'];
			  $query = "SELECT * FROM page ";
           $result1 = mysqli_query($connection,$query);
            
			 while($rows = mysqli_fetch_array($result1))
			 {
			 $pageId = $rows['pageId'];
			
			 $sql = "INSERT INTO access (pageId,user_id) VALUES ('$pageId', '$user_id')";
		    
		   $stmt = $connection->prepare($sql);
					if($stmt === false) {
						trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
					}
					$stmt->execute();
					
			}
			 
			?>
			 <script >;
                alert("Registered !");  //not showing an alert box.
		      window.location.href ="manageEmployees.php";
         </script>
		<?php
			
			}
		else
		{
				?>
			 <script >;
                alert("Error in Insertion !");  //not showing an alert box.
		  window.location.href ="createaccount.php";
         </script>
		<?php
			
			}
        }	
		}
	  

		?>