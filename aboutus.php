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

		$qry1="SELECT * FROM aboutus WHERE elementname='pageEnglish'";

       $res1=mysqli_query($connection,$qry1);
	   //echo $va=mysqli_num_rows($res1);
	   $rw=mysqli_fetch_array($res1);
	   $rw['description'];
     $video= $rw['hreflink'];
     $subtitles = $rw['subtitles'];
     $valorsub = explode(',',$subtitles); 
		?>
            <div class="container">
                <div class="row"><!----------- PRIMER ROW -->
                  <!--DESCRIPCION-->

                  <div class="col-sm-7">
                        <h2 class="title"> <?php echo $rw['title'];?></h2>
                        <p><?php echo $rw['description'];?>  </p>
                  </div>
                  <!--DESCRIPCION-->

                <!--IMAGEN-->
                    <div class="col-sm-5 vertical-align">
                        <figure class="zoom-in">
                            <img class="img-responsive" style="height: 300px;" src="images/<?php echo $rw['picture'];?>" alt="">
                        </figure>

                      </div><!-- end col -->
              <!--IMAGEN-->


                </div><!-------------- PRIMER ROW -->

       

                          <hr class="spacer-100">


          <div class="row"><!--SEGUNDO ROW-->
               <div class="col-sm-5" style="height:35rem; margin-top:9rem;">
                  <iframe width="100%" height="100%" src="<?php echo  $video ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
              </div>

             <div class="col-sm-7"><!--INICIO COL1-->
                        <h2 class="title"><?php echo $rw['titlemission'] ?></h2>
                        <p><?php echo $rw['descriptionmission'];?>  </p>

                        <br>
                        <br>
                        <div style="margin-left: -3rem;">
                    <h6 style="margin-left: 3rem;"><?php echo $rw['subtitlemission'];?>:</h6>
              <ul>

                
                <p><i style="margin-left: -2px;" class="fa fa-umbrella" aria-hidden="true">&nbsp;&nbsp;<?php echo $valorsub[0];?></i></p>
                <p><i style="margin-left: -5px;" class="fa fa-taxi" aria-hidden="true">&nbsp;&nbsp;<?php echo $valorsub[1];?></i></p>
                <p><i class="fa fa-user" aria-hidden="true">&nbsp;&nbsp;<?php echo $valorsub[2];?></i></p>
                <p><i style="margin-left: -4px;" class="fa fa-heart" aria-hidden="true">&nbsp;&nbsp;<?php echo $valorsub[3];?></i></p>
                <p><i style="margin-left: -5px;" class="fa fa-diamond" aria-hidden="true">&nbsp;&nbsp;<?php echo $valorsub[4];?></i></p>
                <p><i style="margin-left: -3px;" class="fa fa-bell" aria-hidden="true">&nbsp;&nbsp;<?php echo $valorsub[5];?></i></p>
                <p><i style="margin-left: -3px;" class="fa fa-check" aria-hidden="true">&nbsp;&nbsp;<?php echo $valorsub[6];?></i></p>                        
                </ul>
                      </div>
                 </div><!--FIN COL1-->

        </div><!--SEGUNDO ROW-->

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
