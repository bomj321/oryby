<?php
include('Connect.php');			
    $target_dir = "../images/";	
    $target_file = $target_dir . basename($_FILES["file1"]["name"]);
    $image=$_FILES['file1']['name'];
    $filelocation = $target_dir.$image;
    $temp = $_FILES['file1']['tmp_name'];
    move_uploaded_file($temp, $filelocation);
    $sql ="INSERT INTO `slider` (`image`) VALUES ('{$image}');";
    mysqli_query($connection,$sql);
    $stmt = $connection->prepare($sql);
    header("Location: manageSlider.php");
?>