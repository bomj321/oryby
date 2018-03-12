<?php session_start();
require 'Connect.php'; 

$pid=$_GET['pid'];
$_SESSION['pid']=$pid;
//$cartArray=array($pid);
//$_SESSION['proid'][]=$cartArray; 
//print_r($_SESSION['proid']); 
$query="SELECT * from products where pid=$pid";
$res=mysqli_query($connection,$query);
$row=mysqli_fetch_array($res);
$myString = $row['image'];
$cl = explode(',', $myString);

require('head.php');
?>
    <body>
              <!-- start topBar -->
        <?php require 'topbar.php'; ?>
        <!-- end topBar -->
        
        <!-- start navbar -->
		    <?php require 'navh.php'; ?>
       <!-- end navbar -->
        
     
        
        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    <!-- start sidebar -->
                    <div class="col-sm-4">
                                <div class='carousel slide product-slider' data-ride='carousel' data-interval="false">
                            <div class='carousel-inner'>
                                <div class='item active'>
                                    <figure>
                                      <img src="images/<?php echo $cl[0]; ?>" alt="" /> 
                                    </figure>
                                </div><!-- end item -->
                                <div class='item'>
                                    <figure>
                                        <img src="images/<?php echo $cl[1];  ?>" alt="" />
                                    </figure>
                                </div><!-- end item -->
								<div class='item'>
                                    <figure>
                                        <img src="images/<?php echo $cl[2];  ?>" alt="" />
                                    </figure>
                                </div><!-- end item -->
								<div class='item'>
                                    <figure>
                                        <img src="images/<?php echo $cl[3];  ?>" alt="" />
                                    </figure>
                                </div><!-- end item -->
								<div class='item'>
                                    <figure>
                                        <img src="images/<?php echo $cl[4];  ?>" alt="" />
                                    </figure>
                                </div><!-- end item -->
                                <div class='item'>
                                    <figure>
                                        <img src="images/<?php echo $cl[5];  ?>" alt="" />
                                    </figure>
                                </div><!-- end item -->
                               
                                

                                <!-- Arrows -->
                                <a class='left carousel-control' href='.product-slider' data-slide='prev'>
                                    <span class='fa fa-angle-left'></span>
                                </a>
                                <a class='right carousel-control' href='.product-slider' data-slide='next'>
                                    <span class='fa fa-angle-right'></span>
                                </a>
                            </div><!-- end carousel-inner -->

                            <!-- thumbs -->
                            <ol class='carousel-indicators mCustomScrollbar meartlab'>
                                <li data-target='.product-slider' data-slide-to='0' class='active'><img src='images/<?php echo $cl[0]; ?>' alt='' /></li>
								 <li data-target='.product-slider' data-slide-to='1' ><img src='images/<?php echo $cl[1]; ?>' alt='' /></li>
								  <li data-target='.product-slider' data-slide-to='2' ><img src='images/<?php echo $cl[2]; ?>' alt='' /></li>
                                 <li data-target='.product-slider' data-slide-to='2' ><img src='images/<?php echo $cl[3]; ?>' alt='' /></li>
								   <li data-target='.product-slider' data-slide-to='2' ><img src='images/<?php echo $cl[4]; ?>' alt='' /></li>
								    
                            </ol><!-- end carousel-indicators -->
                        </div><!-- end carousel -->
                    </div><!-- end col -->
                    <!-- end sidebar -->
                    <div class="col-sm-8">
                        <div class="row">
                            <div  style="margin-left:70px;" class="col-sm-12">
                                <h2 class="title"><?php echo $row['ntitle']; ?></h2>
                                   </br>
								   </br>
								
                                  <ul class="list list-inline">
                                  <h6 style="display:inline;">Price:</h6> <li><p class="text-primary">$<?php echo $row['price']; ?></p></li> <br>
								  <h6 style="display:inline;">Minimum Order:</h6> <li><p class="text-primary"><?php echo $row['quantity']; ?></p></li> Units<br>
                                 <h6 style="display:inline;"> Delivery Detail:</h6> <li><p class="text-primary">20 days after payment</p></li>  <br>
								 <h6 style="display:inline;">Payment method:</h6> <li><p class="text-primary">PayPal</p></li> 
                                       <!-- <li>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star text-warning"></i>
                                            <i class="fa fa-star-half-o text-warning"></i>
                                        </li> 
                                        <li><a href="javascript:void(0);">(4 reviews)</a></li> -->
                                    </ul>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        
                        
                        
                        <div class="row">
                            <div class="col-sm-12">
                               
                                
                                <div class="row" >
                                 
                               
                                    <div  class="col-md-4 col-sm-12" style="margin-left:70px;">
                                        <select class="form-control" name="select">
                                            <option value="" selected>QTY</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
											  <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                                <hr class="spacer-15">
                                
						<ul  class="list list-inline">
						
						 <li  style="margin-left:90px;"><button type="button" class="btn btn-gray btn-md round" style="height:80px; "data-toggle="modal" data-target="#myModal"><i class="fa fa-heart mr-5"></i>  Ask   A </br>Supplier</button></li>
						 
						   <li style="margin-left:150px;"><a  href="mycartArry.php?pid=<?php echo $pid;?>" class="btn btn-default btn-md round"><i class="fa fa-shopping-basket mr-5"></i>Buy Now</a></li>
                                </ul>
                    							
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->
								                   		<?php
