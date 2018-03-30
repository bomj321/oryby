<?php

include 'Connect.php'; 

$email = $_GET['email'];
$code = $_GET['code'];
$userStatus = $_GET['userStatus'];
$query = mysqli_query("SELECT * FROM `users` WHERE `confirmcode`='$code'");
while($row = mysqli_fetch_assoc($query))
{
	$db_code = $row['confirmcode'];
	$userType = $row['userType'];
}
if($db_code = $code)
{
    
    if($userType = 'buyer' or isset($userStatus)){
        
        $sql3 = "UPDATE users SET userStatus='1' WHERE confirmcode='$code'";
        if(!mysqli_query($connection, $sql3)){
    echo "ERROR: Could not able to execute $sql3. " . mysqli_error($connection);
        
}
        
        
}

$sql = "UPDATE users SET confirmed='1' WHERE confirmcode='$code'";
        if(!mysqli_query($connection, $sql)){
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);

}

//$sql2 = "UPDATE users SET confirmcode='0' WHERE confirmcode='$code'";
//if(!mysqli_query($connection, $sql2)){

   // echo "ERROR: Could not able to execute $sql2. " . mysqli_error($connection);

//} 

echo "<script>
                alert('Gracias. Tu email ha sido confirmado, ahora puedes loguearte');
                window.location= 'singlelogin.php'
        </script>";

	
	

}
else
{
	echo "
		<script>
                alert(Email y codigo no coinciden con la base de datos. Por favor contacta con el administrador');
                window.location= 'index.php'
        </script>";	

}
mysqli_close($connection);
?>

