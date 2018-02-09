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
?>

        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                       <h3>LIST OF PRODUCTS</h3>		
    
 <?php


 $sql="SELECT * FROM products INNER JOIN categories ON(products.catid=categories.catid) Where user_id='$userId'";
 
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
      
        <th>ID</th>
        <th>Title</th>
         <th>price</th>
        <th>Description</th>
		 <th>Category </th>
         <th>Image</th>
         <th>Action</th>
         
         
      </tr>
    </thead>
   

	
<tbody>
  <?php
    while($row=$stmt->fetch_assoc())
    {
	?>

      <tr>
       <td></br><?php echo $row['pid']; ?></td>
       
        <td></br><?php echo $row['ntitle']; ?></td>
        <td></br><?php echo $row['price']; ?></td>
  
        <td></br><?php echo $row['fulldescription']; ?></td>
   
      <td></br><?php echo $row['title']; ?></td>
        <td><img src="images/<?php echo $row['image'] ?>" width=40px; height=40px;/></td>

        <td></br>
         <a    href="updateproduct.php?pid=<?php echo $row['pid'];?>"><i class="fa fa-pencil fa-fw"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;
         <a  href="javascript:contact_Id(<?php echo $row['pid'];?>)"><i class="fa fa-trash-o fa-lw"></i></a></td>

  
      </tr>

 <?php
	}
?>
</tbody>
<tfoot>
     <tr>
      
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
		<th>Category </th>
         <th>Image</th>
         <th>Action</th>
         
         
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
	   <center>

<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#addmenu">Add Content</button>

  <!-- Modal -->
  <div class="modal fade" id="addmenu" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"> ADD PRODUCTS</h4>
        </div>
        <div class="modal-body">
          <p>
		    <form action="addproduct.php" method="POST" enctype="multipart/form-data">
				
				<div class="form-group">
						<input type="text" class="form-control" required placeholder="Enter Title" name="title" id="title">
				</div>
				<div class="form-group">
						<input type="text" class="form-control" required placeholder="Enter Price" name="price" id="price">
				</div>
				
				<div class="form-group">
						<input type="text" class="form-control" placeholder="Enter Description" name="description" id="description">
				</div>
				<div class="form-group">
								 <?php

						$sql="SELECT * FROM categories";
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
				<div class="form-group">
			  <input class="form-control" type="file" name="file1"   required />
			</div>
			
		  
		
	
	
		
		  </p>
        </div>
		
        <div class="modal-footer">
		<button align="left" type="submit" name="save" class="btn btn-default" style=>
           SAVE </i></a>
        </button>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
	  </form>
      
    </div>
  </div>
 

     
	      </center>
					   
					   
					   
                    </div><!-- end col -->    
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
		
		<!-- Trigger the modal with a button -->
  
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

   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"</script>
  <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"</script>
    <?php    
include('footer.php');
?>

    