
<?php

include 'Connect.php'; 


$email = $_GET['email'];
$code = $_GET['code'];

$query = mysqli_query("SELECT * FROM `verificacion` WHERE `email`='$email'");
while($row = mysqli_fetch_assoc($query))
{
	$db_code = $row['confirm-code'];
}
if($code == $db_code)
{
	mysqli_query("UPDATE `verificacion` SET `confirmed`='1'");
	mysqli_query("UPDATE `verificacion` SET `confirm-code`='0'");

	echo "<script>
                alert('Thank You. Your email has been confimed and you may now login');
                window.location= 'singlelogin.php'
        </script>";
	
	

}
else
{
	echo "
		<script>
                alert('Email and code dont match');
                window.location= 'index.php'
        </script>";	

}

?>

