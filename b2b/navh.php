 <?php session_start();
require 'Connect.php'; 
/*$query="select * from users";
$result=mysqli_query($connection,$query);
$row=mysqli_fetch_array($result);  */
$usertype= $_SESSION['utype'];
error_reporting(0);
?>
<style>  
.navbar-default .navbar-nav>li>a {
   
    color: #777;
    padding-top: 0px !important;
	
	
}  </style>
 <div class="navbar yamm navbar-default" style="max-height:45px;min-height:44px;background:white">
 
            <div class="container">
                <div class="navbar-header" style="margin-top:-12px">
                    <button type="button" data-toggle="collapse" data-target="#navbar-collapse-3" class="navbar-toggle">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="index.php" class="navbar-brand visible-xs">
                        <img src="img/oryLogo.png" width="100" alt="logo">
                    </a>
                </div>
                <div id="navbar-collapse-3" class="navbar-collapse collapse" style="margin-left:40px;">
                    <ul class="nav navbar-nav" >
                        <!-- Home -->
                       
                           
                        <!-- end li dropdown -->    
                        <!-- Features -->
						  
						   
                         <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Buyer<i class="fa fa-angle-down ml-5"></i></a>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="allproduct.php">Shop Page</a></li>
                                <li><a href="startBuying.php">Start buying</a></li>
								 <li><a href="howToBuying.php">How to Buy</a></li>
                                <li><a href="buysecurtly.php">How to buy Securetly</a></li>
								 <li><a href="considerateToImport">What to considerate for import</a></li>
                                
                                
                            </ul><!-- end ul dropdown-menu -->
                        </li><!-- end li dropdown -->  
					 <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Supplier<i class="fa fa-angle-down ml-5"></i></a>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="startSelling.php">Start selling</a></li>
                                <li><a href="learnIncreaseSale.php">How to Increase Sales</a></li>
                               
								 <li><a href="considerateToExport.php">What to know for export</a></li>
                                
                                
                            </ul><!-- end ul dropdown-menu -->
                        </li><!-- end li dropdown -->          
					 
							<li class="dropdown left"><a href="membership.php">Membership</a> </li>
								<li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Help<i class="fa fa-angle-down ml-5"></i></a>
                            <ul role="menu" class="dropdown-menu">
                                <li><a href="faq.php">FAQ</a></li>
                                <li><a href="aboutus.php">About us</a></li>
                               
								 <li><a href="contactus.php">Contact us</a></li>
								 
								 <li><a href="Privacy.php">Privacy policy</a></li>
                                
                                
                            </ul><!-- end ul dropdown-menu -->
                        </li><!-- end li dropdown -->          
										
						
                    </ul><!-- end navbar-nav -->
                 <!--   <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown right">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                                <span class="hidden-sm">Categories</span><i class="fa fa-bars ml-5"></i>
                            </a>
                            <ul class="dropdown-menu">
							
							<?php 
						/*	$sql="Select * from `categories`";
							$result=mysqli_query($connection,$sql);
							while($row=mysqli_fetch_array($result)){
								
								$title=$row['title'];
								$pcat=$row['pcategory'];
								$sql2="select * from `categories` where `pcategory`='$title'";
								$result2=mysqli_query($connection,$sql2);
								
								
								?>
							
                   <li><a href="javascript:void(0);"><?php echo $title; ?></a> </li>
															  <?php } */?>
							 <!--   
								/*  $numofrows=mysqli_num_rows($result2);
								  if($numofrows>0){
								  while($row2=mysqli_fetch_array($result2)){
								  ?>   

								  <ul class="dropdown-menu">
                                        <li><a href="category.html">//echo $row2['title']; </a></li>
                                        
                                    </ul>

								  */
                               
								
							//		
                           <!--     <li class="dropdown-submenu"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Womens</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="category.html">Bresses</a></li>
                                        <li><a href="category.html">T-shirts</a></li>
                                        <li><a href="category.html">Skirts</a></li>
                                        <li><a href="category.html">Jeans</a></li>
                                        <li><a href="category.html">Pullover</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0);">Kids</a></li>
                                <li><a href="javascript:void(0);">Fashion</a></li>
                                <li class="dropdown-submenu"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">SportWear</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="category.html">Shoes</a></li>
                                        <li><a href="category.html">Bags</a></li>
                                        <li><a href="category.html">Pants</a></li>
                                        <li><a href="category.html">SwimWear</a></li>
                                        <li><a href="category.html">Bicycles</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0);">Bags</a></li>
                                <li><a href="javascript:void(0);">Shoes</a></li>
                                <li><a href="javascript:void(0);">HouseHolds</a></li>
                                <li class="dropdown-submenu"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">Technology</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="category.html">TV</a></li>
                                        <li><a href="category.html">Camera</a></li>
                                        <li><a href="category.html">Speakers</a></li>
                                        <li><a href="category.html">Mobile</a></li>
                                        <li><a href="category.html">PC</a></li>
                                    </ul>
                                </li>  -->
                            </ul><!-- end ul dropdown-menu -->
                        </li><!-- end dropdown -->
                    </ul>
					
					
                </div><!-- end navbar collapse -->
            </div><!-- end container -->
        </div>