<?php session_start();
include('Connect.php');
include('head.php');
?>

<body>
<!-- start topBar -->

<?php 
include('topbar.php');
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
                                    <h6 class="text-uppercase">Categorías <i class="fa fa-navicon pull-right"></i></h6>
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
					    <?php
							$sql="Select * from `aboutus` Where elementname='slider1'";
						$result=mysqli_query($connection,$sql);
							$row=mysqli_fetch_array($result);
								$hreflink =$row['hreflink'];
							 	$picture=$row['picture'];
								$title=$row['title'];
								$subtitle=$row['subtitle'];
								$description=$row['description'];


								?>
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
                            $sqll="Select * from `slider` where id > '1' ";
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
		<div class="row hidden-xs">
				<div class="col-sm-3 col-md-3">
					<div class="box-banner-img">
						<?php
						$query="Select * from `products` Where productType='Innovation'";
						$resultt=mysqli_query($connection,$query);
						$rows=mysqli_fetch_array($resultt);
						$title =$rows['productType'];
						?>
                        <?php
                        $sql="Select * from `images` Where id='8'";
                        $result=mysqli_query($connection,$sql);
                        $row=mysqli_fetch_array($result);
                        $image=$row['image'];
                        ?>
						<a href="premShop.php?title=<?php echo $title; ?>"><img class="img-responsive height" src="../../images/<?php echo $image ?>" alt=""/></a>
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
                        $sql="Select * from `images` Where id='9'";
                        $result=mysqli_query($connection,$sql);
                        $row=mysqli_fetch_array($result);
                        $image=$row['image'];
                        ?>
						<a href="<?php echo $hreflink ?>"><img class="img-responsive height" src="../../images/<?php echo $image?>" />
						</a>
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
                    $sql="Select * from `images` Where id='10'";
                    $result=mysqli_query($connection,$sql);
                    $row=mysqli_fetch_array($result);
                    $image=$row['image'];
                    ?>
					<div class="box-banner-img">
						<a href="premShop.php?title=<?php echo $title ?>"><img class="img-responsive height" src="../../images/<?php echo $image ?>" alt=""/></a>
					</div><!-- end box-banner-img -->
				</div><!-- end col -->
		</div> <!-- Main Row End -->
	<hr>




<div id="Carousel2" class="carousel slide" style="background-color:#ffffff;">
                <!-- Carousel items -->

                    <div class="carousel-inner" style="background-color:#ffffff;">
                        <div class="item active" style="padding-right:70px; padding-left:70px; background-color:#ffffff;">
                            <div class="row" style="background-color:#ffffff;">
												 <?php
				  $sql="SELECT * FROM products WHERE productType='Eco Friendly' OR productType ='Innovation' LIMIT 12";

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

							  <span class="amount text-primary">USD <?php echo $price = $row['price'];  ?></span>
							  </br>
							  <span class="amount text-default">Orden min:<?php echo $quantity?></span>
							  </br>
								<a href="chat2.php?sellerid=<?php echo $rows['user_id'];?>&pid=<?php echo $row['pid'];?>&name=<?php echo $rows['firstName']?>"></i>Contactar al proveedor</a>
							</br>
							  </center>
							  </br>
							  </div>
							     <?php
				}
				?>
						</div><!--.row-->
                        </div><!--.item-->
