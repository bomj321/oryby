<?php session_start();
require 'Connect.php'; 
error_reporting(0);

echo $id=$_GET['id'];
if(isset($_POST["filter"]) !="")
{
 $min_value =$_REQUEST['min_value'];
 $max_value =$_REQUEST['max_value'];

					}
?>
<?php
include('head.php');
?>
   
    <body>
       <?php
include('topbar.php');
include('middlebar.php');
include('navh.php');
	   ?>	   
                   
        <!-- start section -->
        <section class="section light-backgorund">
            <div class="container">
			 <div class="row">
			 <div class="col-sm-2">
			</div>
                            <div class="col-sm-10 text-left">
							<div style="margin-top:-50px; height:20px;"class="content white-background">
                                <h6  style="margin-top:-10px; ">ALL PRODUCTS >Categories</h6>
								</div>
                            </div><!-- end col -->
                  </div><!-- end row -->
                <div class="row">
                    <!-- start sidebar -->
                    <div class="col-sm-2">
					<div class="widget">
                            <div class="panel-group accordion" id="searchFilter">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#searchFilter" href="#searchFilterCollapse">
                                                Search
                                            </a>
                                        </h3>
                                    </div>
                                    <div id="searchFilterCollapse" class="panel-collapse collapse in">
                                        <div class="panel-body">
										 
                           <form  action="searchallproduct.php" method="GET">
                                <input type="text" id="lastname" name="keyword" class="form-control input-md" placeholder="Search">
                    
                                          
                                        </div><!-- end panel-body -->
                                    </div><!-- end panel-collapse -->
                                </div><!-- end panel -->
                            </div><!-- end accordion -->
                        </div><!-- end widget -->
						</form>
                      
						<div class="widget">
                            <div class="panel-group accordion" id="priceFilter">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#priceFilter" href="#priceFilterCollapse">
                                                Prices
                                            </a>
                                        </h3>
                                    </div>
                                    <div id="priceFilterCollapse" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <form method="post" action="filterbyprice.php" class="price-range" data-start-min="50" data-start-max="1000" data-min="10" data-max="2000" data-step="1">
                                <div class="ui-range-values" >
                                    <div class="ui-range-value-min" name="max_value" id="ui-range-value-min">
                                        $<span></span>
                                        <input  name="min_value" value="data-step" type="hidden" >
                                    </div> -
                                    <div class="ui-range-value-max">
                                        $<span></span>
                                        <input  name="max_value" value="data-step" type="hidden">
                                    </div>
                                </div>
                                <div class="ui-range-slider"></div>
                                <input type="submit" name="filter" class="btn btn-default btn-block btn-md" value="Filter">
                            </form>
                                        </div><!-- end panel-body -->
                                    </div><!-- end panel-collapse -->
                                </div><!-- end panel -->
                            </div><!-- end accordion -->
                        </div><!-- end widget -->
                        <form  action="searchallproduct.php" method="GET">
						 <div class="widget">
                            <div class="panel-group accordion" id="categoriesFilter">
                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#categoriesFilter" href="#categoriesFilterCollapse">
                                                Country
                                            </a>
                                        </h3>
                                    </div>
                                    <div id="categoriesFilterCollapse" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <?php
