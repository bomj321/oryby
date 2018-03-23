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
$de = mysqli_real_escape_string($connection, $_SESSION['user_id']);
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
                    <h4 class="title text-center">Solicitudes Pendientes</h4>   
                        <table class="table table-striped table-responsive example" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Order Id</th>
                                <th>Precio Total</th>
                                <th>Estado</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $querygetrequest="SELECT * FROM cart2 where (orderstatus='Pending' OR orderstatus='Incomplete' ) AND email = '$email'";
                            $resultrequests=mysqli_query($connection,$querygetrequest);
                            while($rowreq=mysqli_fetch_array($resultrequests)){
                            ?>
                            <tr>
                                <td><a href="#"><?php echo $rowreq['id'];?></a></td>
                                <td><a href="#">$<?php echo $rowreq['totalprice'];?></a></td>
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
                        <h5>Mi Perfil</h5>
                        <div style="margin-left: 15px;">
                        <img src="images/<?php echo $logorow['companylogo'];?>" style="height:100px; width:100px;" alt="Logo not set">
                        </div>
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
                
                <div class="col-8 col-sm-8 col-xs-8">
                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Mensajes</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Solicitudes de Compras</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <!------------------ Message-------------------------------->
                            <h4 class="title text-center">Mensajes</h4> 
                            <table class="table table-striped table-responsive example" cellspacing="0">
                            <thead>
                            <tr>
                            <th>Usuario</th>
                            <th>Producto</th>
                            <th>Fecha</th>
                            <th>Eliminar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!------------------ CONSULTA A LA BASE DE DATOS-------------------------------->

                            <?php 

                            //SELECION DE CADA CHAT Y FORMATO DE FECHA
                            function formatearFecha($fecha){
                            return date('d M h:i a', strtotime($fecha));
                            }

                            //SELECION DE CADA CHAT Y FORMATO DE FECHA
                            $aside1 = "SELECT * FROM c_chats INNER JOIN products ON (c_chats.pid = products.pid) WHERE (de ='$de'   AND vchata='1') OR (para ='$de' AND vchatb='1') ORDER BY id_cch DESC";
                            $asideres1 = $connection->query($aside1);

                            while ($row=mysqli_fetch_array($asideres1)) {
                            //SELECION DE CADA CHAT
                            if ($row['de']==$de) {
                            $var = $row['para'];
                            }elseif($row['para']==$de){
                            $var = $row['de'];
                            }
                            $id_cch = $row["id_cch"];
                            $firstimage = $row['image'];
                            $valor = explode(',',$firstimage); 

                            $usere = "SELECT * FROM users WHERE user_id ='$var'";
                            $usere12 = $connection->query($usere);
                            $fila12=$usere12->fetch_assoc();

                            $chat12= "SELECT * FROM chats WHERE id_cch='$id_cch' ORDER BY fecha DESC";
                            $res12 =$connection->query($chat12);
                            $fila32 =$res12->fetch_assoc();
                            //CONSULTA PARA SABER SI HAN LEIDO EL MENSAJE

                            $chat = "SELECT * FROM chats WHERE id_cch = '$id_cch' AND leido ='0' ORDER BY id_cha DESC LIMIT 1";
                            $reschat =$connection->query($chat);
                            $cha = mysqli_fetch_array($chat);
                            $nr=mysqli_num_rows($reschat);


                            //CONSULTA PARA SABER SI HAN LEIDO EL MENSAJE

                            //CONSULTA PARA EL VENDEDOR
                            $aside3 = "SELECT * FROM c_chats INNER JOIN products ON (c_chats.pid = products.pid) WHERE de ='$de' OR para ='$de'";
                            $asideres3 = $connection->query($aside3);
                            $fila =$asideres3->fetch_assoc();
                            $consulta2 = "SELECT * FROM users WHERE user_id ='$var'";
                            $ejecutar2 = $connection->query($consulta2);
                            $fila2 = $ejecutar2->fetch_array();
                            ?>

                            <!------------------ CONSULTA A LA BASE DE DATOS-------------------------------->



                            <tr>
                            <td><a href="chat2.php?sellerid=<?php echo $var;?>&pid=<?php echo $row['pid'];?>&id_cch=<?php echo $row['id_cch']?>&leido=1">
                            <?php if($nr > 0) { ?>
                            <i style="color: green;" class="fa fa-chevron-right fa-2x"></i>
                            <?php } else {?>
                            <i style="color: black;" class="fa fa-chevron-right fa-2x"></i>
                            <?php } ?>

                            <?php echo $fila2['firstName'];?></a></td>
                            <td><a href="chat2.php?sellerid=<?php echo $var;?>&pid=<?php echo $row['pid'];?>&id_cch=<?php echo $row['id_cch']?>&leido=1"><?php echo $row['ntitle'];?></a></td>
                            <td><a href="chat2.php?sellerid=<?php echo $var;?>&pid=<?php echo $row['pid'];?>&id_cch=<?php echo $row['id_cch']?>&leido=1"><?php echo formatearFecha($fila32['fecha']); ?></a></td>
                            <td> <a  href="borrarchat.php?id_cch=<?php echo $row['id_cch']?>"><i class="fa fa-trash-o fa-lw"></i></a></td>                               
                            </tr>
                            <?php 
                            } 
                            ?>
                            </tbody>
                            </table> 
    
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile">
                            <h4 class="title text-center">Solicitudes de Compras</h4> 
                            <table class="table table-striped table-responsive example" cellspacing="0">
                            <thead>
                            <tr>
                            <th>Usuario</th>
                            <th>Producto</th>
                            <th>Fecha</th>
                            <th>Eliminar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!------------------ CONSULTA A LA BASE DE DATOS BUYER REQUEST INICIO-------------------------------->

                            <?php 

                            //SELECION DE CADA CHAT Y FORMATO DE FECHA


                            //SELECION DE CADA CHAT Y FORMATO DE FECHA
                            $aside1 = "SELECT * FROM c_chatsby INNER JOIN buyerrequests ON (c_chatsby.pid = buyerrequests.buyreq_id) WHERE (de ='$de'   AND vchata='1') OR (para ='$de' AND vchatb='1') ";
                            $asideres1 = $connection->query($aside1);

                            while ($row=mysqli_fetch_array($asideres1)) {
                            //SELECION DE CADA CHAT
                            if ($row['de']==$de) {
                            $var = $row['para'];
                            }elseif($row['para']==$de){
                            $var = $row['de'];
                            }
                            $id_cch = $row["id_cch"];

                            ////////////////SACAR IMAGEN
                            //$asideimg = "SELECT * FROM c_chatsby INNER JOIN buyerrequests ON (c_chatsby.pid = buyerrequests.buyreq_id) WHERE (de ='$de'   AND vchata='1') OR (para ='$de' AND vchatb='1') ";
                            //$asideresimg = $connection->query($asideimg);
                            ///////////////////SACAR IMAGEN
                            $firstimage = $row['image'];

                            $usere = "SELECT * FROM users WHERE user_id ='$var'";
                            $usere12 = $connection->query($usere);
                            $fila12=$usere12->fetch_assoc();

                            $chat12= "SELECT * FROM chatsby WHERE id_cch='$id_cch' ORDER BY fecha DESC";
                            $res12 =$connection->query($chat12);
                            $fila32 =$res12->fetch_assoc();
                        //CONSULTA PARA SABER SI HAN LEIDO EL MENSAJE

                            $chat = "SELECT * FROM chatsby WHERE id_cch = '$id_cch' AND leido ='0' ORDER BY id_cha DESC LIMIT 1";
                            $reschat =$connection->query($chat);
                            $cha = mysqli_fetch_array($chat);
                            $nr=mysqli_num_rows($reschat);


                            //CONSULTA PARA SABER SI HAN LEIDO EL MENSAJE


                            //CONSULTA PARA EL VENDEDOR
                            $aside3 = "SELECT * FROM c_chatsby INNER JOIN buyerrequests ON (c_chatsby.pid = buyerrequests.buyreq_id) WHERE de ='$de' OR para ='$de'";
                            $asideres3 = $connection->query($aside3);
                            $fila =$asideres3->fetch_assoc();
                            $consulta2 = "SELECT * FROM users WHERE user_id ='$var'";
                            $ejecutar2 = $connection->query($consulta2);
                            $fila2 = $ejecutar2->fetch_array();
                            ?>

                            <!------------------ CONSULTA A LA BASE DE DATOS BUYER REQUEST FINAL-------------------------------->



                            <tr>
                            <td><a href="chatby.php?sellerid=<?php echo $var;?>&pid=<?php echo $row['pid'];?>&id_cch=<?php echo $row['id_cch']?>&leido=1">
                            <?php if($nr > 0) { ?>
                            <i style="color: green;" class="fa fa-chevron-right fa-2x"></i>
                            <?php } else {?>
                            <i style="color: black;" class="fa fa-chevron-right fa-2x"></i>
                            <?php } ?>

                            <?php echo $fila2['firstName'];?></a></td>
                            <td><a href="chatby.php?sellerid=<?php echo $var;?>&pid=<?php echo $row['pid'];?>&id_cch=<?php echo $row['id_cch']?>&leido=1"><?php echo $row['ntitle'];?></a></td>
                            <td><a href="chatby.php?sellerid=<?php echo $var;?>&pid=<?php echo $row['pid'];?>&id_cch=<?php echo $row['id_cch']?>&leido=1"><?php echo formatearFecha($fila32['fecha']); ?></a></td>
                            <td> <a  href="borrarchatby.php?id_cch=<?php echo $row['id_cch']?>"><i class="fa fa-trash-o fa-lw"></i></a></td>                               
                            </tr>
                            <?php 
                            } 
                            ?>
                            </tbody>
                            </table>

                            <!------------------ Message BUYER REQUEST FINAL-------------------------------->
                        
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4" style="float:right; margin-top:4rem">
                    <?php
                    $sql="Select * from `images` Where id='47'";
                    $result=mysqli_query($connection,$sql);
                    $row=mysqli_fetch_array($result);
                    $image=$row['image'];
                    ?>					  
                    <a href="learnIncreaseSale.php"><img src="images/<?php echo $image;?>"></a>
                    <?php
                    $sql="Select * from `images` Where id='48'";
                    $result=mysqli_query($connection,$sql);
                    $row=mysqli_fetch_array($result);
                    $image=$row['image'];
                    ?>	
                    <a href="startBuying.php" ><img src="images/<?php echo $image;?>"></a> 
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
                    <form class="form-inline" action="buy_st.php" id="orybu">
                        <div class="form-group has-success">
                            <input type="text" class="form-control" placeholder="Top List:<?php echo $row['limitTopList'];?>" disabled>
                        </div>
                        <div class="form-group has-success">
                            <input type="email" class="form-control" placeholder="Show Case:<?php echo $row['limitShowCase'];?>" disabled>
                        </div>
                        <button type="submit" class="btn btn-success" id="buy">Comprar más</button>
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
                    <h4> Published Articles</h4>
                    <?php while($rw=mysqli_fetch_array($rsl)){ 
                        $myString = $rw['image'];
                        $cl = explode(',', $myString);                       
                        
                    ?>
                    <div class="float-right col-md-3 col-sm-3">
                        <a href="#"><img class="img-responsive" src="images/<?php echo $cl[0]; ?>" style="height: 20rem"></a>                       
                        <center>
                            <span class="amount text-default"><?php echo $rw['ntitle'];?></span>
                            </br>
                            <span class="amount text-primary">USD $ <?php echo $rw['price'];?></span>
                            </br>
                        </center>
                    </br>
                    </div>
                    <?php } ?>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3">
                        <?php $sql="SELECT * FROM `favorites` INNER JOIN `products` ON (favorites.id_product=products.pid) WHERE id_user = '{$id_user}' Limit 6";
                        $result=mysqli_query($connection,$sql);
                        $nr=mysqli_num_rows($result);
                        if($nr > 0 ){?>                        
                            <h4 class="pull-right">Mis Favoritos</h4> 
                            <div class="widget pull-right">
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
                                <a href="allproduct.php" class="btn btn-default btn-block semi-circle btn-md" style="margin-top:5px;">All Products</a>
                            </div><!-- end widget -->  
                        <?php } ?>                         
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