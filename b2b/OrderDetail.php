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
                                    <a href="cart.php">My Cart <span class="text-primary">(3)</span></a>
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
                                <h2 class="title">Order Details</h2>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        
                        <hr class="spacer-5"><hr class="spacer-20 no-border">
                  			
				                   		<?php
include('Connect.php');
$order_id=$_GET['id'];
 $sql="SELECT * FROM orders INNER JOIN payment ON(orders.paymentid = payment.paymentid) INNER JOIN orderDetail ON(orders.order_id= orderDetail.order_id) WHERE orders.order_id='$order_id'";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
 $nr=mysqli_num_rows($stmt);
$row =mysqli_fetch_array($stmt);
?>  
										<table id="user" class="table table-bordered table-striped" style="clear: both">
											<tbody>
												<tr>
													<th >Order ID:</th>
													<td><?php echo $row['order_id'];?></td>
												</tr>
												<tr>
													<th >Order Status:</td>
													<td><?php echo $row['orderstatus'];?></td>
												</tr>
												<tr>
													<th >Order By:</th>
													<td><?php echo $row['email'];?></td>
												</tr>
												<tr>
													<th >Order To:</th>
													<td><?php echo $row['email'];?></td>
												</tr>
												<tr>
													<th >Order Price:</th>
												<td><?php echo $row['tota_price'];?></td>
												</tr>
												<tr>
													<th >Order Date:</th>
													<td><?php echo $row['orderdate'];?></td>
												</tr>
												<tr>
													<th >Payment Method:</td>
													<td><?php echo $row['paymenttype'];?></td>
												</tr>
													<tr>
													<th >Product ID:</td>
													<td><?php echo $row['pid'];?></td>
												</tr>
												
												
				
											</tbody>
										</table>
		
						
				   
				   <br>
				   
                                
                                <hr class="spacer-10 no-border">
									   <div class="row">
                            <div class="col-sm-12 text-left">
                                <h2 class="title">Products Details</h2>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        								
				                   		<?php
include('Connect.php');
$order_id=$_GET['id'];
 $sql="SELECT * FROM  orders INNER JOIN orderDetail ON(orders.order_id = orderDetail.order_id) INNER JOIN products ON(orderDetail.pid= products.pid) Where orders.order_id='$order_id'";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
  $nr=mysqli_num_rows($stmt);
 ?>
 	<table id="user" class="table table-bordered table-striped" style="clear: both">
	<thead>
	<tr>
	<th>Product ID:</th>
	<th>Product Name:</th>
	<th>Product Price:</th>
	<th>Product Description:</th>
	<th>Product Images:</th>
	
	</tr>
	</thead>
											<tbody>
<?php
while($row=mysqli_fetch_array($stmt))
{
?>
<tr>

<td><?php
echo $pid = $row['pid'];
?>
</td>
<td><?php
echo $row['ntitle'];
?>
</td>
<td><?php
echo  $row['price'];
?>
</td>
<td><?php
echo  $row['fulldescription'];
?>
</td>
<td>
<?php
$myString = $row['image'];
$cl = explode(',', $myString);
?><img style="height:100px; width:100px;"src="images/<?php
echo  $cl[0];
?>">
</td>
</tr>
<?php
}
?>  
		</tbody>
		</table>
												
						  <br>
				   
                              <hr class="spacer-10 no-border">
									   <div class="row">
                            <div class="col-sm-12 text-left">
                                <h2 class="title">Buyer Details</h2>
                            </div><!-- end col -->
                        </div><!-- end row -->
				
				   					
				                   		<?php
include('Connect.php');
$order_id=$_GET['id'];
 $sql="SELECT * FROM  orders INNER JOIN orderDetail ON(orders.order_id = orderDetail.order_id) INNER JOIN payment ON(orders.paymentid=payment.paymentid) INNER JOIN products ON(orderDetail.pid= products.pid) INNER JOIN users ON(payment.email= users.email) Where orders.order_id='$order_id'";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
  $nr=mysqli_num_rows($stmt);
 ?>
 	<table id="user" class="table table-bordered table-striped" style="clear: both">
	<thead>
	<tr>
	<th>Buyer ID:</th>
	<th>Buyer Name:</th>
	<th>Buyer Email:</th>
	<th>Country:</th>
	
	
	</tr>
	</thead>
											<tbody>
<?php
while($row=mysqli_fetch_array($stmt))
{
?>
<tr>

<td><?php
echo $userid = $row['user_id'];
?>
</td>
<td><?php
echo $row['firstName'];
?>
</td>
<td><?php
echo  $row['email'];
?>
</td>
<td><?php
echo  $row['countryName'];
?>
</td>

</tr>
<?php
}
?>  
		</tbody>
		</table>
												
												
												
				
												
																				
                                
                              
                          
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