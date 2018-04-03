<?php session_start();
include('Connect.php');
include('head.php');
?>
     <!-- start topBar -->
     <?php include('topbar.php');
            include('middlebar.php');
            include('navh.php');
	?>
        <!-- start section -->
        <section class="section light-backgorund">
            <div class="container">
                <div class="row" style="margin-top:-30px">
                    <div class="col-sm-4 col-md-3">
                        <div class="navbar-vertical">
                            <ul class="nav nav-stacked">
                                <li class="header">
                                    <h6 class="text-uppercase">Categories <i class="fa fa-navicon pull-right"></i></h6>
                                </li>
								<?php
								$sql='Select * from `categories`Where title !="Eco Friendly" AND  title !="Innovation"';
								$result=mysqli_query($connection,$sql);
								while($row=mysqli_fetch_array($result)){
								$title=$row['title'];
								$catid=$row['catid'];
								?>
														<script>
$(document).ready(function(){
    $("a.one").hover(function(){
        $(this).css("color", "Green");
        }, function(){
        $(this).css("color", "Grey");
    });
});
</script>
                                <li>
                                    <a  style=""class="dropdown-toggle one" data-toggle="dropdown" href="#" >
                                     <?php echo $title; ?>
									 <i class="fa fa-angle-right pull-right"></i>
                                    </a>
										<?php
							 $sql="SELECT * FROM subcategories INNER JOIN categories ON(subcategories.catid = categories.catid) WHERE subcategories.catid ='$catid'";
							$stmt=mysqli_query($connection,$sql);
							if($stmt == false) {
							trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
							}
							 $nrs=mysqli_num_rows($stmt);
							if($nrs >0)
							{
								?>

                                    <ul class="dropdown-menu">
									<?php
									while($row=mysqli_fetch_array($stmt)){
								  $subtitle=$row['subtitle'];
								?>
                                        <li><a href="productshow.php?catid=<?php echo $row['catid'] ;?> & subcatid=<?php echo $row['subcatid'] ;?>"><?php echo $subtitle; ?></a></li>
                                   <?php
								   }
								   ?>
                                    </ul>
								<?php
								}
								?>
                                </li>
                               <?php
									}
									?>


                              </ul>
                        </div><!-- end navbar-vertical -->

                    </div><!-- end col -->
                   
                        <div class="col-sm-8 col-md-9">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <?php
							$sql="Select * from `slider` where id='1'";
						    $result=mysqli_query($connection,$sql);
							$row=mysqli_fetch_array($result);
							$picture=$row['image'];
							?>
                            <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                <img src="images/<?php echo $picture;?>" style="width: 100%;height: 45rem;" alt="...">
                                <div class="carousel-caption">
                                </div>
                                </div>

                            <?php
                            $sqll="Select * from `slider` where lang='english' and id > '1' "; 
                            $result=mysqli_query($connection,$sqll);
                            ?>
                            <?php while ($results = $result->fetch_all(MYSQLI_ASSOC) ) { ?>
                            <?php foreach($results as $resu): ?>
                                <div class="item">
                                <img src="images/<?php echo $resu['image'];?>" alt="..." style="width: 100%;height: 45rem;">
                                <div class="carousel-caption">
                                </div>
                                </div>
                            <?php endforeach;?>
                            <?php }?>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- end section -->
