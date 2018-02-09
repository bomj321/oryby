<?php
session_start();
include('Connect.php');
include('header.php');
 $email=$_SESSION['uemail'];
?>
<?php
 $sql="SELECT * FROM users Where email='$email'";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);    
$row=$stmt->fetch_assoc();
 $userId=$row['user_id'];
  $buyerRequestId=$_GET['buyerRequestId'];
?>

        <!-- start section -->
        <section class="section white-backgorund">
           <div class="container" style="padding-left:280px;">
                <div class="row">
                    <div class="col-sm-10">
       <h3> Reply To User  ! </h3>
	   
	   </br>
	   </br>
	   <?php
 $sql="SELECT * FROM buyerrequests Where buyreq_id=$buyerRequestId ";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);    
$row=$stmt->fetch_assoc();

 
  $BuyerName=$row['BuyerName'];
  $productName=$row['prod_name'];

  
?>
	    <form action="processreply.php" method="POST" enctype="multipart/form-data">
				
				
		
				<div class="form-group">
						<input type="text" class="form-control" placeholder="Enter Product" name="buyerRequestId" value="<?php echo $buyerRequestId ?> "  />
				</div>
				<div class="form-group">
						<input type="text" class="form-control" placeholder="Enter Product" name="buyerName" value="<?php echo $BuyerName ?> " />
				</div>
				<div class="form-group">
						<input type="text" class="form-control" placeholder="Enter Product" name="productName" value="<?php echo $productName ?> " />
				</div>
				
			
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Enter Specific Price of Product" name="productPrice">
				</div>
					<div class="form-group">
						<input type="file" class="form-control"  name="file1" />
				</div>
				<div class="form-group">
						<textarea rows="4" cols="100" name="supplierAnswer" placeholder="Enter reply"></textarea>
				</div>
			
			<center><button type="submit" name="save" class="btn btn-default" style="border-style:solid;border-width:1px;border-color:gray;color:#066;background:#ccc"><i class="fa fa-refresh" >
       &nbsp; SEND </i>
        </button>
           
         
        </center>
			
			
			</form>
					   
                    </div><!-- end col -->    
                </div><!-- end row -->
            </div><!-- end container -->

        </section>
		
		<!-- Trigger the modal with a button -->
  

<?php 

include('footer.php');
?>

    