<?php session_start();
require 'Connect.php';
include 'head.php';
$email=$_SESSION['uemail'];

// //////////////////////////// CONSULTA A CHECKOUT///////////////////////////////////////////////

$sql1="SELECT * FROM checkout WHERE id = 1 ";
$stmt1=mysqli_query($connection,$sql1);
if($stmt1 == false) {
trigger_error('Wrong SQL: ' . $sql1 . ' Error: ' . $connection->error, E_USER_ERROR);
}
$row1 =mysqli_fetch_assoc($stmt1);

$sql2="SELECT * FROM checkout WHERE id = 2 ";
$stmt2=mysqli_query($connection,$sql2);
if($stmt2 == false) {
trigger_error('Wrong SQL: ' . $sql1 . ' Error: ' . $connection->error, E_USER_ERROR);
}
$row2 =mysqli_fetch_assoc($stmt2);


$sql3="SELECT * FROM checkout WHERE id = 3 ";
$stmt3=mysqli_query($connection,$sql3);
if($stmt3 == false) {
trigger_error('Wrong SQL: ' . $sql3 . ' Error: ' . $connection->error, E_USER_ERROR);
}
$row3 =mysqli_fetch_assoc($stmt3);

// ////////////////////////////FIN CONSULTA A CHECKOUT ////////////////////////////////////

 $sql = "SELECT * FROM users WHERE email='$email'";
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}

  $nr = mysqli_num_rows($stmt);