<!-- ////////////////////////////////////// -->
                     <div class="item" style="padding-right:70px; padding-left:70px; background-color:#ffffff;">
                            <div class="row" style="background-color:#ffffff;">
												 <?php
			 $sql="SELECT * FROM products  INNER JOIN categories ON(products.catid = categories.catid)Where productstatus=1 AND productaction = 1 AND (productType='Innovation' OR productType='Eco Friendly') LIMIT 5,10";

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

							  <span class="amount text-primary">USD<?php echo $price = $row['price'];  ?></span>
							  </br>
							  <span class="amount text-default">orden mín:<?php echo $quantity?></span>
							  </br>							  
							<a href="chat2.php?sellerid=<?php echo $rows['user_id'];?>&pid=<?php echo $row['pid'];?>&name=<?php echo $rows['firstName']?>"></i>Contactar al proveedor</a>							
                
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
                ?>
                <?php
                $sql="Select * from `images` Where id='15'";
                $result=mysqli_query($connection,$sql);
                $row=mysqli_fetch_array($result);
                $image=$row['image'];
                ?>

    <div class="col-sm-6" style="margin-right:50px;">
	<a href="<?php echo $hreflink ?>"><img style="width:600px;height:180px;" src="../../images/<?php echo $image?>" alt=""/></a>

    </div>

                <?php
                $sql="Select * from `aboutus` Where elementname='banner2'";
                $result=mysqli_query($connection,$sql);
                $row=mysqli_fetch_array($result);
                $hreflink =$row['hreflink'];
                ?>
                <?php
                $sql="Select * from `images` Where id='16'";
                $result=mysqli_query($connection,$sql);
                $row=mysqli_fetch_array($result);
                $image=$row['image'];
                ?>
	 <div class="col-sm-4">
	<a href="<?php echo $hreflink ?>"><img style="width:460px;height:180px;" src="../../images/<?php echo $image?>" alt=""/></a>

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
    				<center><h2 class="title" style="color:orange;">Haga su solicitud de compra</h2>
                        </center><form method="POST" action="requestSend.php" enctype="multipart/form-data">
                          <div class="form-group">

                     <?php   $sql="Select * from `categories` WHERE NOT title='Innovation' OR NOT title='Eco Friendly'";
							$rst=mysqli_query($connection,$sql);
								?>
						   <select class="form-control input-lg" id="catid" name="dropcat">
						    <option value=""> Categoría * </option>
							<?php while($rowt=mysqli_fetch_array($rst)){ ?>
                             <option value="<?php echo $rowt['title'];?>"><?php echo $rowt['title'];?></option>

						 <?php } ?>
                         </select>

						 </div>
						   <div class="form-group">

                                <input name="pname" type="text" id="firstname" class="form-control input-lg" required placeholder="Nombre del producto *">
                            </div>
							<div class="row">
							<div class="col-sm-6">
                            <div class="form-group">

                           <input name="quantity" type="text" id="qty" class="form-control input-lg" required placeholder="Ingresa Cantidad *">
                            </div>
							</div>
							<div class="col-sm-6">
                       <div class="form-group">

						   <select class="form-control input-lg" id="unit" name="dropunit">
	                         <option value="kilogram">Kilogramo</option>
                             <option value="gram">Gramo</option>
							 <option value="piece">Pieza</option>
							 <option value="ton">Tonelada</option>
							 <option value="cubic meter">Metro cúbico</option>
						     <option value="20 ft conteiner">Contenedor de 20 pies</option>
                             <option value="40 ft conteiner">Contenedor de 40 pies</option>
                             <option value="litter">Camada</option>
                             <option value="others">Otros</option>
                         </select>

						 </div>
                          	</div>
							</div>
                           <div class="form-group">
								<input name="dtym" type="text" id="dtime" class="form-control input-lg" required placeholder="Fecha límite para enviar *" onfocus="(this.type='date')">
							</div>



              <!--SELECT CON LOS PAISES-->
              <div class="widget form-group">
                <select name="pais">
                <option value="Elegir" id="AF">Pais de Origen *</option>
                <option value="Afganistán" id="AF">Afganistán</option>
                <option value="Albania" id="AL">Albania</option>
                <option value="Alemania" id="DE">Alemania</option>
                <option value="Andorra" id="AD">Andorra</option>
                <option value="Angola" id="AO">Angola</option>
                <option value="Anguila" id="AI">Anguila</option>
                <option value="Antártida" id="AQ">Antártida</option>
                <option value="Antigua y Barbuda" id="AG">Antigua y Barbuda</option>
                <option value="Antillas holandesas" id="AN">Antillas holandesas</option>
                <option value="Arabia Saudí" id="SA">Arabia Saudí</option>
                <option value="Argelia" id="DZ">Argelia</option>
                <option value="Argentina" id="AR">Argentina</option>
                <option value="Armenia" id="AM">Armenia</option>
                <option value="Aruba" id="AW">Aruba</option>
                <option value="Australia" id="AU">Australia</option>
                <option value="Austria" id="AT">Austria</option>
                <option value="Azerbaiyán" id="AZ">Azerbaiyán</option>
                <option value="Bahamas" id="BS">Bahamas</option>
                <option value="Bahrein" id="BH">Bahrein</option>
                <option value="Bangladesh" id="BD">Bangladesh</option>
                <option value="Barbados" id="BB">Barbados</option>
                <option value="Bélgica" id="BE">Bélgica</option>
                <option value="Belice" id="BZ">Belice</option>
                <option value="Benín" id="BJ">Benín</option>
                <option value="Bermudas" id="BM">Bermudas</option>
                <option value="Bhután" id="BT">Bhután</option>
                <option value="Bielorrusia" id="BY">Bielorrusia</option>
                <option value="Birmania" id="MM">Birmania</option>
                <option value="Bolivia" id="BO">Bolivia</option>
                <option value="Bosnia y Herzegovina" id="BA">Bosnia y Herzegovina</option>
                <option value="Botsuana" id="BW">Botsuana</option>
                <option value="Brasil" id="BR">Brasil</option>
                <option value="Brunei" id="BN">Brunei</option>
                <option value="Bulgaria" id="BG">Bulgaria</option>
                <option value="Burkina Faso" id="BF">Burkina Faso</option>
                <option value="Burundi" id="BI">Burundi</option>
                <option value="Cabo Verde" id="CV">Cabo Verde</option>
                <option value="Camboya" id="KH">Camboya</option>
                <option value="Camerún" id="CM">Camerún</option>
                <option value="Canadá" id="CA">Canadá</option>
                <option value="Chad" id="TD">Chad</option>
                <option value="Chile" id="CL">Chile</option>
                <option value="China" id="CN">China</option>
                <option value="Chipre" id="CY">Chipre</option>
                <option value="Ciudad estado del Vaticano" id="VA">Ciudad estado del Vaticano</option>
                <option value="Colombia" id="CO">Colombia</option>
                <option value="Comores" id="KM">Comores</option>
                <option value="Congo" id="CG">Congo</option>
                <option value="Corea" id="KR">Corea</option>
                <option value="Corea del Norte" id="KP">Corea del Norte</option>
                <option value="Costa del Marfíl" id="CI">Costa del Marfíl</option>
                <option value="Costa Rica" id="CR">Costa Rica</option>
                <option value="Croacia" id="HR">Croacia</option>
                <option value="Cuba" id="CU">Cuba</option>
                <option value="Dinamarca" id="DK">Dinamarca</option>
                <option value="Djibouri" id="DJ">Djibouri</option>
                <option value="Dominica" id="DM">Dominica</option>
                <option value="Ecuador" id="EC">Ecuador</option>
                <option value="Egipto" id="EG">Egipto</option>
                <option value="El Salvador" id="SV">El Salvador</option>
                <option value="Emiratos Arabes Unidos" id="AE">Emiratos Arabes Unidos</option>
                <option value="Eritrea" id="ER">Eritrea</option>
                <option value="Eslovaquia" id="SK">Eslovaquia</option>
                <option value="Eslovenia" id="SI">Eslovenia</option>
                <option value="España" id="ES">España</option>
                <option value="Estados Unidos" id="US">Estados Unidos</option>
                <option value="Estonia" id="EE">Estonia</option>
                <option value="c" id="ET">Etiopía</option>
                <option value="Ex-República Yugoslava de Macedonia" id="MK">Ex-República Yugoslava de Macedonia</option>
                <option value="Filipinas" id="PH">Filipinas</option>
                <option value="Finlandia" id="FI">Finlandia</option>
                <option value="Francia" id="FR">Francia</option>
                <option value="Gabón" id="GA">Gabón</option>
                <option value="Gambia" id="GM">Gambia</option>
                <option value="Georgia" id="GE">Georgia</option>
                <option value="Georgia del Sur y las islas Sandwich del Sur" id="GS">Georgia del Sur y las islas Sandwich del Sur</option>
                <option value="Ghana" id="GH">Ghana</option>
                <option value="Gibraltar" id="GI">Gibraltar</option>
                <option value="Granada" id="GD">Granada</option>
                <option value="Grecia" id="GR">Grecia</option>
                <option value="Groenlandia" id="GL">Groenlandia</option>
                <option value="Guadalupe" id="GP">Guadalupe</option>
                <option value="Guam" id="GU">Guam</option>
                <option value="Guatemala" id="GT">Guatemala</option>
                <option value="Guayana" id="GY">Guayana</option>
                <option value="Guayana francesa" id="GF">Guayana francesa</option>
                <option value="Guinea" id="GN">Guinea</option>
                <option value="Guinea Ecuatorial" id="GQ">Guinea Ecuatorial</option>
                <option value="Guinea-Bissau" id="GW">Guinea-Bissau</option>
                <option value="Haití" id="HT">Haití</option>
                <option value="Holanda" id="NL">Holanda</option>
                <option value="Honduras" id="HN">Honduras</option>
                <option value="Hong Kong R. A. E" id="HK">Hong Kong R. A. E</option>
                <option value="Hungría" id="HU">Hungría</option>
                <option value="India" id="IN">India</option>
                <option value="Indonesia" id="ID">Indonesia</option>
                <option value="Irak" id="IQ">Irak</option>
                <option value="Irán" id="IR">Irán</option>
                <option value="Irlanda" id="IE">Irlanda</option>
                <option value="Isla Bouvet" id="BV">Isla Bouvet</option>
                <option value="Isla Christmas" id="CX">Isla Christmas</option>
                <option value="Isla Heard e Islas McDonald" id="HM">Isla Heard e Islas McDonald</option>
                <option value="Islandia" id="IS">Islandia</option>
                <option value="Islas Caimán" id="KY">Islas Caimán</option>
                <option value="Islas Cook" id="CK">Islas Cook</option>
                <option value="Islas de Cocos o Keeling" id="CC">Islas de Cocos o Keeling</option>
                <option value="Islas Faroe" id="FO">Islas Faroe</option>
                <option value="Islas Fiyi" id="FJ">Islas Fiyi</option>
                <option value="Islas Malvinas Islas Falkland" id="FK">Islas Malvinas Islas Falkland</option>
                <option value="Islas Marianas del norte" id="MP">Islas Marianas del norte</option>
                <option value="Islas Marshall" id="MH">Islas Marshall</option>
                <option value="Islas menores de Estados Unidos" id="UM">Islas menores de Estados Unidos</option>
                <option value="Islas Palau" id="PW">Islas Palau</option>
                <option value="Islas Salomón" d="SB">Islas Salomón</option>
                <option value="Islas Tokelau" id="TK">Islas Tokelau</option>
                <option value="Islas Turks y Caicos" id="TC">Islas Turks y Caicos</option>
                <option value="Islas Vírgenes EE.UU." id="VI">Islas Vírgenes EE.UU.</option>
                <option value="Islas Vírgenes Reino Unido" id="VG">Islas Vírgenes Reino Unido</option>
                <option value="Israel" id="IL">Israel</option>
                <option value="Italia" id="IT">Italia</option>
                <option value="Jamaica" id="JM">Jamaica</option>
                <option value="Japón" id="JP">Japón</option>
                <option value="Jordania" id="JO">Jordania</option>
                <option value="Kazajistán" id="KZ">Kazajistán</option>
                <option value="Kenia" id="KE">Kenia</option>
                <option value="Kirguizistán" id="KG">Kirguizistán</option>
                <option value="Kiribati" id="KI">Kiribati</option>
                <option value="Kuwait" id="KW">Kuwait</option>
                <option value="Laos" id="LA">Laos</option>
                <option value="Lesoto" id="LS">Lesoto</option>
                <option value="Letonia" id="LV">Letonia</option>
                <option value="Líbano" id="LB">Líbano</option>
                <option value="Liberia" id="LR">Liberia</option>
                <option value="Libia" id="LY">Libia</option>
                <option value="Liechtenstein" id="LI">Liechtenstein</option>
                <option value="Lituania" id="LT">Lituania</option>
                <option value="Luxemburgo" id="LU">Luxemburgo</option>
                <option value="Macao R. A. E" id="MO">Macao R. A. E</option>
                <option value="Madagascar" id="MG">Madagascar</option>
                <option value="Malasia" id="MY">Malasia</option>
                <option value="Malawi" id="MW">Malawi</option>
                <option value="Maldivas" id="MV">Maldivas</option>
                <option value="Malí" id="ML">Malí</option>
                <option value="Malta" id="MT">Malta</option>
                <option value="Marruecos" id="MA">Marruecos</option>
                <option value="Martinica" id="MQ">Martinica</option>
                <option value="Mauricio" id="MU">Mauricio</option>
                <option value="Mauritania" id="MR">Mauritania</option>
                <option value="Mayotte" id="YT">Mayotte</option>
                <option value="México" id="MX">México</option>
                <option value="Micronesia" id="FM">Micronesia</option>
                <option value="Moldavia" id="MD">Moldavia</option>
                <option value="Mónaco" id="MC">Mónaco</option>
                <option value="Mongolia" id="MN">Mongolia</option>
                <option value="Montserrat" id="MS">Montserrat</option>
                <option value="Mozambique" id="MZ">Mozambique</option>
                <option value="Namibia" id="NA">Namibia</option>
                <option value="Nauru" id="NR">Nauru</option>
                <option value="Nepal" id="NP">Nepal</option>
                <option value="Nicaragua" id="NI">Nicaragua</option>
                <option value="Níger" id="NE">Níger</option>
                <option value="Nigeria" id="NG">Nigeria</option>
                <option value="Niue" id="NU">Niue</option>
                <option value="Norfolk" id="NF">Norfolk</option>
                <option value="Noruega" id="NO">Noruega</option>
                <option value="Nueva Caledonia" id="NC">Nueva Caledonia</option>
                <option value="Nueva Zelanda" id="NZ">Nueva Zelanda</option>
                <option value="Omán" id="OM">Omán</option>
                <option value="Panamá" id="PA">Panamá</option>
                <option value="Papua Nueva Guinea" id="PG">Papua Nueva Guinea</option>
                <option value="Paquistán" id="PK">Paquistán</option>
                <option value="Paraguay" id="PY">Paraguay</option>
                <option value="Perú" id="PE">Perú</option>
                <option value="Pitcairn" id="PN">Pitcairn</option>
                <option value="Polinesia francesa" id="PF">Polinesia francesa</option>
                <option value="Polonia" id="PL">Polonia</option>
                <option value="Portugal" id="PT">Portugal</option>
                <option value="Puerto Rico" id="PR">Puerto Rico</option>
                <option value="Qatar" id="QA">Qatar</option>
                <option value="Reino Unido" id="UK">Reino Unido</option>
                <option value="República Centroafricana" id="CF">República Centroafricana</option>
                <option value="República Checa" id="CZ">República Checa</option>
                <option value="República de Sudáfrica" id="ZA">República de Sudáfrica</option>
                <option value="República Democrática del Congo Zaire" id="CD">República Democrática del Congo Zaire</option>
                <option value="República Dominicana" id="DO">República Dominicana</option>
                <option value="Reunión" id="RE">Reunión</option>
                <option value="Ruanda" id="RW">Ruanda</option>
                <option value="Rumania" id="RO">Rumania</option>
                <option value="Rusia" id="RU">Rusia</option>
                <option value="Samoa" id="WS">Samoa</option>
                <option value="Samoa occidental" id="AS">Samoa occidental</option>
                <option value="San Kitts y Nevis" id="KN">San Kitts y Nevis</option>
                <option value="San Marino" id="SM">San Marino</option>
                <option value="San Pierre y Miquelon" id="PM">San Pierre y Miquelon</option>
                <option value="San Vicente e Islas Granadinas" id="VC">San Vicente e Islas Granadinas</option>
                <option value="Santa Helena" id="SH">Santa Helena</option>
                <option value="Santa Lucía" id="LC">Santa Lucía</option>
                <option value="Santo Tomé y Príncipe" id="ST">Santo Tomé y Príncipe</option>
                <option value="Senegal" id="SN">Senegal</option>
                <option value="Serbia y Montenegro" id="YU">Serbia y Montenegro</option>
                <option value="Sychelles" id="SC">Seychelles</option>
                <option value="Sierra Leona" id="SL">Sierra Leona</option>
                <option value="Singapur" id="SG">Singapur</option>
                <option value="Siria" id="SY">Siria</option>
                <option value="Somalia" id="SO">Somalia</option>
                <option value="Sri Lanka" id="LK">Sri Lanka</option>
                <option value="Suazilandia" id="SZ">Suazilandia</option>
                <option value="Sudán" id="SD">Sudán</option>
                <option value="Suecia" id="SE">Suecia</option>
                <option value="Suiza" id="CH">Suiza</option>
                <option value="Surinam" id="SR">Surinam</option>
                <option value="Svalbard" id="SJ">Svalbard</option>
                <option value="Tailandia" id="TH">Tailandia</option>
                <option value="Taiwán" id="TW">Taiwán</option>
                <option value="Tanzania" id="TZ">Tanzania</option>
                <option value="Tayikistán" id="TJ">Tayikistán</option>
                <option value="Territorios británicos del océano Indico" id="IO">Territorios británicos del océano Indico</option>
                <option value="Territorios franceses del sur" id="TF">Territorios franceses del sur</option>
                <option value="Timor Oriental" id="TP">Timor Oriental</option>
                <option value="Togo" id="TG">Togo</option>
                <option value="Tonga" id="TO">Tonga</option>
                <option value="Trinidad y Tobago" id="TT">Trinidad y Tobago</option>
                <option value="Túnez" id="TN">Túnez</option>
                <option value="Turkmenistán" id="TM">Turkmenistán</option>
                <option value="Turquía" id="TR">Turquía</option>
                <option value="Tuvalu" id="TV">Tuvalu</option>
                <option value="Ucrania" id="UA">Ucrania</option>
                <option value="Uganda" id="UG">Uganda</option>
                <option value="Uruguay" id="UY">Uruguay</option>
                <option value="Uzbekistán" id="UZ">Uzbekistán</option>
                <option value="Vanuatu" id="VU">Vanuatu</option>
                <option value="Venezuela" id="VE">Venezuela</option>
                <option value="Vietnam" id="VN">Vietnam</option>
                <option value="Wallis y Futuna" id="WF">Wallis y Futuna</option>
                <option value="Yemen" id="YE">Yemen</option>
                <option value="Zambia" id="ZM">Zambia</option>
                <option value="Zimbabue" id="ZW">Zimbabue</option>
              </select>
              </div><!-- end widget -->


              <!--FIN SELECT CON LOS PAISES-->

                       <center>


                         <input type="submit" class="btn btn-success round btn-md"  name="requestSend" value="Enviar">

                        </form>

						</center>
							</div>

				<div style="width:100%;margin-top:18px"  >
				<a href="breq.php" class="btn btn-success round btn-lg" style="width:100%" >
						Mostrar solicitud de compra
				</a>

				</div>


				   </div><!-- end col -->
