<?php session_start();
error_reporting(0);
include 'Connect.php';

    $error =false;

    if (isset($_POST['register-submit'])) {
	    $fname = $_POST['fname'];
		$lname=$_POST['lname'];
	
	    $email = $_POST['email'];
		$_SESSION['confemail']=$email;
        $password = $_POST['password'];
	    $confirmcode = rand();
		$_SESSION['code']= $confirmcode;
      	$userType=$_POST['role'];
		$countryName=$_POST['countryName'];
		
		if (!preg_match("|^[a-zA-Z ]{3,25}$|",$fname)) {
            $error = true;
			$fname_error="Name must contain only alphabets and space";
			    echo "<script type='text/javascript'>alert('$fname_error');</script>";
			//header('Location: register.php');
       
      }
		if (!preg_match("|^[a-zA-Z ]{3,25}$|",$lname)) {
            $error = true;
				$lname_error="Name must contain only alphabets and space";
		echo "<script type='text/javascript'>alert('$lname_error');</script>";
			?>
			<script>
			window.location.href="register.php";
			</script>
			<?php
				
        
        }	
      
        
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

			 	
			$sql = "INSERT INTO users (id_membership,firstName,lastName,email,password,userType,countryName,confirmed,confirmcode) VALUES ('1','$fname', '$lname','$email', '$password','$userType','$countryName', '0', $confirmcode)";
		 
		   $stmt = $connection->prepare($sql);
					if($stmt === false) {
						trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
					}
	
		 
		 if($stmt->execute())
			{  
			
			// Insert into membership table////////////
			
			 $price ="$0";
	    	$date =  date('Y-m-d');// item name
			$enddate =  date('Y-m-d', strtotime("+30 days"));;// item name
			$title ="Free Membership";
				
		 $querymem="INSERT INTO membership(membershiptype,startdate,enddate,price,email) VALUES ('$title','$date','$enddate','$price','$email')";
			
		$resultmem = $connection->prepare($querymem);
			if($result === false) {
		trigger_error('Wrong SQL: ' . $querymem . ' Error: ' . $connection->error, E_USER_ERROR);
	}
	
		

			$resultmem->execute();
			
			/////////////////////////////////////////////////////
		
				$key = $fname . $email . date('mY');
                $keyd = md5($key);
				$_SESSION['mykey']=$keyd;
			$keyquery="INSERT INTO confirm (email,keyd) VALUES('$email','$keyd')";
			mysqli_query($connection,$keyquery);
			if($userType == 'buyer')
			{
				$q ="INSERT INTO seller(email,limitTopList,limitShowCase) VALUES ('$email','7','5')";
				$qryresult=mysqli_query($connection,$q);
				if (!$qryresult) {
					echo "

					<script>
						alert('NO INSERTO NADA');
					</script>
					";
				}
				header('Location:sendconfirmation2.php');
			}
			if($userType == 'supplier' OR $userType =='both')
			{

				$q2 ="INSERT INTO seller(email,limitTopList,limitShowCase) VALUES ('$email','7','5')";
				$qryresult2=mysqli_query($connection,$q2);
				if (!$qryresult2) {
					echo "

					<script>
						alert('NO INSERTO NADA');
					</script>
					";
				}
			?>
			<script>
			alert("Add Company Information!");
			window.location.href ="registerSupplier.php?email=<?php echo $email; ?>";
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