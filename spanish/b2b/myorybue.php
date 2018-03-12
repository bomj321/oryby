<?php session_start();
    if(!isset($_SESSION['uemail'])):
        header('location:singlelogin.php');
    endif;
include('Connect.php');
include('head.php');
$getmail=$_SESSION['uemail'];

$email = $_SESSION['uemail']; //email del usuario logueado
$usuario="SELECT * FROM users where email='$email'";
$datos_usuario=mysqli_query($connection,$usuario);
$datos=mysqli_fetch_array($datos_usuario);
$id_user=$datos['user_id'];//id del usuario logueado
?>


<body>
<!-- start topBar -->
<?php include('topbar.php');
include('middlebar.php');
include('navh.php');
?>
	  	
<!-- start section -->
<section class="section white-backgorund"> 
    <div class="container">
        <h3> My Orybu </h3>
        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-8">
                <hr style="border-color: black;border-bottom: 1px solid">
            </div>        
        </div>
            <div class="row">                	  	
                <!-- Pending Purchases-->				
                <div class="col-md-8 col-sm-8 col-xs-8">
                    <h4 class="title text-center">Compras Pendientes</h4>   
                        <table class="table table-striped table-responsive example" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Precio Total</th>
                                <th>Estado</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $querygetrequest="SELECT * FROM `orders` where orderstatus='Pending'";
                            $resultrequests=mysqli_query($connection,$querygetrequest);
                            while($rowreq=mysqli_fetch_array($resultrequests)){
                            ?>
                            <tr>
                                <td><a href="#"><?php echo $rowreq['order_id'];?></a></td>
                                <td><a href="#">$<?php echo $rowreq['tota_price'];?></a></td>
                                <td><a href="#"><?php echo $rowreq['orderstatus'];?></a></td>
                            </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                        </table>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <?php
                    $logoquery="SELECT * FROM seller where email='$getmail'";
                    $logoresult=mysqli_query($connection,$logoquery);
                    $logorow=mysqli_fetch_array($logoresult);  ?>
                    <div style="float: right; background-color: #f7f7f7;border: 2px;padding-left: 51px;padding-right: 50px;padding-bottom: 30px; margin-right:7rem;">
                        <h5>My Profile</h5>
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
                    <a  class="btn btn-success btn-center" href="profile.php?<?php echo $getmail;?>">Actualizar Perfil</a>
		        </div>  
            </div>
            <div class="row">            
                <!-- Message-->
                <div class="col-8 col-sm-8 col-xs-8">
                    <h4 class="title text-center">Mensajes</h4> 
                        <table class="table table-striped table-responsive example" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Titulo</th>
                                <th>Día</th>
                                <th>Eliminar</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $querygetrequest="SELECT * FROM `chatapp`";
                                $resultrequests=mysqli_query($connection,$querygetrequest);
                                while($rowreq=mysqli_fetch_array($resultrequests)){
                                ?>
                                <tr>
                                    <td><a href="#"><?php echo $rowreq['sender'];?></a></td>
                                    <td><a href="#"><?php echo $rowreq['msg'];?></a></td>
                                    <td><a href="#"><?php echo $rowreq['date'];?></a></td>
                                    <td><a class="eliminar" id="<?php echo $rowreq['id'];?>"><i class="fa fa-trash"></i></a></td>                               
                                </tr>
                                <?php 
                                } 
                                ?>
                            </tbody>
                        </table>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4" style="float:right; margin-top:4rem">
                    <?php
                    $sql="Select * from `images` Where id='49'";
                    $result=mysqli_query($connection,$sql);
                    $row=mysqli_fetch_array($result);
                    $image=$row['image'];
                    ?>					  
                    <a href="learnIncreaseSale.php"><img src="../../images/<?php echo $image;?>"></a>
                    <?php
                    $sql="Select * from `images` Where id='50'";
                    $result=mysqli_query($connection,$sql);
                    $row=mysqli_fetch_array($result);
                    $image=$row['image'];
                    ?>	
                    <a href="startBuying.php" ><img src="../../images/<?php echo $image;?>"></a> 
	            </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-8">
                    <h5>Cantidad Disponible:</h5>
                    <?php
                        $email =$_SESSION['uemail'];
                        $query="SELECT * FROM  seller WHERE email='$email'";
                        $result=mysqli_query($connection,$query);
                        $row=mysqli_fetch_array($result);
                    ?>
                    <form class="form-inline" id="orybu">
                        <div class="form-group has-success">
                            <input type="text" class="form-control" placeholder="Top List:<?php echo $row['limitTopList'];?>" disabled>
                        </div>
                        <div class="form-group has-success">
                            <input type="email" class="form-control" placeholder="Show Case:<?php echo $row['limitShowCase'];?>" disabled>
                        </div>
                        <button type="submit" class="btn btn-success" id="buy">Buy More</button>
                    </form>
                </div>       
            </div>
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
                ?>
                <div class="col-sm-8 col-md-8">
                    <h4>Articulos Publicados</h4>
                    <?php while($rw=mysqli_fetch_array($rsl)){ 
                        $myString = $rw['image'];
                        $cl = explode(',', $myString);                        
                    ?>
                    <div class="float-right col-md-3 col-sm-3">
                        <a href="#"><img class="img-responsive" src="../../images/<?php echo $cl[0]; ?>" style="height: 20rem"></a>                       
                        <center>
                            <span class="amount text-default"><?php echo $rw['ntitle'];?></span>
                            </br>
                            <span class="amount text-primary">$USD <?php echo $rw['price'];?></span>
                            </br>
                        </center>
                    </br>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-sm-4 col-md-4">
                    <h4 class="pull-right">Mis Favoritos</h4> 
                    <div class="widget pull-right">
                            <?php $sql="SELECT * FROM `favorites` INNER JOIN `products` ON (favorites.id_product=products.pid) WHERE id_user = '{$id_user}' Limit 6";
                            $result=mysqli_query($connection,$sql);
                            ?>
                        <ul class="items">
                                <?php 
                                while( $row=mysqli_fetch_array($result)){ 
                                $myString = $row['image'];
                                $productType=$row['productType'];
                                $cl = explode(',', $myString);
                                ?>
                            <li> 
                                <a href="#" class="product-image"><img src="images/<?php echo $cl[0]; ?>" alt="<?php echo $row['ntitle']; ?> "></a>
                                <div class="product-details"> 
                                    <a href="#" class="product-name"><?php echo $row['ntitle']; ?></a> 
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
                        <a href="allproduct.php" class="btn btn-default btn-block semi-circle btn-md" style="margin-top:5px;">Todos los Productos</a>
                    </div><!-- end widget -->                           
                </div>
            </div>                 
    </div>
</section>
        <!-- end section -->
       <?php include('footer.php');?>        
        <!-- JavaScript Files -->
        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/owl.carousel.min.js"></script>
        <script type="text/javascript" src="js/nouislider.min.js"></script>
        <script type="text/javascript" src="js/jquery.sticky.js"></script>
        <script type="text/javascript" src="js/pace.min.js"></script>
        <script type="text/javascript" src="js/star-rating.min.js"></script>
        <script type="text/javascript" src="js/wow.min.js"></script>
        <script type="text/javascript" src="js/gmaps.js"></script>
        <script type="text/javascript" src="js/swiper.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="js/default.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"</script>
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"</script> 
    </body>
</html>