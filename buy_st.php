

<?php session_start();
    if(!isset($_SESSION['uemail'])):
        header('location:singlelogin.php');
    endif;
require 'Connect.php';
$email = $_SESSION['uemail']; //email del usuario logueado
$usuario="SELECT * FROM users where email='$email'";
$datos_usuario=mysqli_query($connection,$usuario);
$datos=mysqli_fetch_array($datos_usuario);
$id_user=$datos['user_id'];//id del usuario logueado
$user_email=$datos['email'];//email del usuario logueado
?>

    <body>
       <?php
       require 'topbar.php';
       include('middlebar.php');
       include('navh.php');
       ?>
        <!-- end topBar -->

        <!-- start navbar -->




        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
				  <div class="col-sm-2">  </div>
                    <!-- start sidebar -->
                   <!-- end col -->
                    <!-- end sidebar -->
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-12 text-left">
                                <h2 class="title">Buy Show Case and Top List</h2>
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <hr class="spacer-5"><hr class="spacer-20 no-border">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Products</th>
												<th>Price</th>
												<th colspan="1"><i class="fa fa-shopping-cart pull-right"></i></th>
											</tr>
										</thead>
										<tbody id="<?php echo $user_email;?>">
											<tr class="favory">
												<td><a class="10 top List">10 Top List</a></td>
												<td><p class="20 USD">20 USD</p></td>
												<td><a class="btn btn-default btn-md round pull-right"><i class="fa fa-shopping-basket"></i>Buy Now</a></li>
											</tr>
											<tr class="favory">
												<td><a class="5 Show Case" style="margin-left:1.5rem">5 Show Case</a></td>
												<td><p class="20 USD">20 USD</p></td>
												<td><a class="btn btn-default btn-md round pull-right"><i class="fa fa-shopping-basket"></i>Buy Now</a></li>
											</tr>
											<tr class="favory">
												<td><a class="20 Top List - 10 Show Case">20 Top List - 10 Show Case</a></td>
												<td><p class="60 USD">60 USD</p></td>
												<td><a class="btn btn-default btn-md round pull-right"><i class="fa fa-shopping-basket"></i>Buy Now</a></li>
											</tr>
											<tr class="favory">
												<td><a class="50 Top List – 25 Show Case">50 Top List – 25 Show Case</a></td>
												<td><p class="100 USD">100 USD</p></td>
												<td><a class="btn btn-default btn-md round pull-right"><i class="fa fa-shopping-basket"></i>Buy Now</a></li>
											</tr>
										</tbody>
									</table><!-- end table -->
                                </div><!-- end table-responsive -->
                                <hr class="spacer-10 no-border">
                                <a href="index.php" class="btn btn-light semi-circle btn-md pull-left">
                                    <i class="fa fa-arrow-left mr-5"></i> Continue shopping
                                </a>
                                <a href="checkout.php" class="btn btn-default semi-circle btn-md pull-right">
                                    Checkout <i class="fa fa-arrow-right ml-5"></i>
                                </a>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- end section -->

    <?php include('footer.php');?>

        <!-- JavaScript Files -->
        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
		<script type="text/javascript" src="js/default2.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>