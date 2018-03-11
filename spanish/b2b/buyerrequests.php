
<?php 
include('Connect.php');
include('head.php');
?>
<body>
    <!-- start topBar -->
    <?php include('topbar.php');
            include('middlebar.php');
            include('navh.php');
    ?>


        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">



			<?php
			$email=$_SESSION['uemail'];
			$reqid=$_GET['reqid'];


			$querygetrequest="SELECT * FROM `buyerrequests` where `buyreq_id`='$reqid'";
			$resultrequests=mysqli_query($connection,$querygetrequest);
			while($rowreq=mysqli_fetch_array($resultrequests)){
			?>



                <div class="row" style="background-color:#f7f7f7;">
                    <!-- start sidebar -->
                    <div class="col-sm-4">
                        <div class='carousel slide product-slider' data-ride='carousel' data-interval="false">
                            <div class='carousel-inner'>
                                <div class='item active'>
                                    <figure style="width:100%;height:50%;float:left;">
                                        <img src='ReqImages/<?php echo $rowreq['image']; ?>' alt='Product Image'/>
                                    </figure>
                                </div><!-- end item -->



                            </div><!-- end carousel-inner -->


                        </div><!-- end carousel -->
                    </div><!-- end col -->
                    <!-- end sidebar -->
                    <div class="col-sm-8" style="background-color:#f7f7f7;">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2 class="title"><?php echo $rowreq['prod_name']; ?></h2>
                                   <p class="text-gray alt-font">Agregado el:<?php echo date("Y-m-d"); ?></p>
								  <p class="text-gray alt-font">Categoria: <?php echo $rowreq['catename']; ?></p>
								  <p class="text-red alt-font" style="color:red;">Fecha tope: <?php echo $rowreq['dtym']; ?></p>
                                   <a href="chatby.php?sellerid=<?php echo $rowreq['buyer_id'];?>&pid=<?php echo $rowreq['buyreq_id']?>" class="btn btn-success">Contactame</a>
							</div><!-- end col -->
                        </div><!-- end row -->

                        <hr class="spacer-5"><hr class="spacer-10 no-border">

                        <div class="row">
                            <div class="col-sm-12">
							  <h6> Descripción</h6>
                                <p><?php echo $rowreq['bmessage']; ?></p>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->
				    <hr class="spacer-60">
					<br>
                <?php } ?>
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
            		  <script>
  $(document).ready(function(){
    setTimeout(function() {
    $('#suc,#fail').fadeOut('fast');
     }, 1000);
});
</script>
    </body>
</html>
