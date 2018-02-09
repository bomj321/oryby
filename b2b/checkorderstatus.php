 <?php session_start();
include 'Connect.php';


if(isset($_POST['domain_name']))
{
echo $order_id=$_SESSION['order_id'];
$domain_name = $_POST['domain_name'];
echo 						$sql="Update orders SET orderstatus='".$domain_name."' WHERE order_id='$order_id'";
				$result=mysqli_query($connection,$sql);
						
					
					  
	 }
					  ?>
			