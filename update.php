<?php
require 'Connect.php';
error_reporting(0);
include('head.php');
$email=$_GET['email'];
$companyName= $_POST['companyName'];
$companyLegalNo= $_POST['companyLegalNo'];
$street= $_POST['street'];
$city= $_POST['city'];
$province= $_POST['province'];
$zipCode= $_POST['zipCode'];
$countryName= $_POST['selectcountryName'];
$businessType= $_POST['businessType'];
$noOfEmployee= $_POST['noOfEmployee'];
$companyDescription= $_POST['companyDescription'];
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["file1"]["name"]);
$images=$_FILES['file1']['name'];
$filelocation = $target_dir.$images;
$temp = $_FILES['file1']['tmp_name'];
move_uploaded_file($temp, $filelocation);	
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
	


if(empty($images)){
$license = $image1 . ',' . $image2 . ',' . $image3. ',' . $image4. ',' . $image5;

$sqlimages="UPDATE seller  SET company_name ='".$companyName ."',street='".$street ."',city='".$city ."',zipCode='". $zipCode."',province='". $province."',businessType='".$businessType ."',noOfEmployee='".$noOfEmployee ."',companyDescription='". $companyDescription."',countryName='".$countryName ."',companylicense='".$license."',companyLegalNo='".$companyLegalNo."'  WHERE email='$email' ";
mysqli_query($connection,$sqlimages); 
$stmtimages = $connection->prepare($sqlimages);
if($stmtimages === false) 
 {
    trigger_error('Wrong SQL: ' . $sqlimages . ' Error: ' . $connection->error, E_USER_ERROR);
}


    if($stmtimages->execute())
    {
        header("Location:updatesellerprofile.php?email=echo $email");
    }
    else{
//NADA
}

}elseif (empty($image1) and empty($image2) and empty($image3) and empty($image4) and empty($image5)) {
	



	$sqllicense="UPDATE seller  SET company_name ='".$companyName ."',street='".$street ."',city='".$city ."',zipCode='". $zipCode."',province='". $province."',businessType='".$businessType ."',noOfEmployee='".$noOfEmployee ."',companyDescription='". $companyDescription."',companylogo='".$images ."',countryName='".$countryName ."',companyLegalNo='".$companyLegalNo."'  WHERE email='$email' ";
mysqli_query($connection,$sqllicense); 
$stmtlicense = $connection->prepare($sqllicense);
if($stmtlicense === false) 
 {
    trigger_error('Wrong SQL: ' . $sqllicense . ' Error: ' . $connection->error, E_USER_ERROR);
}


    if($stmtlicense->execute())
    {
        header("Location:updatesellerprofile.php?email=echo $email");
    }
    else{

}

}elseif (empty($image1) and empty($image2) and empty($image3) and empty($image4) and empty($image5) and empty($images)) {

	$sql="UPDATE seller  SET company_name ='".$companyName ."',street='".$street ."',city='".$city ."',zipCode='". $zipCode."',province='". $province."',businessType='".$businessType ."',noOfEmployee='".$noOfEmployee ."',companyDescription='". $companyDescription."',companylogo='".$images ."',countryName='".$countryName ."',companylicense='".$license."',companyLegalNo='".$companyLegalNo."'  WHERE email='$email' ";
mysqli_query($connection,$sql); 
$stmt = $connection->prepare($sql);
if($stmt === false) 
 {
    trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}


    if($stmt->execute())
    {
        header("Location:updatesellerprofile.php?email=echo $email");
    }
    else{

}

}







?>