<section class="section white-background">
	<div class="container">
		<!-- COMIENZA AQUI -->
			<div class="row hidden-xs">
						<div class="col-sm-3 col-md-3">
							<div class="box-banner-img">
								<?php
								$query="Select * from `products` Where productType='Innovation'";
								$resultt=mysqli_query($connection,$query);
								$rows=mysqli_fetch_array($resultt);
								$title =$rows['productType'];?>
								<?php
								$sql="Select * from `images` Where id='5'";
								$result=mysqli_query($connection,$sql);
								$row=mysqli_fetch_array($result);
								$image=$row['image'];
								?>
								<a href="premShop.php?title=<?php echo $title; ?>"><img class="img-responsive height" src="images/<?php echo $image ?>" alt=""/></a>
							</div><!-- end box-banner-img -->
						</div><!-- end col -->
						<div class="col-sm-6 col-md-6">
							<div class="box-banner-img">
								<?php
								$sql="Select * from `aboutus` Where elementname='advertisement'";
								$result=mysqli_query($connection,$sql);
								$row=mysqli_fetch_array($result);
								$hreflink =$row['hreflink'];
								?>
								<?php
								$sql="Select * from `images` Where id='6'";
								$result=mysqli_query($connection,$sql);
								$row=mysqli_fetch_array($result);
								$image=$row['image'];
								?>
								<a href="<?php echo $hreflink ?>"><img class="img-responsive height" src="images/<?php echo $image ?>"/></a>
							</div>
						</div><!-- end col -->
						<div class="col-sm-3 col-md-3">
							<?php
							$query="Select * from `products` Where productType='Eco Friendly'";
							$resultt=mysqli_query($connection,$query);
							$rows=mysqli_fetch_array($resultt);
							$title =$rows['productType'];
							?>
							<?php
							$sql="Select * from `aboutus` Where elementname='ecofriendly'";
							$result=mysqli_query($connection,$sql);
							$row=mysqli_fetch_array($result);
							?>
                            <?php
                            $sql="Select * from `images` Where id='7'";
                            $result=mysqli_query($connection,$sql);
                            $row=mysqli_fetch_array($result);
                            $image=$row['image'];
                            ?>
							<div class="box-banner-img">
								<a href="premShop.php?title=<?php echo $title ?>"> <img class="img-responsive height" src="images/<?php echo $image ?>" alt=""/></a>
							</div><!-- end box-banner-img -->
						</div><!-- end col -->
			</div> <!-- Main Row End -->
<hr>


 <!-- HASTA AQUI-->
<div id="Carousel2" class="carousel slide" style="background-color:#ffffff;">
                <!-- Carousel items -->

                    <div class="carousel-inner" style="background-color:#ffffff;">
                        <div class="item active" style="padding-right:70px; padding-left:70px; background-color:#ffffff;">
                            <div class="row" style="background-color:#ffffff;">
					<?php
				  $sql="SELECT * FROM products WHERE productType='Eco Friendly' OR productType ='Innovation' LIMIT 0,6";
				$stmt=mysqli_query($connection,$sql);
				if($stmt == false) {
				trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
				}
				  $nr=mysqli_num_rows($stmt);
				?>
					<?php while($row=$stmt->fetch_assoc())
    {
	 $userId=$row['user_id'];
	$title =$row['title'];
	$ntitle =$row['ntitle'];
	$pid =$row['pid'];
	$quantity =$row['miniorder'];
	 $myString = $row['image'];
	$cl = explode(',', $myString);
			  $sqll="SELECT * FROM users  INNER JOIN seller ON(users.email = seller.email) Where users.user_id='$userId'";
				$stmtt=mysqli_query($connection,$sqll);
				if($stmtt == false) {
				trigger_error('Wrong SQL: ' . $sqll . ' Error: ' . $connection->error, E_USER_ERROR);
				}
				  $rows=mysqli_fetch_array($stmtt);
	?>

                              <div class="col-md-2"><a href="Shopsingle.php?pid=<?php echo $pid ?>" class="thumbnail" id="carousel2-selector-0"><img src="images/<?php echo $cl[0];?>" alt="Image" style="width:150px;height:150px;"></a>

							  <center>
							  <span class="amount text-default"><?php echo $ntitle?></span>
							  </br>

							  <span class="amount text-primary">USD $ <?php echo $price = $row['price'];  ?></span>
							  </br>
							  <span class="amount text-default">Min Order:<?php echo $quantity?></span>
							  </br>
								<a href="chat2.php?sellerid=<?php echo $rows['user_id'];?>&pid=<?php echo $row['pid'];?>&name=<?php echo $rows['firstName']?>"></i>Contact Supplier</a>
							  </center>
							  </br>
							  </div>
							     <?php
				}
				?>
						</div><!--.row-->
                        </div><!--.item-->
