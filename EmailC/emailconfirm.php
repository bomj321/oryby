<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Email Confirmation Tutorial</title>
</head>

<body>
<?php

require "dbc.php";

$username = $_GET['username'];
$code = $_GET['code'];

$query = mysqli_query("SELECT * FROM `tutorial` WHERE `username`='$username'");
while($row = mysqli_fetch_assoc($query))
{
	$db_code = $row['confirm-code'];
}
if($code == $db_code)
{
	mysqli_query("UPDATE `tutorial` SET `confirmed`='1'");
	mysqli_query("UPDATE `tutorial` SET `confirm-code`='0'");

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
</body>
</html>
