<?php session_start();
error_reporting(0);
include('Connect.php');
$email=$_SESSION['uemail'];
if($email =="")
{
?>
<?php
} $usertype=$_SESSION['utype'];

	   /////////////////////////////
	    $title="Basic Membership";
		
		  $price =100;
	    	$date =  date('Y-m-d');// item name
			$enddate =  date('Y-m-d', strtotime("+30 days"));;// item name
			$str2 ="Free Membership";
			$str3 ="Basic Membership";
			 $membership = preg_replace('/\s+/', ' ', trim($title));
			 $freemembership = preg_replace('/\s+/', ' ', trim($str2));
			 $basicmembership = preg_replace('/\s+/', ' ', trim($str3));
				
		 $query="INSERT INTO membership(membershiptype,startdate,enddate,price,email) VALUES ('$title','$date','$enddate','$price','$email')";
			
		$result = $connection->prepare($query);
			if($result === false) {
		trigger_error('Wrong SQL: ' . $query . ' Error: ' . $connection->error, E_USER_ERROR);
	}
	
		

			if($result->execute())
			{
	
		
			$limitTotalProduct ='100';
				$limitTopList ='100';
				$limitShowCase='50';
			$freemem="UPDATE seller  SET limitTotalProduct='".$limitTotalProduct."' ,limitTopList='".$limitTopList."' ,limitShowCase='".$limitShowCase."'  WHERE (email='$email')";
			 mysqli_query($connection,$freemem);
				 $result1 = $connection->prepare($freemem);
				 if($result1 === false) {
			trigger_error('Wrong SQL: ' . $freemem . ' Error: ' . $connection->error, E_USER_ERROR);
			}
			 
				
						$result1->execute();
			?>
	
			<script>
				  
					window.location.href ="index.php";
				</script>
			<?php
			
			
			}
		else
			{
			?>
			 <script >;
                alert("Error in Insertion !");  //not showing an alert box.
		       window.location.href="memberhip.php";
         </script>
		<?php	}
		
	
	?>