<!-- ////////////////////////////////////// -->
<?php 

 $sqlx2="SELECT * FROM products  INNER JOIN categories ON(products.catid = categories.catid)Where productstatus=1 AND productaction = 1 AND (productType='Innovation' OR productType='Eco Friendly')";
		$stmtx2=mysqli_query($connection,$sqlx2);
		if($stmtx2 == false) {
		trigger_error('Wrong SQL: ' . $sqlx2 . ' Error: ' . $connection->error, E_USER_ERROR);
		}
		$nrx2=mysqli_num_rows($stmtx2);
		// CONTADORES
$inicial = 7;
$final = $inicial + 6;

while (($nrx2 + 6) > $final ) {
	

// CONTADORES


 ?>
                     <div class="item" style="padding-right:70px; padding-left:70px; background-color:#ffffff;">
                            <div class="row" style="background-color:#ffffff;">
												 <?php
			 $sql="SELECT * FROM products  INNER JOIN categories ON(products.catid = categories.catid)Where productstatus=1 AND productaction = 1 AND (productType='Innovation' OR productType='Eco Friendly') LIMIT $inicial,$final";
				$stmt=mysqli_query($connection,$sql);
				if($stmt == false) {
				trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
				}
				  $nr=mysqli_num_rows($stmt);
				?>

					<?php while($row=$stmt->fetch_assoc())
    {
	$userId=$row['user_id'];
	$title =$row['title'];
	$ntitle =$row['ntitle'];
	$pid =$row['pid'];
	$quantity =$row['miniorder'];
	 $myString = $row['image'];
	$cl = explode(',', $myString);
			  $sqll="SELECT * FROM users  INNER JOIN seller ON(users.email = seller.email) Where users.user_id='$userId'";
				$stmtt=mysqli_query($connection,$sqll);
				if($stmtt == false) {
				trigger_error('Wrong SQL: ' . $sqll . ' Error: ' . $connection->error, E_USER_ERROR);
				}
				  $rows=mysqli_fetch_array($stmtt);
	?>

                              <div class="col-md-2"><a href="Shopsingle.php?pid=<?php echo $pid ?>" class="thumbnail" id="carousel2-selector-0"><img src="images/<?php echo $cl[0];?>" alt="Image" style="width:150px;height:150px;"></a>

							  <center>
							  <span class="amount text-default"><?php echo $ntitle?></span>
							  </br>

							  <span class="amount text-primary">USD $ <?php echo $price = $row['price'];  ?></span>
							  </br>
							  <span class="amount text-default">Min Order:<?php echo $quantity?></span>
							  </br>
								     <a href="chat2.php?sellerid=<?php echo $rows['user_id'];?>&pid=<?php echo $row['pid'];?>&name=<?php echo $rows['firstName']?>"></i>Contact Supplier</a> 
							  </center>
							  </br>
							  </div>
							     <?php
							    

				}// PRIMER WHILE



				?>
						</div><!--.row-->
                        </div><!--.item-->
                        
                        <?php 

				 /////////////////////////ESTRUCTURA PARA SALIR DEL WHILE
							     $inicial+= 7;
							     $final+= 6;
							     echo $inicial;

echo $final;
}
							    /////////////////////////ESTRUCTURA PARA SALIR DEL WHILE


                         ?>

                    </div><!--.carousel-inner-->

                  <a data-slide="prev" href="#Carousel2" class="left carousel-control" style="padding-top:70px; padding-right:100px;"><img src="img/prev.png" style="height:100px; width:100px;  "></a>
                  <a data-slide="next" href="#Carousel2" class="right carousel-control" style="padding-top:70px; padding-left:100px;"><img src="img/next.png" style="height:100px; width:100px; float:right; "></a>


				</div><!--.Carousel-->


