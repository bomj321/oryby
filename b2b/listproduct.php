<?php session_start();
require 'Connect.php'; 
error_reporting(0);

$id=$_GET['id'];

?>
<?php
include('head.php');
?>
    <body>

        <!-- start topBar -->
<?php require 'topbar.php' ?>
        <!-- end topBar -->
        
    <?php
	include("middlebar.php");
	?>
            <?php
	include("navh.php");
	?>
        <!-- start navbar -->

	  <section class="gray-background">
	  <div class="container">
	   <div class="content light-background">
                    <div class="row">
					<?php $query="SELECT * FROM products INNER JOIN categories ON(products.catid=categories.catid) INNER JOIN subcategories  ON(products.subcatid = subcategories.subcatid) ";
               $result=mysqli_query($connection,$query);
			   ?>
                        <div class="col-sm-12">
                            <div class="title-header">


			    
                               <center><h5 class="title text-gray">LIST OF PRODUCTS </h5>
                            </center></div><!-- end title-header -->
                        </div><!-- end col -->
                    </div><!-- end row -->
                    <?php
                  while( $row=mysqli_fetch_array($result)){   ?>
				 
         <div class="col-sm-6 col-md-3">
                        	<?php $catid = $row['catid']; 
																	
							  $sqll="SELECT * FROM categories Where catid = '$catid'";
							 
							$stmtt=mysqli_query($connection,$sqll);
							if($stmtt == false) {
							trigger_error('Wrong SQL: ' . $sqll . ' Error: ' . $connection->error, E_USER_ERROR);
							}
							$nrr=mysqli_num_rows($stmtt); 

							$rows =mysqli_fetch_array($stmtt);
							 $catid = $rows['catid'];
							 $title =$rows['title'];
							if($title =="Eco Friendly"){
									?>
										   <span> <img style="height:40px; width:40px;float:right"src="images/ecofriendly.png" />
                                       </span><?php
										}
										else if($title =="Innovation"){
										?>
										   <span> <img style="height:40px; width:40px;float:right "src="images/innovation.png" />
                                       </span><?php
										}
										?>  
                            <div class="cat-item-style2">
							   <div class="title">
								 <?php echo '<h6> '.$row['title'].'</a></h6>'; ?>
                                
                                </div><!-- end title -->
								<div class="price">
                                  <center>  <span class="amount text-primary"><?php echo $row['subtitle']; ?></span>  </center> 
										
                                        </div>
                                <figure>
								
                   <a href="Shopsingle.php?pid=<?php echo $row['pid'] ; ?>">                         		      
										 <img style="height:251px; width:250px;" src="images/<?php echo $row['image']; ?>" alt="" />
										
                                    </a>
                                </figure>
                                <div class="title">
								 <?php echo '<h6><a href="Shopsingle.php?pid='.$row['pid'].'"> '.$row['ntitle'].'</a></h6>'; ?>
                                
                                </div><!-- end title -->
								<div class="price">
                                  <center>  <span class="amount text-primary">$<?php echo $row['price']; ?></span>  </center> 
											<?php
											
											//$p = $price -10;
	                                             ?>
                                          <!--  <span class="amount text-primary">$<?php //echo $p ;?></span>  -->
										    
                                        </div>
                            </div><!-- end cat-item-style2 -->
                        <!-- end col -->
                   
                   <!-- end row -->
				  
				   </div>
				   <?php  } ?>
                    <div class="row">
                        <div class="col-sm-12 text-center">
                           
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end content -->
	  
	  </div>
	  </section>
	<?php require 'footer.php'; ?>	
	</body>
	</html>