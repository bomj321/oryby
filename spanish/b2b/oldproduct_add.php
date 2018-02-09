<?php session_start();
error_reporting(0);
include('Connect.php');
include('head.php');
include('topbar.php');
 $email=$_SESSION['uemail'];
 $usertype=$_SESSION['utype'];
$qry="SELECT * FROM `seller` WHERE `email`='$email' ";
$result01=mysqli_query($connection,$qry);
 $count = mysqli_num_rows($result01);

if($count <=  0){
	 	?>
			  <script >;
               alert("Your Profile is Incomplete  !");  //not showing an alert box.
		       window.location.href="profileComplete.php";
         </script>
			<?php
}
else{
 }
 ?>
 <?php
 
 $qry="SELECT * FROM `users` WHERE `email`='$email'  AND `userstatus` ='0'";
$result01=mysqli_query($connection,$qry);
 $count = mysqli_num_rows($result01);


if($count > 0){
	 	?>
	
		 <script >;
                alert("Your Profile is Pending for Approval !");  //not showing an alert box.
		       window.location.href="suppliers.php";
         </script>
			 
			<?php
}
else{
 }
 ?>
 <script>
$(document).ready(function() {
  
       $('#catid').on('change',function()
     {
    var domain_name = $(this).val();

	//alert(domain_name);
    var dataString = "domain_name="+domain_name;
    if(domain_name)
    {
      $.ajax({
        type:'POST',
        url:'subcategoryList.php',
        data: dataString,


        success:function(html) {
          $('#ShowSubcategory').html(html);
        }
      });

    }
  
    });

 
  }); 


</script>
  <?php
 
   $sqlquery="SELECT * FROM `membership` WHERE `email`='$email' ORDER BY membershipid DESC";
$result1=mysqli_query($connection,$sqlquery);
 $nr = mysqli_num_rows($result1);
 $row = mysqli_fetch_array($result1);
  $membershipType = $row['membershiptype'];
 if($nr <0 )
{
?>
<script>
alert("Get Membership First");
window.location.href="membership.php";
</script>
<?php
}  



 $sql="SELECT * FROM seller Where email='$email'";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
  $nr=mysqli_num_rows($stmt);    
$row=$stmt->fetch_assoc();
 $userId=$row['user_id'];
  $totalproduct=$row['limitTotalProduct']; 

  $producttoplist=$row['limitTopList']; 
  $productshowcase=$row['limitShowCase']; 
?></br>
 <?php
 
$fm='Free Membership';
$bm ='Basic Membership';
 $membershiptype;
$str1 = preg_replace('/\s+/', ' ', trim($membershipType));
$str2 = preg_replace('/\s+/', ' ', trim($fm));
$str3 = preg_replace('/\s+/', ' ', trim($bm));
if(trim($str1) ==trim($str2))
{

   if($totalproduct <= '0' )
   {
   ?>
    <script>
	 alert("Your Product Limit Exceeded");
	 window.location.href="suppliers.php";
	 </script>
   <?php
   }
   else
   {
     if($producttoplist <= '0')
	 {
	 ?>
	 <script>
	 alert("Your Top List Product Exceeded");
	 window.location.href="suppliers.php";
	 </script>
	 <?php
	 }
	 if($productshowcase <= '0')
	 {
	  ?>
	 <script>
	 alert("Your Show Case Product Exceeded");
	 window.location.href="suppliers.php";
	 </script>
	 <?php
	 }
	
  
   }
}
else if(trim($str1) ==trim($str3))
{
  if($totalproduct <= '0' )
   {
   ?>
    <script>
	 alert("Your Product Limit Exceeded");
	 window.location.href="suppliers.php";
	 </script>
   <?php
   }
   else
   {
     if($producttoplist <= '0')
	 {
	 ?>
	 <script>
	 alert("Your Top List Product Exceeded");
	 window.location.href="suppliers.php";
	 </script>
	 <?php
	 }
	 if($productshowcase <= '0')
	 {
	  ?>
	 <script>
	 alert("Your Show Case Product Exceeded");
	 window.location.href="suppliers.php";
	 </script>
	 <?php
	 }
	
  
   }
  
  }

 
include('header.php');
 ?>

        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row" style="padding-left:250px;">
                    <div class="col-sm-8" style=" background-color:#f7f7f7;">
    

          <p>
		    <form action="addproduct.php" method="POST" enctype="multipart/form-data">
				<div class="form-group">
				</br>
				<center><h2>ADD PRODUCTS</h2>
				<hr>
				</center></br>
				</div>
	<?php  $membershipType ?>
				<div class="form-group">
						<input type="text" class="form-control" required placeholder="Enter Title" name="title" id="title">
				</div>
				<div class="form-group">
						<input type="text" class="form-control" required placeholder="Enter Price" name="price" id="price">
				</div>
				<div class="form-group">
						<input type="text" class="form-control" placeholder="Enter Quantity" name="quantity" id="quantity">
				</div>
				<div class="form-group">
						<input type="text" class="form-control" placeholder="Enter Color" name="color" id="color">
				</div>
				<div class="form-group">
						<input type="text" class="form-control" placeholder="Enter Description" name="description" id="description">
				</div>
				<div class="form-group">
								 <?php

						$sql="SELECT * FROM categories WHERE NOT title ='Eco Friendly' AND NOT title ='Innovation'";
						 $stmt=mysqli_query($connection,$sql);
						if($stmt == false) {
						trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
						}
						$nr=mysqli_num_rows($stmt);

						if ($nr > 0)
						 {
						  ?>
						 
					<select  class="form-control"  id="catid" name="catid" required>
					 <option  value="">SELECT Category</option>
										 <?php
						while($row=$stmt->fetch_assoc())
						{
			
						
			?>
					  <option value="<?php echo $row['catid']; ?>"><?php echo $row['title']; ?></option>
					  <?php
					  }
					  ?>
				</select>
				 <?php
					  }
					  ?>
			</div>
			<div class="form-group" id="ShowSubcategory">
			</div>
				<div class="form-group">
		
			<select  required class="form-control" name="productType">
			<option  value="">Select Product Type</option>
			<option value="Eco Friendly" >Eco Friendly </option>
			<option value="Innovation" >Innovation</option>
			<option value="Normal Product" >Normal Product </option>
	
			</select>
			
			</div>
	
				<div class="form-group">

			<select  class="form-control"  id="showcaseid" name="showcaseid" >
			<option  value="" >Select Product </option>
			<option value ="0">Show on Show Case</option>
			</select>
			</div>
				<div class="form-group">

			<select  class="form-control"  id="showtoplist" name="showtoplist" >
			<option  value="" >Select For Top List</option>
			<option value ="1">Set As Top List Product</option>
			</select>
			</div>
			<div class="form-group">
			  <input class="form-control" type="file"  name="file2[]" multiple="multiple" required />
			</div>
		
		  </p>
		  <center><button type="submit" name="save" class="btn btn-default" style="border-style:solid;border-width:1px;border-color:gray;color:#066;background:#ccc"><i class="fa fa-refresh" >
       &nbsp; SAVE</i>
        </button>
		<a href="suppliers.php" class="btn btn-warning"><i class="fa fa-times"></i> CANCEL</a>
       </input>
           </br>
         
        </center>
        </div>
	
	  </form>
      
  
					   
					   
                    </div><!-- end col -->    
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
		
		<!-- Trigger the modal with a button -->
  
 <?php        

include('footer.php');
?>

    