//											$sql="SELECT * FROM `categories`  ";
	//													$rst=mysqli_query($connection,$sql);	
														?>	
                                                                <ul class="list list-unstyled">
										<?php 
								//		while($rowt=mysqli_fetch_array($rst)){ ?>
                                            <li>
                                                <div  style="font-size:10px;">
                                                    <input name="categorytitle[]"  value="Chile"  type="checkbox" >
                                                    <label > Chile
												     <?php 
														//echo $rowt['title'];?>
                                                    </label>
                                                </div>
                                            </li>
											  <li>
                                                <div  style="font-size:10px;">
                                                    <input name="categorytitle[]"  value="Maxico"  type="checkbox" >
                                                    <label > Maxico
												     <?php 
														//echo $rowt['title'];?>
                                                    </label>
                                                </div>
												</li>
												  <li>
                                                <div  style="font-size:10px;">
                                                    <input name="categorytitle[]"  value="United State"  type="checkbox" >
                                                    <label > United State
												     <?php 
														//echo $rowt['title'];?>
                                                    </label>
                                                </div>
                                            </li>
											  <li>
                                                <div  style="font-size:10px;">
                                                    <input name="categorytitle[]"  value="China"  type="checkbox" >
                                                    <label > China
												     <?php 
														//echo $rowt['title'];?>
                                                    </label>
                                                </div>
                                            </li>
											  <li>
                                                <div  style="font-size:10px;">
                                                    <input name="categorytitle[]"  value="France"  type="checkbox" >
                                                    <label > France
												     <?php 
														//echo $rowt['title'];?>
                                                    </label>
                                                </div>
                                            </li>
                                          

											<?php
										//	}?>
										
                                        </ul>
                                        </div><!-- end panel-body -->
										 <input type="submit" name="filter" class="btn btn-danger btn-block btn-md" value="Submit">
                                    </div><!-- end panel-collapse -->
                                </div><!-- end panel -->
								
                            </div><!-- end accordion -->
                        </div><!-- end widget -->
                     
						</form>
							<div class="widget">
                            <div class="panel-group accordion" id="tagsFilter">
                                <div class="panel panel-warning">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#tagsFilter" href="#tagsFilterCollapse">
                                                Popular tags
                                            </a>
                                        </h3>
                                    </div>
                                    <div id="tagsFilterCollapse" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <?php $query1="SELECT * FROM `categories`INNER JOIN subcategories ON(categories.catid=subcategories.catid) WHERE categories.title='Clothing, Textile & Accessories' ";
										$result1=mysqli_query($connection,$query1);
										?>		
                                        <ul class="tags">
                                            <?php while($row=mysqli_fetch_array($result1)){ 
											?>										
											
											<li>
                                                <a class="btn btn-gray-outline semi-circle btn-xs" href="searchallproduct.php?title=<?php echo $row['subtitle']; ?>"><?php echo $row['subtitle']; ?></a>
                                            </li>
                                            <?php
											}?>
                                        </ul>
                                        </div><!-- end panel-body -->
                                    </div><!-- end panel-collapse -->
                                </div><!-- end panel -->
                            </div><!-- end accordion -->
                        </div><!-- end widget -->
                       
                    </div><!-- end col -->
                    <!-- end sidebar -->
                    <div class="col-sm-10">
                        
                        
                    
                            
                            
               
      	 
	   <div class="content light-background">
                    <div class="row">
					<?php
					$email=$_SESSION['uemail'];
					
			

			
				 $query="SELECT * FROM products INNER JOIN categories ON(products.catid=categories.catid)WHERE  products.price BETWEEN $min_value AND $max_value";
					
               $result=mysqli_query($connection,$query);
			    $nr =mysqli_query($result);
			   ?>
                        </div><!-- end row -->
                    <?php
                  while( $row=mysqli_fetch_array($result)){ 
	 $myString = $row['image'];
							$cl = explode(',', $myString);
				  ?>
				 
         <div class="col-sm-6 col-md-3" style="padding:3px">
                        												
							 
						<?php

							if($productType =="Eco Friendly"){
									?>
										   <span> <img style="height:35px; width:35px;float:right"src="images/ecofriendly.png" />
                                       </span><?php
										}
										else if($productType =="Innovation"){
										?>
										   <span> <img style="height:35px; width:35px;float:right "src="images/innovation.png" />
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
										 <img style="height:200px; width:200px;" src="images/<?php echo $cl[0]; ?>" alt="" />
										
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
				   <?php  } 
				   ?>
                    <div class="row">
                        <div class="col-sm-12 text-center">
                           
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end content -->
	  
	  </div>
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