include('Connect.php');
$pid =$_GET['pid'];
 $sql="SELECT * FROM  products  INNER JOIN users ON(products.user_id= users.user_id) INNER JOIN seller ON(users.email=seller.email) Where products.pid ='$pid'";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}

  $nr=mysqli_num_rows($stmt);
$row=mysqli_fetch_array($stmt);
  ?>
                  <hr class="spacer-60">
				         <div class="row">
                           
							
                            <div class="col-sm-5" style="border: 1px solid #333;">
							<h5 style="margin-top:50px;">Company Name : <label class="text-primary"><?php echo $row['company_name'];?></label></h5>
							<h5>Country /Business Type : <label class="text-primary"><?php echo $row['countryName'];?> /<?php echo $row['businessType'];?></label></h5>
							<h5 style="margin-bottom:50px;">Supply Ability :<label class="text-primary">YES</label></h5>
							</div>
							
							  <div class="col-sm-5" style="border: 1px solid #333;">
							  <h5  style="margin-top:50px;">Seller Name :<label class="text-primary"><?php echo $row['firstName'];?>   <?php echo $row['lastName'];?></label></h5>
							<h5>Response Time : <label class="text-primary">With In 24 Hours</label></h5>
							<h5 style="margin-bottom:50px;">Response Rate :<label class="text-primary">100 %</label></h5>
							</div>
							   <div class="col-sm-2" style="border: 1px solid #333;">
							    <ul class="list list-inline">
   
						<a href="contactus.php"><h5  style="margin-top:60px; margin-bottom:75px; margin-left:20px;" type="button" class="btn btn-success btn-md round" ><i class="fa fa-address-book-o"></i>CONTACT SUPPLIER</h5></a>
						<!--<li><button  style="margin-top:50px; margin-bottom:60px; margin-left:100px;" type="button" class="btn btn-success btn-md round" data-toggle="modal" data-target="#myModal"><i class="fa fa-address-book-o"></i>Contact Supplier</button></li>
                             -->                        <!--  <li>Share this product: </li>
                                    <li>
                                        <ul class="social-icons style1">
                                            <li class="facebook"><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
                                            <li class="twitter"><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
                                            <li class="pinterest"><a href="javascript:void(0);"><i class="fa fa-pinterest"></i></a></li>
                                        </ul>
                                    </li>-->
                                </ul>
							</div>
							  
							
				 </div>
			<!-- Modal content-->
 <div class="modal fade" id="myModal" role="dialog">
    <form method="POST">
	<div class="modal-dialog">
    
     
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="float:left;">Ask Query to supplier</h4>
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
		<div class="row">
          <div class="col-lg-4">
		<h6>  Your Email: </h6>
		 <h6> Your Query:  </h6>
		  </div>
		   <div class="col-lg-8">
		
          <?php if(isset($_SESSION['uemail'])){ ?>
		 <input type="email" class="form-control" name="email" value="<?php echo $_SESSION['uemail'];?>"> 
		  <?php } else{?>
		  <input type="email" class="form-control" name="email" placeholder="Enter email"> 
		 <?php }?>
		 <textarea type="text" class="form-control" rows="5" name="qustion" placeholder="Your query...">  </textarea>
		
		  </div>
        </div>
		</div>
	
        <div class="modal-footer">
          <input type="submit" class="btn btn-success" value="Send" name="buyerquery">
		  </form>
        </div>
      </div>
      
    </div>
  </div>
  <!-- END Modal content-->  	  
	<?php	$pid =$_GET['pid'];
 $sql="SELECT * FROM  products  INNER JOIN users ON(products.user_id= users.user_id) INNER JOIN seller ON(users.email=seller.email) INNER JOIN categories ON (products.catid=categories.catid)Where products.pid ='$pid'";
 
