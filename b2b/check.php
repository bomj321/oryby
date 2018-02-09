<?php session_start();
include('Connect.php');
//include('header.php');
include('head.php');
include('topbar.php');  
include('middlebar.php');  
include('navh.php');  
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
?>

        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                       <h3>Requests List</h3>		
    
 <?php


 $sql="SELECT * FROM buyerrequests";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);

if ($nr > 0)
 {
  ?>
  <div class="table-responsive"> 
 <table id="example" class="display" cellspacing="0" width="100%">
 <thead>
     <tr>
      
        <th>Request ID</th>
        <th>Buyer Name</th>
         <th>Product Name</th>
        <th>Message</th>
		
         <th>Image</th>
         <th>Reply To User</th>
         
         
      </tr>
    </thead>
   

	
<tbody>
  <?php
    while($row=$stmt->fetch_assoc())
    {
	?>

      <tr>
       <td></br><?php echo $buyerRequestId = $row['buyreq_id']; ?></td>
       
        <td></br><?php echo $BuyerName = $row['BuyerName']; ?></td>
        <td></br><?php echo $productName =$row['prod_name']; ?></td>
  
        <td></br><?php echo $row['bmessage']; ?></td>
   
     <td></br><img  style ="width:40px; height:40px;"src="images/<?php echo $row['image'] ?>" > </img></td>

      
        
  
	 <td></br>
         <a    href="reply.php?buyerRequestId=<?php echo $buyerRequestId;?>"><i  class="fa fa-reply" aria-hidden="true"></i></a> 
		</td>

  
      </tr>

 <?php
	}
?>
</tbody>

</table>
</div>

<?php
}
else{
  ?>
   <th>No Request Till Now</th>
<?php
}


?>

</br>
	   <center>



 

     
	      </center>
					   
					   
		                   	
   
 <?php


 $sql="SELECT * FROM supplierqoutes Where supplierEmail='$email'";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);

if ($nr > 0)
 {
  ?>
 <!-- <div class="table-responsive"> 
 <table id="example" class="display" cellspacing="0" width="100%">
 <thead>
  <tr>
      
        <th>Serial ID</th>
        <th>Buyer Request ID</th>
		   <th>Buyer Email</th>
         <th>Product Name</th>
		  <th>Product Price</th>
       
         <th>Product Image</th>
		  <th>Date Time</th>
		
			<th>Message</th>
		       
	   <th>Reply To User</th>
         
         
      </tr>
    </thead>
   

	
<tbody>-->
  <?php
    while($row=$stmt->fetch_assoc())
    {
	?>

      <tr>
     
	  
      
  
      </tr>

 <?php
	}
?>
<!--</tbody>

</table>
</div>
-->
<?php
}
else{
  ?>
  
<?php
}


?>			   
                    </div><!-- end col -->    
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
		
		<!-- Trigger the modal with a button -->
  
  
<?php 

include('footer.php');
?>

    