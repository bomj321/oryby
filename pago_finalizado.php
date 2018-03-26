<?php session_start();
include('Connect.php');
include('head.php');
$email=$_SESSION['uemail'];
?>

<body>
<!-- start topBar -->

<?php 
include('topbar.php');
include('middlebar.php');
include('navh.php');
?>
 <!-- start section -->
  <section class="section white-backgorund">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
          <h2 class="title text-left">Paypal</h2>
          <hr class="spacer-5">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
          <ul class="nav nav-pills style2 nav-justified">
            <li class="">
              <a href="#shopping-cart" data-toggle="tab">
                Pay whit Paypal
              </a>
            </li>
          </ul>
          <div class="tab-content pills">
            <div class="tab-pane active">
              <div class="table-responsive">
              <?php
                $resultado = (bool) $_GET['exito'];
                $paymentId = $_GET['paymentId'];
                if($resultado == true) { 
                  //obtiene id de la compra  
                  $id = $_GET['id'];
                  $date = date('d-m-Y');

                  //Selecciona todos los items del carrito
                  $item = "SELECT * FROM cart2 WHERE email = '$email'";
                  $resultado = $connection->query($item);

                  //Guarda los la información en la tabla order details
                  while ($productos = $resultado->fetch_all(MYSQLI_ASSOC) ) {
                    foreach($productos as $producto):      
                      $productcode =$producto['pid']; 
                      $productquantity=$producto['quantity'];
                      $queryorderdetail= "INSERT INTO  orderDetail (order_id,pid,orderdate,orderquantity) VALUES ('$id','$productcode','$date','$productquantity')";
                      $result=mysqli_query($connection,$queryorderdetail);
                    endforeach;
                  }
                  //Cambia a completa el campo en la tabla orders
                  $sql ="UPDATE `orders` SET `orderstatus` = 'complete' WHERE `order_id` = '{$id}' ";
                  $resultado = $connection->query($sql); 
                  
                  //Borra el carrito
                  $delete = "DELETE FROM cart2 WHERE email = '$email'";
                  $resultado5 = $connection->query($delete);
                ?>
                     <p>The payment was made correctly!</p>
                     <p><?php echo "the number id it is {$paymentId}"?></p>
                <?php } else{ ?>
                    <p>The payment was wrong!</p>
                <?php } ?>
                <hr class="spacer-30">
              </div>
            </div>
          </div>
        </div><!-- end col -->
      </div><!-- end row -->
    </div><!-- end container -->
  </section>

  <?php include('footer.php');   ?>

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