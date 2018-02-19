<?php

session_start();

require "dbc.php";

$username = mysqli_real_escape_string($_POST['username']);
$password = mysqli_real_escape_string($_POST['password']);
$enc_password = md5($password);

if($username&&$password)
{
	$query = mysqli_query("SELECT * FROM tutorial WHERE username='$username'");
	$numrow = mysqli_num_rows($query);
	
	if($numrow!=0)
	{
		while($row = mysqli_fetch_assoc($query))
		{
			$db_username = $row['username'];
			$db_password = $row['password'];
			$db_confirmed = $row['confirmed'];
		}
		
		if($username==$db_username&&$enc_password==$db_password)
		{
			if($db_confirmed == 1)
			{
				//echo "Logged in <a href='members.php'>Click here to enter the members area</a>";
				$_SESSION['username']=$db_username;
				header("location: members.php");
			}
			else
			{
				header("location: index.php?error=Your Account Is Not Activated");	
			}
		}
		else 
		{
			header("location: index.php?error=Incorrect Password");
		}
	}
	else 
	{
		header("location: index.php?error=That user doesn't exist");
	}
}
else 
{
	header("location: index.php?error=All fields are required");
}

?>>
