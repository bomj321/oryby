<?php session_start(); 
include('Connect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
 $email = mysqli_real_escape_string( $connection, $_POST['email']);
 $chkqury="SELECT * FROM users WHERE confirmed = '1'";
$rsl=mysqli_query($connection,$chkqury);
$nr=mysqli_num_rows($rsl);
$row =mysqli_fetch_array($rsl); 
if($nr > 0){ 

     $password = mysqli_real_escape_string($connection, $_POST['password']);        
      $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
      $result = mysqli_query($connection,$sql);
     
        $count = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
       $usertype=$row['userType'];
       $userstatus=$row['userStatus'];
      $checkemail=$row['email'];
         $name=$row['firstName'];
         $_SESSION['fname']=$name;
      $checkpassword=$row['email'];
      $userid= $row['user_id'];
      $_SESSION['user_id']= $userid;
      $_SESSION['firstName'] = $name;
//PAIS
      $country = $row['countryName'];
      $_SESSION['countryName'] = $country;
      if($userstatus=='0')
   {
   ?>
   <script>
   alert("Contact Admin ! Profile in Pending..");
   window.location.href="logoff.php";

   </script><?php
   }
       if($count > 0 && $usertype=='supplier') {
         $_SESSION['uemail']=$email;
       $_SESSION['utype']=$usertype;
          
       
         header("location: index.php");
      }
       else if($count > 0  && $usertype=='buyer'){
        $_SESSION['uemail']=$email;
         $_SESSION['utype']=$usertype;
       ?>
 <script>
  
   window.location.href="index.php";
   </script>       
         //header("location: index.php");
   <?php }
       else if($count > 0  && $usertype=='both'){
        $_SESSION['uemail']=$email;
         $_SESSION['utype']=$usertype;     
         header("location: index.php");
      }
       else if($checkemail !=$email){
         $error = '<div class="alert alert-danger" id="fail"> <center> <b>Wrong Email </b> </center></div>';
       ?>
   <script>
  
   window.location.href="index.php";
   </script><?php
      }
      else if($checkpassword !=$password){
         $error = '<div class="alert alert-danger" id="fail"> <center> <b>Wrong Password </b> </center></div>';
       ?>
   
  
 <?php
      }
     $_SESSION['firstName']=$name;
     $now= date("Y-m-d h:i:s");

    $updatequery="update `users` set `status`='online', `lastactiveon`='$now' where `email`='$email' ";
   mysqli_query($connection,$updatequery);
   
    }
     else{ ?>
<script> 
alert('Your Email not Confirmed Please Contact admin');
window.location.href="index.php";
 </script>
<?php
}
}
    
   ?>