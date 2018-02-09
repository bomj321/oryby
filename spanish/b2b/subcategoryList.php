 <?php
include 'Connect.php';


if(isset($_POST['domain_name']))
{
$domain_name = $_POST['domain_name'];
						$sql="SELECT * FROM subcategories WHERE catid='$domain_name'";
						 $stmt=mysqli_query($connection,$sql);
						if($stmt == false) {
						trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
						}
						$nr=mysqli_num_rows($stmt);

						if ($nr > 0)
						 {
						  ?>
						 
					<select  class="form-control"  id="subcatid" name="subcatid" required>
					 <option  value="">SELECT  Sub Category</option>
										 <?php
						while($row=$stmt->fetch_assoc())
						{
			
						
			?>
					  <option value="<?php echo $row['subcatid']; ?>"><?php echo $row['subtitle']; ?></option>
					  <?php
					  }
					  ?>
				</select>
				 <?php
					  }
					
					  
					  }
					  ?>
			