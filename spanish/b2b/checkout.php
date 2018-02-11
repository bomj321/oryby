<?php session_start();
require 'Connect.php';
include 'head.php';
echo $email=$_SESSION['uemail'];
 $sql = "SELECT * FROM users WHERE email='$email'";
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}

  $nr = mysqli_num_rows($stmt);
if($nr <=0 )
{
?>
<script>
alert("Please Login To Check Out");
window.location.href="singlelogin.php";
</script>
<?php
}
?>

    <body>

        <!-- start topBar -->
        <?php require 'topbar.php'; ?>
        <!-- end topBar -->

        <!-- start navbar -->



        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    <!-- start sidebar -->
                  <!-- end col -->
                    <!-- end sidebar -->
					 <div class="col-sm-2">  </div>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-12 text-left">
                                <h2 class="title">Revisa</h2>
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <hr class="spacer-5"><hr class="spacer-20 no-border">

                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="nav nav-pills style2 nav-justified">
                                    <li class="active">
                                        <a href="#shopping-cart" data-toggle="tab">
                                            1. Carrito de compras
                                            <div class="icon">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#billing-info" data-toggle="tab">
                                            2.Información de facturación
                                            <div class="icon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#payment" data-toggle="tab">
                                            3. Pago
                                            <div class="icon">
                                                <i class="fa fa-credit-card"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content pills">
                                    <div class="tab-pane active" id="shopping-cart">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">Productos</th>
                                                        <th>Precio</th>
                                                       <!-- <th>Quantity</th> -->
                                                        <th colspan="2">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
		<?php

      if($_SESSION['cart'] !=""){
                // $id =0;
				$tot=0;
		  foreach ($_SESSION['cart'] as $item) {
						?>
                                                    <tr>
                                                <td>
                                                    <a href="#">
                                                        <img width="60px" src="images/<?php echo $item['p_image'];?>" alt="product">
                                                    </a>
                                                </td>

                                                <td>
                                                    <h6 class="regular"><?php echo $item['p_title'];?></h6>
                                                    <p><?php echo $item['p_fulldesc'];?></p>
                                                </td>
                                                <td>
                                                    <span>$<?php echo $item['p_price'] * $item['p_qty'];?></span>
                                                </td>
                                             <!--   <td>
                                                    <select class="form-control" name="qty">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </td>  -->
                                                <td>
                                                    <span class="text-primary">$<?php echo $item['p_price'] * $item['p_qty'];?></span>
                                                </td>
                                                <td>
					<?php

					$tot =$tot+$item['p_price'] * $item['p_qty'];
					$_SESSION['toatl']= $tot;

				//	if($_GET['code'])
					//{
				// echo $pid = $_GET['code'];
					//	unset($_SESSION['cart'][$pid]);
                     // if(empty($_SESSION['cart'])) unset($_SESSION['cart']);
												?>

                                    <!--    <td><a href="cart.php?code=<?php// echo $id ?>">Delete from cart</a></td> -->
                                                </td>
                                            </tr>

		  <?php  }

		  } $_SESSION['toatl']=$tot;
		  ?>


                                                </tbody>
                                            </table><!-- end table -->
                                        </div><!-- end table-responsive -->
                                    </div><!-- end tab-pane -->

									<div class="tab-pane" id="billing-info">
                                        <div class="row">
										<div class="col-md-3">  </div>
								<?php   $quryid="SELECT * FROM users";
                            $resld=mysqli_query($connection,$quryid);
                            $rowid=mysqli_fetch_array($resld);
                            $user_id=$rowid['user_id'];	 ?>
							<?php	if(isset($_POST['btninfo'])){

							//$userid=$_POST['userid'];
							$phone=$_POST['phone'];
							$address1=$_POST['address1'];
						    $city=$_POST['city'];
						    $zip=$_POST['zip'];
						    $buydesc=$_POST['buydesc'];
							$country=$_POST['countryName'];

						 $sqlQuery = "INSERT INTO buyers (user_id,phone,address,city,zipcode,buydescription) VALUES (' $user_id','$phone', '$address1','$city', '$zip','$buydesc')";


                       if (mysqli_query($connection,$sqlQuery)) {

						echo "<div class='alert alert-success'> Submitted!  </div> ";
                       }
							}
                           ?>
										<form method="POST">
                                            <div class="col-md-6">
                                                <h5 class="thin subtitle"> Tu información</h5>
                           <?php
								$email=$_SESSION['uemail'];
							    $qry="SELECT * FROM users  Where email='$email'";
								$resl=mysqli_query($connection,$qry);
								$rw=mysqli_fetch_array($resl);

			 ?>




                                                <div class="row" style="background:#f7f7f7;padding:20px;">

													 <div class="form-group">
                                                            <input id="country" type="text" value="<?php echo $rw['countryName']; ?>"  name="countryName" class="form-control input-md required">
                                                        </div><!-- end form-group -->
                                                        <div class="form-group">
                                                            <input id="fname" type="text" value="<?php echo $rw['firstName']; ?>"  name="firstname" class="form-control input-md required">
                                                        </div><!-- end form-group -->
                                                         <div class="form-group">
                                                            <input id="surname" type="text" value="<?php echo $rw['lastName']; ?>" name="lastname" class="form-control input-md required">
                                                        </div>
                                                    <!-- end col -->

                                                       <!-- end form-group -->

			<?php  $user_id=$rw['user_id']; ?>
			<?php
								$email=$_SESSION['uemail'];
							   $sql="SELECT * FROM buyers  WHERE user_id='$user_id'";
						       $stmt=mysqli_query($connection,$sql);
				           if($stmt == false) {
				          trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
				               }
				    $nr=mysqli_num_rows($stmt);


			 ?>
										<div class="form-group">
                                            <input id="phone" type="tel" value="<?php echo $rows['phone']; ?>"  placeholder="Teléfono" name="phone" class="form-control input-md required">
                                            </div><!-- end form-group -->

                                                <!-- end row -->
												<div class="form-group">
                                                            <input id="email" type="text" value="<?php echo $rw['email']; ?>"  name="email" class="form-control input-md required email">
                                                        </div><!-- end form-group -->
                                                <div class="form-group">
                                                    <input id="billingAddress" type="text" value="<?php echo $address =$rows['address']; ?>" placeholder="Dirección" name="address1" class="form-control input-md required">
                                                </div><!-- end form-group -->

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input id="city" type="text" value="<?php echo $rows['city'];?>" placeholder="Ciudad" name="city" class="form-control input-md required">
                                                        </div><!-- end form-group -->
                                                    </div><!-- end col -->
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input id="zip" type="text" placeholder="Código postal / postal" name="zip" class="form-control input-md required">
										<input  type="hidden" value="<?php echo $user_id;?>"  name="userid" class="form-control input-md required">
                                                        </div><!-- end form-group -->
                                                    </div><!-- end col -->

												<div class="form-group">
                                                    <textarea rows="6" class="form-control" placeholder="Su descripción aquí ..."  value="<?php echo $rows['buydesc'];?>"name="buydesc"></textarea>
                                                </div><!-- end form-group -->
