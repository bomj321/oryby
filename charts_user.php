<?php session_start();
    if(!isset($_SESSION['uemail'])):
        header('location:singlelogin.php');
    endif;
include('Connect.php');
include('head.php');
$id_user=$_GET['id'];//id del usuario logueado

?>
    <body>
<!-- start topBar -->
        <?php include('topbar.php');?>
        <?php include('middlebar.php');?>
        <?php include('navh.php');?>
    
        <div class="container">
            <div class="row">
                <div class="col-md-12 content">
                    <h3 class="text-center">Product Statistics</h3>
                </div><!-- end col -->
            </div><!-- end row --> 
            <!-- Consulta a la db para la ilustración de la imagen-->
                <?php 
                    $sql="SELECT * FROM `products` WHERE user_id = '{$id_user}' ";
                    $rsl=mysqli_query($connection,$sql);
                ?> 
            <?php while($rw=mysqli_fetch_array($rsl)){$myString = $rw['image'];$cl = explode(',', $myString);?>                
            <div class="row">
                <div class="col-md-4 col-xs-4 col-lg-4">
                    <img src="images/<?php echo $cl[0]; ?>" class="img-thumbnail">                         
                </div>
                <div class="col-md-8 col-xs-8 col-lg-8">
					<ul class="list list-inline">
                        <h6 style="display:inline;">Title:</h6> <li><p class="text-primary"><?php echo $rw['ntitle']; ?></p></li><br>
                        <h6 style="display:inline;">Price:</h6> <li><p class="text-primary"><?php echo$rw['price']; ?></p></li><br>
                    </ul>
					<a class="btn btn-default pull-lefth" href="charts.php?id=<?php echo $rw['pid']; ?>">See Chart</a>
                </div>
            </div>
            <hr>
            <?php }?> 
        <!--Cierre del Container--> 
        </div>

	   <?php include('footer.php');?>

        <!-- JavaScript Files -->
        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min_2.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="js/chart.js"></script>        
    </body>
</html>