<!-- MADE IN CHILE -->  
<?php
   try {
        include('connect.php');
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
                <h2 class="title"><span class="text-primary">HECHO</span> EN <span class="text-primary">CHILE</span></h2>
                <?php while ($categorias = $resultado->fetch_all(MYSQLI_ASSOC) ) { ?>
                <?php foreach($categorias as $cate): ?>
                <div class="col-sm-4 col-md-4 col-xs-4">
                    <div class="thumbnail store style1" style="height: 15rem; width:20rem">
                        <div class="header">
                        <a href="chileAll.php?id=<?php echo $cate['hreflink']; ?>">
                                <figure class="layer">
                                    <img  src="../../images/<?php echo $cate['picture']; ?>" alt="Hecho en Chile" class="img-responsive" style="height: 15rem; width:20rem">
                                </figure>
                            </a>
                        </div>
                    </div><!-- end thumbnail -->
                </div><!-- end col -->
                <?php endforeach;?>
                <?php }?>
            </div><!-- end row -->
        </div>
    </div><!-- end col -->
</div><!-- end row -->

<!--FIN MADE IN CHILE --> 


     <hr>


			<div class="col-sm-12">
                        <div class="title-wrap">
                            <h2 class="title">PRODUCTOS<span class="text-primary"> SELECCIONADOS</span></h2>
							</div>
			</div>


			<hr>
                       <div class="row">

                </div><!-- end row -->
<hr>
<!--COMIENZO DEL CARRUSEL NUMERO 1-->

<div id="Carousel1" class="carousel slide">
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

							  <span class="amount text-primary">USD <?php echo $price = $row['price'];  ?></span>
							  </br>
							  <span class="amount text-default">orden mín:<?php echo $quantity?></span>
							  </br>
							<a href="chat2.php?sellerid=<?php echo $rows['user_id'];?>&pid=<?php echo $row['pid'];?>&name=<?php echo $rows['firstName']?>"></i>Contactar al proveedor</a>
							  </center>
							  </div>
						<?php
				}
				?>
						</div><!--.row-->
                        </div><!--.item-->
