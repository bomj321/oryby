<?php

include('Connect.php');
include('head.php');
 $user_id=$_GET["user_id"];
$sql="SELECT * FROM users  WHERE (user_id=$user_id)";
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}

$row = mysqli_fetch_array($stmt);


    $user_id=$row['user_id'];
	  $firstname = $row['firstName'];// item name
	$lastname = $row['lastName'];// item name
	$email = $row['email'];// item name
    $password=$row['password'];
	 $countryName=$row['countryName'];


if(isset($_POST['btn_save_updates']))
	{
	  
	  $firstname = $_POST['firstName'];// item name
	$lastname = $_POST['lastName'];// item name
	$email = $_POST['email'];// item name
    $password=$_POST['password'];
	 $countryName=$_POST['countryName'];
	 
	
$sql="UPDATE users  SET firstName='".$firstname."' ,lastName='".$lastname."' ,email='".$email."' ,password='".$password."' ,countryName='".$countryName."'  WHERE (user_id='$user_id')";
 mysqli_query($connection,$sql);
	 $stmt = $connection->prepare($sql);
     if($stmt === false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
 
	
			if($stmt->execute())
			{
				?>
                <script>
				      //  alert("Updated Your Profile!");  //not showing an alert box.
		window.location.href="buyeraccount.php";
				</script>
                <?php
			}
			else{
		
		}
		
	
		
	}
	
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
                                <h2 class="title">My Account</h2>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        
                        <hr class="spacer-5"><hr class="spacer-20 no-border">
                        
                        <div class="row">
                    <div class="col-sm-10">
                      
					   <form method="post"  enctype="multipart/form-data" class="form-horizontal">
		
 	
		<div class="form-group">
			
			  <input type="text" class="form-control" placeholder="Enter First Name" name="firstName"  value="<?php echo $firstname; ?>"
			  />
	</div>
			<div class="form-group">
			  <input type="text" class="form-control" placeholder="Enter Last Name" name="lastName"  value="<?php echo $lastname; ?>"/>
			</div>
			<div class="form-group">
			  <input type="text" class="form-control" placeholder="Enter Email" name="email" value="<?php echo $email; ?>"/>
			</div>
			<div class="form-group">
			  <input type="password" class="form-control" placeholder="Enter Password" name="password" value="<?php echo $password; ?>"/>
			</div>
				<div class="form-group">
			  <input type="text" class="form-control" placeholder="Enter Country" name="countryName" value="<?php echo $countryName; ?>"/>
			</div>
		
		


     
  <td colspan="2"><center><button type="submit" name="btn_save_updates" class="btn btn-default" style="border-style:solid;border-width:1px;border-color:gray;color:#066;background:#ccc"><i class="fa fa-refresh" >
       &nbsp; UPDATE ITEM</i>
        </button>
           
         
        </center>
        
        </td>
  </tr>
    
</form>	
					  
					  
					  
					  
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