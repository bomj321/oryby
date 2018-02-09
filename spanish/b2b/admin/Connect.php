<?php


   $connection = mysqli_connect('localhost', 'adminhtt_btbuser', 'sp13bcs019_','adminhtt_btb');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'adminhtt_btb');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}
?>