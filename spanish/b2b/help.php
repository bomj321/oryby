<?php session_start();
include('Connect.php');
include('head.php');

?>
<html>

    <body>
     <!-- start topBar --> 
     <?php include('topbar.php');  
	
	 ?>
	 <!-- end topBar -->
        
        
     
    
       <?php include('navh.php'); ?>
        
        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <h2 class="title">Help</h2>
                        <p>Aliquam posuere erat et orci eleifend cursus. Nullam tempus odio sem, lacinia pellentesque neque mollis a. In ut tempor ligula. Vestibulum ultricies bibendum lorem, a sollicitudin tellus euismod vel. Nam suscipit, diam ut volutpat lobortis, nibh ipsum tempor nibh, a vehicula tellus justo id nibh. Nulla pretium mollis convallis. Phasellus a nibh aliquet, ullamcorper quam aliquam, faucibus nulla. Phasellus mollis tristique vehicula. Vivamus sagittis, sem sed posuere aliquet, massa odio lobortis.</p>
                        
                        <hr class="spacer-20">
                        
                        <div class="row">
                            <div class="col-sm-4">
                                <h6>Lorem Ipsum</h6>
                                <p>Aliquam posuere erat et orci eleifend cursus. Nullam tempus odio sem, lacinia pellentesque neque mollis a. In ut tempor ligula. Vestibulum ultricies bibendum lorem, a sollicitudin tellus euismod vel.</p>
                            </div><!-- end col -->
                            <div class="col-sm-4">
                                <h6>Lorem Ipsum</h6>
                                <p>Aliquam posuere erat et orci eleifend cursus. Nullam tempus odio sem, lacinia pellentesque neque mollis a. In ut tempor ligula. Vestibulum ultricies bibendum lorem, a sollicitudin tellus euismod vel.</p>
                            </div><!-- end col -->
                            <div class="col-sm-4">
                                <h6>Lorem Ipsum</h6>
                                <p>Aliquam posuere erat et orci eleifend cursus. Nullam tempus odio sem, lacinia pellentesque neque mollis a. In ut tempor ligula. Vestibulum ultricies bibendum lorem, a sollicitudin tellus euismod vel.</p>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                    
                </div><!-- end row -->                
            </div><!-- end container -->
        </section>
        <!-- end section -->
               
        <!-- start footer -->
        <?php require 'footer.php'; ?>
        <!-- end footer -->
        
        
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