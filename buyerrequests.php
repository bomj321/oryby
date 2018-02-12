<?php session_start();
require 'Connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Buyers</title>
    <meta charset="utf-8">
    <meta name="description" content="Plus E-Commerce Template">
    <meta name="author" content="Diamant Gjota" />
    <meta name="keywords" content="plus, html5, css3, template, ecommerce, e-commerce, bootstrap, responsive, creative" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!--Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">

    <!-- css files -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css" />
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css" />
    <link rel="stylesheet" type="text/css" href="css/animate.css" />
    <link rel="stylesheet" type="text/css" href="css/swiper.css" />

    <!-- this is default skin you can replace that with: dark.css, yellow.css, red.css ect -->
    <link id="pagestyle" rel="stylesheet" type="text/css" href="css/default.css" />

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700,800&amp;subset=latin-ext" rel="stylesheet">

</head>
    <body>

        <!-- start topBar -->
       <?php require 'topbar.php' ?>
        <!-- end topBar -->

        <!-- start navbar -->
        <div class="navbar yamm navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="index.php" class="navbar-brand">
                        <img width="160" src="img/oryLogo.png" alt="" />
                    </a>
                </div>
                <div id="navbar-collapse-1" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <!-- Home -->
                        <li class="dropdown"><a href="index.php">Home</a>

                        </li><!-- end li dropdown -->
                        <!-- Features -->
                    <!--    <li class="dropdown left"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Buyers<i class="fa fa-angle-down ml-5"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="buyerrequests.php">My Requests</a></li>

                            </ul><!-- end ul dropdown-menu -->
                      <!--  </li>   -->
                        <!-- Pages -->


                        <!-- Collections -->
              <!-- end dropdown -->
                    </ul><!-- end navbar-nav -->

                </div><!-- end navbar collapse -->
            </div><!-- end container -->
        </div><!-- end navbar -->




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
                                    <figure style="width:50%;height:50%;float:left;">
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
                                   <p class="text-gray alt-font">Date Added: <?php echo date("Y-m-d"); ?></p>
								  <p class="text-gray alt-font">Category: <?php echo $rowreq['catename']; ?></p>
								  <p class="text-red alt-font" style="color:red;">Deadline: <?php echo $rowreq['dtym']; ?></p>
                                   <a href="contactbuyer.php?buyermail=<?php echo $rowreq['BuyerName']; ?>" class="btn btn-success"> Contact me </a>
							</div><!-- end col -->
                        </div><!-- end row -->

                        <hr class="spacer-5"><hr class="spacer-10 no-border">

                        <div class="row">
                            <div class="col-sm-12">
							  <h6> Description  </h6>
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