<hr>
<div class="row visible-xs">



     <?php
							$sql="Select * from `aboutus` Where elementname='banner1'";
						$result=mysqli_query($connection,$sql);
							$row=mysqli_fetch_array($result);
								$hreflink =$row['hreflink'];
							 	$picture=$row['picture'];
								?>

    <div class="col-sm-6" style="margin-right:50px;">
	<a href="<?php echo $hreflink ?>"><img style="width:360px;height:180px;margin-left:10px" src="images/<?php echo $picture ?>" alt=""/></a>

    </div>

	<?php
							$sql="Select * from `aboutus` Where elementname='banner2'";
						$result=mysqli_query($connection,$sql);
							$row=mysqli_fetch_array($result);
								$hreflink =$row['hreflink'];
							 	$picture=$row['picture'];
								?>
	 <div class="col-sm-4">
	<a href="<?php echo $hreflink ?>"><img style="width:360px;height:180px; margin-left:10px" src="images/<?php echo $picture ?>" alt=""/></a>

    </div>
	<div class="col-sm-1">
	  </div>
	</div>
  <div class="row hidden-xs">



                    <?php
                    $sql="Select * from `aboutus` Where elementname='banner1'";
                    $result=mysqli_query($connection,$sql);
                    $row=mysqli_fetch_array($result);
                    $hreflink =$row['hreflink'];
                    $picture=$row['picture'];
                    ?>
                    <?php
                    $sql="Select * from `images` Where id='13'";
                    $result=mysqli_query($connection,$sql);
                    $row=mysqli_fetch_array($result);
                    $image=$row['image'];
                    ?>

    <div class="col-sm-6" style="margin-right:50px;">
	<a href="<?php echo $hreflink ?>"><img style="width:600px;height:180px;" src="images/<?php echo $image?>" alt=""/></a>

    </div>

                    <?php
                    $sql="Select * from `aboutus` Where elementname='banner2'";
                    $result=mysqli_query($connection,$sql);
                    $row=mysqli_fetch_array($result);
                    $hreflink =$row['hreflink'];
                    ?>
                    <?php
                    $sql="Select * from `images` Where id='14'";
                    $result=mysqli_query($connection,$sql);
                    $row=mysqli_fetch_array($result);
                    $image=$row['image'];
                    ?>
	 <div class="col-sm-4">
	<a href="<?php echo $hreflink ?>"><img style="width:460px;height:180px;" src="images/<?php echo $image?>" alt=""/></a>

    </div>
	<div class="col-sm-1">
	  </div>
	</div>
</br>

</div>

  </br>
    <div class="container">
	<div class="row">

				 <div class="col-sm-4 ">
				 <br>



				 <div style="background-color:#e0e0e0;width:100%;padding:16px;" >
    				<center><h2 class="title" style="color:orange;">Make your Buying Request</h2>
                        </center>

                        <form method="POST" action="requestSend.php" enctype="multipart/form-data">
                          <div class="form-group">

                     <?php   $sql="Select * from `categories` WHERE NOT title='Innovation' OR NOT title='Eco Friendly'";
							$rst=mysqli_query($connection,$sql);
								?>
						   <select required class="form-control input-lg" id="catid" name="dropcat" require>
						    <option value=""> Category <span style="color:red">*</span></option>
							<?php while($rowt=mysqli_fetch_array($rst)){ ?>
                             <option value="<?php echo $rowt['title'];?>"><?php echo $rowt['title'];?></option>

						 <?php } ?>
                         </select>

						 </div>
						   <div class="form-group">

                                <input required name="pname" type="text" id="firstname" class="form-control input-lg" required placeholder=" Product Name*">
                            </div>
							<div class="row">
							<div class="col-sm-6">
                            <div class="form-group">

                           <input required name="quantity" type="text" id="qty" class="form-control input-lg" required placeholder=" Enter Quantity*">
                            </div>
							</div>
							<div class="col-sm-6">
                       <div class="form-group">

						   <select required class="form-control input-lg" id="unit" name="dropunit">
	                         <option value="kilogram">Kilogram</option>
                             <option value="gram">Gram</option>
							 <option value="piece">Piece</option>
							 <option value="ton">Ton</option>
							 <option value="cubic meter">Cubic meter</option>
						     <option value="20 ft conteiner">20 ft conteiner</option>
                             <option value="40 ft conteiner">40 ft conteiner</option>
                             <option value="litter">Liter</option>
                             <option value="others">Others</option>
                         </select>

						 </div>
                          	</div>
							</div>
                           <div class="form-group">
								<input required name="dtym" type="text" id="dtime" class="form-control input-lg" required placeholder=" Deadline to be send *" onfocus="(this.type='date')">
							</div>
							 <input type="hidden" name="pais" value="<?php echo $_SESSION['countryName'];?>" >
                       <center>
                         <input type="submit" class="btn btn-success round btn-md"  name="requestSend" value="Submit">

                        
                        </form>
						</center>
							</div>
				<div style="width:100%;margin-top:18px"  >
				<a href="breq.php" class="btn btn-success round btn-lg" style="width:100%" >
						Show Buying Request
				</a>

				</div>


				   </div><!-- end col -->
