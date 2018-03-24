<?php
require 'Connect.php';
include('head.php');
$email=$_SESSION['uemail'];

?> 
   <div class="middleBar">
            <div class="container">
                <div class="row display-table">
                    <div class="col-sm-3 vertical-align text-left hidden-xs">
                        <a href="index.php">
							<?php 
								$sql='Select * from aboutus where elementname="logoimage"';
							$result=mysqli_query($connection,$sql);
							$row=mysqli_fetch_array($result);
							$image  = $row['picture'];?>
							
							  <img width="150"  src="images/<?php echo $image; ?>" alt="" />
                    
                        </a>
                    </div><!-- end col -->
                    <div class="col-sm-7 vertical-align text-center">
					 <form  action="search.php" method="GET">
						
						 <div class="row grid-space-1">
                                <div class="col-sm-5">
                  <input class="form-control  input-lg" type="text" name="keyword"   style="height:46px;"  placeholder=" Buscar">
                                </div><!-- end col -->
								<?php 
								$sql='Select * from `categories`';
							$result=mysqli_query($connection,$sql);
							
                               ?>
							   <div class="col-sm-4 ">
                                    <select  class="form-control input-lg" name="category">
									
                                        <option value="all">Todas las categorias</option>
                                    <?php while($row=mysqli_fetch_array($result)){
									?>    
                                  <option value="<?php echo $row['titulo'];?>"><?php echo $row['titulo'];?></option>
									<?php 
								    	} ?>  
										</select>
                                </div><!-- end col -->
                                <div class="col-sm-3 ">
                                    <input  class=" btn btn-success btn-block btn-lg" type="submit"   style="height:46px;" value="Buscar">
									
                                </div><!-- end col -->
								
                            </div><!-- end row -->
                        </form>
                      </div><!-- end col -->



        <!-------------------CARRITO ORDENES-------------------------------->
<?php 
$sql="SELECT * FROM cart2 WHERE email='$email'";

$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);



 ?>
<!-----------------------CARRITO ORDENES-------------------------->

                    

                       <div class="col-sm-2 vertical-align header-items hidden-xs" style="margin-top:10px; ">
                        <div class="header-item mr-5">
                            <a href="cart.php" data-toggle="tooltip" data-placement="top" title="carro"  onmouseover="this.style.backgroundColor='#5cb85c'" onmouseout="this.style.backgroundColor='' ">
                                <i class="fa fa-shopping-cart" ></i>
                                <?php if($nr >0) { ?>
                             	<sub>	<?php echo $nr ?>
						 
								</sub>
                <?php } ?>
                            </a>
							
                        </div>



						 <div  class="header-item mr-5">  <a href="#" data-toggle="tooltip" data-placement="top" title="Notificaciones"  onmouseover="this.style.backgroundColor='#5cb85c'" onmouseout="this.style.backgroundColor='' ">
							 <i class="fa fa-bell-o"></i>    </a>  
				    </div>
                     <div  class="header-item mr-5">  <a href="#" data-toggle="tooltip" data-placement="top" title="Favoritos" onmouseover="this.style.backgroundColor='#5cb85c'" onmouseout="this.style.backgroundColor='' ">
							 <i class="fa fa-heart-o"></i>    </a>  
				    </div>
					
                    </div><!-- end col -->
                </div><!-- end  row -->
            </div><!-- end container -->
        </div><!-- end middleBar -->
		             
				<style>
				.header-items
				{
				background-color:#fff;
				}
				</style>
                   
                </div><!-- end  row -->
            </div><!-- end container -->
        </div><!-- end middleBar --><?php
		
		
		