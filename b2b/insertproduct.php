<?php session_start();
include('Connect.php');
//$uzeremail=$_SESSION['uemail'];
if(isset($_POST['save'])){	
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
			//$showcaseid=$_POST['showcaseid'];
			//$showtoplist=$_POST['showtoplist'];
            $description = $_POST['description'];
			$fobprice=$_POST['fobprice'];
			$oquantity=$_POST['oquantity'];
			$dropminimum=$oquantity.' '.$_POST['dropminimum'];
			//$description=$_POST['description'];
			if($_POST['showcaseid'] !="")
			{
			 $productstatus=$_POST['showcaseid'];
			}
			 if($productstatus =="")
			{
			 $productstatus=2;
			}
			if($_POST['showtoplist'] !="")
			{
			 $showtoplist=$_POST['showtoplist'];
			}
			
			
			$target_dir = "images/";
	if($_FILES["file2"]["name"][0] !="")
{
		 	$target_file = $target_dir . basename($_FILES["file2"]["name"][0]);
			$image1=$_FILES['file2']['name'][0];
			$filelocation1 = $target_dir.$image1;
			$temp1 = $_FILES['file2']['tmp_name'][0];
			move_uploaded_file($temp1, $filelocation1);
}	if($_FILES["file2"]["name"][1] !="" )
{

			$target_file = $target_dir . basename($_FILES["file2"]["name"][1]);
			$image2=$_FILES['file2']['name'][1];
			$filelocation2 = $target_dir.$image2;
			$temp2 = $_FILES['file2']['tmp_name'][1];
			move_uploaded_file($temp2, $filelocation2);
}	if($_FILES["file2"]["name"][2] !="" )
{
		
			$target_file = $target_dir . basename($_FILES["file2"]["name"][2]);
			$image3=$_FILES['file2']['name'][2];
			$filelocation3 = $target_dir.$image3;
			$temp3 = $_FILES['file2']['tmp_name'][2];
			move_uploaded_file($temp3, $filelocation3); 
 }	
 if($_FILES["file2"]["name"][3] !="")
{

			$target_file = $target_dir . basename($_FILES["file2"]["name"][3]);
			$image4=$_FILES['file2']['name'][3];
			$filelocation4 = $target_dir.$image4;
			$temp4 = $_FILES['file2']['tmp_name'][3];
			move_uploaded_file($temp4, $filelocation4); 
 } 			
	  
if($_FILES["file1"]["name"] !="" )
{
			$target_file = $target_dir . basename($_FILES["file1"]["name"]);
			$fileimage1=$_FILES['file1']['name'];
			$filelocation = $target_dir.$image3;
			$tempfile1 = $_FILES['file1']['tmp_name'];
			move_uploaded_file($tempfile1, $filelocation); 
 }		
echo $query="INSERT INTO products(catid,ntitle,keywords,selectedkeyword,country,port,weight,volume,dimension,capacity,energypower,rotationspeed,elaboration,puse,psize,packing,certification,price,miniorder,fulldescription,image,producttoplist,productType,productstatus)VALUES('$catid','$title','$keyword','$slctedkeyword','$dropcountry','$port','$dropweight','$dropvolum','$dropdimension','$dropcapacity','$dropenergy','$rotation','$elobration','$use','$size','$packaging','$fileimage1','$fobprice','$dropminimum','$description','$image1,$image2,$image3,$image4','$showtoplist','$productType','$productstatus')";	
$result=mysqli_query($connection,$query);
if($result){
	
	$suc='<div class="alert alert-success col-md-4">Successfully added!</div>';
	$_SESSION['suc']=$suc;
	 //echo $suc;
	 
	//header("Location: suppliers.php");
}



	}
?>