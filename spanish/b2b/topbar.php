<?php  session_start();
require 'Connect.php'; 


 ?>
  <div class="topBar inverse">
            <div class="container">
                <ul class="list-inline pull-left hidden-sm hidden-xs">
                    <li style="color:#878c94;"><span class="text-primary">¿Tengo una pregunta?</span> Envíenos un correo electrónico info@orybu.com</li>
                </ul>
                
                <ul class="topBarNav pull-right">
                     <li class="linkdown">
                        <a href="javascript:void(0);">
                            <i class="fa fa-usd mr-5"></i>
                            Dólar estadounidense
                           
                        </a>
                     
                    </li>
					
                    <li class="linkdown" >
                        <a href="javascript:void(0);">
                           <img src="img/flags/flag-spain.jpg" class="mr-5" alt="">
                            <span class="hidden-xs">
                             España
                                <i class="fa fa-angle-down ml-5"></i>
                            </span>    
                        </a>
                        <ul class="w-100">
                          
                            <li><a href="../../"><img src="img/flags/flag-english.jpg" class="mr-5" alt="">Inglés</a>
							</li>
                        </ul>
                    </li>
		
		
			<?php
			if (isset($_SESSION['uemail'])) { ?>		
			<?php
			$uemail =$_SESSION['uemail'];
		 	$sql="Select * from `users`Where email ='$uemail'";
							$result=mysqli_query($connection,$sql);
		 $nr = mysqli_num_rows($result);
			$r=mysqli_fetch_array($result);
		
	
		   

			?>		
                      
				
					
					<li class="linkdown">
                        <a href="javascript:void(0);">
                            <i class="fa fa-user mr-5"></i>
                            <span class="hidden-xs">
                                Hola.  <?php echo $r['firstName'];   ?>
                                <i class="fa fa-angle-down ml-5"></i>
                            </span>
                        </a>
						<?php
				 $userType = $_SESSION['utype'];
						if($userType == 'supplier')
						{
					?>
                        <ul class="w-150">
                        
							<li><a href="myorybue.php">Mi Orybu</a></li> 
                            <li><a href="chatuser.php">Centro de mensajes</a></li>
							<li><a href="suppliers.php">Administrar productos</a></li>
							<li><a href="mysorders.php">Mis ordenes</a></li>
							<li><a href="myorybue.php">Favoritos</a></li>
								<li >
					<a href="logoff.php">Cerrar sesión</a></li> 
                          
                        </ul>
                    </li>
					<?php
					}
					else if($userType == 'buyer')
					{
					?>
					   <ul class="w-150">
                        
							<li><a href="buyerprofile.php">Mi cuenta</a></li> 
                            <li><a href="#">Centro de mensajes</a></li>
							<li><a href="buyerorders.php">Mis ordenes</a></li>
										<li >
					<a href="logoff.php">Cerrar sesión</a></li> 
							
                          
                        </ul>
					<?php
					}
					else if($userType == 'both')
					{
					?>
					   <ul class="w-150">
                        
							
							<li><a href="myorybue.php">Mi Orybu</a></li> 
                            <li><a href="#">Centro de mensajes</a></li>
							<li><a href="suppliers.php">Administrar productos</a></li>
						<!--	<li><a href="mysorders.php"> Received Orders</a></li>
							-->	<li><a href="buyerorders.php">Mis ordenes</a></li>
							<li><a href="myorybue.php">Favoritos</a></li>
								<li >
					<a href="logoff.php">Cerrar sesión</a></li> 
							
                          
                        </ul>
					<?php
					}
					
					
				} else {	?>
				
			
				<li class="linkdown" >
                        <a href="javascript:void(0);">
                            <i class="fa fa-user mr-5"></i>
                            <span class="hidden-xs">
                                Hola.  Iniciar sesión
                                <i class="fa fa-angle-down ml-5"></i>
                            </span>
                        </a>
                        <ul class="w-150">
                            <li><a href="singlelogin.php">Iniciar sesión</a></li> 
                            <li><a href="register.php">Crear una cuenta</a></li>
							
                          
                        </ul>
                    </li> 
				<?php	}  ?>
					
                   <!-- <li class="linkdown">
                        <a href="javascript:void(0);">
                            <i class="fa fa-shopping-basket mr-5"></i>
                            <span class="hidden-xs">
                                Cart<sup class="text-primary">(3)</sup>
                                <i class="fa fa-angle-down ml-5"></i>
                            </span>    
                        </a>
                        <ul class="cart w-250">
                            <li>
                                <div class="cart-items">
                                    <ol class="items">
                                        <li> 
                                            <a href="shop-single-product-v1.html" class="product-image">
                                                <img src="img/products/men_06.jpg" alt="Sample Product ">
                                            </a>
                                            <div class="product-details">
                                                <div class="close-icon"> 
                                                    <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
                                                </div>
                                                <p class="product-name"> 
                                                    <a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a> 
                                                </p>
                                                <strong>1</strong> x <span class="price text-primary">$59.99</span>
                                            </div><!-- end product-details -->
                                   <!--     </li>
                                        <li> 
                                            <a href="shop-single-product-v1.html" class="product-image">
                                                <img src="img/products/shoes_01.jpg" alt="Sample Product ">
                                            </a>
                                            <div class="product-details">
                                                <div class="close-icon"> 
                                                    <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
                                                </div>
                                                <p class="product-name"> 
                                                    <a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a> 
                                                </p>
                                                <strong>1</strong> x <span class="price text-primary">$39.99</span>
                                            </div>
                                        </li>
                                        <li> 
                                            <a href="shop-single-product-v1.html" class="product-image">
                                                <img src="img/products/bags_07.jpg" alt="Sample Product ">
                                            </a>
                                            <div class="product-details">
                                                <div class="close-icon"> 
                                                    <a href="javascript:void(0);"><i class="fa fa-close"></i></a>
                                                </div>
                                                <p class="product-name"> 
                                                    <a href="shop-single-product-v1.html">Lorem Ipsum dolor sit</a> 
                                                </p>
                                                <strong>1</strong> x <span class="price text-primary">$29.99</span>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                            </li>
                            <li>
                                <div class="cart-footer">
                                    <a href="cart.html" class="pull-left"><i class="fa fa-cart-plus mr-5"></i>View Cart</a>
                                    <a href="checkout.html" class="pull-right"><i class="fa fa-shopping-basket mr-5"></i>Checkout</a>
                                </div>
                            </li>
                        </ul>
                    </li>   -->
                </ul>
            </div><!-- end container -->
        </div>