if($nr <=0 )
{

?>
<script>
alert("Please Login To Check Out");
window.location.href="singlelogin.php";
</script>
<?php
}
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
                <div class="row">
                    <!-- start sidebar -->
                  <!-- end col -->
                    <!-- end sidebar -->
                     <div class="col-sm-2">  </div>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-12 text-left">
                                <h2 class="title">Checkout</h2>
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <hr class="spacer-5"><hr class="spacer-20 no-border">

                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="nav nav-pills style2 nav-justified">
                                    <li class="active">
                                        <a href="#shopping-cart" data-toggle="tab">
                                            1. Shopping Cart
                                            <div class="icon">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#billing-info" data-toggle="tab">
                                            2. Billing Info
                                            <div class="icon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#payment" data-toggle="tab">
                                            3. Payment
                                            <div class="icon">
                                                <i class="fa fa-credit-card"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content pills">
                                    <div class="tab-pane active" id="shopping-cart">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2">Products</th>
                                                        <th>Price</th>
                                                       <!-- <th>Quantity</th> -->
                                                        <th colspan="2">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $aside1 = "SELECT * FROM cart2 WHERE email = '$email' ";
                                                $asideres1 = $connection->query($aside1);
                                                $tot= 0;
                                                while ($rowcart=mysqli_fetch_array($asideres1)) {
                                                ?>
                                                    <tr>
                                                <td>
                                                    <a href="#">
                                                        <img width="60px" src="images/<?php echo $rowcart['image'];?>" alt="product">
                                                    </a>
                                                </td>

                                                <td>
                                                    <h6 class="regular"><?php echo $rowcart['p_title'];?></h6>
                                                    <p><?php echo $rowcart['p_fulldesc'];?></p>
                                                </td>
                                                <td>
                                                    <span>$<?php echo $rowcart['price'];?></span>
                                                </td>
                                                <td>
                                                    <span class="text-primary">$<?php echo $rowcart['totalprice']?></span>
                                                </td>
                                                <td>
                    <?php

                    $tot =$tot+$rowcart['price']* $rowcart['quantity'];
                    $_SESSION['toatl']= $tot;
                                                ?>

                                    <!--    <td><a href="cart.php?code=<?php// echo $id ?>">Delete from cart</a></td> -->
                                                </td>
                                            </tr>

          <?php  

          } $_SESSION['toatl']=$tot;
          ?>


                                                </tbody>
                                            </table><!-- end table -->
                                        </div><!-- end table-responsive -->
                                    </div><!-- end tab-pane -->

                                    <div class="tab-pane" id="billing-info">
                                        <div class="row">
                                        <div class="col-md-3">  </div>
                                <?php   $quryid="SELECT * FROM users";
                            $resld=mysqli_query($connection,$quryid);
                            $rowid=mysqli_fetch_array($resld);
                            $user_id=$rowid['user_id'];  ?>
                            <?php   if(isset($_POST['btninfo'])){

                            //$userid=$_POST['userid'];
                            $phone=$_POST['phone'];
                            $address1=$_POST['address1'];
                            $city=$_POST['city'];
                            $zip=$_POST['zip'];
                            $buydesc=$_POST['buydesc'];
                            $country=$_POST['countryName'];

                         $sqlQuery = "INSERT INTO buyers (user_id,phone,address,city,zipcode,buydescription) VALUES (' $user_id','$phone', '$address1','$city', '$zip','$buydesc')";


                       if (mysqli_query($connection,$sqlQuery)) {

                        echo "<div class='alert alert-success'> Submitted!  </div> ";
                       }
                            }
                           ?>
                                        <form method="POST">
                                            <div class="col-md-6">
                                                <h5 class="thin subtitle"> Your information</h5>
                           <?php
                                $email=$_SESSION['uemail'];
                                $qry="SELECT * FROM users  Where email='$email'";
                                $resl=mysqli_query($connection,$qry);
                                $rw=mysqli_fetch_array($resl);

             ?>




                                                <div class="row" style="background:#f7f7f7;padding:20px;">

                                                     <div class="form-group">
                                                            <input id="country" type="text" value="<?php echo $rw['countryName']; ?>"  name="countryName" class="form-control input-md required">
                                                        </div><!-- end form-group -->
                                                        <div class="form-group">
                                                            <input id="fname" type="text" value="<?php echo $rw['firstName']; ?>"  name="firstname" class="form-control input-md required">
                                                        </div><!-- end form-group -->
                                                         <div class="form-group">
                                                            <input id="surname" type="text" value="<?php echo $rw['lastName']; ?>" name="lastname" class="form-control input-md required">
                                                        </div>
                                                    <!-- end col -->

                                                       <!-- end form-group -->

            <?php  $user_id=$rw['user_id']; ?>
            <?php
                                $email=$_SESSION['uemail'];
                               $sql="SELECT * FROM buyers  WHERE user_id='$user_id'";
                               $stmt=mysqli_query($connection,$sql);
                           if($stmt == false) {
                          trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
                               }
                    $nr=mysqli_num_rows($stmt);


             ?>
                                        <div class="form-group">
                                            <input id="phone" type="tel" value="<?php echo $rows['phone']; ?>"  placeholder="Phone" name="phone" class="form-control input-md required">
                                            </div><!-- end form-group -->

                                                <!-- end row -->
                                                <div class="form-group">
                                                            <input id="email" type="text" value="<?php echo $rw['email']; ?>"  name="email" class="form-control input-md required email">
                                                        </div><!-- end form-group -->
                                                <div class="form-group">
                                                    <input id="billingAddress" type="text" value="<?php echo $address =$rows['address']; ?>" placeholder="Address" name="address1" class="form-control input-md required">
                                                </div><!-- end form-group -->

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input id="city" type="text" value="<?php echo $rows['city'];?>" placeholder="City" name="city" class="form-control input-md required">
                                                        </div><!-- end form-group -->
                                                    </div><!-- end col -->
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input id="zip" type="text" placeholder="Zip/Postal Code" name="zip" class="form-control input-md required">
                                        <input  type="hidden" value="<?php echo $user_id;?>"  name="userid" class="form-control input-md required">
                                                        </div><!-- end form-group -->
                                                    </div><!-- end col -->

                                                <div class="form-group">
                                                    <textarea rows="6" class="form-control" placeholder="Your Description here..."  value="<?php echo $rows['buydesc'];?>"name="buydesc"></textarea>
                                                </div><!-- end form-group -->
