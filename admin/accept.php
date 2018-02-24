<?php 
include 'Connect.php'; 

$accept = $_GET['accept'];
$email = $_GET['email'];
$productType = $_GET['type'];
$pid = $_GET['pid'];

if ($accept == 'yes') {	

	//ACTUALIZACION 1

	$sql3 = "UPDATE products SET productType='$productType' WHERE pid='$pid'";
        if(!mysqli_query($connection, $sql3)){
    echo "ERROR: Could not able to execute $sql3. " . mysqli_error($connection);     
}

	//ACTUALIZACION 2

 $sql = "UPDATE products SET productType2=' ' WHERE pid='$pid'";
        if(!mysqli_query($connection, $sql)){
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);

}

	//SEND EMAIL
	
$message =
		"
		Congratulations, your product has been accepted		
		";
		
		mail($email,"MY ORYBU",$message,"From: info@orybu.com");	
			
		echo "<script>
                alert('This Product has been accepted');
                window.location= 'acceptProduct.php'
        </script>";


}elseif ($accept == 'no') {

	//ACTUALIZACION 1
	$sql4 = "UPDATE products SET productType2=' ' WHERE pid='$pid'";
        if(!mysqli_query($connection, $sql4)){
    echo "ERROR: Could not able to execute $sql4. " . mysqli_error($connection);
        
}

	//SEND EMAIL
	
$message =
		"
		Sorry, your product has no been accepted.
		";
		
		mail($email,"MY ORYBU",$message,"From: info@orybu.com");	
			
		echo "<script>
                alert('This product has no been accepted');
                window.location= 'acceptProduct.php'
        </script>";


}




mysqli_close($connection);
 ?>