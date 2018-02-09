<?php session_start();
require 'Connect.php';
error_reporting(0);
include('head.php');
 $email=$_SESSION['uemail'];
 $usertype=$_SESSION['utype'];

if(isset($_POST['save']))
{
	    $companyName= $_POST['companyName'];
		 $companyLegalNo= $_POST['companyLegalNo'];
		 $street= $_POST['street'];
		  $city= $_POST['city'];
		  	$p1=$_POST['p1'];
	$p2=$_POST['p2'];
	$p3=$_POST['p3'];
		$phone = $p1 . ' ' . $p2 . ' ' .$p3;
		  $province= $_POST['province'];
		  $zipCode= $_POST['zipCode'];
		  $countryName= $_POST['selectcountryName'];
		  $businessType= $_POST['businessType'];
		  $noOfEmployee= $_POST['noOfEmployee'];
		  $companyDescription= $_POST['companyDescription'];
		  
		
		///////////////////////////////////////////
		 	
			$target_dir = "images/";
	
		 		$target_file = $target_dir . basename($_FILES["file1"]["name"]);
				$images=$_FILES['file1']['name'];
			 $filelocation = $target_dir.$images;
        $temp = $_FILES['file1']['tmp_name'];
		 move_uploaded_file($temp, $filelocation);
		 /////////////////////////////////////////////
		 
		 //////////////////////////////////////////
	
				
				$target_dir = "images/";
	
		 		$target_file = $target_dir . basename($_FILES["file2"]["name"][0]);
				$target_file = $target_dir . basename($_FILES["file2"]["name"][1]);
				$target_file = $target_dir . basename($_FILES["file2"]["name"][2]);
					$target_file = $target_dir . basename($_FILES["file2"]["name"][3]);
						$target_file = $target_dir . basename($_FILES["file2"]["name"][4]);
				$image1=$_FILES['file2']['name'][0];
				$image2=$_FILES['file2']['name'][1];
				$image3=$_FILES['file2']['name'][2];
					$image4=$_FILES['file2']['name'][3];
						$image5=$_FILES['file2']['name'][4];
			$filelocation1 = $target_dir.$image1;
			$filelocation2 = $target_dir.$image2;
			$filelocation3 = $target_dir.$image3;
		$filelocation4 = $target_dir.$image4;
		$filelocation5 = $target_dir.$image5;
        $temp1 = $_FILES['file2']['tmp_name'][0];
		$temp2 = $_FILES['file2']['tmp_name'][1];
		$temp3 = $_FILES['file2']['tmp_name'][2];
		$temp4 = $_FILES['file2']['tmp_name'][3];
		$temp5 = $_FILES['file2']['tmp_name'][4];
		
		 move_uploaded_file($temp1, $filelocation1);
 move_uploaded_file($temp2, $filelocation2);
 move_uploaded_file($temp3, $filelocation3); 
  move_uploaded_file($temp4, $filelocation4); 
   move_uploaded_file($temp5, $filelocation5); 
		 ////////////////////////////////////////////////
		 

 $q ="INSERT INTO seller(email,company_name,street,city,province,zipCode
	,countryName,businessType,noOfEmployee,companylogo,companyDescription,companylicense,phoneNo,companyLegalNo) VALUES ('$email','$companyName','$street','$city','$province','$zipCode','$countryName','$businessType','$noOfEmployee','$images','$companyDescription','$image1,$image2,$image3,$image4,$image5','$phone','$companyLegalNo')";

	  $r = $connection->prepare($q);
					if($r === false) {
						trigger_error('Wrong SQL: ' . $q . ' Error: ' . $connection->error, E_USER_ERROR);
					}
					 if($r->execute())
			{
		
			?>
		<script >
                alert("Your Profile is Pending for Approval  !");  //not showing an alert box.
		       window.location.href="suppliers.php";
         </script>
			<?php

			}
			else
			{
		
			?>
			<script >
                alert("Failed to Saved Information  !");  //not showing an alert box.
		       window.location.href="profileComplete.php";
         </script>	
		<?php	}
		////////////////////////////////////////////
					
 }
 else
 {
 }

?>