<!-- MADE IN CHILE -->  
<?php
   try {
        include('Connect.php');
        $sql3="SELECT * FROM aboutus WHERE elementname='chile1' OR elementname='chile2' OR elementname='chile3' or elementname='chile4' OR elementname='chile5' OR elementname='chile6'";
        $resultado = mysqli_query($connection,$sql3);
        }
  catch (Exception $e)
  { $error= $e->getMessage();}
?>


    <div class="col-sm-8">
        <div class="title-wrap">
            <div class="row column-3">
                <hr>
                <h2 class="title"><span class="text-primary"> MADE</span> IN <span class="text-primary">CHILE</span></h2>
                <?php while ($categorias = $resultado->fetch_all(MYSQLI_ASSOC) ) { ?>
                <?php foreach($categorias as $cate): ?>
                <div class="col-sm-4 col-md-4 col-xs-4" style="margin-top: 2rem;">
                    <div class="thumbnail store style1" style="height: 15rem; width:20rem">
                        <div class="header">
                            <a href="chileAll.php?id=<?php echo $cate['hreflink']; ?>">
                                <figure class="layer">
                                    <img  src="images/<?php echo $cate['picture']; ?>" alt="made in Chile" class="img-responsive" style="height: 15rem; width:20rem">
                                </figure>
                            </a>
                        </div>
                    </div><!-- end thumbnail -->
                </div><!-- end col -->
                <?php endforeach;?>
                <?php }?>
            </div><!-- end row -->
			<hr style="margin-top: 3rem;">
        </div>
    </div><!-- end col -->
</div><!-- end row -->

<!--FIN MADE IN CHILE --> 


     


			<div class="col-sm-12">
                        <div class="title-wrap">
                            <h2 class="title"> TOP <span class="text-primary"> SELECTED </span>PRODUCT</h2>
							</div>
							<hr>
			</div>


			<hr>
                       <div class="row">

                </div><!-- end row -->