</div>
                                            <?php if($address == ""  OR $address == NULL ){

											?>
											<div class="form-group">
									<center>	   <input type="submit" class="btn btn-success" value="Enviar" name="btninfo"> </center>
											   </div>
											   <?php
											}
											?>
												</div><!-- end row -->
                                            </div><!-- end col -->


                                        </div><!-- end row -->
                                   </form>
								   </div><!-- end tab-pane -->
                                    <div class="tab-pane" id="payment">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="thin subtitle">Elija un método de pago</h5>
                                                <div class="panel-group accordion style2" id="accordionPayment" role="tablist" aria-multiselectable="true">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="headingPayment1">
                                                            <h4 class="panel-title">
                                                                <a class="" data-toggle="collapse" data-parent="#accordionPayment" href="#collapsePayment1" aria-expanded="true" aria-controls="collapsePayment1">
                                                                     <i class="fa fa-paypal mr-10"></i>Pagar con PayPal
                                                                </a>
                                                            </h4><!-- end panel-title -->
                                                        </div><!-- end panel-heading -->
                                                        <div id="collapsePayment1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingPayment1">
                                                            <div class="panel-body">


                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-sm-offset-4 col-sm-8 text-right">

																		<a href="orderInsert.php" class="btn btn-default btn-md round">Pagar con PayPal <i class="fa fa-arrow-circle-right ml-5"></i></a>
                                                                        </div><!-- end col -->
                                                                    </div><!-- end row -->
                                                                </div><!-- end form-group -->
                                                            </div><!-- end panel-body -->
                                                        </div><!-- end collapse -->
                                                    </div><!-- end panel -->

                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="headingPayment2">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionPayment" href="#collapsePayment2" aria-expanded="false" aria-controls="collapsePayment2">

                                                                </a>
                                                            </h4>
                                                        </div><!-- end panel-heading -->
                                                        <div id="collapsePayment2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingPayment2">
                                                            <div class="panel-body">
                                                                <div class="form-group">
                                                                    <div class="checkbox-input checkbox-primary mb-10">

                                                                        </div><!-- end checkbox-input -->
                                                                </div><!-- end form-group -->

                                                            </div><!-- end panel-body -->
                                                        </div><!-- end collapse -->
                                                    </div><!-- end panel -->
                                                </div><!-- end panel-group -->
                                            </div><!-- end col -->
                                            <div class="col-md-6">
                                                <h5 class="thin subtitle">Preguntas frecuentes</h5>
                                                <div class="panel-group accordion style1" id="question" role="tablist" aria-multiselectable="true">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="questionOne">
                                                            <h4 class="panel-title">
                                                                <a class="" data-toggle="collapse" data-parent="#question" href="#collapseQuestionOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    ¿Qué métodos de pago puedo usar?
                                                                </a>
                                                            </h4>
                                                        </div><!-- end panel-heading -->
                                                        <div id="collapseQuestionOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="questionOne">
                                                            <div class="panel-body">
                                                                <p>Lorem ipsum dolor sit amet, link adipisicing elit. Dicta voluptatem, tenetur eum tempore minus libero voluptates eos doloremque. Dolore minima rem consequuntur exercitationem quaerat deleniti repellendus enim necessitatibus mollitia tenetur?</p>
                                                            </div><!-- end panel-body -->
                                                        </div><!-- end collapse -->
                                                    </div><!-- end panel -->

                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="questionTwo">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#question" href="#collapseQuestionTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                    ¿Puedo usar una tarjeta de regalo para pagar mi compra?
                                                                </a>
                                                            </h4>
                                                        </div><!-- end panel-heading -->
                                                        <div id="collapseQuestionTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionTwo">
                                                            <div class="panel-body">
                                                                <p>Lorem ipsum dolor sit amet, link adipisicing elit. Dicta voluptatem, tenetur eum tempore minus libero voluptates eos doloremque. Dolore minima rem consequuntur exercitationem quaerat deleniti repellendus enim necessitatibus mollitia tenetur?</p>
                                                            </div><!-- end panel-body -->
                                                        </div><!-- end collapse -->
                                                    </div><!-- end panel -->

                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="questionThree">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#question" href="#collapseQuestionThree" aria-expanded="false" aria-controls="collapseThree">
                                                                    ¿Cuánto tiempo llevará obtener mi pedido?
                                                                </a>
                                                            </h4>
                                                        </div><!-- end panel-heading -->
                                                        <div id="collapseQuestionThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionThree">
                                                            <div class="panel-body">
                                                                <p>Lorem ipsum dolor sit amet, link adipisicing elit. Dicta voluptatem, tenetur eum tempore minus libero voluptates eos doloremque. Dolore minima rem consequuntur exercitationem quaerat deleniti repellendus enim necessitatibus mollitia tenetur?</p>
                                                            </div><!-- end panel-body -->
                                                        </div><!-- end collapse -->
                                                    </div><!-- end panel -->
                                                </div><!-- end panel-group -->
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div><!-- end tab-pane -->
                                </div><!-- end pills content -->

                                <hr class="spacer-30">

                                <div class="row">
                                   <!-- <div class="col-sm-7 text-left">
                                        <form class="form-inline">
                                            <div class="form-group">
                                                <input class="form-control input-md" type="text" placeholder="Coupon code">
                                            </div>
                                           <button class="btn btn-default btn-md round" type="submit">Apply</button>
                                        </form>
                                    </div> end col -->

                                    <div class="col-sm-5">
                                        <div class="table-responsive">
                                            <table class="table no-border">
                                                <tr>
                                                    <th>Subtotal del carrito</th>
                                                    <td><?php echo '$'.$tot;?></td>
                                                </tr>

                                                <tr>
                                                    <th>Total del pedido</th>
                                               <td><?php echo '$'.$tot;?></td>
                                                </tr>
                                            </table><!-- end table -->
                                        </div><!-- end table-responsive -->
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- end section -->

        <!-- start footer -->
        <?php require 'footer.php'; ?>
        <!-- end footer -->


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
