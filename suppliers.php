<?php session_start();
error_reporting(0);
include('Connect.php');
include('head.php');
?>

<?php
include('topbar.php');
include('middlebar.php');
include('navh.php');
$email=$_SESSION['uemail'];
$usertype=$_SESSION['utype'];
if($email == "" OR $email==NULL AND $usertype ==""  OR $usertype=NULL)
{
?>
<script>
window.location.href="singlelogin.php";
</script>
<?php
}

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
		<?php  if(isset($_SESSION['suc']))
         {
           echo $_SESSION['suc']; }?>
            <div class="container">
			<center> <a href="charts_user.php?id=<?php echo $userId; ?>" class="btn btn-warning btn-lg" style="padding-top:0px">Product Views Statistics</a> 
 <a href="product_add.php" class="btn btn-primary"><i class="fa fa-floppy"></i> ADD PRODUCT</a>
           </br>
        
        </center>         
		 <div class="row">
                    <div class="col-sm-12">
</br>                   
				   <center> <h3>LIST OF PRODUCTS</h3>		
    </center>
 <?php


  $sql="SELECT * FROM products INNER JOIN categories ON(products.catid=categories.catid)  Where products.user_id='$userId'";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);

if ($nr > 0)
 {
  ?>
  <div class="table-responsive"> 
 <table id="example" class="display" cellspacing="0" class="table table-bordered table-striped" width="100%">
 <thead >
     <tr>
        <th>Title</th>
        <th>price</th>
        <th>Description</th>
		<th>Category </th>
		<th>Product Type </th>
		<th>Minimum Orders </th>
	    <th>Payment </th>
        <th>Delivery Details</th>	
        <th>Image</th>
        <th>Top List</th>
       <th >Actions</th>
         
      </tr>
    </thead>
   

	
<tbody>
  <?php
    while($row=$stmt->fetch_assoc())
    {
$myString = $row['image'];
$cl = explode(',', $myString);

    ?>

            <tr>    
                <td></br><?php echo $row['ntitle']; ?></td>
                <td></br><?php echo $row['price']; ?></td>  
                <td></br><?php echo $row['fulldescription']; ?></td>
                <td></br><?php echo $row['title']; ?></td>
                <td></br><?php echo $row['productType']; ?></td>
                <td></br><?php echo $row['miniorder']; ?></td>
                <td></br><?php echo $row['payment']; ?></td>
                <td></br><?php echo $row['delivery_details']; ?></td>		
                <td><img style="height:100px; width:100px;" src="images/<?php echo $cl[0]; ?>" /></td>

        <td></br>
		&nbsp;&nbsp;
	
		 <?php  $productaction =$row['productaction'];
													
													?>
														<input type="hidden" name="productaction" value="<?php echo $productaction ?>" />
													<?php 
													if($productaction =='2')
													{
												
													?>
												
												  <a   class="btn btn-xs btn-danger" href="checkSellerActive.php?productaction=<?php echo $row['productaction'];?> & pid=<?php echo $row['pid'] ?>">Show off</a>

												
													<?php
													}
													else if($productaction =='0' OR $productaction =='1')
													{
												
													?>
												  <a   class="btn btn-xs btn-primary" href="checkSellerActive.php?productaction=<?php echo $row['productaction'];?> & pid=<?php echo $row['pid'] ?>">Show on</a>

												
			
													<?php
													}?>
	
		
		 <?php   $producttoplist =$row['producttoplist'];
													
													?>
														<input type="hidden" name="productaction" value="<?php echo $producttoplist ?>" />
													<?php 
													if($producttoplist =='0' OR $producttoplist == "")
													{
												
													?>
												
												  <a   class="btn btn-xs btn-danger" href="checktoplist.php?producttoplist=<?php echo $row['producttoplist'];?> & pid=<?php echo $row['pid'] ?>">Not     List</a>

												
													<?php
													}
													else if($producttoplist =='1')
													{
												
													?>
												  <a   class="btn btn-xs btn-primary" href="checktoplist.php?producttoplist=<?php echo $row['producttoplist'];?> & pid=<?php echo $row['pid'] ?>">Top    List </a>

												
			
													<?php
													}?>
	
		 </td>
<td> 
         <a    href="updateproduct.php?pid=<?php echo $row['pid'];?>"><i class="fa fa-pencil fa-fw"></i></a> &nbsp;&nbsp;
         <a  href="javascript:contact_Id(<?php echo $row['pid'];?>)"><i class="fa fa-trash-o fa-lw"></i></a> 
	</td>
  
      </tr>
 
 <?php
	}
?>
</tbody>
<tfoot>
     <tr>
      
         <th>Title</th>
        <th>price</th>
        <th>Description</th>
		<th>Category </th>
		<th>Product Type </th>
		<th>Minimum Orders </th>
	    <th>Payment </th>
        <th>Delivery Details</th>	
        <th>Image</th>
        <th>Top List</th>
       <th >Actions</th>
         
         
      </tr>
    </tfoot>
</table>
</div>

<?php
}
else{
  ?>
   <th>Product List is Empty ! Please ADD Products</th>
<?php
}
?>
 

<script>
function myFunction() {
    alert("daklsfjklsd ");
}
function myFunction1() {
    alert("lksdfjklds ");
}function myFunction2() {
    alert("lkrjkdf ");
}
</script>
</br>
	 
					   
					   
					   
                    </div><!-- end col -->    
                </div><!-- end row -->

            </div><!-- end container -->
			
			
			
			</section>
			</br>
			</br>
		
			 
	
  
    <script type="text/javascript">
function contact_Id(id)
{
   if(confirm('Sure To Remove This Record ?'))
     {
          window.location.href='deleteproduct.php?pid='+id;
     }
     else
     {
       
     }
    
   
    
}

</script>  
		<script>
   $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
		<script>
   $(document).ready(function() {
    $('#example1').DataTable();
} );
</script>


   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"</script>
  <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"</script>
<?php        

include('footer.php');
?>

    