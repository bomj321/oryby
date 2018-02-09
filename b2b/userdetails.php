<?php session_start();
require 'Connect.php';  
include('head.php');
 //include_once 'checkactiveusers.php';
 if(isset($_GET["artistid"])){
	 
	 $_SESSION['artistchat']=$_GET['artistid'];
 }
 
 if(isset($_POST['submit'])) { 
   $_SESSION['chatuname']=$_POST['name'];
   $_SESSION['chatuemail']=$_POST['email'];
   ?>
   <script>
   window.location.href="chating.php";
   </script>
   <?php
 
 }
 ?>
 	
    <body> 
        
        <!-- start topBar -->
  <?php require 'topbar.php';
        require 'middlebar.php';
		require 'navh.php';
		?>
        <!-- end topBar -->
        
        <!-- start navbar -->
        
        
        
        
        <!-- start section -->
        <section class="">
            <div class="container">
                <div class="row">
				 
                    <!-- start sidebar -->
                   <!-- end col -->
                    <!-- end sidebar -->
                    <div class="col-sm-12" >
                        <div class="row">
						 <div class="col-sm-2">
			        </div>
                            <div class="col-sm-8" >
                           <center>     <h2 class="title">CHAT </h2>
                            </center>
							</div><!-- end col -->
                        </div><!-- end row -->
                        
                        <hr>
                    
      	   <div class="col-sm-12">
           
              <div class="row">
			  <div class="col-sm-2">
			  
			  </div>
                            <div class="col-sm-8 "  style="background-color:#98AFC7" >
							<center> <h1 class="title">Enter Your Name and Email </h1>
                          </center>
								<div id="chat_data1">
 
 
       
         <form method="post" action="userdetails.php">
          <input type="text" style="width:100%"  class="form-control" name="name" placeholder="Enter Name: " /> 
		  </br>
		    <input type="text" style="width:100%" class="form-control" name="email" placeholder="Enter Email: " /> 
			</br>
          
         <input type="submit" style="width:100px;height:30px; float:right"  class="btn btn-primary" name="submit" value="Proceed " />
		 </br>
		 </br>
		 </br>
           </form>
            </div>
             </div>
            
            
             </div>
            
								
                                <hr class="spacer-10 no-border">
                                
                              
                            </div><!-- end col -->
                        </div><!-- end row -->
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