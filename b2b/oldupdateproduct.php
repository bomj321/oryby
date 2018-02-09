<?php
include('header.php');
include('Connect.php');
 $pid=$_GET["pid"];
$sql="SELECT * FROM products INNER JOIN categories ON(products.catid=categories.catid) WHERE (pid=$pid)";
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}

$row = mysqli_fetch_array($stmt);


    $pid=$row['pid'];
	 $ntitle = $row['ntitle'];// item name
	$price = $row['price'];// item name
	$fulldescription = $row['fulldescription'];// item name
      $myString = $row['image'];
$cl = explode(',', $myString);
	 $title=$row['title'];
	 $catid=$row['catid'];
	 $quantity=$row['quantity'];
	 $color=$row['color'];
	 $productaction=$row['productaction'];
	  $producttoplist=$row['producttoplist'];
	  $productType =$row['productType'];
	
	
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

if(isset($_POST['btn_save_updates']))
	{
	  $pid = $_GET['pid'];// item name
	  $ntitle = $_POST['ntitle'];// item name
		 
			$price = $_POST['price'];// item name
	    	$fulldescription = $_POST['fulldescription'];// item name
			$catid = $_POST['catid'];// item name
				$subcatid = $_POST['subcatid'];// item name
					$quantity = $_POST['quantity'];// item name
			$color = $_POST['color'];// item name
			  $productType =$_POST['productType'];
			if($_POST['showcaseid'] !="")
			{
			 $productstatus=$_POST['showcaseid'];
			}
			else if($productstatus =="")
			{
			 $productstatus=2;
			}
			if($_POST['showtoplist'] !="")
			{
			 $producttoplist=$_POST['showtoplist'];
			}
				 //////////////////////////////////////////
	
				$target_dir = "images/";
	if($_FILES["file2"]["name"][0] !="" )
{
		 	$target_file = $target_dir . basename($_FILES["file2"]["name"][0]);
			$image1=$_FILES['file2']['name'][0];
			$filelocation = $target_dir.$image1;
			$temp1 = $_FILES['file2']['tmp_name'][0];
			move_uploaded_file($temp1, $filelocation);
}	if($_FILES["file2"]["name"][1] !="" )
{

			$target_file = $target_dir . basename($_FILES["file2"]["name"][1]);
			$image2=$_FILES['file2']['name'][1];
			$filelocation = $target_dir.$image2;
			$temp2 = $_FILES['file2']['tmp_name'][1];
}	if($_FILES["file2"]["name"][2] !="" )
{
		
			$target_file = $target_dir . basename($_FILES["file2"]["name"][2]);
			$image3=$_FILES['file2']['name'][2];
			$filelocation = $target_dir.$image3;
			$temp3 = $_FILES['file2']['tmp_name'][2];
			move_uploaded_file($temp3, $filelocation); 
 }	if($_FILES["file2"]["name"][3] !="" )
{

			$target_file = $target_dir . basename($_FILES["file2"]["name"][3]);
			$image4=$_FILES['file2']['name'][3];
			$filelocation = $target_dir.$image4;
			$temp4 = $_FILES['file2']['tmp_name'][3];
			move_uploaded_file($temp4, $filelocation); 
 } 	 ////////////////////////////////////////////////
	
	
  $license = $image1 . ',' . $image2 . ',' . $image3. ',' . $image4;

	
	if($productstatus !="")
			{
			 $sql="UPDATE products  SET ntitle='".$ntitle."' ,price='".$price."' ,fulldescription='".$fulldescription."' ,image='".$license."' ,catid='".$catid."' ,subcatid='".$subcatid."',productaction='".$productaction."',producttoplist='".$producttoplist."',productType='".$productType."'  WHERE (pid='$pid')";
			
			}
			else if($productstatus =="")
			{
				 $sql="UPDATE products  SET ntitle='".$ntitle."' ,price='".$price."' ,fulldescription='".$fulldescription."' ,image='".$license."' ,catid='".$catid."' ,subcatid='".$subcatid."',productaction='".$productaction."' ,producttoplist='".$producttoplist."',productType='".$productType."'  WHERE (pid='$pid')";
			
			}
			

 mysqli_query($connection,$sql);
	 $stmt = $connection->prepare($sql);
     if($stmt === false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
 
	
			if($stmt->execute())
			{
				?>
                <script>
				        alert("Updated !");  //not showing an alert box.
		window.location.href="suppliers.php";
				</script>
                <?php
			}
			else{
			echo 	$errMSG = "Sorry Data Could Not Updated !";
				}
		
	
		
	}
	
?>
        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container" style="padding-left:280px;">
			<h3>UPDATE PRODUCT </h3>
			</br>
                <div class="row">
                    <div class="col-sm-10">
                      
					   <form method="post"  enctype="multipart/form-data" class="form-horizontal">
		
 	
		<div class="form-group">
		<label>Product Title :</label>
			
			  <input type="text" class="form-control" placeholder="Enter Name" name="ntitle" id="ntitle" value="<?php echo $ntitle; ?>"
			  />
	</div>
			<div class="form-group">
			<label>Product Price :</label>
			  <input type="text" class="form-control" placeholder="Enter Price" name="price" id="price" value="<?php echo $price; ?>"/>
			</div>
			<div class="form-group">
			<label>Product Description :</label>
			  <input type="text" class="form-control" placeholder="Enter Description" name="fulldescription" id="fulldescription" value="<?php echo $fulldescription; ?>"/>
			</div>
			<div class="form-group">
			<label>Product Quantity :</label>
			  <input type="text" class="form-control" placeholder="Enter Quantity" name="quantity" id="quantity" value="<?php echo $quantity; ?>"/>
			</div>
			<div class="form-group">
			<label>Product Color :</label>
			  <input type="text" class="form-control" placeholder="Enter color" name="color" id="color" value="<?php echo $color; ?>"/>
			</div>
			<div class="form-group">
				<label>Product Category :</label>
		
								 <?php

							$sql="SELECT * FROM categories WHERE NOT title ='Eco Friendly' AND NOT title ='Innovation'";
						 $stmt=mysqli_query($connection,$sql);
						if($stmt == false) {
						trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
						}
						$nr=mysqli_num_rows($stmt);

						if ($nr > 0)
						 {
						  ?>
						 
					<select  class="form-control"  id="catid" name="catid" required>
					 <option value="<?php echo $catid; ?>"><?php echo $title; ?>
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
			<label>Product Type :</label>
			<div class="form-group">
			<select  required class="form-control"  name="productType">
			
			<option  class="form-control" value="<?php echo $productType ?>"><?php echo $productType ?></option>
			<option  class="form-control"  value="Eco Friendly" >Eco Friendly </option>
			<option class="form-control"  value="Innovation" >Innovation</option>
			<option class="form-control"  value="Normal Product" >Normal Product </option>
	
			</select>
			</div>
		<div class="form-group">
	<label>Show Case Product :</label>
		
			<select  class="form-control"  id="showcaseid" name="showcaseid" >
			<?php if($productaction ==0 OR $productaction == 1){
			?>
			<option  value="<?php echo $productaction ?>">Show Case Product </option>
		
			<?php
			}
			else
			{
			?>
			<option  value="<?php echo $productaction ?>"> Select Product</option>
		<?php
		}
			?>
			
			<option value ="0">Show on Show Case</option>
			</select>
			</div>
		
					<div class="form-group">
	<label>Top List Product :</label>
		
			<select  class="form-control"   name="showtoplist" >
			<?php if($producttoplist == 1){
			?>
			<option  value="<?php echo $producttoplist ?>">Top Listed</option>
		
			<?php
			}
			else
			{
			?>
			<option  value="<?php echo $producttoplist ?>">Select For Top List</option>
		<?php
		}
			?>
			
			<option value ="1">Set As Top List</option>
			</select>
			</div>


			<div class="form-group">
			  <img style="height:100px; width:100px;" src="images/<?php echo $cl[0]; ?>" />
			   <img style="height:100px; width:100px;" src="images/<?php echo $cl[1]; ?>" />
			    <img style="height:100px; width:100px;" src="images/<?php echo $cl[2]; ?>" />
				 <img style="height:100px; width:100px;" src="images/<?php echo $cl[3]; ?>" />
				  <img style="height:100px; width:100px;" src="images/<?php echo $cl[4]; ?>" />
				  <input class="form-control" type="file" name="file2[]"multiple="multiple"   required />
			</div>
		  


     
  <td colspan="2"><center><button type="submit" name="btn_save_updates" class="btn btn-default" style="border-style:solid;border-width:1px;border-color:gray;color:#066;background:#ccc"><i class="fa fa-refresh" >
       &nbsp; UPDATE ITEM</i>
        </button>
           
         
        </center>
        
        </td>
  </tr>
    
</form>	
					  
					  
					  
					  
                    </div><!-- end col -->    
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- end section -->
               
        <!-- start footer -->
    