<?php
session_start();
include('Connect.php');
 $email=$_SESSION['uemail'];
?>
<?php
 $sql="SELECT * FROM users Where email='$email'";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);    
$row=$stmt->fetch_assoc();
 $userId=$row['user_id'];

if(isset($_POST['save']))
	{
	   /////////////////////////////
		   
		   $buyerRequestID =$_POST['buyerRequestId']; 
		   
		    $buyerEmail =$_POST['buyerName']; 
			    $supplierEmail =$email;
				$productName =$_POST['productName']; 
				$productPrice =$_POST['productPrice']; 
				$supplierAnswer =$_POST['supplierAnswer']; 
			$dateTime =date("Y-m-d H:i:s");				
			$target_dir = "images/";
	
		 		$target_file = $target_dir . basename($_FILES["file1"]["name"]);
				$image=$_FILES['file1']['name'];
			$filelocation = $target_dir.$image;
        $temp = $_FILES['file1']['tmp_name'];
		 move_uploaded_file($temp, $filelocation);

		 
		$sql ="INSERT INTO supplierqoutes(buyerRequestID, buyerEmail ,supplierEmail, productName,productPrice, productImage,supplierAnswer,dateTime) VALUES ('$buyerRequestID', '$buyerEmail', '$supplierEmail', '$productName', '$productPrice', '$image', '$supplierAnswer', '$dateTime')";
			
		$result = $connection->prepare($sql);
			if($result === false) {
		trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
	}
	
		

			if($result->execute())
			{
			?>
			  <script >;
                alert("Inserted !");  //not showing an alert box.
		       window.location.href="check.php";
         </script>
			<?php

			}
	
			else
			{
			?>
			 <script >;
                alert("Error in Insertion !");  //not showing an alert box.
		       window.location.href="check.php";
         </script>
		<?php	}
		}
	
	?>