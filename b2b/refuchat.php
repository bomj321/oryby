<?php session_start();
include('Connect.php');
?>
 
  
<div>
<?php
 $sender=$_SESSION['chatuname'];
 $query = "SELECT sender,msg, date FROM chatapp where sender='$sender' or reciever='$sender' order by `date` Asc";
	$result =(mysqli_query($connection, $query));
  while($row = mysqli_fetch_array($result))
  {
	  ?>
	

  <span style="color:green;"><?php echo $row['sender']; ?> : </span>
 <span style="color:brown;"><?php echo $row['msg']; ?></span>
 <span style="float:right;"><?php echo $row['date']; ?></span> 
   <br>
     <?php
	   }
  
	   ?>  <br><hr/></div>
	
    