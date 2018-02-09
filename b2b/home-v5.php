<?php 
session_start();
include('Connect.php');
include('head.php');

$show=0;
if(isset($_POST['requestSend']))
	{
$user =$_SESSION['uemail'];
$prod_name=$_POST['pname'];
$description=$_POST['description'];

$target_dir = "ReqImages/";
$target_file = $target_dir . basename($_FILES["pimage"]["name"]);
$image=$_FILES['pimage']['name'];
$filelocation = $target_dir.$image;
$temp = $_FILES['pimage']['tmp_name'];
move_uploaded_file($temp, $filelocation);

 $query = "INSERT INTO buyerrequests(BuyerName,prod_name,bmessage,image,buyer_id) VALUES ('$user', '$prod_name','$description' ,'$image',0)";
 //echo $query;
 $result=mysqli_query($connection,$query); 
  	 if($result){
		 ?>
		 <script>
		 alert('Sucessfully Request Send!');
		 </script>
		 <?php
		 
	 }
	 else{
			 ?>
		 <script>
		 alert('Request Send Error!');
		 </script>
		 <?php
	 }
		
		}          
 
 
?>

    <body>
        
       
        
        <!-- start topBar -->
     <?php include('topbar.php');
	 ?>
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
                                    <select class="form-control input-lg" name="category">
                                        <option value="all">All Categories</option>
                                        <optgroup label="Mens">
                                            <option value="shirts">Shirts</option>
                                            <option value="coats-jackets">Coats & Jackets</option>
                                            <option value="underwear">Underwear</option>
                                            <option value="sunglasses">Sunglasses</option>
                                            <option value="socks">Socks</option>
                                            <option value="belts">Belts</option>
                                        </optgroup>
                                        <optgroup label="Womens">
                                            <option value="bresses">Bresses</option>
                                            <option value="t-shirts">T-shirts</option>
                                            <option value="skirts">Skirts</option>
                                            <option value="jeans">Jeans</option>
                                            <option value="pullover">Pullover</option>
                                        </optgroup>
                                        <option value="kids">Kids</option>
                                        <option value="fashion">Fashion</option>
                                        <optgroup label="Sportwear">
                                            <option value="shoes">Shoes</option>
                                            <option value="bags">Bags</option>
                                            <option value="pants">Pants</option>
                                            <option value="swimwear">Swimwear</option>
                                            <option value="bicycles">Bicycles</option>
                                        </optgroup>
                                        <option value="bags">Bags</option>
                                        <option value="shoes">Shoes</option>
                                        <option value="hoseholds">HoseHolds</option>
                                        <optgroup label="Technology">
                                            <option value="tv">TV</option>
                                            <option value="camera">Camera</option>
                                            <option value="speakers">Speakers</option>
                                            <option value="mobile">Mobile</option>
                                            <option value="pc">PC</option>
                                        </optgroup>
                                    </select>
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
                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Compare">
                                <i class="fa fa-refresh"></i>
                                <sub>2</sub>
                            </a>
                        </div>
                    </div><!-- end col -->
                </div><!-- end  row -->
            </div><!-- end container -->
        </div><!-- end middleBar -->
     
    
       <?php include('navh.php');
	   ?>
        
        <!-- start section -->
        <section class="section light-backgorund">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-md-3">
                        <div class="navbar-vertical">
                            <ul class="nav nav-stacked">
                                <li class="header">
                                    <h6 class="text-uppercase">Categories <i class="fa fa-navicon pull-right"></i></h6>
                                </li>
								<?php 
							$sql="Select * from `categories`";
							$result=mysqli_query($connection,$sql);
							while($row=mysqli_fetch_array($result)){
								
								$title=$row['title'];
							
								?>
                                <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                     <?php echo $title; ?>
									 <i class="fa fa-angle-right pull-right"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0);">Shirts</a></li>
                                        <li><a href="javascript:void(0);">Coats & Jackets</a></li>
                                        <li><a href="javascript:void(0);">Underwear</a></li>
                                        <li><a href="javascript:void(0);">Sunglasses</a></li>
                                        <li><a href="javascript:void(0);">Socks</a></li>
                                        <li><a href="javascript:void(0);">Belts</a></li>
                                    </ul>
									
                                </li>
                               <?php
									}
									?>
									 <li><a href="javascript:void(0);">Bags</a></li>
                                <li><a href="javascript:void(0);">Shoes</a></li>
                                <li><a href="javascript:void(0);">HouseHolds</a></li>
                                <li><a href="javascript:void(0);">Bags</a></li>
                                <li><a href="javascript:void(0);">Bags</a></li>  <li><a href="javascript:void(0);">Shoes</a></li>
                                <li><a href="javascript:void(0);">HouseHolds</a></li>
                              </ul>
                        </div><!-- end navbar-vertical -->
                    </div><!-- end col -->
                    <div class="col-sm-8 col-md-9">
                        <div class="owl-carousel slider owl-theme">
                            <div class="item">
                                <figure>
                                    <a href="javascript:void(0);">
                                        <img style="width:900px; height:420px" src="img/slider/slider_10.jpg" alt=""/>
                                    </a>
                                </figure>
                            </div><!-- end item -->
                            <div class="item">
                                <figure>
                                    <a href="javascript:void(0);">
                                        <img style="width:900px; height:420px"  src="img/slider/slider_09.jpg" alt=""/>
                                    </a>
                                </figure>
                            </div><!-- end item -->
                            <div class="item">
                                <figure>
                                    <a href="javascript:void(0);">
                                        <img style="width:900px; height:420px"  src="img/slider/slider_08.jpg" alt=""/>
                                    </a>
                                </figure>
                            </div><!-- end item -->
                        </div><!-- end owl carousel -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- end section -->
             <section class="section white-background">
            <div class="container">
			
			<div class="row">
			
                    <div class="col-sm-12">
					  <div class="title-wrap">
                            <h2 style="position: absolute; top: 150px;left: 0;width: 100%;   margin: 0 auto;"class="title text-white" class="title text-grey">MY Advertisement</h2>
                            <p style="position: absolute; top: 200px;left: 0;width: 100%;   margin: 0 auto;"class="title text-white" class="text-white">You Can Use Advertisement Here</p>
							<img style="width:1150px; height:300px" src="img/slider/slider_03.jpg" />
                        </div>
							
                      
                    </div><!-- end col -->
				
                </div><!-- end row -->
           
                
         
              <div class="row">
              <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="box-banner-img">
                            <figure>
                                <a href="#">
                                    <img style="height:262px;width:250px;" src="img/innovation.png" alt=""/>
                                </a>
                            </figure>
                        </div><!-- end box-banner-img -->
                    </div><!-- end col -->
					<div class="col-sm-6">
				
				
							<img style="width:500px; height:262px" src="img/slider/slider_03.jpg" />
											<div class="title-wrap">
												<h2  style="position: absolute; top: 130px;left: 0;width: 100%;   margin: 0 auto;"class="title text-white">Your Advertisement Here</h2>
												
											</div>
										
									
								
				
                    </div><!-- end col -->
                    <div class="col-sm-3">
                        <div class="box-banner-img">
                            <figure>
                                <a href="#">
                                    <img style="height:262px;width:250px;" src="img/ecofriendly.png" alt=""/>
                                </a>
                            </figure>
                        </div><!-- end box-banner-img -->
                    </div><!-- end col -->
                </div><!-- end row -->
				</div><!-- Main Col End -->
				</div> <!-- Main Row End -->
				
				
