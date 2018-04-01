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
  $sqll="SELECT * FROM `users` WHERE email ='$email' ";
 
$stmtt=mysqli_query($connection,$sqll);
if($stmtt == false) {
trigger_error('Wrong SQL: ' . $sqll . ' Error: ' . $connection->error, E_USER_ERROR);
}

$nr=mysqli_num_rows($stmtt);
$row=mysqli_fetch_array($stmtt);
 $user_id =$row['user_id'];
  $sql="SELECT * FROM users INNER JOIN access  ON  (users.user_id = access.user_id) INNER JOIN page  ON  (access.pageId = page.pageId) WHERE  access.status ='1'  AND access.pageId='20' AND access.user_id='$user_id' ";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
 $nr =mysqli_num_rows($stmt);
if($nr > 0)
{
		
}
else
{
?>
		
			    <script>
					window.location.href='NotAccess.php';
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
				<!-- end breadcrumb -->

				<!-- You can also add more buttons to the
				ribbon for further usability

				Example below:

				<span class="ribbon-button-alignment pull-right">
				<span id="search" class="btn btn-ribbon hidden-xs" data-title="search"><i class="fa-grid"></i> Change Grid</span>
				<span id="add" class="btn btn-ribbon hidden-xs" data-title="add"><i class="fa-plus"></i> Add</span>
				<span id="search" class="btn btn-ribbon" data-title="search"><i class="fa-search"></i> <span class="hidden-mobile">Search</span></span>
				</span> -->

			</div>
			<!-- END RIBBON -->

			<!-- MAIN CONTENT -->
			<div id="content">

				<div class="row">
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
						<h1 class="page-title txt-color-blueDark">
							<i class="fa fa-table fa-fw "></i> 
								Table 
							<span>> 
								Resend Email
							</span>
						</h1>
					</div>
			</div>
				
				<!-- widget grid -->
				<section id="widget-grid" class="">
				
					<!-- row -->
					<div class="row">
				
						<!-- NEW WIDGET START -->
						<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
								<!-- widget options:
								usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
				
								data-widget-colorbutton="false"
								data-widget-editbutton="false"
								data-widget-togglebutton="false"
								data-widget-deletebutton="false"
								data-widget-fullscreenbutton="false"
								data-widget-custombutton="false"
								data-widget-collapsed="true"
								data-widget-sortable="false"
				
								-->
								
								<header>
									<span class="widget-icon"> <i class="fa fa-table"></i> </span>
									<h2>Confirmation Email Page </h2>
				
								</header>
				
								<!-- widget div-->
								<div>
				
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
				
									</div>
									<!-- end widget edit box -->
		<?php
include('Connect.php');
 $sql="SELECT * FROM aboutus Where elementname ='sitelink' ";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
echo $nr=mysqli_num_rows($stmt);
if($nr >0)
{
  ?>		
									<!-- widget content -->
									<div class="widget-body no-padding table-responsive">
				
										<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
											<thead>			                
												<tr>
													<th data-hide="phone">Serial ID</th>
													<th > Element Name</th>
												
													
												
													
													<th > Link</th>
														<th > Action</th>
													
													
												
												</tr>
											</thead>
											<tbody>
											<?php
											while($row =mysqli_fetch_assoc($stmt))
											{
											
											?>
												<tr>
													<td><?php echo $row['id']; ?></td>
													<td><?php echo $row['elementname']; ?></td>
													
													
													<td><?php echo $row['hreflink']; ?></td>
												<td> 
       <a href="updatesitetitle.php?id=<?php echo $row['id'];?>"><i class="fa fa-pencil fa-fw"></i></a></td>
												</tr>
								<?php
								}
								}
								else
								{
								echo "Empty";
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
				<div class="row">
						<!-- NEW WIDGET START -->
						<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				
							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
								<!-- widget options:
								usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
				
								data-widget-colorbutton="false"
								data-widget-editbutton="false"
								data-widget-togglebutton="false"
								data-widget-deletebutton="false"
								data-widget-fullscreenbutton="false"
								data-widget-custombutton="false"
								data-widget-collapsed="true"
								data-widget-sortable="false"
				
								-->
								
								<header>
									<span class="widget-icon"> <i class="fa fa-table"></i> </span>
									<h2>Confirmation Email Resend  </h2>
				
								</header>
				
								<!-- widget div-->
								<div>
				
									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->
				
									</div>
									<!-- end widget edit box -->
		<?php
include('Connect.php');
 $sql="SELECT * FROM users";
 
$stmt=mysqli_query($connection,$sql);
if($stmt == false) {
trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}
echo $nr=mysqli_num_rows($stmt);
if($nr >0)
{
  ?>		
									<!-- widget content -->
									<div class="widget-body no-padding table-responsive">
				
										<table id="dt_basic1" class="table table-striped table-bordered table-hover" width="100%">
											<thead>			                
												<tr>
													<th data-hide="phone">Serial ID</th>
													<th > Confirmation Key</th>
													<th data
													-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Email </th>
													
												
													<th > Status </th>
													
														<th > Action</th>
													
													
												
												</tr>
											</thead>
											<tbody>
											<?php
											while($row =mysqli_fetch_assoc($stmt))
											{
											
											?>
												<tr>
													<td><?php echo $row['user_id']; ?></td>
													<td><?php echo $row['confirmcode']; ?></td>
													
													<td><?php echo $row['email']; ?></td>
													
													
													<td><?php   $status =$row['confirmed']; 
													if($status == '1')
													{
													?>
													<p class="btn btn-success" href="#">Already Confirm</p>
													<?php	}else if($status == '0')
													{
													?>
													<p class="btn btn-warning" href="#">Not Confirm Yet</p>
													<?php
													}?></td>
												
												<td> 
         <a    class="btn btn-primary" href="resendConfirmationEmail.php?id=<?php echo $row['user_id'];?>&userType=<?php echo $row['userType']?>"><i class="fa fa-paper-plane"></i></a></td>
												</tr>
								<?php
								}
								}
								else
								{
								echo "Empty";
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
							</div>
	
						</article>
						<!-- WIDGET END -->
				
					</div>
					
				</br>
				</br>
					<!-- end row -->
				
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