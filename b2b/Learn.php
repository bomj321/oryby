<?php session_start();
include('Connect.php');
include('head.php');

?>
<html>

    <body>
     <!-- start topBar --> 
     <?php include('topbar.php');  
	      include('middlebar.php');  
	 ?>
	 <!-- end topBar -->
       <!-- start nav  -->
       <?php include('navh.php'); ?>
	   <!-- end nav -->
	  <section>
	  <div class="container">
	  <div class="row">
	  <div class="col-sm-4"> </div>
                    <div class="col-sm-6">
                        <h3 style="color:#00e6e6;">Learn How to buy & increase your sales?</h3> <br>
                            </div><!-- end col -->
                    <div class="col-sm-5" style="background:#f2f7f7;">
                        <h3>How to Buy?</h3>
                        <p>You can buy the products when you will be register and simply when you login and register yourself
						you can buy any membership with online payments.These are steps:
						<ul>
						<li>Register   </li>
						<li>Login  </li>
						<li>Select membership   </li>
						<li> complete your profle  </li>
						<li>insert your membership plan</li>
						<li> confirm it</li>
					
						</ul>
						</p>
                    </div><!-- end col -->
					<div class="col-sm-1">  </div>
                    <div class="col-sm-5" style="background:#f2f7f7;">
                        <h3>How to increase sales?</h3>
                        <p>You can increase your sales by keeping your good record of selling products and getting
						good reviews of buyer.The followings are good tips for best seller
						<ul>
						<li>Stay competitive   </li>
						<li>Discounts, Discounts, Discounts </li>
						<li>Marketing outside  </li>
						<li> Give it away for free  </li>
						<li>Good reviews of clients</li>
						<li>Keeping quick delivery system</li>
						</ul>
						
						</p>   </div><!-- end col -->
                    
                    
                </div><!-- end row -->                
            </div><!-- end container -->
	  
	  
	  </section>
	  <br> <br>
<?php  require'footer.php'; ?>
</body>
	  </html>