<!-- ////////////////////////////////////// -->
                     

                    </div><!--.carousel-inner-->
                   <a data-slide="prev" href="#Carousel1" class="left carousel-control" style="padding-top:70px; padding-right:100px;"><img src="img/prev.png" style="height:100px; width:100px;  "></a>
                  <a data-slide="next" href="#Carousel1" class="right carousel-control" style="padding-top:70px; padding-left:100px; "><img src="img/next.png" style="height:100px; width:100px; float:right; "></a>
                 <!-- Carousel items -->


                </div><!--.Carousel-->
                <!--FIN CARRUSEL NUMERO 2-->

<hr>
<!--COMIENZO DEL CARRUSEL NUMERO 1-->

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

							  <span class="amount text-primary">USD <?php echo $price = $row['price'];  ?></span>
							  </br>
							  <span class="amount text-default">orden mín:<?php echo $quantity?></span>
							  </br>
							<a href="chat2.php?sellerid=<?php echo $rows['user_id'];?>&pid=<?php echo $row['pid'];?>&name=<?php echo $rows['firstName']?>"></i>Contactar al proveedor</a>
							  </center>
							  </div>
						<?php
				}
				?>
						</div><!--.row-->
                        </div><!--.item-->
<!-- ////////////////////////////////////// -->
                     

                    </div><!--.carousel-inner-->
                   <a data-slide="prev" href="#Carousel2" class="left carousel-control" style="padding-top:70px; padding-right:100px;"><img src="img/prev.png" style="height:100px; width:100px;  "></a>
                  <a data-slide="next" href="#Carousel2" class="right carousel-control" style="padding-top:70px; padding-left:100px; "><img src="img/next.png" style="height:100px; width:100px; float:right; "></a>
                 <!-- Carousel items -->


                </div><!--.Carousel-->
                <!--FIN CARRUSEL NUMERO 2-->