$result=mysqli_query($connection,$sql);
if($result == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}

  $nr=mysqli_num_rows($result);
$rows=mysqli_fetch_array($result);
  ?>		  
                <hr class="spacer-60">
                
                <div class="row">
                    <div class="col-xs-12 col-sm-2">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs style2 tabs-left">
                            <li class="active"><a href="#description" data-toggle="tab">	Product Details</a>
							</li>
							  <li ><a href="#companyinfo" data-toggle="tab">Company Info</a>
							  </li>
                       
							 <li ><a href="#reviews" data-toggle="tab">Product Description</a></li>
                        </ul>
                    </div><!-- end col -->
					 <div class="col-xs-12 col-sm-1">
					 </div>
                    <div class="col-xs-12 col-sm-9">
                        <!-- Tab panes -->
                        <div class="tab-content style2">
                            <div class="tab-pane active" id="description">
                                <h5>Additional Info</h5>
                                <p><?php echo $row['fulldescription']; ?>
                                </p>
                                
                                <hr class="spacer-15">
                                
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <dl class="dl-horizontal">
                                            <dt>Dimensions</dt>
                                            <dd>120 x 75 x 90 cm</dd>
                                            <dt>Colors</dt>
                                            <dd><?php echo $row['color']; ?></dd>
                                            <dt>Materials</dt>
                                            <dd>cotton</dd>
                                        </dl>
                                    </div><!-- end col -->
                                    <div class="col-sm-12 col-md-6">
                                        <dl class="dl-horizontal">
                                            <dt>Weight</dt>
                                            <dd>1.65 kg</dd>
                                            <dt>Manufacturer</dt>
                                            <dd><?php echo $row['countryName']; ?></dd>
                                        </dl>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end tab-pane -->
							
							     <div  class="tab-pane" id="companyinfo">
                                <h5>Company Name</h5>
                                <p><?php echo $row['company_name']; ?>
                                </p>
                                
                                <hr class="spacer-15">
                                
                                <div class="row">
                                    <div class="col-sm-12 col-md-6">
                                        <dl class="dl-horizontal">
                                            <dt>Seller Name</dt>
                                            <dd><?php echo $row['firstName']; ?>  <?php echo $row['lastName']; ?></dd>
                                            <dt>Country</dt>
                                            <dd><?php echo $rows['countryName']; ?></dd>
                                            <dt>Business Type</dt>
                                            <dd><?php echo $rows['businessType']; ?></dd>
                                        </dl>
                                    </div><!-- end col -->
                                    <div class="col-sm-12 col-md-6">
                                        <dl class="dl-horizontal">
                                            <dt>Company Mail ID:</dt>
                                            <dd><?php echo $rows['email']; ?></dd>
                                            <dt>Company Description</dt>
                                            <dd><?php echo $rows['companyDescription']; ?></dd>
                                        </dl>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end tab-pane -->
                            <div class="tab-pane" id="reviews">
                            <div class="row">
                                
                                <h5>Company Description</h5>
                              
                                            <dd><?php echo $rows['companyDescription']; ?></dd>
                                </p>
                                
                                <hr class="spacer-15">
                                
                               
                                </div><!-- end row -->
                            </div><!-- end tab-pane -->
                        </div><!-- end tab-content -->
                    </div><!-- end col -->
                </div><!-- end row -->
                
                <hr class="spacer-60">
          
                
           
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