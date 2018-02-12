<?php session_start();
include('Connect.php');
include('head.php');
$getmail=$_SESSION['uemail'];
?>
<html>

    <body>
     <!-- start topBar --> 
     <?php   
	include('topbar.php');  
	include('middlebar.php');
	
	 ?>
	 <!-- end topBar -->
       <?php include('navh.php'); ?>  
	  	
        <!-- start section -->
        <section class="section white-backgorund" style="margin-top:5px;padding-top:8px;"> 
		<div class="container" style="margin-top:0px;padding-top:0px;">
		       <h3 style="padding-left:16px;"> My Orybu </h3>
			   <hr  style="height:19px;color:black;">
                <div class="row" style="margin-top:0px;padding-top:0px;">
				
                       <div class="col-sm-4">
<h4 class="title"> Pending Purchases</h4>
                             <div class="table-responsive">    
								<table id="example" class="table table-striped" cellspacing="0" width="100%">
                                    <!--<table class="table table-striped"> -->
                                        <thead>
                                            <tr>
											    <th>Order Id</th>
                                                <th>Email</th>
                                                <th>Total Price</th>
											    <th>Order Status</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
				<?php 
			$querygetrequest="SELECT * FROM `orders` where orderstatus='Pending'";
			$resultrequests=mysqli_query($connection,$querygetrequest);
			while($rowreq=mysqli_fetch_array($resultrequests)){
			?>
						
                                            <tr>
											    <td>
                                                    <a href="#">
                                                        <p><?php echo $rowreq['order_id'];?></p>
                                                    </a> 
                                                </td>
                                                <td>
                                                    <a href="#">
                                                        <p><?php echo $rowreq['email'];?></p>
                                                    </a> 
                                                </td>
                                                <td>
                                                    <h6 class="regular">$<?php echo $rowreq['tota_price'];?></h6>
                                                   
                                                </td>
												<td>
												 <p><?php echo $rowreq['orderstatus'];?></p>
												 </td>
                                                
                                               
                                                
                                              
                                            </tr>
                          <?php 

                         
                            } 

  
                          ?>
                                            
                                        </tbody>
                                    </table><!-- end table -->
                                </div>
					   </div> 
					   <div class="col-sm-4">
<h4 class="title"> Messages</h4>
                             <div class="table-responsive">    
								<table id="example1" class="table table-striped" cellspacing="0" width="100%">
                                    <!--<table class="table table-striped"> -->
                                        <thead>
                                            <tr>
											    <th>User</th>
                                                <th>Title</th>
                                                <th>Date</th>
											    
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
				<?php 
			$querygetrequest="SELECT * FROM `chatapp`";
			$resultrequests=mysqli_query($connection,$querygetrequest);
			while($rowreq=mysqli_fetch_array($resultrequests)){
			?>
						
                                            <tr>
											    <td>
                                                    <a href="#">
                                                        <p><?php echo $rowreq['sender'];?></p>
                                                    </a> 
                                                </td>
                                                <td>
                                                    <a href="#">
                                                        <p><?php echo $rowreq['msg'];?></p>
                                                    </a> 
                                                </td>
                                                <td>
                                                    <h6 class="regular">$<?php echo $rowreq['date'];?></h6>
                                                   
                                                </td>
												
                                                
                                               
                                                
                                              
                                            </tr>
                          <?php 

                         
                            } 

  
                          ?>
                                            
                                        </tbody>
                                    </table><!-- end table -->
                                </div>

					   </div>
					   <div class="col-sm-4"> 
					   					    <?php
$logoquery="SELECT * FROM seller where email='$getmail'";
$logoresult=mysqli_query($connection,$logoquery);
$logorow=mysqli_fetch_array($logoresult);  ?>
		<div style="float:right;  background-color:#f7f7f7; border:2px;padding-left:50px;padding-right:50px;padding-bottom:5px;">
		<h5 style="text-align:center;"> My Profile </h5>
		<img src="images/<?php echo $logorow['companylogo'];?>" style="height:100px; width:100px;margin-left:35px; " alt="Logo not set">
		<hr>
		<?php 
		$percentage=50;
		if((($logorow['email']!='')&&($logorow['company_name']!='')) ||(($logorow['companylogo']!='')&&($logorow['businessType']!=''))){
		$percentage=100;
		}
        else{
            $percentage=50;
        }
		?>
		<div class="progress">
    <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $percentage.'%';?>">
     <?php echo $percentage.'%';?>
    </div>
  </div>
		<a  class="btn btn-success" href="profile.php?<?php echo $getmail;?>">Update Profile </a>
		</div>  
		

		

					   </div>
					   
					   <div style="float:right;margin-top:80px;">
					  
					    <a href="Learn.php"  ><img src="images/htsale.png"></a>
                      <a href="Learn.php" ><img src="images/htbuy.png"></a> 
	                  </div>

		
		
		</div>
		
		
           <hr>
		<div class="row">
		<h5> Quantity Availabe </h5>
		  <?php
  $email =$_SESSION['uemail'];
  	 $query="SELECT * FROM  seller WHERE email='$email'";
			$result=mysqli_query($connection,$query);
			$row=mysqli_fetch_array($result);
