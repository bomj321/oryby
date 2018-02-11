<?php session_start();
require 'Connect.php';
include('head.php');

?>



    <body>

        <!-- start topBar -->
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
                                <h2 class="title">My Cart</h2>
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <hr class="spacer-5"><hr class="spacer-20 no-border">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
											 <th>Delete</th>
                                                <th colspan="2">Products</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th colspan="2">Total</th>
												  <th >Update</th>
                                            </tr>
                                        </thead>
                                        <tbody>


<?php
 $item=$_POST['item'];
while (list ($key1,$val1) = @each ($item)) {

unset($_SESSION['cart'][$val1]);
}



		    $id =0;
if($_SESSION['cart'] !=""){


		  foreach ($_SESSION['cart'] as $item => $val) {
		  echo "<form method=post action='cart.php'>";


					?>
			<?php  $item['p_id']; ?>


                                            <tr>
											<td>

										   <input type="hidden" name="item[]" value="<?php echo $item ?>">




  <input type="submit" value="Delete"></i></form>	</td>
                                                <td>
                                                    <a href="#">
                                                        <img width="60px" src="images/<?php echo $val['p_image'];?>" alt="product">
                                                    </a>
                                                </td>
                                                <td>

                                                    <h6 class="regular"><?php echo $val['p_title'];?></h6>
                                                    <p><?php echo $val['p_fulldesc'];?></p>
                                                </td>
                                                <td>
                                                    <span>$<?php echo $val['p_price'];?></span>
                                                </td>

                                                <td>
          <form action="cart1.php?pid=<?php echo $val['pid'];?>" method="post" >
		   <input type="hidden" name="item[]" value="<?php echo $item ?>"><br>
			<select class="form-control" name="qty">
			<option><?php echo $val['p_qty'];?></option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
														  <option>6</option>
														    <option>7</option>
															  <option>8</option>
															  <option>9</option>
															    <option>10</option>

                                                    </select>
                                                </td>
                                                <td>
												<?php $total_price =$val['p_qty'] *$val['p_price']; ?>
                                                    <span class="text-primary">$<?php echo $total_price;?></span>
                                                </td>
                                                <td>
												<td>
												<?php
												echo " <input type=hidden name=item[] value=$key> <br>";
?>
												</td>

                                        <td><button  name="btn_save_updates" type="submit">
																Update<i class="fa fa-refresh"></i>

															</button>
															</form>

						                        </td>
                                            </tr>
<?php

  $id++;
  }
  }
?>

                                        </tbody>
                                    </table><!-- end table -->
                                </div><!-- end table-responsive -->
                  									<?php


			if($id=$_REQUEST['code'] OR $id=$_SESSION['code'])
 {
			 $id=$_REQUEST['code'];
			unset($_SESSION['cart'][$id]);

}

			?>
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