<hr>
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
                    $imagesql="Select * from `aboutus` Where elementname='QuestionBackgroundPicture'";
                    $imageresult=mysqli_query($connection,$imagesql);
                    $imagerow=mysqli_fetch_array($imageresult);
                    ?>
                    <?php
                    $sql="Select * from `images` Where id='17'";
                    $result=mysqli_query($connection,$sql);
                    $row=mysqli_fetch_array($result);
                    $image=$row['image'];
                    ?>
                <div class="container" >

                    <div class="col-sm-12" style=" margin-left:-12px; margin-right:2px;background-image: url(../../images/<?php echo $image; ?>); width:1050px height:206px; ">


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
          <h4 class="modal-title" style="float:left;">Tu retroalimentación</h4>
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
		   <h6>  Tu correo electrónico: </h6>
		   <?php
		   }?>

		  </div>
		   <div class="col-lg-8">

          <?php if(isset($_SESSION['uemail'])){ ?>
		 <input type="hidden" class="form-control" name="email" value="<?php echo $_SESSION['uemail'];?>">
		  <?php } else{?>
		  <input type="email" class="form-control" name="email" placeholder="Ingrese correo electrónico">
		 <?php }?>


		  </div>
        </div>
		</div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-success" value="Enviar" name="vanswer">
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
                $sql="Select * from `images` Where id='18'";
                $result=mysqli_query($connection,$sql);
                $row=mysqli_fetch_array($result);
                $image=$row['image'];
                ?>
			   <img class="hidden-xs img-responsive " style="width:1150px; height:1200px; margin-top:20px" src="../../images/<?php echo $image; ?>" />
			  <img  class="visible-xs" style="width:360px; height:360px; margin-top:20px" src="../../images/<?php echo $image; ?>" />
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
                                        <p class="text-gray alt-font">Código de producto: 1032446</p>

                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star text-warning"></i>
                                        <i class="fa fa-star-half-o text-warning"></i>
                                        <span>(12 opiniones)</span>
                                        <h4 class="text-primary">$79.00</h4>
                                        <p>
Es un hecho establecido desde hace mucho tiempo que un lector se distraerá con el contenido legible de una página al mirar su diseño. El objetivo de usar Lorem Ipsum es que tiene una distribución de letras más o menos normal, en contraposición al uso de "Contenido aquí, contenido aquí", que lo hace parecer inglés legible.</p>
                                        <hr class="spacer-10">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <select class="form-control" name="select">
                                                    <option value="" selected>Color</option>
                                                    <option value="red">rojo</option>
                                                    <option value="green">Verde</option>
                                                    <option value="blue">Azul</option>
                                                </select>
                                            </div><!-- end col -->
                                            <div class="col-md-4 col-sm-6 col-xs-12">
                                                <select class="form-control" name="select">
                                                    <option value="">tamaño</option>
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
        <script>

$(document).ready(function(){

        $("#suc").fadeIn("slow");
        $("#suc").fadeOut("slow");

});
</script>
    </body>
</html>