<!--COMIENZO DEL CARRUSEL NUMERO 1-->
<div id="Carousel" class="carousel slide">
                              <!-- Carousel items -->

                    <div class="carousel-inner">
                        <div class="item active" style="padding-right:70px; padding-left:70px;">
                            <div class="row">
											<?php
				  $sql="SELECT * FROM products  INNER JOIN categories ON(products.catid = categories.catid) WHERE productType='Normal Product' AND productstatus=1 AND productaction = 1 LIMIT 0,4";
				$stmt=mysqli_query($connection,$sql);
				if($stmt == false) {
				trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
				}
				  $nr=mysqli_num_rows($stmt);
				?>
					<?php while($row=$stmt->fetch_assoc())
    {
	$userId=$row['user_id'];
	$title =$row['title'];
	$ntitle =$row['ntitle'];
	$pid =$row['pid'];
	$quantity =$row['miniorder'];
	 $myString = $row['image'];
	$cl = explode(',', $myString);
			  $sqll="SELECT * FROM users  INNER JOIN seller ON(users.email = seller.email) Where users.user_id='$userId'";
				$stmtt=mysqli_query($connection,$sqll);
				if($stmtt == false) {
				trigger_error('Wrong SQL: ' . $sqll . ' Error: ' . $connection->error, E_USER_ERROR);
				}
				  $rows=mysqli_fetch_array($stmtt);
	?>

                              <div class="col-md-2"><a href="Shopsingle.php?pid=<?php echo $pid ?>" class="thumbnail" id="carousel2-selector-0"><img src="images/<?php echo $cl[0];?>" alt="Image" style="width:150px;height:150px;"></a>

							  <center>
							  <span class="amount text-default"><?php echo $ntitle?></span>
							  </br>

							  <span class="amount text-primary">USD $ <?php echo $price = $row['price'];  ?></span>
							  </br>
							  <span class="amount text-default">Min Order:<?php echo $quantity?></span>
							  </br>

							  <span class="amount text-default">Company Name:<?php echo $companyName=$rows['company_name'];?></span>
							  	   </br>
								     <a href="chat2.php?sellerid=<?php echo $rows['user_id'];?>&pid=<?php echo $row['pid'];?>&name=<?php echo $rows['firstName']?>"></i>Contact Supplier</a>
									 </br>
							  </center>
							  </div>
							     <?php
				}
				?>
						</div><!--.row-->
                        </div><!--.item-->
<!-- ////////////////////////////////////// -->
                     

                    </div><!--.carousel-inner-->
                    <a data-slide="prev" href="#Carousel" class="left carousel-control" style="padding-top:70px; padding-right:100px;"><img src="img/prev.png" style="height:100px; width:100px;  "></a>
                  <a data-slide="next" href="#Carousel" class="right carousel-control" style="padding-top:70px; padding-left:100px; "><img src="img/next.png" style="height:100px; width:100px; float:right; "></a>
                 <!-- Carousel items -->


                </div><!--.Carousel-->
<!--FIN DEL PRIMER CARRUSEL-->

                <!--CARRUSEL NUMERO 2-->
<hr>
<div id="Carousel2" class="carousel slide">
                              <!-- Carousel items -->

                    <div class="carousel-inner">
                        <div class="item active" style="padding-right:70px; padding-left:70px;">
                            <div class="row">
											<?php
				  $sql="SELECT * FROM products  INNER JOIN categories ON(products.catid = categories.catid) WHERE productType='Normal Product' AND productstatus=1 AND productaction = 1 LIMIT 5,10";
				$stmt=mysqli_query($connection,$sql);
				if($stmt == false) {
				trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
				}
				  $nr=mysqli_num_rows($stmt);
				?>
					<?php while($row=$stmt->fetch_assoc())
    {
	$userId=$row['user_id'];
	$title =$row['title'];
	$ntitle =$row['ntitle'];
	$pid =$row['pid'];
	$quantity =$row['miniorder'];
	 $myString = $row['image'];
	$cl = explode(',', $myString);
			  $sqll="SELECT * FROM users  INNER JOIN seller ON(users.email = seller.email) Where users.user_id='$userId'";
				$stmtt=mysqli_query($connection,$sqll);
				if($stmtt == false) {
				trigger_error('Wrong SQL: ' . $sqll . ' Error: ' . $connection->error, E_USER_ERROR);
				}
				  $rows=mysqli_fetch_array($stmtt);
	?>

                              <div class="col-md-2"><a href="Shopsingle.php?pid=<?php echo $pid ?>" class="thumbnail" id="carousel2-selector-0"><img src="images/<?php echo $cl[0];?>" alt="Image" style="width:150px;height:150px;"></a>

							  <center>
							  <span class="amount text-default"><?php echo $ntitle?></span>
							  </br>

							  <span class="amount text-primary">USD $ <?php echo $price = $row['price'];  ?></span>
							  </br>
							  <span class="amount text-default">Min Order:<?php echo $quantity?></span>
							  </br>

							  <span class="amount text-default">Company Name:<?php echo $companyName=$rows['company_name'];?></span>
							  	   </br>
								     <a href="chat2.php?sellerid=<?php echo $rows['user_id'];?>&pid=<?php echo $row['pid'];?>&name=<?php echo $rows['firstName']?>"></i>Contact Supplier</a>
									 </br>
							  </center>
							  </div>
							     <?php
				}
				?>
						</div><!--.row-->
                        </div><!--.item-->
