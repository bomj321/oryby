<?php session_start();
if(!isset($_SESSION['user_id']))
{
  echo "<script>
                alert('Please log in!!!');
                window.location= 'singlelogin.php'
        </script>";
}
include('Connect.php');
$dropcat=$_POST['dropcat'];
$_SESSION['dropcat']=$dropcat;

$prod_name=$_POST['pname'];
$_SESSION['pname']=$prod_name;

$dropunit=$_POST['dropunit'];
$_SESSION['dropunit']=$dropunit;

$quantity=$_POST['quantity'];
$_SESSION['quantity']=$quantity;

$dtym=$_POST['dtym'];
$_SESSION['dtym']=$dtym;

$pais=$_POST['pais'];
$_SESSION['pais']=$pais;




//$show=0;
/* if(isset($_POST['requestSend']))
	{
$usertype=$_SESSION['utype'];
$user =$_SESSION['uemail'];
$prod_name=$_POST['pname'];
$description=$_POST['description'];
$qry="SELECT * FROM `users_profile` WHERE `userid`='$user' and `usertype`='$usertype'";
$result01=mysqli_query($connection,$qry);
$count = mysqli_num_rows($result01);
if($count<=0){
	   header("location: profileComplete.php");
}
else{
$target_dir = "ReqImages/";
$target_file = $target_dir . basename($_FILES["pimage"]["name"]);
$image=$_FILES['pimage']['name'];
$filelocation = $target_dir.$image;
$temp = $_FILES['pimage']['tmp_name'];
move_uploaded_file($temp, $filelocation);

 $query = "INSERT INTO buyerrequests(BuyerName,prod_name,bmessage,image,buyer_id) VALUES ('$user', '$prod_name','$description' ,'$image',0)";
 //echo $query;
 $result=mysqli_query($connection,$query);
  	 if($result){
		 ?>
		 <script>
		 alert('Sucessfully Request Send!');
				       window.location.href="index.php";
		 </script>
		 <?php

	 }
	 else{
			 ?>
		 <script>
		 alert('Request Send Error!');
				       window.location.href="index.php";
		 </script>
		 <?php
	 }

	} */



?>
       <script>
	   window.location.href="FinalRequest.php";
		 </script>
