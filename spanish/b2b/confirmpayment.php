<?php session_start();
error_reporting(0);
require 'Connect.php';
include 'head.php';

$error=false;
 $email=$_SESSION['uemail'];
		
$subtotal = $_SESSION['toatl'];
$GrandTotal=$_SESSION['grandtotal'];
$status = "Pending";	   
  
	
	  if (!$error)
	
			{
			$query= "SELECT * FROM orders where email = '$email' ORDER BY order_id DESC ";
	$queryresult=mysqli_query($connection,$query);

	$row=mysqli_fetch_array($queryresult);
      $orderid= $row['order_id'];
	 
			  $date = date('d-m-Y');
		 	$sql ="INSERT INTO `payment`(`paymenttype`, `paymentamount`,`paymentdate`,`email`) VALUES ('Pay PAL','$GrandTotal','$date','$email')";
            $result=mysqli_query($connection,$sql);
			
    
	
?>	
  <script>
			alert("Payment Inserted"); 
  </script>
<?php
	
		}
	
	if (!$error)
			{
			 
	 	$query= "SELECT * FROM payment where email = '$email' ORDER BY paymentid DESC ";
	$queryresult=mysqli_query($connection,$query);

	$row=mysqli_fetch_array($queryresult);
      $paymentid= $row['paymentid'];
	 
			 $sql ="Update orders SET orderstatus ='".$status."',paymentid ='".$paymentid."' Where order_id ='$orderid'";
            $result=mysqli_query($connection,$sql);
			
    
	

	
		}
	      ?>
		  

 <body>
        
        <!-- start topBar -->
        <?php require 'topbar.php'; ?>
  
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    <!-- start sidebar -->
                  <!-- end col -->
                    <!-- end sidebar -->
					 <div class="col-sm-12"> 
			<center>		 <h2>
				Payment Successfull
			</h2></center>
					 </div>

   <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr style="color:black;">
           <?php  
				$query= "SELECT * FROM orders INNER JOIN payment ON(orders.paymentid = payment.paymentid) where orders.email = '$email' ORDER BY order_id DESC ";
 
$stmt=mysqli_query($connection,$query);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $query . ' Error: ' . $connection->error, E_USER_ERROR);
}
 $nr=mysqli_num_rows($stmt);
	$row=mysqli_fetch_array($stmt)
				   
?>   
			    
				<th>Order ID</th>
				<th>Email</th>
				<th>Total Price</th>
			    <th>Order Status</th>
			
				 <th>payment Method</th>
				
			
            </tr>
        </thead>
        <tbody>
       
              <tr>
               <td><?php echo $row['order_id']; ?></td>
               <td><?php echo $row['email']; ?></td>
               <td><?php echo $row['tota_price']; ?></td>
               <td><?php echo $row['orderstatus']; ?></td>
			   
               <td><?php echo $row['paymenttype']; ?></td>
              
			   
              
				
             
           </tr>
      
          
        </tbody>
    </table>
	</br>
	</br>
	
	<center><a href="index.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Index Page</a>
           </br>
         
        </center> 
	
</div>
</div>
</section>
 
 
<?php include('footer.php');
?>
</body>
</html>