<!-- ////////////////////////////////////// -->
                     <div class="item" style="padding-right:70px; padding-left:70px;">
                            <div class="row">
												 <?php
			
			 $sql="SELECT * FROM products  INNER JOIN categories ON(products.catid = categories.catid) WHERE productType='Normal Product'  AND productstatus=1 AND productaction = 1 LIMIT 5,10";
			$stmt=mysqli_query($connection,$sql);
				if($stmt == false) {
				trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
				}
				  $nr=mysqli_num_rows($stmt);
				?>
					<?php while($row=$stmt->fetch_assoc())
    {
$userId=$row['user_id'];
	$title =$row['title'];
	$ntitle =$row['ntitle'];
	$pid =$row['pid'];
	$quantity =$row['miniorder'];
	 $myString = $row['image'];
	$cl = explode(',', $myString);
			  $sqll="SELECT * FROM users  INNER JOIN seller ON(users.email = seller.email) Where users.user_id='$userId'  ";
				$stmtt=mysqli_query($connection,$sqll);
				if($stmtt == false) {
				trigger_error('Wrong SQL: ' . $sqll . ' Error: ' . $connection->error, E_USER_ERROR);
				}
				  $rows=mysqli_fetch_array($stmtt);
	?>

                              <div class="col-md-2"><a href="Shopsingle.php?pid=<?php echo $pid ?>" class="thumbnail" id="carousel2-selector-0"><img src="images/<?php echo $cl[0];?>" alt="Image" style="width:150px;height:150px;"></a>

							  <center>
							  <span class="amount text-default"><?php echo $ntitle?></span>
							  </br>

							  <span class="amount text-primary">USD $ <?php echo $price = $row['price'];  ?></span>
							  </br>
							  <span class="amount text-default">Min Order:<?php echo $quantity?></span>
							  </br>

							  <span class="amount text-default">Company Name:<?php echo $companyName=$rows['company_name'];?></span>
							  	   </br>
								     <a href="chats2.php?sellerid=<?php echo $rows['user_id'];?>&pid=<?php echo $row['pid'];?>&name=<?php echo $rows['firstName']?>"></i>Contact Supplier</a>
									 </br>
							  </center>
							  </br>
							  </div>
							     <?php
				}
				?>
						</div><!--.row-->
                        </div><!--.item-->

                    </div><!--.carousel-inner-->
                    <a data-slide="prev" href="#Carousel2" class="left carousel-control" style="padding-top:70px; padding-right:100px;"><img src="img/prev.png" style="height:100px; width:100px;  "></a>
                  <a data-slide="next" href="#Carousel2" class="right carousel-control" style="padding-top:70px; padding-left:100px; "><img src="img/next.png" style="height:100px; width:100px; float:right; "></a>
                 <!-- Carousel items -->


                </div><!--.Carousel-->
