<?php session_start();
include('Connect.php');
include('head.php');
$getmail=$_SESSION['uemail'];
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
                <!-- Pending Purchases-->				
                <div class="col-md-6">
                    <h4 class="title text-center"> Pending Purchases</h4>   
                        <table id="example" class="table table-striped table-responsive" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Order Id</th>
                                <th>Email</th>
                                <th>Total Price</th>
                                <th>Order Status</th>
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
                                <td><a href="#"><?php echo $rowreq['email'];?></a></td>
                                <td><a href="#">$<?php echo $rowreq['tota_price'];?></a></td>
                                <td><a href="#"><?php echo $rowreq['orderstatus'];?></a></td>
                            </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                        </table>
                </div>
                <!-- Message-->
                <div class="col-md-6">
                    <h4 class="title text-center">Message</h4> 
                        <table id="example" class="table table-striped table-responsive" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Order Id</th>
                                <th>Email</th>
                                <th>Total Price</th>
                                <th>Order Status</th>
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
                                <td><a href="#"><?php echo $rowreq['email'];?></a></td>
                                <td><a href="#">$<?php echo $rowreq['tota_price'];?></a></td>
                                <td><a href="#"><?php echo $rowreq['orderstatus'];?></a></td>
                            </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                        </table>
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
         <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"</script>
  <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"</script>	  
    </body>
</html>