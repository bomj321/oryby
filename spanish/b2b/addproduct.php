<?php session_start();
include('Connect.php');
 $email=$_SESSION['uemail'];
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

	 
 $query="SELECT * FROM seller Where email='$email'";
 
$stmtt=mysqli_query($connection,$query);
if($stmtt == false) {
trigger_error('Wrong SQL: ' . $query . ' Error: ' . $connection->error, E_USER_ERROR);
}
 $nr=mysqli_num_rows($stmtt);    
$rows=mysqli_fetch_array($stmtt);
 $totalproduct=$rows['limitTotalProduct']; 

 $producttopList=$rows['limitTopList']; 
 $productshowcase=$rows['limitShowCase']; 

	   /////////////////////////////
	   		$payment = $_POST['payment'];
	        $catid = $_POST['catid'];// item name
			$subcatid = $_POST['subcatid'];// item name
		    $title = $_POST['title'];// item name
			$keyword = $_POST['keyword'];	
	 		$catid = $_POST['catid'];// item name
		    $title = $_POST['title'];// item name
			$keyword = $_POST['keyword'];
			$slctedkeyword=$_POST['selectedkeyword'];
			$dropcountry = $_POST['dropcountry'];//dropcountry
			$port=$_POST['port'];
			$wquantity=$_POST['wquantity'];
			$dropweight =$wquantity.' '.$_POST['dropweight'];			
			$vquantity=$_POST['vquantity'];
			$dropvolum=$vquantity.' '.$_POST['dropvolum'];
			$dquantity=$_POST['dquantity'];
			$dropdimension=$dquantity.' '.$_POST['dropdimension'];
			$cquantity=$_POST['cquantity'];			
			$dropcapacity=$cquantity.' '.$_POST['dropcapacity'];
			$equantity=$_POST['equantity'];
			$dropenergy= $equantity.' '.$_POST['dropenergy'];
			$rotation=$_POST['rotation'];
			$elobration=$_POST['elobration'];
			$use=$_POST['use'];
		    $size=$_POST['size'];
			$packaging=$_POST['packaging'];
			$productType = $_POST['productType'];
			$productType2 = $_POST['productType'];

			if ($productType = 'Eco Friendly' or $productType = 'Innovation') {
				$productType = 'Normal Product';
			}
			//$showcaseid=$_POST['showcaseid'];
			//$showtoplist=$_POST['showtoplist'];

			$description = $_POST['description'];
			$fob=$_POST['fobprice'];
			$fobprice=$fob.' '.$_POST['dropminimum'];
			$quantity=$_POST['oquantity'];
			$oquantity=$quantity.'  '.$_POST['dropminimum2'];	
			$showcaseid=$_POST['showcaseid'];
			$showtoplist=$_POST['showtoplist'];	
			$delivery=$_POST['delivery_details'];				
	    	$description = $_POST['description'];// item name			
			$subcatid = $_POST['subcatid'];// item name
			if($_POST['showcaseid'] !="")
			{
			}
			else if($productstatus =="")
			{
			 $productstatus=1;
			}
			if($_POST['showtoplist'] !="")
			{
			}
		//$productType = $_POST['productType'];// item name
			
			 //////////////////////////////////////////
	
				$target_dir = "images/";
	if($_FILES["file2"]["name"][0] !="" )
{
		 	$target_file = $target_dir . basename($_FILES["file2"]["name"][0]);
			$image1=$_FILES['file2']['name'][0];
			$filelocation = $target_dir.$image1;
			$temp1 = $_FILES['file2']['tmp_name'][0];
			move_uploaded_file($temp1, $filelocation);
}	if($_FILES["file2"]["name"][1] !="" )
{

			$target_file = $target_dir . basename($_FILES["file2"]["name"][1]);
			$image2=$_FILES['file2']['name'][1];
			$filelocation = $target_dir.$image2;
			$temp2 = $_FILES['file2']['tmp_name'][1];
}	if($_FILES["file2"]["name"][2] !="" )
{
		
			$target_file = $target_dir . basename($_FILES["file2"]["name"][2]);
			$image3=$_FILES['file2']['name'][2];
			$filelocation = $target_dir.$image3;
			$temp3 = $_FILES['file2']['tmp_name'][2];
			move_uploaded_file($temp3, $filelocation); 
 }	
 if($_FILES["file2"]["name"][3] !="")
{

			$target_file = $target_dir . basename($_FILES["file2"]["name"][3]);
			$image4=$_FILES['file2']['name'][3];
			$filelocation = $target_dir.$image4;
			$temp4 = $_FILES['file2']['tmp_name'][3];
			move_uploaded_file($temp4, $filelocation); 
 } 	 ///////////////////////////////////////////////

	if($_FILES["file1"]["name"] !="" )
{
			$target_file = $target_dir . basename($_FILES["file1"]["name"]);
			$fileimage1=$_FILES['file1']['name'];
			$filelocation = $target_dir.$image3;
			$tempfile1 = $_FILES['file1']['tmp_name'];
			move_uploaded_file($tempfile1, $filelocation); 
 }			 

			  			 //$query="INSERT INTO products(catid,subcatid,ntitle,keywords,selectedkeyword,country,port,weight,volume,dimension,capacity,energypower,rotationspeed,elaboration,puse,psize,packing,certification,price,miniorder,fulldescription,image,producttoplist,productType,productType2, productaction,user_id,delivery_details)VALUES('$catid','$subcatid','$title','$keyword','$slctedkeyword','$dropcountry','$port','$dropweight','$dropvolum','$dropdimension','$dropcapacity','$dropenergy','$rotation','$elobration','$use','$size','$packaging','$fileimage1','$fobprice','$dropminimum','$description','$image1,$image2,$image3,$image4','$showtoplist','$productType','$productType2','$productstatus','$userId','$delivery_details')";

			$query="INSERT INTO products(catid,subcatid,ntitle,keywords,selectedkeyword,country,port,weight,volume,dimension,capacity,energypower,rotationspeed,elaboration,puse,psize,packing,certification,price,miniorder,fulldescription,image,producttoplist,productType,productType2,productaction,user_id,delivery_details, payment)VALUES('$catid','$subcatid','$title','$keyword','$slctedkeyword','$dropcountry','$port','$dropweight','$dropvolum','$dropdimension','$dropcapacity','$dropenergy','$rotation','$elobration','$use','$size','$packaging','$fileimage1','$fobprice','$oquantity','$description','$image1 $image2 $image3 $image4','$showtoplist','$productType','$productType2','$productstatus','$userId','$delivery', '$payment')";
			
	

	
		$result = $connection->prepare($query);
			if($result === false) {
		trigger_error('Wrong SQL: ' . $query . ' Error: ' . $conn->error, E_USER_ERROR);
		echo "Insercion no exitosa";
	}
	
		

			if($result->execute())
			{
			if($_POST['showcaseid'] !="")
			{
			 $limitShowCase=$productshowcase-1;
			  $showcase="UPDATE seller  SET limitShowCase='".$limitShowCase."'  WHERE (email='$email')";
			 mysqli_query($connection,$showcase);
				 $result1 = $connection->prepare($showcase);
				 if($result1 === false) {
			trigger_error('Wrong SQL: ' . $showcase . ' Error: ' . $connection->error, E_USER_ERROR);
			}
			$result1->execute();
			}
			if($producttoplist =='1')
			{
			 $limitTopList=$producttopList-1;
			  $toplist="UPDATE seller  SET limitTopList='".$limitTopList."'  WHERE (email='$email')";
			 mysqli_query($connection,$toplist);
				 $result2 = $connection->prepare($toplist);
				 if($result2 === false) {
			trigger_error('Wrong SQL: ' . $toplist . ' Error: ' . $connection->error, E_USER_ERROR);
			}
			$result2->execute();
			}
			 $limitTotalProduct=$totalproduct-1;
			  $totalproduct="UPDATE seller  SET limitTotalProduct='".$limitTotalProduct."'  WHERE (email='$email')";
			 mysqli_query($connection,$totalproduct);
				 $result3 = $connection->prepare($totalproduct);
				 if($result3 === false) {
			trigger_error('Wrong SQL: ' . $totalproduct . ' Error: ' . $connection->error, E_USER_ERROR);
			}
			$result3->execute();
			?>
			<script>
				alert("ADD PRODUCT");
				window.location.href="suppliers.php";
			</script>
			
			<?php

			}
	
			else
			{
			?>
			 <script >
				 window.location.href="suppliers.php";
         </script>
		<?php	}
		}
	
	?>