<hr>
<!--FIN DEL SEGUNDO CARRUSEL-->
   <?php
  if(isset($_POST['vanswer'])){
$quesno=$_POST['ques'];
$email=$_POST['email'];
$mysqlqry="INSERT INTO visitors(quesNo,email) VALUES('$quesno','$email')";
$queryResult=mysqli_query($connection,$mysqlqry);
if($queryResult){
	$smsg = '<div class="alert alert-success alert-dismissible col-md-3" id="suc">Successfuly Sent !</div>';
    echo $smsg;
}
}
?>

                    <?php
                    $sql="Select * from `images` Where id='11'";
                    $result=mysqli_query($connection,$sql);
                    $row=mysqli_fetch_array($result);
                    $image=$row['image'];
                    ?>
                <div class="container" >

                    <div class="col-sm-12" style=" margin-left:-12px; margin-right:2px;background-image: url(images/<?php echo $image; ?>); width:1050px height:206px; ">

	<?php
							$sql="Select * from `aboutus` Where elementname='QuestionHeading'";
						$result=mysqli_query($connection,$sql);
							$row=mysqli_fetch_array($result);
							 	$title=$row['title'];
								?>

  <h2><?php echo $title; ?></h2>
   <form method="POST">
    <div class="radio">
	<?php
							$sql1="Select * from `aboutus` Where elementname='Question1'";
						$result1=mysqli_query($connection,$sql1);
							$row1=mysqli_fetch_array($result1);
							 	$title1=$row1['title'];
								?>
      <label><input type="radio" value="NO1" name="ques" data-toggle="modal" data-target="#myModal"><?php echo $title1; ?></label>
    </div>
	<?php 			$sql2="Select * from `aboutus` Where elementname='Question2'";
						   $result2=mysqli_query($connection,$sql2);
							$row2=mysqli_fetch_array($result2);
							 $title2=$row2['title'];
								?>    <div class="radio">
      <label><input type="radio" value="NO2" name="ques" data-toggle="modal" data-target="#myModal"><?php echo $title2; ?></label>
    </div>
	<?php 			$sql3="Select * from `aboutus` Where elementname='Question3'";
						   $result3=mysqli_query($connection,$sql3);
							$row3=mysqli_fetch_array($result3);
							 $title3=$row3['title'];
								?>
    <div class="radio ">
      <label><input type="radio" value="NO3" name="ques" data-toggle="modal" data-target="#myModal"><?php echo $title3; ?></label>
    </div>
	<?php 			$sql4="Select * from `aboutus` Where elementname='Question4'";
						   $result4=mysqli_query($connection,$sql4);
							$row4=mysqli_fetch_array($result4);
							 $title4=$row4['title'];
								?>
	<div class="radio">
      <label><input type="radio" value="NO4" name="ques" data-toggle="modal" data-target="#myModal"><?php echo $title4; ?></label>
    </div>
	</div>




  <!-- Modal content-->
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">


      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="float:left;">Your Feed Back</h4>
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
		<div class="row">
          <div class="col-lg-4">
		   <?php if(isset($_SESSION['uemail'])){
		   }
		   else
		   {
		   ?>
		   <h6>  Your Email: </h6>
		   <?php
		   }?>

		  </div>
		   <div class="col-lg-8">

          <?php if(isset($_SESSION['uemail'])){ ?>
		 <input type="hidden" class="form-control" name="email" value="<?php echo $_SESSION['uemail'];?>">
		  <?php } else{?>
		  <input type="email" class="form-control" name="email" placeholder="Enter email">
		 <?php }?>


		  </div>
        </div>
		</div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success" value="Submit" name="vanswer">
		  </form>
        </div>
      </div>

    </div>
  </div>
  <!-- END Modal content-->

                    </div><!-- end col -->

                </div><!-- end row -->

             <!--</div> end container -->

        <?php
							$imagesql="Select * from `aboutus` Where elementname='QuestionBackgroundPicture'";
						$imageresult=mysqli_query($connection,$imagesql);
							$imagerow=mysqli_fetch_array($imageresult);
							 	$image=$imagerow['picture'];
								?>
								</br>

                <div class="container" >
					<hr>
               <div>
                <?php
                $sql="Select * from `images` Where id='12'";
                $result=mysqli_query($connection,$sql);
                $row=mysqli_fetch_array($result);
                $image=$row['image'];
                ?>
			   <img class="hidden-xs img-responsive " style="width:1150px; height:1200px; margin-top:20px" src="images/<?php echo $image; ?>" />
			  <img  class="visible-xs" style="width:360px; height:360px; margin-top:20px" src="images/<?php echo $image; ?>" />
			   </div>
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
		<script type="text/javascript" src="js/bootstrap.min_2.js"></script>
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
		 <script type="text/javascript" src="js/owl.carousel.min_1.js"></script>
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