?>
<div class="col-sm-1">

</div>
<div class="col-sm-3">

  <input class="form-control"  value="Top List:<?php echo $row['limitTopList'];?> " style=" width:100px; ">  
 
</div>
<div class="col-sm-4">
 <input  class="form-control" value="Show Case:<?php echo $row['limitShowCase'];?> " style="margin-left:-150px; width:130px; "> 
  
 </div>
 
<div class="col-sm-2">

    <button type="button" class="btn btn-success btn-round-sm" style="margin-left:-70px;">Buy More</button>
</div>
		
		</div>
                <div class="row">
                       
                    <div class="col-sm-6 vertical-align">  
 
  

                    </div><!-- end col -->
                  
                                  
                    </div><!-- end row -->
               
         <hr>  
		 
		  <div class="row"> 
		  <?php 
		  $limit=8;
		  $umail=$_SESSION['uemail'];
		 if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
		 $start_from = ($page-1) * $limit;
		  $q="SELECT * FROM users where email='$umail'";
		  $rzld=mysqli_query($connection,$q);
		  $rwz=mysqli_fetch_array($rzld);
		  $uzrid=$rwz['user_id'];
		  $qury="SELECT * FROM products where user_id='$uzrid' ORDER BY ntitle ASC LIMIT $start_from, $limit";
		  $rsl=mysqli_query($connection,$qury);
		  //$nr=mysqli_num_rows($rsl);
		  ?>
		  
                    <div class="col-sm-8">
					 <h4> Published Articles </h4>
                       <?php while($rw=mysqli_fetch_array($rsl)){  ?>
					   <div class="item col-sm-3">
                                <div class="thumbnail store style1">
                                    <div class="header" style="height:150px; width:150px;">
                                        <figure class="layer" style="height:150px; width:150px;">
                                            <a href="#">
                                                <img src="images/<?php echo $rw['image'];?>" style="height:150px; width:150px;" alt="">
                                            </a>
                                        </figure>
                                        
                                    </div>

                                      <div class="caption">
                                      
                                        <div class="price" >
                                            <h4 class="regular"><a href="#" style="padding-left:45px;"><?php echo $rw['ntitle'];?></a></h4>
                                            <span class="amount text-primary" style="padding-left:45px;">$<?php echo $rw['price'];?></span>  
                                        </div>
                                     
                                    </div><!-- end caption -->
                                </div><!-- end thumbnail -->
                            </div><!-- end item --> 
					   <?php } ?>	
                    
                    <!-- end col -->

						
                        
						<?php 
						
$sql = "SELECT COUNT(pid) FROM products WHERE user_id=$uzrid";  
$rs_result = mysqli_query($connection,$sql);  
$row = mysqli_fetch_array($rs_result); 
 
$total_records = $row[0];  
$total_pages = ceil($total_records / $limit);  
$pagLink = "<div class='pagination'>"; 
?>
<ul class="pagination"> 
<?php
for ($i=1; $i<=$total_pages; $i++) {  
       $pagLink .= "<li><a href='myorybue.php?page=".$i."'>"."   ".$i." ". "</a> </li>";  
} 
?>
</ul>
<?php
echo $pagLink . "</div>";   
?>

</div>						
			
                        
						  <div class="col-sm-4" style="margin-top:0px;">
						 <h4 style="margin-left:148px"> My Favourites</h4> 
					<div class="widget" style="float:right;">
                       
                            <?php $query="SELECT * FROM products INNER JOIN categories ON(products.catid=categories.catid) Limit 6 ";
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
                             <br>
                           <a href="allproduct.php" class="btn btn-default btn-block semi-circle btn-md" style="margin-top:5px;">All Products</a>
                        </div><!-- end widget -->
                           </div>
                        
						
		</div>				
                    </div>
        
            
        </section>
        <!-- end section -->
       <?php include('footer.php');
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
         <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"</script>
  <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"</script>	  
 	<script>
   $(document).ready(function() {
    $('#example').DataTable();
} );
</script>   
	<script>
   $(document).ready(function() {
    $('#example1').DataTable();
} );
</script> 
    </body>
</html>