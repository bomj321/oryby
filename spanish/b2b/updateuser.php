<?php

include('Connect.php');
 $user_id=$_GET["user_id"];
$sql="SELECT * FROM users  WHERE (user_id=$user_id)";
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}

$row = mysqli_fetch_array($stmt);


	$user_id=$row['user_id'];
	$firstname = $row['firstName'];// item name
	$lastname = $row['lastName'];// item name
	$email = $row['email'];// item name
	$password=$row['password'];
	$address=$row['countryName'];
	include('head.php');
	include('topbar.php');
	include('middlebar.php');
	include('navh.php');
?>   
<?php

if(isset($_POST['btn_save_updates']))
	{
	  
	  $firstname = $_POST['firstName'];// item name
	$lastname = $_POST['lastName'];// item name
	$email = $_POST['email'];// item name
    $password=$_POST['password'];
	 $address=$_POST['address'];
	 
	
$sql="UPDATE users  SET firstName='".$firstname."' ,lastName='".$lastname."' ,email='".$email."' ,password='".$password."' ,address='".$address."'  WHERE (user_id='$user_id')";
 mysqli_query($connection,$sql);
	 $stmt = $connection->prepare($sql);
     if($stmt === false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
 
	
			if($stmt->execute())
			{
				?>
                <script>
				        alert("Updated Your Profile!");  //not showing an alert box.
		window.location.href="profile.php";
				</script>
                <?php
			}
			else{
		
		}
		
	
		
	}
	
?>
        <!-- start section -->
        <section class="section white-backgorund">
            <div class="container" style="padding-left:280px;">
			<h3>UPDATE USER </h3>
			</br>
                <div class="row">
                    <div class="col-sm-10">
                      
					   <form method="post"  enctype="multipart/form-data" class="form-horizontal">
		
 	
		<div class="form-group">
			
			  <input type="text" class="form-control" placeholder="Enter First Name" name="firstName"  value="<?php echo $firstname; ?>"
			  />
	</div>
			<div class="form-group">
			  <input type="text" class="form-control" placeholder="Enter Last Name" name="lastName"  value="<?php echo $lastname; ?>"/>
			</div>
			<div class="form-group">
			  <input type="text" class="form-control" placeholder="Enter Email" name="email" value="<?php echo $email; ?>"/>
			</div>
			<div class="form-group">
			  <input type="password" class="form-control" placeholder="Enter Password" name="password" value="<?php echo $password; ?>"/>
			</div>
				<div class="form-group">
			  <input type="text" class="form-control" placeholder="Enter Address" name="address" value="<?php echo $address; ?>"/>
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
    