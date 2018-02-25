<?php session_start();
include('Connect.php');
$email=$_SESSION['uemail'];
if($email =="")
{
header("Location:membership.php");
}
include('head.php');
include('topbar.php');
include('middlebar.php');
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
                    <!-- start sidebar -->
                    <div class="col-sm-3">
                        <div class="widget">
                            <h3>Account Navigation</h3>
                            
                            <ul class="list list-unstyled">
                                <li>
                                    <a href="buyeraccount.php">My Account</a>
                                </li>
                                <li>
                                    <a href="cart.php">My Cart <span class="text-primary">(3)</span></a>
                                </li>
                                <li class="active">
                                    <a href="buyerorders.php">My Order</a>
                                </li>
                             
                                <li>
                                    <a href="buyeraccount.php">Settings</a>
                                </li>
                            </ul>
                        </div><!-- end widget -->
                        
                        <div class="widget">
						<?php $query="SELECT * FROM products INNER JOIN categories ON(products.catid=categories.catid) Limit 2,3 ";
                           $result=mysqli_query($connection,$query);
						   $row=mysqli_fetch_array($result);
						      
							    $myString = $row['image'];
								$productType=$row['productType'];
								$cl = explode(',', $myString);
			   ?>
                            <h6 class="subtitle">New Collection</h6>
                            <figure>
                                <a href="javascript:void(0);">
                                    <img  style="height: 301px; width:250px;" src="images/<?php echo $cl[0];?>" alt="><?php echo $row['ntitle']; ?>">
                                </a>
                            </figure>
                        </div><!-- end widget -->
                        
                        <div class="widget">
                            <h6 class="subtitle">Featured</h6>
                            <?php $query="SELECT * FROM products INNER JOIN categories ON(products.catid=categories.catid) Limit 2 ";
                           $result=mysqli_query($connection,$query);
						      
							  
			   ?>
                            <ul class="items">
							<?php 
							while( $row=mysqli_fetch_array($result)){ 
							   $myString = $row['image'];
								$productType=$row['productType'];
								$cl = explode(',', $myString);
								?>
                                <li> 
                                    <a href="shop-single-product-v1.html" class="product-image">
                                        <img src="images/<?php echo $cl[0]; ?>" alt="<?php echo $row['ntitle']; ?> ">
                                    </a>
                                    <div class="product-details">
                                        <p class="product-name"> 
                                            <a href="shop-single-product-v1.html"><?php echo $row['ntitle']; ?></a> 
                                        </p>
                                        <span class="price text-primary">$<?php echo $row['price']; ?></span>
                                        <div class="rate text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </li><!-- end item -->
								<?php
								}
								?>
                               
                            </ul>

                            <hr class="spacer-10 no-border">
                            <a href="allproduct.php" class="btn btn-default btn-block semi-circle btn-md">All Products</a>
                        </div><!-- end widget -->
                    </div><!-- end col -->
                    <!-- end sidebar -->
                    <div class="col-sm-9">
                        <div class="row">
                <div class="row">
                    <div class="col-sm-12">
                      <center> <h3>My PROFILE</h3>		
    </center>
 <?php


 $sql="SELECT * FROM users  Where email='$email'";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);

if ($nr > 0)
 {
  ?>
  <div class="table-responsive"> 
  <table class="table table-bordered" style="background-color:#f2f2f2">
     <tr>
      
        <th>ID</th>
        <th>First Name</th>
         <th>Last Name</th>
        <th>Email</th>
		 <th>Country NAme</th>      
         <th>Action</th>      
         
      </tr>
    </thead>
   

	
<tbody>
  <?php
    while($row=$stmt->fetch_assoc())
    {
	?>

      <tr>
       <td></br><?php echo $row['user_id']; ?></td>
       
        <td></br><?php echo $row['firstName']; ?></td>
        <td></br><?php echo $row['lastName']; ?></td>
  
        <td></br><?php echo $row['email']; ?></td>
		<td></br><?php echo $row['countryName']; ?></td>
		
	
       

<td></br>
         <a    href="updateuser.php?user_id=<?php echo $row['user_id'];?>"><i class="fa fa-pencil fa-fw"></i></a></td>
  
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
   <th></th>
<?php
}
?>
</br>
</br>
</br>
</div>
</div>
           <div class="row">
                    <div class="col-sm-12">
                      <center> <h3>MEMBERSHIP</h3>		
    </center>
 <?php


 $sql="SELECT * FROM  membership INNER JOIN seller ON(membership.email = seller.email) Where seller.email='$email'";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);

