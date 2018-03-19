<?php session_start();
include('Connect.php');
include('head.php');


?>

    <body>
     <!-- start topBar -->
     <?php include('topbar.php');  
	include('middlebar.php');
	 ?>
	 <!-- end topBar -->
        
        
     
    
       <?php include('navh.php');
	   ?>
        <!-- start section -->
        <section class="section white-backgorund">
		
		<?php 
	
		$qry1="SELECT * FROM aboutus WHERE elementname='buysecurtlyelement1spanish'"; 
       $res1=mysqli_query($connection,$qry1);
	   //echo $va=mysqli_num_rows($res1);
	   $rw=mysqli_fetch_array($res1);
	   $rw['description'];
		?>
            <div class="container">
			  <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="title-wrap">
                            <h2 class="title lines">Compre Securtly</h2>
                          
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
                
                <div class="row">
                    <div class="col-sm-7 vertical-align">
					
                        <h2 class="title"> <?php echo $rw['title'];?></h2>
                        <p><?php echo $rw['description'];?>  </p></div><!-- end col -->
                    <div class="col-sm-5 vertical-align">
                        <?php
                        $sql="Select * from `images` Where id='28'";
                        $result=mysqli_query($connection,$sql);
                        $row=mysqli_fetch_array($result);
                        $image=$row['image'];
                        ?>
                        <figure class="zoom-in">
                            <img src="../../images/<?php echo $image;?>" alt="">
                        </figure>
                    </div><!-- end col -->
                </div><!-- end row -->
                          <hr class="spacer-100">
                          <?php 
		$qry2="SELECT * FROM aboutus WHERE elementname='buysecurtlyelement2spanish'"; 
       $res2=mysqli_query($connection,$qry2);
	   $rw2=mysqli_fetch_array($res2);
	   $nr =mysqli_num_rows($res2);
		?>    

            
                
                <div class="row">
				<div class="col-sm-5 vertical-align">
                    <?php
                    $sql="Select * from `images` Where id='29'";
                    $result=mysqli_query($connection,$sql);
                    $row=mysqli_fetch_array($result);
                    $image=$row['image'];
                    ?>
                        <figure class="zoom-in">
                            <img src="../../images/<?php echo $image;?>" alt="">
                        </figure>
                    </div><!-- end col -->
                    <div class="col-sm-7 vertical-align">
					
                        <h2 class="title"> <?php echo $rw2['title'];?></h2>
                        <p><?php echo $rw2['description'];?>  </p></div><!-- end col -->
                    
                </div><!-- end row -->
                    <hr class="spacer-100">
                             <?php 
		$qry3="SELECT * FROM aboutus WHERE elementname='buysecurtlyelement3spanish'"; 
       $res3=mysqli_query($connection,$qry3);
	   $rw3=mysqli_fetch_array($res3);
	   $nr =mysqli_num_rows($res3);
		?>  
                
                <div class="row">
                    <div class="col-sm-7 vertical-align">
					
                        <h2 class="title"> <?php echo $rw3['title'];?></h2>
                        <p><?php echo $rw3['description'];?>  </p></div><!-- end col -->
                    <div class="col-sm-5 vertical-align">
                    <?php
                    $sql="Select * from `images` Where id='30'";
                    $result=mysqli_query($connection,$sql);
                    $row=mysqli_fetch_array($result);
                    $image=$row['image'];
                    ?>
                        <figure class="zoom-in">
                            <img src="../../images/<?php echo $image;?>" alt="">
                        </figure>
                    </div><!-- end col -->
                </div><!-- end row -->
        
            </div><!-- end container -->
        </section>
        <!-- end section -->
       <?php include('footer.php');
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