<hr>
           <?php
 $sql="SELECT * FROM products";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);    

?>
             
                       <div class="row">
                    <div class="col-sm-12">
                        <div class="owl-carousel column-4 owl-theme">
						 <?php
							while($row=$stmt->fetch_assoc())
							{
							?>
							<div class="item">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img  style="height:200px; width:300px;" src="images/<?php echo $row['image']; ?>" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <div class="price">
                                            <small class="amount off">$<?php $price =$row['price']; ?></small>
											<?php
															$p = $price -10;
											?>
                                            <span class="amount text-primary">$<?php echo $p ?></span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end item -->
							<?php
							}
							?>
                      
                            </div><!-- end item -->
                        </div><!-- end owl carousel -->
                    </div><!-- end col -->
                </div><!-- end row -->
            		
<hr>
  <div class="row">
     <div class="col-sm-12">
	  <div class="col-sm-1">
	  </div>
	
     
  
    <div class="col-sm-6">
	<img style="width:600px;height:180px;" src="img/banner.png" alt=""/>
     
    </div>
	
	 <div class="col-sm-4">
	<img style="width:400px;height:180px;" src="img/banner.png" alt=""/>
     
    </div>
	<div class="col-sm-1">
	  </div>
	</div>
</br>
</div>
</div>

  
    <div class="container">
	<div class="row">
				 <div class="col-sm-4">
    				<h2 class="title">Request Sellers</h2>  <br>
                        <form method="POST" action="index.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label >Prodcut Name</label>
                                <input name="pname" type="text" id="firstname" class="form-control input-lg" required placeholder="Product Name">
                            </div>
                           
                            
                    
                            <div class="form-group">
                                <label for="pimage">Product Image</label>
                                <input type="file" name="pimage"   required class="form-control input-lg">
                           
							   </div>
                           
                            <div class="form-group">
                                <label class="control-label" for="message" name="description">Descirption</label>
                                <textarea id="message" rows="5" class="form-control" required placeholder="Description ..." name="description"></textarea>
                            </div>
                       <center>    
                            
                            <div class="form-group">
                                <input type="submit" class="btn btn-success round btn-md"  name="requestSend" value="Request Now">
                            </div>
                        </form>  
                         
						</center>
									<div style="padding-left:10px;"class="btn-group">
									<button type="button" class="btn btn-default btn btn-lg" style="width:100%;">
									CHECK LIST OF BUYER REQUEST
									</button>
								
								</div>
						
                    </div><!-- end col -->
              
                                    
       
         
               
                        <?php
 $sql="SELECT * FROM products LIMIT 8";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);    

