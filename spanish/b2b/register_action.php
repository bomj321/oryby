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
		/*if (!preg_match("|^[0-9]{11,15}$|",$phone)) {
            $error = true;
				$phone_error="PhoneNumber can only have numeric characters ";
			echo "<script type='text/javascript'>alert('$phone_error');</script>";
        
        }
		
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $error = true;
			$email_error= "email in not proper format";
			echo "$email_error";
        }
        if(strlen($password) < 6) {
             $error = true;
			 $password_error = "minimum 6 digits needed ";
			 echo "$password_error";
       }
        if($password != $cpassword) {
            $error = true;
            $cpassword_error = "Password and Confirm Password doesn't match";
        echo "$cpassword_error";
		}
       */ 
        
        
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
				header('Location:sendconfirmation2.php?userStatus=1');
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