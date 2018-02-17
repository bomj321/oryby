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
            <div class="col-md-8 col-sm-8 col-xs-8">
                <hr style="border-color: black;border-bottom: 1px solid">
            </div>        
        </div>
            <div class="row">                	  	
                <!-- Pending Purchases-->				
                <div class="col-md-8 col-sm-8 col-xs-8">
                    <h4 class="title text-center"> Pending Purchases</h4>   
                        <table class="table table-striped table-responsive example" cellspacing="0">
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
                <div class="col-md-4 col-sm-4 col-xs-4">
                    <?php
                    $logoquery="SELECT * FROM seller where email='$getmail'";
                    $logoresult=mysqli_query($connection,$logoquery);
                    $logorow=mysqli_fetch_array($logoresult);  ?>
                    <div style="float:right;background-color:#f7f7f7; border:2px;padding-left:50px;padding-right:50px;padding-bottom:5px;">
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
                    <a  class="btn btn-success btn-center" href="profile.php?<?php echo $getmail;?>">Update Profile</a>
		        </div>  
            </div>
            <div class="row">            
                <!-- Message-->
                <div class="col-8 col-sm-8 col-xs-8">
                    <h4 class="title text-center">Message</h4> 
                        <table class="table table-striped table-responsive example" cellspacing="0">
                            <thead>
                            <tr>
                                <th>User</th>
                                <th>Title</th>
                                <th>Date</th>
                                <th>Delete</th>
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
                    <a href="learnIncreaseSale.php"><img src="images/htsale.png"></a>
                    <a href="startBuying.php" ><img src="images/htbuy.png"></a> 
	            </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-8">
                    <h5>Quantity Availabe:</h5>
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
                <div class="col-sm-8">
                    <h4> Published Articles</h4>
                    <?php while($rw=mysqli_fetch_array($rsl)){  ?>
                        <div class="item col-sm-3">
                            <div class="thumbnail store style1">
                                <div class="header">
                                    <figure class="layer">
                                        <a href="#"><img src="images/<?php echo $rw['image'];?>"></a>
                                    </figure>
                                </div>
                                <div class="caption">
                                    <div class="price" >
                                        <h4 class="regular"><a href="#"><?php echo $rw['ntitle'];?></a></h4>
                                        <span class="amount text-primary" style="padding-left:45px;">$<?php echo $rw['price'];?></span>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
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