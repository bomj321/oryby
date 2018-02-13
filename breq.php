<?php
include('Connect.php');
include('head.php');
?>
    <body>
    <!-- start topBar -->
        <?php include('topbar.php');
            include('middlebar.php');
            include('navh.php');
        ?>
        <?php
        //BORRAR PRIMERO REGISTROS DE MAS DE 2 DIAS o aun mas viejos
        $query = "SELECT tiempo FROM buyerrequests ";
        $fila=$connection->query($query);
        while ($compras = $fila->fetch_array(MYSQLI_BOTH)){
        $date1 = date('Y-m-d');
        $query2 = "DELETE FROM buyerrequests WHERE tiempo <='$date1'";
        mysqli_query($connection,$query2);
        }
        ?>

        <!-- start navbar -->

        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
			    <div class="row">
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12 text-left">
                                <ul class="list list-inline">
                                    <li><a href="javascript:void(0);" data-toggle="collapse" data-target=".sidebarFilter"><i class="fa fa-align-left mr-5"></i> Filter</a></li>
                                </ul>
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <hr class="spacer-5"><hr class="spacer-20 no-border">

                        <div class="sidebarFilter collapse">
                            <div class="row">
							 <form  action="breq1.php" method="GET">
                                <div class="col-sm-3">
                                    <div class="widget">
                                        <h6 class="subtitle thin">Search</h6>

                                            <input type="text" id="lastname" class="form-control input-sm" name="keyword"  placeholder="Search">

                                    </div><!-- end widget -->
                                </div><!-- end col -->

                                <div class="col-sm-3">
                                    <div class="widget">
									                  <?php   $sql="SELECT * FROM `categories` WHERE NOT title ='Eco Friendly'  AND NOT title ='Innovation' LIMIT 5";
														$rst=mysqli_query($connection,$sql);
														?>
                                        <h6 class="subtitle thin">Categories</h6>

                                        <ul class="list list-unstyled">
										<?php while($rowt=mysqli_fetch_array($rst)){ ?>
                                            <li>
                                                <div >
                                                    <input name="categorytitle[]"  value="<?php echo $rowt['title'];?>"  type="checkbox" >
                                                    <label >
                                                        <?php echo $rowt['title'];?>
                                                    </label>
                                                </div>
                                            </li>
											<?php
											}?>

                                        </ul>
                                    </div><!-- end widget -->
                                </div><!-- end col -->
								<div class="col-sm-3">
                                    <div class="widget">
                                <?php   $query="SELECT * FROM `categories` WHERE NOT title ='Eco Friendly'  AND NOT title ='Innovation' LIMIT 5 ,10";
										$result=mysqli_query($connection,$query);
														?>

									</br>
									</br>
									</br>
                                        <ul class="list list-unstyled">
										<?php while($rowt=mysqli_fetch_array($result)){ ?>
                                            <li>
                                                <div>
                                                    <input  name="categorytitle[]"  value="<?php echo $rowt['title'];?>"  type="checkbox" >
                                                    <label >
                                                        <?php echo $rowt['title'];?>
                                                    </label>
                                                </div>
                                            </li>
											<?php
											}?>

                                        </ul>
                                    </div><!-- end widget -->
                                </div><!-- end col -->

                                
								</form>
                            </div><!-- end row -->

                            <hr class="spacer-30">

                        </div><!-- end sidebarFilter -->


                    </div><!-- end col -->
                </div><!-- end row -->
                <div class="row">
				  <div class="col-sm-2">  </div>
                    <!-- start sidebar -->
                   <!-- end col -->
                    <!-- end sidebar -->
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <h2 class="title">Buyings Requests</h2>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        </div>
                        <hr class="spacer-5"><hr class="spacer-20 no-border">




                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
							<table id="user" class="table table-bordered table-striped" style="clear: both">

                                    <!--<table class="table table-striped"> -->
                                        <thead>
                                            <tr>
											    <th>Id</th>
                                                <th>Product Name</th>

                                                <th>Quantity</th>
											    <th>Deadline</th>
                                                <th>Image</th>
                                            </tr>
                                        </thead>
                                        <tbody>

        <!--BORRAR PRIMEROS LOS REGISTROS-->




				<?php
			$email=$_SESSION['uemail'];

			$querygetrequest="SELECT * FROM `buyerrequests`";
			$resultrequests=mysqli_query($connection,$querygetrequest);
			while($rowreq=mysqli_fetch_array($resultrequests)){
			?>

                                            <tr >
											    <td >
                                                    <a href="#">
                                                        <?php echo $rowreq['buyreq_id'];?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="buyerrequests.php?reqid=<?php echo $rowreq['buyreq_id'];?>">
                                                       <?php echo $rowreq['prod_name'];?>
                                                    </a>
                                                </td>
                                                <td>
                                                 <?php echo $rowreq['quantity'];?>

                                                </td>
												<td>
												 <?php echo $rowreq['dtym'];?>
												 </td>
                                                <td style="width:30px;">
                                                   <img style="height:40px; width:50px; margin-top:-10px;margin-bottom:-8px; " src="ReqImages/<?php echo $rowreq['image']; ?>" alt="productImage">
                                                </td>



                                            </tr>
                          <?php


                            }


                          ?>

                                        </tbody>
                                    </table><!-- end table -->
                                </div><!-- end table-responsive -->

                                <hr class="spacer-10 no-border">


                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- end section -->

        <?php
		include('footer.php');
		?>
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
   </body>
</html>
