<?php session_start();
include('Connect.php');
include('head.php');
/*$sql = "SHOW COLUMNS FROM products";
$result = mysqli_query($connection,$sql);
while($row = mysqli_fetch_array($result)){
echo $row['Field']."<br>";
}
*/
?>
    <body>
            <?php include('topbar.php');  
	include('middlebar.php');
	 ?>
	 <!-- end topBar -->
       
       
        
        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    <!-- start sidebar -->
                    <div class="col-sm-3">
                        <div class="widget">
                            <h3>Account Navigation</h3>
                            
                            <ul class="list list-unstyled">
                                <li>
                                    <a href="buyeraccount.php">My Account</a>
                                </li>
                                <li>
                                    <a href="cart.php">My Cart <span class="text-primary">
                                    <?php echo "".sizeof($_SESSION['cart'])." "; ?></span></a>
                                </li>
                                <li class="active">
                                    <a href="buyerorders.php">My Order</a>
                                </li>
                             
                                <li>
                                    <a href="buyeraccount.php">Settings</a>
                                </li>
                            </ul>
                        </div><!-- end widget -->
                        
                        <div class="widget">
						<?php $query="SELECT * FROM products INNER JOIN categories ON(products.catid=categories.catid) Limit 2,3 ";
                           $result=mysqli_query($connection,$query);
						   $row=mysqli_fetch_array($result);
						      
							    $myString = $row['image'];
								$productType=$row['productType'];
								$cl = explode(',', $myString);
			   ?>
                            <h6 class="subtitle">New Collection</h6>
                            <figure>
                                <a href="javascript:void(0);">
                                    <img  style="height: 301px; width:250px;" src="images/<?php echo $cl[0];?>" alt="><?php echo $row['ntitle']; ?>">
                                </a>
                            </figure>
                        </div><!-- end widget -->
                        
                        <div class="widget">
                            <h6 class="subtitle">Featured</h6>
                            <?php $query="SELECT * FROM products INNER JOIN categories ON(products.catid=categories.catid) Limit 2 ";
                           $result=mysqli_query($connection,$query);
						      
							  
			   ?>
                            <ul class="items">
							<?php 
							while( $row=mysqli_fetch_array($result)){ 
							   $myString = $row['image'];
								$productType=$row['productType'];
								$cl = explode(',', $myString);
								?>
                                <li> 
                                    <a href="shop-single-product-v1.html" class="product-image">
                                        <img src="images/<?php echo $cl[0]; ?>" alt="<?php echo $row['ntitle']; ?> ">
                                    </a>
                                    <div class="product-details">
                                        <p class="product-name"> 
                                            <a href="shop-single-product-v1.html"><?php echo $row['ntitle']; ?></a> 
                                        </p>
                                        <span class="price text-primary">$<?php echo $row['price']; ?></span>
                                        <div class="rate text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </li><!-- end item -->
								<?php
								}
								?>
                               
                            </ul>

                            <hr class="spacer-10 no-border">
                            <a href="allproduct.php" class="btn btn-default btn-block semi-circle btn-md">All Products</a>
                        </div><!-- end widget -->
                    </div><!-- end col -->
                    <!-- end sidebar -->
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-12 text-left">
                                <h2 class="title">My Order</h2>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        
                        <hr class="spacer-5"><hr class="spacer-20 no-border">
                        
                        <div class="row">
                    <div class="col-sm-12 vertical-align">
					
                      
                             <div>    
								<table id="example" class="table table-striped" cellspacing="0" width="100%">
                                    <!--<table class="table table-striped"> -->
                                        <thead>
                                            <tr>
											    <th>Order Id</th>
												<th>Products</th>
                                                <th>Total Price</th>
											    <th>Date </th>
                                                <th>Order Action</th>
										
												<th>Order Details</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
				<?php 
				$email = $_SESSION['uemail'];
				$querygetrequest="SELECT * FROM orders INNER JOIN payment ON(orders.paymentid = payment.paymentid) INNER JOIN orderDetail ON(orders.order_id= orderDetail.order_id) INNER JOIN products ON(orderDetail.pid=products.pid)Where orders.email='$email'";
			$resultrequests=mysqli_query($connection,$querygetrequest);
			while($rowreq=mysqli_fetch_array($resultrequests)){
	?>
			
			
						
                                            <tr>
											    <td>
                                                    <a  href="buyerOrderDetail.php?id=<?php echo $orderId; ?>">
                                                        <p><?php echo  $orderId =$rowreq['order_id'];?></p>
                                                    </a> 
                                                </td>
												<td>
                                                    <a  href="buyerOrderDetail.php?id=<?php echo $orderId; ?>">
																									<?php
																		 $myString = $rowreq['image'];
																		 $cl = explode(',', $myString);
																		?><img style="height:60px; width:60px;" src="images/<?php
																		echo  $cl[0];
																		?>">
                                                    </a> 
                                                </td>
                                             
                                                <td>
                                                    <h6 class="regular">$<?php echo $rowreq['tota_price'];?></h6>
                                                   
                                                </td>
											   <td>
                                                    <h6 class="regular"><?php echo $rowreq['orderdate'];?></h6>
                                                   
                                                </td>
												
												 <td>
											
            
												
							       <?php echo $rowreq['orderstatus'];?>
							 </td>
                                  
                                      <td></br>
         <a    href="buyerOrderDetail.php?id=<?php echo $orderId;?>"><i class="fa fa-eye"></i></a></td>
  								 
										 
                                               
                                                
                                              
                                            </tr>
                          <?php 

                         
                            } 

  
                          ?>
                                            
                                        </tbody>
                                    </table><!-- end table -->
                                </div>
						
				   
				   
                                
                                <hr class="spacer-10 no-border">
                                
                                <a href="index.php" class="btn btn-light semi-circle btn-md">
                                    <i class="fa fa-arrow-left mr-5"></i> Shopping
                                </a>
                          
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