?>
				 <div class="col-sm-8">
                        <div class="title-wrap">
                            <h2 class="title"><span class="text-primary"> MADE</span> IN <span class="text-primary"> CHILLE</span></h2>
							  <div class="row column-4">
                  <?php
    while($row=$stmt->fetch_assoc())
    {
	?>  
                <div class="col-sm-6 col-md-3">
                        <div class="thumbnail store style1">
                            <div class="header">
                                <div class="badges">
                                    <span class="product-badge top left primary-background text-white semi-circle">Sale</span>
                                    <span class="product-badge top right text-warning">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </span>
                                </div>
                                <figure class="layer">
                                    <a href="javascript:void(0);">
                                        <img style="height:150px; width:140px" src="images/<?php echo $row['image']; ?>" alt="">
                                  
                                    </a>
                                </figure>
                                <div class="icons">
                                    <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="caption">
                              
                                <div class="price">
                                    <small class="amount off">$<?php echo $price =$row['price']; ?></small>
									<?php
									$p =$price-10;
									?>
                                    <span class="amount text-primary">$<?php echo $p; ?></span>
                                </div>
                                <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                            </div><!-- end caption -->
                        </div><!-- end thumbnail -->
                    </div><!-- end col -->
					<?php
					}
					?>

                 </div><!-- end row -->
                                
                
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
				
					
     <hr>
            
         
			<div class="col-sm-12">
                        <div class="title-wrap">
                            <h2 class="title"> TOP<span class="text-primary"> SELECTED </span>PRODUCT</h2>
							</div>
			</div>				
         <?php
 $sql="SELECT * FROM products";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);    

?>
			<hr>
                       <div class="row">
                    <div class="col-sm-12">
                        <div class="owl-carousel column-4 owl-theme">
						  <?php
    while($row=$stmt->fetch_assoc())
    {
	?>
                            <div class="item">
                                <div class="thumbnail store style1">
                                    <div class="header">
                                        <figure class="layer">
                                            <a href="javascript:void(0);">
                                                <img  style="height:200px; width:230px;" src="images/<?php echo $row['image'];?>" alt="">
                                            </a>
                                        </figure>
                                        <div class="icons">
                                            <a class="icon semi-circle" href="javascript:void(0);" data-toggle="modal" data-target=".productQuickView"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <div class="price">
                                            <small class="amount off">$<?php echo $price = $row['price']; ?></small>
											<?php $p= $price-10; ?>
                                            <span class="amount text-primary">$<?php echo $p ?></span>
                                        </div>
                                        <a href="javascript:void(0);"><i class="fa fa-cart-plus mr-5"></i>Add to cart</a>
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end item -->
							<?php
							}
							?>
                          
                           
                           
                        </div><!-- end owl carousel -->
                    </div><!-- end col -->
                </div><!-- end row -->
            		
