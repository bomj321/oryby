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

    $qry1="SELECT * FROM aboutus WHERE elementname='content1'";

       $res1=mysqli_query($connection,$qry1);
     //echo $va=mysqli_num_rows($res1);
     $rw=mysqli_fetch_array($res1);
     $rw['description'];
     $video= $rw['hreflink'];
    ?>
            <div class="container">
                <div class="row">
                  <div class="col-sm-5" style="height:35rem; margin-top:8rem;">
                      <iframe width="100%" height="100%" src="<?php echo  $video ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                  </div>
                    <div class="col-sm-7 vertical-align">

                        <h2 class="title"> <?php echo $rw['title'];?></h2>
                        <p><?php echo $rw['description'];?>  </p>

                        <figure class="zoom-in">
                            <img src="../../images/<?php echo $rw['picture'];?>" alt="">
                        </figure>

                      </div><!-- end col -->


                </div><!-- end row -->

                          <hr class="spacer-100">



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
