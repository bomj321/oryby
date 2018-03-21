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
                        <h2>Preguntas frecuentes</h2>
                        </div><!-- end col -->
                </div><!-- end row -->                
                <hr class="spacer-20 no-border">                
              <div class="row">
                    <div class="col-sm-9">
                        <div class="panel-group accordion style1" id="question" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
									<?php
include('Connect.php');
 $sql="SELECT * FROM faq  Where elementName ='SpanishQ1'";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);
$row=mysqli_fetch_array($stmt);

?>
                                <div class="panel-heading" role="tab" id="questionOne">
                                    <h4 class="panel-title">
                                        <a class="" data-toggle="collapse" data-parent="#question" href="#collapseQuestionOne" aria-expanded="true" aria-controls="collapseOne">
                                          <?php echo $row['question'];?>
                                        </a>
                                    </h4>
                                </div><!-- end panel-heading -->
                                <div id="collapseQuestionOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="questionOne">
                                    <div class="panel-body">
                                        <p> <?php echo $row['answer'];?></p>
                                    </div><!-- end panel-body -->
                                </div><!-- end collapse -->
                            </div><!-- end panel -->
<?php
$sql="SELECT * FROM faq  Where elementName ='SpanishQ2'  ";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);
$row=mysqli_fetch_array($stmt);
?>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="questionTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#question" href="#collapseQuestionTwo" aria-expanded="false" aria-controls="collapseTwo">
                                          <?php echo $row['question'];?>
                                        </a>
                                    </h4>
                                </div><!-- end panel-heading -->
                                <div id="collapseQuestionTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionTwo">
                                    <div class="panel-body">
                                        <p> <?php echo $row['answer'];?></p>
                                    </div><!-- end panel-body -->
                                </div><!-- end collapse -->
                            </div><!-- end panel -->
<?php
$sql="SELECT * FROM faq  Where elementName ='SpanishQ3'  ";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);
$row=mysqli_fetch_array($stmt);
?>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="questionThree">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#question" href="#collapseQuestionThree" aria-expanded="false" aria-controls="collapseThree">
                                               <?php echo $row['question'];?>
                                        </a>
                                    </h4>
                                </div><!-- end panel-heading -->
                                <div id="collapseQuestionThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionThree">
                                    <div class="panel-body">
                                        <p> <?php echo $row['answer'];?></p>
                                    </div><!-- end panel-body -->
                                </div><!-- end collapse -->
                            </div><!-- end panel -->
       <?php
$sql="SELECT * FROM faq  Where elementName ='SpanishQ4'  ";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);
$row=mysqli_fetch_array($stmt);
?>                     
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="questionFour">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#question" href="#collapseQuestionFour" aria-expanded="false" aria-controls="collapseThree">
                                            <?php echo $row['question'];?>
                                        </a>
                                    </h4>
                                </div><!-- end panel-heading -->
                                <div id="collapseQuestionFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionFour">
                                    <div class="panel-body">
                                      <p> <?php echo $row['answer'];?></p>
                                    </div><!-- end panel-body -->
                                </div><!-- end collapse -->
                            </div><!-- end panel -->
         <?php
$sql="SELECT * FROM faq  Where elementName ='SpanishQ5'  ";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);
$row=mysqli_fetch_array($stmt);
?>                   
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="questionFive">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#question" href="#collapseQuestionFive" aria-expanded="false" aria-controls="collapseThree">
                                              <?php echo $row['question'];?>
                                        </a>
                                    </h4>
                                </div><!-- end panel-heading -->
                                <div id="collapseQuestionFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionFive">
                                    <div class="panel-body">
                                    <p> <?php echo $row['answer'];?></p>
                                    </div><!-- end panel-body -->
                                </div><!-- end collapse -->
                            </div><!-- end panel -->
          <?php
$sql="SELECT * FROM faq  Where elementName ='SpanishQ6'  ";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);
$row=mysqli_fetch_array($stmt);
?>                  
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="questionSix">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#question" href="#collapseQuestionSix" aria-expanded="false" aria-controls="collapseThree">
                                             <?php echo $row['question'];?>
                                        </a>
                                    </h4>
                                </div><!-- end panel-heading -->
                                <div id="collapseQuestionSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionSix">
                                    <div class="panel-body">
                                       <p> <?php echo $row['answer'];?></p>
                                    </div><!-- end panel-body -->
                                </div><!-- end collapse -->
                            </div><!-- end panel -->
                        </div><!-- end panel-group -->    
                    </div><!-- end col -->
                    <div class="col-sm-3">
                     <div class="widget">
                            <h6 class="subtitle">Si tiene preguntas, contáctenos</h6>
                            <ul class="list list-unstyled">
                                <li><b>Número de teléfono:</b>+56 95708 7442 </li>
                                <li><b>Envíanos un correo electrónico:</b> info@orybu.com</li>
                              
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