<hr>
  
      	
                <div class="row">
				
                    <div class="col-sm-12">
						<img style="width:1150px; height:370px" src="img/slider/slider_03.jpg" />
					  <div class="title-wrap">
                            <h2 style="position: absolute;   top: 150px;   left: 0;   width: 100%;   margin: 0 auto;" class="title text-white">Tell Us About Your Business</h2>
                          
                        </div>
				
                      
                    </div><!-- end col -->
					
                </div><!-- end row -->
                
             </div><!-- end container -->
     
            <div style="background-color:#D1F2EB;" class="container">
			
                <div class="row">
                    <div class="col-sm-12">
					  <div class="title-wrap">
                            <h2 class="title text-grey">The FromOzz B2B PLATFORM IN 3 Step</h2>
                          
                        </div>
					
                      
                    </div><!-- end col -->
					  <div class="row">
                    <div class="col-sm-6">
					  <div class="title-wrap" >
                         <center>   <h2 class="title text-grey">STEP 1 :</h2>
                          <p style="padding:50px 70px 50px 70px;  text-align: justify;
    text-justify: inter-word;" >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        
						</center>
						</div>
					
                      
                    </div><!-- end col -->
					   <div class="col-sm-6">
					  <div class="title-wrap">  
                                  <center>   <h2 class="title text-grey">STEP 2:</h2>
                          <p style="padding:50px 70px 50px 70px;  text-align: justify;
    text-justify: inter-word;" >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        
						</center>
                        </div>
					
                      
                    </div><!-- end col -->
					
                </div><!-- end row -->
				
					  <div class="row">
                    <div class="col-sm-6">
					  <div class="title-wrap">
                         
						          <center>   <h2 class="title text-grey">STEP 3 :</h2>
                          <p style="padding:50px 70px 50px 70px;  text-align: justify;
    text-justify: inter-word;" >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        
						</center>
                          
                        </div>
					
                      
                    </div><!-- end col -->
					   <div class="col-sm-6">
					  <div class="title-wrap">
                                     <center>   <h2 class="title text-grey">STEP 4 :</h2>
                          <p style="padding:50px 70px 50px 70px;  text-align: justify;
    text-justify: inter-word;" >Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        
						</center>
                        </div>
					
                      
                    </div><!-- end col -->
					
                </div><!-- end row -->
                
             </div><!-- end container -->
        </section>
       <section>
            <div class="container">
                <!-- Modal Product Quick View -->
                <div class="modal fade productQuickView" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h5>Lorem ipsum dolar sit amet</h5>
                            </div><!-- end modal-header -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class='carousel slide product-slider' data-ride='carousel' data-interval="false">
                                            <div class='carousel-inner'>
                                                <div class='item active'>
                                                    <figure>
                                                        <img src='img/products/men_01.jpg' alt='' />
                                                    </figure>
                                                </div><!-- end item -->
                                                <div class='item'>
                                                    <div class="embed-responsive embed-responsive-16by9">
                                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/NrmMk1Myrxc"></iframe>
                                                    </div>
                                                </div><!-- end item -->
                                                <div class='item'>
                                                    <figure>
                                                        <img src='img/products/men_03.jpg' alt='' />
                                                    </figure>
                                                </div><!-- end item -->
                                                <div class='item'>
                                                    <figure>
                                                        <img src='img/products/men_04.jpg' alt='' />
                                                    </figure>
                                                </div><!-- end item -->
                                                <div class='item'>
                                                    <figure>
                                                        <img src='img/products/men_05.jpg' alt=''/>
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
                                                <li data-target='.product-slider' data-slide-to='0' class='active'><img src='img/products/men_01.jpg' alt='' /></li>
                                                <li data-target='.product-slider' data-slide-to='1'><img src='img/products/men_02.jpg' alt='' /></li>
                                                <li data-target='.product-slider' data-slide-to='2'><img src='img/products/men_03.jpg' alt='' /></li>
                                                <li data-target='.product-slider' data-slide-to='3'><img src='img/products/men_04.jpg' alt='' /></li>
                                                <li data-target='.product-slider' data-slide-to='4'><img src='img/products/men_05.jpg' alt='' /></li>
                                                <li data-target='.product-slider' data-slide-to='5'><img src='img/products/men_06.jpg' alt='' /></li>
                                            </ol><!-- end carousel-indicators -->
                                        </div><!-- end carousel -->
                                    </div><!-- end col -->
                                    <div class="col-sm-7">
                                        <p class="text-gray alt-font">Product code: 1032446</p>

                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star-half-o text-warning"></i>
                                        <span>(12 reviews)</span>
                                        <h4 class="text-primary">$79.00</h4>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                                        <hr class="spacer-10">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <select class="form-control" name="select">
                                                    <option value="" selected>Color</option>
                                                    <option value="red">Red</option>
                                                    <option value="green">Green</option>
                                                    <option value="blue">Blue</option>
                                                </select>
                                            </div><!-- end col -->
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <select class="form-control" name="select">
                                                    <option value="">Size</option>
                                                    <option value="">S</option>
                                                    <option value="">M</option>
                                                    <option value="">L</option>
                                                    <option value="">XL</option>
                                                    <option value="">XXL</option>
                                                </select>
                                            </div><!-- end col -->
                                            <div class="col-md-4 col-sm-12">
                                                <select class="form-control" name="select">
                                                    <option value="" selected>QTY</option>
                                                    <option value="">1</option>
                                                    <option value="">2</option>
                                                    <option value="">3</option>
                                                    <option value="">4</option>
                                                    <option value="">5</option>
                                                    <option value="">6</option>
                                                    <option value="">7</option>
                                                </select>
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                        <hr class="spacer-10">
                                        <ul class="list list-inline">
                                            <li><button type="button" class="btn btn-default btn-md round"><i class="fa fa-shopping-basket mr-5"></i>Add to Cart</button></li>
                                            <li><button type="button" class="btn btn-gray btn-md round"><i class="fa fa-heart mr-5"></i>Add to Wishlist</button></li>
                                        </ul>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end modal-body -->
                        </div><!-- end modal-content -->
                    </div><!-- end modal-dialog -->
                </div><!-- end productRewiew -->
            </div><!-- end container -->
        </section>
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