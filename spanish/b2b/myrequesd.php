<?php
require 'Connect.php'; 
if(!empty($_POST["prod"])){
$query = "SELECT * FROM USERS WHERE username like '".$_POST["prod"]."%'";
$result=mysqli_query($connection,$query);
if($result === false) {
trigger_error('Wrong SQL: ' . $query . ' Error: ' . $connection->error, E_USER_ERROR);
}
echo $rs=mysqli_num_rows($result);
if($rs > 0){
while($row = mysqli_fetch_array($result)) {
	
	echo " <ul><li> ".$row['username']."</li></ul>"; 
	
}
}
else{
	
}
}
?> 