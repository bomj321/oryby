 <?php session_start();
			 include_once 'Connect.php';
			   if(isset($_POST['msg'])) { 
 $sender = $_SESSION['firstName'];
 $reciever=$_SESSION['sender'];
 $date=date("Y-m-d h:i:s");
 $msg = mysqli_real_escape_string($connection, $_POST['msg']); 
 $sql = "INSERT INTO chatapp (sender,reciever,msg,date) VALUES ('$sender','$reciever','$msg','$date')";

if(mysqli_query($connection, $sql)){

}
  
 }
			 
			 ?>