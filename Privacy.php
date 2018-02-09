<?php session_start();
include('Connect.php');
include('head.php');

?>
<body>
  <?php include('topbar.php'); 
include('middlebar.php');    
	 ?>
        <?php include('navh.php');
	   ?>
        
        
        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-left">
                        <h2 class="title">Política de privacidad</h2>
                    </div><!-- end col -->    
                </div><!-- end row -->
                
                <hr class="spacer-5"> <hr class="spacer-20 no-border">
            		<?php
include('Connect.php');
 $sql="SELECT * FROM aboutus  Where elementName ='policyelement1'  ";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);
$row=mysqli_fetch_array($stmt);
?>    
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="regular subtitle"><?php echo $row['title']; ?></h5>
                        <p><?php echo $row['description']; ?></p>
                        
                        <hr class="spacer-30">
                		<?php
include('Connect.php');
 $sql="SELECT * FROM aboutus  Where elementName ='policyelement2'  ";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);
$row=mysqli_fetch_array($stmt);
?>                     
                        <h5 class="regular subtitle"><?php echo $row['title']; ?></h5>
                        <p><?php echo $row['description']; ?></p>
                        
                        <hr class="spacer-15 no-border">
                  		<?php
include('Connect.php');
 $sql="SELECT * FROM aboutus  Where elementName ='policyelement3'  ";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);
$row=mysqli_fetch_array($stmt);
?>                   
                        <h6 class="regular subtitle"><?php echo $row['title']; ?></h6>
                        <ul class="list">
                            <li><?php echo $row['point1']; ?></li>
                            <li><?php echo $row['point2']; ?></li> 
							<li><?php echo $row['point3']; ?></li>
							  <li><?php echo $row['point4']; ?></li>
							    <li><?php echo $row['point5']; ?></li>
								  <li><?php echo $row['point6']; ?></li>
                        </ul>
                        
                        <hr class="spacer-30">
                   		<?php
include('Connect.php');
 $sql="SELECT * FROM aboutus  Where elementName ='policyelement4'  ";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);
$row=mysqli_fetch_array($stmt);
?>                  
                        <h6 class="regular subtitle"><?php echo $row['title'];?></h6>
                        <ol class="list">
                            <li><?php echo $row['point1']; ?></li>
                            <li><?php echo $row['point2']; ?></li> 
							<li><?php echo $row['point3']; ?></li>
							  <li><?php echo $row['point4']; ?></li>
							    <li><?php echo $row['point5']; ?></li>
								  <li><?php echo $row['point6']; ?></li></ol>
                        
                        <hr class="spacer-30">
                   		<?php
include('Connect.php');
 $sql="SELECT * FROM aboutus  Where elementName ='policyelement5'  ";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);
$row=mysqli_fetch_array($stmt);
?>                  
                        <h6 class="regular subtitle"><?php echo $row['title'];?></h6>
                        <ul class="list alt-list">
                            <li><i class="fa fa-check"></i><?php echo $row['point1'];?></li>
                            <li><i class="fa fa-check"></i><?php echo $row['point2'];?></li>
                            <li><i class="fa fa-check"></i><?php echo $row['point3'];?></li>
                            <li><i class="fa fa-check"></i><?php echo $row['point4'];?></li>
                            <li><i class="fa fa-check"></i><?php echo $row['point5'];?></li>
                            <li><i class="fa fa-check"></i><?php echo $row['point6'];?></li>
                          </ul>
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