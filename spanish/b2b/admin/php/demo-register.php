<?php
include '../Connect.php';

if( isset($_POST['submit']) )
{

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
				window.location.href ="register.php";
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
		
				$key = $fname . $email . date('mY');
                $keyd = md5($key);
				$_SESSION['mykey']=$keyd;
			$keyquery="INSERT INTO confirm (email,keyd) VALUES('$email','$keyd')";
			mysqli_query($connection,$keyquery);
			header('Location:sendconfirmation.php');
			if($userType == 'supplier' OR $userType =='both')
			{
			?>
			<script>
			alert("Add Company Information!");
			window.location.href ="registerSupplier.php?email='<?php echo $email; ?>'";
			</script>
		<?php
				
			}
			else
			{
			?>
			
		<?php
				
			}
				
		
            
			}
		else
		{
				?>
			 <script >;
                alert("Error in Insertion !");  //not showing an alert box.
		       window.location.href="register.php";
         </script>
		<?php
			
			}
        }	
		}
	  
		}
		?>