<?php
error_reporting(0);
include 'Connect.php';
    
    
    $error =false;
 ?>
  <?php  if (isset($_POST['register-submit'])) {
	
	
		
		 $companyName= $_POST['companyName'];
		  $companyLegalNo= $_POST['companyLegalNo'];
	$p1=$_POST['p1'];
	$p2=$_POST['p2'];
	$p3=$_POST['p3'];
		$phone = $p1 . ' ' . $p2 . ' ' .$p3;
	$street= $_POST['street'];
		  $city= $_POST['city'];
		  $province= $_POST['province'];
		  $zipCode= $_POST['zipCode'];
		  $countryName= $_POST['selectcountryName'];
		  $businessType= $_POST['businessType'];
		  $noOfEmployee= $_POST['noOfEmployee'];
		  $companyDescription= $_POST['companyDescription'];
		  $email= $_SESSION['confemail'];
		  $confirmcode=$_SESSION['code'];
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
		$target_file = $target_dir . basename($_FILES["file2"]["name"][3]);		$target_file = $target_dir . basename($_FILES["file2"]["name"][4]);				
				$image1=$_FILES['file2']['name'][0];
				$image2=$_FILES['file2']['name'][1];
				$image3=$_FILES['file2']['name'][2];
				$image4=$_FILES['file2']['name'][3];
				$image5=$_FILES['file2']['name'][4];
			$filelocation = $target_dir.$image1;
			$filelocation = $target_dir.$image2;
			$filelocation = $target_dir.$image3;
				$filelocation = $target_dir.$image4;
					$filelocation = $target_dir.$image5;
        $temp1 = $_FILES['file2']['tmp_name'][0];
		$temp2 = $_FILES['file2']['tmp_name'][1];
		$temp3 = $_FILES['file2']['tmp_name'][2];
		
		$temp4 = $_FILES['file2']['tmp_name'][3];
		
		$temp5 = $_FILES['file2']['tmp_name'][4];
		
		 move_uploaded_file($temp1, $filelocation);
		 move_uploaded_file($temp2, $filelocation);
		 move_uploaded_file($temp3, $filelocation); 
		  move_uploaded_file($temp4, $filelocation); 
		   move_uploaded_file($temp5, $filelocation); 
		 ////////////////////////////////////////////////
		 
	 $q ="INSERT INTO seller(email,company_name,street,city,zipCode,province,businessType,noOfEmployee,companyDescription,companylogo,countryName,companylicense,phoneNo,companyLegalNo,limitTopList,limitShowCase) VALUES ('$email','$companyName','$street','$city','$zipCode','$province','$businessType','$noOfEmployee','$companyDescription','$images','$countryName','$image1,$imagen2,$imagen3,$imagen4,$imagen5','$phone','$companyLegalNo','7','5')";
   $qryresult=mysqli_query($connection,$q);
   if (!$qryresult) {
   
   	echo "INSERCION NO EXITOSA";
   }else{
   	
   	echo "
				<script>
				window.location.href ='sendconfirmation2.php';
				</script>


   	";

   	
   }

    	
   
   
        }
        
		
		  
		  ?>
		
	
		
		
           		

