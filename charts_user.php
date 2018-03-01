<?php session_start();
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
                    <div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist" id="<?php echo $rw['pid'];?>">   
                            <li role="presentation" class="active"><a href="y" class="chart" aria-controls="home" role="tab" data-toggle="tab">Year</a></li>
                            <li role="presentation" class="chart"><a href="m" class="chart" aria-controls="profile" role="tab" data-toggle="tab">Month</a></li>
                            <li role="presentation" class="chart"><a href="d" class="chart" aria-controls="messages" role="tab" data-toggle="tab">Day</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="year">
                            
                            </div>
                            <div role="tabpanel" class="tab-pane" id="month">
                            
                            </div>
                            <div role="tabpanel" class="tab-pane" id="day">
                            
                            </div>
                        </div>

                    </div>
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
        <script type="text/javascript" src="js/chart.js"></script>
    </body>
</html>