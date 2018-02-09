<?php @ob_start();
session_start();

include_once 'Connection.php';

 $reciever=$_SESSION['firstName'];
  $sender="";
 if(isset($_GET['userid'])){
 $sender=$_GET['userid'];
 $_SESSION['sender']=$sender;
 }else
 {
	 $sender=$_SESSION['sender'];
 }
 $query = "SELECT sender,reciever,msg, date FROM chatapp where sender='$reciever' or reciever='$reciever' order by `date` Asc  ";
 
	$result =(mysqli_query($connection, $query));
  while($row = mysqli_fetch_array($result))
  { 

if($row['sender']==$sender || $row['reciever']==$sender){
	  ?>
	 
  <span style="color:green;"><?php echo $row['sender']; ?> : </span>
   <span style="color:brown;"><?php echo $row['msg']; ?></span>
    <span style="float:right;"><?php echo $row['date']; ?></span> 
	
   <br>
     <?php
	
	 if($row['reciever']==$sender)
	 {
		 $_SESSION['reciever']=$row['sender'];
		 
	 }
  }
  }
	   ?>  <br><hr/>
       