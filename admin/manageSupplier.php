<?php session_start();
 if (!($_SESSION["loggedin"])) {
        header("Location: login.php?status=Unauthorized Access Attempt!");
    }

    if($_SESSION["loggedin"]=="F")
    {
    	   header("Location: login.php?status=Unauthorized Access Attempt!");

    }
include('Connect.php');
$userType=$_SESSION["userType"];
if($userType !='Admin')
{
					$email =$_SESSION["email"];
					  $sqll="SELECT * FROM `users` WHERE email ='$email' AND (userType = 'both' OR userType='supplier') ";

					$stmtt=mysqli_query($connection,$sqll);
					if($stmtt == false) {
					trigger_error('Wrong SQL: ' . $sqll . ' Error: ' . $connection->error, E_USER_ERROR);
					}

					$nr=mysqli_num_rows($stmtt);
					$row=mysqli_fetch_array($stmtt);
					 $user_id =$row['user_id'];
					  $sql="SELECT * FROM users INNER JOIN access  ON  (users.user_id = access.user_id) INNER JOIN page  ON  (access.pageId = page.pageId) WHERE  access.status ='1'  AND access.pageId='2' AND access.user_id='$user_id' ";

					$stmt=mysqli_query($connection,$sql);
					if($stmt == false) {
					trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
					}
					 echo $nr =mysqli_num_rows($stmt);
					if($nr > 0)
					{

					}
					else
					{
					?>
								  <script>
										window.location.href=('NotAccess.php');
									</script>

					<?php

					}

}
include('header.php');
?>

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<span class="ribbon-button-alignment">
					<span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
						<i class="fa fa-refresh"></i>
					</span>
				</span>

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li>Home</li><li>Tables</li><li>Data Tables</li>
				</ol>

			</div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content responsive">

				<div class="row responsive">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark">
							<i class="fa fa-table fa-fw "></i>
								Table
							<span>>
								Supplier/Buyer
							</span>
						</h1>
					</div>
			</div>

				<!-- widget grid -->
				<section id="widget-grid" class="responsive">

					<!-- row -->
					<div class="row responsive">

						<!-- NEW WIDGET START -->
						<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">

							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-color-darken responsive" id="wid-id-0" data-widget-editbutton="false">
								<header>
									<span class="widget-icon"> <i class="fa fa-table"></i> </span>
									<h2>List of Users</h2>
								</header>
								<!-- widget div-->
								<div>

									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
									</div>
									<!-- end widget edit box -->
<?php
$sql='SELECT * FROM users INNER JOIN membresia ON users.id_membership = membresia.memb_id';
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
$nr=mysqli_num_rows($stmt);
if($nr >0)
{
?>
									<!-- widget content -->
									<div class="widget-body no-padding table-responsive">

										<table id="dt_basic" class="table table-striped table-bordered table-hover " width="100%">
											<thead>
												<tr>
													<th >Serial ID</th>
													<th>User Type</th>
													<th>Name</th>
													<th>Last Name</th>
													<th>Country Name</th>
													<th>Email</th>
													<th>Membership Type</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
											<?php
											while($row =mysqli_fetch_assoc($stmt))
											{
											?>										

												<tr>
													<td><?php echo $user_id =$row['user_id']; ?></td>
													<input type="hidden" name="user_id" value="<?php echo $user_id ?>" />
													<td><?php echo $row['userType']; ?></td>
													<td><?php echo $row['firstName']; ?></td>
													<td><?php echo $row['lastName']; ?></td>
													<td><?php echo $row['countryName']; ?></td>
													<td><?php echo $row['email']; ?></td>
													<td><?php echo $row['membershiptype']; ?></td>
													<td> <a href="updateSupplier.php?email=<?php echo $row['email'];?>"><i class="fa fa-eye"></i></a>
													<?php  $userstatus =$row['userStatus'];

													?>
														<input type="hidden" name="userStatus" value="<?php echo $userstatus ?>" />
													<?php
													if($userstatus =='1')
													{

													?>

												  <a   class="btn btn-xs btn-danger" href="checkUser.php?userStatus=<?php echo $row['userStatus'];?>&user_id=<?php echo $row['user_id'] ?>&email=<?php echo $row['email'] ?>">De-Activate</a>


													<?php
													}
													else if($userstatus =='0')
													{

													?>
												  <a   class="btn btn-xs btn-primary" href="checkUser.php?userStatus=<?php echo $row['userStatus'];?>&user_id=<?php echo $row['user_id'] ?>&email=<?php echo $row['email'] ?>">Activate</a>



													<?php
													}?></td>

												</tr>

								<?php
								}
								}
								?>

											</tbody>
										</table>

									</div>
									<!-- end widget content -->

								</div>
								<!-- end widget div -->

							</div>
							<!-- end widget -->

						</article>
						<!-- WIDGET END -->

					</div>

					<!-- end row -->

				</section>
				<!-- end widget grid -->

			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->
<?php
include('footer.php');
?>