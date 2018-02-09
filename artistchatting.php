<?php session_start();
require 'Connect.php';  
include('head.php');
 //include_once 'checkactiveusers.php';

 include 'chatactiveusers.php';
 
 ?>
 	
 <script type='text/javascript' src="jquery-3.1.1.min.js"></script>
<script>

  
 $(document).ready(function(){
 $("#send").click(function(){
	 
	   var vals="msg="+document.getElementById('msg').value;

       $.ajax({ 
        type: "POST", 
        url: "sendartist.php", 
        data: vals, 
        success: function(result){ 
document.getElementById("msg").value="";			
		  if(result){
			
		}
		}
      });
	   });
 }); 
function chat_ajax(){ 

 var req = new XMLHttpRequest(); 
 req.onreadystatechange = function() { 
 if(req.readyState == 4 && req.status == 200){ 
 document.getElementById('chat').innerHTML = req.responseText; 
 } } 
 
 req.open('GET', 'refuartistchat.php', true);
 req.send();
 }

 setInterval(function(){chat_ajax()}, 10000)

 </script>
    <body> 
        
        <!-- start topBar -->
     <?php require 'topbar.php';
        require 'middlebar.php';
		require 'navh.php';
		?>
        <!-- end topBar -->
        <!-- end topBar -->
        
        <!-- start navbar -->
        
        
        
        
        <!-- start section -->
        <section class="">
            <div class="container">
                <div class="row">
				  <div class="col-lg-2">  </div> 
                    <!-- start sidebar -->
                   <!-- end col -->
                    <!-- end sidebar -->
                    <div class="col-lg-6" style="background-color: #98AFC7">
                        <div class="row">
                            <div class="col-lg-12 text-left">
                              <center>  <h2 class="title">CHAT </h2>
                            </center></div><!-- end col -->
                        </div><!-- end row -->
                        
                        <hr class="spacer-5"><hr class="spacer-20 no-border">
                    
       <center>
       <h1 class="title">Start Your Chat Here</h1>
             </center>
     
 <br><br>
            <hr/>
			<div id="chat">
 <?php
include "refuartistchat.php";
	  
 ?>
  <br><hr/>
       
</div>
<form method="post" action="artistchatting.php">
          
          <textarea style="width:100%;" id="msg" name="enter message" placeholder="Enter Message">
          </textarea> <input id="send" type="button" name="submit" value="Send!" />
           </form>  
      
								
                                <hr class="spacer-10 no-border">
                                
                              
                            </div><!-- end col -->
                        </div><!-- end row -->
                        
            </div><!-- end container -->
        </section>
        <!-- end section -->
               
       <?php 
	   include ("footer.php");
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