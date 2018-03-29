<?php session_start();
include('Connect.php');
include('head.php');

?>
<body>
  <?php include('topbar.php'); 
include('middlebar.php');    
	 ?>
        <?php include('navh.php');
	   ?>
        
        
        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2>Frequently asked Questions</h2>
                        </div><!-- end col -->
                </div><!-- end row -->
                
                <hr class="spacer-20 no-border">
                
              <div class="row">
                    <div class="col-sm-9">
                        <div class="panel-group accordion style1" id="question" role="tablist" aria-multiselectable="true">
                            <?php
 $sql="SELECT * FROM faq  Where elementName ='faqquestion'";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}

while ($row=mysqli_fetch_array($stmt)) {

?>
                            <div class="panel panel-default">
									
                                <div class="panel-heading" role="tab" id="<?php echo $row['id']?>">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#question" href="#collapseQuestion<?php echo $row['id']?>" aria-expanded="true" aria-controls="<?php echo $row['id']?>">
                                          <?php echo $row['question'];?>
                                        </a>
                                    </h4>
                                </div><!-- end panel-heading -->
                                <div id="collapseQuestion<?php echo $row['id']?>" class="panel-collapse collapse " role="tabpanel" aria-labelledby="<?php echo $row['id']?>">
                                    <div class="panel-body">
                                        <p> <?php echo $row['answer'];?></p>
                                    </div><!-- end panel-body -->
                                </div><!-- end collapse -->
                            </div><!-- end panel -->
                            <?php 
}
                             ?>


       
        
                        </div><!-- end panel-group -->    
                    </div><!-- end col -->
                    <div class="col-sm-3">
                     <div class="widget">
                            <h6 class="subtitle">If you have Questions please contact us</h6>
                            <ul class="list list-unstyled">
                                <li><b>Phone Number:</b>+56 95708 7442 </li>
                                <li><b>Email Us:</b> info@orybu.com</li>
                              
                            </ul>
                        </div><!-- end widget -->
                        
                       </div><!-- end col -->
                </div><!-- end row -->                
            </div><!-- end container -->
        </section>
        <!-- end section -->
               
        <!-- start footer -->
      <?php include('footer.php');
	  ?>
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