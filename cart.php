<?php session_start();
require 'Connect.php';
include('head.php');
$email=$_SESSION['uemail'];

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
 
$aside1 = "SELECT * FROM cart2 WHERE email = '$email' ";
$asideres1 = $connection->query($aside1);

while ($rowcart=mysqli_fetch_array($asideres1)) {





		   ?>


                                            <tr>
											<td>

										   

<form action="deletecart.php?pid=<?php echo $rowcart['pid'];?>" method="post">
  <input type="submit" value="Delete"></i></form>	</td>
                                                <td>
                                                    <a href="#">
                                                        <img width="60px" src="images/<?php echo $rowcart['image'];?>" alt="product">
                                                    </a>
                                                </td>
                                                <td>

                                                    <h6 class="regular"><?php echo $val['p_title'];?></h6>
                                                    <p><?php echo $rowcart['description'];?></p>
                                                </td>
                                                <td>
                                                    <span>$<?php echo $rowcart['price'];?></span>
                                                </td>

                                                <td>

          <form action="cart1.php?pid=<?php echo $rowcart['pid'];?>&price=<?php echo $rowcart['price'];?>" method="post" >
		   <input type="hidden" name="item[]" value="<?php echo $item ?>"><br>
			<select class="form-control" name="qty">
                            <option><?php echo $rowcart['quantity'];?></option>

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
												<?php $total_price =$rowcart['quantity'] *$rowcart['price']; ?>
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

    <?php
    include('footer.php');
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