if ($nr > 0)
 {
  ?>
  <div class="table-responsive"> 
  <table class="table table-bordered" style="background-color:#f2f2f2">
     <tr>
      
        <th>Serial No</th>
        <th>Membership Type</th>
         <th>Start Date</th>
        <th>End Date</th>
		   <th>Price</th>
		   <th>Email</th>
		  
      </tr>
    </thead>
   

	
<tbody>
  <?php
    while($row=$stmt->fetch_assoc())
    {
	?>

      <tr>
       <td></br><?php echo $row['membershipid']; ?></td>
       
        <td></br><?php echo $row['membershiptype']; ?></td>
        <td></br><?php echo $row['startdate']; ?></td>
  
        <td></br><?php echo $row['enddate']; ?></td>
   
        <td></br><?php echo $row['price']; ?></td>
		<td></br><?php echo $row['email']; ?></td>
	
       


  
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
   <th></th>
<?php
}
?>
</br>
</br>
</br>
</div>
</div>
<?php
 $sql="SELECT * FROM seller  Where email='$email'";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);
$row=$stmt->fetch_assoc()?>
<div class="row">
                    <div class="col-sm-10" style=" padding-left:200px;">
<center><h2>COMPANY INFORMATION</h2>
</center>



<table class="table table-bordered" style="background-color:#f2f2f2;">
    <tr>
    			<th> Serial No</th>
			
					<td></br><?php echo $row['sellerid']; ?></td>
					</tr>
					<tr>
			<th>	Email</th>
			
						<td></br><?php echo $row['email']; ?></td>
						</tr>
					<tr>
			<th>	Company Name</th>
			
					<td></br><?php echo $row['company_name']; ?></td>
			</tr>
				<tr>
			<th>	Company Legal Number</th>
			
					<td></br><?php echo $row['companyLegalNo']; ?></td>
			</tr>
					
					<tr>
			<th>	Street</th>
			
					<td></br><?php echo $row['street']; ?></td>
					</tr>
					<tr>
			<th>	City</th>
			
					<td></br><?php echo $row['city']; ?></td>
					</tr>
					<tr>
			<th>	ZipCode</th>
			
					<td></br><?php echo $row['zipCode']; ?></td>
					</tr>
					<tr>
			<th>	Province</th>
			
					<td></br><?php echo $row['province']; ?></td>
					</tr>
					<tr>
			<th>	BusinessType</th>
			
					<td></br><?php echo $row['businessType']; ?></td>
					</tr>
					<tr>
			<th>	No Of Employee</th>
			
					<td></br><?php echo $row['noOfEmployee']; ?></td>
					</tr>
					<tr>
			<th>	Company Description</th>
			
					<td></br><?php echo $row['companyDescription']; ?></td>
					</tr>
					<tr>
			<th>	Company Logo</th>
			
					<td></br><img style ="height:100px; width:100px;" src ="images/<?php echo $row['companylogo']; ?>" /></td>
					</tr>
					<tr>
			<th>	Country Name</th>
			
					<td></br><?php echo $row['countryName']; ?></td>
					</tr>	
					
			
		  </tr>	
		  <tr>
		  </br>
		  <center>
		  <tr >
		  <td>
         <a   style="float:right" class="btn btn-primary" href="updatesellerprofile.php?email=<?php echo $row['email'];?>">UPDATE </a>
		 </td>
</center>
		 </tr>
         </table>
		 </div>
		 </div>
    
   
   
					   
					   
                    </div><!-- end col -->    
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
		
		<!-- Trigger the modal with a button -->
  
   
<?php 

include('footer.php');
?>

    