</div>
                                            <?php if($address == ""  OR $address == NULL ){

                                            ?>
                                            <div class="form-group">
                                    <center>       <input type="submit" class="btn btn-success" value="Submit" name="btninfo"> </center>
                                               </div>
                                               <?php
                                            }
                                            ?>
                                                </div><!-- end row -->
                                            </div><!-- end col -->


                                        </div><!-- end row -->
                                   </form>
                                   </div><!-- end tab-pane -->
                                    <div class="tab-pane" id="payment">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="thin subtitle">Choose a Payment Method</h5>
                                                <div class="panel-group accordion style2" id="accordionPayment" role="tablist" aria-multiselectable="true">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="headingPayment1">
                                                            <h4 class="panel-title">
                                                                <a class="" data-toggle="collapse" data-parent="#accordionPayment" href="#collapsePayment1" aria-expanded="true" aria-controls="collapsePayment1">
                                                                     <i class="fa fa-paypal mr-10"></i>Choose a Payment Method
                                                                </a>
                                                            </h4><!-- end panel-title -->
                                                        </div><!-- end panel-heading -->
                                                        <div id="collapsePayment1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingPayment1">
                                                            <div class="panel-body">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-sm-8 col-md-8 col-xs-8">
                                                                            <form action="pagar.php" method="POST">
                                                                                <input type="hidden" name="precio" value="<?php echo $tot;?>">
                                                                                <button type="submit" class="paypal btn btn-default round"  style="margin-top: 1rem;">Pay With Paypal <i class="fa fa-arrow-circle-right ml-5"></i></button>                                                                         
                                                                            </form>
                                                                            <a href="#" class="btn btn-default round" style="margin-top: 1rem;">Pay With WebPay <i class="fa fa-arrow-circle-right ml-5"></i></a>
                                                                        </div><!-- end col -->
                                                                    </div><!-- end row -->
                                                                </div><!-- end form-group -->
                                                            </div><!-- end panel-body -->
                                                        </div><!-- end collapse -->
                                                    </div><!-- end panel -->

                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="headingPayment2">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionPayment" href="#collapsePayment2" aria-expanded="false" aria-controls="collapsePayment2">

                                                                </a>
                                                            </h4>
                                                        </div><!-- end panel-heading -->
                                                        <div id="collapsePayment2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingPayment2">
                                                            <div class="panel-body">
                                                                <div class="form-group">
                                                                    <div class="checkbox-input checkbox-primary mb-10">

                                                                        </div><!-- end checkbox-input -->
                                                                </div><!-- end form-group -->

                                                            </div><!-- end panel-body -->
                                                        </div><!-- end collapse -->
                                                    </div><!-- end panel -->
                                                </div><!-- end panel-group -->
                                            </div><!-- end col -->
                                            <div class="col-md-6">
                                                <div class="panel-group accordion style1" id="question" role="tablist" aria-multiselectable="true">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="questionOne">
                                                            <h4 class="panel-title">
                                                                <a class="" data-toggle="collapse" data-parent="#question" href="#collapseQuestionOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    What payments methods can I use?
                                                                </a>
                                                            </h4>
                                                        </div><!-- end panel-heading -->
                                                        <div id="collapseQuestionOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="questionOne">
                                                            <div class="panel-body">
                                                                <p><?php echo $row1['descripcion'] ; ?></p>
                                                            </div><!-- end panel-body -->
                                                        </div><!-- end collapse -->
                                                    </div><!-- end panel -->

                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="questionTwo">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#question" href="#collapseQuestionTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                    Can I use gift card to pay for my purchase?
                                                                </a>
                                                            </h4>
                                                        </div><!-- end panel-heading -->
                                                        <div id="collapseQuestionTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionTwo">
                                                            <div class="panel-body">
                                                                <p><?php echo $row2['descripcion'] ; ?></p>
                                                            </div><!-- end panel-body -->
                                                        </div><!-- end collapse -->
                                                    </div><!-- end panel -->

                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="questionThree">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#question" href="#collapseQuestionThree" aria-expanded="false" aria-controls="collapseThree">
                                                                    How long will it take to get my order?
                                                                </a>
                                                            </h4>
                                                        </div><!-- end panel-heading -->
                                                        <div id="collapseQuestionThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionThree">
                                                            <div class="panel-body">
                                                                <p><?php echo $row3['descripcion'] ; ?></p>
                                                            </div><!-- end panel-body -->
                                                        </div><!-- end collapse -->
                                                    </div><!-- end panel -->
                                                </div><!-- end panel-group -->
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div><!-- end tab-pane -->
                                </div><!-- end pills content -->

                                <hr class="spacer-30">

                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="table-responsive">
                                            <table class="table no-border">
                                                <tr>
                                                    <th>Cart Subtotal</th>
                                                    <td><?php echo '$'.$tot;?></td>
                                                </tr>

                                                <tr>
                                                    <th>Order Total</th>
                                                    <td id="<?php echo $tot;?>"><?php echo '$'.$tot;?></td>
                                                </tr>
                                            </table><!-- end table -->
                                        </div><!-- end table-responsive -->
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- end section -->

        <!-- start footer -->
        <?php require 'footer.php'; ?>
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
        <script type="text/javascript" src="js/gmaps.js"></script>
        <script type="text/javascript" src="js/swiper.min.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>
