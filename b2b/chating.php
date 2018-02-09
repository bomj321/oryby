<?php session_start();
require 'Connect.php';  
include('head.php');
 //include_once 'checkactiveusers.php';


 include 'chatactiveusers.php';
 
 if(isset($_POST['submit'])) { 
 $sender = $_SESSION['chatuname'];
 $reciever=$_SESSION['artistchat'];
 $date=date("Y-m-d h:i:s");
 $msg = mysqli_real_escape_string($connection, $_POST['enter_message']); 
 $sql = "INSERT INTO chatapp (sender,reciever,msg,date) VALUES ('$sender','$reciever','$msg','$date')";

 if (mysqli_query($con, $sql)) {
  $successmsg = "Successfully send!";
  ?>
  <script>
  window.location.href="chating.php";
  </script>
  <?php 
  } else {
	   $errormsg = "Error in sending...Please try again later!";
    }
 }

 ?>
 <script type='text/javascript' src="jquery-3.1.1.min.js"></script>

 <script>
 
   function senda()
   {
	 	   var vals="msg="+document.getElementById('msg').value;
		  

       $.ajax({ 
        type: "POST", 
        url: "sendusers.php", 
        data: vals, 
        success: function(result){ 
			document.getElementById("msg").value="";
		  if(result){
			
		}
		}
      });
   }
 $(document).ready(function(){
 $("#send").click(function(){
	 

	   });
 }); 
 
 
function chat_ajax(){ 
 
 var req = new XMLHttpRequest(); 
 req.onreadystatechange = function() { 
 if(req.readyState == 4 && req.status == 200){ 
 document.getElementById('chat').innerHTML = req.responseText; 
 } } 
 
 req.open('GET', 'refuchat.php', true);
 req.send();
 }

 setInterval(function(){chat_ajax()}, 10000)

 </script>
    <body> 
        
 <?php require 'topbar.php';
        require 'middlebar.php';
		require 'navh.php';
		?>
        <!-- end topBar -->
        
        
        
        
        <!-- start section -->
        <section class="">
            <div class="container">
                <div class="row">
				  <div class="col-lg-3">
				  </div> 
                    <!-- start sidebar -->
                   <!-- end col -->
                    <!-- end sidebar -->
                    <div class="col-lg-6" style="background-color: #98AFC7">
                        <div class="row">
                            <div class="col-lg-12 text-left">
                                <h2 class="title">CHAT </h2>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        
                        <hr class="spacer-5"><hr class="spacer-20 no-border">
                    
       
       <h1 class="title">Start Your Chat Here</h1>
   
 <br><br>
 Name:&nbsp;&nbsp;&nbsp;<span style="color:darkgreen;"><?php echo $_SESSION['chatuname']; ?>  </span><span style="margin-left:100px"></span>
  Email: &nbsp;&nbsp;&nbsp;<span style="color:darkgreen;"><?php echo $_SESSION['chatuemail']; ?></span>

 <hr>

          
        
		   <div id="chat">
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
  
	   ?>  <br><hr/>
	   </div>
	   <form method="post" action="chating.php">
 
	     <textarea style="width:100%;" id="msg" name="enter message" placeholder="Enter Message">
          </textarea> <input type="button" onclick="senda()" id="send" name="submit" value="Send!" />
           </form>  
   
								
                                <hr class="spacer-10 no-border">
                                
                              
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->                
            </div><!-- end container -->
        </section>
        <!-- end section -->
               
      <?php
	  include("footer.php");
	  ?>
        
        
        <!-- JavaScript Files -->
        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="js/jquery.downCount.js"></script>
        <script type="text/javascript" src="js/nouislider.min.js"></script>
        <script type="text/javascript" src="js/jquery.sticky.js"></script>
        <script type="text/javascript" src="js/pace.min.js"></script>
        <script type="text/javascript" src="js/star-rating.min.js"></script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
        <script type="text/javascript" src="js/gmaps.js"></script>
        <script type="text/javascript" src="js/swiper.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    		  
    </body>
	
</html>