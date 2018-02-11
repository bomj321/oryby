<?php session_start();
require 'Connect.php';
//BORRAR PRIMERO REGISTROS DE MAS DE 2 DIAS o aun mas viejos
$query = "SELECT tiempo FROM buyerrequests ";
  $fila=$connection->query($query);
  while ($compras = $fila->fetch_array(MYSQLI_BOTH)){
      $date1 = date('Y-m-d');

        $query2 = "DELETE FROM buyerrequests WHERE tiempo <='$date1'";
        mysqli_query($connection,$query2);

}
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
		 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css"/>



<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>

<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<script src="js/jquery.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
    <body>

        <!-- start topBar -->
       <?php require 'topbar.php'; ?>
	      <?php require 'middlebar.php'; ?>
		     <?php require 'navh.php'; ?>
        <!-- end topBar -->

        <!-- start navbar -->




        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
			    <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12 text-left">
                                <ul class="list list-inline">
                                    <li><a href="javascript:void(0);" data-toggle="collapse" data-target=".sidebarFilter"><i class="fa fa-align-left mr-5"></i> Filter</a></li>
                                </ul>
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <hr class="spacer-5"><hr class="spacer-20 no-border">

                        <div class="sidebarFilter collapse">
                            <div class="row">
							 <form  action="breq1.php" method="GET">
                                <div class="col-sm-3">
                                    <div class="widget">
                                        <h6 class="subtitle thin">Search</h6>

                                            <input type="text" id="lastname" class="form-control input-sm" name="keyword"  placeholder="Search">

                                    </div><!-- end widget -->
                                </div><!-- end col -->

                                <div class="col-sm-3">
                                    <div class="widget">
									                  <?php   $sql="SELECT * FROM `categories` WHERE NOT title ='Eco Friendly'  AND NOT title ='Innovation' LIMIT 5";
														$rst=mysqli_query($connection,$sql);
														?>
                                        <h6 class="subtitle thin">Categories</h6>

                                        <ul class="list list-unstyled">
										<?php while($rowt=mysqli_fetch_array($rst)){ ?>
                                            <li>
                                                <div >
                                                    <input name="categorytitle[]"  value="<?php echo $rowt['title'];?>"  type="checkbox" >
                                                    <label >
                                                        <?php echo $rowt['title'];?>
                                                    </label>
                                                </div>
                                            </li>
											<?php
											}?>

                                        </ul>
                                    </div><!-- end widget -->
                                </div><!-- end col -->
								<div class="col-sm-3">
                                    <div class="widget">
                                <?php   $query="SELECT * FROM `categories` WHERE NOT title ='Eco Friendly'  AND NOT title ='Innovation' LIMIT 5 ,10";
										$result=mysqli_query($connection,$query);
														?>

									</br>
									</br>
									</br>
                                        <ul class="list list-unstyled">
										<?php while($rowt=mysqli_fetch_array($result)){ ?>
                                            <li>
                                                <div>
                                                    <input  name="categorytitle[]"  value="<?php echo $rowt['title'];?>"  type="checkbox" >
                                                    <label >
                                                        <?php echo $rowt['title'];?>
                                                    </label>
                                                </div>
                                            </li>
											<?php
											}?>

                                        </ul>
                                    </div><!-- end widget -->
                                </div><!-- end col -->

                                <div class="col-sm-3">
                                    <div class="widget">
                                        <h6 class="subtitle thin">Popular tags</h6>
							<?php
							$query1="SELECT * FROM `categories`INNER JOIN subcategories ON(categories.catid=subcategories.catid) WHERE categories.title='Chile' ";
										$result1=mysqli_query($connection,$query1);
										?>
                                        <ul class="tags">
                                            <?php while($row=mysqli_fetch_array($result1)){
											?>

											<li>
                                                <a class="btn btn-gray-outline semi-circle btn-xs" href="breq1.php?title=<?php echo $row['subtitle']; ?>"><?php echo $row['subtitle']; ?></a>
                                            </li>
                                            <?php
											}?>
                                        </ul>
                                    </div><!-- end widget -->
                                </div><!-- end col -->
								</form>
                            </div><!-- end row -->

                            <hr class="spacer-30">

                        </div><!-- end sidebarFilter -->


                    </div><!-- end col -->
                </div><!-- end row -->
                <div class="row">
				  <div class="col-sm-2">  </div>
                    <!-- start sidebar -->
                   <!-- end col -->
                    <!-- end sidebar -->
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-12 text-left">
                                <h2 class="title">Buyings Requests</h2>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        </div>
                        <hr class="spacer-5"><hr class="spacer-20 no-border">




                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
							<table id="user" class="table table-bordered table-striped" style="clear: both">

                                    <!--<table class="table table-striped"> -->
                                        <thead>
                                            <tr>
											    <th>Id</th>
                                                <th>Product Name</th>

                                                <th>Quantity</th>
											    <th>Deadline</th>
                                                <th>Image</th>
                                            </tr>
                                        </thead>
                                        <tbody>
				<?php
			$email=$_SESSION['uemail'];



			$querygetrequest="SELECT * FROM `buyerrequests`";
			$resultrequests=mysqli_query($connection,$querygetrequest);
			while($rowreq=mysqli_fetch_array($resultrequests)){
			?>

                                            <tr >
											    <td >
                                                    <a href="#">
                                                        <?php echo $rowreq['buyreq_id'];?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="buyerrequests.php?reqid=<?php echo $rowreq['buyreq_id'];?>">
                                                       <?php echo $rowreq['prod_name'];?>
                                                    </a>
                                                </td>
                                                <td>
                                                 <?php echo $rowreq['quantity'];?>

                                                </td>
												<td>
												 <?php echo $rowreq['dtym'];?>
												 </td>
                                                <td style="width:30px;">
                                                   <img style="height:40px; width:50px; margin-top:-10px;margin-bottom:-8px; " src="ReqImages/<?php echo $rowreq['image']; ?>" alt="productImage">
                                                </td>



                                            </tr>
                          <?php


                            }


                          ?>

                                        </tbody>
                                    </table><!-- end table -->
                                </div><!-- end table-responsive -->

                                <hr class="spacer-10 no-border">


                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- end section -->

        <!-- start footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="icon-boxes style1">
                            <div class="icon">
                                <i class="fa fa-truck text-gray"></i>
                            </div><!-- end icon -->
                            <div class="box-content">
                                <h6 class="alt-font text-light text-uppercase">Free Shipping</h6>
                                <p class="text-gray">Aenean semper lacus sed molestie sollicitudin.</p>
                            </div>
                        </div><!-- icon-box -->
                    </div><!-- end col -->
                    <div class="col-sm-3">
                        <div class="icon-boxes style1">
                            <div class="icon">
                                <i class="fa fa-life-ring text-gray"></i>
                            </div><!-- end icon -->
                            <div class="box-content">
                                <h6 class="alt-font text-light text-uppercase">Support 24/7</h6>
                                <p class="text-gray">Aenean semper lacus sed molestie sollicitudin.</p>
                            </div>
                        </div><!-- icon-box -->
                    </div><!-- end col -->
                    <div class="col-sm-3">
                        <div class="icon-boxes style1">
                            <div class="icon">
                                <i class="fa fa-gift text-gray"></i>
                            </div><!-- end icon -->
                            <div class="box-content">
                                <h6 class="alt-font text-light text-uppercase">Gift cards</h6>
                                <p class="text-gray">Aenean semper lacus sed molestie sollicitudin.</p>
                            </div>
                        </div><!-- icon-box -->
                    </div><!-- end col -->
                    <div class="col-sm-3">
                        <div class="icon-boxes style1">
                            <div class="icon">
                                <i class="fa fa-credit-card text-gray"></i>
                            </div><!-- end icon -->
                            <div class="box-content">
                                <h6 class="alt-font text-light text-uppercase">Payment 100% Secure</h6>
                                <p class="text-gray">Aenean semper lacus sed molestie sollicitudin.</p>
                            </div>
                        </div><!-- icon-box -->
                    </div><!-- end col -->
                </div><!-- end row -->

                <hr class="spacer-30">

                <div class="row">
                    <div class="col-sm-3">
                        <h5 class="title">Plus</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin suscipit, libero a molestie consectetur, sapien elit lacinia mi.</p>

                        <hr class="spacer-10 no-border">

                        <ul class="social-icons">
                            <li class="facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                            <li class="twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                            <li class="dribbble"><a href="javascript:void(0);"><i class="fa fa-dribbble"></i></a></li>
                            <li class="linkedin"><a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a></li>
                            <li class="youtube"><a href="javascript:void(0);"><i class="fa fa-youtube"></i></a></li>
                            <li class="behance"><a href="javascript:void(0);"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div><!-- end col -->
                    <div class="col-sm-3">
                        <h5 class="title">My Account</h5>
                        <ul class="list alt-list">
                            <li><a href="my-account.html"><i class="fa fa-angle-right"></i>My Account</a></li>
                            <li><a href="wishlist.html"><i class="fa fa-angle-right"></i>Wishlist</a></li>
                            <li><a href="cart.html"><i class="fa fa-angle-right"></i>My Cart</a></li>
                            <li><a href="checkout.html"><i class="fa fa-angle-right"></i>Checkout</a></li>
                        </ul>
                    </div><!-- end col -->
                    <div class="col-sm-3">
                        <h5 class="title">Information</h5>
                        <ul class="list alt-list">
                            <li><a href="about-us-v1.html"><i class="fa fa-angle-right"></i>About Us</a></li>
                            <li><a href="faq.html"><i class="fa fa-angle-right"></i>FAQ</a></li>
                            <li><a href="privacy-policy.html"><i class="fa fa-angle-right"></i>Privacy Policy</a></li>
                            <li><a href="contact-v1.html"><i class="fa fa-angle-right"></i>Contact Us</a></li>
                        </ul>
                    </div><!-- end col -->
                    <div class="col-sm-3">
                        <h5 class="title">Payment Methods</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <ul class="list list-inline">
                            <li class="text-white"><i class="fa fa-cc-visa fa-2x"></i></li>
                            <li class="text-white"><i class="fa fa-cc-paypal fa-2x"></i></li>
                            <li class="text-white"><i class="fa fa-cc-mastercard fa-2x"></i></li>
                            <li class="text-white"><i class="fa fa-cc-discover fa-2x"></i></li>
                        </ul>
                    </div><!-- end col -->
                </div><!-- end row -->

                <hr class="spacer-30">

                <div class="row text-center">
                    <div class="col-sm-12">
                        <p class="text-sm">&COPY; 2017. Made with <i class="fa fa-heart text-danger"></i> by <a href="javascript:void(0);">DiamondCreative.</a></p>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </footer>
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
