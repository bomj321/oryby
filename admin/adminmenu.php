<style type "text/css">
<!--
/* @group Blink */
.blink {
	-webkit-animation: blink .75s linear infinite;
	-moz-animation: blink .75s linear infinite;
	-ms-animation: blink .75s linear infinite;
	-o-animation: blink .75s linear infinite;
	 animation: blink .75s linear infinite;
}
@-webkit-keyframes blink {
	0% { opacity: 1; }
	50% { opacity: 1; }
	50.01% { opacity: 0; }
	100% { opacity: 0; }
}
@-moz-keyframes blink {
	0% { opacity: 1; }
	50% { opacity: 1; }
	50.01% { opacity: 0; }
	100% { opacity: 0; }
}
@-ms-keyframes blink {
	0% { opacity: 1; }
	50% { opacity: 1; }
	50.01% { opacity: 0; }
	100% { opacity: 0; }
}
@-o-keyframes blink {
	0% { opacity: 1; }
	50% { opacity: 1; }
	50.01% { opacity: 0; }
	100% { opacity: 0; }
}
@keyframes blink {
	0% { opacity: 1; }
	50% { opacity: 1; }
	50.01% { opacity: 0; }
	100% { opacity: 0; }
}
/* @end */
-->
</style>
<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark"><i class="fa-fw fa fa-home"></i> Dashboard <span>> My Dashboard</span></h1>
					</div>
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
						<ul id="sparks" class="">
							<li class="sparks-info">
							<?php
							include('Connect.php');
 $sql="SELECT * FROM `users` WHERE userAlert  ='0'";

$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);

								if($nr >0) {
								?>
									<a href="newUserView.php" ><h5  class="tab blink" style="color: #ef1233"> New Users <span class="txt-color-blue"><i class="fa fa-user"></i><?php echo $nr ?></span></h5></a>
								<?php
								}
								else
								{
								?>
									<a href="newUserView.php" ><h5 style="color: #ef1233"> New Users <span class="txt-color-blue"><i class="fa fa-user"></i><?php echo $nr ?></span></h5></a>
								<?php
								}
								?>
								<div class="sparkline txt-color-blue hidden-mobile hidden-md hidden-sm">
									1300, 1877, 2500, 2577, 2000, 2100, 3000, 2700, 3631, 2471, 2700, 3631, 2471
								</div>
							</li>
								<li class="sparks-info">
														<?php
							include('Connect.php');
 $sql="SELECT * FROM `products` INNER JOIN categories ON(products.catid= categories.catid) WHERE products.productAlert  ='0'";

$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);

					if($nr >0) {
								?>
<a href="newProductView.php" ><h5 class="tab blink"   style="color: #ef1233"> New Product <span class="txt-color-purple"><i class="fa fa-arrow-circle-up"></i>&nbsp;<?php echo $nr ?></span></h5></a>								<?php
								}
								else
								{
								?>
								<a href="newProductView.php" ><h5 style="color: #ef1233"> New Product <span class="txt-color-purple"><i class="fa fa-arrow-circle-up"></i>&nbsp;<?php echo $nr ?></span></h5></a>
								<?php
								}
								?>

								<div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm">
									110,150,300,130,400,240,220,310,220,300, 270, 210
								</div>
							</li>
							<li class="sparks-info">
							<?php

 $sql="SELECT * FROM `orders` WHERE orderAlert  ='0'";

$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);


					if($nr >0) {
								?>

	<a href="newOrderView.php" ><h5 class="tab blink"  style="color: #ef1233"> Site Orders <span class="txt-color-greenDark"><i class="fa fa-shopping-cart"></i>&nbsp;<?php echo $nr ?></span></h5></a>								<?php
								}
								else
								{
								?>
									<a href="newOrderView.php" ><h5 style="color: #ef1233"> Site Orders <span class="txt-color-greenDark"><i class="fa fa-shopping-cart"></i>&nbsp;<?php echo $nr ?></span></h5></a>
								<?php
								}
								?>

								<div class="sparkline txt-color-greenDark hidden-mobile hidden-md hidden-sm">
									110,150,300,130,400,240,220,310,220,300, 270, 210
								</div>
							</li>
							
<!--ALERTAS DE PRODUCTO INNO O ECO-->
							<li class="sparks-info">
												<?php
							include('Connect.php');
 $sql="SELECT * FROM products  INNER JOIN users ON(products.user_id = users.user_id) INNER JOIN categories ON(products.catid =categories.catid) Where products.productaction ='0' AND (products.productType2 = 'Eco Friendly' OR products.productType2 = 'Innovation') OR products.productaction ='1' AND (products.productType2 = 'Eco Friendly' OR products.productType2 = 'Innovation')";

$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);

					if($nr >0) {
								?>
<a href="acceptProduct.php" ><h5 class="tab blink"   style="color: #ef1233">  Eco-Frienly-Innovation <span class="txt-color-yellow"><i class="fa fa-arrow-circle-up"></i>&nbsp;<?php echo $nr ?></span></h5></a>								<?php
								}
								else
								{
								?>
								<a href="acceptProduct.php" ><h5 style="color: #ef1233"> New Product <span class="txt-color-yellow"><i class="fa fa-arrow-circle-up"></i>&nbsp;<?php echo $nr ?></span></h5></a>
								<?php
								}
								?>

								<div class="sparkline txt-color-yellow hidden-mobile hidden-md hidden-sm">
									110,150,300,130,400,240,220,310,220,300, 270, 210
								</div>
							</li>

							<!--ALERTAS DE PRODUCTO INNO O ECO-->

						</ul>



					</div>
				</div>
