<?php
error_reporting(0);
include 'Connect.php';
include('head.php');
 include('topbar.php');

 ?>

    <body>
        
        <!-- start topBar -->
        <?php include('navh.php'); ?>
       
        
        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    <!-- start sidebar -->
                    <div class="col-sm-3">
                        <div class="widget">
                            <br>
                            <?php
							include('Connect.php');
                            $sql="Select * from `images` Where id='44'";
                            $result=mysqli_query($connection,$sql);
                            $row=mysqli_fetch_array($result);
                            $image=$row['image'];
                            ?>
                            <figure>
                                <a href="javascript:void(0);">
                                    <img src="../../images/<?php echo $image;?>" alt="collection">
                                </a>
                            </figure>
                        </div><!-- end widget -->
                    </div><!-- end col -->
                    <!-- end sidebar -->
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-12 text-left">
                                <h2 class="title">Iniciar sesión en su cuenta</h2>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        
                        <hr class="spacer-5"><hr class="spacer-20 no-border">
                        
                        <div class="row">
                            <div class="col-sm-12 col-md-10 col-lg-8">
                                <form class="form-horizontal" action="login.php" method="POST">
                                    <div class="form-group">
                                        <label for="email"  class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                          <input type="email" class="form-control input-md" id="email" placeholder="Email"  name="email" required>
                                        </div>
                                    </div><!-- end form-group -->
                                    <div class="form-group">
                                        <label for="password" class="col-sm-2 control-label">Contraseña</label>
                                        <div class="col-sm-10">
                                          <input type="password" class="form-control input-md" id="password" placeholder="Password"  name="password" required>
                                        </div>
                                    </div><!-- end form-group -->
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <div class="checkbox-input mb-10">
                                               
                                            </div><!-- end checkbox-input -->
                                        </div><!-- end col -->
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <label><a href="forgotpassword.php">¿Se te olvidó tu contraseña?</a>
											</label>
											<label style="margin-left:20px;"><a href="register.php">Crear una cuenta</a></label>
                                        </div>
										
                                    </div><!-- end form-group -->
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" class="btn btn-default round btn-md" value="  Iniciar sesión         "> 
                                        </div>
                                    </div><!-- end form-group -->
                                </form>
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->                
            </div><!-- end container -->
        </section>
        <!-- end section -->
               
        <!-- start footer -->
       <?php require'footer.php'; ?>
        <!-- end footer -->
        
        
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